<?php

declare(strict_types=1);

namespace App\Audit;

use App\Entity\AuditLog;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;
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

        // 0. Suppressions planifiées — indexées d'abord pour filtrer les diffs
        //    de collections qui ne font que retirer une entité supprimée
        //    (bruit redondant : la suppression est déjà journalisée).
        $deletions = [];
        foreach ($uow->getScheduledEntityDeletions() as $entity) {
            if (!$entity instanceof AuditLog) {
                $deletions[spl_object_id($entity)] = $entity;
            }
        }

        // 1. Pré-indexe les diffs de collections par entité propriétaire :
        // ils seront fusionnés dans l'entrée UPDATE de l'entité quand elle
        // existe (une seule ligne d'audit par entité par flush).
        /** @var array<int, array{owner: object, fields: array<string, array{added: list<string>, removed: list<string>}>}> $collectionDiffs */
        $collectionDiffs = [];
        foreach ($uow->getScheduledCollectionUpdates() as $collection) {
            $owner = $collection->getOwner();
            if ($owner instanceof AuditLog || null === $owner) {
                continue;
            }

            $added = array_map(
                fn (mixed $value): string => is_object($value) ? $this->entityRef($value) : 'Ø',
                array_values($collection->getInsertDiff())
            );
            $removed = [];
            foreach (array_values($collection->getDeleteDiff()) as $removedEntity) {
                if (is_object($removedEntity) && !isset($deletions[spl_object_id($removedEntity)])) {
                    $removed[] = $this->entityRef($removedEntity);
                }
            }
            if ([] === $added && [] === $removed) {
                continue;
            }

            $mappingName = $collection->getMapping()['fieldName'] ?? 'collection';
            $field = is_string($mappingName) ? $mappingName : 'collection';
            $collectionDiffs[spl_object_id($owner)]['owner'] = $owner;
            $collectionDiffs[spl_object_id($owner)]['fields'][$field] = ['added' => $added, 'removed' => $removed];
        }

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

            // Fusionne les diffs de collections du même objet dans cette entrée
            $ownerId = spl_object_id($entity);
            foreach ($collectionDiffs[$ownerId]['fields'] ?? [] as $field => $diff) {
                $changeset[$field] = $diff;
            }
            unset($collectionDiffs[$ownerId]);

            if ([] === $changeset) {
                continue;
            }
            $this->writeLog($em, $uow, $auditMeta, AuditLog::ACTION_UPDATE, $entity, $changeset);
        }

        // Suppressions : si le flush supprime plusieurs entités liées en cascade
        // (ex. utilisateur → carnet → modules → actions), on consolide en une
        // seule entrée sur la racine avec un résumé des suppressions filles.
        if (count($deletions) > 1) {
            $root = $this->cascadeRoot($em, $deletions);
            if (null !== $root) {
                $children = array_diff_key($deletions, [spl_object_id($root) => true]);
                $changeset = $this->snapshot($em, $uow, $root);
                $changeset['_cascade'] = $this->cascadeSummary($children);
                $this->writeLog($em, $uow, $auditMeta, AuditLog::ACTION_DELETE, $root, $changeset);
                $deletions = [];
            }
        }

        foreach ($deletions as $entity) {
            $this->writeLog($em, $uow, $auditMeta, AuditLog::ACTION_DELETE, $entity, $this->snapshot($em, $uow, $entity));
        }

        // 2. Diffs de collections restants, sans UPDATE d'entité associé
        //    (ex. retrait d'un thème d'un carnet sans autre modification)
        foreach ($collectionDiffs as $diff) {
            foreach ($diff['fields'] as $field => $change) {
                $this->writeLog($em, $uow, $auditMeta, AuditLog::ACTION_COLLECTION_UPDATE, $diff['owner'], [
                    $field => $change,
                ]);
            }
        }
    }

    /** @param \Doctrine\ORM\Mapping\ClassMetadata<AuditLog> $auditMeta
     *  @param array<string, mixed> $changeset */
    private function writeLog(EntityManagerInterface $em, UnitOfWork $uow, object $auditMeta, string $action, object $entity, array $changeset): void
    {
        $actor = $this->auditContext->actor();

        $log = new AuditLog([
            'action' => $action,
            'entityClass' => $em->getClassMetadata($entity::class)->getName(),
            'entityId' => $this->entityId($entity, $em),
            'entityLabel' => $this->entityLabel($entity),
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

    /** Transforme le changeset Doctrine [champ => [avant, après]] en structure lisible.
     * @param array<string, mixed> $changeset
     * @return array<string, array{old: mixed, new: mixed}> */
    private function sanitize(array $changeset): array
    {
        $clean = [];
        foreach ($changeset as $field => $pair) {
            if (!is_array($pair) || !array_key_exists(0, $pair) || !array_key_exists(1, $pair)) {
                continue;
            }
            if (in_array($field, self::IGNORED_FIELDS, true)) {
                continue;
            }
            $clean[$field] = [
                'old' => $this->normalize($pair[0]),
                'new' => $this->normalize($pair[1]),
            ];
        }

        return $clean;
    }

    /** Racine d'une cascade : l'entité supprimée dont aucune autre n'est enfant
     *  (celle vers laquelle pointent les associations des autres).
     * @param array<int, object> $deletions */
    private function cascadeRoot(EntityManagerInterface $em, array $deletions): ?object
    {
        $roots = [];
        foreach ($deletions as $candidateId => $candidate) {
            $meta = $em->getClassMetadata($candidate::class);
            $isChild = false;
            foreach ($meta->getAssociationNames() as $assoc) {
                if (!$meta->isSingleValuedAssociation($assoc)) {
                    continue;
                }
                foreach ($deletions as $otherId => $other) {
                    if ($otherId !== $candidateId && $other instanceof ($meta->getAssociationTargetClass($assoc))) {
                        $isChild = true;
                    }
                }
            }
            if (!$isChild) {
                $roots[] = $candidate;
            }
        }

        return 1 === count($roots) ? $roots[0] : null;
    }

    /** Résumé des suppressions filles : classe courte → {count, premiers libellés}.
     * @param array<int, object> $children
     * @return array<string, array{count: int, items?: list<string>}> */
    private function cascadeSummary(array $children): array
    {
        $summary = [];
        foreach ($children as $child) {
            $class = $child::class;
            $short = ($pos = strrpos($class, '\\')) !== false ? substr($class, $pos + 1) : $class;
            $summary[$short]['count'] = ($summary[$short]['count'] ?? 0) + 1;
            $label = $this->entityLabel($child);
            if (null !== $label && count($summary[$short]['items'] ?? []) < 5) {
                $summary[$short]['items'][] = $label;
            }
        }

        return $summary;
    }

    /** Snapshot de l'entité supprimée (valeurs originales en base).
     * @return array<string, mixed> */
    private function snapshot(EntityManagerInterface $em, UnitOfWork $uow, object $entity): array
    {
        $meta = $em->getClassMetadata($entity::class);
        $snapshot = [];
        foreach ($uow->getOriginalEntityData($entity) as $field => $value) {
            $field = (string) $field;
            if (in_array($field, self::IGNORED_FIELDS, true)) {
                continue;
            }
            if ($meta->isCollectionValuedAssociation($field)) {
                continue;
            }
            $snapshot[$field] = is_object($value) ? $this->entityRef($value) : $this->normalize($value);
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

    /** Libellé lisible d'une entité (__toString / getName / getTitle / getFullname). */
    private function entityLabel(object $value): ?string
    {
        foreach (['__toString', 'getName', 'getTitle', 'getLabel', 'getFullname'] as $method) {
            if (method_exists($value, $method)) {
                $result = $value->{$method}();
                if (is_string($result) && '' !== $result) {
                    return $result;
                }
            }
        }

        return null;
    }

    /** Référence lisible d'une entité : libellé métier, sinon "Classe#id". */
    private function entityRef(object $value): string
    {
        $label = $this->entityLabel($value);
        if (null !== $label) {
            return $label;
        }

        $class = $value::class;
        $short = ($pos = strrpos($class, '\\')) !== false ? substr($class, $pos + 1) : $class;

        $id = method_exists($value, 'getId') ? $value->getId() : null;

        return $short . '#' . (null === $id ? '?' : ($id instanceof \Stringable ? (string) $id : (is_scalar($id) ? (string) $id : '?')));
    }
}
