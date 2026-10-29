<?php

namespace App\Tests\Services\Admin\Users;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Services\Admin\Users\UserDeletionService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserDeletionServiceTest extends KernelTestCase
{
    private EntityManagerInterface $em;
    private UserDeletionService $service;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->em = static::getContainer()->get(EntityManagerInterface::class);
        $this->service = new UserDeletionService($this->em);
    }

    private function makeUser(string $nni): User
    {
        $user = new User();
        $user->setFirstname('Test');
        $user->setLastname('Delete');
        $user->setEmail("delete-{$nni}@test.local");
        $user->setNni($nni);
        $user->setPassword('password');
        $this->em->persist($user);

        return $user;
    }

    public function testDeleteUserAndLogbooksKeepsSharedThemesAndOtherUsersData(): void
    {
        $user1 = $this->makeUser('DEL01');
        $user2 = $this->makeUser('DEL02');

        // Thème + module partagés (données du modèle, communs à tous les carnets)
        $theme = new Theme();
        $theme->setTitle('THEME_SHARED_DEL');
        $theme->setDescription('desc');
        $this->em->persist($theme);

        $module = new Module();
        $module->setTitle('MODULE_SHARED_DEL');
        $module->setTheme($theme);
        $this->em->persist($module);

        $logbook1 = new Logbook();
        $logbook1->setOwner($user1);
        $logbook1->setName('Carnet DEL user1');
        $logbook1->addTheme($theme);
        $this->em->persist($logbook1);

        $logbook2 = new Logbook();
        $logbook2->setOwner($user2);
        $logbook2->setName('Carnet DEL user2');
        $logbook2->addTheme($theme);
        $this->em->persist($logbook2);

        $action2 = new Action();
        $action2->setUser($user2);
        $action2->setModule($module);
        $action2->setLogbook($logbook2);
        $action2->setDescription('Action user2 - ne doit pas être supprimée');
        $this->em->persist($action2);

        $this->em->flush();
        $themeId = $theme->getId();
        $moduleId = $module->getId();
        $action2Id = $action2->getId();
        $logbook2Id = $logbook2->getId();
        $user2Id = $user2->getId();

        $this->service->deleteUserAndLogbooks($user1);

        // Régression : les entités partagées et les données d'un autre
        // utilisateur ne doivent JAMAIS être supprimées en cascade.
        $this->em->clear();
        $this->assertNotNull($this->em->find(Theme::class, $themeId), 'Le thème partagé a été supprimé');
        $this->assertNotNull($this->em->find(Module::class, $moduleId), 'Le module partagé a été supprimé');
        $this->assertNotNull($this->em->find(User::class, $user2Id), 'Un autre utilisateur a été supprimé');
        $this->assertNotNull($this->em->find(Logbook::class, $logbook2Id), 'Le carnet d\'un autre utilisateur a été supprimé');
        $this->assertNotNull($this->em->find(Action::class, $action2Id), 'L\'action d\'un autre utilisateur a été supprimée');

        // Le carnet de l'utilisateur supprimé a bien été détaché des thèmes
        // et supprimé, ses actions proprement en cascade.
        $this->assertNull($this->em->getRepository(Logbook::class)->findOneBy(['name' => 'Carnet DEL user1']));
        $this->assertNull($this->em->getRepository(User::class)->findOneBy(['nni' => 'DEL01']));
    }

    protected function tearDown(): void
    {
        // Nettoie les données de test encore présentes (thème/module/logbook2/user2)
        foreach ($this->em->getRepository(Logbook::class)->findBy(['name' => 'Carnet DEL user2']) as $logbook) {
            foreach ($logbook->getThemes()->toArray() as $theme) {
                $logbook->removeTheme($theme);
            }
            $this->em->remove($logbook);
        }
        foreach ($this->em->getRepository(User::class)->findBy(['email' => 'delete-DEL02@test.local']) as $u) {
            $this->em->remove($u);
        }
        foreach ($this->em->getRepository(Action::class)->findBy(['description' => 'Action user2 - ne doit pas être supprimée']) as $a) {
            $this->em->remove($a);
        }
        foreach ($this->em->getRepository(Module::class)->findBy(['title' => 'MODULE_SHARED_DEL']) as $m) {
            $this->em->remove($m);
        }
        foreach ($this->em->getRepository(Theme::class)->findBy(['title' => 'THEME_SHARED_DEL']) as $t) {
            $this->em->remove($t);
        }
        $this->em->flush();

        parent::tearDown();
    }
}
