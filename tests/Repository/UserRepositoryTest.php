<?php

declare(strict_types=1);

namespace App\Tests\Repository;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Tests\Utils\UserTestHelper;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;


class UserRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $entityManager;
    private UserRepository $userRepository;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->entityManager = self::getContainer()->get('doctrine')->getManager();
        $this->userRepository = $this->entityManager->getRepository(User::class);

        // Démarrer une transaction
        $this->entityManager->beginTransaction();
    }

    protected function tearDown(): void
    {
        // Annuler la transaction après chaque test
        $this->entityManager->rollback();

        parent::tearDown();
    }

    #[Test] public function upgradePassword(): void
    {
        $user = UserTestHelper::createUser();

        $this->userRepository->upgradePassword(user: $user, newHashedPassword: 'new_password');

        self::assertEquals(expected: 'new_password', actual: $user->getPassword());
    }

    #[Test] public function upgradePasswordThrowsExceptionForUnsupportedUser(): void
    {
        // Créer un mock d'un utilisateur qui implémente PasswordAuthenticatedUserInterface
        // mais qui n'est pas une instance de User
        $unsupportedUser = $this->createMock(type: PasswordAuthenticatedUserInterface::class);

        // Asserter que l'exception UnsupportedUserException est lancée
        $this->expectException(UnsupportedUserException::class);
        $this->expectExceptionMessage(message: 'Instances of "'.get_class(object: $unsupportedUser).'" are not supported.');

        // Appeler la méthode upgradePassword avec l'utilisateur non supporté
        $this->userRepository->upgradePassword(user: $unsupportedUser, newHashedPassword: 'new_password');
    }

    #[Test] public function findApprenantByMentorNni(): void
    {
        // Créer des utilisateurs avec un mentor
        $mentor = new User();
        $mentor->setFirstname(firstname: 'Bob');
        $mentor->setLastname(lastname: 'Kane');
        $mentor->setEmail(email: 'bob.kane@gotham.city');
        $mentor->setNni(nni: 'B75861');
        $mentor->setPassword(password: 'password');

        $apprenant1 = new User();
        $apprenant1->setFirstname(firstname: 'Alfred');
        $apprenant1->setLastname(lastname: 'Pennyworth');
        $apprenant1->setEmail(email: 'alfred.pennyworth@gotham.city');
        $apprenant1->setNni(nni: 'C45289');
        $apprenant1->setPassword(password: 'password');
        $apprenant1->setMentor($mentor);

        $apprenant2 = new User();
        $apprenant2->setFirstname(firstname: 'Dick');
        $apprenant2->setLastname(lastname: 'Grayson');
        $apprenant2->setEmail(email: 'dick.grayson@gotham.city');
        $apprenant2->setNni(nni: 'D64026');
        $apprenant2->setPassword(password: 'password');
        $apprenant2->setMentor($mentor);

        $this->entityManager->persist($mentor);
        $this->entityManager->persist($apprenant1);
        $this->entityManager->persist($apprenant2);
        $this->entityManager->flush();

        $result = $this->userRepository->findApprenantByMentorNni(mentorNni: 'B75861');

        self::assertCount(expectedCount: 2, haystack: $result);
        self::assertContains($apprenant1, $result);
        self::assertContains($apprenant2, $result);
    }

    #[Test] public function findApprenantByMentorNniWithNoResults(): void
    {
        $result = $this->userRepository->findApprenantByMentorNni(mentorNni: 'not_real_nni');

        self::assertEmpty($result);
        self::assertIsArray($result);
    }
}
