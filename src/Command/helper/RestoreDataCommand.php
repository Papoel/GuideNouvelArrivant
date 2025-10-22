<?php

namespace App\Command\helper;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Uid\Uuid;

/**
 * Commande pour restaurer des données depuis des exports JSON phpMyAdmin
 * Commande générée par IA avec Claude Sonnet 4.5
 *
 * Cette commande permet de :
 * - Lire des exports JSON générés par phpMyAdmin depuis le dossier helper/files
 * - Extraire les données utiles (tableau "data")
 * - Déterminer automatiquement l'ordre d'insertion basé sur les dépendances
 * - Régénérer automatiquement les IDs (UUID)
 * - Maintenir les relations entre entités (ex: theme_id)
 * - Persister les données en base avec Doctrine
 *
 * Usage:
 * php bin/console app:restore-data modules.json
 * php bin/console app:restore-data themes.json modules.json
 * php bin/console app:restore-data modules.json --dry-run
 */
#[AsCommand(
    name: 'app:restore-data',
    description: 'Restaure des données depuis des fichiers JSON exportés par phpMyAdmin',
)]
class RestoreDataCommand extends Command
{
    /**
     * Répertoire où sont stockés les fichiers JSON
     */
    private const FILES_DIRECTORY = __DIR__ . '/files';

    /**
     * Mapping des anciens IDs vers les nouveaux IDs générés
     * Permet de maintenir les relations entre entités
     *
     * @var array<string, string>
     */
    private array $idMapping = [];

    /**
     * Cache des entités créées pour résoudre les relations
     * Structure: ['ancien_id' => entity_object]
     *
     * @var array<string, object>
     */
    private array $entityCache = [];

    /**
     * Cache des données chargées depuis les fichiers JSON
     * Structure: ['table_name' => ['data' => [...], 'dependencies' => [...]]]
     *
     * @var array
     */
    private array $filesCache = [];

    public function __construct(
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument(
                'files',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'Fichiers JSON à importer (noms de fichiers uniquement, ex: modules.json)'
            )
            ->addOption(
                'dry-run',
                null,
                InputOption::VALUE_NONE,
                'Simule l\'import sans persister en base de données'
            )
            ->setHelp(
                <<<'HELP'
Cette commande restaure des données depuis des exports JSON phpMyAdmin.

Les fichiers sont automatiquement recherchés dans : src/Command/helper/files/

Elle gère automatiquement :
- La détection de l'ordre d'insertion basé sur les dépendances
- La génération de nouveaux UUIDs
- Le maintien des relations (theme_id, etc.)

Exemples d'utilisation :
  <info>php bin/console app:restore-data modules.json</info>
  (détecte automatiquement que themes.json doit être chargé avant)

  <info>php bin/console app:restore-data themes.json modules.json</info>
  (force un ordre spécifique)

Mode simulation (aucune modification en base) :
  <info>php bin/console app:restore-data modules.json --dry-run</info>
HELP
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $requestedFiles = $input->getArgument('files');
        $dryRun = $input->getOption('dry-run');

        if ($dryRun) {
            $io->warning('MODE SIMULATION : Aucune donnée ne sera persistée en base');
        }

        $io->title('Restauration des données depuis JSON');
        $io->text(sprintf('Répertoire des fichiers : <info>%s</info>', self::FILES_DIRECTORY));

        // Vérification que le répertoire existe
        if (!is_dir(self::FILES_DIRECTORY)) {
            $io->error(sprintf('Le répertoire "%s" n\'existe pas', self::FILES_DIRECTORY));
            return Command::FAILURE;
        }

        // Chargement et analyse de tous les fichiers demandés
        try {
            $this->loadFilesData($requestedFiles, $io);
        } catch (\Exception $e) {
            $io->error($e->getMessage());
            return Command::FAILURE;
        }

        // Détermination de l'ordre optimal d'insertion
        $orderedFiles = $this->determineInsertionOrder($io);

        if (empty($orderedFiles)) {
            $io->error('Aucun fichier à traiter');
            return Command::FAILURE;
        }

        $io->section('Ordre d\'insertion déterminé :');
        $io->listing($orderedFiles);

        // Traitement des fichiers dans l'ordre optimal
        foreach ($orderedFiles as $tableName) {
            try {
                $this->processTable($tableName, $io, $dryRun);
            } catch (\Exception $e) {
                $io->error(sprintf('Erreur lors du traitement de %s : %s', $tableName, $e->getMessage()));
                return Command::FAILURE;
            }
        }

        if (!$dryRun) {
            $io->success('Toutes les données ont été restaurées avec succès !');
        } else {
            $io->success('Simulation terminée. Relancez sans --dry-run pour persister les données.');
        }

        return Command::SUCCESS;
    }

    /**
     * Charge les données de tous les fichiers demandés et détecte leurs dépendances
     *
     * @param array $requestedFiles Liste des noms de fichiers demandés
     * @param SymfonyStyle $io Interface pour l'affichage
     * @throws \Exception
     */
    private function loadFilesData(array $requestedFiles, SymfonyStyle $io): void
    {
        $filesToProcess = [];

        // Ajout des fichiers explicitement demandés
        foreach ($requestedFiles as $filename) {
            $filepath = self::FILES_DIRECTORY . '/' . $filename;

            if (!file_exists($filepath)) {
                throw new \Exception(sprintf('Le fichier "%s" n\'existe pas dans %s', $filename, self::FILES_DIRECTORY));
            }

            $filesToProcess[] = $filepath;
        }

        // Chargement des données de chaque fichier
        foreach ($filesToProcess as $filepath) {
            $this->loadFileData($filepath, $io);
        }

        // Détection automatique des dépendances manquantes
        $this->autoLoadDependencies($io);
    }

    /**
     * Charge les données d'un fichier JSON et les stocke en cache
     *
     * @param string $filepath Chemin complet vers le fichier
     * @param SymfonyStyle $io Interface pour l'affichage
     * @throws \Exception
     */
    private function loadFileData(string $filepath, SymfonyStyle $io): void
    {
        $jsonContent = file_get_contents($filepath);
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception(sprintf('Erreur JSON dans %s : %s', basename($filepath), json_last_error_msg()));
        }

        $tableInfo = $this->extractTableInfo($data);

        if (!$tableInfo) {
            throw new \Exception(sprintf('Structure JSON invalide dans %s', basename($filepath)));
        }

        $tableName = $tableInfo['name'];
        $tableData = $tableInfo['data'];

        // Détection des dépendances (colonnes se terminant par _id)
        $dependencies = $this->detectDependencies($tableData);

        $this->filesCache[$tableName] = [
            'data' => $tableData,
            'dependencies' => $dependencies,
            'filename' => basename($filepath)
        ];

        $io->text(sprintf(
            'Fichier chargé : <info>%s</info> (table: %s, %d enregistrements, dépendances: %s)',
            basename($filepath),
            $tableName,
            count($tableData),
            empty($dependencies) ? 'aucune' : implode(', ', $dependencies)
        ));
    }

    /**
     * Détecte les dépendances d'une table en analysant les champs *_id
     *
     * @param array $tableData Données de la table
     * @return array Liste des tables dont dépend cette table
     */
    private function detectDependencies(array $tableData): array
    {
        $dependencies = [];

        if (empty($tableData)) {
            return $dependencies;
        }

        // Analyse du premier enregistrement pour détecter les colonnes *_id
        $firstRecord = $tableData[0];

        foreach (array_keys($firstRecord) as $column) {
            // Si la colonne se termine par _id et n'est pas le champ id lui-même
            if ($column !== 'id' && str_ends_with($column, '_id')) {
                // Extraction du nom de la table dépendante
                // Exemple: theme_id => theme => themes (pluriel)
                $dependencyName = substr($column, 0, -3);
                $dependencies[] = $dependencyName . 's'; // Convention : pluriel pour les tables
            }
        }

        return array_unique($dependencies);
    }

    /**
     * Charge automatiquement les fichiers JSON des tables dépendantes
     *
     * @param SymfonyStyle $io Interface pour l'affichage
     */
    private function autoLoadDependencies(SymfonyStyle $io): void
    {
        $loadedTables = array_keys($this->filesCache);
        $iteration = 0;
        $maxIterations = 10; // Protection contre les boucles infinies

        do {
            $newDependenciesFound = false;
            $iteration++;

            if ($iteration > $maxIterations) {
                $io->warning('Limite d\'itérations atteinte pour la détection des dépendances');
                break;
            }

            // Parcours des tables déjà chargées
            foreach ($this->filesCache as $tableName => $tableInfo) {
                foreach ($tableInfo['dependencies'] as $dependencyTable) {
                    // Si la dépendance n'est pas encore chargée
                    if (!in_array($dependencyTable, $loadedTables)) {
                        $dependencyFile = $dependencyTable . '.json';
                        $dependencyPath = self::FILES_DIRECTORY . '/' . $dependencyFile;

                        if (file_exists($dependencyPath)) {
                            $io->text(sprintf(
                                '→ Chargement automatique de la dépendance : <comment>%s</comment>',
                                $dependencyFile
                            ));

                            try {
                                $this->loadFileData($dependencyPath, $io);
                                $loadedTables[] = $dependencyTable;
                                $newDependenciesFound = true;
                            } catch (\Exception $e) {
                                $io->warning(sprintf(
                                    'Impossible de charger la dépendance %s : %s',
                                    $dependencyFile,
                                    $e->getMessage()
                                ));
                            }
                        } else {
                            $io->warning(sprintf(
                                'Dépendance non trouvée : %s (requis par %s)',
                                $dependencyFile,
                                $tableName
                            ));
                        }
                    }
                }
            }
        } while ($newDependenciesFound);
    }

    /**
     * Détermine l'ordre optimal d'insertion basé sur les dépendances
     * Utilise un tri topologique pour résoudre le graphe de dépendances
     *
     * @param SymfonyStyle $io Interface pour l'affichage
     * @return array Liste ordonnée des noms de tables
     */
    private function determineInsertionOrder(SymfonyStyle $io): array
    {
        $order = [];
        $processed = [];
        $tables = array_keys($this->filesCache);

        // Tri topologique simple : on traite d'abord les tables sans dépendances
        while (count($processed) < count($tables)) {
            $progressMade = false;

            foreach ($tables as $tableName) {
                // Ignore les tables déjà traitées
                if (in_array($tableName, $processed)) {
                    continue;
                }

                $dependencies = $this->filesCache[$tableName]['dependencies'];

                // Vérifie si toutes les dépendances sont déjà traitées
                $allDependenciesProcessed = true;
                foreach ($dependencies as $dependency) {
                    if (in_array($dependency, $tables) && !in_array($dependency, $processed)) {
                        $allDependenciesProcessed = false;
                        break;
                    }
                }

                // Si toutes les dépendances sont satisfaites, on peut traiter cette table
                if ($allDependenciesProcessed) {
                    $order[] = $tableName;
                    $processed[] = $tableName;
                    $progressMade = true;
                }
            }

            // Protection contre les dépendances circulaires
            if (!$progressMade) {
                $remaining = array_diff($tables, $processed);
                $io->warning(sprintf(
                    'Dépendances circulaires détectées ou dépendances manquantes pour : %s',
                    implode(', ', $remaining)
                ));
                // On ajoute quand même les tables restantes
                $order = array_merge($order, $remaining);
                break;
            }
        }

        return $order;
    }

    /**
     * Traite une table et insère ses données en base
     *
     * @param string $tableName Nom de la table à traiter
     * @param SymfonyStyle $io Interface pour l'affichage
     * @param bool $dryRun Si true, ne persiste pas en base
     * @throws \Exception
     */
    private function processTable(string $tableName, SymfonyStyle $io, bool $dryRun): void
    {
        if (!isset($this->filesCache[$tableName])) {
            throw new \Exception(sprintf('Table %s non trouvée en cache', $tableName));
        }

        $tableInfo = $this->filesCache[$tableName];
        $tableData = $tableInfo['data'];
        $entityClass = $this->getEntityClass($tableName);

        $io->section(sprintf('Traitement de la table : %s', $tableName));
        $io->text(sprintf('Fichier source : <info>%s</info>', $tableInfo['filename']));
        $io->text(sprintf('Entité : <info>%s</info>', $entityClass));
        $io->text(sprintf('Nombre d\'enregistrements : <info>%d</info>', count($tableData)));

        // Vérification que la classe d'entité existe
        if (!class_exists($entityClass)) {
            $io->warning(sprintf('La classe %s n\'existe pas. Table ignorée.', $entityClass));
            return;
        }

        // Traitement de chaque enregistrement
        $processedCount = 0;
        foreach ($tableData as $record) {
            $this->processRecord($record, $entityClass, $io, $dryRun);
            $processedCount++;
        }

        // Flush des entités en base (si pas en mode dry-run)
        if (!$dryRun) {
            $this->entityManager->flush();
            $io->success(sprintf('%d enregistrement(s) persisté(s)', $processedCount));
        } else {
            $io->note(sprintf('%d enregistrement(s) simulé(s)', $processedCount));
        }
    }

    /**
     * Extrait les informations de la table depuis le JSON phpMyAdmin
     *
     * @param array $data Données JSON décodées
     * @return array|null Informations de la table ou null si non trouvé
     */
    private function extractTableInfo(array $data): ?array
    {
        foreach ($data as $item) {
            if (is_array($item) && isset($item['type']) && $item['type'] === 'table') {
                return $item;
            }
        }
        return null;
    }

    /**
     * Déduit le nom de la classe d'entité depuis le nom de la table
     *
     * Conventions :
     * - themes => Theme
     * - modules => Module
     * - user_roles => UserRole (camelCase)
     *
     * @param string $tableName Nom de la table en base
     * @return string Nom complet de la classe (FQCN)
     */
    private function getEntityClass(string $tableName): string
    {
        // Conversion du nom de table en nom de classe
        // Exemple: "user_roles" => "UserRole"
        $className = str_replace('_', '', ucwords($tableName, '_'));

        // Singularisation basique (enlève le 's' final si présent)
        if (str_ends_with($className, 's')) {
            $className = substr($className, 0, -1);
        }

        return sprintf('App\\Entity\\%s', $className);
    }

    /**
     * Traite un enregistrement et crée l'entité correspondante
     *
     * @param array $record Données de l'enregistrement
     * @param string $entityClass Classe de l'entité à créer
     * @param SymfonyStyle $io Interface pour l'affichage
     * @param bool $dryRun Si true, ne persiste pas en base
     */
    private function processRecord(array $record, string $entityClass, SymfonyStyle $io, bool $dryRun): void
    {
        // Création d'une nouvelle instance de l'entité
        $entity = new $entityClass();

        // Stockage de l'ancien ID pour le mapping
        $oldId = $record['id'] ?? null;

        // Génération d'un nouvel UUID
        $newUuid = Uuid::v7(); // UUID v7 (basé sur le temps, recommandé pour Symfony 7)

        // Sauvegarde du mapping ancien ID => nouveau UUID
        if ($oldId) {
            $this->idMapping[$oldId] = $newUuid->toBinary();
            // Stockage de l'entité dans le cache pour résolution ultérieure des relations
            $this->entityCache[$oldId] = $entity;
        }

        // Parcours de tous les champs de l'enregistrement
        foreach ($record as $field => $value) {
            // Gestion spéciale pour le champ 'id'
            if ($field === 'id') {
                // Utilisation de la réflexion car les entités n'ont généralement pas de setId()
                try {
                    $reflection = new \ReflectionClass($entity);
                    $property = $reflection->getProperty('id');
                    $property->setAccessible(true);
                    $property->setValue($entity, $newUuid);
                } catch (\ReflectionException $e) {
                    $io->warning(sprintf('Impossible de définir l\'ID : %s', $e->getMessage()));
                }
                continue;
            }

            // Ne pas traiter les valeurs null
            if ($value === null) {
                continue;
            }

            // Gestion des clés étrangères (champs se terminant par '_id')
            // IMPORTANT : À traiter AVANT la vérification du setter car le setter ne contient pas "_id"
            // Exemple : theme_id => setTheme (et non setThemeId)
            if (str_ends_with($field, '_id')) {
                // Extraction du nom de la relation (theme_id => theme)
                $relationField = substr($field, 0, -3);
                // Génération du nom du setter (theme => setTheme)
                $setter = 'set' . str_replace('_', '', ucwords($relationField, '_'));

                // Vérification que le setter existe
                if (!method_exists($entity, $setter)) {
                    $io->warning(sprintf('Setter %s introuvable pour le champ %s', $setter, $field));
                    continue;
                }

                // Recherche de l'entité parente dans le cache
                if (isset($this->entityCache[$value])) {
                    // L'entité parente est dans le cache, on l'utilise directement
                    $relatedEntity = $this->entityCache[$value];
                    $entity->$setter($relatedEntity);
                } elseif (isset($this->idMapping[$value])) {
                    // Fallback : recherche dans la base si pas dans le cache
                    $mappedUuid = Uuid::fromBinary($this->idMapping[$value]);
                    $relationClass = $this->getEntityClass($relationField . 's'); // Pluriel pour la table

                    if (class_exists($relationClass)) {
                        // Utilisation de getReference pour éviter une requête SQL si l'entité existe
                        try {
                            $relatedEntity = $this->entityManager->getReference($relationClass, $mappedUuid);
                            $entity->$setter($relatedEntity);
                        } catch (\Exception $e) {
                            $io->warning(sprintf(
                                'Relation introuvable : %s avec UUID %s (Erreur: %s)',
                                $relationClass,
                                $mappedUuid->toRfc4122(),
                                $e->getMessage()
                            ));
                        }
                    }
                } else {
                    $io->warning(sprintf(
                        'ID parent non trouvé : %s (champ %s). Vérifiez que la table parente a été traitée avant.',
                        $value,
                        $field
                    ));
                }
                continue;
            }

            // Champs standards : génération du setter et affectation de la valeur
            // Exemple: "title" => "setTitle"
            $setter = 'set' . str_replace('_', '', ucwords($field, '_'));

            // Vérification que le setter existe sur l'entité
            if (!method_exists($entity, $setter)) {
                continue;
            }

            // Affectation de la valeur
            $entity->$setter($value);
        }

        // Affichage d'informations sur l'entité créée
        if (method_exists($entity, 'getTitle')) {
            $io->text(sprintf('  → <comment>%s</comment>', $entity->getTitle()));
        }

        // Persistance de l'entité (si pas en mode dry-run)
        if (!$dryRun) {
            $this->entityManager->persist($entity);
        }
    }
}
