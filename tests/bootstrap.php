<?php
/**
 * Test Bootstrapper.
 *
 * @package    {{plugin-package}}
 * @subpackage {{plugin-package}}\Test
 * @author     {{plugin-author}} <{{plugin_author-email}}>
 * @copyright  Copyright (c) {{year}}, {{plugin-author}}
 * @license    GNU General Public License v2 or later
 * @version    {{plugin-version}}
 */

// Get our tests directory.
$_tests_dir = '/tmp/wordpress-tests-lib';

// Include our tests functions.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually require our plugin for testing.
 *
 * @since 1.0.0
 */
function _manually_load_plugins() {

	// Include the REST API main plugin file if we're using it so we can run endpoint tests.
	if ( class_exists( 'WP_REST_Controller' ) && file_exists( WP_PLUGIN_DIR . '/rest-api/plugin.php' ) ) {
		require WP_PLUGIN_DIR . '/rest-api/plugin.php';
	}

	// Require our plugin.
	if ( file_exists( dirname( dirname( __FILE__ ) ) ) . 'plugin-file-name.php' ) ) {
		require dirname( dirname( __FILE__ ) ) . '/plugin-file-name.php';
	}

	// Plugins to activate.
	$active_plugins = array(
		'plugin-file-name/plugin-file-name.php',
	);

	// Update the active_plugins options with the $active_plugins array.
	update_option( 'active_plugins', $active_plugins );
}

// Inject in our plugin.
tests_add_filter( 'muplugins_loaded', '_manually_load_plugins' );

// Include the main tests bootstrapper.
require $_tests_dir . '/includes/bootstrap.php';

// Require Base class.
require dirname( __FILE__ ) . '/base.php';
