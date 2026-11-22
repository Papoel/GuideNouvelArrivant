<?php

declare(strict_types=1);

namespace App\Services\Admin\Logbooks;

use App\Entity\LogbookArchive;
use App\Repository\LogbookArchiveRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

/**
 * Purge des archives de carnets arrivées en fin de conservation (5 ans).
 *
 * Deux traitements en un passage, pensé pour être relancé sans effet de bord :
 *  - avertissement J-$warningDays aux administrateurs et au détenteur du carnet,
 *    horodaté via warningSentAt pour ne jamais être renvoyé ;
 *  - suppression définitive des archives expirées, avec mail de confirmation
 *    rappelant le fondement RGPD / politique de confidentialité.
 */
class LogbookArchivePurgeService
{
    private const string FROM = 'no-reply@gna.papoel.fr';

    public function __construct(
        private readonly LogbookArchiveRepository $archiveRepository,
        private readonly UserRepository $userRepository,
        private readonly EntityManagerInterface $entityManager,
        private readonly MailerInterface $mailer,
        #[Autowire(param: 'archive_warning_days')]
        private readonly int $warningDays = 30,
    ) {
    }

    public function purge(): void
    {
        $this->warnExpiringSoon();
        $this->deleteExpired();
    }

    /** Avertit admins + détenteur pour chaque archive expirant bientôt,
     * puis horodate l'envoi pour garantir l'idempotence. */
    private function warnExpiringSoon(): void
    {
        foreach ($this->archiveRepository->findExpiringSoon($this->warningDays) as $archive) {
            $this->notify(
                $archive,
                sprintf('Archivage : le carnet de %s expire dans %d jours', $archive->getOwnerFullname(), $this->warningDays),
                'emails/archives/expiration_warning.html.twig',
            );
            $archive->setWarningSentAt(new \DateTimeImmutable());
            $this->entityManager->flush();
        }
    }

    /** Supprime définitivement les archives expirées et notifie admins + détenteur. */
    private function deleteExpired(): void
    {
        foreach ($this->archiveRepository->findExpired() as $archive) {
            $this->notify(
                $archive,
                sprintf('Archivage : le carnet de %s a été purgé', $archive->getOwnerFullname()),
                'emails/archives/purge_confirmation.html.twig',
            );
            $this->entityManager->remove($archive);
            $this->entityManager->flush();
        }
    }

    /** Envoie un mail groupé aux administrateurs et un mail au détenteur.
     * Le détenteur est joint sur l'email figé dans l'archive : son compte
     * n'existe généralement plus. */
    private function notify(LogbookArchive $archive, string $subject, string $template): void
    {
        $adminEmails = $this->adminEmails($archive->getOwnerService());
        if ($adminEmails !== []) {
            $this->send($adminEmails, $subject, $template, $archive);
        }
        if (($ownerEmail = $archive->getOwnerEmail()) !== null) {
            $this->send([$ownerEmail], $subject, $template, $archive);
        }
    }

    /** Emails des ROLE_ADMIN du service du titulaire (les SUPER_ADMIN ne sont
     * pas notifiés : décision produit — périmètre du service uniquement).
     * @return list<string> */
    private function adminEmails(?string $serviceName): array
    {
        if (null === $serviceName) {
            return [];
        }

        $emails = [];
        foreach ($this->userRepository->findByRole('ROLE_ADMIN') as $admin) {
            if (
                $admin->getEmail() !== null
                && $admin->getService()?->getName() === $serviceName
            ) {
                $emails[] = $admin->getEmail();
            }
        }

        return array_values(array_unique($emails));
    }

    /** @param list<string> $to */
    private function send(array $to, string $subject, string $template, LogbookArchive $archive): void
    {
        $email = (new TemplatedEmail())
            ->from(new Address(self::FROM, 'GuideNouvelArrivant'))
            ->to(...$to)
            ->subject($subject)
            ->htmlTemplate($template)
            ->context([
                'archive' => $archive,
                'warningDays' => $this->warningDays,
            ]);

        $this->mailer->send($email);
    }
}
