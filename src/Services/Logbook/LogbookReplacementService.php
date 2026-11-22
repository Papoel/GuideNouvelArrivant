<?php

declare(strict_types=1);

namespace App\Services\Logbook;

use App\Entity\Logbook;
use App\Services\Admin\Logbooks\LogbookArchiveService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;

readonly class LogbookReplacementService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private LogbookArchiveService $logbookArchiveService,
        private Security $security,
    ) {
    }

    public function handleExistingLogbook(Logbook $newLogbook): bool
    {
        $existingLogbook = $this->entityManager->getRepository(Logbook::class)
            ->findOneBy(['owner' => $newLogbook->getOwner()]);

        return null !== $existingLogbook;
    }

    public function deleteExistingLogbook(Logbook $newLogbook): void
    {
        $existingLogbook = $this->entityManager->getRepository(Logbook::class)
            ->findOneBy(['owner' => $newLogbook->getOwner()]);

        if ($existingLogbook) {
            // L'ancien carnet est figé dans une archive avant d'être remplacé :
            // son contenu probant (commentaires, visas) ne doit pas être perdu.
            $actor = $this->security->getUser();
            $this->logbookArchiveService->archiveLogbook(
                $existingLogbook,
                $actor instanceof \App\Entity\User ? $actor : null,
            );

            foreach ($newLogbook->getThemes() as $theme) {
                $this->entityManager->persist($theme);
            }

            $this->entityManager->remove($existingLogbook);
            $this->entityManager->flush();
        }
    }
}
