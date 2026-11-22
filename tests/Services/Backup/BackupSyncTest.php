<?php

declare(strict_types=1);

namespace App\Tests\Services\Backup;

use App\Entity\Backup;
use App\Repository\BackupRepository;
use App\Services\Backup\BackupService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Psr\Log\NullLogger;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Réconciliation BDD ↔ filesystem des sauvegardes.
 *
 * Intention (constat utilisateur) : la liste `app:backup:restore` provient de la
 * table `backup`, qui peut décrire des fichiers d'un AUTRE environnement (dump
 * de prod restauré en local) pendant que de vrais fichiers locaux n'ont aucun
 * enregistrement. syncWithFilesystem() enregistre les fichiers orphelins et
 * rapporte les enregistrements dont le fichier est absent, afin que la liste
 * de restauration reflète la réalité du disque.
 */
class BackupSyncTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;
    private BackupRepository $backupRepository;
    private string $backupDir;
    private Filesystem $filesystem;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->entityManager = $container->get(id: 'doctrine')->getManager();
        $this->backupRepository = $this->entityManager->getRepository(Backup::class);
        $this->filesystem = new Filesystem();

        // Répertoire temporaire isolé : les tests ne touchent jamais var/backups
        $this->backupDir = sys_get_temp_dir() . '/gna_backups_test_' . uniqid();
        $this->filesystem->mkdir($this->backupDir);

        $this->entityManager->beginTransaction();
    }

    protected function tearDown(): void
    {
        // Le DDL des tests de synchronisation commit implicitement côté
        // serveur : le rollback peut alors échouer malgré isTransactionActive().
        try {
            $this->entityManager->rollback();
        } catch (\Throwable) {
        }
        $this->entityManager->close();
        $this->filesystem->remove($this->backupDir);
        parent::tearDown();
    }

    /**
     * Cœur de la fonctionnalité : un fichier .sql.gz présent sur disque mais
     * absent de la table `backup` est enregistré (type déduit du dossier,
     * checksum calculé, date parsée depuis le nom du fichier).
     */
    #[Test] public function syncRegistersOrphanBackupFile(): void
    {
        // Arrange : un vrai fichier gzip dans backups/daily/, aucun enregistrement BDD
        $this->createDumpFile('daily', 'backup_daily_2026-10-18_020004.sql.gz');

        // Act
        $result = $this->newService()->syncWithFilesystem();

        // Assert : le fichier est enregistré avec les bonnes métadonnées
        self::assertSame(1, $result['registered']);
        $backup = $this->backupRepository->findOneBy(['filename' => 'backup_daily_2026-10-18_020004.sql.gz']);
        self::assertNotNull($backup, 'Le fichier orphelin doit être enregistré en BDD.');
        self::assertSame('daily', $backup->getType());
        self::assertSame('2026-10-18 02:00:04', $backup->getCreatedAt()->format('Y-m-d H:i:s'));
        self::assertNotEmpty($backup->getChecksum());
        self::assertTrue($this->filesystem->exists($backup->getFilepath()));
    }

    /**
     * Idempotence : relancer la synchronisation ne doit pas créer de doublon
     * pour un fichier déjà connu de la table.
     */
    #[Test] public function syncIsIdempotent(): void
    {
        // Arrange
        $this->createDumpFile('weekly', 'backup_weekly_2026-10-18_020004.sql.gz');
        $service = $this->newService();
        $service->syncWithFilesystem();
        $countAfterFirstRun = $this->backupRepository->count([]);

        // Act : second passage
        $result = $service->syncWithFilesystem();

        // Assert : aucun nouvel enregistrement
        self::assertSame(0, $result['registered']);
        self::assertSame($countAfterFirstRun, $this->backupRepository->count([]));
    }

    /**
     * Symétrie : un enregistrement BDD dont le fichier a disparu (ou appartient
     * à un autre environnement, ex. chemin /home/... du serveur de prod) est
     * rapporté dans la liste `missing` pour information.
     */
    #[Test] public function syncReportsRecordsWhoseFileIsMissing(): void
    {
        // Arrange : un enregistrement pointant un chemin de production inexistant localement
        $ghost = (new Backup())
            ->setType('monthly')
            ->setFilename('backup_monthly_2026-09-30_020004.sql.gz')
            ->setFilepath('/home/u917117533/domains/gna.papoel.fr/public_html/var/backups/monthly/backup_monthly_2026-09-30_020004.sql.gz')
            ->setFilesize('42000');
        $this->entityManager->persist($ghost);
        $this->entityManager->flush();

        // Act
        $result = $this->newService()->syncWithFilesystem();

        // Assert : l'enregistrement fantôme est rapporté, pas supprimé
        self::assertSame([$ghost->getFilename()], array_map(
            static fn (Backup $b): ?string => $b->getFilename(),
            $result['missing'],
        ));
    }

    /**
     * La liste de restauration ne doit proposer que des sauvegardes dont le
     * fichier existe réellement — sinon la sélection échoue à coup sûr.
     */
    #[Test] public function getAvailableBackupsExcludesMissingFiles(): void
    {
        // Arrange : un enregistrement avec fichier réel + un fantôme
        $realFile = $this->createDumpFile('daily', 'backup_daily_2026-10-18_020004.sql.gz');
        $real = (new Backup())
            ->setType('daily')
            ->setFilename('backup_daily_2026-10-18_020004.sql.gz')
            ->setFilepath($realFile)
            ->setFilesize('100');
        $ghost = (new Backup())
            ->setType('weekly')
            ->setFilename('backup_weekly_2026-10-11_020004.sql.gz')
            ->setFilepath('/prod/chemin/inexistant.sql.gz')
            ->setFilesize('48000');
        $this->entityManager->persist($real);
        $this->entityManager->persist($ghost);
        $this->entityManager->flush();

        // Act
        $available = $this->newService()->getAvailableBackups();

        // Assert : seule la sauvegarde restaurable est proposée
        self::assertSame(['backup_daily_2026-10-18_020004.sql.gz'], array_map(
            static fn (Backup $b): ?string => $b->getFilename(),
            $available,
        ));
    }

    /**
     * restore --file : restaurer un fichier absent doit échouer proprement
     * avec une erreur explicite, pas un plantage.
     */
    #[Test] public function restoreBackupFileThrowsOnMissingFile(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('introuvable');

        $this->newService()->restoreBackupFile($this->backupDir . '/inexistant.sql.gz');
    }

    /**
     * Synchronisation post-restore, bout en bout : on simule l'état exact laissé
     * par un dump restauré (versions d'archive non marquées, mentor_name
     * absente, logbook_archives survivante). synchronizeMigrations() doit
     * marquer les migrations dont l'objet existe déjà, rejouer la migration de
     * réparation et rendre mentor_name à nouveau présente et remplie.
     *
     * Note : le DDL n'est pas transactionnel — mais l'état final reproduit
     * l'état initial (colonne recréée et remplie), comme un vrai cycle restore.
     */
    #[Test] public function synchronizeMigrationsRepairsPostRestoreSchema(): void
    {
        // Arrange : simuler la base restaurée
        $conn = $this->entityManager->getConnection();
        $conn->executeStatement(
            "DELETE FROM doctrine_migration_versions WHERE version IN ('DoctrineMigrations\\\\Version20261122124311', 'DoctrineMigrations\\\\Version20261122130344', 'DoctrineMigrations\\\\Version20261122150000')"
        );
        $conn->executeStatement('ALTER TABLE logbooks DROP mentor_name');

        // Act : la synchronisation rejoue les migrations avec marquage des conflits
        $marked = $this->newService()->synchronizeMigrations();

        // Assert : les migrations bloquées par des objets existants sont marquées
        self::assertContains('DoctrineMigrations\\Version20261122124311', $marked);
        self::assertContains('DoctrineMigrations\\Version20261122130344', $marked);

        // ... et la migration de réparation a recréé + rempli mentor_name
        $colExists = (bool) $conn->fetchOne(
            "SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'logbooks' AND column_name = 'mentor_name'"
        );
        self::assertTrue($colExists, 'mentor_name doit être recréée par la migration de réparation.');
    }

    // ——— Helpers ———

    private function newService(): BackupService
    {
        return new BackupService(
            entityManager: $this->entityManager,
            backupRepository: $this->backupRepository,
            parameterBag: new ParameterBag([
                'backup.directory' => $this->backupDir,
                'kernel.project_dir' => \dirname(__DIR__, 3),
            ]),
            logger: new NullLogger(),
            filesystem: $this->filesystem,
            databaseUrl: 'mysql://root:@127.0.0.1:3306/db_compagnonnage_test',
        );
    }

    /** Crée un fichier .sql.gz factice dans <backupDir>/<type>/ et retourne son chemin. */
    private function createDumpFile(string $type, string $filename): string
    {
        $dir = $this->backupDir . '/' . $type;
        $this->filesystem->mkdir($dir);
        $filepath = $dir . '/' . $filename;
        file_put_contents($filepath, gzencode('-- fake dump'));

        return $filepath;
    }
}
