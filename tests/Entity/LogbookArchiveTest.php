<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\LogbookArchive;
use App\Tests\Abstract\EntityTestCase;
use PHPUnit\Framework\Attributes\Test;

/**
 * Tests du contrat de l'entité LogbookArchive.
 *
 * Intention : quand un utilisateur est supprimé, son carnet de compagnonnage
 * (document probant) est figé dans une archive qui regroupe :
 *  - l'identité du titulaire (dénormalisée, puisque le compte disparaît),
 *  - le nom du tuteur (idem),
 *  - le contenu complet du carnet en JSON (payload) et en PDF binaire,
 *  - une date d'expiration à 5 ans (règle RGPD décidée avec le client).
 *
 * Ces tests vérifient UNIQUEMENT la logique de l'entité : dates, compteurs,
 * getters/setters. La construction de l'archive depuis un Logbook réel est
 * couverte par les tests de LogbookArchiveService.
 */
class LogbookArchiveTest extends EntityTestCase
{
    /**
     * À la création, l'archive doit dater son archivage (archivedAt = maintenant)
     * et calculer son expiration à +5 ans, sans intervention extérieure.
     */
    #[Test] public function constructorInitializesDates(): void
    {
        $archive = new LogbookArchive();

        // archivedAt est posé automatiquement à « maintenant »
        self::assertInstanceOf(\DateTimeImmutable::class, $archive->getArchivedAt());

        // expiresAt = archivedAt + 5 ans (durée de conservation décidée : 5 ans)
        $expectedExpiry = $archive->getArchivedAt()->modify('+5 years');
        self::assertSame(
            expected: $expectedExpiry->format('Y-m-d H:i'),
            actual: $archive->getExpiresAt()->format('Y-m-d H:i'),
        );
    }

    /**
     * Une archive fraîche n'est PAS expirée ; une archive dont expiresAt est
     * passé (ou aujourd'hui) l'est. C'est ce que la commande de purge utilisera.
     */
    #[Test] public function isExpired(): void
    {
        $archive = new LogbookArchive();
        self::assertFalse($archive->isExpired(), 'Une archive neuve ne doit pas être expirée.');

        // On simule une expiration dépassée (hier)
        $archive->setExpiresAt(new \DateTimeImmutable('-1 day'));
        self::assertTrue($archive->isExpired(), 'Une archive dont expiresAt est passé doit être expirée.');
    }

    /**
     * Le compteur affiché sur la page Archives : temps restant avant purge.
     * - Vivante : un intervalle positif (~5 ans).
     * - Expirée : null (plus rien à compter).
     */
    #[Test] public function getRemainingTime(): void
    {
        $archive = new LogbookArchive();

        $remaining = $archive->getRemainingTime();
        self::assertInstanceOf(\DateInterval::class, $remaining);
        self::assertGreaterThanOrEqual(4, $remaining->y, 'Il doit rester au moins 4 ans avant purge.');

        // Expirée => le compteur ne renvoie plus rien
        $archive->setExpiresAt(new \DateTimeImmutable('-1 day'));
        self::assertNull($archive->getRemainingTime());
    }

    /**
     * Getters/setters du snapshot d'identité : c'est LA donnée qui remplace la
     * relation vers User une fois le compte supprimé.
     */
    #[Test] public function ownerSnapshotFields(): void
    {
        $archive = new LogbookArchive();
        $archive
            ->setOwnerFirstname('Pascal')
            ->setOwnerLastname('DUPONT')
            ->setOwnerNni('A12345')
            ->setOwnerEmail('p.dupont@entreprise.fr')
            ->setOwnerService('Maintenance')
            ->setOwnerJob('Technicien')
            ->setHiringAt(new \DateTimeImmutable('2023-01-15'))
            ->setMentorName('Walter MARTIN');

        self::assertSame('Pascal', $archive->getOwnerFirstname());
        self::assertSame('DUPONT', $archive->getOwnerLastname());
        self::assertSame('Pascal DUPONT', $archive->getOwnerFullname());
        self::assertSame('A12345', $archive->getOwnerNni());
        self::assertSame('p.dupont@entreprise.fr', $archive->getOwnerEmail());
        self::assertSame('Maintenance', $archive->getOwnerService());
        self::assertSame('Technicien', $archive->getOwnerJob());
        self::assertSame('2023-01-15', $archive->getHiringAt()?->format('Y-m-d'));
        self::assertSame('Walter MARTIN', $archive->getMentorName());
    }

    /**
     * Le contenu de l'archive : payload JSON (structure régénérable) et
     * PDF binaire (artefact à télécharger tel quel).
     */
    #[Test] public function contentFields(): void
    {
        $payload = ['themes' => [['title' => 'Sécurité']]];
        $pdfBytes = '%PDF-1.4 fake content';

        $archive = new LogbookArchive();
        $archive
            ->setPayload($payload)
            ->setPdf($pdfBytes)
            ->setPdfFilename('carnet-pascal-dupont.pdf')
            ->setArchivedBy('Assistante RH');

        self::assertSame($payload, $archive->getPayload());
        self::assertSame($pdfBytes, $archive->getPdf());
        self::assertSame('carnet-pascal-dupont.pdf', $archive->getPdfFilename());
        self::assertSame('Assistante RH', $archive->getArchivedBy());
    }
}
