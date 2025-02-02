<?php

namespace App\Controller\Admin\User;

use App\Entity\Logbook;
use App\Entity\User;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class UserCrudController extends AbstractCrudController
{
    public const REMOVE_LOGBOOK_ACTION = 'removeLogbook';

    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new(propertyName: 'id')
            ->hideOnForm()
            ->hideOnIndex()
        ;

        yield TextField::new(propertyName: 'firstname', label: 'Prénom')
            ->setColumns(cols: 'col-md-3 col-sm-12')
            ->addCssClass(cssClass: 'text-capitalize')
        ;

        yield TextField::new(propertyName: 'lastname', label: 'Nom')
            ->setColumns(cols: 'col-md-3 col-sm-12')
            ->addCssClass(cssClass: 'text-uppercase')
        ;

        yield TextField::new(propertyName: 'nni', label: 'NNI')
            ->setColumns(cols: 'col-md-3 col-sm-12')
        ;

        yield TextField::new(propertyName: 'email', label: 'Email')->hideOnIndex()
            ->setColumns(cols: 'col-md-3 col-sm-12')
        ;

        yield TextField::new(propertyName: 'password', label: 'Mot de passe')
            ->setFormType(formTypeFqcn: PasswordType::class)
            ->onlyWhenCreating()
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield ChoiceField::new(propertyName: 'roles', label: 'Rôles')
            ->setChoices(choiceGenerator: [
                'Utilisateur' => 'ROLE_USER',
                'Administrateur' => 'ROLE_ADMIN',
                'Tuteur' => 'ROLE_MENTOR',
                'Nouvel arrivant' => 'ROLE_NEWCOMER',
            ])
            ->allowMultipleChoices(allow: true) // Permet la sélection multiple
            ->renderExpanded(expanded: false) // Affiche les choix comme une liste déroulante
            ->renderAsBadges([
                'ROLE_ADMIN' => 'danger',
                'ROLE_MENTOR' => 'success',
                'ROLE_NEWCOMER' => 'warning',
            ])
            ->setColumns(cols: 'col-md-3 col-sm-12')
        ;

        yield TextField::new(propertyName: 'jobLabel', label: 'Métier')->hideOnForm();
        yield ChoiceField::new(propertyName: 'job', label: 'Métier')
            ->setChoices(choiceGenerator: [
                'Technicien' => JobEnum::TECHNICIEN,
                'Ingénieur' => JobEnum::INGENIEUR,
                "Chargé d'affaires" => JobEnum::CHARGE_AFFAIRES,
                "Chargé d'affaires projet" => JobEnum::CHARGE_AFFAIRES_PROJET,
                'Chargé de surveillance' => JobEnum::CHARGE_SURVEILLANCE,
            ])
            ->onlyWhenCreating()
            ->setColumns(cols: 'col-md-6 col-sm-12')
            ->onlyOnForms()
        ;

        yield TextField::new(propertyName: 'specialityLabel', label: 'Spécialité')->hideOnForm();
        yield ChoiceField::new(propertyName: 'speciality', label: 'Spécialité')
            ->setChoices(choiceGenerator: [
                'Chaudronnerie' => SpecialityEnum::CHA,
                'Levage' => SpecialityEnum::LEV,
                'Mécanique' => SpecialityEnum::MEC,
                'Robinetterie' => SpecialityEnum::ROB,
                'Soudage' => SpecialityEnum::SOU,
            ])
            ->onlyOnForms()
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield AssociationField::new(propertyName: 'mentor', label: 'Tuteur')
            ->setRequired(isRequired: false)
            ->setColumns(cols: 'col-md-6 col-sm-12')
        ;

        yield AssociationField::new(propertyName: 'logbooks', label: 'Carnets')
            ->setColumns(cols: 'col-md-6 col-sm-12')
            ->setFormTypeOptions([
                'by_reference' => false,
            ])
            // Afficher le nom du carnet dans la liste
            ->formatValue(fn ($value, $entity) => $entity->getLogbooks()->count().' carnet'.($entity->getLogbooks()->count() > 1 ? 's' : ''))
        ;

        yield DateTimeField::new(propertyName: 'hiringAt', label: 'Date d\'embauche')
            ->hideOnIndex()
            ->setColumns(cols: 'col-md-6 col-sm-12')
            ->setFormType(formTypeFqcn: DateType::class)
        ;

        yield DateTimeField::new(propertyName: 'lastLoginAt', label: 'Dernière connexion')->hideOnIndex()->hideOnForm();
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular(label: 'Utilisateur')

            ->setEntityLabelInPlural(label: 'Utilisateurs')

            ->setPageTitle(pageName: 'index', title: '⚡️ Liste des agents')

            ->setPaginatorPageSize(maxResultsPerPage: 20)

            ->setPageTitle(
                pageName: 'detail',
                title: fn (User $user) => '👁️ Détails - '.$user->getFullName()
            )

            ->setPageTitle(
                pageName: 'edit',
                title: fn (User $user) => '🧑‍💻 Modifier - '.$user->getFullName()
            )

            ->setPageTitle(
                pageName: 'new',
                title: '⭐️ Créer un nouvel utilisateur'
            )

            ->setDateTimeFormat(
                dateFormatOrPattern: DateTimeField::FORMAT_LONG,
                timeFormat: DateTimeField::FORMAT_SHORT
            );
    }

    public function configureActions(Actions $actions): Actions
    {
        $removeLogbookAction = Action::new(name: self::REMOVE_LOGBOOK_ACTION)
            ->linkToCrudAction(crudActionName: 'removeLogbook')
            ->setCssClass(cssClass: 'btn btn-sm btn-danger')
            ->setIcon(icon: 'fa fa-trash')
            ->setLabel(label: 'Supprimer les carnets');

        return $actions
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: 'detail')
            ->add(pageName: Crud::PAGE_EDIT, actionNameOrObject: $removeLogbookAction)
        ;
    }

    public function removeLogbook(
        AdminContext $context,
        EntityManagerInterface $entityManager,
        AdminUrlGenerator $adminUrlGenerator
    ): Response {
        $user = $context->getEntity()->getInstance();

        /* @var $logbooks Logbook */
        $logbooks = $user->getLogbooks();

        $deletedLogbooks = 0;
        foreach ($logbooks as $logbook) {
            $user->removeLogbook($logbook);
            ++$deletedLogbooks;
        }

        parent::persistEntity($entityManager, $user);

        $this->addFlash(
            type: 'danger',
            message: sprintf(
                'Le%s carnet%s de %s %s supprimé%s.',
                $deletedLogbooks > 1 ? 's' : '',
                $deletedLogbooks > 1 ? 's' : '',
                $user->getFullName(),
                $deletedLogbooks > 1 ? 'ont étaient' : 'a été',
                $deletedLogbooks > 1 ? 's' : ''
            )
        );

        $url = $adminUrlGenerator->setController(crudControllerFqcn: self::class)
            ->setAction(Action::INDEX)
            ->generateUrl()
        ;

        return $this->redirect(url: $url);
    }

    /**
     * @param User $entityInstance
     */
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof User && $entityInstance->getPassword()) {
            $hashedPassword = $this->passwordHasher->hashPassword(
                $entityInstance,
                $entityInstance->getPassword()
            );
            $entityInstance->setPassword($hashedPassword);
        }

        parent::persistEntity($entityManager, $entityInstance);
    }
}
