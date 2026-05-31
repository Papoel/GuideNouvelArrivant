<?php

declare(strict_types=1);

namespace App\Tests\Controller\Admin\Logbook;

use App\Controller\Admin\Logbook\LogbookCrudController;
use App\Entity\Logbook;
use App\Tests\Utils\UserTestHelper;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

#[AllowMockObjectsWithoutExpectations]
class LogbookCrudControllerFunctionalTest extends WebTestCase
{
    #[Test]
    public function editPageDisplaysCorrectly(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get('doctrine')->getManager();

        $admin = UserTestHelper::createAdminUser($entityManager);
        $client->loginUser($admin);

        $owner = UserTestHelper::createUser();

        if ($owner->getJob()) {
            $entityManager->persist($owner->getJob());
        }
        if ($owner->getSpeciality()) {
            $entityManager->persist($owner->getSpeciality());
        }

        $entityManager->persist($owner);

        $logbook = new Logbook();
        $logbook->setName('Carnet de test');
        $logbook->setOwner($owner);

        $entityManager->persist($logbook);
        $entityManager->flush();

        $url = sprintf('/admin/logbook/%s/edit', $logbook->getId());

        $client->request('GET', $url);

        $this->assertResponseIsSuccessful();

        // Vérifier le titre de la page
        $this->assertSelectorTextContains('#page-title', 'Édition du carnet de');
        $this->assertSelectorTextContains('#page-title', $owner->getFullname());

        // Vérifier que les cartes principales existent
        $this->assertSelectorExists('.content-card');

        // Vérifier le contenu de la page (sans cibler un card-header spécifique)
        $this->assertSelectorTextContains('body', 'Informations générales');
        $this->assertSelectorTextContains('body', 'Thèmes associés');

        // Vérifier que le formulaire d'ajout de thèmes est présent
        $this->assertSelectorExists('form');
    }

    #[Test]
    public function editPageWithoutOwnerReturns404(): void
    {
        $client = static::createClient();
        $entityManager = static::getContainer()->get('doctrine')->getManager();

        $admin = UserTestHelper::createAdminUser($entityManager);
        $client->loginUser($admin);

        // Créer un carnet sans propriétaire
        $logbook = new Logbook();
        $logbook->setName('Test Logbook');

        $entityManager->persist($logbook);
        $entityManager->flush();

        $url = sprintf('/admin/logbook/%s/edit', $logbook->getId());

        $client->request('GET', $url);

        // Vérifier qu'une erreur 404 est levée
        $this->assertResponseStatusCodeSame(404);

        // Nettoyage
        $entityManager->remove($logbook);
        $entityManager->flush();
    }

    #[Test]
    public function editPageRendersThemesList(): void
    {
        $client = static::createClient();

        $admin = UserTestHelper::createAdminUser(
            static::getContainer()->get('doctrine')->getManager()
        );
        $client->loginUser($admin);

        // Utiliser la méthode helper qui crée un carnet complet avec thèmes
        $owner = UserTestHelper::createUserAndAddLogbook($client);

        $entityManager = static::getContainer()->get('doctrine')->getManager();
        $logbook = $entityManager->getRepository(Logbook::class)
            ->findOneBy(['owner' => $owner]);

        if (!$logbook || $logbook->getThemes()->isEmpty()) {
            $this->markTestSkipped('Aucun carnet avec thèmes disponible');
        }

        $url = sprintf('/admin/logbook/%s/edit', $logbook->getId());

        $client->request('GET', $url);

        $this->assertResponseIsSuccessful();

        // Vérifier que chaque thème est affiché dans la page
        foreach ($logbook->getThemes() as $theme) {
            $this->assertSelectorTextContains('body', $theme->getTitle());
        }
    }

    #[Test]
    public function logbookCrudControllerHasEditMethod(): void
    {
        // Test unitaire simple : vérifier que la méthode existe
        $this->assertTrue(
            method_exists(LogbookCrudController::class, 'edit'),
            'LogbookCrudController doit avoir une méthode edit()'
        );
    }
}
