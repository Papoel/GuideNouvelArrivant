<?php

declare(strict_types=1);

namespace App\Audit;

use App\Entity\AuditLog;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\PersistentCollection;
use Doctrine\ORM\UnitOfWork;

/** Journalise toutes les modifications ORM (insert / update / delete / collections
 * many-to-many) dans la table `audit_log`, dans la même transaction que le flush :
 * la ligne d'audit est donc atomique avec la donnée modifiée.
 *
 * Couvre sans modification de leur code les services qui suppriment en silence :
 * UserDeletionService, AccountDeletionService (commande RGPD), LogbookReplacementService.
 */
#[AsDoctrineListener(event: Events::onFlush)]
final readonly class AuditFlushListener
{
    /** Champs jamais journalisés (secret ou bruit). */
    private const IGNORED_FIELDS = ['password', 'updatedAt', 'lastLoginAt'];

    public function __construct(
        private AuditContext $auditContext,
    ) {
    }

    public function onFlush(OnFlushEventArgs $args): void
    {
        $em = $args->getObjectManager();
        $uow = $em->getUnitOfWork();
        $auditMeta = $em->getClassMetadata(AuditLog::class);

        foreach ($uow->getScheduledEntityInsertions() as $entity) {
            if ($entity instanceof AuditLog) {
                continue;
            }
            $this->writeLog($em, $uow, $auditMeta, AuditLog::ACTION_INSERT, $entity, $this->sanitize($uow->getEntityChangeSet($entity)));
        }

        foreach ($uow->getScheduledEntityUpdates() as $entity) {
            if ($entity instanceof AuditLog) {
                continue;
            }
            $changeset = $this->sanitize($uow->getEntityChangeSet($entity));
            if ([] === $changeset) {
                continue;
            }
            $this->writeLog($em, $uow, $auditMeta, AuditLog::ACTION_UPDATE, $entity, $changeset);
        }

        foreach ($uow->getScheduledEntityDeletions() as $entity) {
            if ($entity instanceof AuditLog) {
                continue;
            }
            $this->writeLog($em, $uow, $auditMeta, AuditLog::ACTION_DELETE, $entity, $this->snapshot($entity, $uow));
        }

        // Modifications de collections (ex. retrait d'un thème d'un carnet)
        foreach ($uow->getScheduledCollectionUpdates() as $collection) {
            if (!$collection instanceof PersistentCollection) {
                continue;
            }
            $owner = $collection->getOwner();
            if ($owner instanceof AuditLog || null === $owner) {
                continue;
            }

            $added = array_map($this->entityRef(...), array_values($collection->getInsertDiff()));
            $removed = array_map($this->entityRef(...), array_values($collection->getDeleteDiff()));
            if ([] === $added && [] === $removed) {
                continue;
            }

            $field = $collection->getMapping()['fieldName'] ?? 'collection';
            $this->writeLog($em, $uow, $auditMeta, AuditLog::ACTION_COLLECTION_UPDATE, $owner, [
                $field => ['added' => $added, 'removed' => $removed],
            ]);
        }
    }

    /** @param array<string, mixed> $changeset */
    private function writeLog(EntityManagerInterface $em, UnitOfWork $uow, object $auditMeta, string $action, object $entity, array $changeset): void
    {
        $actor = $this->auditContext->actor();

        $log = new AuditLog([
            'action' => $action,
            'entityClass' => $em->getClassMetadata($entity::class)->getName(),
            'entityId' => $this->entityId($entity, $em),
            'changeset' => $changeset,
            'actorType' => $actor['type'],
            'actorId' => $actor['id'],
            'actorLabel' => $actor['label'],
            'context' => $this->auditContext->context(),
        ]);

        $em->persist($log);
        // Enregistre l'insertion dans le flush courant : audit + données = même transaction
        $uow->computeChangeSet($auditMeta, $log);
        $this->auditContext->addFlushedCount();
    }

    private function entityId(object $entity, EntityManagerInterface $em): ?string
    {
        $ids = $em->getClassMetadata($entity::class)->getIdentifierValues($entity);
        $id = reset($ids);

        if (false === $id || null === $id) {
            return null;
        }

        return $id instanceof \Stringable ? (string) $id : (is_scalar($id) ? (string) $id : null);
    }

    /** Transforme le changeset Doctrine [champ => [avant, après]] en structure lisible. */
    private function sanitize(array $changeset): array
    {
        $clean = [];
        foreach ($changeset as $field => [$old, $new]) {
            if (in_array($field, self::IGNORED_FIELDS, true)) {
                continue;
            }
            $clean[$field] = [
                'old' => $this->normalize($old),
                'new' => $this->normalize($new),
            ];
        }

        return $clean;
    }

    /** Snapshot de l'entité supprimée (valeurs originales en base). */
    private function snapshot(object $entity, UnitOfWork $uow): array
    {
        $snapshot = [];
        foreach ($uow->getOriginalEntityData($entity) as $field => $value) {
            if (in_array($field, self::IGNORED_FIELDS, true)) {
                continue;
            }
            $snapshot[$field] = $this->normalize($value);
        }

        return $snapshot;
    }

    private function normalize(mixed $value): mixed
    {
        return match (true) {
            $value instanceof \DateTimeInterface => $value->format(\DateTimeInterface::ATOM),
            $value instanceof \BackedEnum => $value->value,
            $value instanceof \UnitEnum => $value->name,
            $value instanceof \Stringable => (string) $value,
            is_object($value) => $this->entityRef($value),
            is_array($value) => array_map($this->normalize(...), $value),
            default => $value,
        };
    }

    /** Référence compacte "Classe#id" pour une entité ou un objet quelconque. */
    private function entityRef(object $value): string
    {
        $class = $value::class;
        $short = ($pos = strrpos($class, '\\')) !== false ? substr($class, $pos + 1) : $class;

        $id = method_exists($value, 'getId') ? $value->getId() : null;

        return $short . '#' . (null === $id ? '?' : ($id instanceof \Stringable ? (string) $id : (is_scalar($id) ? (string) $id : '?')));
    }
}
