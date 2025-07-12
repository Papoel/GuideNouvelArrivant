<?php

declare(strict_types=1);

namespace App\Services\Admin\Logbooks;

use App\Entity\Logbook;
use App\Entity\User;
use App\Repository\Interfaces\ActionRepositoryInterface;
use App\Repository\LogbookRepository;
use App\Services\Admin\interfaces\LogbookDataProviderInterface;

/** Service responsable de la récupération des données liées aux carnets des utilisateurs.
 * Implémente l'interface LogbookDataProviderInterface pour respecter le principe d'inversion de dépendance. */
class LogbookDataProvider implements LogbookDataProviderInterface
{
    public function __construct(
        private readonly LogbookRepository $logbookRepository,
        private readonly ActionRepositoryInterface $actionRepository
    ) {
    }

    /** Récupère le carnet d'un utilisateur.
     *
     * Cette méthode permet d'obtenir le carnet associé à un utilisateur spécifique.
     * Si l'utilisateur n'a pas de carnet, la méthode retourne null.
     *
     * @param User $user L'utilisateur pour lequel on recherche le carnet
     *
     * @return Logbook|null Le carnet de l'utilisateur ou null s'il n'en a pas */
    public function getLogbookForUser(User $user): ?Logbook
    {
        return $this->logbookRepository->findOneBy(['owner' => $user]);
    }

    /** Récupère la date de la dernière action d'un utilisateur.
     *
     * Cette méthode utilise le repository des actions pour trouver
     * la date de la dernière action validée par l'utilisateur.
     *
     * @param User $user L'utilisateur pour lequel on recherche la dernière action
     *
     * @return \DateTimeInterface|null La date de la dernière action ou null si aucune action n'existe */
    public function getLastActionDate(User $user): ?\DateTimeInterface
    {
        return $this->actionRepository->getLastActionDateForUser($user);
    }

    /** Calcule le nombre de jours depuis l'embauche d'un utilisateur.
     *
     * Cette méthode calcule la différence entre la date actuelle et
     * la date d'embauche de l'utilisateur pour déterminer son ancienneté.
     *
     * @param User $user L'utilisateur pour lequel on calcule l'ancienneté
     *
     * @return int|null Le nombre de jours depuis l'embauche ou null si la date d'embauche n'est pas définie */
    public function getDaysSinceHiring(User $user): ?int
    {
        $hiringDate = $user->getHiringAt();
        if (!$hiringDate) {
            return null;
        }

        $now = new \DateTimeImmutable();
        $diff = $now->diff($hiringDate);

        return is_int($diff->days) ? $diff->days : null;
    }
}
