<?php
/*
Plugin Name: Anti-email Spam
Plugin URI: http://urbangiraffe.com/plugins/anti-email-spam/
Description: Replaces email addresses with obsfucated javascript or HTML entities
Author: John Godley
Version: 1.2
Author URI: http://urbangiraffe.com/
*/

/* ==================================================================================
 * The one-and-only configuration option!  Choose which encryption method you want by
 * inserting and removing comments on the following two lines (comments start //)
 * ================================================================================== */

$anti_callback = "anti_callback_entity";
//$anti_callback = "anti_callback_js";


/* ==================================================================================
 * No more configuration
 * ================================================================================== */

add_filter ('the_content', 'anti_email_spam', 15);

function anti_callback_entity ($matches)
{
  $email = substr ($matches[0], 1);
  return $matches[1].'<a href="mailto:'.antispambot ($email, true).'">'.antispambot ($email).'</a>';
}

function anti_callback_js ($matches)
{
  // Array[0] = email address
  $parts = explode ('@', substr ($matches[0], 1));
  $str = $matches[1].'<script type="text/javascript">';
  $str .= 'var username = "'.$parts[0].'"; var hostname = "'.$parts[1].'";';
  $str .= 'document.write("<a href=" + "mail" + "to:" + username + ';
  $str .= '"@" + hostname + ">" + username + "@" + hostname + "<\/a>")';
  $str .= '</script>';
  return $str;
}

function anti_email_spam ($text)
{
  global $anti_callback;
  return preg_replace_callback ('/([> ])[A-Z0-9._-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z.]{2,6}/i', $anti_callback, $text);
}
?>