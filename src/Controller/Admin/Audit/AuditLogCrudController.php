<?php

declare(strict_types=1);

namespace App\Controller\Admin\Audit;

use App\Audit\FieldLabels;
use App\Entity\AuditLog;
use App\Repository\AuditLogRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminRoute;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\ActionGroup;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\DateTimeFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGeneratorInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/** Consultation en lecture seule du journal d'audit, réservée au SUPER_ADMIN.
 *
 * @extends AbstractCrudController<AuditLog>
 */
#[IsGranted('ROLE_SUPER_ADMIN')]
class AuditLogCrudController extends AbstractCrudController
{
    /** Canaux purgeables : valeur soumise => [libellé affiché, icône] ('all' = journal complet, en dernier). */
    private const PURGE_CHANNELS = [
        AuditLog::ACTOR_USER => ['Utilisateur', 'fas fa-user'],
        AuditLog::ACTOR_CONSOLE => ['Console', 'fas fa-terminal'],
        AuditLog::ACTOR_ANONYMOUS => ['Anonyme', 'fas fa-user-secret'],
        'all' => ['Tout le journal', 'fas fa-broom'],
    ];

    public function __construct(
        private readonly AdminUrlGeneratorInterface $adminUrlGenerator,
        private readonly AuditLogRepository $auditLogRepository,
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
        // Menu déroulant "Purger" : une entrée par canal + la purge complète.
        // Chaque entrée ouvre la page de confirmation pré-ciblée (?channel=...).
        $purgeGroup = ActionGroup::new('purgeJournal', 'Purger le journal', 'fas fa-broom')
            ->createAsGlobalActionGroup()
            ->asDangerActionGroup()
            ->addHeader('Purger par canal');

        foreach (self::PURGE_CHANNELS as $channel => [$label, $icon]) {
            if ('all' === $channel) {
                $purgeGroup->addDivider();
            }
            $purgeGroup->addAction(
                Action::new('purge_' . $channel, 'all' === $channel ? $label : 'Canal ' . $label, $icon)
                    ->linkToUrl(fn (): string => $this->adminUrlGenerator
                        ->setRoute('admin_audit_log_purge_confirm', ['channel' => $channel])
                        ->generateUrl())
            );
        }

        return $actions
            // Suppression possible uniquement via l'action DELETE native (confirmée,
            // POST + CSRF) ou la purge dédiée — pas de batch delete anonyme.
            ->disable(Action::NEW, Action::EDIT, Action::BATCH_DELETE)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, $purgeGroup)
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

        yield TextField::new('entityDisplay', 'Entité');
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

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(DateTimeFilter::new('occurredAt', 'Date'))
            ->add(ChoiceFilter::new('action', 'Action')->setChoices([
                'Création' => AuditLog::ACTION_INSERT,
                'Modification' => AuditLog::ACTION_UPDATE,
                'Suppression' => AuditLog::ACTION_DELETE,
                'Liaisons modifiées' => AuditLog::ACTION_COLLECTION_UPDATE,
            ]))
            ->add(ChoiceFilter::new('actorType', 'Canal')->setChoices([
                'Utilisateur' => AuditLog::ACTOR_USER,
                'Console' => AuditLog::ACTOR_CONSOLE,
                'Anonyme' => AuditLog::ACTOR_ANONYMOUS,
            ]))
            ->add(ChoiceFilter::new('entityClass', 'Entité')->setChoices($this->entityClassChoices()))
            ->add(TextFilter::new('actorLabel', 'Auteur'))
            ->add(TextFilter::new('entityId', 'ID entité'));
    }

    /** @return array<string, string> Nom court de classe => FQCN, pour le filtre "Entité".
     *  Base : les entités couvertes par FieldLabels (le filtre exige des choix non
     *  vides, même sur un journal vide) + les classes réellement présentes. */
    private function entityClassChoices(): array
    {
        $choices = [];
        foreach (array_merge(FieldLabels::entities(), $this->auditLogRepository->findDistinctEntityClasses()) as $class) {
            $pos = strrpos($class, '\\');
            $choices[false === $pos ? $class : substr($class, $pos + 1)] = $class;
        }
        ksort($choices);

        return $choices;
    }

    /** Journalise forensiquement toute suppression d'entrée d'audit dans le
     * channel Monolog `audit` (hors de la table — survit à la purge). */
    public function deleteEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->auditLogger->warning('Audit log entry deleted', [
            'entryId' => $entityInstance->getId(),
            'entity' => $entityInstance->getEntityClass(),
            'actor' => $this->getUser()?->getUserIdentifier(),
            'ip' => $this->requestStack->getCurrentRequest()?->getClientIp(),
        ]);

        parent::deleteEntity($entityManager, $entityInstance);
    }

    #[AdminRoute(path: '/purge', name: 'purge_confirm', options: ['methods' => ['GET']])]
    public function purgeConfirm(Request $request): Response
    {
        // Canal pré-ciblé depuis le menu "Purger" de l'index (?channel=...)
        $channel = (string) $request->query->get('channel', 'all');
        if (!array_key_exists($channel, self::PURGE_CHANNELS)) {
            $channel = 'all';
        }

        return $this->render('admin/audit/purge_confirm.html.twig', [
            'total' => $this->auditLogRepository->count([]),
            'counts' => $this->auditLogRepository->countByActorType(),
            'channels' => self::PURGE_CHANNELS,
            'channel' => $channel,
        ]);
    }

    #[AdminRoute(path: '/purge', name: 'purge', options: ['methods' => ['POST']])]
    public function purgeEntries(Request $request): RedirectResponse
    {
        $submittedToken = $request->request->get('_token');
        if (!$this->csrfTokenManager->isTokenValid(new CsrfToken('audit-purge', (string) $submittedToken))) {
            throw new InvalidCsrfTokenException();
        }

        $channel = (string) $request->request->get('channel', 'all');
        if (!array_key_exists($channel, self::PURGE_CHANNELS)) {
            throw $this->createNotFoundException(sprintf('Canal de purge inconnu : "%s".', $channel));
        }

        $count = 'all' === $channel
            ? $this->auditLogRepository->deleteAll()
            : $this->auditLogRepository->deleteByActorType($channel);

        $this->auditLogger->warning('Audit journal purged', [
            'channel' => $channel,
            'entries' => $count,
            'actor' => $this->getUser()?->getUserIdentifier(),
            'ip' => $request->getClientIp(),
        ]);

        $this->addFlash('success', sprintf(
            '%d entrée(s) d\'audit purgée(s) — %s.',
            $count,
            self::PURGE_CHANNELS[$channel][0]
        ));

        return $this->redirect($this->adminUrlGenerator->setAction('index')->generateUrl());
    }
}
