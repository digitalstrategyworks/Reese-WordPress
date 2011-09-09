=== Yahoo! Media Player ===
Contributors: Max Engel
Homepage: http://www.8bitkid.com/
Tags: ymp, yahoomediaplayer, yahoo, mp3, media, youtube, amazon, 8bitkid
Requires at least: 2.0.2
Tested up to: 3.1
Stable tag: 1.3

Embeds the Yahoo! Media Player music plugin into your site to play back media links (music and video) and monetize purchases via Amazon.

== Description ==
The Yahoo! Media Player plugin embeds a media player on your page in a collapsible drawer.  This player allows your users to play embedded links on your page to music files, YouTube videos, and Yahoo! movie pages.

Also, you can provide an Amazon Affiliate Code to monetize purchases made via the plugin.

You can find more information on the player at: http://mediaplayer.yahoo.com/beta/

== Installation ==
1. unzip the file
2. drag the created folder it into: wp-content/plugins
3. activate the plugin from the 'Plugins' tab by selecting the 'Yahoo! Media Player'
4. choose where the code should be placed (header or footer). placement in the footer may improve page load times, but may not work with certain themes.
5. change the version of the player through the 'Yahoo! Media Player' section under 'Options' (optional)
6. enter in your Amazon affiliate ID (optional)
7. add audio links to your page. for example, something like:
	* <code><a href="http://mediaplayer.yahoo.com/example3.mp3">Yodel (mp3 link)</a></code>
	* <code><a href="http://movies.yahoo.com/movie/1810096458/info">Tron (Yahoo! Movie link)</a></code>
	* <code><a href="http://www.youtube.com/watch?v=i56XeM0-b8Y">Zoetrope (YouTube link)</a></code>
8. the player will detect these audio links, render a play button next to the media, and include the media in the playlist
9. enjoy :-)


== Changelog ==
= v1.3 =
* added option to enable autoplay (off by default)
* upgraded to the latest beta version of the Yahoo! Media Player (on by default) which allows video links

= v1.2 =
* created the option to choose the destination for the javascript insertion (header or footer) to fix some compatibility issues with certain themes

= v1.1 =
* changed the header insertion method for the Amazon meta tag info to get of rid a bug with certain themes

= v1.0 =
* created field in "options" page to allow for the input of an Amazon Affiliate ID
* Amazon affiliate ID will be inserted as meta-data into the header to allow "buy" links from the player to be monetized

= v0.4 =
* fixed a bug that caused an error when trying to clear the variables when the plugin is deactivated

= v0.3 =
* rewrote the entire plugin!
* now the plugin has an options page to allow you to switch to the latest (and possibly buggy) build of the player
* now you only need to install a single file

= v0.2 =
* changed names of calls/files to be consistent with Yahoo! (no longer references "Goose")
* minor bugfixes
* created instructions
* added GPL

== Screenshots ==
1. The player lives in a collapsible drawer at the bottom of the screen.
2. When the "Beta" version is selected, the player can play video inline as well.