WordPress Multisite Admin Reports
=================================

WPMS Admin Reports is a reporting tool for Wordpress Multisite administrators.  It provides three reports and a dashboard that gives you a quick snapshot view of the health of your WordPress Multisite installation.  All of the tables are client-side sortable using jQuery and tablesorter.  It includes graphical indicators (smiley faces) to help easily identify problem sites, users and plugins.  

The "Dashboard" provides charts that display multiple factors from the other three reports in a graphical way by using radar and pie charts.

The "Site Report" gives you detailed information about each site in your installation.  It can automatically check all of your sites to see if they are displaying errors or functioning correctly.  The table contains the following information; ID, Status (Up/Down), Last Post, Last Update, When Created, Current Template, Number of Users and lists the Primary Administrator.

The "User Report" provides detailed information about each user in your installation.  This plugin also captures when your users login.  The table contains the following information; ID, Username, Name, Email, Last Login, Last IP Address, when Registered, number of Sites and a list of each site as well as the users roll on that corresponding site.  The report is especially handy if you need to audit your users.

The "Plugin Report" lists all installed plugins and provides information about each one.  This plugin will check multiple sources to indicate how trust worthy a plugin is.  The table contains the following information; Name, Upgradeability, Status, Activation Site-wide, Total Number of Blogs that use it and a list of those blogs.  

The plugin has a detailed help tabs that throughly explain the details of each report.  

### Installation ###

 - Place the wpms_admin_reports.php file and wpms_admin_reports folder in the wp-content/mu-plugins folder.
 - Login as a network admin and visit the network admin dashboard. 

### Future Features ###

 - [ ]Comments Report
 - [ ]Archive and Delete Actions
 - [ ]Options/Configuration/Settings Page
 - [ ]Archive and Deleted Highlighting


### Credits, Thanks & Inspiration ###

#### Plugin Stats (Original Version) #####

 - Kevin Graeme | kgraeme@WP.org
 - Deanna Schneider | deannas@WP.org
 - Jason Lemahieu | MadtownLems@WP.org

IcoMoon - for making great icons.

Chart.js - for making beautiful charts.

tablesorter - for removing the need to refresh for table pagination.

jQuery - for being awsome.

Wordpress Last Login

### WordPress Requirments: ###
Requires at least: ???
Tested up to: 3.7.1

License - GPL2

Copyright © 2013 Joe Motacek
