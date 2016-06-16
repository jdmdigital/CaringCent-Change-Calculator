<?php 
/**
 * Plugin Name: CaringCent Change Calculator
 * Plugin URI: http://bootplate.jdmdigital.co/fab-demo/change-calculator-demo/ 
 * Description: Custom standalone plugin which creates the <code>[changecalculator]</code> shortcode for displaying the CaringCent Change Calculator.
 * Version: 1.2
 * Author: JDM Digital
 * Author URI: http://jdmdigital.co
 * License: GPLv2 or later
 * GitHub Plugin URI: https://github.com/jdmdigital/CaringCent-Change-Calculator
 * GitHub Branch: master
 */
 
// Plugin Shortname is ccalc_
if (!defined('CCALC_VERSION'))
	define('CCALC_VERSION', 1.2);

if (!defined('CCALC_PLUGIN_DIR'))
    define('CCALC_PLUGIN_DIR', untrailingslashit(dirname(__FILE__)));
	
if (!defined('CCALC_PLUGIN_URL'))
	define('CCALC_PLUGIN_URL', plugin_dir_url( __FILE__ ));
 
if(!function_exists('ccalc_get_version')) {
	function ccalc_get_version($data = 'version') {
		$version 	= CCALC_VERSION;
		
		if ($data == 'strver') {
			return sprintf('%1', $version);
		} else {
			return $version;
		}
	}
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'ccalc_plugin_action_links' );
function ccalc_plugin_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=ccalc-plugin') ) .'">Settings</a>';
   $links[] = '<a href="https://github.com/jdmdigital/CaringCent-Change-Calculator" target="_blank">GitHub</a>';
   return $links;
}

/* == Plugin Options
 * @since v0.2
 */
require_once(CCALC_PLUGIN_DIR . '/options.php');


/* == Handy Plugin Functions
 * @since v0.3
 */
require_once(CCALC_PLUGIN_DIR . '/handy-functions.php');


// == Enqueue Resources (CSS and JS) with performance options ==
if(!function_exists('ccalc_enqueued_assets')) {
	
	function ccalc_enqueued_assets() {
		if(get_ccalc_option('minify-css')) {
			wp_register_style( 'caringcent-calc', CCALC_PLUGIN_URL . 'css/caringcent-calc.min.css', array(), null );
		} else {
			wp_register_style( 'caringcent-calc', CCALC_PLUGIN_URL . 'css/caringcent-calc.css', array(), ccalc_get_version() );
		}
		wp_enqueue_style(  'caringcent-calc');

		//wp_register_script('jquery-animateNumber', plugin_dir_url( __FILE__ ) . 'js/jquery.animateNumber.min.js', array( 'jquery' ), null, true);
		if(get_ccalc_option('minify-js')) {
			wp_register_script('caringcent-calc', CCALC_PLUGIN_URL . 'js/caringcent-calc.min.js', array( 'jquery' ), null, true);
		} else {
			wp_register_script('caringcent-calc', CCALC_PLUGIN_URL . 'js/caringcent-calc.js', array( 'jquery' ), ccalc_get_version(),true);
		}
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'caringcent-calc');
	}
	
	if( !is_admin() ) {
		add_action( 'wp_enqueue_scripts', 'ccalc_enqueued_assets' );
	}
}

/* == Shortcode
 * @since v0.1
 */
require_once(CCALC_PLUGIN_DIR . '/shortcode.php');


