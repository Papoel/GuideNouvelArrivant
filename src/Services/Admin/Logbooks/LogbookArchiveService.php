<?php

declare(strict_types=1);

namespace App\Services\Admin\Logbooks;

use App\Entity\Logbook;
use App\Entity\LogbookArchive;
use App\Entity\Module;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\Admin\interfaces\UserProgressServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

/** Service responsable de la création des archives de carnets.
 *
 * Avant toute suppression d'utilisateur ou de carnet, le carnet est figé dans
 * une LogbookArchive qui conserve son contenu probant (identité du titulaire,
 * nom du tuteur, actions/commentaires/visas en JSON et PDF binaire) pendant
 * la durée de conservation définie par LogbookArchive::RETENTION_YEARS.
 *
 * L'archive est persistée sans flush : l'appelant contrôle la transaction afin
 * que l'archivage et la suppression soient atomiques.
 */
readonly class LogbookArchiveService
{
    private const string FROM = 'no-reply@gna.papoel.fr';

    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserProgressServiceInterface $userProgressService,
        private UserRepository $userRepository,
        private MailerInterface $mailer,
    ) {
    }

    /** Fige un carnet dans une archive (persistée, non flushée).
     *
     * @param Logbook   $logbook Carnet à archiver (peut être orphelin)
     * @param User|null $actor   Utilisateur à l'origine de la suppression
     */
    public function archiveLogbook(Logbook $logbook, ?User $actor = null): LogbookArchive
    {
        $owner = $logbook->getOwner();

        $archive = (new LogbookArchive())
            ->setOwnerFirstname($owner?->getFirstname() ?? 'Inconnu')
            ->setOwnerLastname($owner?->getLastname() ?? 'Inconnu')
            ->setOwnerNni($owner?->getNni())
            ->setOwnerEmail($owner?->getEmail())
            ->setOwnerService($owner?->getService()?->getName())
            ->setOwnerJob($owner?->getJob()?->getName())
            ->setHiringAt($owner?->getHiringAt())
            ->setMentorName($this->resolveMentorName($logbook))
            ->setPayload($this->buildPayload($logbook))
            ->setArchivedBy($actor?->getFullname());

        // Le PDF n'est générable que si le titulaire existe encore : la
        // génération parcourt ses données (carnet, progression, tuteur).
        if ($owner) {
            $this->attachPdf($archive, $owner);
        }

        $this->entityManager->persist($archive);
        $this->notifyArchived($archive);

        return $archive;
    }

    /** Notifie les administrateurs du service du titulaire (mail groupé) et le
     * titulaire — joint sur l'email figé dans l'archive puisque son compte
     * est supprimé. */
    private function notifyArchived(LogbookArchive $archive): void
    {
        $subject = sprintf(
            'Archivage : le carnet de %s est conservé %d ans',
            $archive->getOwnerFullname(),
            LogbookArchive::RETENTION_YEARS,
        );

        $adminEmails = $this->adminEmailsForService($archive->getOwnerService());

        $recipientGroups = [$adminEmails];
        if (null !== $ownerEmail = $archive->getOwnerEmail()) {
            $recipientGroups[] = [$ownerEmail];
        }

        foreach (array_filter($recipientGroups) as $recipients) {
            $email = (new TemplatedEmail())
                ->from(new Address(self::FROM, 'GuideNouvelArrivant'))
                ->to(...$recipients)
                ->subject($subject)
                ->htmlTemplate('emails/archives/logbook_archived.html.twig')
                ->context(['archive' => $archive]);

            $this->mailer->send($email);
        }
    }

    /** Emails des ROLE_ADMIN rattachés au service donné (les SUPER_ADMIN ne
     * sont pas notifiés : décision produit — périmètre du service uniquement).
     * @return list<string> */
    private function adminEmailsForService(?string $serviceName): array
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

    /** Nom du tuteur à conserver : le champ figé du carnet prime, sinon la
     * relation mentor encore vivante du titulaire. */
    private function resolveMentorName(Logbook $logbook): ?string
    {
        return $logbook->getMentorName()
            ?? $logbook->getOwner()?->getMentor()?->getFullname();
    }

    /** Génère le PDF du carnet via le service existant et l'attache à l'archive. */
    private function attachPdf(LogbookArchive $archive, User $owner): void
    {
        $content = $this->userProgressService->generateUserWorkbookPdf($owner)->getContent();

        if (!is_string($content) || !str_starts_with($content, '%PDF')) {
            return;
        }

        $archive->setPdf($content);
        $archive->setPdfFilename(sprintf(
            'carnet-compagnonnage-%s-%s-%s.pdf',
            strtolower($owner->getFirstname()),
            strtolower($owner->getLastname()),
            $archive->getArchivedAt()->format('Y-m-d'),
        ));
    }

    /** Sérialise le contenu complet du carnet : thèmes, modules, et pour chaque
     * module l'action associée avec ses commentaires et visas (des deux côtés).
     *
     * @return array{name: string|null, themes: list<array<string, mixed>>} */
    private function buildPayload(Logbook $logbook): array
    {
        $themes = [];
        foreach ($logbook->getThemes() as $theme) {
            $modules = [];
            foreach ($theme->getModules() as $module) {
                $modules[] = [
                    'id' => $module->getId()?->toRfc4122(),
                    'title' => $module->getTitle(),
                    'description' => $module->getDescription(),
                    'action' => $this->serializeAction($this->findActionForModule($logbook, $module)),
                ];
            }

            $themes[] = [
                'id' => $theme->getId()?->toRfc4122(),
                'title' => $theme->getTitle(),
                'description' => $theme->getDescription(),
                'modules' => $modules,
            ];
        }

        return [
            'name' => $logbook->getName(),
            'themes' => $themes,
        ];
    }

    /** Action du carnet associée à un module donné, ou null. */
    private function findActionForModule(Logbook $logbook, Module $module): ?\App\Entity\Action
    {
        foreach ($logbook->getActions() as $action) {
            if ($action->getModule() === $module) {
                return $action;
            }
        }

        return null;
    }

    /** @return array<string, string|null>|null */
    private function serializeAction(?\App\Entity\Action $action): ?array
    {
        if (null === $action) {
            return null;
        }

        return [
            'description' => $action->getDescription(),
            'agent_comment' => $action->getAgentComment(),
            'agent_validated_at' => $action->getAgentValidatedAt()?->format(\DateTimeInterface::ATOM),
            'agent_visa' => $action->getAgentVisa(),
            'mentor_comment' => $action->getMentorComment(),
            'mentor_validated_at' => $action->getMentorValidatedAt()?->format(\DateTimeInterface::ATOM),
            'mentor_commented_at' => $action->getMentorCommentedAt()?->format(\DateTimeInterface::ATOM),
            'mentor_visa' => $action->getMentorVisa(),
        ];
    }
}
