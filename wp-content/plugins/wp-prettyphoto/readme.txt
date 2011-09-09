=== WP-prettyPhoto ===
Contributors: plpetitclerc
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=pL%40fusi0n%2eorg&lc=CA&item_name=Pier%2dLuc%20Petitclerc%20%2d%20Code%20Support&currency_code=CAD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest
Tags: prettyphoto, jquery, lightbox, gallery, ajax, pictures, flash, video, animation, movie, mov, swf, youtube, iframe, modal, images, quicktime
Requires at least: 2.7
Tested up to: 3.0.1
Stable tag: 1.6.2

prettyPhoto is a jQuery based lightbox clone. Not only does it support images, it also add support for videos, flash, YouTube, iFrame. It's a full blown media modal box. WP-prettyPhoto embeds those functionalities in WordPress.

== Description ==

[prettyPhoto](http://www.no-margin-for-errors.com/projects/prettyPhoto/) is a jQuery based lightbox clone by [Stéphane Caron](http://www.no-margin-for-errors.com). Not only does it support images, it also add support for videos, flash, YouTube, iFrame. It's a full blown media modal box. WP-prettyPhoto embeds these functionalities in WordPress.

If you like this plugin, please consider [giving your honest rating](http://wordpress.org/extend/plugins/wp-prettyphoto/), blogging/tweeting about it or [donating](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=pL%40fusi0n%2eorg&lc=CA&item_name=Pier%2dLuc%20Petitclerc%20%2d%20Code%20Support&currency_code=CAD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest).
Thank you!

Note: The plugin's documentation/help is located on [Pier-Luc's blog](https://fusi0n.org/wp-prettyphoto/technical-information-and-usage-instructions). A full version history (changelog) is available [here](http://wordpress.org/extend/plugins/wp-prettyphoto/changelog/). prettyPhoto's documentation is available [here](http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/documentation/).

== Installation ==

* Use WordPress’ builtin plugin installation system located in your WordPress admin panel, labeled as the "Add New" options in the "Plugins" menu to upload the zip file you downloaded
* Extract the zip file and upload the resulting "wp-prettyphoto" folder on your server under `wp-content/plugins/`.

All you need to do after that is navigate to your blog’s administration panel, go in the plugins section and enable WP-prettyPhoto.

In order to personalize the available options, check in WordPress' "Media" section under "Settings" (options-media.php).

For more information, see the ["Installing Plugins" article on the WordPress Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

== Frequently Asked Questions ==

= Any technical requirements? =

* You will need PHP5. PHP4 has been [officially discontinued since August 8 2008](http://www.php.net/archive/2007.php#2007-07-13-1). If this plugin gives you PHP errors (T_STATIC, T_OLD_FUNCTION), you should strongly consider upgrading your PHP installation.
* You will also need at least WordPress 2.7 since WP-prettyphoto is using (as of version 1.4) WordPress' Settings API.

= How do I use it? =

See the plugin's [documentation](https://fusi0n.org/wp-prettyphoto/technical-information-and-usage-instructions), prettyPhoto's [project page](http://www.no-margin-for-errors.com/projects/prettyPhoto-jquery-lightbox-clone) and prettyPhoto's [support forums](http://forums.no-margin-for-errors.com/?CategoryID=2).

== Screenshots ==

1. WP-prettyPhoto showing a YouTube video
2. WP-prettyPhoto showing a picture in a gallery
3. WP-prettyPhoto showing an external site

== ChangeLog ==

= Version 1.6.2 =
 
* Upgraded to prettyPhoto 2.5.6
* Upgraded to jQuery 1.4.2
 
= Version 1.6.1 =

* Fixed a small bug that made displaying the autoplay directive be valueless

= Version 1.6 =

* Implemented prettyPhoto Markup
* Added WMODE & AutoPlay settings
* Fixed some bugs

= Version 1.5.6 =

* Upgraded to prettyPhoto 2.5.5
* Ensured WordPress 2.8.9 compatibility

= Version 1.5.5 =

* Fixed JavaScript Markup Validation Error [chrissss](http://wordpress.org/support/topic/318618)
* Fixed Automation Section Settings Duplication

= Version 1.5.4 =

* Fixed Settings Page bug

= Version 1.5.3 =

* Ensured compatibility with WordPress 2.8.6
* Upgraded to prettyPhoto 2.5.4

= Version 1.5.2 =

* Upgraded to [prettyPhoto 2.5.3](http://www.no-margin-for-errors.com/2009/09/14/prettyphoto-2-5-3/)
* Added setting for hideflash
* Added setting for modal
* Added setting for changepicturecallback

= Version 1.5.1 =

* Fixed a variable type bug that voided allowResize and showTitle from working properly ([Joax](http://010fuss.com/))
* Updated documentation

= Version 1.5 =

* Upgraded to prettyPhoto 2.5.2
* Added ShortCodes to use the new prettyPhoto API
* Ensured WordPress 2.8.4 compatibility

= Version 1.4.4 =

* Fixed a path bug in JavaScript & CSS inclusion ([lavaper](http://jivanduduk.com/))

= Version 1.4.3 =

* Ensured WordPress 2.8.3 compatibility

= Version 1.4.2 =

* Fixed a bug that prevented options to be saved properly
* Added Russian localization ([Fat Cow](http://www.fatcow.com/))

= Version 1.4.1 =

* Reimplemented Localizations
* Added French localization
* Removed mobile detection
* Few optimizations

= Version 1.4 =

* LOTS of code improvements
* Implemented WordPress' [Settings API](http://codex.wordpress.org/Settings_API)
* The settings page is now located under WordPress' 'Media' section.
* Changed minimum required WordPress version to 2.7
* Implemented prettyPhoto's callback support
* No longer supporting IE6 hacks - please move on

= Version 1.3.4 =

* Ensured Wordpress 2.8.1 compatibility

= Version 1.3.3 =

* Fixed a bug with the options not being set correctly or throwing errors (Matt)

= Version 1.3.2 =

* Ensured Wordpress 2.8 compatibility
* Fixed an option bug where values would be reset when submitting ([Ben ter Stal](http://www.warmstal.nl))

= Version 1.3.1 =

* Upgraded to prettyPhoto 2.4.3 (IE6 theme fallback support, iframe parameters issue)

= Version 1.3 =

* Upgraded to prettyPhoto 2.4.2
* iFrames & YouTube support
* Mixed galleries (Flash/iFrames/Video/Image) now supported
* Optimized options page
* Added a bunch of switches for format hooks
* Code improvement

= Version 1.2.1.3 = 

* Added sprite image

= Version 1.2.1.2 =

* Fixed method scope bug

= Version 1.2.1.1 =

* Upgraded to prettyPhoto 2.3.2
* Switched from uncompressed prettyPhoto to compressed version
* Some code improvements

= Version 1.2.1 =

* Fixed a bug where prettyPhoto would ignore WordPress galleries within posts and pages ([Alex Canning](http://www.sparetimedesign.co.uk), [Frank](http://www.familie-dorst.nl), [onelargeprawn](http://www.onelargeprawn.co.za))

= Version 1.2.0.1 =

* Fixed two small version bugs
* Actually bundled jQuery 1.3.2. Sorry about that =/

= Version 1.2 =

* Upgraded to [prettyPhoto 2.3](http://www.no-margin-for-errors.com/projects/prettyPhoto-jquery-lightbox-clone/)
* Upgraded bundled jQuery to 1.3.2
* Added video (mov) and flash (swf) support
* Added option to toggle video and flash support
* Added exclusion rule for images/flash/videos with a _blank target ([Tommy Jones](http://www.standonyourbrand.com))
* Added option to disable jQuery substitution ([Stéphane Caron](http://www.no-margin-for-errors.com))
* Switched from uncompressed prettyPhoto to compressed version
* Recompiled French and English localization
* Fixed a bug where DD_belatedPNG would be included even if the selected theme wasn't dark.

= Version 1.1.4 =

* Fixed a bug that made "Show Title" option inaccessible ([onelargeprawn](http://www.onelargeprawn.co.za/))

= Version 1.1.3 =

* Added localization support
* Added French localization

= Version 1.1.2 =

* Major code improvement

= Version 1.1.1 =

* Upgraded to prettyPhoto 2.2.5
* Compatibility issues should now be fixed

= Version 1.1 =

* Upgraded to prettyPhoto 2.2.3
* Tested compatiblity with Wordpress 2.7.1
* Implemented theme support
* Implemented PNG transparency hook (IE6 only)
* Various etiquette/style code improvements
* phpDoc comments
* Now registering scripts and styles via native functions
* Added popular mobile browser check - will not load if user is viewing from mobile.
* Improved README

= 1.0.1 =

* Fixed and improved README file
* Cleaned up code indentation
* Fixed possible bug relative to the options page link camel-casing

= 1.0 =

* Initial release
