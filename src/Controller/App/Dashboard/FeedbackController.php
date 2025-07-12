<?php

namespace App\Controller\App\Dashboard;

use App\Entity\Feedback;
use App\Entity\User;
use App\Form\FeedbackType;
use App\Repository\FeedbackRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
#[Route('/dashboard/{nni}/feedback', name: 'my_feedbacks_')]
class FeedbackController extends AbstractController
{
    #[Route('/my-feedbacks', name: 'index', methods: [Request::METHOD_GET])]
    public function index(string $nni, FeedbackRepository $feedbackRepository): Response
    {
        $user = $this->getUser();
        $feedbacks = $feedbackRepository->findBy(criteria: ['author' => $user], orderBy: ['createdAt' => 'DESC']);

        return $this->render(
            view: 'app/dashboard/feedback/my_feedbacks.html.twig',
            parameters: [
            'feedbacks' => $feedbacks,
            'nni' => $nni,
            ]
        );
    }

    #[Route('/my-feedbacks/{id}', name: 'detail', methods: [Request::METHOD_GET])]
    public function detail(string $nni, Feedback $feedback): Response
    {
        // Vérifier que l'utilisateur est bien l'auteur du feedback
        if ($feedback->getAuthor() !== $this->getUser()) {
            throw $this->createAccessDeniedException(message: 'Vous n\'êtes pas autorisé à accéder à ce retour d\'expérience.');
        }

        return $this->render(
            view: 'app/dashboard/feedback/my_feedback_detail.html.twig',
            parameters: [
            'feedback' => $feedback,
            'nni' => $nni,
            ]
        );
    }

    #[Route('/new', name: 'new', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function new(string $nni, Request $request, EntityManagerInterface $entityManager): Response
    {
        $feedback = new Feedback();
        $form = $this->createForm(type: FeedbackType::class, data: $feedback);
        $form->handleRequest(request: $request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();

            $feedback->setAuthor(author: $user instanceof User ? $user : null);
            $feedback->setIsReviewed(isReviewed: false);

            $entityManager->persist(object: $feedback);
            $entityManager->flush();

            $this->addFlash(type: 'success', message: 'Votre retour d\'expérience a été enregistré avec succès.');

            return $this->redirectToRoute(route: 'dashboard_index', parameters: ['nni' => $nni]);
        }

        return $this->render(
            view: 'app/dashboard/feedback/new.html.twig',
            parameters: [
            'form' => $form,
            ]
        );
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/list', name: 'list', methods: [Request::METHOD_GET])]
    public function list(FeedbackRepository $feedbackRepository): Response
    {
        $feedbacks = $feedbackRepository->findBy([], ['createdAt' => 'DESC']);

        return $this->render(
            view: 'app/dashboard/feedback/list.html.twig',
            parameters: [
            'feedbacks' => $feedbacks,
            ]
        );
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/review', name: 'review', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function review(Feedback $feedback, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod(method: 'POST')) {
            // $comment = $request->request->get('managerComment');

            $rawComment = $request->request->get(key: 'managerComment');
            $comment = is_scalar(value: $rawComment) ? (string) $rawComment : null;
            $user = $this->getUser();

            $feedback->setManagerComment($comment);
            $feedback->setReviewedBy(reviewedBy: $user instanceof User ? $user : null);
            $feedback->setIsReviewed(isReviewed: true);
            $feedback->setReviewAt(reviewAt: new \DateTimeImmutable());

            $entityManager->flush();

            $this->addFlash(type: 'success', message: 'Le retour d\'expérience a été traité avec succès.');

            return $this->redirectToRoute(route: 'my_feedbacks_list');
        }

        return $this->render(
            view: 'app/dashboard/feedback/review.html.twig',
            parameters: [
            'feedback' => $feedback,
            ]
        );
    }
}
