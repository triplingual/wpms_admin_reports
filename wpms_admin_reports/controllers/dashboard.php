<?php
/**
 * Plugin Name: WordPress Multisite Admin Reports
 * Plugin URI: http://www.wordpress.org/plugins/wpms_admin_reports
 * Description: TWPMS Admin Reports is a reporting tool for Wordpress Multisite administrators.
 * Version: 0.2
 * Author: Joe Motacek
 * Author URI: http://www.joemotacek.com
 * License: GPL2
 * 
 * @package wpms_admin_reports
 * @since 0.1
 *
 * Plugin Stats Controller
 */

if ( $_SERVER['SCRIPT_FILENAME'] == __FILE__ )
	die( 'Access denied.' );
	
require_once( MCMVC_PLUGIN_DIR . '/moto_core_mvc/controller.php');

if( !class_exists( 'wpmsar_dashboard_controller' ) ):

	class wpmsar_dashboard_controller extends mcmvc_controller{
		
		private $model;
		
		public function __construct() {
			$this->model = self::__get_model();
		}
		
		public function load_view() {
			$data = $this->model->get_data();
			$view = self::__get_view();
			$view->display($data);
		}
		
	}
		
endif;