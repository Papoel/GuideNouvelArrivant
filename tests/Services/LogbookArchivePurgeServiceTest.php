<?php

declare(strict_types=1);

namespace App\Tests\Services;

use App\Entity\LogbookArchive;
use App\Entity\Service;
use App\Entity\User;
use App\Repository\LogbookArchiveRepository;
use App\Services\Admin\Logbooks\LogbookArchivePurgeService;
use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Test\MailerAssertionsTrait;

/**
 * Purge automatique des archives à l'expiration des 5 ans de conservation.
 *
 * Intention (décision client) :
 *  - à l'expiration, l'archive est définitivement supprimée par la tâche planifiée ;
 *  - les administrateurs ET le détenteur du carnet sont notifiés avant
 *    (avertissement J-30) puis au moment de la purge ;
 *  - les messages rappellent que l'action découle des règles RGPD et de la
 *    politique de confidentialité ;
 *  - la commande doit être idempotente : relancée, elle ne renvoie rien.
 */
class LogbookArchivePurgeServiceTest extends KernelTestCase
{
    use MailerAssertionsTrait;

    private EntityManagerInterface $entityManager;
    private LogbookArchivePurgeService $purgeService;
    private LogbookArchiveRepository $archiveRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->entityManager = $container->get(id: 'doctrine')->getManager();
        $this->purgeService = $container->get(LogbookArchivePurgeService::class);
        $this->archiveRepository = $this->entityManager->getRepository(LogbookArchive::class);

        $this->entityManager->beginTransaction();
    }

    protected function tearDown(): void
    {
        $this->entityManager->rollback();
        $this->entityManager->close();
        parent::tearDown();
    }

    /**
     * Cœur de la fonctionnalité : une archive expirée est définitivement
     * supprimée, avec notification aux administrateurs et au détenteur.
     */
    #[Test] public function purgeRemovesExpiredArchiveAndNotifiesAdminsAndOwner(): void
    {
        // Arrange : 1 admin du même service + 1 super admin (non notifié),
        // une archive expirée pour Pascal
        $this->createServiceAdmin('admin@test.local');
        $superAdmin = UserTestHelper::createSuperAdminUser();
        $superAdmin->setEmail('superadmin@test.local');
        $this->persistUserWithDependencies($superAdmin);

        $archive = $this->createArchive([
            'email' => 'p.dupont@entreprise.fr',
            'expiresAt' => new \DateTimeImmutable('-1 day'),
        ]);
        $this->entityManager->flush();

        $archiveId = $archive->getId();
        $emailsBefore = \count(self::getMailerMessages());

        // Act : la tâche planifiée tourne
        $this->purgeService->purge();

        // Assert : l'archive a définitivement disparu
        self::assertNull($this->archiveRepository->find($archiveId), 'L\'archive expirée doit être supprimée.');

        // ... et 2 mails partent : un pour l'admin du service (le super admin
        // est hors périmètre), un pour le détenteur du carnet.
        self::assertEmailCount($emailsBefore + 2);
        self::assertEmailHeaderSame(
            self::getMailerMessage($emailsBefore),
            'To',
            'admin@test.local',
            'Seul l\'admin du service du titulaire doit être destinataire.',
        );
    }

    /**
     * Avertissement J-30 : une archive qui expire bientôt mais n'est pas encore
     * expirée n'est PAS supprimée — elle déclenche un mail d'avertissement et
     * le champ warningSentAt la protège des envois suivants.
     */
    #[Test] public function purgeWarnsThirtyDaysBeforeExpiration(): void
    {
        $this->createServiceAdmin('admin@test.local');

        $archive = $this->createArchive([
            'email' => 'p.dupont@entreprise.fr',
            'expiresAt' => new \DateTimeImmutable('+15 days'),
        ]);
        $this->entityManager->flush();

        $archiveId = $archive->getId();
        $emailsBefore = \count(self::getMailerMessages());

        // Act
        $this->purgeService->purge();

        // Assert : l'archive EST conservée, l'avertissement est parti et
        // warningSentAt a été enregistré pour l'idempotence.
        $archiveReloaded = $this->archiveRepository->find($archiveId);
        self::assertNotNull($archiveReloaded, 'Une archive non expirée ne doit pas être supprimée.');
        self::assertNotNull($archiveReloaded->getWarningSentAt(), 'L\'avertissement doit être horodaté.');
        self::assertEmailCount($emailsBefore + 2);
    }

    /**
     * Idempotence : relancer la purge ne doit rien refaire —
     * pas de second avertissement, pas d'erreur sur un périmètre vide.
     */
    #[Test] public function purgeIsIdempotent(): void
    {
        $this->createServiceAdmin('admin@test.local');

        $archive = $this->createArchive([
            'email' => 'p.dupont@entreprise.fr',
            'expiresAt' => new \DateTimeImmutable('+15 days'),
        ]);
        $this->entityManager->flush();

        // Premier passage : avertissement envoyé
        $this->purgeService->purge();
        $countAfterFirstRun = \count(self::getMailerMessages());

        // Deuxième passage : rien ne doit repartir
        $this->purgeService->purge();
        self::assertEmailCount($countAfterFirstRun, message: 'Aucun mail ne doit être renvoyé au second passage.');
        self::assertNotNull($this->archiveRepository->find($archive->getId()));
    }

    /**
     * Une archive encore loin de l'expiration (> 30 jours) ne doit déclencher
     * ni purge ni avertissement.
     */
    #[Test] public function purgeIgnoresArchiveFarFromExpiration(): void
    {
        $archive = $this->createArchive([
            'email' => 'p.dupont@entreprise.fr',
            'expiresAt' => new \DateTimeImmutable('+1 year'),
        ]);
        $this->entityManager->flush();

        $emailsBefore = \count(self::getMailerMessages());
        $this->purgeService->purge();

        self::assertNotNull($this->archiveRepository->find($archive->getId()));
        self::assertEmailCount($emailsBefore, message: 'Aucun mail ne doit partir pour une archive loin de l\'expiration.');
    }

    /**
     * Détenteur sans email : la purge doit quand même notifier les admins
     * et supprimer l'archive expirée sans planter.
     */
    #[Test] public function purgeExpiredArchiveWithoutOwnerEmailStillNotifiesAdmins(): void
    {
        $this->createServiceAdmin('admin@test.local');

        $archive = $this->createArchive([
            'email' => null,
            'expiresAt' => new \DateTimeImmutable('-1 day'),
        ]);
        $this->entityManager->flush();
        $archiveId = $archive->getId();

        $emailsBefore = \count(self::getMailerMessages());
        $this->purgeService->purge();

        self::assertNull($this->archiveRepository->find($archiveId));
        self::assertEmailCount($emailsBefore + 1, message: 'Seul le mail admin doit partir sans email détenteur.');
    }

    /**
     * Périmètre de notification : seuls les administrateurs du service du
     * titulaire sont informés — un admin d'un autre service ou un super admin
     * ne reçoivent rien.
     */
    #[Test] public function purgeNotifiesOnlyAdminsOfOwnerService(): void
    {
        // Arrange : 2 admins dans des services différents + 1 super admin
        $this->createServiceAdmin('admin-maint@test.local', 'MAINT');
        $this->createServiceAdmin('admin-rh@test.local', 'RH');
        $superAdmin = UserTestHelper::createSuperAdminUser();
        $superAdmin->setEmail('superadmin@test.local');
        $this->persistUserWithDependencies($superAdmin);

        // Archive du service MAINT, titulaire sans email (mail admin isolé)
        $archive = $this->createArchive([
            'email' => null,
            'service' => 'MAINT',
            'expiresAt' => new \DateTimeImmutable('-1 day'),
        ]);
        $this->entityManager->flush();
        $archiveId = $archive->getId();

        $emailsBefore = \count(self::getMailerMessages());

        // Act
        $this->purgeService->purge();

        // Assert : 1 seul mail, adressé uniquement à l'admin du service MAINT
        self::assertNull($this->archiveRepository->find($archiveId));
        self::assertEmailCount($emailsBefore + 1);
        self::assertEmailHeaderSame(
            self::getMailerMessage($emailsBefore),
            'To',
            'admin-maint@test.local',
            'Ni l\'admin RH ni le super admin ne doivent être destinataires.',
        );
    }

    /**
     * Archive sans service figé : aucun admin ne peut être rattaché,
     * seul le détenteur reçoit le mail de purge.
     */
    #[Test] public function purgeArchiveWithoutServiceNotifiesOnlyOwner(): void
    {
        $this->createServiceAdmin('admin@test.local');

        $archive = $this->createArchive([
            'email' => 'p.dupont@entreprise.fr',
            'service' => null,
            'expiresAt' => new \DateTimeImmutable('-1 day'),
        ]);
        $this->entityManager->flush();
        $archiveId = $archive->getId();

        $emailsBefore = \count(self::getMailerMessages());
        $this->purgeService->purge();

        self::assertNull($this->archiveRepository->find($archiveId));
        self::assertEmailCount($emailsBefore + 1, message: 'Sans service, seul le détenteur est notifié.');
        self::assertEmailAddressContains(self::getMailerMessage($emailsBefore), 'To', 'p.dupont@entreprise.fr');
    }

    // ——— Helpers ———

    /** Crée un ROLE_ADMIN rattaché à un service (par défaut MAINT, le service
     * figé des archives de test). */
    private function createServiceAdmin(string $email, string $serviceName = 'MAINT'): User
    {
        $service = new Service();
        $service->setName($serviceName);
        $this->entityManager->persist($service);

        $admin = UserTestHelper::createAdminUser();
        $admin->setEmail($email);
        $admin->setService($service);
        $this->persistUserWithDependencies($admin);

        return $admin;
    }

    /** @param array{email?: string|null, expiresAt?: \DateTimeImmutable, service?: string|null} $options */
    private function createArchive(array $options = []): LogbookArchive
    {
        $archive = (new LogbookArchive())
            ->setOwnerFirstname('Pascal')
            ->setOwnerLastname('Dupont')
            ->setOwnerNni('X12345')
            ->setOwnerEmail(\array_key_exists('email', $options) ? $options['email'] : 'p.dupont@entreprise.fr')
            ->setOwnerService(\array_key_exists('service', $options) ? $options['service'] : 'MAINT')
            ->setMentorName('Walter MARTIN')
            ->setPayload(['name' => 'Carnet de Pascal DUPONT', 'themes' => []])
            ->setPdf('%PDF-1.4 fake')
            ->setPdfFilename('carnet-pascal.pdf');

        if (isset($options['expiresAt'])) {
            $archive->setExpiresAt($options['expiresAt']);
        }

        $this->entityManager->persist($archive);

        return $archive;
    }

    private function persistUserWithDependencies(User $user): void
    {
        if ($job = $user->getJob()) {
            $this->entityManager->persist($job);
        }
        if ($speciality = $user->getSpeciality()) {
            $this->entityManager->persist($speciality);
        }
        $this->entityManager->persist($user);
    }
}
