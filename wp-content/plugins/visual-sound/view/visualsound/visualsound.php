<?php
   $options = get_option('visualsound_options');
   if ($options['suplugin']) {
     $visualattribution = '<a href="http://visualsound.be" target="_blank" style="text-decoration:none" title="' . $visualsound_by . ' ">+</a>'; 
   }
   if ($param_mode == "playtrack" || $param_mode == "playset") {
     if ($options['no_caca'] == "true" && !is_single()) { $autostart = "false"; } else { $autostart = "true"; }
   } else { $autostart = "false"; } 
?>

<div style="font-size: 11px;">
<?php if ($param_mode == "artistplugme" || $param_mode == "artistplug.me") { ?>
<div style="height: <?php echo $options['iheight']?>px; width: 100%;" class="iframe-wrapper">
    <iframe id="visualinline" name="visualinline" onload="iFrameHeight('visualinline')" align="top" width="100%" height="100%" scrolling="auto" frameborder="0" src="<?php echo 'http://api.artistplug.net/artist/' . $param_user . '/' . $param_loc ?>" width="100%" height="<?php echo $options['iheight']?>">
      Please upgrade your browser or <a href="http://artistplug.me/artist/<?php echo $param_user . '/' . $param_loc ?>">go to <?php echo $param_user?>!</a>
    </iframe>
    <p align="right">user: <a href="http://artistplug.me/artist/<?php echo $param_user?>" title="goto ArtistPlug.ME page of artist"><?php echo $param_user?></a>/<a href="http://artistplug.me/artist/<?php echo $param_user?>/<?php echo $param_user?>">
    <?php $paramtmp = $param_loc;
    if (strlen($param_loc) > 35) {
    echo substr($param_loc, 0, 30) . "...";
    } else {  echo $param_loc; }?></a> | <?php echo $visualattribution?></div>
<?php } elseif ($param_mode == "visualdreams") { ?>
<div style="height: <?php echo $options['iheight']?>px; width: 100%;" class="iframe-wrapper">
    <iframe id="visualinline" name="visualinline" onload="iFrameHeight('visualinline')" align="top" width="100%" height="100%" scrolling="auto" frameborder="0" src="<?php echo 'http://api.artistplug.net/' . $param_user . '/' . $param_loc ?>" width="100%" height="500">
      Please upgrade your browser or <a href="http://visualdreams.be/<?php echo $param_user . '/' . $param_mode ?>">go to <?php echo $param_user?>!</a>
    </iframe>
    <p align="right">user: <a href="http://visualdreams.be/<?php echo $param_user?>"><?php echo $param_user?></a>/<a href="http://visualdreams.be/<?php echo $param_user?>/<?php echo $param_loc?>"><?php echo $param_loc?></a> | <?php echo $visualattribution?>
</div>
<?php } elseif ($param_mode == "artistplug.net") { ?>
<div style="height: 580px; width: 100%;" class="iframe-wrapper">
    <iframe id="visualinline" name="visualinline" onload="iFrameHeight('visualinline')" align="top" width="100%" height="100%" scrolling="auto" frameborder="0" src="<?php echo 'http://api.artistplug.net/' . $param_user . '/' . $param_loc ?>" width="100%" height="500">
      Please upgrade your browser or <a href="http://artistplug.me/<?php echo $param_user . '/' . $param_mode ?>">go to <?php echo $param_user?>!</a>
    </iframe>
    <p align="right">user: <a href="http://artistplug.me/<?php echo $param_user?>"><?php echo $param_user?></a>/<a href="http://artistplug.me/<?php echo $param_user?>/<?php echo $param_loc?>"><?php echo $param_loc?></a> | <?php echo $visualattribution?>
</div>
<?php } elseif ($param_mode == "dropbox") { ?> 
  <style type='text/css'>a.soundcloud-dropbox:hover {color: white !important; background-color: transparent !important; background-position: -250px 0 !important;}*html a.soundcloud-dropbox {background-image: none !important; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='(http://a1.soundcloud.com/images/dropbox_small_dark.png?021512)', sizingMethod='crop') !important;}/* if you want to have valid HTML, please be so kind and put the style part in the head of your page */</style><a href='http://soundcloud.com/<?php echo $param_user?>/dropbox' style='display: block; margin: 10px auto; background: transparent url(http://a1.soundcloud.com/images/dropbox_small_dark.png?021512) top left no-repeat; color: #D9D9D9; font-size: 10px; height: 30px; padding: 26px 60px 0 12px; width: 127px; text-decoration: none; font-family: "Lucida Grande", Helvetica, Arial, sans-serif; line-height: 1.3em' class='soundcloud-dropbox'>Send <?php echo $param_user?> your track</a>
<?php } elseif ($param_mode == "beta") { ?>
  This place is reserved for betatesting 
<?php echo "01: $param01 02: $param02 03: $param03"?>
<?php } elseif ($param_mode == "track" || $param_mode == "playtrack") { ?>
<!-- visual-sound plug-in player start -->
<object height="81" width="<?php echo $options['appletwidth']?>">  
<param name="movie" value="http://player.soundcloud.com/player.swf?track=<?php echo $param_loc ?>&amp;show_comments=<?php echo $options['appletcomments'] ?>&amp;auto_play=<?php echo $autostart?>&amp;color=<?php echo $options['appletcolor']?>"></param>  
<param name="allowscriptaccess" value="always"></param>  
<param name="wmode" value="transparent"></param>  
<embed allowscriptaccess="always" height="81" src="http://player.soundcloud.com/player.swf?track=<?php echo $param_loc?>&amp;show_comments=<?php echo $options['appletcomments']?>&amp;auto_play=<?php echo $autostart?>&amp;color=<?php echo $options['appletcolor']?>" type="application/x-shockwave-flash" width="<?php echo $options['appletwidth']?>" wmode="transparent"> </embed> 
</object><br clear="all">
<a href="http://soundcloud.com/<?php echo $param_user . '/' . $param_loc?>" title="goto SoundCloud of <?php echo $param_user ?>"><?php echo $param_loc?></a> <span title="<?php echo $visualsound_by?>">by</span>  <a href="http://soundcloud.com/<?php echo $param_user?>"><?php echo $param_user?></a> <?php echo $visualattribution ?>
<!-- visual-sound plug-in player stop -->
<?php } elseif($param_mode == "set" || $param_mode == "playset" && is_single()) { ?>
<!-- visual-sound plug-in player start -->
<div><object height="270" width="<?php echo $options['appletwidth']?>">
<param name="movie" value="http://player.soundcloud.com/player.swf?playlist=<?php echo $param_loc?>&amp;auto_play=<?php echo $autostart?>&amp;color=<?php echo $options['appletcolor']?>&amp;show_comments=<?php echo $options['appletcomments']?>&amp;show_artwork=<?php echo $options['appletartwork']?>&amp;show_playcount=<?php echo $options['appletshowpc']?>"></param>  <param name="wmode" value="transparent"></param>  <param name="allowscriptaccess" value="always"></param>  <embed allowscriptaccess="always" height="270" src="http://player.soundcloud.com/player.swf?playlist=<?php echo $param_loc?>&amp;auto_play=<?php echo $autostart?>&amp;show_comments=<?php echo $options['appletcomments']?>&amp;color=<?php echo $options['appletcolor']?>&amp;show_artwork=<?php echo $options['appletartwork']?>&amp;show_playcount=<?php echo $options['appletshowpc']?>" type="application/x-shockwave-flash" width="<?php echo $options['appletwidth']?>" wmode="transparent"> </embed> </object></div> <div style="padding-top: 5px;">
<a href="http://soundcloud.com/<?php echo $param_user . '/sets/' . $param_loc ?>"><?php echo $param_loc ?></a> <span title="<?php echo $visualsound_by?>">by</span>  <a href="http://soundcloud.com/<?php echo $param_user?>"><?php echo $param_user?></a> <?php echo $visualattribution?></div>
<!-- visual-sound plug-in player stop -->
<?php } elseif ($param_mode == "cloudplayer" || $param_mode == "thecloudplayer") { ?>
<div style="height: <?php echo $options['iheight']?>px; width: 100%;" class="iframe-wrapper">
<iframe id="visualinline" name="visualinline" onload="iFrameHeight('visualinline')" align="top" scrolling="auto" frameborder="0" src="http://www.thecloudplayer.com/#<?php echo $param_loc?>" width="100%" height="<?php echo $options['iheight']?>">
 Please upgrade your browser or <a href="http://www.thecloudplayer.com">go to thecloudplayer.com</a>!
</iframe>
<p align="right"><a href="http://www.thecloudplayer.com" title="open TheCloudPlayer full-screen!" target="_top">thecloudplayer.com</a> | <?php echo $visualattribution?>
<?php } ?>

</div> 
