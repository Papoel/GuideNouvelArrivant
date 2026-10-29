<?php

namespace App\Controller\Admin\User;

use App\Entity\User;
use App\Entity\Logbook;
use App\Enum\UserRole;
use App\Repository\UserRepository;
use App\Security\Voter\UserVoter;
use App\Services\Admin\interfaces\UserProgressServiceInterface;
use App\Services\Admin\Users\UserDeletionService;
use App\Services\Logbook\LogbookProgressService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminRoute;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGeneratorInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
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
        private readonly UserRepository $userRepository,
        private readonly LogbookProgressService $logbookProgressService,
        private readonly UserProgressServiceInterface $userProgressService,
        private readonly AdminUrlGeneratorInterface $adminUrlGenerator,
        private readonly CsrfTokenManagerInterface $csrfTokenManager,
        private readonly AuthorizationCheckerInterface $authorizationChecker,
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

        yield TextField::new(propertyName: 'fullname', label: 'Nom complet')
            ->setTemplatePath(path: 'admin/field/user_fullname.html.twig')
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
        // Un ADMIN ne peut attribuer que les rôles non privilégiés
        yield ChoiceField::new(propertyName: 'roles', label: 'Rôles')
            ->setChoices(choiceGenerator: $this->authorizationChecker->isGranted('ROLE_SUPER_ADMIN') ? UserRole::getChoices() : UserRole::getLimitedChoices())
            ->allowMultipleChoices()
            ->renderExpanded(expanded: false)
            ->renderAsBadges(UserRole::getBadgeMapping())
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
        // Réservé au SUPER_ADMIN : un ADMIN gère uniquement son propre service
        yield AssociationField::new(propertyName: 'service', label: 'Service')
            ->setPermission('ROLE_SUPER_ADMIN')
            ->setColumns(cols: 'col-md-3 col-sm-12')
            ->setQueryBuilder(
                function ($queryBuilder) {
                    // Ensure we're working with a QueryBuilder object
                    if (is_object($queryBuilder) && method_exists($queryBuilder, 'orderBy')) {
                        return $queryBuilder->orderBy('entity.name', \SortDirection::Ascending);
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
                        return $queryBuilder->orderBy('entity.name', \SortDirection::Ascending);
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
                        return $queryBuilder->orderBy('entity.name', \SortDirection::Ascending);
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

        yield DateTimeField::new(propertyName: 'hiringAt', label: 'Prise de poste')
            ->hideOnIndex()
            ->setColumns(cols: 'col-md-6 col-sm-12')
            ->setFormType(formTypeFqcn: DateType::class);

        yield DateTimeField::new(propertyName: 'lastLoginAt', label: 'Dernière connexion')->hideOnIndex()->hideOnForm();
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('service', 'Service'))
            ->add(EntityFilter::new('mentor', 'Tuteur'))
            ->add(EntityFilter::new('job', 'Métier'))
            ->add(EntityFilter::new('speciality', 'Spécialité'));
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular(label: 'Utilisateur')
            ->setEntityLabelInPlural(label: 'Utilisateurs')
            ->setDefaultRowAction(Action::DETAIL)
            ->setPageTitle(pageName: 'index', title: '⚡️ Liste des agents')
            ->setDefaultSort(['lastname' => 'ASC', 'firstname' => 'ASC'])
            ->setSearchFields(['lastname', 'firstname', 'nni', 'email'])
            ->setPaginatorPageSize(maxResultsPerPage: 50)
            ->setEntityPermission('ROLE_ADMIN')
            ->overrideTemplate('crud/index', 'admin/user/index.html.twig')
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
            // Ajouter le template personnalisé pour la page détail
            ->overrideTemplate('crud/detail', 'admin/user/detail.html.twig')
            ->addFormTheme(themePath: 'admin/crud/delete_confirmation_modal.html.twig');
    }

    public function configureActions(Actions $actions): Actions
    {
        // Désactiver l'action DELETE par défaut
        $actions = $actions->disable(Action::DELETE);

        // Ajouter l'action DETAIL (Voir) en premier
        $actions = $actions->add(Crud::PAGE_INDEX, Action::DETAIL);

        // Configurer l'action DETAIL
        $actions = $actions->update(
            pageName: Crud::PAGE_INDEX,
            actionName: Action::DETAIL,
            callable: function (Action $action) {
                return $action
                    ->setIcon(icon: 'fa fa-eye')
                    ->setLabel(label: 'Voir');
            }
        );

        // Configurer l'action EDIT pour qu'elle soit cohérente avec les autres
        $actions = $actions->update(
            pageName: Crud::PAGE_INDEX,
            actionName: Action::EDIT,
            callable: function (Action $action) {
                return $action
                    ->setIcon(icon: 'fa fa-edit')
                    ->setLabel(label: 'Modifier');
            }
        );

        // La suppression par lot est réservée au SUPER_ADMIN
        $actions = $actions->setPermission(Action::BATCH_DELETE, 'ROLE_SUPER_ADMIN');

        // Actions personnalisées de suppression (POST + CSRF) : visibles si
        // l'utilisateur courant peut supprimer la cible (UserVoter : ADMIN →
        // son service, SUPER_ADMIN → transverse)
        $deleteUserOnly = Action::new(name: self::DELETE_USER_ONLY, label: 'Supprimer l\'utilisateur')
            ->setIcon(icon: 'fa fa-user-times')
            ->linkToUrl(fn (User $user): string => $this->generateDeleteUrl(action: self::DELETE_USER_ONLY, user: $user))
            ->setHtmlAttributes(['data-action' => 'deleteUserOnly'])
            ->displayIf(fn ($user): bool => $user instanceof User && $this->authorizationChecker->isGranted(UserVoter::DELETE, $user));

        $deleteAll = Action::new(name: self::DELETE_ALL, label: 'Tout supprimer')
            ->setIcon(icon: 'fa fa-trash-alt')
            ->linkToUrl(fn (User $user): string => $this->generateDeleteUrl(action: self::DELETE_ALL, user: $user))
            ->setHtmlAttributes(['data-action' => 'deleteAll'])
            ->displayIf(fn ($user): bool => $user instanceof User && $user->hasLogbooks() && $this->authorizationChecker->isGranted(UserVoter::DELETE, $user));

        $deleteLogbooksOnly = Action::new(name: self::DELETE_LOGBOOKS_ONLY, label: 'Supprimer le carnet')
            ->setIcon(icon: 'fa fa-book')
            ->linkToUrl(fn (User $user): string => $this->generateDeleteUrl(action: self::DELETE_LOGBOOKS_ONLY, user: $user))
            ->setHtmlAttributes(['data-action' => 'deleteLogbooksOnly'])
            ->displayIf(fn ($user): bool => $user instanceof User && $user->hasLogbooks() && $this->authorizationChecker->isGranted(UserVoter::DELETE, $user));

        return $actions
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: $deleteUserOnly)
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: $deleteAll)
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: $deleteLogbooksOnly)
            // Réorganiser l'ordre des actions dans le menu
            ->reorder(Crud::PAGE_INDEX, [Action::DETAIL, Action::EDIT, self::DELETE_LOGBOOKS_ONLY, self::DELETE_USER_ONLY, self::DELETE_ALL]);
    }

    public function configureResponseParameters(KeyValueStore $responseParameters): KeyValueStore
    {
        if (Crud::PAGE_DETAIL === $responseParameters->get('pageName')) {
            $entityDto = $responseParameters->get('entity');
            if (!$entityDto instanceof EntityDto) {
                return $responseParameters;
            }
            $user = $entityDto->getInstance();

            if ($user instanceof User) {
                $responseParameters->set('canAccessProgress', $this->userProgressService->canAccessUserData($user));
            }

            if ($user instanceof User && null !== $user->getNni()) {
                $responseParameters->set('mentees', $this->userRepository->findApprenantByMentorNni($user->getNni()));
            }

            if ($user instanceof User && !$user->getLogbooks()->isEmpty()) {
                $logbook = $user->getLogbooks()->first();

                if ($logbook instanceof Logbook) {
                    $responseParameters->set(
                        'logbookProgress',
                        $this->logbookProgressService->calculateLogbookProgress($logbook)
                    );
                }
            }
        }

        return $responseParameters;
    }

    /**
     * @param AdminContext<User> $context
     */
    #[AdminRoute('/admin/users/delete-user-only', options: ['methods' => ['POST']])]
    #[IsGranted('ROLE_ADMIN')]
    public function deleteUserOnly(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
    ): Response {
        try {
            $user = $this->resolveUserForDeletion($context, self::DELETE_USER_ONLY);

            $this->userDeletionService->deleteUserOnly($user);
            $this->addFlash(type: 'success', message: sprintf('L\'utilisateur %s a été supprimé.', $user->getFullName()));
        } catch (AccessDeniedException $e) {
            throw $e;
        } catch (\Throwable $e) {
            $this->addFlash(type: 'danger', message: 'Une erreur est survenue lors de la suppression: ' . $e->getMessage());
        }

        return $this->redirect(url: $adminUrlGenerator->setAction(action: Action::INDEX)->generateUrl());
    }

    /**
     * @param AdminContext<User> $context
     */
    #[AdminRoute('/admin/users/delete-all', options: ['methods' => ['POST']])]
    #[IsGranted('ROLE_ADMIN')]
    public function deleteAll(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
    ): Response {
        try {
            $user = $this->resolveUserForDeletion($context, self::DELETE_ALL);

            $this->userDeletionService->deleteUserAndLogbooks($user);
            $this->addFlash(type: 'success', message: sprintf('L\'utilisateur %s et ses carnets ont été supprimés.', $user->getFullName()));
        } catch (AccessDeniedException $e) {
            throw $e;
        } catch (\Throwable $e) {
            $this->addFlash(type: 'danger', message: 'Une erreur est survenue lors de la suppression: ' . $e->getMessage());
        }

        return $this->redirect($adminUrlGenerator->setAction(action: Action::INDEX)->generateUrl());
    }

    /**
     * @param AdminContext<User> $context
     */
    #[AdminRoute('/admin/users/delete-logbooks-only', options: ['methods' => ['POST']])]
    #[IsGranted('ROLE_ADMIN')]
    public function deleteLogbooksOnly(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
    ): Response {
        try {
            $user = $this->resolveUserForDeletion($context, self::DELETE_LOGBOOKS_ONLY);

            $this->userDeletionService->deleteLogbooksOnly($user);
            $this->addFlash(type: 'success', message: sprintf('Les carnets de %s ont été supprimés.', $user->getFullName()));
        } catch (AccessDeniedException $e) {
            throw $e;
        } catch (\Throwable $e) {
            $this->addFlash(type: 'danger', message: 'Une erreur est survenue lors de la suppression: ' . $e->getMessage());
        }

        return $this->redirect($adminUrlGenerator->setAction(action: Action::INDEX)->generateUrl());
    }

    /** Génère l'URL d'une action de suppression avec jeton CSRF. */
    private function generateDeleteUrl(string $action, User $user): string
    {
        return $this->adminUrlGenerator
            ->setAction(action: $action)
            ->setEntityId(entityId: $user->getId())
            ->set('token', $this->csrfTokenManager->getToken(tokenId: $action . '-' . $user->getId())->getValue())
            ->generateUrl();
    }

    /** Résout l'utilisateur cible et valide le jeton CSRF de la requête.
     *
     * @param AdminContext<User> $context
     */
    private function resolveUserForDeletion(AdminContext $context, string $action): User
    {
        $request = $context->getRequest();
        $userId = $request->query->get(key: 'entityId');

        if (!$userId) {
            throw new \RuntimeException(message: 'ID utilisateur manquant');
        }

        $token = $request->request->get(key: 'token');
        if (!is_string($token) || !$this->isCsrfTokenValid($action . '-' . $userId, $token)) {
            throw $this->createAccessDeniedException(message: 'Jeton CSRF invalide.');
        }

        $user = $this->userRepository->find($userId);

        if (!$user instanceof User) {
            throw new \RuntimeException(message: 'Utilisateur introuvable');
        }

        // Un ADMIN ne peut supprimer que les utilisateurs de son propre service
        $this->denyAccessUnlessGranted(UserVoter::DELETE, $user);

        return $user;
    }

    /** Un ADMIN ne voit que les utilisateurs de son service ; le SUPER_ADMIN les voit tous. */
    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        if ($this->authorizationChecker->isGranted('ROLE_SUPER_ADMIN')) {
            return $qb;
        }

        $currentUser = $this->getUser();
        $service = $currentUser instanceof User ? $currentUser->getService() : null;

        if (null === $service) {
            // Un administrateur sans service ne voit aucun utilisateur
            return $qb->andWhere('entity.id IS NULL');
        }

        // Les IDs sont des UUID stockés en BINARY(16) : lier la valeur binaire
        // (laisser Doctrine convertir l'entité/l'Uuid donne une comparaison fausse)
        return $qb
            ->andWhere('entity.service = :currentAdminService')
            ->setParameter('currentAdminService', $service->getId()?->toBinary());
    }

    public function detail(AdminContext $context): KeyValueStore|Response
    {
        $instance = $context->getEntity()->getInstance();
        if ($instance instanceof User) {
            $this->denyAccessUnlessGranted(UserVoter::VIEW, $instance);
        }

        return parent::detail($context);
    }

    public function edit(AdminContext $context): KeyValueStore|Response
    {
        $instance = $context->getEntity()->getInstance();
        if ($instance instanceof User) {
            $this->denyAccessUnlessGranted(UserVoter::EDIT, $instance);
        }

        return parent::edit($context);
    }

    public function delete(AdminContext $context): KeyValueStore|Response
    {
        $instance = $context->getEntity()->getInstance();
        if ($instance instanceof User) {
            $this->denyAccessUnlessGranted(UserVoter::DELETE, $instance);
        }

        return parent::delete($context);
    }

    /** Un ADMIN crée des utilisateurs rattachés à son propre service. */
    public function createEntity(string $entityFqcn): object
    {
        $entity = parent::createEntity($entityFqcn);
        if (!$entity instanceof User) {
            throw new \LogicException('createEntity() should return a User.');
        }

        if (!$this->authorizationChecker->isGranted('ROLE_SUPER_ADMIN')) {
            $currentUser = $this->getUser();
            if ($currentUser instanceof User && null !== $currentUser->getService()) {
                $entity->setService($currentUser->getService());
            }
        }

        return $entity;
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$this->authorizationChecker->isGranted('ROLE_SUPER_ADMIN')) {
            // Un ADMIN ne peut attribuer que les rôles non privilégiés ;
            // les rôles déjà détenus par l'utilisateur sont préservés.
            $original = $entityManager->getUnitOfWork()->getOriginalEntityData($entityInstance);
            $originalRoles = $original['roles'] ?? [];
            if (is_string($originalRoles)) {
                $originalRoles = '' === $originalRoles ? [] : explode(',', $originalRoles);
            }
            if (!is_array($originalRoles)) {
                $originalRoles = [];
            }
            $originalRoles = array_map(static fn (mixed $role): string => is_string($role) ? $role : '', $originalRoles);

            $limited = UserRole::getLimitedRoleValues();
            // Les rôles privilégiés déjà détenus sont préservés : le formulaire
            // ADMIN ne peut pas les soumettre, l'intersection les perdrait.
            $privileged = array_diff($originalRoles, $limited);
            $submitted = array_intersect($entityInstance->getRoles(), $limited);
            $entityInstance->setRoles(array_values(array_unique([...$submitted, ...$privileged])));
        }

        parent::updateEntity($entityManager, $entityInstance);
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

        // Garde-fous applicables aux administrateurs de service (le SUPER_ADMIN
        // conserve la main sur l'ensemble des utilisateurs)
        if (!$this->authorizationChecker->isGranted('ROLE_SUPER_ADMIN')) {
            // Un ADMIN ne peut attribuer que les rôles non privilégiés
            $entityInstance->setRoles(
                array_values(array_intersect($entityInstance->getRoles(), UserRole::getLimitedRoleValues()))
            );

            // Le service du nouvel utilisateur est forcé à celui de l'ADMIN
            $currentUser = $this->getUser();
            if ($currentUser instanceof User && null !== $currentUser->getService() && null === $entityInstance->getService()) {
                $entityInstance->setService($currentUser->getService());
            }
        }

        parent::persistEntity($entityManager, $entityInstance);
    }
}
