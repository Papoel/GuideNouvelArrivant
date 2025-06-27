<?php

namespace App\Controller\App\Dashboard;

use App\Entity\Feedback;
use App\Form\FeedbackType;
use App\Repository\FeedbackRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
#[Route('/dashboard/{nni}/feedback', name: 'dashboard_feedback_')]
class FeedbackController extends AbstractController
{
    #[Route('/new', name: 'new', methods: [Request::METHOD_GET, Request::METHOD_POST])]
    public function new(string $nni, Request $request, EntityManagerInterface $entityManager): Response
    {
        $feedback = new Feedback();
        $form = $this->createForm(FeedbackType::class, $feedback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $feedback->setAuthor($this->getUser());
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
            $comment = $request->request->get('managerComment');
            
            $feedback->setManagerComment($comment);
            $feedback->setIsReviewed(true);
            $feedback->setReviewedBy($this->getUser());
            $feedback->setReviewAt(new \DateTimeImmutable());
            
            $entityManager->flush();
            
            $this->addFlash('success', 'Le retour d\'expérience a été traité avec succès.');
            
            return $this->redirectToRoute('dashboard_feedback_list');
        }
        
        return $this->render('app/dashboard/feedback/review.html.twig', [
            'feedback' => $feedback,
        ]);
    }
}
