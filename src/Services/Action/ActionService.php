<?php

declare(strict_types=1);

namespace App\Services\Action;

use App\Entity\Action;
use App\Entity\Module;
use App\Repository\ActionRepository;
use Doctrine\ORM\EntityManagerInterface;

readonly class ActionService
{
    public function __construct(
        private readonly ActionRepository $actionRepository,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    public function findOrCreateAction(Module $module): Action
    {
        $action = $this->actionRepository->findOneBy(['module' => $module]);

        if (!$action) {
            $action = new Action();
            $action->setModule($module);
        }

        return $action;
    }

    public function saveAction(Action $action, string $agentName): void
    {
        $currentDate = new \DateTime(datetime: 'now', timezone: new \DateTimeZone('Europe/Paris'));
        $action->setAgentVisa(agentVisa: 'Visa numérique de '.$agentName.' le '.$currentDate->format(format: 'd/m/Y à H:i'));

        $this->entityManager->persist($action);
        $this->entityManager->flush();
    }
}
