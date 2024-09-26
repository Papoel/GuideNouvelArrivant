<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter(name: 'progress_color', callable: [$this, 'getProgressColor']),
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
}
