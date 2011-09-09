=== Iframe ===
Contributors: webvitaly
Plugin URI: http://web-profile.com.ua/wordpress/plugins/iframe/
Tags: iframe, embed, youtube, vimeo, google-map, google-maps
Author URI: http://web-profile.com.ua/wordpress/
Requires at least: 3.0
Tested up to: 3.2
Stable tag: 1.4.0

You can embed iframe with [iframe width="100%" height="480" src="http://vimeo.com/123"] shortcode.

== Description ==

Iframes are needed to embed video from youtube or to embed Google Map or just to embed content from external page.
WordPress removes iframe when you switch from "HTML" to "Visual" tab because of the security reasons.
So you can embed iframe code using this shortcode `[iframe width="100%" height="480" src="http://player.vimeo.com/video/3261363"]`.

= Usage (allowed parameters) =
* width - width of the iframe in pixels `[iframe width="100%" src="http://player.vimeo.com/video/3261363"]` or `[iframe width="640" src="http://player.vimeo.com/video/3261363"]` (by default width="100%");
* height - height of the iframe in pixels `[iframe height="480" src="http://player.vimeo.com/video/3261363"]` (by default height="480");
* src - source of the iframe `[iframe src="http://player.vimeo.com/video/3261363"]` (by default src="");
* frameborder - frameborder parameter of the iframe `[iframe frameborder="0" src="http://player.vimeo.com/video/3261363"]` (by default frameborder="0");
* scrolling - scrolling parameter of the iframe `[iframe scrolling="no" src="http://player.vimeo.com/video/3261363"]` (by default scrolling="no");
* marginheight - marginheight parameter of the iframe `[iframe marginheight="0" src="http://player.vimeo.com/video/3261363"]` (by default marginheight="0");
* marginwidth - marginwidth parameter of the iframe `[iframe marginwidth="0" src="http://player.vimeo.com/video/3261363"]` (by default marginwidth="0");
* allowtransparency - allows to set transparency of the iframe `[iframe allowtransparency="true" src="http://player.vimeo.com/video/3261363"]` (by default allowtransparency="true");
* id - allows to add the id of the iframe `[iframe id="my-id" src="http://player.vimeo.com/video/3261363"]` (by default id="");
* class - allowing to add the class of the iframe `[iframe class="my-class" src="http://player.vimeo.com/video/3261363"]` (by default class="iframe-class");
* same_height_as - allows to set the height of iframe same as target element `[iframe same_height_as="body" src="http://player.vimeo.com/video/3261363"]` or `[iframe same_height_as="div.sidebar"]` or `[iframe same_height_as="div#content"]` (by default same_height_as="");

[Iframe plugin page](http://web-profile.com.ua/wordpress/plugins/iframe/)

[WordPress stuff](http://web-profile.com.ua/wordpress/)

== Changelog ==

= 1.4.0 =
* Adding "same_height_as" parameter;

= 1.3.0 =
* Adding "id" and "class" parameters;

= 1.2.0 =
* Adding "output=embed" fix to Google Map;

= 1.1.0 =
* Parameter allowtransparency added (thanks to Kent);

= 1.0.0 =
* Initial release;

== Installation ==

1. Install plugin and activate it on the Plugins page;
2. Add shortcode `[iframe width="100%" height="480" src="http://player.vimeo.com/video/3261363"]` to page content;