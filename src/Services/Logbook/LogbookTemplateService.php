<?php

declare(strict_types=1);

namespace App\Services\Logbook;

use App\Entity\Job;
use App\Entity\Logbook;
use App\Entity\LogbookTemplate;
use App\Entity\Service;
use App\Entity\User;
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
     * Trouve le modèle de carnet par défaut pour un métier donné et optionnellement un service
     *
     * @param Job $job Le métier de l'utilisateur
     * @param Service|null $service Le service de l'utilisateur (optionnel)
     *
     * @return LogbookTemplate|null Le modèle par défaut ou null si aucun n'est trouvé
     */
    public function findDefaultTemplateForJob(Job $job, ?Service $service = null): ?LogbookTemplate
    {
        $repository = $this->entityManager->getRepository(LogbookTemplate::class);

        // Rechercher tous les modèles par défaut
        $defaultTemplates = $repository->findBy(['isDefault' => true]);

        // Filtrer les modèles par métier et service
        $compatibleTemplates = [];

        foreach ($defaultTemplates as $template) {
            // Vérifier d'abord la compatibilité avec le métier
            $jobMatch = $template->hasJob($job);

            if (!$jobMatch) {
                continue;
            }

            // Vérifier la compatibilité avec le service si spécifié
            if ($service !== null) {
                $templateService = $template->getService();

                // Si le modèle a un service spécifié, il doit correspondre
                if ($templateService !== null && $templateService !== $service) {
                    continue;
                }

                // Priorité aux modèles avec service spécifié correspondant
                if ($templateService === $service) {
                    return $template; // Retourner immédiatement un modèle qui correspond exactement au service
                }
            }

            // Ajouter à la liste des modèles compatibles
            $compatibleTemplates[] = $template;
        }

        // Retourner le premier modèle compatible trouvé, ou null si aucun
        return $compatibleTemplates[0] ?? null;
    }

    /**
     * Trouve tous les modèles de carnet compatibles avec un métier donné et optionnellement un service
     *
     * @param Job $job Le métier de l'utilisateur
     * @param Service|null $service Le service de l'utilisateur (optionnel)
     *
     * @return array<LogbookTemplate> Les modèles compatibles
     */
    public function findTemplatesForJob(Job $job, ?Service $service = null): array
    {
        $repository = $this->entityManager->getRepository(LogbookTemplate::class);
        $allTemplates = $repository->findAll();

        // Filtrer pour ne garder que les modèles compatibles avec le métier et le service
        return array_filter($allTemplates, function (LogbookTemplate $template) use ($job, $service) {
            // Vérifier d'abord la compatibilité avec le métier
            // Utiliser le code du métier pour la comparaison
            $jobCode = $job->getCode() ?? '';
            $jobMatch = $template->hasJob($jobCode);

            // Si pas de correspondance de métier, rejeter immédiatement
            if (!$jobMatch) {
                return false;
            }

            // Si un service est spécifié, vérifier la correspondance
            if ($service !== null) {
                // Si le modèle a un service spécifié, il doit correspondre
                if ($template->getService() !== null && $template->getService() !== $service) {
                    return false;
                }
            }

            return true;
        });
    }

    /**
     * Crée automatiquement un carnet pour un utilisateur en fonction de son métier et de son service
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

        // Récupérer le service de l'utilisateur
        $service = $user->getService();

        // Chercher un modèle par défaut pour ce métier et ce service
        $template = $this->findDefaultTemplateForJob($job, $service);
        if (!$template) {
            return null;
        }

        // Créer le carnet à partir du modèle
        return $this->createLogbookFromTemplate($user, $template, $replaceExisting);
    }
}
