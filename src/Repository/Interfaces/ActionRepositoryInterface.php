<?php

declare(strict_types=1);

namespace App\Repository\Interfaces;

use App\Entity\Action;
use App\Entity\Module;
use App\Entity\User;

/** Interface définissant les méthodes de requêtage pour les entités Action.
 * Cette interface permet de respecter le principe d'inversion de dépendance (SOLID). */
interface ActionRepositoryInterface
{
    /** Trouve les actions associées à un module spécifique et répondant à des critères additionnels.
     *
     * @param Module               $module   Le module pour lequel on recherche des actions
     * @param array<string, mixed> $criteria Critères additionnels de filtrage
     *
     * @return Action[] Liste des actions correspondant aux critères */
    public function findByModuleAndCriteria(Module $module, array $criteria = []): array;

    /** Trouve la dernière action validée par un utilisateur.
     *
     * @param User $user L'utilisateur pour lequel on recherche la dernière action
     *
     * @return Action|null La dernière action validée ou null si aucune n'existe */
    public function findLastValidatedActionByUser(User $user): ?Action;

    /** Récupère la date de la dernière action d'un utilisateur.
     *
     * @param User $user L'utilisateur pour lequel on recherche la dernière date d'action
     *
     * @return \DateTimeInterface|null La date de la dernière action ou null si aucune action n'existe */
    public function getLastActionDateForUser(User $user): ?\DateTimeInterface;
}
