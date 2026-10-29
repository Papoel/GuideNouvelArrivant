<?php

declare(strict_types=1);

namespace App\Tests\Controller\Admin\User;

use App\Controller\Admin\User\UserCrudController;
use App\Entity\User;
use App\EventSubscriber\AddRoleMentorWhenMentorIsDefine;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Régression : un ADMIN de service qui édite un utilisateur ne doit jamais
 * perdre les rôles privilégiés déjà détenus par cet utilisateur.
 * (Bug : J42274 modifie le prénom de F07583 → F07583 perd ROLE_SUPER_ADMIN
 *  et sa session est invalidée.)
 */
final class UserUpdateRolesTest extends KernelTestCase
{
    private EntityManagerInterface $em;
    private UserCrudController $controller;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->em = static::getContainer()->get(EntityManagerInterface::class);
        $this->controller = static::getContainer()->get(UserCrudController::class);
    }

    public function testAdminUpdatePreservesPrivilegedRoles(): void
    {
        $nni = 'T' . substr(uniqid(), -5);
        $user = new User();
        $user->setFirstname('Pascal');
        $user->setLastname('BRIFFARD');
        $user->setEmail("{$nni}@test.local");
        $user->setNni($nni);
        $user->setPassword('password');
        $user->setRoles(['ROLE_USER', 'ROLE_MENTOR', 'ROLE_SUPER_ADMIN']);
        $this->em->persist($user);
        $this->em->flush();
        $this->em->clear();

        // F07583 a un mentor → le subscriber BeforeEntityUpdated se déclenche
        // à chaque update (chemin exact du bug : flush interne prématuré).
        $mentor = new User();
        $mentor->setFirstname('Mentor');
        $mentor->setLastname('TUTEUR');
        $mentor->setEmail("m{$nni}@test.local");
        $mentor->setNni('M' . substr($nni, 1));
        $mentor->setPassword('password');
        $mentor->setRoles(['ROLE_USER', 'ROLE_MENTOR']);
        $this->em->persist($mentor);
        $user->setMentor($mentor);
        $this->em->flush();
        $this->em->clear();

        /** @var User $reloaded */
        $reloaded = $this->em->getRepository(User::class)->findOneBy(['nni' => $nni]);
        self::assertContains('ROLE_SUPER_ADMIN', $reloaded->getRoles());

        // Le formulaire ADMIN n'offre pas ROLE_SUPER_ADMIN dans ses choix :
        // la soumission le retire de l'entité avant updateEntity.
        $reloaded->setRoles(['ROLE_USER', 'ROLE_MENTOR']);
        $reloaded->setFirstname('Pascale');

        $subscriber = new AddRoleMentorWhenMentorIsDefine($this->em);
        $subscriber->onBeforeEntityUpdated(new BeforeEntityUpdatedEvent($reloaded));

        $this->controller->updateEntity($this->em, $reloaded);

        self::assertContains('ROLE_SUPER_ADMIN', $reloaded->getRoles(), 'ROLE_SUPER_ADMIN doit être préservé');
        self::assertContains('ROLE_MENTOR', $reloaded->getRoles());
        self::assertContains('ROLE_USER', $reloaded->getRoles());
        self::assertNotContains('ROLE_ADMIN', $reloaded->getRoles(), 'Un ADMIN ne peut pas élever les droits');
    }

    public function testAdminCannotGrantPrivilegedRoleOnUpdate(): void
    {
        $nni = 'T' . substr(uniqid(), -5);
        $user = new User();
        $user->setFirstname('Jean');
        $user->setLastname('DUPONT');
        $user->setEmail("{$nni}@test.local");
        $user->setNni($nni);
        $user->setPassword('password');
        $user->setRoles(['ROLE_USER']);
        $this->em->persist($user);
        $this->em->flush();
        $this->em->clear();

        /** @var User $reloaded */
        $reloaded = $this->em->getRepository(User::class)->findOneBy(['nni' => $nni]);

        // Tentative de soumission malveillante : ROLE_SUPER_ADMIN injecté dans le POST
        $reloaded->setRoles(['ROLE_USER', 'ROLE_SUPER_ADMIN']);

        $this->controller->updateEntity($this->em, $reloaded);

        self::assertNotContains('ROLE_SUPER_ADMIN', $reloaded->getRoles(), 'Un ADMIN ne peut pas élever les droits');
    }
}
