<?php

namespace App\Tests\Controller\Admin\User;

use App\Controller\Admin\User\UserCrudController;
use App\Entity\Logbook;
use App\Entity\User;
use App\Services\Admin\UserDeletionService;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\DashboardDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\I18nDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Registry\CrudControllerRegistry;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\Exception;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Test proxy for AdminContext
 */
class TestAdminContextProxy
{
    private EntityDto $entityDto;

    public function __construct(EntityDto $entityDto)
    {
        $this->entityDto = $entityDto;
    }

    public function getEntity(): EntityDto
    {
        return $this->entityDto;
    }
}

/**
 * Test proxy for AdminUrlGenerator
 */
class TestAdminUrlGeneratorProxy
{
    public function setController(string $controller): self
    {
        return $this;
    }

    public function setAction(string $action): self
    {
        return $this;
    }

    public function setEntityId($id): self
    {
        return $this;
    }

    public function generateUrl(): string
    {
        return '/admin';
    }
}

class UserCrudControllerTest extends KernelTestCase
{
    private UserCrudController $controller;
    private UserPasswordHasherInterface $passwordHasher;
    private UserDeletionService $userDeletionService;
    private UserRepository $userRepository;
    private EntityManagerInterface $entityManager;
    private FlashBagInterface $flashBag;
    private RequestStack $requestStack;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        self::bootKernel();

        $this->passwordHasher = $this->createMock(UserPasswordHasherInterface::class);
        $this->userDeletionService = $this->createMock(UserDeletionService::class);
        $this->userRepository = $this->createMock(UserRepository::class);

        $this->controller = new UserCrudController(
            $this->passwordHasher,
            $this->userDeletionService,
            $this->userRepository
        );

        $this->entityManager = $this->createMock(EntityManagerInterface::class);

        // Set up flash messages
        $this->flashBag = $this->createMock(FlashBagInterface::class);
        $session = $this->createMock(Session::class);
        $session->method('getFlashBag')->willReturn($this->flashBag);

        $this->requestStack = $this->createMock(RequestStack::class);
        $this->requestStack->method('getSession')->willReturn($session);

        $container = self::getContainer();
        $container->set('request_stack', $this->requestStack);
    }

    #[Test] public function GetEntityFqcn(): void
    {
        self::assertEquals(expected: User::class, actual: UserCrudController::getEntityFqcn());
    }

    #[Test] public function ConfigureFields(): void
    {
        $fields = iterator_to_array(iterator: $this->controller->configureFields(pageName: 'index'));

        // Test total number of fields
        self::assertCount(expectedCount: 15, haystack: $fields);

        // Test ID field
        self::assertInstanceOf(expected: IdField::class, actual: $fields[0]);
        self::assertEquals(expected: 'id', actual: $fields[0]->getAsDto()->getProperty());

        // Test firstname field
        self::assertInstanceOf(expected: TextField::class, actual: $fields[1]);
        self::assertEquals(expected: 'firstname', actual: $fields[1]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Prénom', actual: $fields[1]->getAsDto()->getLabel());
        self::assertEquals(expected: 'col-md-3 col-sm-12', actual: $fields[1]->getAsDto()->getColumns());

        // Test lastname field
        self::assertInstanceOf(expected: TextField::class, actual: $fields[2]);
        self::assertEquals(expected: 'lastname', actual: $fields[2]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Nom', actual: $fields[2]->getAsDto()->getLabel());
        self::assertEquals(expected: 'col-md-3 col-sm-12', actual: $fields[2]->getAsDto()->getColumns());

        // Test NNI field
        self::assertInstanceOf(expected: TextField::class, actual: $fields[3]);
        self::assertEquals(expected: 'nni', actual: $fields[3]->getAsDto()->getProperty());
        self::assertEquals(expected: 'NNI', actual: $fields[3]->getAsDto()->getLabel());
        self::assertEquals(expected: 'col-md-3 col-sm-12', actual: $fields[3]->getAsDto()->getColumns());

        // Test email field
        self::assertInstanceOf(expected: TextField::class, actual: $fields[4]);
        self::assertEquals(expected: 'email', actual: $fields[4]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Email', actual: $fields[4]->getAsDto()->getLabel());
        self::assertEquals(expected: 'col-md-3 col-sm-12', actual: $fields[4]->getAsDto()->getColumns());

        // Test password field
        self::assertInstanceOf(expected: TextField::class, actual: $fields[5]);
        self::assertEquals(expected: 'password', actual: $fields[5]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Mot de passe', actual: $fields[5]->getAsDto()->getLabel());
        self::assertEquals(expected: PasswordType::class, actual: $fields[5]->getAsDto()->getFormType());

        // Test roles field
        self::assertInstanceOf(expected: ChoiceField::class, actual: $fields[6]);
        self::assertEquals(expected: 'roles', actual: $fields[6]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Rôles', actual: $fields[6]->getAsDto()->getLabel());

        // Test job fields
        self::assertInstanceOf(expected: TextField::class, actual: $fields[7]);
        self::assertEquals(expected: 'jobLabel', actual: $fields[7]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Métier', actual: $fields[7]->getAsDto()->getLabel());

        self::assertInstanceOf(expected: ChoiceField::class, actual: $fields[8]);
        self::assertEquals(expected: 'job', actual: $fields[8]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Métier', actual: $fields[8]->getAsDto()->getLabel());

        // Test speciality fields
        self::assertInstanceOf(expected: TextField::class, actual: $fields[9]);
        self::assertEquals(expected: 'specialityLabel', actual: $fields[9]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Spécialité', actual: $fields[9]->getAsDto()->getLabel());

        self::assertInstanceOf(expected: ChoiceField::class, actual: $fields[10]);
        self::assertEquals(expected: 'speciality', actual: $fields[10]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Spécialité', actual: $fields[10]->getAsDto()->getLabel());

        // Test mentor field
        self::assertInstanceOf(expected: AssociationField::class, actual: $fields[11]);
        self::assertEquals(expected: 'mentor', actual: $fields[11]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Tuteur', actual: $fields[11]->getAsDto()->getLabel());

        // Test logbooks field
        self::assertInstanceOf(expected: AssociationField::class, actual: $fields[12]);
        self::assertEquals(expected: 'logbooks', actual: $fields[12]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Carnets', actual: $fields[12]->getAsDto()->getLabel());

        // Test hiringAt field
        self::assertInstanceOf(expected: DateTimeField::class, actual: $fields[13]);
        self::assertEquals(expected: 'hiringAt', actual: $fields[13]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Date d\'embauche', actual: $fields[13]->getAsDto()->getLabel());

        // Test lastLoginAt field
        self::assertInstanceOf(expected: DateTimeField::class, actual: $fields[14]);
        self::assertEquals(expected: 'lastLoginAt', actual: $fields[14]->getAsDto()->getProperty());
        self::assertEquals(expected: 'Dernière connexion', actual: $fields[14]->getAsDto()->getLabel());
    }

    #[Test] public function ConfigureFieldsOnEditPage(): void
    {
        $fields = iterator_to_array($this->controller->configureFields('edit'));

        // On edit page, password field should be configured correctly
        $passwordFields = array_filter($fields, function ($field) {
            return $field->getAsDto()->getProperty() === 'password';
        });

        $passwordField = reset($passwordFields);
        self::assertNotNull($passwordField, 'Password field should be present on edit page');
        self::assertEquals(PasswordType::class, $passwordField->getAsDto()->getFormType());
    }

    #[Test] public function ConfigureFieldsOnNewPage(): void
    {
        $fields = iterator_to_array($this->controller->configureFields('new'));

        // Password field should be present on new page
        $passwordFields = array_filter($fields, function ($field) {
            return $field->getAsDto()->getProperty() === 'password';
        });
        self::assertNotEmpty($passwordFields, 'Password field should be present on new page');
    }

    #[Test] public function ConfigureCrud(): void
    {
        $crud = $this->controller->configureCrud(crud: Crud::new());

        // Test that the crud configuration is returned
        self::assertInstanceOf(expected: Crud::class, actual: $crud);
    }

    #[Test] public function ConfigureActions(): void
    {
        $actions = Actions::new()
            ->add(Crud::PAGE_INDEX, Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::EDIT);

        $configuredActions = $this->controller->configureActions($actions);

        // Test that actions are configured correctly
        $actionsDto = $configuredActions->getAsDto(Crud::PAGE_INDEX);
        $actionsList = $actionsDto->getActions();

        // Verify that custom actions are present
        self::assertArrayHasKey(UserCrudController::DELETE_USER_ONLY, $actionsList);
        self::assertArrayHasKey(UserCrudController::DELETE_ALL, $actionsList);
        self::assertArrayHasKey(UserCrudController::DELETE_LOGBOOKS_ONLY, $actionsList);
    }

    #[Test] public function ConfigureActionsWithCustomActions(): void
    {
        $actions = Actions::new()
            ->add(Crud::PAGE_INDEX, Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::EDIT);

        $configuredActions = $this->controller->configureActions($actions);
        $actionsDto = $configuredActions->getAsDto(Crud::PAGE_INDEX);
        $actionsList = $actionsDto->getActions();

        // Test that custom actions are properly configured
        $deleteUserOnlyAction = $actionsList[UserCrudController::DELETE_USER_ONLY];
        self::assertEquals('Supprimer l\'utilisateur', $deleteUserOnlyAction->getLabel());
        self::assertEquals('fa fa-user-times', $deleteUserOnlyAction->getIcon());

        $deleteAllAction = $actionsList[UserCrudController::DELETE_ALL];
        self::assertEquals('Tout supprimer', $deleteAllAction->getLabel());
        self::assertEquals('fa fa-trash-alt', $deleteAllAction->getIcon());

        $deleteLogbooksOnlyAction = $actionsList[UserCrudController::DELETE_LOGBOOKS_ONLY];
        self::assertEquals('Supprimer les carnets', $deleteLogbooksOnlyAction->getLabel());
        self::assertEquals('fa fa-book', $deleteLogbooksOnlyAction->getIcon());
    }

    #[Test] public function CustomActionsDisplayConditions(): void
    {
        $actions = Actions::new()
            ->add(Crud::PAGE_INDEX, Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::EDIT);

        $configuredActions = $this->controller->configureActions($actions);
        $actionsDto = $configuredActions->getAsDto(Crud::PAGE_INDEX);
        $actionsList = $actionsDto->getActions();

        // Create a user with no logbooks
        $user = new User();
        $user->setFirstname('John');
        $user->setLastname('Doe');

        $entityDto = new EntityDto(
            User::class,
            $this->entityManager->getClassMetadata(User::class),
            $user->getId(),
            $user
        );

        $deleteUserOnlyAction = $actionsList[UserCrudController::DELETE_USER_ONLY];
        $deleteAllAction = $actionsList[UserCrudController::DELETE_ALL];
        $deleteLogbooksOnlyAction = $actionsList[UserCrudController::DELETE_LOGBOOKS_ONLY];

        // Test display conditions for user without logbooks
        self::assertTrue($deleteUserOnlyAction->isDisplayed($entityDto));
        self::assertFalse($deleteAllAction->isDisplayed($entityDto));
        self::assertFalse($deleteLogbooksOnlyAction->isDisplayed($entityDto));

        // Add a logbook and test again
        $logbook = new Logbook();
        $user->addLogbook($logbook);
        $entityDto = new EntityDto(
            User::class,
            $this->entityManager->getClassMetadata(User::class),
            $user->getId(),
            $user
        );

        self::assertTrue($deleteUserOnlyAction->isDisplayed($entityDto));
        self::assertTrue($deleteAllAction->isDisplayed($entityDto));
        self::assertTrue($deleteLogbooksOnlyAction->isDisplayed($entityDto));
    }

    #[Test] public function IsGrantedAttribute(): void
    {
        $reflectionClass = new \ReflectionClass(UserCrudController::class);
        $attributes = $reflectionClass->getAttributes();

        $hasIsGrantedAttribute = false;
        foreach ($attributes as $attribute) {
            if ($attribute->getName() === 'Symfony\Component\Security\Http\Attribute\IsGranted') {
                $hasIsGrantedAttribute = true;
                $arguments = $attribute->getArguments();
                self::assertEquals('ROLE_ADMIN', $arguments[0], 'Controller should require ROLE_ADMIN');
            }
        }

        self::assertTrue($hasIsGrantedAttribute, 'Controller should have IsGranted attribute');
    }

    #[Test] public function PersistEntity(): void
    {
        $user = new User();
        $user->setPassword(password: 'password123');

        // Set up password hasher expectations
        $this->passwordHasher
            ->expects($this->once())
            ->method(constraint: 'hashPassword')
            ->with($user, 'password123')
            ->willReturn(value: 'hashed_password');

        $this->controller->persistEntity(entityManager: $this->entityManager, entityInstance: $user);

        self::assertEquals(expected: 'hashed_password', actual: $user->getPassword());
    }

    #[Test] public function PersistEntityWithoutPassword(): void
    {
        $user = new User();
        $user->setPassword(password: ''); // Initialize with empty string

        // Password hasher should not be called
        $this->passwordHasher
            ->expects($this->never())
            ->method(constraint: 'hashPassword');

        $this->controller->persistEntity(entityManager: $this->entityManager, entityInstance: $user);
    }

    #[Test] public function RemoveLogbookFromUser(): void
    {
        // Create a user with logbooks
        $user = new User();
        $user->setFirstname('John');
        $user->setLastname('Doe');

        $logbook1 = new Logbook();
        $logbook2 = new Logbook();
        $user->addLogbook($logbook1);
        $user->addLogbook($logbook2);

        // Test initial state
        self::assertCount(2, $user->getLogbooks());

        // Remove logbooks
        $user->removeLogbook($logbook1);
        $user->removeLogbook($logbook2);

        // Test final state
        self::assertCount(0, $user->getLogbooks());
        self::assertNull($logbook1->getOwner());
        self::assertNull($logbook2->getOwner());
    }
}
