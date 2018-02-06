<?php
/**
 * Call Template Function.
 *
 * Load: true
 *
 * @package    Plugin_Package
 * @subpackage Plugin_Package/Includes/Core
 * @author     Plugin_Author <Plugin_Author_Email>
 * @copyright  Copyright (c) 2018, Plugin_Author
 * @license    GNU General Public License v2 or later
 * @version    1.0.0
 */

if ( ! defined( 'WPINC' ) ) {
	wp_die( 'No Access Allowed!', 'Error!', array( 'back_link' => true ) );
}
 
if ( ! function_exists( 'Plugin_TextDomain_call_template_function' ) ) {
	/**
	 * Example Function.
	 *
	 * @author Jason Witt
	 * @since  1.0.0
	 *
	 * @param string $callback The function to callback.
	 * @param mixed  ...$args  The arguments for the function.
	 *
	 * @return string
	 */
	function Plugin_TextDomain_call_template_function( $callback, ...$args ) {
		$call_template_function = new Plugin_Package\Includes\Classes\Call_Template_Function();
		return $call_template_function->init( $callback, $args );
	}
}
