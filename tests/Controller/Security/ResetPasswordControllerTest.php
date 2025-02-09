<?php

declare(strict_types=1);

namespace App\Tests\Controller\Security;

use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;

class ResetPasswordControllerTest extends WebTestCase
{
    private ?EntityManagerInterface $entityManager = null;
    protected KernelBrowser $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = static::createClient();
        $this->entityManager = static::getContainer()->get(id: EntityManagerInterface::class);
    }

    #[Test] public function requestPasswordResetPage(): void
    {
        // Test l'accès à la page de demande de réinitialisation
        $this->client->request(method: Request::METHOD_GET, uri: '/reset-password');

        self::assertResponseIsSuccessful();
        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_OK);
        self::assertSelectorExists(selector: 'form[name="reset_password_request_form"]');
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    #[Test] public function requestPasswordResetWithValidEmail(): void
    {
        // Créer un utilisateur de test
        $user = UserTestHelper::createUser();
        $this->entityManager->persist(object: $user);
        $this->entityManager->flush();

        // Soumettre le formulaire avec l'email
        $crawler = $this->client->request(method: Request::METHOD_GET, uri: '/reset-password');
        $form = $crawler->selectButton(value: 'Envoyer')->form([
            'reset_password_request_form[email]' => $user->getEmail(),
        ]);

        $this->client->submit(form: $form);

        // Vérifier la redirection vers la page de confirmation
        self::assertResponseRedirects(expectedLocation: '/reset-password/check-email');
        $this->client->followRedirect();
        self::assertResponseIsSuccessful();
    }

    #[Test] public function requestPasswordResetWithInvalidEmail(): void
    {
        // Soumettre le formulaire avec un email invalide
        $crawler = $this->client->request(method: Request::METHOD_GET, uri: '/reset-password');
        $form = $crawler->selectButton(value: 'Envoyer')->form([
            'reset_password_request_form[email]' => 'nonexistent@email.com',
        ]);

        $this->client->submit(form: $form);

        // Vérifier la redirection vers la page de confirmation (même comportement pour protéger la confidentialité)
        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_FOUND);
        self::assertResponseRedirects(expectedLocation: '/reset-password/check-email');
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    #[Test] public function resetPasswordWithValidToken(): void
    {
        // Créer un utilisateur de test
        $user = UserTestHelper::createUser();
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Générer un token de réinitialisation
        $resetPasswordHelper = static::getContainer()->get(id: ResetPasswordHelperInterface::class);
        $resetToken = $resetPasswordHelper->generateResetToken($user);

        // Accéder à la page de réinitialisation avec le token
        $this->client->request(method: Request::METHOD_GET, uri: '/reset-password/reset/' . $resetToken->getToken());

        // Vérifier la redirection et soumettre le nouveau mot de passe
        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_FOUND);

        $this->client->followRedirect();
        $crawler = $this->client->getCrawler();
        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_OK);

        // Le formulaire a deux champs pour le mot de passe (nouveau mot de passe et confirmation)
        $form = $crawler->selectButton(value: 'Valider mon nouveau mot de passe')->form([
            'change_password_form[plainPassword][first]' => 'newPassword123!',
            'change_password_form[plainPassword][second]' => 'newPassword123!'
        ]);

        $this->client->submit(form: $form);

        // Vérifier la redirection vers la page d'accueil
        self::assertResponseRedirects(expectedLocation: '/');
        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_FOUND);
    }

    #[Test] public function resetPasswordWithInvalidToken(): void
    {
        // Tester avec un token invalide
        $this->client->request(method: Request::METHOD_GET, uri: '/reset-password/reset/invalid-token');

        // Vérifier la redirection vers la page de demande de réinitialisation
        self::assertResponseRedirects(expectedLocation: '/reset-password/reset');
        self::assertResponseStatusCodeSame(expectedCode: Response::HTTP_FOUND);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        if ($this->entityManager) {
            $this->entityManager->close();
            $this->entityManager = null;
        }
    }
}
