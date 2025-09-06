<?php

namespace App\Controller\Admin\User;

use App\Entity\Job;
use App\Entity\Speciality;
use App\Entity\User;
use App\Enum\SpecialityEnum;
use App\Services\Admin\Users\UserDeletionService;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
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

/** @extends AbstractCrudController<User> */
#[IsGranted('ROLE_ADMIN')]
class UserCrudController extends AbstractCrudController
{
    public const DELETE_USER_ONLY = 'deleteUserOnly';
    public const DELETE_ALL = 'deleteAll';
    public const DELETE_LOGBOOKS_ONLY = 'deleteLogbooksOnly';

    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly UserDeletionService $userDeletionService,
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new(propertyName: 'id')
            ->hideOnForm()
            ->hideOnIndex();

        yield TextField::new(propertyName: 'fullname', label: 'Prénom')
            ->addCssClass(cssClass: 'text-capitalize')
            ->onlyOnIndex();

        yield TextField::new(propertyName: 'firstname', label: 'Prénom')
            ->onlyOnForms()
            ->setColumns(cols: 'col-md-4 col-sm-12')
            ->addCssClass(cssClass: 'text-capitalize');

        yield TextField::new(propertyName: 'lastname', label: 'Nom')
            ->onlyOnForms()
            ->setColumns(cols: 'col-md-4 col-sm-12')
            ->addCssClass(cssClass: 'text-capitalize');

        yield TextField::new(propertyName: 'nni', label: 'NNI')
            ->setColumns(cols: 'col-md-4 col-sm-12');

        yield TextField::new(propertyName: 'email', label: 'Email')
            ->hideOnIndex()
            ->setColumns(cols: 'col-md-6 col-sm-12');

        yield AssociationField::new(propertyName: 'mentor', label: 'Tuteur')
            ->setRequired(isRequired: false)
            ->setColumns(cols: 'col-md-6 col-sm-12');

        yield TextField::new(propertyName: 'password', label: 'Mot de passe')
            ->setFormType(formTypeFqcn: PasswordType::class)
            ->onlyWhenCreating()
            ->setColumns(cols: 'col-md-6 col-sm-12');

        // Affichage du rôle le plus important dans la liste
        yield ArrayField::new(propertyName: 'roles', label: 'Rôle principal')
            ->setTemplatePath(path: 'admin/field/user_role_badge.html.twig')
            ->onlyOnIndex();

        // Champ pour l'édition des rôles dans le formulaire
        yield ChoiceField::new(propertyName: 'roles', label: 'Rôles')
            ->setChoices(
                choiceGenerator: [
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                    'Chef de service' => 'ROLE_SERVICE_HEAD',
                    'Chef de service délégué' => 'ROLE_SERVICE_HEAD_DELEGATE',
                    'Manager' => 'ROLE_MANAGER',
                    'Manager délégué' => 'ROLE_MANAGER_DELEGATE',
                    'Tuteur' => 'ROLE_MENTOR',
                    'Nouvel arrivant' => 'ROLE_NEWCOMER',
                ]
            )
            ->allowMultipleChoices()
            ->renderExpanded(expanded: false)
            ->renderAsBadges(
                [
                    'ROLE_ADMIN' => 'danger',
                    'ROLE_SERVICE_HEAD' => 'primary',
                    'ROLE_SERVICE_HEAD_DELEGATE' => 'primary',
                    'ROLE_MANAGER' => 'info',
                    'ROLE_MANAGER_DELEGATE' => 'info',
                    'ROLE_MENTOR' => 'success',
                    'ROLE_NEWCOMER' => 'warning',
                ]
            )
            ->setColumns(cols: 'col-md-9 col-sm-12')
            ->setRequired(isRequired: false)
            ->onlyOnForms();

        // Utilisation d'un TextField pour l'affichage sans lien
        yield TextField::new(propertyName: 'service', label: 'Service')
            ->formatValue(
                callable: function ($value, $entity): ?string {
                    if (!$entity instanceof User) {
                        return null;
                    }
                    $service = $entity->getService();
                    return $service ? $service->getName() : null;
                }
            )
            ->onlyOnIndex();

        // Utilisation d'un AssociationField pour le formulaire
        yield AssociationField::new(propertyName: 'service', label: 'Service')
            ->setColumns(cols: 'col-md-3 col-sm-12')
            ->setQueryBuilder(
                function ($queryBuilder) {
                    // Ensure we're working with a QueryBuilder object
                    if (is_object($queryBuilder) && method_exists($queryBuilder, 'orderBy')) {
                        return $queryBuilder->orderBy('entity.name', 'ASC');
                    }
                    return $queryBuilder;
                }
            )
            ->onlyOnForms();

        yield TextField::new(propertyName: 'jobLabel', label: 'Métier')->hideOnForm();
        yield AssociationField::new(propertyName: 'job', label: 'Métier')
            ->setFormTypeOption('choice_label', 'name')
            ->setQueryBuilder(
                function ($queryBuilder) {
                    if (is_object($queryBuilder) && method_exists($queryBuilder, 'orderBy')) {
                        return $queryBuilder->orderBy('entity.name', 'ASC');
                    }
                    return $queryBuilder;
                }
            )
            ->setColumns(cols: 'col-md-6 col-sm-12')
            ->onlyOnForms();

        yield TextField::new(propertyName: 'specialityLabel', label: 'Spécialité')->hideOnForm();
        yield AssociationField::new(propertyName: 'speciality', label: 'Spécialité')
            ->setFormTypeOption('choice_label', 'name')
            ->setQueryBuilder(
                function ($queryBuilder) {
                    if (is_object($queryBuilder) && method_exists($queryBuilder, 'orderBy')) {
                        return $queryBuilder->orderBy('entity.name', 'ASC');
                    }
                    return $queryBuilder;
                }
            )
            ->onlyOnForms()
            ->setColumns(cols: 'col-md-6 col-sm-12');

        yield AssociationField::new(propertyName: 'logbooks', label: 'Carnets')
            ->onlyOnIndex()
            ->setColumns(cols: 'col-md-6 col-sm-12')
            ->setFormTypeOptions(
                [
                    'by_reference' => false,
                ]
            )
            ->formatValue(
                function ($value, $entity): string {
                    if (!$entity instanceof User) {
                        return '<span style="display: inline-block" class="badge bg-danger-subtle">Non</span>';
                    }

                    $logbooks = $entity->getLogbooks();
                    $hasLogbooks = $logbooks->count() > 0;

                    return '<span style="display: inline-block" class="badge bg-' .
                        ($hasLogbooks ? 'success-subtle' : 'danger-subtle') . '">' .
                        ($hasLogbooks ? 'Oui' : 'Non') .
                        '</span>';
                }
            )
            ->setTemplatePath(path: 'admin/field/badge.html.twig');

        yield DateTimeField::new(propertyName: 'hiringAt', label: 'Date d\'embauche')
            ->hideOnIndex()
            ->setColumns(cols: 'col-md-6 col-sm-12')
            ->setFormType(formTypeFqcn: DateType::class);

        yield DateTimeField::new(propertyName: 'lastLoginAt', label: 'Dernière connexion')->hideOnIndex()->hideOnForm();
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
                title: fn(User $user) => '👁️ Détails - ' . $user->getFullName()
            )
            ->setPageTitle(
                pageName: 'edit',
                title: fn(User $user) => '🧑‍💻 Modifier - ' . $user->getFullName()
            )
            ->setPageTitle(
                pageName: 'new',
                title: '⭐️ Créer un nouvel utilisateur'
            )
            ->setDateTimeFormat(
                dateFormatOrPattern: DateTimeField::FORMAT_LONG,
                timeFormat: DateTimeField::FORMAT_SHORT
            )

            ->addFormTheme(themePath: 'admin/crud/delete_confirmation_modal.html.twig');
    }

    public function configureActions(Actions $actions): Actions
    {
        // $actions = parent::configureActions($actions);

        // Désactiver complètement les actions par défaut
        $actions = $actions
            ->disable(Action::DELETE);

        // Mettre à jour l'action de modification existante
        $actions = $actions->update(
            pageName: Crud::PAGE_INDEX,
            actionName: Action::EDIT,
            callable: function (Action $action) {
                return $action
                    ->setIcon(icon: 'fa fa-edit text-primary')
                    ->setLabel(label: 'Modifier')
                    ->addCssClass(cssClass: 'btn btn-sm btn-outline-primary');
            }
        );

        // Add custom actions
        $deleteUserOnly = Action::new(name: self::DELETE_USER_ONLY, label: 'Supprimer l\'utilisateur')
            ->setIcon(icon: 'fa fa-user-times text-danger')
            ->linkToCrudAction(crudActionName: 'deleteUserOnly')
            ->setCssClass(cssClass: 'text-danger')
            ->displayIf(
                static function ($user) {
                    return true;
                }
            );

        $deleteAll = Action::new(name: self::DELETE_ALL, label: 'Tout supprimer')
            ->setIcon(icon: 'fa fa-trash-alt')
            ->linkToCrudAction(crudActionName: 'deleteAll')
            ->displayIf(
                static function ($user) {
                    return $user instanceof User && $user->hasLogbooks();
                }
            );

        $deleteLogbooksOnly = Action::new(name: self::DELETE_LOGBOOKS_ONLY, label: 'Supprimer le carnet')
            ->setIcon(icon: 'fa fa-book')
            ->linkToCrudAction(crudActionName: 'deleteLogbooksOnly')
            ->displayIf(
                static function ($user) {
                    return $user instanceof User && $user->hasLogbooks();
                }
            );

        return $actions
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: $deleteUserOnly)
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: $deleteAll)
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: $deleteLogbooksOnly);
    }

    public function deleteUserOnly(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $entityManager
    ): Response {
        try {
            // Récupérer l'ID de l'utilisateur à partir de la requête
            $request = $context->getRequest();
            $userId = $request->query->get(key: 'entityId');

            if (!$userId) {
                throw new \RuntimeException(message: 'ID utilisateur manquant');
            }

            // Récupérer l'utilisateur directement depuis la base de données
            $user = $entityManager->getRepository(className: User::class)->find(id: $userId);

            if (!$user instanceof User) {
                throw new \RuntimeException(message: 'Utilisateur introuvable');
            }

            $this->userDeletionService->deleteUserOnly($user);
            $this->addFlash(type: 'success', message: sprintf('L\'utilisateur %s a été supprimé.', $user->getFullName()));
        } catch (\Throwable $e) {
            $this->addFlash(type: 'danger', message: 'Une erreur est survenue lors de la suppression: ' . $e->getMessage());
        }

        return $this->redirect(url: $adminUrlGenerator->setAction(action: Action::INDEX)->generateUrl());
    }

    public function deleteAll(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $entityManager
    ): Response {
        try {
            // Récupérer l'ID de l'utilisateur à partir de la requête
            $request = $context->getRequest();
            $userId = $request->query->get(key: 'entityId');

            if (!$userId) {
                throw new \RuntimeException(message: 'ID utilisateur manquant');
            }

            // Récupérer l'utilisateur directement depuis la base de données
            $user = $entityManager->getRepository(className: User::class)->find(id: $userId);

            if (!$user instanceof User) {
                throw new \RuntimeException(message: 'Utilisateur introuvable');
            }

            $this->userDeletionService->deleteUserAndLogbooks($user);
            $this->addFlash(type: 'success', message: sprintf('L\'utilisateur %s et ses carnets ont été supprimés.', $user->getFullName()));
        } catch (\Throwable $e) {
            $this->addFlash(type: 'danger', message: 'Une erreur est survenue lors de la suppression: ' . $e->getMessage());
        }

        return $this->redirect($adminUrlGenerator->setAction(action: Action::INDEX)->generateUrl());
    }

    public function deleteLogbooksOnly(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $entityManager
    ): Response {
        try {
            // Récupérer l'ID de l'utilisateur à partir de la requête
            $request = $context->getRequest();
            $userId = $request->query->get(key: 'entityId');

            if (!$userId) {
                throw new \RuntimeException(message: 'ID utilisateur manquant');
            }

            // Récupérer l'utilisateur directement depuis la base de données
            $user = $entityManager->getRepository(className: User::class)->find(id: $userId);

            if (!$user instanceof User) {
                throw new \RuntimeException(message: 'Utilisateur introuvable');
            }

            $this->userDeletionService->deleteLogbooksOnly($user);
            $this->addFlash(type: 'success', message: sprintf('Les carnets de %s ont été supprimés.', $user->getFullName()));
        } catch (\Throwable $e) {
            $this->addFlash(type: 'danger', message: 'Une erreur est survenue lors de la suppression: ' . $e->getMessage());
        }

        return $this->redirect($adminUrlGenerator->setAction(action: Action::INDEX)->generateUrl());
    }

    /** @param User $entityInstance */
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance->getPassword()) {
            $hashedPassword = $this->passwordHasher->hashPassword(
                $entityInstance,
                $entityInstance->getPassword()
            );
            $entityInstance->setPassword($hashedPassword);
        }

        // S'assurer que roles n'est jamais null avant la persistance
        $roles = $entityInstance->getRoles();
        // Si les rôles sont vides ou contiennent uniquement ROLE_USER (qui est ajouté par getRoles)
        if (count($roles) <= 1 && in_array(needle: 'ROLE_USER', haystack: $roles)) {
            $entityInstance->setRoles(roles: ['ROLE_USER']);
        }

        parent::persistEntity($entityManager, $entityInstance);
    }
}
