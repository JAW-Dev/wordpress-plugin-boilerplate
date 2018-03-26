<?php
/**
 * Plugin_Name
 * Plugin_URI
 * Plugin_Description
 * Plugin_Package
 * plugin_function
 * Plugin_TextDomain
 * Plugin_Author
 * Plugin_Author_URL
 * Plugin_Author_Email
 * Development_URL
 *
 * Plugin Name: Plugin_Name
 * Plugin URI:  Plugin_URI
 * Description: Plugin_Description
 * Version:     1.0.0
 * Author:      Plugin_Author
 * Author URI:  Plugin_Author_URL
 * License:     GPLv2
 * Text Domain: Plugin_TextDomain
 * Domain Path: /languages
 *
 * @package   Plugin_Package
 * @author    Plugin_Author <Plugin_Author_Email>
 * @copyright Copyright (c) 2018, Plugin_Author
 * @license   GNU General Public License v2 or later
 * @version   1.0.0
 */

namespace Plugin_Package;

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}

// ==============================================
// Autoloader
// ==============================================
require_once trailingslashit( plugin_dir_path( __FILE__ ) ) . trailingslashit( 'includes' ) . 'autoload.php';

if ( ! class_exists( 'Plugin_Package' ) ) {

	/**
	 * Name
	 *
	 * @author Plugin_Author
	 * @since  1.0.0
	 */
	class Plugin_Package {

		/**
		 * Singleton instance of plugin.
		 *
		 * @var   static
		 * @since 1.0.0
		 */
		protected static $single_instance = null;

		/**
		 * Creates or returns an instance of this class.
		 *
		 * @author Plugin_Author
		 * @since  1.0.0
		 *
		 * @return static
		 */
		public static function get_instance() {
			if ( null === self::$single_instance ) {
				self::$single_instance = new self();
			}

			return self::$single_instance;
		}

		/**
		 * Initialize the class
		 *
		 * @author Plugin_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function __construct() {

		}

		/**
		 * Init
		 *
		 * @author Plugin_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function init() {

			// Load translated strings for plugin.
			load_plugin_textdomain( 'Plugin_TextDomain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

		/**
		 * Activate the plugin.
		 *
		 * @author Plugin_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function _activate() {

			flush_rewrite_rules();
		}

		/**
		 * Deactivate the plugin.
		 * Uninstall routines should be in uninstall.php.
		 *
		 * @author Plugin_Author
		 * @since  1.0.0
		 *
		 * @return void
		 */
		public function _deactivate() {

		}
	}
}

/**
 * Return an instance of the plugin class.
 *
 * @author Plugin_Author
 * @since  1.0.0
 *
 * @return Singleton instance of plugin class.
 */
function plugin_function() {
	return Plugin_Package::get_instance();
}
add_action( 'plugins_loaded', array( plugin_function(), 'init' ) );

// ==============================================
// Activation
// ==============================================
register_activation_hook( __FILE__, array( plugin_function(), '_activate' ) );

// ==============================================
// Deactivation
// ==============================================
register_deactivation_hook( __FILE__, array( plugin_function(), '_deactivate' ) );
