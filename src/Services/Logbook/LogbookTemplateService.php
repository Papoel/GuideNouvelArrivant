<?php

declare(strict_types=1);

namespace App\Services\Logbook;

use App\Entity\Logbook;
use App\Entity\LogbookTemplate;
use App\Entity\User;
use App\Enum\JobEnum;
use App\Services\Logbook\LogbookReplacementService;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Service responsable de la gestion des modèles de carnets et de leur application aux utilisateurs
 */
readonly class LogbookTemplateService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private LogbookReplacementService $replacementService
    ) {
    }

    /**
     * Crée un carnet pour un utilisateur à partir d'un modèle spécifique
     *
     * @param User $user L'utilisateur pour lequel créer le carnet
     * @param LogbookTemplate $template Le modèle à utiliser
     * @param bool $replaceExisting Si true, remplace un carnet existant
     *
     * @return Logbook Le carnet créé
     */
    public function createLogbookFromTemplate(User $user, LogbookTemplate $template, bool $replaceExisting = false): Logbook
    {
        // Créer un nouveau carnet
        $logbook = new Logbook();
        $logbook->setOwner($user);
        $logbook->setName('Carnet de ' . $user->getFirstname() . ' ' . $user->getLastname());

        // Ajouter les thèmes du modèle au carnet
        foreach ($template->getThemes() as $theme) {
            $logbook->addTheme($theme);
        }

        // Vérifier si l'utilisateur a déjà un carnet
        if ($replaceExisting && $this->replacementService->handleExistingLogbook($logbook)) {
            $this->replacementService->deleteExistingLogbook($logbook);
        }

        // Persister le nouveau carnet
        $this->entityManager->persist($logbook);
        $this->entityManager->flush();

        return $logbook;
    }

    /**
     * Trouve le modèle de carnet par défaut pour un métier donné
     *
     * @param JobEnum $job Le métier de l'utilisateur
     *
     * @return LogbookTemplate|null Le modèle par défaut ou null si aucun n'est trouvé
     */
    public function findDefaultTemplateForJob(JobEnum $job): ?LogbookTemplate
    {
        $repository = $this->entityManager->getRepository(LogbookTemplate::class);

        // Rechercher tous les modèles par défaut
        $defaultTemplates = $repository->findBy(['isDefault' => true]);

        // Filtrer pour trouver ceux qui correspondent au métier
        foreach ($defaultTemplates as $template) {
            // Vérifier si le modèle est compatible avec le métier
            // Essayer d'abord avec le nom de l'enum (INGENIEUR)
            if ($template->hasJob($job->name) || $template->hasJob($job)) {
                return $template;
            }
        }

        return null;
    }

    /**
     * Trouve tous les modèles de carnet compatibles avec un métier donné
     *
     * @param JobEnum $job Le métier de l'utilisateur
     *
     * @return array<LogbookTemplate> Les modèles compatibles
     */
    public function findTemplatesForJob(JobEnum $job): array
    {
        $repository = $this->entityManager->getRepository(LogbookTemplate::class);
        $allTemplates = $repository->findAll();

        // Filtrer pour ne garder que les modèles compatibles avec le métier
        return array_filter($allTemplates, function (LogbookTemplate $template) use ($job) {
            // Vérifier la compatibilité avec le nom de l'enum ou l'objet JobEnum
            return $template->hasJob($job->name) || $template->hasJob($job);
        });
    }

    /**
     * Crée automatiquement un carnet pour un utilisateur en fonction de son métier
     *
     * @param User $user L'utilisateur pour lequel créer le carnet
     * @param bool $replaceExisting Si true, remplace un carnet existant
     *
     * @return Logbook|null Le carnet créé ou null si aucun modèle compatible n'est trouvé
     */
    public function createLogbookForUser(User $user, bool $replaceExisting = false): ?Logbook
    {
        // Vérifier que l'utilisateur a un métier défini
        $job = $user->getJob();
        if (!$job) {
            return null;
        }

        // Chercher un modèle par défaut pour ce métier
        $template = $this->findDefaultTemplateForJob($job);
        if (!$template) {
            return null;
        }

        // Créer le carnet à partir du modèle
        return $this->createLogbookFromTemplate($user, $template, $replaceExisting);
    }
}
