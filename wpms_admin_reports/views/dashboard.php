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
 * @since 0.2
 *
 * Dashboard View
 */

if( !class_exists( 'wpmsar_dashboard_view' ) ):

	class wpmsar_dashboard_view{
		
		public function display(){
			$data = get_site_option('wpmsar_dashboard_cache');
			?>
            <style>
			.legend {
				width: 10em;
				border: 1px solid black;
			}
			
			.legend .title {
				display: block;
				margin: 0.5em;
				border-style: solid;
				border-width: 0 0 0 1em;
				padding: 0 0.3em;
			}
			.chart-area{
				margin-left:20px;
				float:left;
			}
			#charts{
				width:700px;
			}
			.row{
				height:500px;
			}
			</style>
			<div class="wrap" id="charts">
            	<?php screen_icon('index');?>
                <h2><?php _e('Dashboard');?></h2>
                <div>
                	<h3>Overall Health</h3>
                    <canvas id="overall-health-chart-block" height="600" width="600"></canvas>
                </div>
                <div class="row">
                    <div class="chart-area">
                        <h3>Users - Status</h3>
                        <canvas id="user-status-chart-block" height="300" width="300"></canvas>
                        <div id="user-status-ledgend"></div>
                    </div>
                    <div class="chart-area">
                        <h3>Sites - Last Updated</h3>
                        <canvas id="last-updated-chart-block" height="300" width="300"></canvas>
                        <div id="last-updated-ledgend"></div>
                    </div>
	            </div>
                <div class="row">
                    <div class="chart-area">
                        <h3>Sites - Last Post</h3>
                        <canvas id="last-post-chart-block" height="300" width="300"></canvas>
                        <div id="last-post-ledgend"></div>
                    </div>
                    <div class="chart-area">
                        <h3>Plugins - Status</h3>
                        <canvas id="plugin-status-chart-block" height="300" width="300"></canvas>
                        <div id="plugin-status-ledgend"></div>
                    </div>
                </div>
            </div>
            <?php if($data != 0): ?>
            <script>
				var sites_up, sites_down, plugins_used, plugins_unused, plugins_upgradable, plugins_upgraded, 
					users_unassigned, users_assigned, sites_no_users, sites_with_users;
					
					sites_up = <?php echo $data['sites_up'];?> / <?php echo $data['sites_count'];?> * 100;
					sites_down = <?php echo $data['sites_down'];?> / <?php echo $data['sites_count'];?> * 100;
					plugins_unused = <?php echo $data['plugins_never_used'];?>/ <?php echo $data['plugins_count'];?> * 100;
					plugins_used = 100 - plugins_unused;
					plugins_upgradable = <?php echo $data['plugins_upgradable'];?>/ <?php echo $data['plugins_count'];?> * 100;
					plugins_upgraded = 100 - plugins_upgradable;
					users_unassigned = <?php echo $data['unassigned_users'];?>/ <?php echo $data['count_users'];?> * 100;
					users_assigned = 100 - users_unassigned;
					sites_no_users = <?php echo $data['sites_no_users'];?>/ <?php echo $data['sites_count'];?> * 100;
					sites_with_users = 100 - sites_no_users;
					
				var overallHealthData = {
					labels : ["Site Up/Down", "Plugin Usage", "Upgradeable PLugins",
					 "Unassigned Users", "Sites with Users"],
					datasets : [
						{
							fillColor : "rgba(192,57,43,0.5)",
							strokeColor : "rgba(192,57,43,1)",
							data : [sites_down, plugins_unused, plugins_upgradable, users_unassigned, sites_no_users]
						},
						{
							fillColor : "rgba(46,204,113,0.5)",
							strokeColor : "rgba(46,204,113,1)",
							data : [sites_up, plugins_used, plugins_upgraded, users_assigned, sites_with_users]
						}
					]
				}
				var radarOptions = {
					scaleOverride : true,
					scaleSteps : 10,
					scaleStepWidth : 10,
					scaleStartValue : 0
				};
				var ohcb = document.getElementById("overall-health-chart-block").getContext("2d");
				var ohBar = new Chart(ohcb).Radar(overallHealthData, radarOptions);
				
				var userStatusData = [
					{
						value: <?php echo $data['users_login_worst']; ?>,
						color: "rgba(192,57,43,1)",
						title: "Over a Year"
					},
					{
						value : <?php echo $data['users_login_bad']; ?>,
						color : "rgba(230,126,34,1)",
						title : "Over 8 Months or Unkown"
					},
					{
						value : <?php echo $data['users_login_good']; ?>,
						color : "rgba(241,196,15,1)",
						title : "Over 4 Months" 
					},
					{
						value : <?php echo $data['users_login_best']; ?>,
						color : "rgba(46,204,113,1)",
						title : "Under 4 Months" 
					}
				];
				var uscb = document.getElementById("user-status-chart-block").getContext("2d");
				var chartOptions = {animationEasing : "easeOutQuart"};
				var usPie = new Chart(uscb).Pie(userStatusData, chartOptions);
				legend(document.getElementById("user-status-ledgend"), userStatusData);
				
				var lastUpdatedData = [
					{
						value: <?php echo $data['last_updated_worst']; ?>,
						color: "rgba(192,57,43,1)",
						title: "Over a Year"
					},
					{
						value : <?php echo $data['last_updated_bad']; ?>,
						color : "rgba(230,126,34,1)",
						title : "Over 8 Months"
					},
					{
						value : <?php echo $data['last_updated_good']; ?>,
						color : "rgba(241,196,15,1)",
						title : "Over 4 Months" 
					},
					{
						value : <?php echo $data['last_updated_best']; ?>,
						color : "rgba(46,204,113,1)",
						title : "Within 4 Months" 
					}
				];
				var lucb = document.getElementById("last-updated-chart-block").getContext("2d");
				var luPie = new Chart(lucb).Pie(lastUpdatedData, chartOptions);
				legend(document.getElementById("last-updated-ledgend"), lastUpdatedData);
				
				var lastPostData = [
					{
						value: <?php echo $data['last_post_worst']; ?>,
						color: "rgba(192,57,43,1)",
						title: "Over a Year or No Posts"
					},
					{
						value : <?php echo $data['last_post_bad']; ?>,
						color : "rgba(230,126,34,1)",
						title : "Over 8 Months"
					},
					{
						value : <?php echo $data['last_post_good']; ?>,
						color : "rgba(241,196,15,1)",
						title : "Over 4 Months" 
					},
					{
						value : <?php echo $data['last_post_best']; ?>,
						color : "rgba(46,204,113,1)",
						title : "Within 4 Months" 
					}
				];
				
				var lpcb = document.getElementById("last-post-chart-block").getContext("2d");
				var lpPie = new Chart(lpcb).Pie(lastPostData, chartOptions);
				legend(document.getElementById("last-post-ledgend"), lastPostData);
				
				var pluginStatusData = [
					{
						value: <?php echo $data['plugins_derelict']; ?>,
						color: "rgba(192,57,43,1)",
						title: "Derelict"
					},
					{
						value : <?php echo $data['plugins_outdated']; ?>,
						color : "rgba(230,126,34,1)",
						title : "Outdated"
					},
					{
						value : <?php echo $data['plugins_questionable']; ?>,
						color : "rgba(241,196,15,1)",
						title : "Questionable" 
					},
					{
						value : <?php echo $data['plugins_diligent']; ?>,
						color : "rgba(46,204,113,1)",
						title : "Diligent" 
					}
				];
				var pscb = document.getElementById("plugin-status-chart-block").getContext("2d");
				var psPie = new Chart(pscb).Pie(pluginStatusData, chartOptions);
				legend(document.getElementById("plugin-status-ledgend"), pluginStatusData);
			</script>
		<?php 
		endif;
		}
	}
endif;