<?php

use WebTheory\Config\Interfaces\ConfigInterface;

use function Env\env;
use function WebTheory\WpCliUtil\maybe_define_abspath;

require_once __DIR__ . '/init.php';

/**
 * @var string $root
 * @var ConfigInterface $config
 */

# load dev boot scripts
// @phpstan-ignore-next-line
array_map(function ($script) use ($root, $config) {
    require_once __DIR__ . "/{$script}.php";
}, ['constants']);

# define abspath
maybe_define_abspath($root);

# establish playground entrypoint
play('setup', [
    'root' => $root,
    'config' => $config,
]);

# define table prefix
$table_prefix = env('DB_TABLE_PREFIX') ?? 'wp_';
