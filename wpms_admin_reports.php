<?php
/**
 * Plugin Name: WordPress Multisite Admin Reports
 * Plugin URI: http://put in wordpress page
 * Description: This plugin is the combination of various multi-site plugins under a loose MVC framework with some features I wanted added.
 * Version: 0.5
 * Author: Joe Motacek
 * Author URI: http://www.joemotacek.com
 * License: GPL2
 * 
 * @package wpms_admin_tools
 * @since 1.0
 *
 * Plugin Bootstrap
 * Check requirements and gets instance of plugin
 */

//Define requirments
define( 'MCMVC_NAME',                 	'WordPress Multsite Admin Reports' );
define( 'MCMVC_SHORT_CODE',		'wpmsar' );
define( 'MCMVC_REQUIRED_PHP_VERSION', 	'5.3.1' ); 
define( 'MCMVC_REQUIRED_WP_VERSION',  	'3.1' ); 

function mcmvc_requirments_check() {
	global $wp_version;
	
	if ( version_compare( PHP_VERSION, MCMVC_REQUIRED_PHP_VERSION, '<') ) {
		return false;
	}
	
	if ( version_compare( $wp_version, MCMVC_REQUIRED_WP_VERSION, '<') ) {
		return false;
	}
	
	return true;
}

if( mcmvc_requirments_check() ) {
	require_once ( WPMU_PLUGIN_DIR . '/wpms_admin_reports/' . MCMVC_SHORT_CODE . '_dispatcher.php');
	$classname = MCMVC_SHORT_CODE . '_dispatcher';
	if( class_exists( $classname ) ) {
		$GLOBALS[MCMVC_SHORT_CODE] = new $classname;
	} else{
		throw new Exception( $classname . ' error: static method get_dispatcher does not exist.');
	}
}else {
	throw new Exception ("This plugin requires PHP version 5.3.1 or higher and WP version 3.1 or higher");
}
