<?php

declare(strict_types=1);

namespace App\Twig;

use App\Entity\Logbook;
use App\Services\Logbook\LogbookProgressService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class LogbooksProgressExtension extends AbstractExtension
{
    public function __construct(
        private readonly LogbookProgressService $logbookProgressService
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction(name: 'get_logbooks_progress', callable: [$this, 'getLogbooksProgress']),
        ];
    }

    /**
     * @param Logbook[] $logbooks
     *
     * @return array<array{
     *     agent_progress: float,
     *     mentor_progress: float,
     *     total_modules: int,
     *     completed_by_agent: int,
     *     validated_by_mentor: int,
     *     modules_awaiting_validation: int,
     *     progress_class_agent: string,
     *     progress_class_mentor: string
     * }>
     */
    public function getLogbooksProgress($logbooks): array
    {
        $logbooksProgress = [];
        foreach ($logbooks as $logbook) {
            $logbooksProgress[] = $this->logbookProgressService->calculateLogbookProgress($logbook);
        }

        return $logbooksProgress;
    }
}
