<?php

declare(strict_types=1);

namespace App\Services\Mentor;

use App\Entity\Logbook;
use App\Entity\User;
use App\Repository\UserRepository;

readonly class MentorService
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    /**
     * @return array<User>
     */
    public function getApprenantLogbooks(string $mentorNni): array
    {
        return $this->userRepository->findApprenantByMentorNni($mentorNni);
    }

    public function isLogbookAccessibleByMentor(string $mentorNni, Logbook $logbook): bool
    {
        // Récupère la collection des utilisateurs (apprenants) associés à ce carnet
        $apprentices = $logbook->getOwner();

        // Vérifiez si $apprentices est null
        if (null === $apprentices) {
            return false;
        }

        // Si getOwner() retourne un seul utilisateur
        if ($apprentices instanceof User) {
            $apprentice = $apprentices;
            if ($apprentice->getMentor() && $apprentice->getMentor()->getNni() === $mentorNni) {
                return true;
            }

            return false;
        }

        // Si aucun apprenant n'a le mentor correspondant, retourne false
        /* @phpstan-ignore-next-line */
        return false;
    }
}
