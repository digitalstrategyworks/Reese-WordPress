<?php
/*
Plugin Name: WP Missed Schedule
Plugin URI: http://wordpress.org/extend/plugins/wp-missed-schedule/
Description: Fix <code>Missed Scheduled</code> Future Posts Cron Job | <a href="http://donate.sla.lcsn.net/" title="Donate author plugin">Donate</a>
Version: 2010.0821.1539
Author: sLa
Author URI: http://wordpress.org/extend/plugins/profile/sla/
 *
 * Development Release: Version 2010 Build 0905-BUGFIX Revision 0609
 * Stable Release: Version 2010 Build 0821 Revision 1539
 *
 *  This program is free software, but licensed work is under Creative Commons License;
 *  you can use it only with the terms of [Attribution-Noncommercial-No Derivative Works 3.0 Unported](http://creativecommons.org/licenses/by-nc-nd/3.0/).
 *
 *  This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *  See the terms of the [GNU General Public License](http://wordpress.org/about/gpl/) as published by the Free Software Foundation.
 *
 * Part of Copyright © 2008-2010 belongs to sLa [LavaTeam] NGjI ™ (slangji [at] gmail [dot] com)
 * and a portion to their respective owners ® Patent Pending - Licensing Applyed
 *
/**
 * @package WordPress WP Missed Schedule (fix-missed-scheduled-future-posts-cron-job)
 * @subpackage PlugIn
 * @author sLa
 * @version 2010.0821.1539
 */
if(!function_exists('add_action')){header('Status 403 Forbidden');header('HTTP/1.0 403 Forbidden');header('HTTP/1.1 403 Forbidden');exit();}?><?php
function wpms_footer_log(){echo"\n<!-- Plugin -> WP Missed Schedule 2010.0821.1539 by sLa -> Active -->\n";}add_action('wp_head','wpms_footer_log');add_action('wp_footer','wpms_footer_log');?><?php
define('WPMS_DELAY',15);define('WPMS_OPTION','wp_missed_schedule');function wpms_replacements_deactivate(){delete_option(WPMS_OPTION);}register_deactivation_hook(__FILE__,'wpms_replacements_deactivate');function wpms_init(){remove_action('publish_future_post','check_and_publish_future_post');$last=get_option(WPMS_OPTION,false);if(($last!==false)&&($last>(time()-(WPMS_DELAY*60))))return;update_option(WPMS_OPTION,time());global$wpdb;$scheduledIDs=$wpdb->get_col("SELECT `ID` FROM `{$wpdb->posts}` "."WHERE ( "." ((`post_date`>0)&&(`post_date` <= CURRENT_TIMESTAMP())) OR "." ((`post_date_gmt`>0)&&(`post_date_gmt` <= UTC_TIMESTAMP())) ".") AND `post_status`='future'");if(!count($scheduledIDs))return;foreach($scheduledIDs as$scheduledID){if(!$scheduledID)continue;wp_publish_post($scheduledID);}}add_action('init','wpms_init',0);?>