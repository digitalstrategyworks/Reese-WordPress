=== Thesis OpenHook ===
Contributors: KingdomGeek
Tags: theme, customization, functions, display, Thesis, diythemes
Requires at least: 2.7
Tested up to: 2.9.2
Stable tag: trunk

This plugin allows you to insert arbitrary content into the many hooks that the Thesis Theme Framework provides. Never again edit a file!

== Description ==

Thesis OpenHook takes the process of modifying <a href="http://diythemes.com/">Thesis</a> and simplifies it!

Where once users would be required to open and modify their `wp-content/themes/thesis/custom/custom_functions.php` file, users can now easily customize Thesis via their blog administration panel.

Not only can arbitrary HTML, CSS, JavaScript, and even PHP be inserted into any of Thesis' hooks, you can also easily remove any of the hooked default elements within Thesis with the click of a button!

If you don't use Thesis, there's probably no reason you need to get this plugin, except to learn from (or port to another theme).

Thesis OpenHook is based heavily upon <a href="http://xentek.net/code/wordpress/plugins/k2-hook-up/">K2 Hook Up</a> by Eric Marden, and so I definitely appreciate his laying the ground work! Hundreds (thousands?) of Thesis users have benefited from OpenHook, and without Eric's plugin to inspire me, there would be no OpenHook as we know it today! Thanks, Eric!

== Installation ==

After you have downloaded the file and extracted the `thesis-openhook/` directory from the archive...

1. Upload the entire `thesis-openhook/` directory to the `wp-content/plugins/` directory.
1. Activate the plugin through the Plugins menu in WordPress.
1. Visit Design -> Thesis OpenHook and customize to your heart's content!

Alternatively, you can use WordPress' automatic plugin installer. Go ahead, it's easier!

== Frequently Asked Questions ==

= I don't use Thesis; can I still use this plugin? =

Yes, but chances are, it won't do anything for you. Thesis' hooks are unique to Thesis, and this plugin relies on those hooks being present.

= Where can I get Thesis for free? =

Unfortunately, Thesis may not be distributed freely. I realize this is counter to the open community & spirit of WordPress, so I encourage you to encourage DIYthemes to relicense Thesis under an open license such as the GPL.

= What about the code in my custom_functions.php file? =

If you have already modified Thesis via custom_functions.php, you are welcome to port those changes into Thesis OpenHook to manage all of your changes in one place.

Note that your blog will use *both* custom_functions.php and Thesis OpenHook, so the two are complementary.

Likewise, custom_functions.php will be processed *after* Thesis OpenHook, so you can override Thesis OpenHook via the custom functions file, if you need to.

= Why can't I edit my custom files with OpenHook? =

Prior to version 2.3, OpenHook provided panels for editing custom CSS & custom functions files. Thesis now provides those features by default, and so there's no reason for OpenHook to provide the same thing.

== Changelog ==

= 2.3.2 =
* Remember the typos fixed in 2.3.1? There were others I should have caught then. I'm a terrible proofreader, but thanks, Dean (http://www.doublejoggingstrollershq.com/), for catching them!

= 2.3.1 =
* Fixed two stupid typos that killed everything that was right with the world. Well, they broke the plugin anyway. Thanks, Jim (http://doggybytes.ca/), for reporting so quickly!

= 2.3 =
* I finally bought an SVN client, so I'm finally updating OpenHook. Sorry for the delay!
* Thesis 1.7's four new hooks are now included.
* OpenHook's file editing panels have been removed -- Thesis has these by default now.
* Readme.txt updated.

= 2.2.5 =
* Reverted change introduced in 2.2.3 regarding stripping of slashes

= 2.2.4 =
* Fixed a syntax error, reported by multiple users.

= 2.2.3 =
* Fixed a bug which prevented the After Teasers Box hook from saving properly. Thanks, Michael Curving.
* Fixed an issue where the file editors would strip slashes unnecessarily. Thanks, Kristarella.