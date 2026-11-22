<?php

declare(strict_types=1);

namespace App\Tests\Services;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\LogbookArchive;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Repository\LogbookArchiveRepository;
use App\Repository\LogbookRepository;
use App\Services\Logbook\LogbookReplacementService;
use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Remplacement d'un carnet (régénération depuis un modèle).
 *
 * Intention : quand un carnet existant est remplacé par un nouveau, l'ancien
 * contenu (commentaires, visas) ne doit pas être perdu — il est figé dans une
 * archive avant d'être supprimé, exactement comme lors d'une suppression
 * d'utilisateur.
 */
class LogbookReplacementServiceTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;
    private LogbookReplacementService $service;
    private LogbookRepository $logbookRepository;
    private LogbookArchiveRepository $archiveRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        $this->entityManager = $container->get(id: 'doctrine')->getManager();
        $this->service = $container->get(LogbookReplacementService::class);
        $this->logbookRepository = $this->entityManager->getRepository(Logbook::class);
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
     * Comportement attendu : deleteExistingLogbook archive l'ancien carnet
     * (snapshot + PDF) puis le supprime, dans la même transaction.
     */
    #[Test] public function deleteExistingLogbookArchivesBeforeRemoving(): void
    {
        // Arrange : un titulaire avec un carnet existant rempli
        $owner = UserTestHelper::createUser(['firstname' => 'Pascal', 'lastname' => 'Dupont']);
        $this->persistUserWithDependencies($owner);

        $theme = new Theme();
        $theme->setTitle('Thème sécurité');
        $this->entityManager->persist($theme);

        $oldLogbook = new Logbook();
        $oldLogbook->setName('Ancien carnet');
        $oldLogbook->addTheme($theme);
        $owner->addLogbook($oldLogbook);
        $this->entityManager->persist($oldLogbook);

        $newLogbook = new Logbook();
        $newLogbook->setName('Nouveau carnet');
        $newLogbook->setOwner($owner);
        $this->entityManager->flush();

        $oldLogbookId = $oldLogbook->getId();

        // Act : le service supprime l'ancien carnet lors du remplacement
        $this->service->deleteExistingLogbook($newLogbook);

        // Assert : l'ancien carnet a disparu mais son archive le remplace
        self::assertNull($this->logbookRepository->find($oldLogbookId), 'L\'ancien carnet doit être supprimé.');

        // Les archives sont filtrées sur le nom unique du carnet : d'autres
        // tests d'intégration peuvent laisser des archives committées en base.
        $archives = array_values(array_filter(
            $this->archiveRepository->findAll(),
            static fn (LogbookArchive $archive): bool => 'Ancien carnet' === ($archive->getPayload()['name'] ?? null),
        ));
        self::assertCount(1, $archives, 'L\'ancien carnet doit avoir été archivé.');
        self::assertSame('Pascal DUPONT', $archives[0]->getOwnerFullname());
    }

    /** Aucun carnet existant : rien à archiver, rien à supprimer. */
    #[Test] public function deleteExistingLogbookWithoutOldLogbookDoesNothing(): void
    {
        $owner = UserTestHelper::createUser();
        $this->persistUserWithDependencies($owner);
        $this->entityManager->flush();

        $newLogbook = new Logbook();
        $newLogbook->setOwner($owner);

        $this->service->deleteExistingLogbook($newLogbook);

        self::assertCount(0, $this->archiveRepository->findAll(), 'Aucune archive ne doit être créée.');
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
