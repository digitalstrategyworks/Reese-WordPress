=== PassExpire ===
Contributors: Dylan Derr
Donate link: http://dylan.homeip.net/personal/expire-password-wordpress-plugin/
Tags: expire, password, password expire, password plugin, expire user, user log
Tested up to: 3.2.1
Stable tag: 3.0.11
Expires user passwords after 60 (Variable) days and requires a password change on login. Also keeps a log of each user that logs in.

== Description ==
Expires user passwords after 30 days and requires a password change on login & keeps a log of each user that logs in. This plugin allows you disable the required password change per single user also.

== Installation ==

1. If you have a version of PassExpire under 3.0 go and disable it first.
2. Upload `expire-password` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= I upgraded to the newest version before disabling my old version, what do I do? =
Easy, just go to the Plugins menu, disable / re-enable the plugin. You only have to do this when upgrading form any version < 3.0 to anything >= 3.0.

= Is this plugin Free? = 
The PassExpire plugin is completely free for non-commercial purposes, if you want to use it for commercial purposes you must purchase a license. You must register a personal license also.

== Screenshots ==

1. PassExpire Settings
2. PassExpire Settings + Activation
3. User Log
4. Settings
5. What a user with an expired password will see.

== Changelog ==
= 3.0.11 = 
* PassExpire main admin link has been removed, it is now just a sub link PassExpire under settings.
* jQuery and javascript has been added and code has been cleaned up.
* Inactive users page removed, may be added back in future versions if requested.
* Key and activation has been updated. No more warning messages.

= 3.0.1 =
* Activation script updated.
* Required Pass Change user frontend pop up CSS modified. If you need to change it to more fit your site, modify moreStyles.css in the expire-password plugin folder.

= 3.0 =
* User log feature added, keeps a log of every user that logs in.
* Now pops up a screen for users to change password on front end.
* Auto logs the user back in after succesful pasword change.
* The usual bugs fixed; as always let me know if you do run into any bugs or any features you would like added.

= 2.04 =
* Rewrote code to be more efficient. Highly suggest upgrading to this latest version as version 1.98 was the first release after a major upgrade (it had a lot of bugs).
* Added a few minor options such as being able to disable the plugin for a single user, and 

= 1.98 =
* Created a Main menu for the plugin "PassExpire Settings".
* Created sub pages "Settings, List Users, Inactive".
* PassExpire Settings page now has a button to expire all user passwords NOW and require a change at next login.
* List Users page will list all users currently in the database and will allow you to expire a single user at a time.
* Inactive will display all accounts that have been inactive for 180+ days. Also has a delete icon for easy / quick removal.

= 1.04 =
* Fixed some bugs, you don't have to disable the plugin to add a user anymore.
* Cleaned up the code some.
* Rewrote SQL queries.

= 0.98 =
* The SQL error that got thrown out when no user was logged in has been fixed. 

= 0.5 =
* Most bugs worked out and added to the wordpress plugin site for further debugging.

= 0.1 =
* Plugin Created.
