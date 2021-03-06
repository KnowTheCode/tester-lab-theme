<?php
/**
 * Bootstraps the Beans Unit Tests.
 *
 * @package     Beans\Framework\Tests\Unit
 * @since       1.5.0
 * @link        http://www.getbeans.io
 * @license     GNU-2.0+
 */

if ( version_compare( phpversion(), '5.6.0', '<' ) ) {
	trigger_error( 'Beans Unit Tests require PHP 5.6 or higher.', E_USER_ERROR ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
}

define( 'BEANS_TESTS_DIR', __DIR__ );
define( 'BEANS_THEME_DIR', dirname( dirname( dirname( __DIR__ ) ) ) . DIRECTORY_SEPARATOR );
define( 'BEANS_TESTS_LIB_DIR', BEANS_THEME_DIR . 'lib' . DIRECTORY_SEPARATOR );

// Let's define ABSPATH as it is in WordPress, i.e. relative to the filesystem's WordPress root path.
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( dirname( dirname( BEANS_THEME_DIR ) ) ) . '/' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound -- Valid use case for our testing suite.
}

// Time to load Composer's autoloader.
$beans_autoload_path = BEANS_THEME_DIR . 'vendor/';

if ( ! file_exists( $beans_autoload_path . 'autoload.php' ) ) {
	trigger_error( 'Whoops, we need Composer before we start running tests.  Please type: `composer install`.  When done, try running `phpunit` again.', E_USER_ERROR ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
}
require_once $beans_autoload_path . 'autoload.php';
unset( $beans_autoload_path );

require_once BEANS_TESTS_DIR . '/class-test-case.php';
