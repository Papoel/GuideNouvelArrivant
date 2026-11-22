<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\LogbookArchiveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/** Archive figée d'un carnet de compagnonnage.
 *
 * Créée automatiquement avant la suppression d'un utilisateur : elle conserve
 * le contenu probant du carnet (snapshot d'identité, nom du tuteur, contenu
 * structuré JSON et PDF binaire) pendant 5 ans, après quoi une tâche planifiée
 * la purge définitivement (politique de conservation RGPD).
 */
#[ORM\Entity(repositoryClass: LogbookArchiveRepository::class)]
#[ORM\Table(name: 'logbook_archives')]
class LogbookArchive
{
    /** Durée de conservation réglementaire d'une archive. */
    public const RETENTION_YEARS = 5;

    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    #[Assert\Uuid]
    /** @phpstan-ignore-next-line */
    private ?Uuid $id = null;

    #[ORM\Column(length: 50)]
    private ?string $ownerFirstname = null;

    #[ORM\Column(length: 50)]
    private ?string $ownerLastname = null;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $ownerNni = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $ownerEmail = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ownerService = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ownerJob = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $hiringAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mentorName = null;

    /** Contenu structuré complet du carnet (thèmes, modules, actions).
     * @var array<string, mixed> */
    #[ORM\Column(type: Types::JSON)]
    private array $payload = [];

    /** PDF du carnet encodé en base64 (colonne MEDIUMTEXT) : le binaire reste
     * dans la base et profite des sauvegardes mysqldump existantes. */
    #[ORM\Column(type: Types::TEXT, columnDefinition: 'MEDIUMTEXT', nullable: true)]
    private ?string $pdf = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pdfFilename = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeImmutable $archivedAt;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $archivedBy = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeImmutable $expiresAt;

    /** Date d'envoi de l'avertissement J-30 — rend la purge idempotente :
     * relancée, la tâche ne renvoie pas de second avertissement. */
    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $warningSentAt = null;

    public function __construct()
    {
        $this->archivedAt = new \DateTimeImmutable();
        $this->expiresAt = $this->archivedAt->modify('+' . self::RETENTION_YEARS . ' years');
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getOwnerFirstname(): ?string
    {
        return $this->ownerFirstname;
    }

    public function setOwnerFirstname(string $ownerFirstname): static
    {
        $this->ownerFirstname = $ownerFirstname;
        return $this;
    }

    public function getOwnerLastname(): ?string
    {
        return $this->ownerLastname;
    }

    public function setOwnerLastname(string $ownerLastname): static
    {
        $this->ownerLastname = $ownerLastname;
        return $this;
    }

    public function getOwnerFullname(): string
    {
        return trim(sprintf('%s %s', (string) $this->ownerFirstname, (string) $this->ownerLastname));
    }

    public function getOwnerNni(): ?string
    {
        return $this->ownerNni;
    }

    public function setOwnerNni(?string $ownerNni): static
    {
        $this->ownerNni = $ownerNni;
        return $this;
    }

    public function getOwnerEmail(): ?string
    {
        return $this->ownerEmail;
    }

    public function setOwnerEmail(?string $ownerEmail): static
    {
        $this->ownerEmail = $ownerEmail;
        return $this;
    }

    public function getOwnerService(): ?string
    {
        return $this->ownerService;
    }

    public function setOwnerService(?string $ownerService): static
    {
        $this->ownerService = $ownerService;
        return $this;
    }

    public function getOwnerJob(): ?string
    {
        return $this->ownerJob;
    }

    public function setOwnerJob(?string $ownerJob): static
    {
        $this->ownerJob = $ownerJob;
        return $this;
    }

    public function getHiringAt(): ?\DateTimeImmutable
    {
        return $this->hiringAt;
    }

    public function setHiringAt(?\DateTimeImmutable $hiringAt): static
    {
        $this->hiringAt = $hiringAt;
        return $this;
    }

    public function getMentorName(): ?string
    {
        return $this->mentorName;
    }

    public function setMentorName(?string $mentorName): static
    {
        $this->mentorName = $mentorName;
        return $this;
    }

    /** @return array<string, mixed> */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /** Représentation JSON lisible pour l'affichage (EasyAdmin ne sait pas rendre un array). */
    public function getPayloadJson(): string
    {
        return (string) json_encode(
            $this->payload,
            \JSON_PRETTY_PRINT | \JSON_UNESCAPED_UNICODE | \JSON_UNESCAPED_SLASHES,
        );
    }

    /** @param array<string, mixed> $payload */
    public function setPayload(array $payload): static
    {
        $this->payload = $payload;
        return $this;
    }

    /** Retourne le contenu binaire du PDF archivé (décodé depuis le base64). */
    public function getPdf(): ?string
    {
        if (null === $this->pdf) {
            return null;
        }

        $decoded = base64_decode($this->pdf, true);

        return false === $decoded ? null : $decoded;
    }

    /** Stocke le PDF sous forme binaire ; il est encodé en base64 en colonne. */
    public function setPdf(?string $pdf): static
    {
        $this->pdf = null === $pdf ? null : base64_encode($pdf);
        return $this;
    }

    public function getPdfFilename(): ?string
    {
        return $this->pdfFilename;
    }

    public function setPdfFilename(?string $pdfFilename): static
    {
        $this->pdfFilename = $pdfFilename;
        return $this;
    }

    public function getArchivedAt(): \DateTimeImmutable
    {
        return $this->archivedAt;
    }

    public function getArchivedBy(): ?string
    {
        return $this->archivedBy;
    }

    public function setArchivedBy(?string $archivedBy): static
    {
        $this->archivedBy = $archivedBy;
        return $this;
    }

    public function getExpiresAt(): \DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(\DateTimeImmutable $expiresAt): static
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    public function getWarningSentAt(): ?\DateTimeImmutable
    {
        return $this->warningSentAt;
    }

    public function setWarningSentAt(?\DateTimeImmutable $warningSentAt): static
    {
        $this->warningSentAt = $warningSentAt;

        return $this;
    }

    /** L'archive a dépassé sa durée de conservation : la purge peut la supprimer. */
    public function isExpired(): bool
    {
        return $this->expiresAt <= new \DateTimeImmutable();
    }

    /** Temps restant avant purge définitive, ou null si l'archive est expirée. */
    public function getRemainingTime(): ?\DateInterval
    {
        $now = new \DateTimeImmutable();
        if ($this->expiresAt <= $now) {
            return null;
        }

        return $now->diff($this->expiresAt);
    }

    /** Libellé lisible du temps restant, pour le badge de la page Archives. */
    public function getRemainingTimeLabel(): string
    {
        $remaining = $this->getRemainingTime();
        if (null === $remaining) {
            return 'Expirée';
        }

        $parts = [];
        if ($remaining->y > 0) {
            $parts[] = $remaining->y . ' an' . ($remaining->y > 1 ? 's' : '');
        }
        if ($remaining->m > 0) {
            $parts[] = $remaining->m . ' mois';
        }
        if ([] === $parts && $remaining->d > 0) {
            $parts[] = $remaining->d . ' jour' . ($remaining->d > 1 ? 's' : '');
        }

        return [] === $parts ? 'Moins d\'un jour' : implode(' ', $parts);
    }
}
