<?php

namespace App\Controller\Admin\User;

use App\Entity\User;
use App\Enum\JobEnum;
use App\Enum\SpecialityEnum;
use App\Repository\UserRepository;
use App\Services\Admin\UserDeletionService;
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
    public const DELETE_USER_ONLY = 'deleteUserOnly';
    public const DELETE_ALL = 'deleteAll';
    public const DELETE_LOGBOOKS_ONLY = 'deleteLogbooksOnly';

    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly UserDeletionService $userDeletionService,
        private readonly UserRepository $userRepository,
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
            ->allowMultipleChoices()
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
            ->formatValue(fn ($value, $entity) => '<span style="display: inline-block" class="badge bg-'.
                ($entity->getLogbooks()->count() > 0 ? 'success-subtle' : 'danger-subtle').'">'.
                ($entity->getLogbooks()->count() > 0 ? 'Oui' : 'Non').
                '</span>'
            )
            ->setTemplatePath(path: 'admin/field/badge.html.twig')
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
        // $actions = parent::configureActions($actions);

        // Désactiver complètement les actions par défaut
        $actions = $actions
            ->disable(Action::DELETE);

        // Mettre à jour l'action de modification existante
        $actions = $actions->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
            return $action
                ->setIcon('fa fa-edit text-primary')
                ->setLabel('Modifier')
                ->addCssClass('btn btn-sm btn-outline-primary')
            ;
        });

        // Add custom actions
        $deleteUserOnly = Action::new(self::DELETE_USER_ONLY, 'Supprimer l\'utilisateur')
            ->setIcon('fa fa-user-times text-danger')
            ->linkToCrudAction('deleteUserOnly')
            ->setCssClass('text-danger')
            ->displayIf(static function ($user) {
                return true;
            });

        $deleteAll = Action::new(self::DELETE_ALL, 'Tout supprimer')
            ->setIcon('fa fa-trash-alt')
            ->linkToCrudAction('deleteAll')
            ->displayIf(static function ($user) {
                return $user instanceof User && $user->hasLogbooks();
            });

        $deleteLogbooksOnly = Action::new(self::DELETE_LOGBOOKS_ONLY, 'Supprimer les carnets')
            ->setIcon('fa fa-book')
            ->linkToCrudAction('deleteLogbooksOnly')
            ->displayIf(static function ($user) {
                return $user instanceof User && $user->hasLogbooks();
            });

        return $actions
            ->add(Crud::PAGE_INDEX, $deleteUserOnly)
            ->add(Crud::PAGE_INDEX, $deleteAll)
            ->add(Crud::PAGE_INDEX, $deleteLogbooksOnly);
    }

    public function deleteUserOnly(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator
    ): Response {
        /** @var User $user */
        $user = $context->getEntity()->getInstance();

        try {
            $this->userDeletionService->deleteUserOnly($user);
            $this->addFlash(type: 'success', message: sprintf('L\'utilisateur %s a été supprimé.', $user->getFullName()));
        } catch (\Exception $e) {
            $this->addFlash(type: 'danger', message: 'Une erreur est survenue lors de la suppression.');
        }

        return $this->redirect(url: $adminUrlGenerator->setAction(action: Action::INDEX)->generateUrl());
    }

    public function deleteAll(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator
    ): Response {
        /** @var User $user */
        $user = $context->getEntity()->getInstance();

        try {
            $this->userDeletionService->deleteUserAndLogbooks($user);
            $this->addFlash('success', sprintf('L\'utilisateur %s et ses carnets ont été supprimés.', $user->getFullName()));
        } catch (\Exception $e) {
            $this->addFlash('danger', 'Une erreur est survenue lors de la suppression.');
        }

        return $this->redirect($adminUrlGenerator->setAction(Action::INDEX)->generateUrl());
    }

    public function deleteLogbooksOnly(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator
    ): Response {
        /** @var User $user */
        $user = $context->getEntity()->getInstance();

        try {
            $this->userDeletionService->deleteLogbooksOnly($user);
            $this->addFlash('success', sprintf('Les carnets de %s ont été supprimés.', $user->getFullName()));
        } catch (\Exception $e) {
            $this->addFlash('danger', 'Une erreur est survenue lors de la suppression.');
        }

        return $this->redirect($adminUrlGenerator->setAction(Action::INDEX)->generateUrl());
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
