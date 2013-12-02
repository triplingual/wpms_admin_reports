<?php
/**
 * Plugin Name: WordPress Multisite Admin Reports
 * Plugin URI: http://www.wordpress.org/plugins/wpms_admin_reports
 * Description: TWPMS Admin Reports is a reporting tool for Wordpress Multisite administrators.
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