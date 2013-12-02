<?php
/**
 * Plugin Name: WordPress Multisite Admin Tools
 * Plugin URI: http://put in wordpress page
 * Description: This plugin is the combination of various multi-site plugins under a loose MVC framework with some features I wanted added in.
 * Version: 0.5
 * Author: Joe Motacek
 * Author URI: http://www.joemotacek.com
 * License: GPL2
 * 
 * @package wpms_admin_tools
 * @since 0.1
 *
 * Plugin Stats Controller
 * Purpose:
 *  - laod scripts
 */

if ( $_SERVER['SCRIPT_FILENAME'] == __FILE__ )
	die( 'Access denied.' );
	
require_once( MCMVC_PLUGIN_DIR . '/moto_core_mvc/controller.php');

if( !class_exists( 'wpmsar_plugin_report_controller' ) ):

	class wpmsar_plugin_report_controller extends mcmvc_controller{
		
		public function __construct() {			
			wp_localize_script( 
				'plugin_reportJS', 
				'ajax_object', 
				array( 
					'ajax_url' 		=> admin_url( 'admin-ajax.php' ), 
					'ajax_nonce' 	=> wp_create_nonce('plugin_report'),
					'plugin_list' 	=> json_encode(self::__get_model()->plugin_list)
				) 
			);
		}
		
		public function load_view() {
			$data = self::__get_model()->get_data();
			$view = self::__get_view();
			$view->display($data);
		}
		
		//AJAX Requests
		public function update_plugin_list(){
			echo self::__process_ajax_request('plugin_report', get_class(self::__get_model()), 'update_plugin_list' );
			die();	
		}
		
		public function update_plugin_status(){
			
			echo self::__process_ajax_request('plugin_report', get_class(self::__get_model()), 'derelict_check' );
			die();			
		}
		
		public function update_derelict_status(){			
			echo self::__process_ajax_request('plugin_report', get_class(self::__get_model()), 'update_derelict_status' );
			die();			
		}
		
	}
endif;
?>