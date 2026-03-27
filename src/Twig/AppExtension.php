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
            // Lire HEAD pour savoir sur quelle branche on est
            $headFile = $gitDir . '/HEAD';
            if (!file_exists($headFile)) {
                return null;
            }

            $head = trim(file_get_contents($headFile));

            // HEAD pointe vers une branche (ref: refs/heads/main)
            if (str_starts_with($head, 'ref: ')) {
                $ref = substr($head, 5); // "refs/heads/main"
                $refFile = $gitDir . '/' . $ref;

                if (!file_exists($refFile)) {
                    return null;
                }

                $commitHash = trim(file_get_contents($refFile));
            } else {
                // HEAD détaché : c'est directement le hash
                $commitHash = $head;
            }

            // Lire l'objet commit pour extraire la date
            $objectPath = $gitDir . '/objects/'
                . substr($commitHash, 0, 2) . '/'
                . substr($commitHash, 2);

            if (!file_exists($objectPath)) {
                return null;
            }

            // Les objets Git sont compressés en zlib
            $raw = file_get_contents($objectPath);
            $content = zlib_decode($raw);

            // Chercher la ligne "committer" qui contient le timestamp Unix
            // Format : "committer Name <email> 1234567890 +0200"
            if (preg_match('/^committer .+ (\d+) [+-]\d{4}$/m', $content, $matches)) {
                $timestamp = (int) $matches[1];
                $date = new \DateTime();
                $date->setTimestamp($timestamp);
                return $date;
            }
        } catch (\Exception $e) {
            // Fail silently
        }

        return null;
    }
}
