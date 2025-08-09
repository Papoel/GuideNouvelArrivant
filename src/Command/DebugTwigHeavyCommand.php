<?php

declare(strict_types=1);

namespace App\Command;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Twig\Environment;

#[AsCommand(
    name: 'debug:twig-heavy',
    description: 'Analyse la compilation Twig et affiche les templates les plus gourmands en mémoire.'
)]
class DebugTwigHeavyCommand extends Command
{
    public function __construct(private readonly Environment $twig)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $templatesDir = \dirname(path: __DIR__, levels: 2) . '/templates';
        $iterator = new RecursiveIteratorIterator(iterator: new RecursiveDirectoryIterator(directory: $templatesDir));

        $usage = [];

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'twig') {
                $tplPath = str_replace(search: $templatesDir . '/', replace: '', subject: $file->getPathname());

                $memBefore = memory_get_usage(real_usage: true);
                try {
                    $this->twig->load($tplPath);
                } catch (\Throwable $e) {
                    $output->writeln(messages: "<error>Erreur sur {$tplPath} :</error> " . $e->getMessage());
                    continue;
                }
                $memAfter = memory_get_usage(real_usage: true);

                $usage[$tplPath] = $memAfter - $memBefore;
            }
        }

        // Trier du plus gourmand au moins gourmand
        arsort(array: $usage);

        $output->writeln(messages: "\n<comment>Top 10 des templates Twig les plus gourmands :</comment>");
        $count = 0;
        foreach ($usage as $tpl => $mem) {
            $output->writeln(messages: sprintf(
                "%-70s %s",
                $tpl,
                $this->formatBytes(bytes: $mem)
            ));
            if (++$count >= 10) {
                break;
            }
        }

        return Command::SUCCESS;
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1048576) {
            return round(num: $bytes / 1048576, precision: 2) . ' MB';
        }
        if ($bytes >= 1024) {
            return round(num: $bytes / 1024, precision: 2) . ' KB';
        }
        return $bytes . ' B';
    }
}
