<?php

declare(strict_types=1);

namespace App\Tests\Services;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\LogbookArchive;
use App\Entity\Module;
use App\Entity\Service;
use App\Entity\Theme;
use App\Entity\User;
use App\Services\Admin\Logbooks\LogbookArchiveService;
use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Test\MailerAssertionsTrait;

/**
 * Tests du service d'archivage des carnets.
 *
 * Intention : avant toute suppression d'utilisateur, le carnet est figé dans
 * une LogbookArchive qui contient TOUT ce dont on a besoin après la mort du
 * compte — identité du titulaire, nom du tuteur, contenu complet (JSON) et
 * le PDF probant. Ces tests construisent un carnet réel en base puis vérifient
 * le contenu de l'archive produite.
 */
class LogbookArchiveServiceTest extends KernelTestCase
{
    use MailerAssertionsTrait;

    private EntityManagerInterface $entityManager;
    private LogbookArchiveService $archiveService;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()->get(id: 'doctrine')->getManager();
        $this->archiveService = $kernel->getContainer()->get(LogbookArchiveService::class);

        // Chaque test est isolé dans une transaction annulée en tearDown
        $this->entityManager->beginTransaction();
    }

    protected function tearDown(): void
    {
        $this->entityManager->rollback();
        $this->entityManager->close();
        parent::tearDown();
    }

    /**
     * L'archive doit capturer l'identité complète du titulaire — c'est la seule
     * trace qui restera après suppression du compte User.
     */
    #[Test] public function archiveContainsOwnerSnapshot(): void
    {
        // Arrange : un titulaire complet (service, métier, NNI, email, embauche)
        $service = new Service();
        $service->setName('MAINT');
        $this->entityManager->persist($service);

        $owner = UserTestHelper::createUser([
            'firstname' => 'Pascal',
            'lastname' => 'Dupont',
            'email' => 'p.dupont@entreprise.fr',
        ]);
        $owner->setService($service);
        $this->persistUserWithDependencies($owner);

        $logbook = $this->createLogbookWithAction($owner);
        $this->entityManager->flush();

        // Act : l'assistante supprime le compte -> archive d'abord
        $actor = UserTestHelper::createAdminUser();
        $archive = $this->archiveService->archiveLogbook($logbook, $actor);

        // Assert : toutes les données d'identité sont figées dans l'archive
        self::assertSame('Pascal', $archive->getOwnerFirstname());
        self::assertSame('DUPONT', $archive->getOwnerLastname());
        self::assertSame('Pascal DUPONT', $archive->getOwnerFullname());
        self::assertSame('p.dupont@entreprise.fr', $archive->getOwnerEmail());
        self::assertSame($owner->getNni(), $archive->getOwnerNni());
        self::assertSame('MAINT', $archive->getOwnerService());
        self::assertSame($owner->getJob()?->getName(), $archive->getOwnerJob());
        self::assertSame('2023-11-02', $archive->getHiringAt()?->format('Y-m-d'));

        // L'auteur de la suppression est tracé
        self::assertSame($actor->getFullname(), $archive->getArchivedBy());
    }

    /**
     * Le nom du tuteur doit être figé dans l'archive : d'abord le champ
     * dénormalisé du carnet, sinon la relation mentor encore vivante du titulaire.
     */
    #[Test] public function archiveResolvesMentorName(): void
    {
        // Arrange : un tuteur lié au titulaire via la relation mentor
        $mentor = UserTestHelper::createMentorUser();
        $mentor->setFirstname('Walter');
        $mentor->setLastname('Martin');
        $this->persistUserWithDependencies($mentor);

        $owner = UserTestHelper::createUser(['firstname' => 'Pascal', 'lastname' => 'Dupont']);
        $owner->setMentor($mentor);
        $this->persistUserWithDependencies($owner);

        $logbook = $this->createLogbookWithAction($owner);
        $this->entityManager->flush();

        // Act + Assert : mentorName absent du carnet => on lit la relation
        $archive = $this->archiveService->archiveLogbook($logbook, null);
        self::assertSame('Walter MARTIN', $archive->getMentorName());

        // Si le carnet porte déjà un mentorName figé, c'est lui qui gagne
        // (il reflète le tuteur historique, pas la relation actuelle)
        $logbook->setMentorName('Ancien Tuteur');
        $archive2 = $this->archiveService->archiveLogbook($logbook, null);
        self::assertSame('Ancien Tuteur', $archive2->getMentorName());
    }

    /**
     * Le payload JSON doit contenir toute la structure du carnet — thèmes,
     * modules, et chaque action avec ses commentaires et visas des DEUX côtés
     * (apprenant et tuteur). C'est ce qui permet de prouver le contenu plus tard.
     */
    #[Test] public function archiveContainsFullPayload(): void
    {
        $owner = UserTestHelper::createUser();
        $this->persistUserWithDependencies($owner);
        $logbook = $this->createLogbookWithAction($owner);
        $this->entityManager->flush();

        $archive = $this->archiveService->archiveLogbook($logbook, null);
        $payload = $archive->getPayload();

        // Structure attendue : themes[] -> modules[] -> action{...}
        self::assertArrayHasKey('themes', $payload);
        self::assertCount(1, $payload['themes']);
        self::assertSame('Thème sécurité', $payload['themes'][0]['title']);

        $module = $payload['themes'][0]['modules'][0];
        self::assertSame('Module port du casque', $module['title']);

        $action = $module['action'];
        self::assertSame('Action de test', $action['description']);
        self::assertSame('Commentaire apprenant', $action['agent_comment']);
        self::assertSame('Visa apprenant Pascal DUPONT', $action['agent_visa']);
        self::assertNotNull($action['agent_validated_at']);
        self::assertSame('Commentaire tuteur', $action['mentor_comment']);
        self::assertSame('Visa tuteur Walter MARTIN', $action['mentor_visa']);
        self::assertNotNull($action['mentor_validated_at']);
        self::assertNotNull($action['mentor_commented_at']);
    }

    /**
     * Le PDF du carnet doit être généré et stocké dans l'archive : c'est
     * l'artefact probant téléchargeable même des années après la suppression.
     */
    #[Test] public function archiveGeneratesPdf(): void
    {
        $owner = UserTestHelper::createUser(['firstname' => 'Pascal', 'lastname' => 'Dupont']);
        $this->persistUserWithDependencies($owner);
        $logbook = $this->createLogbookWithAction($owner);
        $this->entityManager->flush();

        $archive = $this->archiveService->archiveLogbook($logbook, null);

        $pdf = $archive->getPdf();
        self::assertNotNull($pdf, 'Le PDF du carnet doit être généré à l\'archivage.');
        self::assertStringStartsWith('%PDF', $pdf);
        self::assertNotNull($archive->getPdfFilename());
        self::assertStringContainsString('.pdf', (string) $archive->getPdfFilename());
    }

    /**
     * Cas limite : un carnet orphelin (owner déjà NULL) doit tout de même
     * s'archiver sans erreur — les champs identité sont renseignés « Inconnu ».
     */
    #[Test] public function archiveOrphanLogbook(): void
    {
        $logbook = new Logbook();
        $logbook->setName('Carnet orphelin');
        $this->entityManager->persist($logbook);
        $this->entityManager->flush();

        $archive = $this->archiveService->archiveLogbook($logbook, null);

        self::assertSame('Inconnu', $archive->getOwnerFirstname());
        self::assertSame('Inconnu', $archive->getOwnerLastname());
        self::assertNull($archive->getPdf(), 'Pas de titulaire : pas de PDF générable.');
    }

    /**
     * Notification à l'archivage : les administrateurs (mail groupé) et le
     * titulaire (sur l'email figé dans l'archive) doivent être informés dès
     * que le carnet est conservé — c'est la seule trace visible de la mise
     * en archive au moment de la suppression du compte.
     */
    #[Test] public function archiveNotifiesAdminsAndFormerOwner(): void
    {
        // Arrange : un admin du même service + un titulaire dont l'email
        // et le service seront figés dans l'archive
        $service = new Service();
        $service->setName('MAINT');
        $this->entityManager->persist($service);

        $admin = UserTestHelper::createAdminUser();
        $admin->setEmail('admin@test.local');
        $admin->setService($service);
        $this->persistUserWithDependencies($admin);

        $owner = UserTestHelper::createUser(['email' => 'n.mabire@entreprise.fr']);
        $owner->setService($service);
        $this->persistUserWithDependencies($owner);
        $logbook = $this->createLogbookWithAction($owner);
        $this->entityManager->flush();

        $emailsBefore = \count(self::getMailerMessages());

        // Act : le carnet est archivé (ex. suppression du compte)
        $this->archiveService->archiveLogbook($logbook);

        // Assert : 2 mails — admin du service groupé + détenteur sur l'email figé
        self::assertEmailCount($emailsBefore + 2);
    }

    /**
     * Périmètre de notification : un administrateur d'un AUTRE service et un
     * super admin ne doivent pas être informés de l'archivage.
     */
    #[Test] public function archiveNotifiesOnlySameServiceAdmins(): void
    {
        // Arrange : titulaire MAINT, admin RH, super admin
        $maint = new Service();
        $maint->setName('MAINT');
        $this->entityManager->persist($maint);
        $rh = new Service();
        $rh->setName('RH');
        $this->entityManager->persist($rh);

        $adminRh = UserTestHelper::createAdminUser();
        $adminRh->setEmail('admin-rh@test.local');
        $adminRh->setService($rh);
        $this->persistUserWithDependencies($adminRh);

        $superAdmin = UserTestHelper::createSuperAdminUser();
        $superAdmin->setEmail('superadmin@test.local');
        $this->persistUserWithDependencies($superAdmin);

        $owner = UserTestHelper::createUser(['email' => 'n.mabire@entreprise.fr']);
        $owner->setService($maint);
        $this->persistUserWithDependencies($owner);
        $logbook = $this->createLogbookWithAction($owner);
        $this->entityManager->flush();

        $emailsBefore = \count(self::getMailerMessages());

        // Act
        $this->archiveService->archiveLogbook($logbook);

        // Assert : 1 seul mail — le détenteur. Ni admin RH ni super admin.
        self::assertEmailCount($emailsBefore + 1);
        self::assertEmailAddressContains(
            self::getMailerMessage($emailsBefore),
            'To',
            'n.mabire@entreprise.fr',
        );
    }

    // ——— Helpers de construction de fixtures ———

    /** Persiste un utilisateur avec ses dépendances (job, spécialité). */
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

    /** Construit un carnet complet : 1 thème, 1 module, 1 action renseignée
     * des deux côtés (apprenant + tuteur). */
    private function createLogbookWithAction(User $owner): Logbook
    {
        $theme = new Theme();
        $theme->setTitle('Thème sécurité');
        $this->entityManager->persist($theme);

        $module = new Module();
        $module->setTitle('Module port du casque');
        // addModule synchronise Theme::modules, lu pour bâtir le payload.
        $theme->addModule($module);
        $this->entityManager->persist($module);

        $logbook = new Logbook();
        $logbook->setName('Carnet de ' . $owner->getFullname());
        $logbook->addTheme($theme);
        // addLogbook (et non setOwner) synchronise User::logbooks.
        $owner->addLogbook($logbook);
        $this->entityManager->persist($logbook);

        $action = new Action();
        $action->setUser($owner);
        $action->setModule($module);
        // addAction synchronise Logbook::actions, lu pour bâtir le payload.
        $logbook->addAction($action);
        $action->setDescription('Action de test');
        $action->setAgentComment('Commentaire apprenant');
        $action->setAgentValidatedAt(new \DateTimeImmutable('2023-02-01'));
        $action->setAgentVisa('Visa apprenant Pascal DUPONT');
        $action->setMentorComment('Commentaire tuteur');
        $action->setMentorValidatedAt(new \DateTimeImmutable('2023-02-15'));
        $action->setMentorCommentedAt(new \DateTimeImmutable('2023-02-10'));
        $action->setMentorVisa('Visa tuteur Walter MARTIN');
        $this->entityManager->persist($action);

        return $logbook;
    }
}
