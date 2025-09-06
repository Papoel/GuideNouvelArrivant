<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use DateTime;
use DateTimeImmutable;
use App\Entity\Feedback;
use App\Tests\Abstract\EntityTestCase;
use App\Tests\Entity\Trait\EntityIdTestTrait;

class FeedbackTest extends EntityTestCase
{
    use EntityIdTestTrait;

    protected function getEntity(): Feedback
    {
        return $this->getEntityFeedback();
    }
    
    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof Feedback) {
            throw new \InvalidArgumentException('Entity must be an instance of Feedback');
        }
        
        $entity->setTitle(title: "Titre modifié");
        $entity->setContent(content: "Contenu modifié");
        $entity->setCategory(category: "Nouvelle catégorie");
    }

    private function randomCategory(): string
    {
        $categories = [
            "Gestion des actions",
            "Gestion des modules",
            "Gestion des logbooks",
        ];
        return $categories[array_rand($categories)];
    }

    private function getEntityUser(): \App\Entity\User
    {
        // Créer les objets Job et Speciality pour les tests
        $job = new \App\Entity\Job();
        $job->setName('Technicien');
        $job->setCode('TECH');

        $speciality = new \App\Entity\Speciality();
        $speciality->setName('Chaudronnerie');
        $speciality->setCode('CHA');

        $user = new \App\Entity\User();
        $user->setFirstname(firstname: "Noémie");
        $user->setLastname(lastname: "Colin");
        $user->setEmail(email: "test@example.com");
        $user->setRoles(roles: ['ROLE_USER']);
        $user->setPassword(password: "Password123!");
        $user->setJob(job: $job);
        $user->setNni(nni: "A74591");
        $user->setSpeciality(speciality: $speciality);
        $user->setHiringAt(hiringAt: new DateTimeImmutable(datetime: "2023-01-01 12:00:00"));

        return $user;
    }

    private function getEntityFeedback(): Feedback
    {
        $feedback = new Feedback();
        $feedback->setTitle(title: "Feedback de test");
        $feedback->setContent(content: "Contenu du feedback de test");
        $feedback->setCategory(category: $this->randomCategory());
        $feedback->setIsReviewed(isReviewed: true);
        $feedback->setManagerComment(managerComment: "Commentaire du manager");
        $feedback->setReviewAt(reviewAt: new DateTimeImmutable("2025-09-05"));
        $feedback->setAuthor(author: $this->getEntityUser());
        $feedback->setReviewedBy(reviewedBy: $this->getEntityUser());
        return $feedback;
    }

    public function testEntityActionIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityFeedback(), count: 0);
    }

    public function testGetId(): void
    {
        $entity = $this->getEntityFeedback();
        self::assertEquals(expected: null, actual: $entity->getId());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetTitle(): void
    {
        $entity = $this->getEntityFeedback();
        $title = "Nouveau titre de feedback";

        $entity->setTitle($title);
        self::assertEquals($title, $entity->getTitle());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetContent(): void
    {
        $entity = $this->getEntityFeedback();
        $content = "Nouveau contenu de feedback plus détaillé pour les tests";

        $entity->setContent($content);
        self::assertEquals($content, $entity->getContent());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetCategory(): void
    {
        $entity = $this->getEntityFeedback();
        $category = "Nouvelle catégorie";

        $entity->setCategory($category);
        self::assertEquals($category, $entity->getCategory());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testIsSetReviewed(): void
    {
        $entity = $this->getEntityFeedback();

        // Test avec true
        $entity->setIsReviewed(true);
        self::assertTrue($entity->isReviewed());

        // Test avec false
        $entity->setIsReviewed(false);
        self::assertFalse($entity->isReviewed());

        // Test avec null
        $entity->setIsReviewed(null);
        self::assertNull($entity->isReviewed());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetManagerComment(): void
    {
        $entity = $this->getEntityFeedback();
        $comment = "Nouveau commentaire du manager";

        $entity->setManagerComment($comment);
        self::assertEquals($comment, $entity->getManagerComment());

        // Test avec null
        $entity->setManagerComment(null);
        self::assertNull($entity->getManagerComment());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetAuthor(): void
    {
        $entity = $this->getEntityFeedback();
        $user = $this->getEntityUser();

        $entity->setAuthor($user);
        self::assertSame($user, $entity->getAuthor());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetReviewedBy(): void
    {
        $entity = $this->getEntityFeedback();
        $user = $this->getEntityUser();

        $entity->setReviewedBy($user);
        self::assertSame($user, $entity->getReviewedBy());

        // Test avec null
        $entity->setReviewedBy(null);
        self::assertNull($entity->getReviewedBy());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetReviewAt(): void
    {
        $entity = $this->getEntityFeedback();
        $date = new DateTimeImmutable("2025-10-15");

        $entity->setReviewAt($date);
        self::assertSame($date, $entity->getReviewAt());

        // Test avec null
        $entity->setReviewAt(null);
        self::assertNull($entity->getReviewAt());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testTimestampTrait(): void
    {
        $entity = $this->getEntityFeedback();
        
        // Test des timestamps initiaux (null avant persistance)
        self::assertNull($entity->getCreatedAt());
        self::assertNull($entity->getUpdatedAt());
        
        // Simuler les callbacks de cycle de vie
        $entity->createdTimestamps(); // Appel direct de la méthode du trait
        $entity->updatedTimestamps(); // Appel direct de la méthode du trait
        
        // Vérifier que les timestamps sont définis
        self::assertInstanceOf(DateTimeImmutable::class, $entity->getCreatedAt());
        self::assertInstanceOf(\DateTime::class, $entity->getUpdatedAt()); // DateTime et non DateTimeImmutable
        
        $this->assertValidationErrorsCount($entity, count: 0);
    }
}
