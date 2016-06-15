<?php 
/* Uninstall and remove database settings 
 * @since v0.4
 * Based on: https://developer.wordpress.org/plugins/the-basics/uninstall-methods/
 */
 
 // If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}
 
$option_name1 = 'ccalc_settings';
$option_name2 = 'ccalc_performance_settings';
 
delete_option( $option_name1 );
delete_option( $option_name2 );
 
// For site options in Multisite
delete_site_option( $option_name1 ); 
delete_site_option( $option_name2 );  
 

 