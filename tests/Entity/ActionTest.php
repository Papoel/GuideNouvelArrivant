<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Action;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Tests\Abstract\EntityTestCase;
use App\Tests\Entity\Trait\EntityIdTestTrait;
use DateTimeImmutable;
use Symfony\Component\Uid\Uuid;

class ActionTest extends EntityTestCase
{
    use EntityIdTestTrait;

    protected function getEntity(): Action
    {
        return $this->getEntityAction();
    }

    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof Action) {
            throw new \InvalidArgumentException(message: 'Entity must be an instance of Action');
        }

        $entity->setDescription(description: "Description modifiée");
        $entity->setAgentComment(agentComment: "Nouveau commentaire");
        $entity->setAgentVisa(agentVisa: "Nouveau visa");
    }

    private function getEntityAction(): Action
    {
        $action = new Action();
        $action->setDescription(description: "Description du Action de test");
        $action->setAgentComment(agentComment: "Commentaire de l'agent");
        $action->setAgentValidatedAt(agentValidatedAt: null);
        $action->setAgentVisa(agentVisa: "Visa de l'agent");
        $action->setMentorComment(mentorComment: "Commentaire du mentor");
        $action->setMentorValidatedAt(mentorValidatedAt: new \DateTime(datetime: "2021-09-01"));
        $action->setMentorCommentedAt(mentorCommentedAt: null);
        $action->setMentorVisa(mentorVisa: "Visa du mentor");
        return $action;
    }

    public function testEntityActionIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityAction(), count: 0);
    }

    public function testGetId(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: null, actual: $entity->getId());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetDescription(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: "Description du Action de test", actual: $entity->getDescription());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetAgentComment(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: "Commentaire de l'agent", actual: $entity->getAgentComment());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetAgentValidatedAt(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: null, actual: $entity->getAgentValidatedAt());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetAgentVisa(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: "Visa de l'agent", actual: $entity->getAgentVisa());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetMentorComment(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: "Commentaire du mentor", actual: $entity->getMentorComment());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetMentorValidatedAt(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: new DateTimeImmutable(datetime: "2021-09-01"), actual: $entity->getMentorValidatedAt());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetMentorCommentedAt(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: null, actual: $entity->getMentorCommentedAt());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetMentorVisa(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: "Visa du mentor", actual: $entity->getMentorVisa());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetModuleReturnsNull(): void
    {
        $entity = $this->getEntityAction();
        self::assertEquals(expected: null, actual: $entity->getModule());
        self::assertNull($entity->getModule());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetModuleReturnsModule(): void
    {
        $entity = $this->getEntityAction();
        $module = new Module();
        $entity->setModule(module: $module);
        self::assertEquals(expected: $module, actual: $entity->getModule());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testToString(): void
    {
        $entity = $this->getEntity();
        $uuid = Uuid::v4();
        $this->setEntityId($entity, $uuid);

        $this->assertSame(
            expected: "Action #$uuid",
            actual: (string)$entity,
            message: "La méthode __toString() ne retourne pas la chaîne attendue"
        );
    }

    public function testToStringWithoutId(): void
    {
        // Test du cas où l'ID est null
        $action = $this->getEntityAction();

        $expectedString = "Action #";

        $this->assertSame(
            expected: $expectedString,
            actual: (string)$action,
            message: "La méthode __toString() ne gère pas correctement le cas où l'ID est null."
        );
    }

    public function testGetLogbook(): void
    {
        $entity = $this->getEntityAction();
        $logbook = new Logbook();
        $entity->setLogbook(logbook: $logbook);
        self::assertEquals(expected: $logbook, actual: $entity->getLogbook());
        $this->assertValidationErrorsCount($entity, count: 0);
    }
}
