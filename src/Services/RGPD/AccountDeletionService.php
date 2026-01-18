<?php

declare(strict_types=1);

namespace App\Services\RGPD;

use App\Entity\DeletionRequest;
use App\Entity\User;
use App\Repository\DeletionRequestRepository;
use App\Repository\FeedbackRepository;
use App\Repository\LogbookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AccountDeletionService
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly DeletionRequestRepository $deletionRequestRepository,
        private readonly LogbookRepository $logbookRepository,
        private readonly FeedbackRepository $feedbackRepository,
        private readonly MailerInterface $mailer,
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {
    }

    public function createDeletionRequest(User $user, User $requestedBy): DeletionRequest
    {
        $existingRequest = $this->deletionRequestRepository->findPendingRequestForUser($user);
        if ($existingRequest !== null) {
            throw new \RuntimeException('Une demande de suppression est déjà en cours pour cet utilisateur.');
        }

        $deletionRequest = new DeletionRequest();
        $deletionRequest->setUser($user);
        $deletionRequest->setRequestedBy($requestedBy);
        $deletionRequest->setUserInfo($this->buildUserInfo($user));

        $this->entityManager->persist($deletionRequest);
        $this->entityManager->flush();

        $this->sendDeletionRequestEmail($deletionRequest);

        return $deletionRequest;
    }

    public function cancelDeletionRequest(DeletionRequest $deletionRequest): void
    {
        if (!$deletionRequest->canBeCancelled()) {
            throw new \RuntimeException('Cette demande ne peut plus être annulée.');
        }

        $user = $deletionRequest->getUser();
        $deletionRequest->cancel();
        $this->entityManager->flush();

        if ($user !== null) {
            $this->sendCancellationEmail($user, $deletionRequest);
        }
    }

    public function cancelDeletionRequestByToken(string $token): ?DeletionRequest
    {
        $deletionRequest = $this->deletionRequestRepository->findByToken($token);

        if ($deletionRequest === null) {
            return null;
        }

        if (!$deletionRequest->canBeCancelled()) {
            return null;
        }

        $user = $deletionRequest->getUser();
        $deletionRequest->cancel();
        $this->entityManager->flush();

        if ($user !== null) {
            $this->sendCancellationEmail($user, $deletionRequest);
        }

        return $deletionRequest;
    }

    public function processExpiredRequests(): int
    {
        $requests = $this->deletionRequestRepository->findPendingRequestsReadyForDeletion();
        $processedCount = 0;

        foreach ($requests as $request) {
            $user = $request->getUser();
            if ($user === null) {
                $request->markAsProcessed();
                continue;
            }

            $this->deleteUserData($user);
            $this->sendDeletionConfirmationEmail($user, $request);

            $request->markAsProcessed();
            $processedCount++;
        }

        $this->entityManager->flush();

        return $processedCount;
    }

    private function deleteUserData(User $user): void
    {
        $logbooks = $this->logbookRepository->findBy(['owner' => $user]);
        foreach ($logbooks as $logbook) {
            $this->entityManager->remove($logbook);
        }

        $feedbacks = $this->feedbackRepository->findBy(['author' => $user]);
        foreach ($feedbacks as $feedback) {
            $this->entityManager->remove($feedback);
        }

        $this->entityManager->remove($user);
    }

    private function sendDeletionRequestEmail(DeletionRequest $deletionRequest): void
    {
        $user = $deletionRequest->getUser();
        if ($user === null || $user->getEmail() === null) {
            return;
        }

        $cancellationUrl = $this->urlGenerator->generate(
            'app_account_deletion_cancel_by_token',
            ['token' => $deletionRequest->getCancellationToken()],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        $email = (new TemplatedEmail())
            ->from(new Address('no-reply@gna.papoel.fr', 'GuideNouvelArrivant'))
            ->to($user->getEmail())
            ->subject('Demande de suppression de votre compte')
            ->htmlTemplate('emails/rgpd/deletion_request.html.twig')
            ->context([
                'user' => $user,
                'deletionRequest' => $deletionRequest,
                'cancellationUrl' => $cancellationUrl,
            ]);

        $this->mailer->send($email);
    }

    private function sendDeletionConfirmationEmail(User $user, DeletionRequest $request): void
    {
        if ($user->getEmail() === null) {
            return;
        }

        $email = (new TemplatedEmail())
            ->from(new Address('no-reply@gna.papoel.fr', 'GuideNouvelArrivant'))
            ->to($user->getEmail())
            ->subject('Confirmation de suppression de votre compte')
            ->htmlTemplate('emails/rgpd/deletion_confirmation.html.twig')
            ->context([
                'user' => $user,
                'deletionRequest' => $request,
            ]);

        $this->mailer->send($email);
    }

    private function sendCancellationEmail(User $user, DeletionRequest $request): void
    {
        if ($user->getEmail() === null) {
            return;
        }

        $email = (new TemplatedEmail())
            ->from(new Address('no-reply@gna.papoel.fr', 'GuideNouvelArrivant'))
            ->to($user->getEmail())
            ->subject('Annulation de votre demande de suppression de compte')
            ->htmlTemplate('emails/rgpd/deletion_cancellation.html.twig')
            ->context([
                'user' => $user,
                'deletionRequest' => $request,
            ]);

        $this->mailer->send($email);
    }

    public function getPendingRequestForUser(User $user): ?DeletionRequest
    {
        return $this->deletionRequestRepository->findPendingRequestForUser($user);
    }

    private function buildUserInfo(User $user): string
    {
        $service = $user->getService()?->getName() ?? 'N/A';

        return sprintf(
            '%s %s | %s | %s',
            $user->getFirstname(),
            $user->getLastname(),
            $user->getNni() ?? 'N/A',
            $service
        );
    }
}
