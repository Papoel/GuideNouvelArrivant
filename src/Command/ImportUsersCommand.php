<?php

namespace App\Command;

use App\Entity\User;
use App\Entity\Job;
use App\Entity\Speciality;
use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\ProgressBar;

#[AsCommand(
    name: 'app:import-users',
    description: 'Importe les utilisateurs depuis un fichier JSON d\'export PHPMyAdmin',
)]
class ImportUsersCommand extends Command
{
    private EntityManagerInterface $entityManager;
    private ?Job $defaultJob = null;
    private ?Speciality $defaultSpeciality = null;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('json-file', InputArgument::REQUIRED, 'Chemin vers le fichier JSON contenant les utilisateurs')
            ->addOption('dry-run', null, InputOption::VALUE_NONE, 'Simulation sans sauvegarde en base')
            ->addOption('skip-existing', null, InputOption::VALUE_NONE, 'Ignorer les utilisateurs existants (basé sur l\'email)')
            ->addOption('update-existing', null, InputOption::VALUE_NONE, 'Mettre à jour les utilisateurs existants');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $jsonFile = $input->getArgument('json-file');
        $dryRun = $input->getOption('dry-run');
        $skipExisting = $input->getOption('skip-existing');
        $updateExisting = $input->getOption('update-existing');

        // Vérifier que le fichier existe
        if (!file_exists($jsonFile)) {
            $io->error("Le fichier {$jsonFile} n'existe pas.");
            return Command::FAILURE;
        }

        // Lire et décoder le JSON
        $jsonContent = file_get_contents($jsonFile);
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $io->error('Erreur lors du décodage JSON: ' . json_last_error_msg());
            return Command::FAILURE;
        }

        // Gérer la structure d'export PHPMyAdmin
        $users = $this->extractUsersFromPhpMyAdminExport($data);

        if (empty($users)) {
            $io->error('Aucune donnée utilisateur trouvée dans le fichier JSON');
            return Command::FAILURE;
        }

        $totalUsers = count($users);

        $io->title("Import de {$totalUsers} utilisateurs");

        if ($dryRun) {
            $io->note('Mode simulation activé - aucune modification ne sera sauvegardée');
        } else {
            // Créer ou récupérer les entités Job et Speciality par défaut
            $this->setupDefaultEntities($io);
        }

        // Créer une barre de progression
        $progressBar = new ProgressBar($output, $totalUsers);
        $progressBar->start();

        $imported = 0;
        $updated = 0;
        $skipped = 0;
        $errors = [];

        foreach ($users as $index => $userData) {
            try {
                $result = $this->processUser($userData, $skipExisting, $updateExisting, $dryRun);

                switch ($result['status']) {
                    case 'imported':
                        $imported++;
                        break;
                    case 'updated':
                        $updated++;
                        break;
                    case 'skipped':
                        $skipped++;
                        break;
                    case 'error':
                        $errors[] = "Ligne " . ($index + 1) . ": " . $result['message'];
                        break;
                }
            } catch (\Exception $e) {
                $errors[] = "Ligne " . ($index + 1) . ": " . $e->getMessage();
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $io->newLine(2);

        // Sauvegarder les modifications si ce n'est pas un dry-run
        if (!$dryRun && ($imported > 0 || $updated > 0)) {
            $this->entityManager->flush();
            $io->success('Modifications sauvegardées en base de données');
        }

        // Afficher le résumé
        $io->section('Résumé de l\'import');
        $io->table(
            ['Statut', 'Nombre'],
            [
                ['Importés', $imported],
                ['Mis à jour', $updated],
                ['Ignorés', $skipped],
                ['Erreurs', count($errors)],
            ]
        );

        // Afficher les erreurs
        if (!empty($errors)) {
            $io->section('Erreurs rencontrées');
            foreach ($errors as $error) {
                $io->error($error);
            }
        }

        return empty($errors) ? Command::SUCCESS : Command::FAILURE;
    }

    private function setupDefaultEntities(SymfonyStyle $io): void
    {
        // Créer ou récupérer le Job par défaut
        $this->defaultJob = $this->entityManager->getRepository(Job::class)
            ->findOneBy(['code' => 'CA']);

        if (!$this->defaultJob) {
            $this->defaultJob = new Job();
            $this->defaultJob->setName('chargé d\'affaires');
            $this->defaultJob->setCode('CA');
            $this->entityManager->persist($this->defaultJob);
            $io->note('Création du Job par défaut : chargé d\'affaires (CA)');
        } else {
            $io->note('Job par défaut trouvé : ' . $this->defaultJob->getName() . ' (' . $this->defaultJob->getCode() . ')');
        }

        // Créer ou récupérer la Speciality par défaut
        $this->defaultSpeciality = $this->entityManager->getRepository(Speciality::class)
            ->findOneBy(['code' => 'CHA']);

        if (!$this->defaultSpeciality) {
            $this->defaultSpeciality = new Speciality();
            $this->defaultSpeciality->setName('chaudronnerie');
            $this->defaultSpeciality->setCode('CHA');
            $this->entityManager->persist($this->defaultSpeciality);
            $io->note('Création de la Speciality par défaut : chaudronnerie (CHA)');
        } else {
            $io->note('Speciality par défaut trouvée : ' . $this->defaultSpeciality->getName() . ' (' . $this->defaultSpeciality->getCode() . ')');
        }

        // Flush pour sauvegarder les entités par défaut avant de les utiliser
        $this->entityManager->flush();
    }

    private function extractUsersFromPhpMyAdminExport(array $data): array
    {
        foreach ($data as $item) {
            if (
                isset($item['type']) && $item['type'] === 'table'
                && isset($item['name']) && $item['name'] === 'users'
                && isset($item['data']) && is_array($item['data'])
            ) {
                return $item['data'];
            }
        }
        return [];
    }

    private function processUser(array $userData, bool $skipExisting, bool $updateExisting, bool $dryRun): array
    {
        // En mode dry-run, on simule juste le traitement sans accès base de données
        if ($dryRun) {
            // Vérifications basiques des données requises
            if (empty($userData['email']) || empty($userData['firstname']) || empty($userData['lastname'])) {
                return ['status' => 'error', 'message' => 'Données manquantes (email, firstname ou lastname)'];
            }

            // Simuler l'import réussi
            return ['status' => 'imported', 'message' => 'OK (simulation)'];
        }

        // Mode normal - vérifier si l'utilisateur existe déjà
        $existingUser = $this->entityManager->getRepository(User::class)
            ->findOneBy(['email' => $userData['email']]);

        if ($existingUser) {
            if ($skipExisting) {
                return ['status' => 'skipped', 'message' => 'Utilisateur existant ignoré'];
            }

            if (!$updateExisting) {
                return ['status' => 'error', 'message' => 'Utilisateur existe déjà (email: ' . $userData['email'] . ')'];
            }

            // Mettre à jour l'utilisateur existant
            $user = $existingUser;
            $status = 'updated';
        } else {
            // Créer un nouvel utilisateur
            $user = new User();
            $status = 'imported';
        }

        // Mapper les données
        $this->mapUserData($user, $userData);

        $this->entityManager->persist($user);

        return ['status' => $status, 'message' => 'OK'];
    }

    private function mapUserData(User $user, array $data): void
    {
        // Vérifications de sécurité pour les champs obligatoires
        if (!isset($data['firstname']) || !isset($data['lastname']) || !isset($data['email'])) {
            throw new \Exception('Champs obligatoires manquants (firstname, lastname, email)');
        }

        // Décoder les caractères HTML encodés et nettoyer les données
        $firstname = html_entity_decode($data['firstname'], ENT_QUOTES, 'UTF-8');
        $lastname = html_entity_decode($data['lastname'], ENT_QUOTES, 'UTF-8');
        $email = trim($data['email']);

        // Corriger les caractères mal encodés
        $firstname = $this->fixEncoding($firstname);
        $lastname = $this->fixEncoding($lastname);

        // Champs de base
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setEmail($email);

        if (isset($data['password'])) {
            $user->setPassword($data['password']);
        }

        if (isset($data['nni'])) {
            $user->setNni($data['nni']);
        }

        // Rôles
        if (isset($data['roles']) && !empty($data['roles'])) {
            $roles = explode(',', $data['roles']);
            $user->setRoles($roles);
        }

        // Date de dernière connexion
        if (isset($data['last_login_at']) && !empty($data['last_login_at']) && $data['last_login_at'] !== 'null') {
            try {
                $user->setLastLoginAt(new \DateTime($data['last_login_at']));
            } catch (\Exception $e) {
                // Ignorer les dates invalides
            }
        }

        // Date d'embauche
        if (isset($data['hiring_at']) && !empty($data['hiring_at']) && $data['hiring_at'] !== 'null') {
            try {
                $user->setHiringAt(new \DateTimeImmutable($data['hiring_at']));
            } catch (\Exception $e) {
                // Ignorer les dates invalides
            }
        }

        // Assigner le Job et la Speciality par défaut (ID=1)
        if ($this->defaultJob) {
            $user->setJob($this->defaultJob);
        }

        if ($this->defaultSpeciality) {
            $user->setSpeciality($this->defaultSpeciality);
        }
    }

    private function fixEncoding(string $text): string
    {
        // Corriger les caractères mal encodés typiques
        $replacements = [
            'Ã©' => 'é',
            'Ã¨' => 'è',
            'Ã¡' => 'á',
            'Ã ' => 'à',
            'Ã¢' => 'â',
            'Ã´' => 'ô',
            'Ã¶' => 'ö',
            'Ã»' => 'û',
            'Ã¹' => 'ù',
            'Ã§' => 'ç',
            'Ã®' => 'î',
            'Ã¯' => 'ï',
            'Ã«' => 'ë',
            'Ã¤' => 'ä',
            'Ã¡' => 'ñ',
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $text);
    }
}
