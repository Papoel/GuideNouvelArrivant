<?php

declare(strict_types=1);

namespace App\Controller\App\Dashboard\Mentor;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\User;
use App\Form\MentorActionType;
use App\Services\Logbook\LogbookProgressService;
use App\Services\Mentor\MentorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_MENTOR')]
#[Route(path: '/dashboard/mentor/{nni}/padawan/{padawanNni}/carnet', name: 'mentor_logbook_')]
class MentorLogbookController extends AbstractController
{
    public function __construct(
        private readonly MentorService $mentorService,
        private readonly EntityManagerInterface $entityManager,
        private readonly LogbookProgressService $logbookProgressService
    ) {
    }

    #[Route('/{id}', name: 'details', methods: [Request::METHOD_GET])]
    public function details(Logbook $logbook): Response
    {
        // Vérifier si le carnet appartient à un apprenant du mentor connecté
        /** @var User $mentor */
        $mentor = $this->getUser();
        /** @var string $mentorNni */
        $mentorNni = $mentor->getNni();

        // Vérifier que le NNI du mentor n'est pas null
        if ('' === $mentorNni) {
            throw $this->createAccessDeniedException(message: 'Le NNI du mentor est invalide.');
        }

        // Vérifier l'accès au carnet
        if (!$this->mentorService->isLogbookAccessibleByMentor($mentorNni, $logbook)) {
            throw $this->createAccessDeniedException(message: 'Vous n\'avez pas accès à ce carnet');
        }

        $padawanData = $this->mentorService->getPadawanData($mentor, $logbook);
        $logbookProgress = $this->logbookProgressService->calculateLogbookProgress($logbook);

        return $this->render(
            view: 'app/dashboard/mentor/logbook_details.html.twig',
            parameters: [
                'padawan' => $padawanData['padawan'],
                'logbook' => $padawanData['logbook'],
                'actionsByTheme' => $padawanData['actionsByTheme'],
                'logbookProgress' => $logbookProgress,
                // 'padawanData' => $padawanData
            ]
        );
    }

    #[Route('/{logbookId}/module/{moduleId}/action/{actionId}/comments/edit', name: 'action_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer l'action par son ID
        $action = $this->entityManager->getRepository(Action::class)->find(id: $request->attributes->get(key: 'actionId'));

        if (!$action) {
            throw $this->createNotFoundException('Une erreur est survenue lors de la récupération de l\'action');
        }

        $form = $this->createForm(type: MentorActionType::class, data: $action);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $logbook = $action->getLogbook();

            if (!$logbook) {
                throw $this->createNotFoundException('Aucun carnet associé à cette action.');
            }

            $logbookId = $logbook->getId();

            // Enregistrer les commentaires
            $date = new \DateTime(datetime: 'now', timezone: new \DateTimeZone(timezone: 'Europe/Paris'));
            $formattedDate = $date->format(format: 'd/m/Y');
            $action->setMentorCommentedAt($date);

            $entityManager->persist($action);
            $entityManager->flush();

            $this->addFlash(type: 'success', message: 'Les commentaires ont été enregistrés avec succès.');

            return $this->redirectToRoute(
                route: 'mentor_logbook_details',
                parameters: [
                    'padawanNni' => $request->attributes->get(key: 'padawanNni'),
                    'nni' => $request->attributes->get(key: 'nni'),
                    'id' => $logbookId,
                ]
            );
        }

        // Render de la vue
        return $this->render(
            view: 'action/edit.html.twig',
            parameters: [
                'form' => $form->createView(),
                'action' => $action,
            ]
        );
    }

    #[Route('/{logbookId}/module/{moduleId}/action/{actionId}/validate', name: 'action_validate', methods: ['GET', 'POST'])]
    public function validate(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer l'action par son ID
        $action = $entityManager->getRepository(Action::class)->find(id: $request->attributes->get(key: 'actionId'));

        if (!$action) {
            throw $this->createNotFoundException(message: 'Une erreur est survenue lors de la récupération de l\'action');
        }

        // Vérifier que l'action a bien un carnet associé avant de persister
        $logbook = $action->getLogbook();
        if (!$logbook) {
            throw $this->createNotFoundException(message: 'Aucun carnet associé à cette action.');
        }

        // Vérifier si l'utilisateur est connecté et s'assurer qu'il a un fullName
        $mentor = $this->getUser();
        if (!$mentor || !method_exists($mentor, method: 'getFullName')) {
            throw $this->createAccessDeniedException(message: 'Utilisateur non authentifié ou utilisateur invalide.');
        }

        // Créer le visa numérique
        $fullName = $mentor->getFullName();
        if (!is_string($fullName)) {
            $fullName = 'Utilisateur'; // Valeur par défaut si getFullName() ne retourne pas une chaîne
        }
        $mentorVisa = 'Validation numérique de ' . $fullName . ' le ' . (new \DateTime())->format(format: 'd/m/Y');
        $action->setMentorVisa($mentorVisa);

        // Récupérer la date actuelle et la définir pour l'action
        $date = new \DateTime(datetime: 'now', timezone: new \DateTimeZone(timezone: 'Europe/Paris'));
        $action->setMentorValidatedAt($date);

        // Sauvegarder l'action après vérification
        $entityManager->persist($action);
        $entityManager->flush();

        $this->addFlash(type: 'success', message: 'L\'action a été validée avec succès.');

        // Utiliser le carnet associé pour la redirection
        return $this->redirectToRoute(
            route: 'mentor_logbook_details',
            parameters: [
                'padawanNni' => $request->attributes->get(key: 'padawanNni'),
                'nni' => $request->attributes->get(key: 'nni'),
                'id' => $logbook->getId(),
            ]
        );
    }

    #[Route('/{logbookId}/module/{moduleId}/action/{actionId}/invalidate', name: 'action_invalidate', methods: ['GET', 'POST'])]
    public function invalidate(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer l'action par son ID
        $action = $this->entityManager->getRepository(Action::class)->find(id: $request->attributes->get(key: 'actionId'));

        if (!$action) {
            throw $this->createNotFoundException('Une erreur est survenue lors de la récupération de l\'action');
        }

        // Vérifier que l'action a bien un carnet associé
        $logbook = $action->getLogbook();
        if (!$logbook) {
            throw $this->createNotFoundException('Aucun carnet associé à cette action.');
        }

        // Récupérer l'ID du carnet
        $logbookId = $logbook->getId();

        $action->setMentorVisa(mentorVisa: null);
        $action->setMentorValidatedAt(mentorValidatedAt: null);

        $entityManager->persist($action);
        $entityManager->flush();

        $this->addFlash(type: 'danger', message: 'Vous avez retiré votre validation de l\'action.');

        return $this->redirectToRoute(
            route: 'mentor_logbook_details',
            parameters: [
                'padawanNni' => $request->attributes->get(key: 'padawanNni'),
                'nni' => $request->attributes->get(key: 'nni'),
                'id' => $logbook->getId(),
            ]
        );
    }

    #[Route('/{logbookId}/module/{moduleId}/action/{actionId}/delete-mentor-comment', name: 'action_delete_comment', methods: ['GET', 'POST'])]
    public function deleteComment(Request $request): RedirectResponse
    {
        // Récupérer l'action par son ID
        $action = $this->entityManager->getRepository(Action::class)->find(id: $request->attributes->get(key: 'actionId'));

        if (!$action) {
            throw $this->createNotFoundException('Une erreur est survenue lors de la récupération de l\'action.');
        }

        $logbook = $action->getLogbook();
        if (!$logbook) {
            // Ajout d'un log pour débogage
            error_log(message: 'Action ID: ' . $action->getId() . ' n\'a pas de carnet associé.');
            throw $this->createNotFoundException('Aucun carnet associé à cette action.');
        }

        // Nous avons déjà vérifié que $logbook n'est pas null à la ligne 212

        // Suppression du commentaire
        $this->mentorService->deleteComment();
        $this->addFlash(type: 'success', message: 'Votre commentaire a été supprimé avec succès.');

        return $this->redirectToRoute(
            route: 'mentor_logbook_details',
            parameters: [
                'padawanNni' => $request->attributes->get(key: 'padawanNni'),
                'nni' => $request->attributes->get(key: 'nni'),
                'id' => $logbook->getId(),
            ]
        );
    }
}
