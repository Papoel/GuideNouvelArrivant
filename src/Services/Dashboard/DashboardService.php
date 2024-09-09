<?php

declare(strict_types=1);

namespace App\Services\Dashboard;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\User\UserSeniorityService;
use App\Services\User\UserValidationService;
use Symfony\Component\HttpFoundation\RedirectResponse;

readonly class DashboardService
{
    public function __construct(
        private UserValidationService $userValidationService,
        private UserSeniorityService $seniorityService,
        private UserRepository $userRepository,
    ) {
    }

    public function handleNniRedirection(string $nni, User $currentUser): ?Response
    {
        // Si le NNI dans l'URL est différent du NNI de l'utilisateur connecté
        if ($currentUser->getNni() !== $nni) {
            // Redirection vers le bon tableau de bord
            return new RedirectResponse('/dashboard/'.$currentUser->getNni());
        }

        // Pas de redirection nécessaire
        return null;
    }

    public function getDashboardData(string $nni): array
    {
        // Validation et récupération de l'utilisateur par NNI
        $user = $this->userValidationService->validateUserAccess($nni);

        // Vérification des droits d'accès
        $currentUser = $this->userValidationService->getCurrentUser($nni);

        // assert(assertion: $currentUser instanceof User);

        $logbooks = $this->getLogbooksByUser($currentUser);
        $themes = $this->getThemesByLogbooks($logbooks);
        $modules = $this->getModulesByThemes($themes);
        $actions = $this->getActionsByModules($modules);

        return [
            'user' => $currentUser,
            'logbooks' => $logbooks,
            'themes' => $themes,
            'modules' => $modules,
            'actions' => $actions,
            'userSeniority' => $this->calculateSeniority(hiringAt: $currentUser->getHiringAt()),
            'mentorSeniority' => $this->calculateSeniority(hiringAt: $currentUser->getMentor()?->getHiringAt()),
        ];
    }

    private function getLogbooksByUser(User $user): array
    {
        return $user->getLogbooks()->toArray();
    }

    private function getThemesByLogbooks(array $logbooks): array
    {
        $themes = [];
        foreach ($logbooks as $logbook) {
            foreach ($logbook->getThemes() as $theme) {
                $themes[] = $theme;
            }
        }

        return $themes;
    }

    private function getModulesByThemes(array $themes): array
    {
        $modules = [];
        foreach ($themes as $theme) {
            foreach ($theme->getModules() as $module) {
                $modules[] = $module;
            }
        }

        return $modules;
    }

    private function getActionsByModules(array $modules): array
    {
        $actions = [];
        foreach ($modules as $module) {
            foreach ($module->getActions() as $action) {
                $actions[] = $action;
            }
        }

        return $actions;
    }

    private function calculateSeniority(?\DateTimeImmutable $hiringAt): string
    {
        return $hiringAt ? $this->seniorityService->getSeniority(hiringAt: $hiringAt) : 'Non défini';
    }

    public function getNniByUser(?User $user): string
    {
        if (null === $user) {
            throw new \InvalidArgumentException(message: 'L\'utilisateur est introuvable.');
        }

        return $user->getNni();
    }

    public function getMentorByUser(User $user): ?User
    {
        return $user->getMentor();
    }

    public function validateUserAndRedirect(string $nni, ?User $currentUser): ?RedirectResponse
    {
        // Délégation complète à UserValidationService
        return $this->userValidationService->validateUser($currentUser, $nni);
    }
}
