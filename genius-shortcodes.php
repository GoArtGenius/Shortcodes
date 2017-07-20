<?php
/*
Plugin Name: Shortcodes
Plugin URI: http://artgeni.us/themes/pablo
Description: Common bootstrap elements shortcodes for ArtGenius themes
Author: ArtGenius
Author URI: http://artgeni.us/
Version: 1.0.0
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: genius-shortcodes
Domain Path: /assets/languages
*/





define( 'GS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'GS_SHORTCODES_DIR' , GS_PLUGIN_PATH . 'lib/shortcodes/' );

define( 'GS_ASSETS_DIR_URI' , GS_PLUGIN_PATH . 'assets/' );

define( 'GS_EXTRA_DIR' , GS_PLUGIN_PATH . 'lib/extra/' );

define( 'GS_SENDMAIL_URI' , GS_PLUGIN_PATH . 'lib/extra/sendmail.php' );








function sendmail_path()
{

	$sendmail_theme_path = get_template_directory_uri().'/_system/inc/mail/sendmail.php';
	$sendmail_plugin_path = plugin_dir_url( __FILE__ ) . 'lib/extra/sendmail.php';

	// Check for Leo framework
	if( defined( 'LEO_FRAMEWORK' ) == true ) {

		echo $sendmail_theme_path;

	} else {

		echo $sendmail_plugin_path;

	}

}





/*
 * Shortcodes
 *
 */

foreach ( glob( GS_SHORTCODES_DIR . '*.php') as $filename )
{
	include $filename;
}





/*
 * Plugins CSS and JS
 *
 */

add_action(	'wp_enqueue_scripts', 'genius_shortcodes_scripts_and_styles');

function genius_shortcodes_scripts_and_styles()
{

	// Combined JS
	wp_register_script( 'genius-shortcodes', plugin_dir_url( __FILE__ ) . 'assets/js/pablo-tools.combined.min.js', array( 'jquery', 'jquery-form' ), '1.0' );

	// Styles & Shortcodes CSS
	wp_register_style( 'genius-shortcodes',  plugin_dir_url( __FILE__ ) . 'assets/css/pablo-tools.min.css', '1.0', 'all' );


	// If one of ArtGenius theme is not activated enqueue Bootstrap and CCC
	if ( ! defined( 'LEO_FRAMEWORK' ) )
	{
		wp_enqueue_script( 'genius-shortcodes' );
		wp_enqueue_style( 'genius-shortcodes' );
	}

}