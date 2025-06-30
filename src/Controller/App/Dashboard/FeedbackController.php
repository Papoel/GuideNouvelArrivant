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
        $feedbacks = $feedbackRepository->findBy(['author' => $user], ['createdAt' => 'DESC']);

        return $this->render('app/dashboard/feedback/my_feedbacks.html.twig', [
            'feedbacks' => $feedbacks,
            'nni' => $nni,
        ]);
    }

    #[Route('/my-feedbacks/{id}', name: 'detail', methods: [Request::METHOD_GET])]
    public function detail(string $nni, Feedback $feedback): Response
    {
        // Vérifier que l'utilisateur est bien l'auteur du feedback
        if ($feedback->getAuthor() !== $this->getUser()) {
            throw $this->createAccessDeniedException('Vous n\'êtes pas autorisé à accéder à ce retour d\'expérience.');
        }

        return $this->render('app/dashboard/feedback/my_feedback_detail.html.twig', [
            'feedback' => $feedback,
            'nni' => $nni,
        ]);
    }

    #[Route('/new', name: 'new', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function new(string $nni, Request $request, EntityManagerInterface $entityManager): Response
    {
        $feedback = new Feedback();
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();

            $feedback->setAuthor($user instanceof User ? $user : null);
            $feedback->setIsReviewed(false);

            $entityManager->persist($feedback);
            $entityManager->flush();

            $this->addFlash('success', 'Votre retour d\'expérience a été enregistré avec succès.');

            return $this->redirectToRoute('dashboard_index', ['nni' => $nni]);
        }

        return $this->render('app/dashboard/feedback/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/list', name: 'list', methods: [Request::METHOD_GET])]
    public function list(FeedbackRepository $feedbackRepository): Response
    {
        $feedbacks = $feedbackRepository->findBy([], ['createdAt' => 'DESC']);

        return $this->render('app/dashboard/feedback/list.html.twig', [
            'feedbacks' => $feedbacks,
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/{id}/review', name: 'review', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function review(Feedback $feedback, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            // $comment = $request->request->get('managerComment');

            $rawComment = $request->request->get('managerComment');
            $comment = is_scalar($rawComment) ? (string) $rawComment : null;
            $user = $this->getUser();

            $feedback->setManagerComment($comment);
            $feedback->setReviewedBy($user instanceof User ? $user : null);
            $feedback->setIsReviewed(true);
            $feedback->setReviewAt(new \DateTimeImmutable());

            $entityManager->flush();

            $this->addFlash('success', 'Le retour d\'expérience a été traité avec succès.');

            return $this->redirectToRoute('my_feedbacks_list');
        }

        return $this->render('app/dashboard/feedback/review.html.twig', [
            'feedback' => $feedback,
        ]);
    }
}
