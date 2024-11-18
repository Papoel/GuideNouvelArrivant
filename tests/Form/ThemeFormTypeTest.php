<?php

declare(strict_types=1);

namespace App\Tests\Form;

use App\Entity\Logbook;
use App\Entity\Theme;
use App\Form\ThemeFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;

class ThemeFormTypeTest extends TypeTestCase
{
    private FormFactoryInterface $formFactory;
    private ManagerRegistry $registry;
    private EntityManagerInterface $entityManager;
    private EntityRepository $repository;

    protected function setUp(): void
    {
        // Mock du EntityRepository pour simuler la réponse avec des entités Logbook
        $this->repository = $this->createMock(originalClassName: EntityRepository::class);
        $this->repository->method('findAll')->willReturn([new Logbook()]);  // Exemple d'un logbook mocké

        // Mock du EntityManager et configuration pour retourner le repository mocké
        $this->entityManager = $this->createMock(originalClassName: EntityManagerInterface::class);
        $this->entityManager->method('getRepository')->with(Logbook::class)->willReturn($this->repository);

        // Mock du ManagerRegistry et configuration pour retourner le EntityManager mocké
        $this->registry = $this->createMock(originalClassName: ManagerRegistry::class);
        $this->registry->method('getManagerForClass')->with(Logbook::class)->willReturn($this->entityManager);

        // Mock du ClassMetadata pour que Doctrine reconnaisse Logbook comme entité mappée
        $metadata = $this->createMock(originalClassName: ClassMetadata::class);
        $metadata->method('getName')->willReturn(value: Logbook::class);
        $this->entityManager->method('getClassMetadata')->with(Logbook::class)->willReturn($metadata);

        // Crée le formFactory avec l'extension Doctrine
        $this->formFactory = Forms::createFormFactoryBuilder()
            ->addExtensions([new PreloadedExtension([new EntityType($this->registry)], [])])
            ->getFormFactory();

        // Appelez le parent `setUp` après l'initialisation des propriétés
        parent::setUp();
    }

    protected function getExtensions(): array
    {
        return [
            new PreloadedExtension(types: [new EntityType(registry: $this->registry)], typeExtensions: []),
        ];
    }

    #[Test] public function testBuildForm(): void
    {
        $form = $this->formFactory->create(type: ThemeFormType::class);

        // Vérifier que les champs sont bien présents dans le formulaire
        $this->assertTrue(condition: $form->has(name: 'title'));
        $this->assertTrue(condition: $form->has(name: 'description'));
        $this->assertTrue(condition: $form->has(name: 'logbooks'));
    }

    #[Test] public function testConfigureOptions(): void
    {
        $form = $this->factory->create(ThemeFormType::class);
        $options = $form->getConfig()->getOptions();

        $this->assertEquals(Theme::class, $options['data_class']);
    }
}
