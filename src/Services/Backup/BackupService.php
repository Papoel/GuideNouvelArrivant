<?php

namespace App\Services\Backup;

use App\Entity\Backup;
use DateTimeImmutable;
use Psr\Log\LoggerInterface;
use App\Repository\BackupRepository;
use Symfony\Component\Process\Process;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class BackupService
{
    private const TYPES = ['daily', 'weekly', 'monthly', 'annual'];

    public function __construct(
        private EntityManagerInterface $entityManager,
        private BackupRepository $backupRepository,
        private ParameterBagInterface $parameterBag,
        private LoggerInterface $logger,
        private Filesystem $filesystem,
        private string $databaseUrl
    ) {
    }

    public function createBackup(string $type): Backup
    {
        if (!in_array($type, self::TYPES)) {
            throw new \InvalidArgumentException('type invalid: ' . $type);
        }

        $this->logger->info('Début de la sauvegarde ' . $type);

        // Création des répertoires de sauvegarde si nécessaire
        $backupDir = $this->getBackupDirectory($type);
        $this->filesystem->mkdir($backupDir);

        // Générer le nom du fichier
        $filename = $this->generateFilename($type);
        $filepath = $backupDir . '/' . $filename;

        // Exécuter la sauvegarde
        $this->executeDump($filepath);

        // Vérifier que le fichier existe et récupérer sa taille
        $filesize = filesize($filepath);
        if ($filesize === false) {
            throw new \RuntimeException('Impossible de récupérer la taille du fichier: ' . $filepath);
        }

        // Calculer le checksum
        $checksum = hash_file('sha256', $filepath);
        if ($checksum === false) {
            throw new \RuntimeException('Impossible de calculer le checksum du fichier: ' . $filepath);
        }

        // Création de l'entité Backup
        $backup = new Backup();
        $backup->setType($type)
            ->setFilename($filename)
            ->setFilePath($filepath)
            ->setFilesize((string)$filesize)
            ->setChecksum($checksum)
        ;

        $this->entityManager->persist($backup);
        $this->entityManager->flush();

        $this->logger->info('Sauvegarde ' . $filename . ' terminée');

        // Nettoyer les anciennes sauvegardes
        $this->cleanupOldBackups($type);

        // Nettoyer les sauvegardes redondantes
        $this->cleanRedundantBackups($type);

        return $backup;
    }

    private function getBackupDirectory(string $type): string
    {
        /** @var string $baseDir */
        $baseDir = $this->parameterBag->get('backup.directory');
        return $baseDir . '/' . $type;
    }

    private function generateFilename(string $type): string
    {
        $date = new \DateTimeImmutable();
        return sprintf(
            'backup_%s_%s.sql.gz',
            $type,
            $date->format('Y-m-d_His')
        );
    }

    private function executeDump(string $filepath): void
    {
        $connection = $this->entityManager->getConnection();
        $params = $connection->getParams();

        $host = $params['host'] ?? 'localhost';
        $port = $params['port'] ?? 3306;
        $database = $params['dbname'] ?? '';
        $username = $params['user'] ?? 'root';
        $password = $params['password'] ?? '';

        // Construction de la commande mysqldump
        $commandParts = [
            'mysqldump',
            sprintf('-h%s', escapeshellarg($host)),
            sprintf('-P%s', escapeshellarg((string)$port)),
            sprintf('-u%s', escapeshellarg($username)),
        ];

        // Ajouter le mot de passe seulement s'il existe
        if (!empty($password)) {
            $commandParts[] = sprintf('--password=%s', escapeshellarg($password));
        }

        $commandParts[] = escapeshellarg($database);
        $commandParts[] = '| gzip >';
        $commandParts[] = escapeshellarg($filepath);

        $command = implode(' ', $commandParts);

        $process = Process::fromShellCommandline($command);
        $process->setTimeout(3600); // 1 heure max
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException('Échec de la sauvegarde: ' . $process->getErrorOutput());
        }
    }

    private function cleanupOldBackups(string $type): void
    {
        /** @var array<string, array{retention: int}> $schedules */
        $schedules = $this->parameterBag->get('backup.schedules');
        $retention = $schedules[$type]['retention'] ?? 1;

        $count = $this->backupRepository->countByType($type);

        if ($count > $retention) {
            $toDelete = $this->backupRepository->findOldestByType($type, $retention);

            foreach ($toDelete as $backup) {
                $this->deleteBackup($backup);
            }
        }
    }

    private function cleanRedundantBackups(string $type): void
    {
        // Si on vient de créer une sauvegarde d'un niveau supérieur,
        // supprimer les sauvegardes de niveaux inférieurs de la même période
        $hierarchy = ['daily' => 0, 'weekly' => 1, 'monthly' => 2, 'annual' => 3];
        $currentLevel = $hierarchy[$type];

        // Récupérer la sauvegarde qu'on vient de créer
        $latestBackup = $this->backupRepository->findLatestByType($type);

        if (!$latestBackup) {
            return;
        }

        $backupDate = $latestBackup->getCreatedAt();

        if ($backupDate === null) {
            return;
        }

        // Définir les périodes à nettoyer selon le type de sauvegarde
        $dateRanges = $this->getRedundantDateRanges($type, $backupDate);

        if (empty($dateRanges)) {
            return;
        }

        // Supprimer les sauvegardes de niveaux inférieurs dans ces périodes
        foreach ($hierarchy as $lowerType => $level) {
            if ($level >= $currentLevel) {
                continue;
            }

            foreach ($dateRanges as $range) {
                $this->deleteBackupsInRange($lowerType, $range['start'], $range['end']);
            }
        }
    }

    /**
     * @return array<int, array{start: DateTimeImmutable, end: DateTimeImmutable}>
     */
    private function getRedundantDateRanges(string $type, DateTimeImmutable $backupDate): array
    {
        $ranges = [];

        switch ($type) {
            // 1. Case Weekly
            case 'weekly':
                // Supprimer les sauvegardes quotidiennes de la même semaine
                $start = $backupDate->modify('monday this week');
                $end = $backupDate->modify('sunday this week')->setTime(23, 59, 59);
                $ranges[] = ['start' => $start, 'end' => $end];
                break;
            // 2. Case Monthly
            case 'monthly':
                // Supprimer les daily et weekly du mois
                $start = $backupDate->modify('first day of this month')->setTime(0, 0, 0);
                $end = $backupDate->modify('last day of this month')->setTime(23, 59, 59);
                $ranges[] = ['start' => $start, 'end' => $end];
                break;
            // 3. Case Annual
            case 'annual':
                // Supprimer les daily, weekly et monthly de l'année
                $start = $backupDate->setDate((int)$backupDate->format('Y'), 1, 1)->setTime(0, 0, 0);
                $end = $backupDate->setDate((int)$backupDate->format('Y'), 12, 31)->setTime(23, 59, 59);
                $ranges[] = ['start' => $start, 'end' => $end];
                break;
        }

        return $ranges;
    }

    public function deleteBackup(Backup $backup): void
    {
        $filepath = $backup->getFilePath();

        // Supprimer le fichier
        if ($filepath !== null && file_exists($filepath)) {
            $this->filesystem->remove($filepath);
        }

        // Supprimer l'entité
        $this->entityManager->remove($backup);
        $this->entityManager->flush();

        // Log
        $this->logger->info('Sauvegarde supprimée: ' . $backup->getFilename());
    }

    public function restoreBackup(Backup $backup): void
    {
        // Log
        $this->logger->info('Restauration de la sauvegarde: ' . $backup->getFilename());

        $filepath = $backup->getFilePath();

        if ($filepath === null || !$this->filesystem->exists($filepath)) {
            $this->logger->error('Fichier de sauvegarde introuvable: ' . ($filepath ?? 'null'));
            throw new \RuntimeException('Fichier de sauvegarde introuvable');
        }

        // Vérifier le checksum
        $currentChecksum = hash_file('sha256', $filepath);

        if ($currentChecksum === false) {
            $this->logger->error('Impossible de calculer le checksum: ' . $filepath);
            throw new \RuntimeException('Impossible de calculer le checksum');
        }

        if ($currentChecksum !== $backup->getChecksum()) {
            $this->logger->error('Checksum invalide: ' . $filepath);
            throw new \RuntimeException('Checksum invalide pour la sauvegarde: ' . $backup->getFilename());
        }

        $databaseUrl = $this->databaseUrl;
        $parsedUrl = parse_url($databaseUrl);

        if ($parsedUrl === false) {
            throw new \RuntimeException('URL de base de données invalide');
        }

        $host = $parsedUrl['host'] ?? 'localhost';
        $port = $parsedUrl['port'] ?? 3306;
        $database = trim($parsedUrl['path'] ?? '', '/');
        $username = $parsedUrl['user'] ?? 'root';
        $password = $parsedUrl['pass'] ?? '';

        // Décompressser et restaurer
        $command = sprintf(
            'gunzip < %s | mysql -h%s -P%s -u%s -p%s %s',
            escapeshellarg($filepath),
            escapeshellarg($host),
            escapeshellarg((string)$port),
            escapeshellarg($username),
            escapeshellarg($password),
            escapeshellarg($database)
        );

        $process = Process::fromShellCommandline($command);
        $process->setTimeout(3600);
        $process->run();

        if (!$process->isSuccessful()) {
            $this->logger->error('Erreur lors de la restauration: ' . $process->getErrorOutput());
            throw new \RuntimeException('Echec de la restauration: ' . $process->getErrorOutput());
        }

        // Log
        $this->logger->info('Restauration terminée avec succès');
    }

    /**
     * @return array<Backup>
     */
    public function getAllBackups(?string $type = null): array
    {
        if ($type) {
            return $this->backupRepository->findByType($type);
        }

        /** @var array<Backup> */
        return $this->backupRepository->findBy([], ['createdAt' => 'DESC']);
    }

    public function getMostRecentBackup(): ?Backup
    {
        return $this->backupRepository->findMostRecent();
    }

    public function shouldCreateBackup(string $type): bool
    {
        /** @var array<string, array{retention?: int, day?: string}> $schedules */
        $schedules = $this->parameterBag->get('backup.schedules');
        $config = $schedules[$type] ?? null;

        if (!$config) {
            return false;
        }

        $now = new \DateTimeImmutable();
        $lastBackup = $this->backupRepository->findLatestByType($type);

        // Vérifier selon le type
        switch ($type) {
            case 'daily':
                // Vérifier si on a déjà une sauvegarde aujourd'hui
                if ($lastBackup !== null) {
                    $lastBackupDate = $lastBackup->getCreatedAt();
                    if ($lastBackupDate !== null && $lastBackupDate->format('Y-m-d') === $now->format('Y-m-d')) {
                        return false;
                    }
                }
                return true;

            case 'weekly':
                // Vérifier si on est dimanche (ou le jour configuré)
                $targetDay = $config['day'] ?? 'sunday';
                if (strtolower($now->format('l')) !== $targetDay) {
                    return false;
                }
                // Vérifier si on a déjà une sauvegarde cette semaine
                if ($lastBackup !== null) {
                    $lastBackupDate = $lastBackup->getCreatedAt();
                    if ($lastBackupDate !== null && $lastBackupDate->format('Y-W') === $now->format('Y-W')) {
                        return false;
                    }
                }
                return true;

            case 'monthly':
                // Vérifier si on est le dernier jour du mois
                $lastDayOfMonth = $now->format('t');
                if ($now->format('d') !== $lastDayOfMonth) {
                    return false;
                }
                // Vérifier si on a déjà une sauvegarde ce mois
                if ($lastBackup !== null) {
                    $lastBackupDate = $lastBackup->getCreatedAt();
                    if ($lastBackupDate !== null && $lastBackupDate->format('Y-m') === $now->format('Y-m')) {
                        return false;
                    }
                }
                return true;

            case 'annual':
                // Vérifier si on est le 31/12
                if ($now->format('m-d') !== '12-31') {
                    return false;
                }
                // Vérifier si on a déjà une sauvegarde cette année
                if ($lastBackup !== null) {
                    $lastBackupDate = $lastBackup->getCreatedAt();
                    if ($lastBackupDate !== null && $lastBackupDate->format('Y') === $now->format('Y')) {
                        return false;
                    }
                }
                return true;
        }

        return false;
    }

    private function deleteBackupsInRange(string $type, DateTimeImmutable $start, DateTimeImmutable $end): void
    {
        /** @var array<Backup> $backupsToDelete */
        $backupsToDelete = $this->backupRepository->createQueryBuilder('b')
            ->where('b.type = :type')
            ->andWhere('b.createdAt >= :start')
            ->andWhere('b.createdAt <= :end')
            ->setParameter('type', $type)
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->getQuery()
            ->getResult();

        foreach ($backupsToDelete as $backup) {
            $this->deleteBackup($backup);
            $this->logger->info("Sauvegarde redondante supprimée: {$backup->getFilename()}");
        }
    }
}
