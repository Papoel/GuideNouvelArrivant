<?php

declare(strict_types=1);

namespace App\Controller\Admin\Archives;

use App\Entity\LogbookArchive;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminRoute;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/** Consultation des archives de carnets de compagnonnage.
 *
 * Lecture seule : une archive est un document figé créé automatiquement lors
 * de la suppression d'un utilisateur ou d'un carnet. Elle ne se crée ni ne
 * s'édite manuellement, et sa suppression est assurée par la tâche de purge
 * à l'expiration des 5 ans de conservation (cf. politique de confidentialité).
 *
 * Réservé au SUPER_ADMIN : les archives contiennent les données personnelles
 * d'anciens salariés de tous les services.
 *
 * @extends AbstractCrudController<LogbookArchive>
 */
#[IsGranted('ROLE_SUPER_ADMIN')]
class LogbookArchiveCrudController extends AbstractCrudController
{
    public const ACTION_DOWNLOAD_PDF = 'downloadPdf';

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly AdminUrlGeneratorInterface $adminUrlGenerator,
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return LogbookArchive::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Archive de carnet')
            ->setEntityLabelInPlural('Archives de carnets')
            ->setPageTitle('index', 'Archives des carnets supprimés')
            ->setPageTitle('detail', 'Détail de l\'archive')
            ->setHelp('index', sprintf(
                'Carnets figés lors de la suppression d\'un utilisateur ou d\'un carnet. '
                    . 'Conservation %d ans puis purge automatique, conformément à la politique de confidentialité.',
                LogbookArchive::RETENTION_YEARS,
            ))
            ->setDefaultSort(['archivedAt' => 'DESC'])
            ->showEntityActionsInlined();
    }

    public function configureActions(Actions $actions): Actions
    {
        $downloadPdf = Action::new(name: self::ACTION_DOWNLOAD_PDF, label: 'Télécharger le PDF')
            ->setIcon(icon: 'fa fa-file-pdf')
            ->linkToUrl(fn (LogbookArchive $archive): string => $this->adminUrlGenerator
                ->setAction(action: self::ACTION_DOWNLOAD_PDF)
                ->setEntityId(entityId: $archive->getId())
                ->generateUrl())
            ->displayIf(fn (LogbookArchive $archive): bool => null !== $archive->getPdf());

        return $actions
            // Document figé : aucune création, édition ou suppression manuelle.
            ->disable(Action::NEW, Action::EDIT, Action::DELETE, Action::BATCH_DELETE)
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: Action::DETAIL)
            ->add(pageName: Crud::PAGE_INDEX, actionNameOrObject: $downloadPdf)
            ->add(pageName: Crud::PAGE_DETAIL, actionNameOrObject: $downloadPdf);
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('ownerFullname', 'Titulaire');
        yield TextField::new('mentorName', 'Tuteur')
            ->formatValue(static fn (?string $name): string => $name ?? '—');
        yield DateTimeField::new('archivedAt', 'Archivé le')
            ->setFormat('dd/MM/yyyy HH:mm');
        yield DateTimeField::new('expiresAt', 'Expiration')
            ->setFormat('dd/MM/yyyy');
        yield TextField::new('remainingTimeLabel', 'Conservation restante')
            ->setCssClass('badge bg-info');

        if (Crud::PAGE_DETAIL === $pageName) {
            yield TextField::new('ownerNni', 'NNI')
                ->formatValue(static fn (?string $nni): string => $nni ?? '—');
            yield TextField::new('ownerEmail', 'Email')
                ->formatValue(static fn (?string $email): string => $email ?? '—');
            yield TextField::new('ownerService', 'Service')
                ->formatValue(static fn (?string $service): string => $service ?? '—');
            yield TextField::new('ownerJob', 'Métier')
                ->formatValue(static fn (?string $job): string => $job ?? '—');
            yield DateTimeField::new('hiringAt', 'Embauché le')
                ->setFormat('dd/MM/yyyy');
            yield TextField::new('archivedBy', 'Archivé par')
                ->formatValue(static fn (?string $actor): string => $actor ?? 'Système');
            yield TextField::new('pdfFilename', 'Fichier PDF')
                ->formatValue(static fn (?string $filename): string => $filename ?? '—');
            yield TextareaField::new('payloadJson', 'Contenu archivé (JSON)')
                ->setNumOfRows(30);
        }
    }

    /** Télécharge le PDF probant figé au moment de l'archivage.
     * @param AdminContext<LogbookArchive> $context */
    #[AdminRoute('/admin/archives/download', options: ['methods' => ['GET']])]
    #[IsGranted('ROLE_SUPER_ADMIN')]
    public function downloadPdf(AdminContext $context): Response
    {
        $entityId = $context->getRequest()->query->get(key: 'entityId');
        $archive = is_string($entityId)
            ? $this->entityManager->getRepository(LogbookArchive::class)->find($entityId)
            : null;

        if (!$archive instanceof LogbookArchive || null === $archive->getPdf()) {
            throw $this->createNotFoundException('Archive ou PDF introuvable.');
        }

        return new Response(
            content: $archive->getPdf(),
            headers: [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . ($archive->getPdfFilename() ?? 'carnet-archive.pdf') . '"',
            ],
        );
    }
}
