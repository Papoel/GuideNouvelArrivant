<?php

declare(strict_types=1);

namespace App\Services\Mentor;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

readonly class MentorService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly RequestStack $request,
        private readonly EntityManagerInterface $entityManager,
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

            return $apprentice->getMentor() && $apprentice->getMentor()->getNni() === $mentorNni;
        }

        // Si aucun apprenant n'a le mentor correspondant, retourne false
        /* @phpstan-ignore-next-line */
        return false;
    }

    /**
     * @return array{
     *     padawan: User,
     *     logbook: Logbook,
     *     actionsByTheme: array<string, array<Action>>
     * }
     */
    public function getPadawanData(User $mentor, Logbook $logbook): array
    {
        // 1. Récupérer le Padawan associé au carnet
        $padawan = $logbook->getOwner();
        if (!$padawan) {
            throw new AccessDeniedException(message: 'Aucun apprenant associé à ce carnet');
        }

        // Vérifier que le mentor est bien le mentor du padawan
        if (null === $padawan->getMentor() || $padawan->getMentor()->getNni() !== $mentor->getNni()) {
            throw new AccessDeniedException(message: 'Vous n\'avez pas accès à ce carnet');
        }

        // 2. Récupérer les actions du carnet
        $actions = $logbook->getActions()->toArray();

        // 3. Regrouper les actions par thème
        $actionsByTheme = [];
        foreach ($actions as $action) {
            $module = $action->getModule();
            if (null === $module) {
                continue; // ou gérez cette situation comme vous le souhaitez
            }
            $theme = $module->getTheme();
            if (null === $theme) {
                continue; // ou gérez cette situation comme vous le souhaitez
            }
            $themeTitle = $theme->getTitle();
            $actionsByTheme[$themeTitle][] = $action;
        }

        // 4. Trier les clés (titres des thèmes)
        ksort(array: $actionsByTheme);

        return [
            'padawan' => $padawan,
            'logbook' => $logbook,
            'actionsByTheme' => $actionsByTheme, // Renvoie les actions regroupées par thème
        ];
    }

    public function deleteComment(): void
    {
        // 1. Récupérer la requête actuelle
        $currentRequest = $this->request->getCurrentRequest();

        // Vérifier que la requête n'est pas nulle
        if (!$currentRequest) {
            throw new \LogicException(message: 'Impossible de récupérer la requête actuelle.');
        }

        // 2. Récupérer l'ID du commentaire (actionId) via la requête
        $actionId = $currentRequest->attributes->get('actionId');

        // 3. Récupérer l'action par son ID
        $action = $this->entityManager->getRepository(Action::class)->find($actionId);

        // 4. Vérifier si l'action existe
        if (!$action) {
            throw new AccessDeniedException(message: 'Une erreur est survenue lors de la récupération de l\'action');
        }

        // 5. Supprimer le commentaire et la date de commentaire
        $action->setMentorComment(null);
        $action->setMentorCommentedAt(null);

        $this->entityManager->persist($action);
        $this->entityManager->flush();
    }
}
