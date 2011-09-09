=== Effects for NextGEN Gallery ===
Contributors: fanningert
Tags: highslide,  nextgen-gallery
Requires at least: 2.9.2
Tested up to: 3.0.4
Stable tag: 0.8.5

Advanced wordpress and NextGen Gallery with some extra effects.

== Description ==

Advanced wordpress and NextGen Gallery with some extra effects.
I only tested the 3.x version without network feature.

= What is EFNGG / What can you expect? =

* A non invasive WordPress-plugin that extend NextGen Gallery with some new effects
* Highslide and Lightbox support
* Configuration of the effects over a web option page
* Full i18n-Support through gnutext mo/po files

Important Links:

* <a href="http://wordpress.org/extend/plugins/effects-for-nextgen-gallery/changelog/" title="Effects for NextGEN Gallery Changelog">Changelog</a>
* <a href="http://wordpress.org/tags/effects-for-nextgen-gallery?forum_id=10" title="Wordpress Support Forum">Support Forum</a>

= TODO =

* Add more translation
* Test mit vorherigen Versionen (NextGEN Gallery and Wordpress)
* Download-Option (Highslide) in the Option-Page (no manuell download more)

== Installation ==

1. Just go to Plugins/Add New
2. Enter the term "Effects NextGEN Gallery" and start the search
3. Click on "Effects for NextGEN Gallery"
4. Click on "install"

= Activate the plugin =

1. Go to "admin panel/plugins" and activate EFNGG

= Activate an effect =

1. Open the configuration page and configure the effect as desired.
2. (Highslide) You read the license agreement and accept it.
3. Then turn on the effect on the main page of EFNGG.

== Screenshots ==

1. Option page: General options
2. Option page: Highslide

== Changelog ==

= 0.9 =

* Bugfix : Cannot modify header information - headers already sent by (output started a ....effects-for-nextgen-gallery/effects/lightbox/effect.php:1

= 0.8.5 =

* Bugfix : Corrected the loading of the textdomain. Thanks to Terry Wilson for the hint.

= 0.8.4 =

* Bugfix : Added deregister for Javascript libraries

= 0.8.3 =

* Change : Update the POT file
* Bugfix : Fixed the highslide control display problem

= 0.8.2 =

* Add    : Theme support for effects
* Add    : Highslide option for the position of the picture number
* Add    : Highslide option for graphic outline
* Remove : Highslide graphic path
* Remove : unused effects

= 0.7.7 =

* Add    : Highslide library integrated and therefore no extra download required.
* Add    : Licensing exam in administration interface integrated.
* Add    : Support for custom lightbox config file

= 0.7.6 =

* Add    : Configuration options for Lightbox

= 0.7.5 =

* Add    : POT file for translation
* Bugfix : Lightbox no longer works in version 0.7.4

= 0.7.4 =

* Add    : I added a button for each supported effect. This button serves as a quick link to the configuration page
* Change : Merg all effect sites to one effect site.

= 0.7.3 =
* Add : German Translation

= 0.7.2 =
* Add    : Table for custom effects on the general option page
* Add    : Add initial value function for options (Is executed at each activation of the plugin)
* Change : Move file_exists check for Highslide to the Highslide tab
* Change : Replaced the checkbox and radiobutton images with new

= 0.7.1 =
* Add    : New style for checkbox and radio buttons for the option pages
* Add    : Highslide translation support (GetText)
* Add    : Some configuration options for Highslide
* Change : Use wp_enqueue_script for loading and wp_localize_script for localization
* Remove : Removed file_exists check for lightbox library, because the files are already built into the package. (General option page)
* Remove : Highslide IE6 support

= 0.7 =
* Changed look and feel of the option page
* Added support for optional highslide library files (easing_equations.js, highslide-ie6.css);
* Bugfix: Highslide graphics path

= 0.6 =
* Start with creating of an option page
* Added option to de-/activate an effect

= 0.5 =
* Added support for Lightbox (Library slimbox2 is included, but at the moment is no auto image resize to screen-size)
* Read the selected effect from the NGG-Config

= 0.4 =
Changed code design to a modular structure. At the moment only one highslide layout is supportede for every image, but it works with ngg-gallery, ngg-singlepic and ngg-sidebar.

= 0.3 =
* Add support for NGG-Gallery-Tag

= 0.2 =
* Display every NextGen images as single picture.