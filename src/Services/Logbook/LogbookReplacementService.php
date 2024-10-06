<?php

declare(strict_types=1);

namespace App\Services\Logbook;

use App\Entity\Logbook;
use Doctrine\ORM\EntityManagerInterface;

readonly class LogbookReplacementService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
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
            foreach ($newLogbook->getThemes() as $theme) {
                $this->entityManager->persist($theme);
            }

            $this->entityManager->remove($existingLogbook);
            $this->entityManager->flush();
        }
    }
}
