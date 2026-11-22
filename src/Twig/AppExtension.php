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
            new TwigFilter(name: 'html_to_text', callable: [$this, 'htmlToText']),
        ];
    }

    /**
     * Convertit du HTML stocké en base en texte brut lisible (PDF, exports).
     * Les balises de bloc deviennent des sauts de ligne avant suppression
     * pour éviter la fusion des paragraphes.
     */
    public function htmlToText(?string $html): string
    {
        if ($html === null || trim($html) === '') {
            return '';
        }

        $text = (string) preg_replace('/<br\s*\/?\s*>/i', "\n", $html);
        $text = (string) preg_replace('/<li[^>]*>/i', '• ', $text);
        $text = (string) preg_replace('/<\/(p|div|li|ul|ol|h[1-6]|tr|td|th|table|blockquote)>/i', "\n", $text);
        $text = strip_tags($text);
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = str_replace("\xc2\xa0", ' ', $text); // espace insécable
        $text = (string) preg_replace('/[ \t]+/', ' ', $text);
        $text = (string) preg_replace('/\n{3,}/', "\n\n", $text);

        return trim($text);
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

            $headContent = file_get_contents($headFile);
            if ($headContent === false) {
                return null;
            }
            $head = trim($headContent);

            // HEAD pointe vers une branche (ref: refs/heads/main)
            if (str_starts_with($head, 'ref: ')) {
                $ref = substr($head, 5); // "refs/heads/main"
                $refFile = $gitDir . '/' . $ref;

                if (!file_exists($refFile)) {
                    return null;
                }

                $commitContent = file_get_contents($refFile);
                if ($commitContent === false) {
                    return null;
                }
                $commitHash = trim($commitContent);
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
            if ($raw === false) {
                return null;
            }
            $content = zlib_decode($raw);
            if ($content === false) {
                return null;
            }

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
