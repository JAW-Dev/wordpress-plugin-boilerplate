<?php
/**
 * Plugin Name: {{plugin_name}}
 * Plugin URI:  {{plugin-uri}}
 * Description: {{plugin-description}}
 * Version:     {{plugin-version}}
 * Author:      {{plugin-author}}
 * Author URI:  {{plugin-author-uri}}
 * Donate link: {{plugin-donation-link}}
 * License:     GPLv2
 * Text Domain: {{plugin-textdomain}}
 * Domain Path: /languages
 *
 * @package   {{plugin-package}}
 * @author    {{plugin-author}} <{{plugin_author-email}}>
 * @copyright Copyright (c) {{year}}, {{plugin_author}}
 * @license   GNU General Public License v2 or later
 * @version   {{plugin-version}}
 */

namespace Plugin_Namespace;

// ==============================================
// Autoloader
// ==============================================
require_once trailingslashit( plugin_dir_path( __FILE__ ) ) . trailingslashit( 'includes' ) . 'autoload.php';

if ( ! class_exists( 'Plugin_Class' ) ) {

	/**
	 * Name
	 *
	 * @author {{theme-author}}
	 * @since  {{theme-version}}
	 */
	class Plugin_Class {

		/**
		 * Singleton instance of plugin.
		 *
		 * @var   Plugin_Class
		 * @since {{plugin-version}}
		 */
		protected static $single_instance = null;

		/**
		 * Creates or returns an instance of this class.
		 *
		 * @author {{plugin-author}}
		 * @since  {{plugin-version}}
		 *
		 * @return A single instance of this class.
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
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function __construct() {

		}

		/**
		 * Init
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
		 *
		 * @return void
		 */
		public function init() {

			// Load translated strings for plugin.
			load_plugin_textdomain( '{{plugin-textdomain}}', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}

		/**
		 * Activate the plugin.
		 *
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
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
		 * @author {{theme-author}}
		 * @since  {{theme-version}}
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
 * @author {{theme-author}}
 * @since  {{theme-version}}
 *
 * @return Singleton instance of plugin class.
 */
function plugin_function() {
	return Plugin_Class::get_instance();
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
