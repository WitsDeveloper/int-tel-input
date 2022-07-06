<?php
/**
 * Plugin Name: International Telephone Input
 * Plugin URI: http://www.witstechnologies.co.ke/
 * Description: A jQuery plugin for entering and validating international telephone numbers. It adds a flag dropdown to any input, automatically detects the user's country, displays a relevant placeholder and auto formats the number as they type. Plugin built by Jack O'Connor and converted to a WordPress plugin by Sammy Waweru.
 * Version: 17.0.3
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Sammy Waweru
 * Author URI: http://www.witstechnologies.co.ke/
 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
**/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('ITI_LINK', plugin_dir_url(__FILE__));

//
function smw_int_tel_input() {
	/* Queue necessary CSS and JS files to work with */
	wp_enqueue_style( 'int-tel-input-style', ITI_LINK . 'build/css/intlTelInput.min.css', array(), '17.0.3');
	wp_enqueue_script( 'int-tel-input-data', ITI_LINK . 'build/js/data.min.js', array(), '17.0.3', false );	
	wp_enqueue_script( 'int-tel-input-script', ITI_LINK . 'build/js/intlTelInput-jquery.min.js', array('jquery'), '17.0.3', false );
	wp_enqueue_script( 'int-tel-input-render', ITI_LINK . 'render.js', array('jquery'), '17.0.3', true );	
	wp_register_script( 'int-tel-input-handle', ITI_LINK . 'render.js' );
	wp_localize_script( 'int-tel-input-handle', 'iti_object_url', array( 'iti_root_url' => ITI_LINK ) );
	wp_enqueue_script( 'int-tel-input-handle' );
}
//
add_action( 'wp_enqueue_scripts', 'smw_int_tel_input' );
//Load the admin JS and CSS files for this plugin
add_action( 'admin_print_scripts', 'smw_int_tel_input' );

?>