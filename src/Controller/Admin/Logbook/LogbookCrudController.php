<?php

namespace App\Controller\Admin\Logbook;

use App\Entity\Action as ActionEntity;
use App\Entity\Logbook;
use App\Entity\Module;
use App\Entity\Theme;
use App\Form\LogbookThemesType;
use App\Repository\ActionRepository;
use App\Services\Logbook\LogbookThemeService;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

/** @extends AbstractCrudController<Logbook> */
class LogbookCrudController extends AbstractCrudController
{
    public function __construct(
        private readonly LogbookThemeService $logbookThemeService,
        private readonly EntityManagerInterface $entityManager,
        private readonly ActionRepository $actionRepository
    ) {
        // Note: Le CsrfTokenManagerInterface est déjà injecté dans le parent AbstractCrudController
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
        return $actions
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fa fa-edit')->setLabel('Éditer');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fa fa-trash')->setLabel('Supprimer');
            });
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
