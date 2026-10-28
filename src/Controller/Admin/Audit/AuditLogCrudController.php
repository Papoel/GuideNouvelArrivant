<?php

declare(strict_types=1);

namespace App\Controller\Admin\Audit;

use App\Entity\AuditLog;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminRoute;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGeneratorInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/** Consultation en lecture seule du journal d'audit, réservée au SUPER_ADMIN.
 *
 * @extends AbstractCrudController<AuditLog>
 */
#[IsGranted('ROLE_SUPER_ADMIN')]
class AuditLogCrudController extends AbstractCrudController
{
    public function __construct(
        private readonly AdminUrlGeneratorInterface $adminUrlGenerator,
        private readonly EntityManagerInterface $em,
        private readonly RequestStack $requestStack,
        private readonly CsrfTokenManagerInterface $csrfTokenManager,
        #[Autowire(service: 'monolog.logger.audit')]
        private readonly LoggerInterface $auditLogger,
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return AuditLog::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular("Entrée d'audit")
            ->setEntityLabelInPlural("Journal d'audit")
            ->setPageTitle('index', '📜 Journal d\'audit')
            ->setPageTitle('detail', 'Détail de l\'entrée')
            ->setDefaultSort(['occurredAt' => 'DESC'])
            ->setPaginatorPageSize(50)
            ->overrideTemplate('crud/detail', 'admin/audit/detail.html.twig');
    }

    public function configureActions(Actions $actions): Actions
    {
        $purge = Action::new('purgeJournal', 'Purger le journal', 'fas fa-broom')
            ->linkToUrl(fn (): string => $this->adminUrlGenerator
                ->setRoute('admin_audit_log_purge_confirm')
                ->generateUrl())
            ->createAsGlobalAction()
            ->setCssClass('btn-outline-danger');

        return $actions
            // Suppression possible uniquement via l'action DELETE native (confirmée,
            // POST + CSRF) ou la purge globale dédiée — pas de batch delete anonyme.
            ->disable(Action::NEW, Action::EDIT, Action::BATCH_DELETE)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, $purge)
            ->setPermission(Action::DELETE, 'ROLE_SUPER_ADMIN')
            ->setPermission('purgeJournal', 'ROLE_SUPER_ADMIN');
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnIndex()->hideOnForm();

        yield DateTimeField::new('occurredAt', 'Date')
            ->setFormat('dd/MM/yyyy HH:mm:ss');

        yield TextField::new('actorLabel', 'Auteur');

        yield ChoiceField::new('actorType', 'Canal')
            ->setChoices([
                'Utilisateur' => AuditLog::ACTOR_USER,
                'Console' => AuditLog::ACTOR_CONSOLE,
                'Anonyme' => AuditLog::ACTOR_ANONYMOUS,
            ])
            ->renderAsBadges([
                AuditLog::ACTOR_USER => 'primary',
                AuditLog::ACTOR_CONSOLE => 'dark',
                AuditLog::ACTOR_ANONYMOUS => 'secondary',
            ]);

        yield ChoiceField::new('action', 'Action')
            ->setChoices([
                'INSERT' => AuditLog::ACTION_INSERT,
                'UPDATE' => AuditLog::ACTION_UPDATE,
                'DELETE' => AuditLog::ACTION_DELETE,
                'COLLECTION' => AuditLog::ACTION_COLLECTION_UPDATE,
            ])
            ->renderAsBadges([
                AuditLog::ACTION_INSERT => 'success',
                AuditLog::ACTION_UPDATE => 'info',
                AuditLog::ACTION_DELETE => 'danger',
                AuditLog::ACTION_COLLECTION_UPDATE => 'warning',
            ]);

        yield TextField::new('entityShortClass', 'Entité');
        yield TextField::new('entityId', 'ID entité')->hideOnIndex();

        // Propriété virtuelle : résolue via AuditLog::getChangesSummary()
        yield TextField::new('changesSummary', 'Modifications')
            ->setMaxLength(80)
            ->onlyOnIndex();

        yield TextareaField::new('changesDetailedSummary', 'Modifications')
            ->setNumOfRows(15)
            ->onlyOnDetail();
        yield TextareaField::new('contextPrettyJson', 'Contexte')->onlyOnDetail();
    }

    /** Journalise forensiquement toute suppression d'entrée d'audit dans le
     * channel Monolog `audit` (hors de la table — survit à la purge). */
    public function deleteEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof AuditLog) {
            $this->auditLogger->warning('Audit log entry deleted', [
                'entryId' => $entityInstance->getId(),
                'entity' => $entityInstance->getEntityClass(),
                'actor' => $this->getUser()?->getUserIdentifier(),
                'ip' => $this->requestStack->getCurrentRequest()?->getClientIp(),
            ]);
        }

        parent::deleteEntity($entityManager, $entityInstance);
    }

    #[AdminRoute(path: '/purge', name: 'purge_confirm', options: ['methods' => ['GET']])]
    public function purgeConfirm(): Response
    {
        $total = $this->em->getRepository(AuditLog::class)->count([]);

        return $this->render('admin/audit/purge_confirm.html.twig', [
            'total' => $total,
        ]);
    }

    #[AdminRoute(path: '/purge', name: 'purge', options: ['methods' => ['POST']])]
    public function purgeEntries(Request $request): RedirectResponse
    {
        $submittedToken = $request->request->get('_token');
        if (!$this->csrfTokenManager->isTokenValid(new \Symfony\Component\Security\Csrf\CsrfToken('audit-purge', (string) $submittedToken))) {
            throw new InvalidCsrfTokenException();
        }

        $count = $this->em->getRepository(AuditLog::class)->count([]);
        $this->em->createQuery('DELETE FROM '.AuditLog::class.' a')->execute();

        $this->auditLogger->warning('Audit journal purged', [
            'entries' => $count,
            'actor' => $this->getUser()?->getUserIdentifier(),
            'ip' => $request->getClientIp(),
        ]);

        $this->addFlash('success', sprintf('%d entrée(s) d\'audit purgée(s).', $count));

        return $this->redirect($this->adminUrlGenerator->setAction('index')->generateUrl());
    }
}
