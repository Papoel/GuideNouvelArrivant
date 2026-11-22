<?php

namespace App\Controller\Admin\Logbook;

use App\Entity\Action as ActionEntity;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Entity\User;
use App\Form\LogbookThemesType;
use App\Repository\ActionRepository;
use App\Services\Admin\Users\UserDeletionService;
use App\Services\Logbook\LogbookThemeService;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminRoute;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/** @extends AbstractCrudController<Logbook> */
class LogbookCrudController extends AbstractCrudController
{
    public const DELETE_LOGBOOK = 'deleteLogbook';

    public function __construct(
        private readonly LogbookThemeService $logbookThemeService,
        private readonly EntityManagerInterface $entityManager,
        private readonly ActionRepository $actionRepository,
        private readonly UserDeletionService $userDeletionService,
        private readonly AdminUrlGeneratorInterface $adminUrlGenerator,
        private readonly CsrfTokenManagerInterface $csrfTokenManager,
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return Logbook::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new(propertyName: 'name')->setLabel(label: 'Nom du carnet')->onlyOnIndex(),
            AssociationField::new(propertyName: 'owner', label: 'Propriétaire du carnet'),
            AssociationField::new(propertyName: 'themes', label: 'index' === $pageName ? 'Nb de thèmes' : 'Thèmes associés')
                ->setFormTypeOptions(
                    [
                        'by_reference' => false,
                    ]
                ),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Carnet')
            ->setEntityLabelInPlural('Carnets')
            ->setPageTitle('index', 'Liste des carnets')
            ->setPageTitle('edit', 'Modifier un carnet')
            ->setPageTitle('detail', 'Détails du carnet')
            ->setDefaultSort(['id' => 'DESC'])
            ->showEntityActionsInlined();
    }

    public function configureActions(Actions $actions): Actions
    {
        // Suppressions natives désactivées : un carnet ne se supprime jamais
        // sans être d'abord archivé (document probant). L'action dédiée ci-
        // dessous passe par UserDeletionService (archive → suppression).
        $deleteLogbook = Action::new(name: self::DELETE_LOGBOOK, label: 'Supprimer')
            ->setIcon(icon: 'fa fa-trash')
            ->linkToUrl(fn (Logbook $logbook): string => $this->adminUrlGenerator
                ->setAction(action: self::DELETE_LOGBOOK)
                ->setEntityId(entityId: $logbook->getId())
                ->set('token', $this->csrfTokenManager->getToken(tokenId: self::DELETE_LOGBOOK . '-' . $logbook->getId())->getValue())
                ->generateUrl())
            ->setHtmlAttributes(['data-action' => 'deleteLogbook']);

        return $actions
            ->disable(Action::DELETE, Action::BATCH_DELETE)
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: $deleteLogbook)
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-edit')->setLabel('Éditer');
            })
            ->setPermission(self::DELETE_LOGBOOK, 'ROLE_SUPER_ADMIN');
    }

    /** Suppression d'un carnet : archivé (snapshot + PDF) puis supprimé.
     * @param AdminContext<Logbook> $context */
    #[AdminRoute('/admin/logbooks/delete', options: ['methods' => ['POST']])]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function deleteLogbook(AdminContext $context, AdminUrlGenerator $adminUrlGenerator): Response
    {
        try {
            $request = $context->getRequest();
            $logbookId = $request->query->get(key: 'entityId');

            if (!$logbookId) {
                throw new \RuntimeException('ID du carnet manquant');
            }

            $token = $request->request->get(key: 'token');
            if (!is_string($token) || !$this->isCsrfTokenValid(self::DELETE_LOGBOOK . '-' . $logbookId, $token)) {
                throw $this->createAccessDeniedException('Jeton CSRF invalide.');
            }

            $logbook = $this->entityManager->getRepository(Logbook::class)->find($logbookId);
            if (!$logbook instanceof Logbook) {
                throw new \RuntimeException('Carnet introuvable');
            }

            $owner = $logbook->getOwner();
            $actor = $this->getUser();

            $this->userDeletionService->deleteLogbook($logbook, $actor instanceof User ? $actor : null);

            $this->addFlash(
                type: 'success',
                message: sprintf('Le carnet%s a été supprimé et archivé (conservation 5 ans).', $owner ? ' de ' . $owner->getFullname() : ''),
            );
        } catch (\Throwable $e) {
            $this->addFlash(type: 'danger', message: 'Une erreur est survenue lors de la suppression : ' . $e->getMessage());
        }

        return $this->redirect($adminUrlGenerator->setAction(action: Action::INDEX)->generateUrl());
    }

    public function edit(AdminContext $context): Response
    {
        $logbook = $context->getEntity()->getInstance();

        // Vérification avec instanceof plutôt qu'avec === null
        if (!$logbook instanceof Logbook) {
            throw $this->createNotFoundException('Carnet non trouvé');
        }

        $owner = $logbook->getOwner();
        if ($owner === null) {
            throw $this->createNotFoundException('Propriétaire du carnet non trouvé');
        }

        // getThemes() retourne toujours une Collection (jamais null)
        $themes = $logbook->getThemes();

        $analyseActions = [];
        foreach ($themes as $theme) {
            // $theme est déjà garanti être une instance de Theme par la collection typée

            $logbookId = $logbook->getId();
            $themeId = $theme->getId();
            $ownerId = $owner->getId();

            if ($logbookId === null || $themeId === null) {
                continue;
            }

            $ownerIdString = $ownerId !== null ? $ownerId->toString() : null;
            $debug = $this->actionRepository->hasActionsForThemeInLogbookNative(
                $logbookId->toString(),
                $themeId->toString(),
                $ownerIdString
            );

            $analyseActions[$themeId->toString()] = [
                'theme_id' => $themeId,
                'theme_title' => $theme->getTitle(),
                'has_actions' => $debug
            ];
        }

        $analyses = [
            'analyse_actions' => $analyseActions,
        ];

        $logbookId = $logbook->getId();

        // Vérifier s'il reste des thèmes disponibles à ajouter
        $allThemes = $this->entityManager->getRepository(Theme::class)->findAll();
        $assignedThemes = $logbook->getThemes();

        $availableThemes = [];
        foreach ($allThemes as $theme) {
            $isAssigned = false;
            foreach ($assignedThemes as $assignedTheme) {
                // Les thèmes sont déjà garantis être des instances de Theme par la collection typée

                $assignedThemeId = $assignedTheme->getId();
                $themeId = $theme->getId();

                if ($assignedThemeId !== null && $themeId !== null && $assignedThemeId->equals($themeId)) {
                    $isAssigned = true;
                    break;
                }
            }

            if (!$isAssigned) {
                $availableThemes[] = $theme;
            }
        }

        $hasAvailableThemes = count($availableThemes) > 0;

        $form = $this->createForm(LogbookThemesType::class, $logbook);
        $form->handleRequest($context->getRequest());

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les thèmes sélectionnés (non mappés automatiquement)
            $selectedThemes = $form->get('themes')->getData();

            if (!is_iterable($selectedThemes)) {
                $selectedThemes = [];
            }

            // Ajouter les nouveaux thèmes au carnet
            $themesCount = 0;
            foreach ($selectedThemes as $theme) {
                // Vérifier explicitement le type pour satisfaire PHPStan
                if ($theme instanceof Theme && !$logbook->getThemes()->contains($theme)) {
                    $logbook->addTheme($theme);
                    ++$themesCount;
                }
            }

            $this->entityManager->persist($logbook);
            $this->entityManager->flush();

            $this->addFlash('success', $themesCount . ' thème(s) ajouté(s) avec succès au carnet.');
            return $this->redirectToRoute('admin_logbook_edit', ['entityId' => $logbookId]);
        }

        return $this->render('admin/logbook/edit.html.twig', [
            'logbook' => $logbook,
            'form' => $form->createView(),
            'crudAction' => 'edit',
            'analyses' => $analyses,
            'hasAvailableThemes' => $hasAvailableThemes
        ]);
    }

    #[Route('/admin/logbook/{id}/remove-theme/{themeId}', name: 'admin_logbook_remove_theme')]
    public function removeTheme(Request $request, string $id, string $themeId): Response
    {
        $logbook = $this->entityManager->getRepository(Logbook::class)->find($id);
        $theme = $this->entityManager->getRepository(Theme::class)->find($themeId);

        if (!$logbook || !$theme) {
            throw $this->createNotFoundException('Carnet ou thème non trouvé');
        }

        // Vérifier le token CSRF
        $token = $request->request->get('_token');
        if ($token === null || !is_string($token) || !$this->isCsrfTokenValid('remove_theme' . $id . $themeId, $token)) {
            $this->addFlash('danger', 'Token CSRF invalide.');
            return $this->redirectToRoute('admin_logbook_edit', ['entityId' => $id]);
        }

        // Vérifier si le thème a des actions associées (toutes actions et spécifiques à l'utilisateur)
        $hasAllActions = $this->logbookThemeService->hasThemeActions($logbook, $theme);
        $user = $logbook->getOwner();
        $hasUserActions = $user ? $this->logbookThemeService->hasThemeActions($logbook, $theme, $user) : false;

        // La confirmation se fait via le dialogue JavaScript
        // Plus besoin de vérifier une confirmation supplémentaire, on procède directement

        // Supprimer les actions et modules associés
        // 1. Récupérer directement les modules liés à ce thème dans ce carnet
        $moduleRepository = $this->entityManager->getRepository(Module::class);
        $modules = $moduleRepository->findBy(['theme' => $theme]);

        // 2. Pour chaque module, supprimer ses actions dans ce carnet
        $actionRepository = $this->entityManager->getRepository(ActionEntity::class);
        $actionsRemoved = 0;

        foreach ($modules as $module) {
            $actions = $actionRepository->findBy([
                'module' => $module,
                'logbook' => $logbook
            ]);

            foreach ($actions as $action) {
                $this->entityManager->remove($action);
                ++$actionsRemoved;
            }
        }

        // 3. Supprimer le thème du carnet
        $logbook->removeTheme($theme);
        $this->entityManager->flush();

        // 4. Message d'information consolidé
        if ($actionsRemoved > 0) {
            $actionMessage = $hasUserActions
                ? "Les {$actionsRemoved} actions associées à ce thème, y compris celles de l'utilisateur propriétaire, ont été définitivement supprimées."
                : "Les {$actionsRemoved} actions associées à ce thème ont été définitivement supprimées.";
            $this->addFlash('warning', "Le thème a été supprimé du carnet avec succès. {$actionMessage}");
        } else {
            $this->addFlash('success', 'Le thème a été supprimé du carnet avec succès.');
        }
        return $this->redirectToRoute('admin_logbook_edit', ['entityId' => $id]);
    }
}
