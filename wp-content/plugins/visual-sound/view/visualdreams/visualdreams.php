$options = get_option('visualsound_options');

<div style="height: 580px; width: 100%;" class="iframe-wrapper">
    <iframe id="visualinline" name="visualinline" onload="iFrameHeight('visualinline')" align="top" width="100%" height="100%" scrolling="auto" frameborder="0" src="<?php echo 'http://api.artistplug.net/' . $param_user . '/' . $param_loc ?>" width="100%" height="<?php echo $options['iheight']?>">
      Please upgrade your browser or <a href="http://visualdreams.be/<?php echo $param_user . '/' . $param_loc ?>">go to <?php echo $param_user?>!</a>
    </iframe>
</div>
<p align="right"><font size="1" color="#999999">Warning: This is an early betatest of the <a href="http://visualdreams.be">VisualDreams.be</a>/<a href="http://visualdreams.be/<?php echo $param_user . '/' . $param_loc . '">' . $param_user . '</a>'?> (web API)</font></p>