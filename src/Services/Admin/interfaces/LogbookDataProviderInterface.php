<?php

declare(strict_types=1);

namespace App\Services\Admin\interfaces;

use App\Entity\Logbook;
use App\Entity\User;

/**
 * Interface définissant les services de récupération des données de carnets.
 * Permet d'accéder aux carnets des utilisateurs et aux informations associées.
 */
interface LogbookDataProviderInterface
{
    /**
     * Récupère le carnet d'un utilisateur.
     *
     * @param User $user L'utilisateur pour lequel on recherche le carnet
     *
     * @return Logbook|null Le carnet de l'utilisateur ou null s'il n'en a pas
     */
    public function getLogbookForUser(User $user): ?Logbook;

    /**
     * Récupère la date de la dernière action d'un utilisateur.
     *
     * @param User $user L'utilisateur pour lequel on recherche la dernière action
     *
     * @return \DateTimeInterface|null La date de la dernière action ou null si aucune action n'existe
     */
    public function getLastActionDate(User $user): ?\DateTimeInterface;

    /**
     * Calcule le nombre de jours depuis l'embauche d'un utilisateur.
     *
     * @param User $user L'utilisateur pour lequel on calcule l'ancienneté
     *
     * @return int|null Le nombre de jours depuis l'embauche ou null si la date d'embauche n'est pas définie
     */
    public function getDaysSinceHiring(User $user): ?int;
}
