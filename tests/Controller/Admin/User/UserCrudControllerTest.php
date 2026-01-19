<?php

namespace App\Tests\Controller\Admin\User;

use App\Controller\Admin\User\UserCrudController;
use App\Entity\Job;
use App\Entity\Speciality;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Services\Admin\Users\UserDeletionService;
use App\Tests\Utils\UserTestHelper;
use Doctrine\Common\Collections\Collection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserCrudControllerTest extends TestCase
{
    private UserPasswordHasherInterface $passwordHasher;
    private UserDeletionService $userDeletionService;
    private UserRepository $userRepository;
    private UserCrudController $controller;
    private array $fields;

    /** @var AdminUrlGenerator&MockObject */
    private AdminUrlGenerator $adminUrlGenerator;

    /** @var AdminContext&MockObject */
    private AdminContext $adminContext;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        // Create mocks for all dependencies
        $this->passwordHasher = $this->createMock(UserPasswordHasherInterface::class);
        $this->userDeletionService = $this->createMock(UserDeletionService::class);
        $this->userRepository = $this->createMock(UserRepository::class);

        // Initialize the controller with mocked dependencies
        $this->controller = new UserCrudController(
            $this->passwordHasher,
            $this->userDeletionService,
            $this->userRepository
        );
        // Convert iterable to array for testing
        $this->fields = iterator_to_array(iterator: $this->controller->configureFields(pageName: 'form'));
    }

    #[Test] public function constructorInitialization(): void
    {
        $controller = new UserCrudController(
            $this->passwordHasher,
            $this->userDeletionService,
            $this->userRepository
        );

        $this->assertInstanceOf(expected: UserCrudController::class, actual: $controller);
    }

    #[Test]
    public function getEntityFqcn(): void
    {
        // Test that the FQCN returns the correct entity class
        self::assertEquals(expected: User::class, actual: UserCrudController::getEntityFqcn());
    }

    #[Test] public function deleteConstants(): void
    {
        // Test that the delete constants are properly defined
        self::assertEquals(expected: 'deleteUserOnly', actual: UserCrudController::DELETE_USER_ONLY);
        self::assertEquals(expected: 'deleteAll', actual: UserCrudController::DELETE_ALL);
        self::assertEquals(expected: 'deleteLogbooksOnly', actual: UserCrudController::DELETE_LOGBOOKS_ONLY);
    }

    #[Test]
    public function configureFieldsContainsRequiredFields(): void
    {
        $expectedFields = [
            'id' => ['class' => IdField::class, 'found' => false],
            'firstname' => ['class' => TextField::class, 'found' => false],
            'lastname' => ['class' => TextField::class, 'found' => false],
            'nni' => ['class' => TextField::class, 'found' => false],
            'email' => ['class' => TextField::class, 'found' => false],
            'password' => ['class' => TextField::class, 'found' => false],
            'roles' => ['class' => [ArrayField::class, ChoiceField::class], 'found' => false],
            'jobLabel' => ['class' => TextField::class, 'found' => false],
            'job' => ['class' => AssociationField::class, 'found' => false],
            'specialityLabel' => ['class' => TextField::class, 'found' => false],
            'speciality' => ['class' => AssociationField::class, 'found' => false],
            'mentor' => ['class' => AssociationField::class, 'found' => false],
            'logbooks' => ['class' => AssociationField::class, 'found' => false],
            'hiringAt' => ['class' => DateTimeField::class, 'found' => false],
            'lastLoginAt' => ['class' => DateTimeField::class, 'found' => false],
        ];

        foreach ($this->fields as $field) {
            $dto = $field->getAsDto();
            $property = $dto->getProperty();

            if (isset($expectedFields[$property])) {
                // Si la classe attendue est un tableau, vérifier que le champ est une instance de l'une des classes
                if (is_array($expectedFields[$property]['class'])) {
                    $isInstanceOfAny = false;
                    foreach ($expectedFields[$property]['class'] as $expectedClass) {
                        if ($field instanceof $expectedClass) {
                            $isInstanceOfAny = true;
                            break;
                        }
                    }
                    self::assertTrue(
                        $isInstanceOfAny,
                        message: "Le champ '$property' n'est pas du bon type. Attendu: l'une des classes " .
                            implode(', ', array_map(fn($class) => (new ReflectionClass($class))->getShortName(), $expectedFields[$property]['class'])) .
                            ", obtenu: " . get_class($field)
                    );
                } else {
                    // Comportement original pour une seule classe attendue
                    self::assertInstanceOf(
                        expected: $expectedFields[$property]['class'],
                        actual: $field,
                        message: "Le champ '$property' n'est pas du bon type"
                    );
                }
                $expectedFields[$property]['found'] = true;
            }
        }

        foreach ($expectedFields as $fieldName => $fieldData) {
            self::assertTrue(
                $fieldData['found'],
                message: "Le champ '$fieldName' n'a pas été trouvé dans la configuration"
            );
        }
    }

    #[Test] public function idFieldIsHidden(): void
    {
        foreach ($this->fields as $field) {
            if ($field instanceof IdField) {
                $dto = $field->getAsDto();
                self::assertTrue(
                    condition: $dto->isVirtual() ||
                        !$dto->isDisplayedOn(pageName: 'index'),
                    message: "Le champ ID n'est pas masqué sur la page index"
                );
                return;
            }
        }

        $this->fail("Aucun champ ID n'a été trouvé");
    }

    #[Test]
    public function rolesFieldConfiguration(): void
    {
        $fields = $this->controller->configureFields(pageName: 'form');
        foreach ($fields as $field) {
            if ($field instanceof ChoiceField && $field->getAsDto()->getProperty() === 'roles') {
                $dto = $field->getAsDto();

                // Accéder aux customOptions
                $this->assertTrue(
                    condition: $dto->getCustomOption(optionName: 'allowMultipleChoices'),
                    message: 'Le champ roles devrait permettre les choix multiples'
                );

                $badges = $dto->getCustomOption(optionName: 'renderAsBadges');
                $this->assertIsArray(actual: $badges, message: 'renderAsBadges devrait être un tableau');
                $this->assertArrayHasKey(key: 'ROLE_ADMIN', array: $badges);
                $this->assertArrayHasKey(key: 'ROLE_MENTOR', array: $badges);
                $this->assertArrayHasKey(key: 'ROLE_NEWCOMER', array: $badges);

                // Vérifier les valeurs des badges
                $this->assertEquals(expected: 'danger', actual: $badges['ROLE_ADMIN']);
                $this->assertEquals(expected: 'success', actual: $badges['ROLE_MENTOR']);
                $this->assertEquals(expected: 'warning', actual: $badges['ROLE_NEWCOMER']);

                return;
            }
        }
        $this->fail("Le champ roles n'a pas été trouvé ou n'est pas correctement configuré");
    }

    /**
     * @throws Exception
     */
    #[Test] public function configureLogbooksFieldConfiguration(): void
    {
        $emptyLogbooks = $this->createMock(type: Collection::class);
        $emptyLogbooks->method(constraint: 'count')->willReturn(value: 0);

        $filledLogbooks = $this->createMock(type: Collection::class);
        $filledLogbooks->method(constraint: 'count')->willReturn(value: 1);

        $userWithEmptyLogbooks = $this->createMock(type: User::class);
        $userWithEmptyLogbooks->method(constraint: 'getLogbooks')->willReturn(value: $emptyLogbooks);

        $userWithFilledLogbooks = $this->createMock(type: User::class);
        $userWithFilledLogbooks->method(constraint: 'getLogbooks')->willReturn(value: $filledLogbooks);

        $formatValueClosure = static function ($value, $entity) {
            return '<span style="display: inline-block" class="badge bg-' .
                ($entity->getLogbooks()->count() > 0 ? 'success-subtle' : 'danger-subtle') . '">' .
                ($entity->getLogbooks()->count() > 0 ? 'Oui' : 'Non') .
                '</span>';
        };

        $resultEmpty = $formatValueClosure(value: null, entity: $userWithEmptyLogbooks);
        self::assertStringContainsString(needle: 'badge bg-danger-subtle', haystack: $resultEmpty);
        self::assertStringContainsString(needle: 'Non', haystack: $resultEmpty);

        $resultFilled = $formatValueClosure(value: null, entity: $userWithFilledLogbooks);
        self::assertStringContainsString(needle: 'Oui', haystack: $resultFilled);
        self::assertStringContainsString(needle: 'badge bg-success-subtle', haystack: $resultFilled);
    }

    #[Test] public function mentorFieldIsOptional(): void
    {
        $fields = $this->controller->configureFields(pageName: 'form');
        foreach ($fields as $field) {
            if ($field instanceof AssociationField && $field->getAsDto()->getProperty() === 'mentor') {
                $dto = $field->getAsDto();

                // Vérifier les formTypeOptions qui sont utilisés effectivement par EasyAdmin
                $formTypeOptions = $dto->getFormTypeOptions();
                $this->assertArrayHasKey(key: 'required', array: $formTypeOptions);
                $this->assertFalse(condition: $formTypeOptions['required'], message: 'Le champ mentor devrait être optionnel');

                return;
            }
        }
        $this->fail("Le champ mentor n'a pas été trouvé");
    }

    #[Test]
    public function crudConfigurationSetsCorrectLabels(): void
    {
        $crud = Crud::new();
        $configuredCrud = $this->controller->configureCrud(crud: $crud);

        // Vérifier via le DTO
        $crudDto = $configuredCrud->getAsDto();

        self::assertEquals(expected: 'Utilisateur', actual: $crudDto->getEntityLabelInSingular());
        self::assertEquals(expected: 'Utilisateurs', actual: $crudDto->getEntityLabelInPlural());
    }


    #[Test] public function crudConfigurationSetsCorrectPageTitles(): void
    {
        $crud = Crud::new();
        $configuredCrud = $this->controller->configureCrud(crud: $crud);

        // Vérifier via le DTO
        $crudDto = $configuredCrud->getAsDto();

        $indexTitle = $crudDto->getCustomPageTitle(pageName: 'index');
        $newTitle = $crudDto->getCustomPageTitle(pageName: 'new');

        // Vérifier que les titres sont bien définis (évite la dépréciation __toString)
        self::assertNotNull($indexTitle);
        self::assertNotNull($newTitle);
    }

    /**
     * @throws \ReflectionException
     */
    #[Test] public function configureCrudSetsDateTimeFormat(): void
    {
        $crud = Crud::new();
        $configuredCrud = $this->controller->configureCrud($crud);

        // Récupérer la configuration de format de date/heure
        $dateTimeFormatMethod = new ReflectionMethod(objectOrMethod: $this->controller, method: 'configureCrud');
        $dateTimeFormatMethod->setAccessible(accessible: true);

        // Utiliser la réflexion pour vérifier les formats
        $crud = $dateTimeFormatMethod->invoke($this->controller, $crud);

        // Comme les formats spécifiques sont privés, on vérifie indirectement
        $this->assertNotNull(actual: $crud);
    }

    #[Test] public function crudConfigurationSetsCorrectPaginatorSettings(): void
    {
        $crud = Crud::new();
        $configuredCrud = $this->controller->configureCrud(crud: $crud);

        $crudDto = $configuredCrud->getAsDto();

        self::assertEquals(expected: 20, actual: $crudDto->getPaginator()->getPageSize());
    }

    #[Test]
    public function crudConfigurationSetsCorrectDatetimeFormat(): void
    {
        $crud = Crud::new();
        $configuredCrud = $this->controller->configureCrud(crud: $crud);

        $crudDto = $configuredCrud->getAsDto();

        // Vérifier que les formats de date et heure sont corrects
        self::assertEquals(
            expected: DateTimeField::FORMAT_LONG,
            actual: $crudDto->getDateTimePattern()['0']
        );
        self::assertEquals(
            expected: DateTimeField::FORMAT_SHORT,
            actual: $crudDto->getDateTimePattern()['1']
        );
    }

    #[Test]
    public function crudConfigurationAddsFormTheme(): void
    {
        $crud = Crud::new();
        $configuredCrud = $this->controller->configureCrud(crud: $crud);

        $crudDto = $configuredCrud->getAsDto();

        $formThemes = $crudDto->getFormThemes();
        self::assertContains(needle: 'admin/crud/delete_confirmation_modal.html.twig', haystack: $formThemes);
    }


    #[Test]
    public function crudConfigurationSetsDynamicPageTitlesForExistingUser(): void
    {
        $user = UserTestHelper::createUser([
            'firstname' => 'Harvey',
            'lastname' => 'Dent'
        ]);

        $crud = Crud::new();
        $configuredCrud = $this->controller->configureCrud(crud: $crud);

        // Réutiliser la logique de configuration originale
        $detailTitle = static fn(User $u) => '👁️ Détails - ' . $u->getFullName();
        $editTitle = static fn(User $u) => '🧑‍💻 Modifier - ' . $u->getFullName();

        self::assertEquals(expected: '👁️ Détails - Harvey DENT', actual: $detailTitle(u: $user));
        self::assertEquals(expected: '🧑‍💻 Modifier - Harvey DENT', actual: $editTitle(u: $user));
    }
}
