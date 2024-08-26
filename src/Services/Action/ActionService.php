<?php

declare(strict_types=1);

namespace App\Services\Action;

use App\Entity\Action;
use App\Repository\ActionRepository;

readonly class ActionService
{
    public function __construct(
        private ActionRepository $actionRepository,
    ) {
    }

    /**
     * @return array{actions: Action[]} Returns an array with 'actions' key containing an array of Action objects
     *
     * @phpstan-return array{actions: Action[]}
     */
    public function getActionByModuleId(string $nni, ?int $moduleId): array
    {
        if (null === $moduleId) {
            // Retourner un tableau vide si l'ID du module est null
            return ['actions' => []];
        }

        $actions = $this->actionRepository->findByModuleIdAndUserNni(nni: $nni, moduleId: $moduleId);

        return [
            'actions' => $actions,
        ];
    }
}
