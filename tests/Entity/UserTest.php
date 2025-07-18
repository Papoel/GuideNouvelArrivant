<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\User;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use App\Tests\Abstract\EntityTestCase;
use App\Tests\Entity\Trait\EntityIdTestTrait;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\Attributes\Test;

class UserTest extends EntityTestCase
{
    use EntityIdTestTrait;

    protected function setUp(): void
    {
        parent::setUp();
        $this->entity = $this->getEntityUser();
        $this->setUpIdTests(); // Appel de la méthode du trait
    }

    protected function getEntity(): User
    {
        return $this->getEntityUser();
    }

    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof User) {
            throw new \InvalidArgumentException(message: 'Entity must be an instance of User');
        }
        $entity->setEmail(email: "nouveau@email.com");
        $entity->setFirstname(firstname: "nouveau firstname");
    }

    private function getEntityUser(): User
    {
        $user = new User();
        $user->setFirstname(firstname: "Noémi");
        $user->setLastname(lastname: "Colin");
        $user->setEmail(email: "thibault99@fernandez.com");
        $user->setRoles(roles: ['ROLE_USER']);
        $user->setPassword(password: "Password123!");
        $user->setLastLoginAt(lastLoginAt: null);
        $user->setJob(job: JobEnum::TECHNICIEN);
        $user->setNni(nni: "A74591");
        $user->setSpeciality(speciality: SpecialityEnum::CHA);
        $user->setHiringAt(hiringAt: new DateTimeImmutable(datetime: "2023-01-01 12:00:00"));
        $user->setCreatedAt(createdAt: null);
        $user->setUpdatedAt(updatedAt: null);
        return $user;
    }

    #[Test]
    public function entityUserIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityUser(), count: 0);
    }

    #[Test]
    public function getFirstname(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: "Noémi", actual: $entity->getFirstname());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getLastname(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: "Colin", actual: $entity->getLastname());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getEmail(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: "thibault99@fernandez.com", actual: $entity->getEmail());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getRoles(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: ['ROLE_USER'], actual: $entity->getRoles());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getPassword(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: "Password123!", actual: $entity->getPassword());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getLastLoginAt(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: null, actual: $entity->getLastLoginAt());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getJob(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: JobEnum::TECHNICIEN, actual: $entity->getJob());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getNni(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: "A74591", actual: $entity->getNni());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getSpeciality(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: SpecialityEnum::CHA, actual: $entity->getSpeciality());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getHiringAt(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: new DateTimeImmutable(datetime: "2023-01-01 12:00:00"), actual: $entity->getHiringAt());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getCreatedAt(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: null, actual: $entity->getCreatedAt());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getUpdatedAt(): void
    {
        $entity = $this->getEntityUser();
        self::assertEquals(expected: null, actual: $entity->getUpdatedAt());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    #[Test]
    public function getFullname(): void
    {
        $user = $this->getEntityUser();
        $expectedFullname = 'Noémi COLIN';

        // Vérifie que getFullname retourne bien le nom complet
        $this->assertSame(
            expected: $expectedFullname,
            actual: $user->getFullname(),
            message: "Le nom complet retourné par getFullname() n'est pas correct."
        );
    }

    #[Test]
    public function getSpecialityAbbreviation(): void
    {
        $this->entity->setSpeciality(speciality: SpecialityEnum::CHA); // Exemple avec une spécialité

        // Vérifie que getSpecialityAbbreviation renvoie l'abréviation correcte
        $this->assertEquals(
            expected: 'CHA',
            actual: $this->entity->getSpecialityAbreviation(),
            message: "L'abréviation de la spécialité devrait être 'CHA'."
        );
    }

    #[Test]
    public function getSpecialityLabel(): void
    {
        $this->entity->setSpeciality(SpecialityEnum::CHA); // Exemple avec une spécialité

        // Vérifie que getSpecialityLabel renvoie le label de la spécialité
        $this->assertEquals(
            SpecialityEnum::CHA->value,
            $this->entity->getSpecialityLabel(),
            "Le label de la spécialité devrait être 'Chaudronnerie'."
        );
    }

    #[Test]
    public function getMentor(): void
    {
        $mentor = new User();
        $this->entity->setMentor($mentor);

        // Vérifie que getMentor renvoie le mentor correctement
        $this->assertSame(
            $mentor,
            $this->entity->getMentor(),
            "Le mentor de l'utilisateur devrait être l'objet mentor assigné."
        );
    }

    #[Test]
    public function setMentor(): void
    {
        $mentor = new User();
        $this->entity->setMentor($mentor);

        // Vérifie que setMentor assigne le mentor correctement
        $this->assertSame(
            $mentor,
            $this->entity->getMentor(),
            "Le mentor de l'utilisateur devrait être défini correctement via setMentor."
        );

        // Test de suppression du mentor
        $this->entity->setMentor(null);
        $this->assertNull(
            $this->entity->getMentor(),
            "Le mentor de l'utilisateur devrait être null après suppression."
        );
    }

    // ----------------- TESTS ENUM -----------------
    #[Test]
    public function getJobLabel(): void
    {
        $this->entity->setJob(job: JobEnum::TECHNICIEN); // Exemple avec un emploi

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            JobEnum::TECHNICIEN->value,
            $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Technicien'."
        );
    }

    #[Test]
    public function getJobLabelReturnsTechnician(): void
    {
        $this->entity->setJob(job: JobEnum::TECHNICIEN);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: JobEnum::TECHNICIEN->value,
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Technicien'."
        );
    }

    #[Test]
    public function getJobLabelReturnsEngineer(): void
    {
        $this->entity->setJob(job: JobEnum::INGENIEUR);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: JobEnum::INGENIEUR->value,
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Ingénieur'."
        );
    }

    #[Test]
    public function getJobLabelReturnsBusinessManager(): void
    {
        $this->entity->setJob(job: JobEnum::CHARGE_AFFAIRES);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: JobEnum::CHARGE_AFFAIRES->value,
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Chargé d'affaires'."
        );
    }

    #[Test]
    public function getJobLabelReturnsProjectBusinessManager(): void
    {
        $this->entity->setJob(job: JobEnum::CHARGE_AFFAIRES_PROJET);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: JobEnum::CHARGE_AFFAIRES_PROJET->value,
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Chargé d'affaires projet'."
        );
    }

    #[Test]
    public function getJobLabelReturnsSurveillanceManager(): void
    {
        $this->entity->setJob(job: JobEnum::CHARGE_SURVEILLANCE);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: JobEnum::CHARGE_SURVEILLANCE->value,
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Chargé de surveillance'."
        );
    }


    // ----------------- FIN DES TESTS ENUM -----------------

    #[Test]
    public function returnIsToString(): void
    {
        $user = $this->getEntityUser();
        $expectedString = 'Noémi COLIN';

        // Vérifie que __toString retourne bien le nom complet en utilisant getFullname
        $this->assertSame(
            expected: $expectedString,
            actual: (string)$user,
            message: "La méthode __toString() ne retourne pas le nom complet attendu."
        );
    }

    #[Test]
    public function isAdmin(): void
    {
        $user = $this->getEntityUser();

        // Cas où l'utilisateur n'est pas administrateur
        $user->setRoles(['ROLE_USER']);
        $this->assertFalse(
            $user->isAdmin(),
            message: "La méthode isAdmin() retourne true alors que l'utilisateur n'a pas le rôle 'ROLE_ADMIN'."
        );

        // Cas où l'utilisateur est administrateur
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $this->assertTrue(
            $user->isAdmin(),
            message: "La méthode isAdmin() retourne false alors que l'utilisateur a le rôle 'ROLE_ADMIN'."
        );
    }

    #[Test]
    public function getSeniority(): void
    {
        $user = $this->getEntityUser();

        // Cas où hiringAt est null
        $user->setHiringAt(hiringAt: null);
        $this->assertNull(
            $user->getSeniority(),
            message: "La méthode getSeniority() devrait retourner null lorsque la date d'embauche est null."
        );

        // Cas où l'utilisateur est embauché depuis 2 ans, 3 mois et 15 jours
        $user->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '-2 years -3 months -15 days'));
        $this->assertEquals(
            expected: '2 ans 3 mois 15 jours',
            actual: $user->getSeniority(),
            message: "La méthode getSeniority() ne retourne pas la bonne ancienneté pour 2 ans, 3 mois et 15 jours."
        );

        // Cas où l'utilisateur est embauché depuis 1 an et 1 jour
        $user->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '-1 year -1 day'));
        $this->assertEquals(
            expected: '1 an 1 jour',
            actual: $user->getSeniority(),
            message: "La méthode getSeniority() ne retourne pas la bonne ancienneté pour 1 an et 1 jour."
        );

        // Cas où l'utilisateur est embauché depuis 5 mois
        $user->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '-5 months'));
        $this->assertEquals(
            expected: '5 mois',
            actual: $user->getSeniority(),
            message: "La méthode getSeniority() ne retourne pas la bonne ancienneté pour 5 mois."
        );

        // Cas où l'utilisateur est embauché depuis 15 jours
        $user->setHiringAt(hiringAt: new \DateTimeImmutable(datetime: '-15 days'));
        $this->assertEquals(
            expected: '15 jours',
            actual: $user->getSeniority(),
            message: "La méthode getSeniority() ne retourne pas la bonne ancienneté pour 15 jours."
        );
    }

    #[Test]
    public function getUserIdentifierReturnsEmail(): void
    {
        // Configure l'utilisateur avec un email
        $email = "test@example.com";
        $this->entity->setEmail($email);

        // Vérifie que getUserIdentifier renvoie l'email correctement
        $this->assertEquals(
            $email,
            $this->entity->getUserIdentifier(),
            message: "L'identifiant de l'utilisateur devrait être l'email '{$email}'."
        );
    }

    /**
     * Ce test vérifie que la classe User implémente correctement l'interface UserInterface
     * Note: Nous ne testons plus directement eraseCredentials() car elle est dépréciée
     */
    #[Test]
    public function userImplementsUserInterface(): void
    {
        // Vérifie que l'entité User implémente correctement l'interface UserInterface
        // sans appeler directement la méthode dépréciée eraseCredentials()
        $this->assertInstanceOf(
            \Symfony\Component\Security\Core\User\UserInterface::class,
            $this->entity
        );
        
        $this->assertTrue(true); // Le test passe si l'assertion ci-dessus ne lève pas d'exception
    }

    /************************************************ COLLECTIONS  ***********************************************/

    // Tester la Collection Action
    #[Test]
    public function getActions(): void
    {
        $actions = $this->entity->getActions();

        // Vérifie que getActions renvoie une Collection et qu'elle est initialement vide
        $this->assertInstanceOf(expected: Collection::class, actual: $actions, message: "getActions() devrait retourner une Collection.");
        $this->assertCount(expectedCount: 0, haystack: $actions, message: "La collection d'actions devrait être vide au départ.");
    }

    #[Test]
    public function addAction(): void
    {
        $action = new Action();

        // Ajout d'une action
        $this->entity->addAction($action);

        // Vérifie que l'action a été ajoutée
        $this->assertCount(expectedCount: 1, haystack: $this->entity->getActions(), message: "L'action devrait être ajoutée à la collection.");
        $this->assertTrue(condition: $this->entity->getActions()->contains($action), message: "L'action devrait être présente dans la collection.");

        // Vérifie que l'utilisateur est bien défini dans l'entité Action
        $this->assertSame(expected: $this->entity, actual: $action->getUser(), message: "L'utilisateur devrait être défini dans l'action.");
    }

    #[Test]
    public function addActionDoesNotDuplicate(): void
    {
        $action = new Action();

        // Ajout de la même action deux fois
        $this->entity->addAction(action: $action);
        $this->entity->addAction(action: $action);

        // Vérifie qu'il n'y a pas de doublon dans la collection
        $this->assertCount(expectedCount: 1, haystack: $this->entity->getActions(), message: "L'action ne devrait pas être ajoutée en double.");
    }

    #[Test]
    public function removeAction(): void
    {
        $action = new Action();
        $this->entity->addAction(action: $action);

        // Vérifie que l'action est bien ajoutée
        $this->assertCount(expectedCount: 1, haystack: $this->entity->getActions(), message: "L'action devrait être présente dans la collection avant suppression.");

        // Supprime l'action
        $this->entity->removeAction(action: $action);

        // Vérifie que l'action a été supprimée
        $this->assertCount(expectedCount: 0, haystack: $this->entity->getActions(), message: "L'action devrait être supprimée de la collection.");
        $this->assertNull(actual: $action->getUser(), message: "L'utilisateur dans l'action devrait être null après suppression.");
    }

    // Tester la Collection Logbook
    #[Test]
    public function getLogbooks(): void
    {
        $logbooks = $this->entity->getLogbooks();

        // Vérifie que getLogbooks renvoie une Collection et qu'elle est initialement vide
        $this->assertInstanceOf(expected: Collection::class, actual: $logbooks, message: "getLogbooks() devrait retourner une Collection.");
        $this->assertCount(expectedCount: 0, haystack: $logbooks, message: "La collection de logbooks devrait être vide au départ.");
    }

    #[Test]
    public function addLogbook(): void
    {
        $logbook = new Logbook();

        // Ajoute un logbook
        $this->entity->addLogbook($logbook);

        // Vérifie que le logbook a été ajouté
        $this->assertCount(expectedCount: 1, haystack: $this->entity->getLogbooks(), message: "Le logbook devrait être ajouté à la collection.");
        $this->assertTrue($this->entity->getLogbooks()->contains($logbook), message: "Le logbook devrait être présent dans la collection.");

        // Vérifie que l'utilisateur est bien défini dans l'entité Logbook
        $this->assertSame($this->entity, $logbook->getOwner(), message: "L'utilisateur devrait être défini comme propriétaire dans le logbook.");
    }

    #[Test]
    public function addLogbookDoesNotDuplicate(): void
    {
        $logbook = new Logbook();

        // Ajout du même logbook deux fois
        $this->entity->addLogbook(logbook: $logbook);
        $this->entity->addLogbook(logbook: $logbook);

        // Vérifie qu'il n'y a pas de doublon dans la collection
        $this->assertCount(expectedCount: 1, haystack: $this->entity->getLogbooks(), message: "Le logbook ne devrait pas être ajouté en double.");
    }

    #[Test]
    public function removeLogbook(): void
    {
        $logbook = new Logbook();
        $this->entity->addLogbook(logbook: $logbook);

        // Vérifie que le logbook est bien ajouté
        $this->assertCount(expectedCount: 1, haystack: $this->entity->getLogbooks(), message: "Le logbook devrait être présent dans la collection avant suppression.");

        // Supprime le logbook
        $this->entity->removeLogbook(logbook: $logbook);

        // Vérifie que le logbook a été supprimé
        $this->assertCount(expectedCount: 0, haystack: $this->entity->getLogbooks(), message: "Le logbook devrait être supprimé de la collection.");
        $this->assertNull(actual: $logbook->getOwner(), message: "L'utilisateur dans le logbook devrait être null après suppression.");
    }
}
