<?php
/**
 * Plugin Name: WordPress Multisite Admin Reports
 * Plugin URI: http://put in wordpress page
 * Description: This plugin is the combination of various multi-site plugins under a loose MVC framework with some features I wanted added in.
 * Version: 0.5
 * Author: Joe Motacek
 * Author URI: http://www.joemotacek.com
 * License: GPL2
 * 
 * @package wpms_admin_reports
 * @since 0.5
 *
 * Dashboard Model
 */

if ( $_SERVER['SCRIPT_FILENAME'] == __FILE__ )
	die( 'Access denied.' );
	

if( !class_exists( 'wpmsar_dashboard_model' ) ):

	class wpmsar_dashboard_model {
		
		public function get_data() {
			return 0;
		}
		
	}
	
endif;