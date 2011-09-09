<?php if (!defined('WP_UNINSTALL_PLUGIN')) {exit;}
/*
 * Delete stored options from the options table
 */
delete_option('WSD-COOKIE');
delete_option('WSD-TOKEN');
delete_option('WSD-TARGETID');
delete_option('WSD-USER');
delete_option('wsd_feed_data');