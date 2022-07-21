<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(['app', 'bin', 'boot', 'config', 'tests', 'theme', '.playground'])
    ->exclude(['theme/assets'])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->append([basename(__FILE__), 'rector.php', 'wp-config.php']);

return (new Config())
    ->setCacheFile(__DIR__ . '/build/php-cs-fixer/.cache')
    ->setFinder($finder)
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_before_statement' => [
            'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
        ],
        'cast_spaces' => true,
        'class_attributes_separation' => [
            'elements' => [
                'method' => 'one',
                'property' => 'one',
            ],
        ],
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'fully_qualified_strict_types' => true,
        'function_typehint_space' => true,
        'global_namespace_import' => [
            'import_classes' => true,
        ],
        'lambda_not_used_import' => true,
        'method_argument_space' => [
            'after_heredoc' => true,
        ],
        'no_empty_phpdoc' => true,
        'no_extra_blank_lines' => true,
        'no_unneeded_import_alias' => true,
        'no_unused_imports' => true,
        'not_operator_with_space' => false,
        'not_operator_with_successor_space' => false,
        'object_operator_without_whitespace' => true,
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'imports_order' => ['class', 'function', 'const'],
        ],
        'phpdoc_scalar' => [
            'types' => ['boolean', 'callback', 'double', 'integer', 'real', 'str'],
        ],
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_var_without_name' => true,
        'single_blank_line_at_eof' => true,
        'single_space_after_construct' => true,
        'ternary_to_null_coalescing' => true,
        'trailing_comma_in_multiline' => true,
        'trim_array_spaces' => true,
        'unary_operator_spaces' => true,
    ]);
