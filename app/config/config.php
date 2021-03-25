<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'sql349.main-hosting.eu',
        'port'     => 3306,
        'username'    => 'u314659280_formulario',
        'password'    => 'Formulario2021',
        'dbname'      => 'u314659280_formulario',
        'charset'     => 'utf8',
    ],
	'application' => [
		'appDir'         => APP_PATH . '/',
		'controllersDir' => APP_PATH . '/controllers/',
		'modelsDir'      => APP_PATH . '/models/',
		'migrationsDir'  => APP_PATH . '/migrations/',
		'viewsDir'       => APP_PATH . '/views/',
		'pluginsDir'     => APP_PATH . '/plugins/',
		'libraryDir'     => APP_PATH . '/library/',
		'cacheDir'       => BASE_PATH . '/cache/',
		// 'baseUri'        => '/',
		'baseUri'        => preg_replace('/public([\/\\\\])index.php$/', '', $_SERVER["PHP_SELF"]),
		'logPath'        => BASE_PATH  . '/logs/error.log',
		'logSQL'         => BASE_PATH  . '/logs/sql.log',
	]
]);
