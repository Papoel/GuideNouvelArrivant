<?php

declare(strict_types=1);

namespace App\Services\Mentor;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\User;
use App\Repository\LogbookRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

readonly class MentorService
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly LogbookRepository $logbookRepository,
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
            if ($apprentice->getMentor() && $apprentice->getMentor()->getNni() === $mentorNni) {
                return true;
            }

            return false;
        }

        // Si aucun apprenant n'a le mentor correspondant, retourne false
        /* @phpstan-ignore-next-line */
        return false;
    }

    /**
     * Récupère les données du Padawan pour un mentor.
     *
     * @return Action[]
     */
    public function getPadawanData(): array
    {
        // 1. Récupérer la requête actuelle
        $currentRequest = $this->request->getCurrentRequest();

        // Vérifier que la requête n'est pas nulle
        if (!$currentRequest) {
            throw new \LogicException(message: 'Impossible de récupérer la requête actuelle.');
        }

        // 2. Mentor, pour empêcher l'accès à un carnet d'un apprenant qui n'est pas le sien
        $mentorNni = $currentRequest->attributes->get(key: 'nni');
        $mentor = $this->userRepository->findOneBy(['nni' => $mentorNni]);
        if (!$mentor) {
            throw new AccessDeniedException(message: 'Le tuteur n\'a pas été trouvé');
        }

        // 3. Récupérer le NNI du Padawan dont le mentor veut voir le carnet
        $padawanNni = $currentRequest->attributes->get(key: 'padawanNni');
        $padawan = $this->userRepository->findOneBy(['nni' => $padawanNni]);
        if (!$padawan || !$padawan->getMentor()) {
            throw new AccessDeniedException(message: 'L\'apprenant n\'a pas été trouvé');
        }

        // 4. Vérifier si l'utilisateur connecté est bien le mentor de ce padawan
        if ($padawan->getMentor()->getNni() !== $mentorNni) {
            throw new AccessDeniedException(message: 'Vous n\'avez pas accès à ce carnet');
        }

        // 5. Récupérer le Carnet du Padawan
        $padawanLogbookId = $currentRequest->attributes->get(key: 'id');
        $padawanLogbook = $this->logbookRepository->find($padawanLogbookId);
        if (!$padawanLogbook) {
            throw new \LogicException(message: 'Le carnet de l\'apprenant n\'a pas été trouvé');
        }

        // 6. Récupérer les actions du carnet
        /* @var Action[] $actions */
        $actions = $padawanLogbook->getActions()->toArray();

        // 7. Trier les actions par thème (assurez-vous que les thèmes ont des titres que vous pouvez comparer)
        usort($actions, function ($a, $b) {
            $themeA = $a->getModule() ? $a->getModule()->getTheme() : null;
            $themeB = $b->getModule() ? $b->getModule()->getTheme() : null;

            // Utilisation du null coalescent pour s'assurer que nous avons toujours une chaîne
            $titleA = $themeA ? $themeA->getTitle() ?? '' : '';
            $titleB = $themeB ? $themeB->getTitle() ?? '' : '';

            return strcmp($titleA, $titleB);
        });

        return $actions;
    }

    /**
     * @return array{
     *     padawan: User,
     *     logbook: Logbook,
     *     actionsByTheme: array<string, array<Action>>
     * }
     */
    public function newGetPadawanData(User $mentor, Logbook $logbook): array
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
