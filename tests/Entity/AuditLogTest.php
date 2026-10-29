<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\AuditLog;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class AuditLogTest extends TestCase
{
    private function buildLog(string $action, ?array $changeset, string $entityClass = 'App\\Entity\\User'): AuditLog
    {
        return new AuditLog([
            'action' => $action,
            'entityClass' => $entityClass,
            'entityId' => '01a183a5-4a9a-73b5-b2c7-4065d340ffe8',
            'changeset' => $changeset,
            'actorType' => AuditLog::ACTOR_USER,
            'actorId' => null,
            'actorLabel' => 'Test',
            'context' => null,
        ]);
    }

    #[Test]
    public function changesSummaryRendersUpdateWithFrenchLabels(): void
    {
        $log = $this->buildLog(AuditLog::ACTION_UPDATE, [
            'firstname' => ['old' => 'Bruce', 'new' => 'Pascal'],
        ]);

        $this->assertStringContainsString('Prénom : Bruce → Pascal', $log->getChangesSummary());
    }

    #[Test]
    public function changesSummaryRendersCollectionDiff(): void
    {
        $log = $this->buildLog(AuditLog::ACTION_COLLECTION_UPDATE, [
            'themes' => ['added' => ['Theme#a'], 'removed' => ['Theme#b', 'Theme#c']],
        ], 'App\\Entity\\Logbook');

        $summary = $log->getChangesSummary();
        $this->assertStringContainsString('Thèmes (+1/-2)', $summary);
    }

    #[Test]
    public function normalizedChangesDetectsTypes(): void
    {
        $log = $this->buildLog(AuditLog::ACTION_UPDATE, [
            'firstname' => ['old' => 'Bruce', 'new' => 'Pascal'],
            'mentor' => ['old' => null, 'new' => 'User#123'],
            'speciality' => ['old' => 'Speciality#1', 'new' => null],
        ]);

        $changes = $log->getNormalizedChanges();
        $this->assertSame('update', $changes[0]['type']);
        $this->assertSame('added', $changes[1]['type']);
        $this->assertSame('removed', $changes[2]['type']);
    }

    #[Test]
    public function actionAndActorLabelsAreFrench(): void
    {
        $log = $this->buildLog(AuditLog::ACTION_DELETE, []);
        $this->assertSame('Suppression', $log->getActionLabel());
        $this->assertSame('Utilisateur', $log->getActorTypeLabel());

        $console = $this->buildLog(AuditLog::ACTION_INSERT, []);
        $this->assertSame('Création', $console->getActionLabel());
    }

    #[Test]
    public function occurredAtUsesParisTimezone(): void
    {
        $log = $this->buildLog(AuditLog::ACTION_INSERT, []);
        $this->assertSame('Europe/Paris', $log->getOccurredAt()->getTimezone()->getName());
    }
}
