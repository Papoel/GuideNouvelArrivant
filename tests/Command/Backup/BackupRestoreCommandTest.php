<?php

declare(strict_types=1);

namespace App\Tests\Command\Backup;

use App\Command\Backup\BackupRestoreCommand;
use App\Entity\Backup;
use App\Services\Backup\BackupService;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

#[AllowMockObjectsWithoutExpectations]
class BackupRestoreCommandTest extends TestCase
{
    private MockObject $backupService;
    private CommandTester $commandTester;

    protected function setUp(): void
    {
        $this->backupService = $this->createMock(BackupService::class);
        $this->commandTester = new CommandTester(new BackupRestoreCommand($this->backupService));
    }

    private function createBackupMock(
        string $type,
        string $filename,
        string $date,
        string $size = '32.16 KB'
    ): MockObject {
        $backup = $this->createMock(Backup::class);
        $backup->method('getType')->willReturn($type);
        $backup->method('getFilename')->willReturn($filename);
        $backup->method('getCreatedAt')->willReturn(new \DateTimeImmutable($date));
        $backup->method('getFormattedSize')->willReturn($size);
        return $backup;
    }

    // ─── option --latest ───────────────────────────────────────────────────────

    #[Test]
    public function latestOptionRestoresMostRecentBackup(): void
    {
        $backup = $this->createBackupMock(type: 'daily', filename: 'backup_daily_2026-10-26.sql.gz', date: '2026-10-26 02:00:00');

        $this->backupService->expects($this->once())->method('getMostRecentBackup')->willReturn($backup);
        $this->backupService->expects($this->once())->method('restoreBackup')->with($backup);

        $this->commandTester->setInputs(['yes']);
        $exitCode = $this->commandTester->execute(['--latest' => true]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertStringContainsString('restaurée avec succès', $this->commandTester->getDisplay());
    }

    #[Test]
    public function latestOptionFailsWhenNoBackupAvailable(): void
    {
        $this->backupService->method('getMostRecentBackup')->willReturn(null);
        $this->backupService->expects($this->never())->method('restoreBackup');

        $exitCode = $this->commandTester->execute(['--latest' => true]);

        $this->assertSame(Command::FAILURE, $exitCode);
        $this->assertStringContainsString('Aucune sauvegarde disponible', $this->commandTester->getDisplay());
    }

    #[Test]
    public function latestWithYesOptionSkipsConfirmation(): void
    {
        $backup = $this->createBackupMock(type: 'daily', filename: 'backup_daily_2026-10-26.sql.gz', date: '2026-10-26 02:00:00');

        $this->backupService->method('getMostRecentBackup')->willReturn($backup);
        $this->backupService->expects($this->once())->method('restoreBackup')->with($backup);

        // Aucun input nécessaire : --yes court-circuite la confirmation
        $exitCode = $this->commandTester->execute(['--latest' => true, '--yes' => true]);

        $this->assertSame(Command::SUCCESS, $exitCode);
    }

    // ─── sélection interactive ─────────────────────────────────────────────────

    /**
     * Régression : sélectionner l'index 2 doit restaurer la sauvegarde à l'index 2,
     * pas la première (index 0) comme c'était le cas avant le correctif.
     */
    #[Test]
    public function selectingIndexTwoRestoresBackupAtIndexTwo(): void
    {
        $backup0 = $this->createBackupMock(type: 'daily',  filename: 'backup_daily_2026-10-26.sql.gz',  date: '2026-10-26 02:00:00', size: '32.16 KB');
        $backup1 = $this->createBackupMock(type: 'weekly', filename: 'backup_weekly_2026-10-25.sql.gz', date: '2026-10-25 02:00:00', size: '32.67 KB');
        $backup2 = $this->createBackupMock(type: 'weekly', filename: 'backup_weekly_2026-10-18.sql.gz', date: '2026-10-18 02:00:00', size: '48.71 KB');

        $this->backupService->method('getAllBackups')->willReturn([$backup0, $backup1, $backup2]);

        // Seul backup2 doit être restauré — jamais backup0
        $this->backupService
            ->expects($this->once())
            ->method('restoreBackup')
            ->with($this->identicalTo($backup2));

        $this->commandTester->setInputs(['2', 'yes']);
        $exitCode = $this->commandTester->execute([]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertStringContainsString('backup_weekly_2026-10-18.sql.gz', $this->commandTester->getDisplay());
    }

    #[Test]
    public function selectingIndexZeroRestoresFirstBackup(): void
    {
        $backup0 = $this->createBackupMock(type: 'daily',  filename: 'backup_daily_2026-10-26.sql.gz',  date: '2026-10-26 02:00:00');
        $backup1 = $this->createBackupMock(type: 'weekly', filename: 'backup_weekly_2026-10-18.sql.gz', date: '2026-10-18 02:00:00');

        $this->backupService->method('getAllBackups')->willReturn([$backup0, $backup1]);

        $this->backupService
            ->expects($this->once())
            ->method('restoreBackup')
            ->with($this->identicalTo($backup0));

        $this->commandTester->setInputs(['0', 'yes']);
        $exitCode = $this->commandTester->execute([]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertStringContainsString('backup_daily_2026-10-26.sql.gz', $this->commandTester->getDisplay());
    }

    #[Test]
    public function selectingLastIndexRestoresLastBackup(): void
    {
        $backup0 = $this->createBackupMock(type: 'daily',   filename: 'backup_daily_2026-10-26.sql.gz',   date: '2026-10-26 02:00:00');
        $backup1 = $this->createBackupMock(type: 'monthly', filename: 'backup_monthly_2026-09-30.sql.gz', date: '2026-09-30 02:00:00');

        $this->backupService->method('getAllBackups')->willReturn([$backup0, $backup1]);

        $this->backupService
            ->expects($this->once())
            ->method('restoreBackup')
            ->with($this->identicalTo($backup1));

        $this->commandTester->setInputs(['1', 'yes']);
        $exitCode = $this->commandTester->execute([]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertStringContainsString('backup_monthly_2026-09-30.sql.gz', $this->commandTester->getDisplay());
    }

    // ─── annulation ───────────────────────────────────────────────────────────

    #[Test]
    public function cancellingSelectionAbortsRestore(): void
    {
        $backup = $this->createBackupMock(type: 'daily', filename: 'backup_daily_2026-10-26.sql.gz', date: '2026-10-26 02:00:00');
        $this->backupService->method('getAllBackups')->willReturn([$backup]);
        $this->backupService->expects($this->never())->method('restoreBackup');

        $this->commandTester->setInputs(['cancel']);
        $exitCode = $this->commandTester->execute([]);

        $this->assertSame(Command::SUCCESS, $exitCode);
    }

    #[Test]
    public function refusingConfirmationAbortsRestore(): void
    {
        $backup = $this->createBackupMock(type: 'daily', filename: 'backup_daily_2026-10-26.sql.gz', date: '2026-10-26 02:00:00');
        $this->backupService->method('getAllBackups')->willReturn([$backup]);
        $this->backupService->expects($this->never())->method('restoreBackup');

        $this->commandTester->setInputs(['0', 'no']);
        $exitCode = $this->commandTester->execute([]);

        $this->assertSame(Command::SUCCESS, $exitCode);
    }

    // ─── cas limites ──────────────────────────────────────────────────────────

    #[Test]
    public function noBackupsAvailableShowsWarningAndReturnsSuccess(): void
    {
        $this->backupService->method('getAllBackups')->willReturn([]);
        $this->backupService->expects($this->never())->method('restoreBackup');

        $exitCode = $this->commandTester->execute([]);

        $this->assertSame(Command::SUCCESS, $exitCode);
        $this->assertStringContainsString('Aucune sauvegarde disponible', $this->commandTester->getDisplay());
    }

    #[Test]
    public function exceptionDuringRestoreReturnsFailureWithMessage(): void
    {
        $backup = $this->createBackupMock(type: 'daily', filename: 'backup_daily_2026-10-26.sql.gz', date: '2026-10-26 02:00:00');
        $this->backupService->method('getAllBackups')->willReturn([$backup]);
        $this->backupService->method('restoreBackup')->willThrowException(new \RuntimeException('Échec connexion DB'));

        $this->commandTester->setInputs(['0', 'yes']);
        $exitCode = $this->commandTester->execute([]);

        $this->assertSame(Command::FAILURE, $exitCode);
        $this->assertStringContainsString('Échec connexion DB', $this->commandTester->getDisplay());
    }

    #[Test]
    public function yesOptionSkipsConfirmationPrompt(): void
    {
        $backup = $this->createBackupMock(type: 'daily', filename: 'backup_daily_2026-10-26.sql.gz', date: '2026-10-26 02:00:00');
        $this->backupService->method('getAllBackups')->willReturn([$backup]);
        $this->backupService->expects($this->once())->method('restoreBackup')->with($backup);

        // --yes : aucun input de confirmation nécessaire
        $this->commandTester->setInputs(['0']);
        $exitCode = $this->commandTester->execute(['--yes' => true]);

        $this->assertSame(Command::SUCCESS, $exitCode);
    }
}
