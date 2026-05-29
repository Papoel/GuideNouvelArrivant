<?php

declare(strict_types=1);

namespace App\Tests\Form;

use App\Entity\Logbook;
use App\Entity\Theme;
use App\Form\ThemeFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use PHPUnit\Framework\Attributes\AllowMockObjectsWithoutExpectations;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;

#[AllowMockObjectsWithoutExpectations]
class ThemeFormTypeTest extends TypeTestCase
{
    private FormFactoryInterface $formFactory;
    private ManagerRegistry $registry;
    private EntityManagerInterface $entityManager;
    private EntityRepository $repository;

    protected function setUp(): void
    {
        // Stub du EntityRepository pour simuler la réponse avec des entités Logbook
        $this->repository = $this->createStub(EntityRepository::class);
        $this->repository->method('findAll')->willReturn([new Logbook()]);

        // Stub du EntityManager et configuration pour retourner le repository
        $this->entityManager = $this->createStub(EntityManagerInterface::class);
        $this->entityManager->method('getRepository')->willReturn($this->repository);

        // Stub du ManagerRegistry et configuration pour retourner le EntityManager
        $this->registry = $this->createStub(ManagerRegistry::class);
        $this->registry->method('getManagerForClass')->willReturn($this->entityManager);

        // Stub du ClassMetadata pour que Doctrine reconnaisse Logbook comme entité mappée
        $metadata = $this->createStub(ClassMetadata::class);
        $metadata->method('getName')->willReturn(Logbook::class);
        $this->entityManager->method('getClassMetadata')->willReturn($metadata);

        // Crée le formFactory avec l'extension Doctrine
        $this->formFactory = Forms::createFormFactoryBuilder()
            ->addExtensions([new PreloadedExtension([new EntityType($this->registry)], [])])
            ->getFormFactory();

        // Appelez le parent setUp après l'initialisation des propriétés
        parent::setUp();
    }

    protected function getExtensions(): array
    {
        return [
            new PreloadedExtension([new EntityType($this->registry)], []),
        ];
    }

    #[Test] public function testBuildForm(): void
    {
        $form = $this->formFactory->create(ThemeFormType::class);

        // Vérifier que les champs sont bien présents dans le formulaire
        $this->assertTrue($form->has('title'));
        $this->assertTrue($form->has('description'));
        $this->assertTrue($form->has('logbooks'));
    }

    #[Test] public function testConfigureOptions(): void
    {
        $form = $this->factory->create(ThemeFormType::class);
        $options = $form->getConfig()->getOptions();

        $this->assertEquals(Theme::class, $options['data_class']);
    }
}
