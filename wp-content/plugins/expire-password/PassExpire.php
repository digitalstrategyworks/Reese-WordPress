<?php
/*
Plugin Name: PassExpire
Plugin URI: http://dylan.homeip.net/personal/expire-password-wordpress-plugin/
Description: Expires user passwords after 60 (Variable) days and requires a password change on login.
Version: 3.0.11
Author: Dylan Derr
Author URI: http://amonix.net
License:  GPL2

The PassExpire plugin is completely free for non-commercial purposes, if you want to use it for commercial purposes I'd appreciate a small donation - you choose the amount.

Copyright 2010  DYLAN DERR  (email : dylanderr@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Version Check
global $wp_version;
$exit_msg='WP Expire Password requires WordPress 3.0 or newer. <a
href="http://codex.wordpress.org/Upgrading_WordPress">Please
update!</a>';
if (version_compare($wp_version,"3.0","<"))
{
exit ($exit_msg);
}

register_activation_hook(__FILE__,'PluginInstall');
register_deactivation_hook( __FILE__,'PluginUninstall');

require('hooks.php');
require('pluggable.php');
require('functions.php');
require('ifPOSTData.php');
require('dataHolder.php');

?>
