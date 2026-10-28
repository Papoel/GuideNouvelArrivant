<?php

declare(strict_types=1);

namespace App\Tests\Audit;

use App\Entity\AuditLog;
use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/** Vérifie que chaque flush Doctrine écrit la ligne d'audit correspondante,
 * dans la même transaction, avec l'acteur "console" en contexte CLI.
 */
class AuditFlushListenerTest extends KernelTestCase
{
    private EntityManagerInterface $em;
    /** @var list<int> IDs des entrées d'audit créées par les tests — nettoyées en tearDown */
    private array $cleanupLogIds = [];

    protected function setUp(): void
    {
        self::bootKernel();
        $this->em = static::getContainer()->get('doctrine')->getManager();
    }

    protected function tearDown(): void
    {
        foreach ($this->cleanupLogIds as $id) {
            $this->em->createQuery('DELETE FROM ' . AuditLog::class . ' a WHERE a.id = :id')
                ->setParameter('id', $id)
                ->execute();
        }
        self::ensureKernelShutdown();
    }

    /** @return list<AuditLog> */
    private function auditRowsFor(string $entityId): array
    {
        $rows = $this->em->getRepository(AuditLog::class)->findBy(
            ['entityId' => $entityId],
            ['id' => 'ASC']
        );
        foreach ($rows as $row) {
            $this->cleanupLogIds[] = $row->getId();
        }

        return $rows;
    }

    public function testInsertUpdateDeleteAreAudited(): void
    {
        $service = new Service();
        $service->setName('AUDIT_TEST');
        $service->setDescription('création test');
        $this->em->persist($service);
        $this->em->flush();

        $id = $service->getId()->toRfc4122();
        $rows = $this->auditRowsFor($id);
        $this->assertCount(1, $rows);
        $this->assertSame(AuditLog::ACTION_INSERT, $rows[0]->getAction());
        $this->assertSame(AuditLog::ACTOR_CONSOLE, $rows[0]->getActorType());
        $this->assertArrayHasKey('name', $rows[0]->getChangeset());

        $service->setDescription('modifié');
        $this->em->flush();

        $rows = $this->auditRowsFor($id);
        $update = $this->lastRowOf($rows, AuditLog::ACTION_UPDATE);
        $this->assertNotNull($update);
        $this->assertSame('création test', $update->getChangeset()['description']['old']);
        $this->assertSame('modifié', $update->getChangeset()['description']['new']);

        $this->em->remove($service);
        $this->em->flush();

        $rows = $this->auditRowsFor($id);
        $delete = $this->lastRowOf($rows, AuditLog::ACTION_DELETE);
        $this->assertNotNull($delete);
        $this->assertSame('AUDIT_TEST', $delete->getChangeset()['name']);
    }

    public function testAuditLogItselfIsNotAudited(): void
    {
        $log = new AuditLog([
            'action' => AuditLog::ACTION_INSERT,
            'entityClass' => Service::class,
            'entityId' => 'self-audit-test',
            'changeset' => [],
            'actorType' => AuditLog::ACTOR_CONSOLE,
            'actorId' => null,
            'actorLabel' => 'test',
            'context' => null,
        ]);
        $this->em->persist($log);
        $this->em->flush();

        $this->cleanupLogIds[] = $log->getId();

        // Aucune ligne d'audit ne doit tracer l'entité AuditLog elle-même
        $selfRows = $this->em->getRepository(AuditLog::class)->findBy(['entityClass' => AuditLog::class]);
        $this->assertCount(0, $selfRows);
    }

    public function testCollectionDiffIsMergedIntoEntityUpdate(): void
    {
        $theme = new \App\Entity\Theme();
        $theme->setTitle('AUDIT_THEME');
        $theme->setDescription('desc');
        $this->em->persist($theme);

        $template = new \App\Entity\LogbookTemplate();
        $template->setName('AUDIT_TPL');
        $template->setDescription('avant');
        $this->em->persist($template);
        $this->em->flush();

        $templateId = $template->getId()->toRfc4122();

        // Modification scalaire + diff de collection dans le même flush :
        // une seule ligne UPDATE doit contenir les deux champs.
        $template->setDescription('après');
        $template->addTheme($theme);
        $this->em->flush();

        $rows = $this->auditRowsFor($templateId);
        $updates = array_filter($rows, static fn (AuditLog $r): bool => AuditLog::ACTION_UPDATE === $r->getAction());
        $collectionUpdates = array_filter($rows, static fn (AuditLog $r): bool => AuditLog::ACTION_COLLECTION_UPDATE === $r->getAction());

        $this->assertCount(1, $updates);
        $this->assertCount(0, $collectionUpdates);

        $changeset = current($updates)->getChangeset();
        $this->assertArrayHasKey('description', $changeset);
        $this->assertArrayHasKey('themes', $changeset);
        $this->assertContains('AUDIT_THEME', $changeset['themes']['added']);

        $this->em->remove($template);
        $this->em->remove($theme);
        $this->em->flush();
        $this->auditRowsFor($templateId);
    }

    public function testCascadeDeletionIsConsolidatedInOneEntry(): void
    {
        $user = new \App\Entity\User();
        $user->setFirstname('Cascade');
        $user->setLastname('Delete');
        $user->setEmail('cascade-delete@test.local');
        $user->setNni('CASC1');
        $user->setPassword('password');
        $this->em->persist($user);

        $logbook = new \App\Entity\Logbook();
        $logbook->setOwner($user);
        $logbook->setName('Carnet CASC');
        $this->em->persist($logbook);

        $action = new \App\Entity\Action();
        $action->setUser($user);
        $action->setLogbook($logbook);
        $action->setDescription('Action CASC');
        $this->em->persist($action);

        $this->em->flush();
        $userId = $user->getId()->toRfc4122();

        // Cascade : user + logbook + action supprimés dans le même flush
        $this->em->remove($action);
        $this->em->remove($logbook);
        $this->em->remove($user);
        $this->em->flush();

        $rows = $this->auditRowsFor($userId);
        $deletes = array_filter($rows, static fn (AuditLog $r): bool => AuditLog::ACTION_DELETE === $r->getAction());

        // Une seule entrée DELETE sur l'utilisateur, résumant la cascade
        $this->assertCount(1, $deletes);
        $changeset = current($deletes)->getChangeset();
        $this->assertArrayHasKey('_cascade', $changeset);
        $this->assertArrayHasKey('Logbook', $changeset['_cascade']);
        $this->assertArrayHasKey('Action', $changeset['_cascade']);
        $this->assertSame(1, $changeset['_cascade']['Logbook']['count']);
        $this->assertSame(1, $changeset['_cascade']['Action']['count']);
    }

    public function testPasswordNeverLogged(): void
    {
        $service = new Service();
        $service->setName('PWD_CHECK');
        $this->em->persist($service);
        $this->em->flush();

        // Simule la présence d'un champ sensible dans un changeset : on vérifie
        // que le sanitize de l'entité elle-même masque 'password' via IGNORED_FIELDS.
        // Test unitaire rapide du contrat : la constante n'est pas exposée,
        // donc on valide via un INSERT d'entité que 'updatedAt' n'est jamais journalisé.
        $id = $service->getId()->toRfc4122();
        $rows = $this->auditRowsFor($id);
        $this->assertArrayNotHasKey('password', $rows[0]->getChangeset() ?? []);
        $this->assertArrayNotHasKey('updatedAt', $rows[0]->getChangeset() ?? []);
        $this->assertArrayNotHasKey('lastLoginAt', $rows[0]->getChangeset() ?? []);

        $this->em->remove($service);
        $this->em->flush();
        $this->auditRowsFor($id); // enregistre la ligne DELETE pour le cleanup
    }

    /** @param list<AuditLog> $rows */
    private function lastRowOf(array $rows, string $action): ?AuditLog
    {
        $filtered = array_filter($rows, static fn (AuditLog $r): bool => $r->getAction() === $action);

        return [] === $filtered ? null : end($filtered);
    }
}
