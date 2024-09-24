<?php

declare(strict_types=1);

namespace App\Services\Logbook;

use App\Entity\Action;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\RequestStack;

class ValidationPendingService
{
    public function __construct(
        private readonly RequestStack $requestStack,
        private readonly UserRepository $userRepository
    ) {
    }

    /**
     * Récupère les données du Padawan.
     *
     * @return ?User
     */
    public function getPadawanData(): ?User
    {
        // Récupérer la requête actuelle
        $currentRequest = $this->requestStack->getCurrentRequest();

        // S'assurer que la requête n'est pas nulle
        if (!$currentRequest) {
            return null;
        }

        // Récupérer le NNI du Padawan dont le mentor veut voir le carnet
        $padawanNni = $currentRequest->attributes->get(key: 'padawanNni');

        // Rechercher le Padawan par son NNI
        return $this->userRepository->findOneBy(criteria: ['nni' => $padawanNni]);
    }

    /**
     * Compte les actions en attente de validation.
     *
     * @param Collection<int, Action> $actions
     * @param ?User                   $owner
     *
     * @phpstan-ignore-next-line
     */
    private function countPendingActions(Collection $actions, ?User $owner): int
    {
        $pendingActions = 0;

        foreach ($actions as $action) {
            // S'assurer que l'objet $action est bien de type Action
            if ($action instanceof Action && $action->getUser() === $owner && null === $action->getAgentValidatedAt()) {
                ++$pendingActions;
            }
        }

        return $pendingActions;
    }
}
