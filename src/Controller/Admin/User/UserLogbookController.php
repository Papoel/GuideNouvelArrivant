<?php

declare(strict_types=1);

namespace App\Controller\Admin\User;

use App\Entity\User;
use App\Repository\LogbookTemplateRepository;
use App\Repository\UserRepository;
use App\Services\Logbook\LogbookTemplateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UserLogbookController extends AbstractController
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly LogbookTemplateRepository $templateRepository,
        private readonly LogbookTemplateService $logbookTemplateService
    ) {
    }

    #[Route('/admin/users/{id}/assign-template', name: 'admin_user_assign_template', methods: ['GET', 'POST'])]
    public function assignTemplate(Request $request, User $user): Response
    {
        $currentAdmin = $this->getUser();
        if (!$currentAdmin instanceof User || $currentAdmin->getService() !== $user->getService()) {
            $this->addFlash('danger', 'Vous ne pouvez assigner des modèles qu\'aux utilisateurs de votre service.');
            return $this->redirectToRoute('admin');
        }

        if (!$user->getJob()) {
            $this->addFlash('danger', 'L\'utilisateur doit avoir un métier défini pour lui assigner un modèle de carnet.');
            return $this->redirectToRoute('admin');
        }

        $compatibleTemplates = $this->logbookTemplateService->findTemplatesForJob($user->getJob(), $user->getService());

        if (empty($compatibleTemplates)) {
            $this->addFlash('warning', 'Aucun modèle de carnet n\'est compatible avec le métier de cet utilisateur.');
            return $this->redirectToRoute('admin');
        }

        if ($request->isMethod('POST')) {
            $templateId = $request->request->get('template');
            $replaceExisting = (bool) $request->request->get('replace_existing', false);

            $template = $this->templateRepository->find($templateId);

            if (!$template) {
                $this->addFlash('danger', 'Le modèle sélectionné n\'existe pas.');
                return $this->redirectToRoute('admin_user_assign_template', ['id' => $user->getId()]);
            }

            $logbook = $this->logbookTemplateService->createLogbookFromTemplate(
                $user,
                $template,
                $replaceExisting
            );

            $this->addFlash('success', 'Le carnet a été créé avec succès pour ' . $user->getFullname() . '.');
            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/user/assign_template.html.twig', [
            'user' => $user,
            'templates' => $compatibleTemplates,
        ]);
    }

    #[Route('/admin/users/batch-assign-templates', name: 'admin_batch_assign_templates', methods: ['GET', 'POST'])]
    public function batchAssignTemplates(Request $request): Response
    {
        $currentAdmin = $this->getUser();
        if (!$currentAdmin instanceof User || !$currentAdmin->getService()) {
            $this->addFlash('danger', 'Vous devez être associé à un service pour effectuer cette opération.');
            return $this->redirectToRoute('admin');
        }

        $usersWithoutLogbook = $this->userRepository->findUsersWithoutLogbookByService($currentAdmin->getService());

        // Filtrer pour ne garder que les utilisateurs qui ont un modèle compatible
        $eligibleUsers = [];
        foreach ($usersWithoutLogbook as $user) {
            if (!$user->getJob()) {
                continue;
            }

            $compatibleTemplates = $this->logbookTemplateService->findTemplatesForJob(
                $user->getJob(),
                $user->getService()
            );

            if (!empty($compatibleTemplates)) {
                $eligibleUsers[] = $user;
            }
        }

        if ($request->isMethod('POST')) {
            $replaceExisting = (bool) $request->request->get('replace_existing', false);
            $count = 0;

            foreach ($eligibleUsers as $user) {
                $logbook = $this->logbookTemplateService->createLogbookForUser($user, $replaceExisting);
                if ($logbook) {
                    ++$count;
                }
            }

            match ($count) {
                0 => $this->addFlash('warning', 'Aucun carnet n\'a été assigné.'),
                1 => $this->addFlash('success', 'Un carnet a été assigné avec succès.'),
                default => $this->addFlash('success', $count . ' carnets ont été assignés avec succès.'),
            };

            return $this->redirectToRoute('admin_batch_assign_templates');
        }

        $stats = [
            'total_users_in_service' => count($this->userRepository->findBy(['service' => $currentAdmin->getService()])),
            'users_without_logbook' => count($usersWithoutLogbook),
            'eligible_users' => count($eligibleUsers),
        ];

        return $this->render('admin/user/batch_assign_templates.html.twig', [
            'users' => $eligibleUsers,
            'stats' => $stats,
        ]);
    }
}
