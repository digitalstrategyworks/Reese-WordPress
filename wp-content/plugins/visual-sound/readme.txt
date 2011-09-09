=== Visual Sound ===
Contributors: wildchild
Tags: soundcloud, applet, artistplug, visualdreams, iframe, post, plugin, embed
Donate Link: http://gowildchild.com/donate
Requires at least: 1.3
Tested up to: 2.7.1
Stable tag: trunk

Gets SoundCloud, ArtistPlugme and Visualdreams imported in your blog in no-time
by using a simple command line!

== Description ==

Configure Visual-Sound through your administration interface\settings. 
Choose a provider: soundcloud, visualdreams or visualsound for combined mode.
When supporting the plug-in you'll get a sample widget preview! 

More information can be found at http://visualsound.be

General Visual-Sound plug-in syntax:

[provider mode username location] 

SoundCloud Syntax:

[soundcloud command username location]

examples:

[soundcloud track user location] opens the user/trackname

[soundcloud playtrack user location] autoplay user/trackname

[soundcloud set user location] opens the user/setname

[soundcloud playset user location] autoplay user/setname

[soundcloud dropbox user] dropbox for user

[soundcloud inbox user] inline dropbox for user

VisualDreams Syntax:

[visualdreams command username location/object]

examples:

[visualdreams open user object] opens the user/object or location

[visualdreams license user object] opens licensing for user/object or location

[visualdreams fetch user object] fetches the user/object

[visualdreams identify user object] identifies user through object

VisualMIX Syntax:

[visualmix command username location|object]

VisualMIX examples:

Same commandline as SoundCloud & VisualDreams combined. In further versions there
might be added services or providers.


== Installation ==

1. Download [VisualSound plugin](http://downloads.wordpress.org/plugin/visual-sound.zip)
1. Unzip
1. Copy to your '/wp-content/plugins' directory
1. Activate plugin

You can find full details of installing a plugin on the [plugin installation page](http://codex.wordpress.org/Managing_Plugins)

The new syntax depends on the sound provider. This to keep the operation language as natural as possible towards the end-user using the applet. The pre-v1.0 syntax was a little bit confusing.

the provider can be set through the administration menu.

[provider mode username location] 

VisualSound Compatibility Mode:

This old syntax is only as reference, for up-date purpose or when "visualsound" compatibility mode has been set.

[visualsound user dropbox] opens your SoundCloud dropbox

[visualsound user track name] opens the trackname (use playtrack to autostart)

[visualsound user set name] opens the set (use playset to autostart)

[visualsound user visualdreams location] opens VisualDreams API

[visualsound user artistplugme location] opens ArtistPlug.ME API
