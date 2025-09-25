<?php

namespace App\Controller\Mail_Testing;

use App\Repository\LogbookRepository;
use App\Services\Logbook\LogbookProgressService;
use App\Services\Mail\MentorReminderEmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[isGranted('ROLE_ADMIN')]
final class MailController extends AbstractController
{
    public function __construct(
        private readonly LogbookProgressService $logbookProgressService,
        private readonly LogbookRepository $logbookRepository,
        private readonly MentorReminderEmailService $reminderService,
    ) {}

    #[Route('/mailing/preview', name: 'app_mailing_preview')]
    public function preview(): Response
    {
        $logbooks = $this->logbookRepository->findAllWithOwnerAndMentor();
        $mentorsWithPending = $this->logbookProgressService->getMentorsWithPendingValidations($logbooks);

        // Récupérer le premier mentor pour l'aperçu
        $firstMentor = reset($mentorsWithPending['mentors_with_pending_modules']);

        if (!$firstMentor) {
            throw new NotFoundHttpException('Aucun mentor avec des modules en attente');
        }

        // Préparer les données pour le template
        $reminderData = $this->reminderService->prepareReminderData($firstMentor);

        // Pour la cohérence, utiliser le même Content-ID que dans sendEmails
        // Mais comme c'est juste un aperçu web, l'image sera chargée via l'URL absolue
        $reminderData['logo_cid'] = 'logo';

        return $this->render('mail/mentorReminderEmailTemplate.html.twig', $reminderData);
    }

    #[Route('/mailing/send', name: 'app_mailing_send')]
    public function sendEmails(
        MentorReminderEmailService $reminderService,
        MailerInterface $mailer
    ): Response {
        $logbooks = $this->logbookRepository->findAllWithOwnerAndMentor();
        $mentorsWithPending = $this->logbookProgressService->getMentorsWithPendingValidations($logbooks);

        $sentEmails = 0;

        // Chemin du logo
        $projectDirParameter = $this->getParameter('kernel.project_dir');
        if (!is_string($projectDirParameter)) {
            throw new \RuntimeException('kernel.project_dir doit être une chaîne de caractères');
        }
        $logoPath = $projectDirParameter . '/public/images/logos/edf.png';

        foreach ($mentorsWithPending['mentors_with_pending_modules'] as $mentorData) {
            $reminderData = $reminderService->prepareReminderData($mentorData);

            // Générer un Content-ID pour le logo (doit contenir un '@' selon la spec)
            $contentId = 'logo@gna-edf.fr';
            $reminderData['logo_cid'] = $contentId;

            // Rendre le template avec les données
            $htmlContent = $this->renderView('mail/MentorReminderEmailTemplate.html.twig', $reminderData);

            // Créer l'email
            $emailSubject = $reminderData['subject'];

            $email = (new Email())
                ->from('no-reply@gna.papoel.fr')
                ->to($mentorData['mentor_email'])
                ->subject($emailSubject)
                ->html($htmlContent);

            // Intégrer le logo en suivant l'exemple exact de la documentation Symfony
            if (file_exists($logoPath)) {
                // Utiliser directement le nom de l'image comme Content-ID (plus simple)
                // Le deuxième paramètre est le nom qui sera utilisé comme Content-ID
                $email->addPart((new DataPart(new File($logoPath), 'logo', 'image/png'))->asInline());

                // Dans le template, on utilise juste cid:logo pour y faire référence
                // On met à jour le template pour utiliser ce Content-ID simple
                $reminderData['logo_cid'] = 'logo';
                $htmlContent = $this->renderView('mail/mentorReminderEmailTemplate.html.twig', $reminderData);
                $email->html($htmlContent);
            }

            $mailer->send($email);
            $sentEmails++;
        }

        $this->addFlash('success', sprintf('%d emails de rappel envoyés avec succès.', $sentEmails));

        $user = $this->getUser();
        $nni = null;

        if ($user instanceof \App\Entity\User) {
            $nni = $user->getNni();
        }

        return $this->redirectToRoute('dashboard_index', [
            'nni' => $nni,
        ]);
    }
}
