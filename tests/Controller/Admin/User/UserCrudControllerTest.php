<?php

namespace App\Tests\Controller\Admin\User;

use App\Controller\Admin\User\UserCrudController;
use App\Entity\Logbook;
use App\Entity\User;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudControllerTest extends KernelTestCase
{
    private UserCrudController $controller;
    private UserPasswordHasherInterface $passwordHasher;
    private EntityManagerInterface $entityManager;
    private FlashBagInterface $flashBag;
    private RequestStack $requestStack;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        self::bootKernel();

        $this->passwordHasher = $this->createMock(originalClassName: UserPasswordHasherInterface::class);
        $this->controller = new UserCrudController(passwordHasher: $this->passwordHasher);

        $this->entityManager = $this->createMock(originalClassName: EntityManagerInterface::class);

        // Set up flash messages
        $this->flashBag = $this->createMock(originalClassName: FlashBagInterface::class);
        $session = $this->createMock(originalClassName: Session::class);
        $session->method('getFlashBag')->willReturn(value: $this->flashBag);

        $this->requestStack = $this->createMock(originalClassName: RequestStack::class);
        $this->requestStack->method('getSession')->willReturn(value: $session);

        $container = self::getContainer();
        $container->set(id: 'request_stack', service: $this->requestStack);
    }

    public function testGetEntityFqcn(): void
    {
        self::assertEquals(expected: User::class, actual: UserCrudController::getEntityFqcn());
    }

    public function testConfigureFields(): void
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

    public function testConfigureCrud(): void
    {
        $crud = $this->controller->configureCrud(crud: Crud::new());

        // Test that the crud configuration is returned
        self::assertInstanceOf(expected: Crud::class, actual: $crud);
    }

    public function testConfigureActions(): void
    {
        $actions = $this->controller->configureActions(actions: Actions::new());

        // Test that actions configuration is returned
        self::assertInstanceOf(expected: Actions::class, actual: $actions);
    }

    public function testPersistEntity(): void
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

    public function testPersistEntityWithoutPassword(): void
    {
        $user = new User();
        $user->setPassword(password: ''); // Initialize with empty string

        // Password hasher should not be called
        $this->passwordHasher
            ->expects($this->never())
            ->method(constraint: 'hashPassword');

        $this->controller->persistEntity(entityManager: $this->entityManager, entityInstance: $user);
    }
}
