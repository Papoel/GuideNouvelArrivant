<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        // Désactiver les règles de style strict
        'array_indentation' => false,
        'phpdoc_align' => false,
        'phpdoc_summary' => false,
        'concat_space' => false,
        'trailing_comma_in_multiline' => false,
        'yoda_style' => false,
        'blank_line_before_statement' => false,

        // Garder seulement les règles critiques
        'no_unused_imports' => true,
        'ordered_imports' => true,
    ])
    ->setFinder($finder)
    ;
