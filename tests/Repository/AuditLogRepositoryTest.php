<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\AuditLog;
use App\Repository\AuditLogRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AuditLogRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;
    private AuditLogRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->repository = $this->entityManager->getRepository(AuditLog::class);

        // Démarrer une transaction — annulée en tearDown
        $this->entityManager->beginTransaction();
    }

    protected function tearDown(): void
    {
        $this->entityManager->rollback();
        $this->entityManager->close();

        parent::tearDown();
    }

    private function log(string $actorType, string $entityClass = 'App\\Entity\\User'): AuditLog
    {
        return new AuditLog([
            'action' => AuditLog::ACTION_UPDATE,
            'entityClass' => $entityClass,
            'entityId' => uniqid('test-', true),
            'changeset' => ['firstname' => ['old' => 'A', 'new' => 'B']],
            'actorType' => $actorType,
            'actorId' => null,
            'actorLabel' => 'test',
            'context' => null,
        ]);
    }

    #[Test]
    public function countByActorTypeGroupsEntries(): void
    {
        $before = $this->repository->countByActorType();

        $this->entityManager->persist($this->log(AuditLog::ACTOR_USER));
        $this->entityManager->persist($this->log(AuditLog::ACTOR_USER));
        $this->entityManager->persist($this->log(AuditLog::ACTOR_CONSOLE));
        $this->entityManager->flush();

        $counts = $this->repository->countByActorType();

        $this->assertSame(($before[AuditLog::ACTOR_USER] ?? 0) + 2, $counts[AuditLog::ACTOR_USER]);
        $this->assertSame(($before[AuditLog::ACTOR_CONSOLE] ?? 0) + 1, $counts[AuditLog::ACTOR_CONSOLE]);
    }

    #[Test]
    public function findDistinctEntityClassesReturnsSortedUniqueClasses(): void
    {
        $this->entityManager->persist($this->log(AuditLog::ACTOR_USER, 'App\\Entity\\Zeta'));
        $this->entityManager->persist($this->log(AuditLog::ACTOR_USER, 'App\\Entity\\Alpha'));
        $this->entityManager->persist($this->log(AuditLog::ACTOR_USER, 'App\\Entity\\Zeta'));
        $this->entityManager->flush();

        $classes = $this->repository->findDistinctEntityClasses();

        $sorted = $classes;
        sort($sorted);
        $this->assertSame($sorted, $classes);
        $this->assertSame($classes, array_unique($classes));
        $this->assertContains('App\\Entity\\Alpha', $classes);
        $this->assertContains('App\\Entity\\Zeta', $classes);
    }

    #[Test]
    public function deleteByActorTypeRemovesOnlyThatChannel(): void
    {
        $this->entityManager->persist($this->log(AuditLog::ACTOR_CONSOLE));
        $this->entityManager->persist($this->log(AuditLog::ACTOR_CONSOLE));
        $keep = $this->log(AuditLog::ACTOR_USER);
        $this->entityManager->persist($keep);
        $this->entityManager->flush();

        $deleted = $this->repository->deleteByActorType(AuditLog::ACTOR_CONSOLE);

        $this->assertGreaterThanOrEqual(2, $deleted);
        $this->assertSame(
            0,
            $this->repository->count(['actorType' => AuditLog::ACTOR_CONSOLE])
        );
        // L'entrée utilisateur est conservée
        $this->assertSame(1, $this->repository->count(['entityId' => $keep->getEntityId()]));
    }

    #[Test]
    public function deleteAllEmptiesTheJournal(): void
    {
        $this->entityManager->persist($this->log(AuditLog::ACTOR_USER));
        $this->entityManager->persist($this->log(AuditLog::ACTOR_ANONYMOUS));
        $this->entityManager->flush();

        $deleted = $this->repository->deleteAll();

        $this->assertGreaterThanOrEqual(2, $deleted);
        $this->assertSame(0, $this->repository->count([]));
    }
}
