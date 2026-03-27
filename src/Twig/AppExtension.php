<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter(name: 'progress_color', callable: [$this, 'getProgressColor']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction(name: 'git_last_commit_date', callable: [$this, 'getLastCommitDate']),
        ];
    }

    public function getProgressColor(string $class): string
    {
        $colors = [
            'bg-danger' => '#dc3545',
            'bg-warning' => '#ffc107',
            'bg-success' => '#28a745',
            'bg-info' => '#17a2b8',
            'bg-primary' => '#007bff',
        ];

        return $colors[$class] ?? '#6c757d';
    }

    public function getLastCommitDate(): ?\DateTime
    {
        $projectRoot = dirname(__DIR__, 2);
        $gitDir = $projectRoot . '/.git';

        if (!is_dir($gitDir)) {
            return null;
        }

        try {
            $output = [];
            $returnCode = 0;
            exec('cd ' . escapeshellarg($projectRoot) . ' && git log -1 --format=%ci 2>/dev/null', $output, $returnCode);

            if ($returnCode === 0 && !empty($output[0])) {
                $dateString = trim($output[0]);
                return new \DateTime($dateString);
            }
        } catch (\Exception $e) {
            // Fail silently
        }

        return null;
    }
}
