<?php

use PhpCsFixer\Config;
use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Finder;


function laravel(): ConfigInterface
{
    $finder = Finder::create()
        ->in([
            getcwd() . '/app',
            getcwd() . '/config',
            getcwd() . '/database',
            getcwd() . '/resources',
            getcwd() . '/routes',
            getcwd() . '/tests',
        ])
        ->name('*.php')
        ->notName('*.blade.php')
        ->ignoreDotFiles(true)
        ->ignoreVCS(true);

    $self = dirname($_SERVER['PHP_SELF']) . "/../vendor/snapfeat/coding-standards";
    $cacheFile = "$self/.php-cs-fixer.cache";

    return (new Config())
        ->setFinder($finder)
        ->setCacheFile($cacheFile);
}

return laravel()
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setRules([
        '@PSR12' => true,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'attribute_empty_parentheses' => true,
        'backtick_to_shell_exec' => true,
        'binary_operator_spaces' => [
            'default' => 'single_space',
            'operators' => ['=>' => 'single_space'],
        ],
        'blank_line_before_statement' => [
            'statements' => ['declare', 'phpdoc'],
        ],
        'cast_spaces' => ['space' => 'single'],
        'class_attributes_separation' => [
            'elements' => ['method' => 'one'],
        ],
        'class_keyword' => true,
        'class_reference_name_casing' => true,
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'combine_nested_dirname' => true,
        'concat_space' => ['spacing' => 'one'],
        'declare_parentheses' => true,
        'empty_loop_body' => ['style' => 'semicolon'],
        'empty_loop_condition' => true,
        'ereg_to_preg' => true,
        'explicit_indirect_variable' => true,
        'get_class_to_class_keyword' => true,
        'is_null' => true,
        'lambda_not_used_import' => true,
        'list_syntax' => ['syntax' => 'short'],
        'logical_operators' => true,
        'lowercase_keywords' => true,
        'lowercase_static_reference' => true,
        'magic_constant_casing' => true,
        'magic_method_casing' => true,
        'mb_str_functions' => true,
        'method_chaining_indentation' => true,
        'modernize_strpos' => true,
        'modernize_types_casting' => true,
        'modifier_keywords' => [
            'elements' => ['const', 'method', 'property'],
        ],
        'multiline_comment_opening_closing' => true,
        'multiline_promoted_properties' => ['minimum_number_of_parameters' => 1],
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'native_function_casing' => true,
        'native_function_invocation' => true,
        'native_type_declaration_casing' => true,
        'new_expression_parentheses' => true,
        'new_with_parentheses' => [
            'anonymous_class' => true,
            'named_class' => true,
        ],
        'no_alias_functions' => true,
        'no_alternative_syntax' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_comment' => true,
        'no_empty_phpdoc' => true,
        'no_empty_statement' => true,
        'no_extra_blank_lines' => [
            'tokens' => [
                'attribute',
                'curly_brace_block',
                'extra',
                'parenthesis_brace_block',
            ],
        ],
        'no_homoglyph_names' => true,
        'no_short_bool_cast' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_spaces_around_offset' => true,
        'no_superfluous_phpdoc_tags' => [
            'allow_hidden_params' => false,
            'allow_mixed' => false,
            'allow_unused_params' => false,
        ],
        'no_trailing_comma_in_singleline' => [
            'elements' => ['arguments', 'array', 'array_destructuring', 'group_import'],
        ],
        'no_unused_imports' => true,
        'no_useless_concat_operator' => true,
        'no_useless_nullsafe_operator' => true,
        'no_useless_printf' => true,
        'no_useless_return' => true,
        'no_useless_sprintf' => true,
        'no_whitespace_before_comma_in_array' => true,
        'normalize_index_brace' => true,
        'numeric_literal_separator' => [
            'override_existing' => false,
            'strategy' => 'use_separator',
        ],
        'object_operator_without_whitespace' => true,
        'octal_notation' => true,
        'operator_linebreak' => ['position' => 'beginning'],
        'ordered_class_elements' => [
            'order' => [
                'use_trait',
                'case',
                'constant',
                'property_static',
                'property',
                'method_static',
                'construct',
                'destruct',
                'magic',
                'method',
            ],
        ],
        'ordered_types' => ['null_adjustment' => 'always_last'],
        'php_unit_attributes' => ['keep_annotations' => false],
        'phpdoc_array_type' => true,
        'phpdoc_indent' => true,
        'phpdoc_list_type' => true,
        'phpdoc_no_access' => true,
        'phpdoc_no_empty_return' => true,
        'phpdoc_order' => ['order' => ['param', 'return', 'throws']],
        'phpdoc_param_order' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_to_comment' => ['allow_before_return_statement' => false],
        'phpdoc_trim' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'phpdoc_types_order' => ['null_adjustment' => 'always_last'],
        'phpdoc_var_annotation_correct_order' => true,
        'psr_autoloading' => ['dir' => 'app'],
        'random_api_migration' => [
            'replacements' => [
                'getrandmax' => 'mt_getrandmax',
                'rand' => 'mt_rand',
                'srand' => 'mt_srand',
            ],
        ],
        'regular_callable_call' => true,
        'return_assignment' => true,
        'set_type_to_cast' => true,
        'simplified_if_return' => true,
        'single_line_after_imports' => true,
        'single_space_around_construct' => [
            'constructs_preceded_by_a_single_space' => ['as', 'else', 'elseif', 'use_lambda'],
        ],
        'standardize_not_equals' => true,
        'static_lambda' => true,
        'stringable_for_to_string' => true,
        'ternary_operator_spaces' => true,
        'ternary_to_elvis_operator' => true,
        'ternary_to_null_coalescing' => true,
        'trailing_comma_in_multiline' => [
            'elements' => ['arguments', 'array_destructuring', 'arrays', 'match', 'parameters'],
        ],
        'trim_array_spaces' => true,
        'types_spaces' => ['space' => 'none'],
        'whitespace_after_comma_in_array' => ['ensure_single_space' => true],
        'yoda_style' => [
            'always_move_variable' => true,
            'equal' => false,
            'identical' => false,
        ],
    ]);