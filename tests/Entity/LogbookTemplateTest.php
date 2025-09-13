<?php

declare(strict_types=1);

namespace App\Tests\Entity;

use App\Entity\Job;
use App\Entity\LogbookTemplate;
use App\Entity\Service;
use App\Entity\Theme;
use App\Tests\Abstract\EntityTestCase;
use App\Tests\Entity\Trait\EntityIdTestTrait;
use Doctrine\Common\Collections\Collection;

class LogbookTemplateTest extends EntityTestCase
{
    use EntityIdTestTrait;

    protected function getEntity(): LogbookTemplate
    {
        return $this->getEntityLogbookTemplate();
    }

    protected function modifyEntity(object $entity): void
    {
        if (!$entity instanceof LogbookTemplate) {
            throw new \InvalidArgumentException('Entity must be an instance of LogbookTemplate');
        }

        $entity->setName("Modèle modifié");
        $entity->setDescription("Description modifiée");
        $entity->setIsDefault(true);
    }

    private function getEntityLogbookTemplate(): LogbookTemplate
    {
        $template = new LogbookTemplate();
        $template->setName('Modèle de test');
        $template->setDescription('Description du modèle de test');
        $template->setIsDefault(false);
        $template->setJobs(['TECH', 'ING']);
        return $template;
    }

    public function testEntityLogbookTemplateIsValid(): void
    {
        $this->assertValidationErrorsCount($this->getEntityLogbookTemplate(), count: 0);
    }

    public function testGetId(): void
    {
        $entity = $this->getEntityLogbookTemplate();
        self::assertEquals(expected: null, actual: $entity->getId());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetName(): void
    {
        $entity = $this->getEntityLogbookTemplate();
        $name = "Nouveau modèle";

        $entity->setName($name);
        self::assertEquals($name, $entity->getName());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetDescription(): void
    {
        $entity = $this->getEntityLogbookTemplate();
        $description = "Nouvelle description";

        $entity->setDescription($description);
        self::assertEquals($description, $entity->getDescription());

        // Test avec null
        $entity->setDescription(null);
        self::assertNull($entity->getDescription());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testIsSetDefault(): void
    {
        $entity = $this->getEntityLogbookTemplate();

        // Test avec true
        $entity->setIsDefault(true);
        self::assertTrue($entity->isDefault());

        // Test avec false
        $entity->setIsDefault(false);
        self::assertFalse($entity->isDefault());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetJobs(): void
    {
        $entity = $this->getEntityLogbookTemplate();
        $jobs = ['CA', 'ING', 'TECH'];

        $entity->setJobs($jobs);
        self::assertEquals($jobs, $entity->getJobs());
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testAddRemoveJob(): void
    {
        $entity = $this->getEntityLogbookTemplate();
        $entity->setJobs([]);

        // Test avec une chaîne
        $entity->addJob('CA');
        self::assertTrue($entity->hasJob('CA'));
        self::assertCount(1, $entity->getJobs());

        // Test avec un objet Job
        $job = new Job();
        $job->setName('Ingénieur');
        $job->setCode('ING');

        $entity->addJob($job);
        self::assertTrue($entity->hasJob($job));
        self::assertTrue($entity->hasJob('ING'));
        self::assertCount(2, $entity->getJobs());

        // Test de suppression
        $entity->removeJob('CA');
        self::assertFalse($entity->hasJob('CA'));
        self::assertCount(1, $entity->getJobs());

        $entity->removeJob($job);
        self::assertFalse($entity->hasJob($job));
        self::assertCount(0, $entity->getJobs());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testHasJobWithJobObject(): void
    {
        $entity = $this->getEntityLogbookTemplate();

        // Test avec un objet Job dont le code est dans les jobs
        $entity->setJobs(['CA', 'ING']);
        $job = new Job();
        $job->setName('Ingénieur');
        $job->setCode('ING');
        self::assertTrue($entity->hasJob($job));

        // Test avec un objet Job dont le nom est dans les jobs
        $entity->setJobs(['Ingénieur', 'TECH']);
        self::assertTrue($entity->hasJob($job));

        // Test avec un objet Job qui n'est pas dans les jobs
        $job2 = new Job();
        $job2->setName('Développeur');
        $job2->setCode('DEV');
        self::assertFalse($entity->hasJob($job2));

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testHasJobWithSpecialCaseCA(): void
    {
        $entity = $this->getEntityLogbookTemplate();

        // Test du cas spécial "Chargé d'affaires" vs "CA"
        $entity->setJobs(["Charg\u00e9 d'affaires"]);
        $job = new Job();
        $job->setName("Chargé d'affaires");
        $job->setCode('CA');
        self::assertTrue($entity->hasJob($job));

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testHasJobWithJsonEncodedValues(): void
    {
        $entity = $this->getEntityLogbookTemplate();

        // Test avec des jobs stockés sous forme de chaîne JSON
        $entity->setJobs(['["CA","ING"]']);
        $job = new Job();
        $job->setName('Ingénieur');
        $job->setCode('ING');
        self::assertTrue($entity->hasJob($job));

        // Test avec un job qui n'est pas dans la chaîne JSON
        $job2 = new Job();
        $job2->setName('Développeur');
        $job2->setCode('DEV');
        self::assertFalse($entity->hasJob($job2));

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetNormalizedJobs(): void
    {
        $entity = $this->getEntityLogbookTemplate();

        // Test avec des chaînes simples
        $entity->setJobs(['CA', 'ING']);
        self::assertEquals(['CA', 'ING'], $entity->getNormalizedJobs());

        // Test avec une chaîne JSON valide (tableau)
        $entity->setJobs(['["CA","ING"]']);
        $normalized = $entity->getNormalizedJobs();
        self::assertEquals(['CA', 'ING'], $normalized);

        // Test avec une chaîne JSON valide (objet)
        $entity->setJobs(['{"job":"CA"}']);
        $normalized = $entity->getNormalizedJobs();
        self::assertContains('{"job":"CA"}', $entity->getJobs());

        // Test avec un mélange de formats
        $entity->setJobs(['CA', '["ING","TECH"]', 'DEV']);
        $normalized = $entity->getNormalizedJobs();
        self::assertContains('CA', $normalized);
        self::assertContains('ING', $normalized);
        self::assertContains('TECH', $normalized);
        self::assertContains('DEV', $normalized);

        // Test avec une chaîne JSON invalide (ne devrait pas planter)
        $entity->setJobs(['[invalid-json']);
        $normalized = $entity->getNormalizedJobs();
        self::assertEquals(['[invalid-json'], $normalized);

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetJobLabel(): void
    {
        $entity = $this->getEntityLogbookTemplate();

        // Test avec des jobs
        $entity->setJobs(['CA', 'ING']);
        self::assertEquals('CA, ING', $entity->getJobLabel());

        // Test sans jobs
        $entity->setJobs([]);
        self::assertEquals('Aucun métier associé', $entity->getJobLabel());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetSetService(): void
    {
        $entity = $this->getEntityLogbookTemplate();
        $service = new Service();
        $service->setName('Service de test');

        $entity->setService($service);
        self::assertSame($service, $entity->getService());

        // Test avec null
        $entity->setService(null);
        self::assertNull($entity->getService());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testGetThemes(): void
    {
        $entity = $this->getEntityLogbookTemplate();
        $themes = $entity->getThemes();

        self::assertInstanceOf(Collection::class, $themes);
        self::assertCount(0, $themes);
        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testAddRemoveTheme(): void
    {
        $entity = $this->getEntityLogbookTemplate();
        $theme = new Theme();
        $theme->setTitle('Thème de test');

        // Test d'ajout
        $entity->addTheme($theme);
        self::assertTrue($entity->getThemes()->contains($theme));
        self::assertCount(1, $entity->getThemes());

        // Test d'ajout du même thème (ne devrait pas être ajouté en double)
        $entity->addTheme($theme);
        self::assertCount(1, $entity->getThemes());

        // Test de suppression
        $entity->removeTheme($theme);
        self::assertFalse($entity->getThemes()->contains($theme));
        self::assertCount(0, $entity->getThemes());

        $this->assertValidationErrorsCount($entity, count: 0);
    }

    public function testToString(): void
    {
        $entity = $this->getEntityLogbookTemplate();
        $name = 'Modèle de test';
        $entity->setName($name);

        self::assertEquals($name, (string)$entity);

        // Pour le test avec un nom vide, nous n'utilisons pas la validation
        // car cela violerait les contraintes NotBlank et Length
        $entity = new LogbookTemplate();
        $reflection = new \ReflectionClass($entity);
        $property = $reflection->getProperty('name');
        $property->setAccessible(true);
        $property->setValue($entity, '');

        self::assertEquals('', (string)$entity);
    }
}
