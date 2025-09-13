<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Action;
use App\Entity\Feedback;
use App\Entity\Job;
use App\Entity\Logbook;
use App\Entity\Service;
use App\Entity\Speciality;
use App\Entity\User;
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
        // Créer les objets Job et Speciality pour les tests
        $job = new Job();
        $job->setName('Technicien');
        $job->setCode('TECH');
        
        $speciality = new Speciality();
        $speciality->setName('Chaudronnerie');
        $speciality->setCode('CHA');
        
        $user = new User();
        $user->setFirstname(firstname: "Noémi");
        $user->setLastname(lastname: "Colin");
        $user->setEmail(email: "thibault99@fernandez.com");
        $user->setRoles(roles: ['ROLE_USER']);
        $user->setPassword(password: "Password123!");
        $user->setLastLoginAt(lastLoginAt: null);
        $user->setJob(job: $job);
        $user->setNni(nni: "A74591");
        $user->setSpeciality(speciality: $speciality);
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
        $job = $entity->getJob();
        self::assertInstanceOf(expected: Job::class, actual: $job);
        self::assertEquals(expected: 'Technicien', actual: $job->getName());
        self::assertEquals(expected: 'TECH', actual: $job->getCode());
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
        $speciality = $entity->getSpeciality();
        self::assertInstanceOf(expected: Speciality::class, actual: $speciality);
        self::assertEquals(expected: 'Chaudronnerie', actual: $speciality->getName());
        self::assertEquals(expected: 'CHA', actual: $speciality->getCode());
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
        // Créer une spécialité pour le test
        $speciality = new Speciality();
        $speciality->setName('Chaudronnerie');
        $speciality->setCode('CHA');
        
        $this->entity->setSpeciality($speciality);

        // Vérifie que getSpecialityAbbreviation renvoie l'abréviation correcte
        $this->assertEquals(
            expected: 'CHA',
            actual: $this->entity->getSpeciality()->getCode(),
            message: "L'abréviation de la spécialité devrait être 'CHA'."
        );
    }

    #[Test]
    public function getSpecialityLabel(): void
    {
        // Créer une spécialité pour le test
        $speciality = new Speciality();
        $speciality->setName('Chaudronnerie');
        $speciality->setCode('CHA');
        
        $this->entity->setSpeciality($speciality);

        // Vérifie que getSpecialityLabel renvoie le label de la spécialité
        $this->assertEquals(
            'Chaudronnerie',
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

    // ----------------- TESTS LABELS -----------------
    #[Test]
    public function getJobLabel(): void
    {
        // Créer un job pour le test
        $job = new Job();
        $job->setName('Technicien');
        $job->setCode('TECH');
        
        $this->entity->setJob($job);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            'Technicien',
            $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Technicien'."
        );
    }

    #[Test]
    public function getJobLabelReturnsTechnician(): void
    {
        // Créer un job pour le test
        $job = new Job();
        $job->setName('Technicien');
        $job->setCode('TECH');
        
        $this->entity->setJob($job);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: 'Technicien',
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Technicien'."
        );
    }

    #[Test]
    public function getJobLabelReturnsEngineer(): void
    {
        // Créer un job pour le test
        $job = new Job();
        $job->setName('Ingénieur');
        $job->setCode('ING');
        
        $this->entity->setJob($job);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: 'Ingénieur',
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Ingénieur'."
        );
    }

    #[Test]
    public function getJobLabelReturnsBusinessManager(): void
    {
        // Créer un job pour le test
        $job = new Job();
        $job->setName("Chargé d'affaires");
        $job->setCode('CA');
        
        $this->entity->setJob($job);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: "Chargé d'affaires",
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Chargé d'affaires'."
        );
    }

    #[Test]
    public function getJobLabelReturnsProjectBusinessManager(): void
    {
        // Créer un job pour le test
        $job = new Job();
        $job->setName("Chargé d'affaires projet");
        $job->setCode('CAP');
        
        $this->entity->setJob($job);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: "Chargé d'affaires projet",
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Chargé d'affaires projet'."
        );
    }

    #[Test]
    public function getJobLabelReturnsSurveillanceManager(): void
    {
        // Créer un job pour le test
        $job = new Job();
        $job->setName("Chargé de surveillance");
        $job->setCode('CSI');
        
        $this->entity->setJob($job);

        // Vérifie que getJobLabel renvoie le label de l'emploi correctement
        $this->assertEquals(
            expected: "Chargé de surveillance",
            actual: $this->entity->getJobLabel(),
            message: "Le label de l'emploi devrait être 'Chargé de surveillance'."
        );
    }


    // ----------------- FIN DES TESTS LABELS -----------------

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
    
    #[Test]
    public function getUserIdentifierWithNullEmail(): void
    {
        // Créer un utilisateur avec un email vide
        $user = new User();
        $user->setEmail('');
        
        // Vérifie que getUserIdentifier gère correctement le cas où l'email est vide
        $identifier = $user->getUserIdentifier();
        $this->assertStringStartsWith('user_', $identifier, "L'identifiant devrait commencer par 'user_' lorsque l'email est vide.");
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
    
    #[Test]
    public function hasLogbooks(): void
    {
        // Au départ, l'utilisateur n'a pas de logbooks
        $this->assertFalse(
            $this->entity->hasLogbooks(),
            message: "Un nouvel utilisateur ne devrait pas avoir de logbooks."
        );
        
        // Ajout d'un logbook
        $logbook = new Logbook();
        $this->entity->addLogbook($logbook);
        
        // Vérifie que hasLogbooks retourne true après l'ajout
        $this->assertTrue(
            $this->entity->hasLogbooks(),
            message: "hasLogbooks() devrait retourner true après l'ajout d'un logbook."
        );
        
        // Suppression du logbook
        $this->entity->removeLogbook($logbook);
        
        // Vérifie que hasLogbooks retourne false après la suppression
        $this->assertFalse(
            $this->entity->hasLogbooks(),
            message: "hasLogbooks() devrait retourner false après la suppression du logbook."
        );
    }
    
    // Tester la Collection Feedback
    #[Test]
    public function getFeedback(): void
    {
        $feedbacks = $this->entity->getFeedback();
        
        // Vérifie que getFeedback renvoie une Collection et qu'elle est initialement vide
        $this->assertInstanceOf(expected: Collection::class, actual: $feedbacks, message: "getFeedback() devrait retourner une Collection.");
        $this->assertCount(expectedCount: 0, haystack: $feedbacks, message: "La collection de feedbacks devrait être vide au départ.");
    }
    
    #[Test]
    public function addFeedback(): void
    {
        $feedback = new Feedback();
        
        // Ajoute un feedback
        $this->entity->addFeedback($feedback);
        
        // Vérifie que le feedback a été ajouté
        $this->assertCount(expectedCount: 1, haystack: $this->entity->getFeedback(), message: "Le feedback devrait être ajouté à la collection.");
        $this->assertTrue($this->entity->getFeedback()->contains($feedback), message: "Le feedback devrait être présent dans la collection.");
        
        // Vérifie que l'utilisateur est bien défini dans l'entité Feedback
        $this->assertSame($this->entity, $feedback->getAuthor(), message: "L'utilisateur devrait être défini comme auteur dans le feedback.");
    }
    
    #[Test]
    public function addFeedbackDoesNotDuplicate(): void
    {
        $feedback = new Feedback();
        
        // Ajout du même feedback deux fois
        $this->entity->addFeedback($feedback);
        $this->entity->addFeedback($feedback);
        
        // Vérifie qu'il n'y a pas de doublon dans la collection
        $this->assertCount(expectedCount: 1, haystack: $this->entity->getFeedback(), message: "Le feedback ne devrait pas être ajouté en double.");
    }
    
    #[Test]
    public function removeFeedback(): void
    {
        $feedback = new Feedback();
        $this->entity->addFeedback($feedback);
        
        // Vérifie que le feedback est bien ajouté
        $this->assertCount(expectedCount: 1, haystack: $this->entity->getFeedback(), message: "Le feedback devrait être présent dans la collection avant suppression.");
        
        // Supprime le feedback
        $this->entity->removeFeedback($feedback);
        
        // Vérifie que le feedback a été supprimé
        $this->assertCount(expectedCount: 0, haystack: $this->entity->getFeedback(), message: "Le feedback devrait être supprimé de la collection.");
        $this->assertNull(actual: $feedback->getAuthor(), message: "L'auteur dans le feedback devrait être null après suppression.");
    }
    
    #[Test]
    public function getService(): void
    {
        // Au départ, l'utilisateur n'a pas de service
        $this->assertNull(
            $this->entity->getService(),
            message: "Un nouvel utilisateur ne devrait pas avoir de service par défaut."
        );
    }
    
    #[Test]
    public function setService(): void
    {
        // Créer un service pour le test
        $service = new Service();
        $service->setName('SRV-TEST');
        $service->setDescription('Service de test');
        
        // Assigner le service à l'utilisateur
        $this->entity->setService($service);
        
        // Vérifie que le service est correctement assigné
        $this->assertSame(
            $service,
            $this->entity->getService(),
            message: "Le service devrait être correctement assigné à l'utilisateur."
        );
        
        // Test avec null
        $this->entity->setService(null);
        $this->assertNull(
            $this->entity->getService(),
            message: "Le service devrait être null après avoir été supprimé."
        );
    }
}
