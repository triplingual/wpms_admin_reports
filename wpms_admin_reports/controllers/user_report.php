<?php
/**
 * Plugin Name: WordPress Multisite Admin Reports
 * Plugin URI: http://put in wordpress page
 * Description: This plugin is the combination of various multi-site plugins under a loose MVC framework with some features I wanted added in.
 * Version: 0.6
 * Author: Joe Motacek
 * Author URI: http://www.joemotacek.com
 * License: GPL2
 * 
 * @package wpms_admin_reports
 * @since 0.5
 *
 * User Report Controller
 */

if ( $_SERVER['SCRIPT_FILENAME'] == __FILE__ )
	die( 'Access denied.' );
	
require_once( MCMVC_PLUGIN_DIR . '/moto_core_mvc/controller.php');

if( !class_exists( 'wpmsar_user_report_controller' ) ):

	class wpmsar_user_report_controller extends mcmvc_controller{
		
		private $model;
		
		public function __construct() {
			$this->model = self::__get_model();
		}
		
		public function load_view() {
			$data = $this->model->get_data();
			$view = self::__get_view();
			$view->display($data);
		}
		
		public function udpate_last_login($user_login, $user){
			$this->model->update_last_login($user);
		}		
	}
endif;