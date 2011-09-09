<script>
<!-- 
function efngg_updateView(){
	$formName = jQuery('form#selectEffect select').val();

	if($formName == null || $formName == ""){
		$formName = "highslide";
	}
	
	jQuery('form, div.efngg_license, div.efngg_version').hide();
	jQuery('form#selectEffect, form#'+$formName+', div#license_'+$formName+', div#version_'+$formName).show();
}

jQuery(document).ready(function() {
	efngg_updateView();
});
-->
</script>

<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php _e('Effect options', EffectsForNextGENGallery::i18nDomain); ?></h2>
		
	<ul class="subsubsub"> 
		<li><a href="?page=efngg"><?php _e('General options', EffectsForNextGENGallery::i18nDomain); ?></a> | </li> 
		<li><a href="?page=efngg&tab=effect" class="current"><?php _e('Effect options', EffectsForNextGENGallery::i18nDomain); ?></a> | </li> 
		<li><a href="?page=efngg&tab=about"><?php _e('About', EffectsForNextGENGallery::i18nDomain); ?></a></li> 
	</ul>
	<br class="clear" />
	
	<form id="selectEffect" action="options-general.php" method="get">
		<input name="page" type="hidden" value="efngg" />
		<input name="tab" type="hidden" value="effect" />
		<select name="effect" onchange="javascript:jQuery('form#selectEffect').submit();">
			<option value="highslide" <?php echo ($_REQUEST['effect'] == null || $_REQUEST['effect'] == 'highslide')? " selected=\"selected\"" : "" ; ?>>Highslide JS</option>
			<option value="lightbox" <?php echo ($_REQUEST['effect'] == 'lightbox')? " selected=\"selected\"" : "" ; ?>>Lightbox</option>
		</select>
	</form>
		
	<form id="highslide" method="post" action="options.php">
		<?php settings_fields('efngg_highslide'); ?>
		
		<?php if($this->master->optionsHighslide['license'] != 1){ ?>
		<div id="license_highslide" class="error efngg_license">
			<div style="width: 88px; float: left; padding-right: 5px;">
				<img src="<?php echo $this->master->pluginPath."/effects/highslide/lib/"; ?>cc_license.png" />
			</div>
			<div>
				<?php _e("Highslide JS is licensed under a <a href=\"http://creativecommons.org/licenses/by-nc/2.5/\" target=\"_blank\">Creative Commons Attribution-NonCommercial 2.5 License</a>. This means you need the author's permission to use Highslide JS on commercial websites.", EffectsForNextGENGallery::i18nDomain); ?>
			</div>
			<br class="clear" />
			<?php _e("Read more about on the <a href=\"http://highslide.com/#licence\" target=\"_blank\">license site</a> of Highslide JS.", EffectsForNextGENGallery::i18nDomain); ?><br />
		</div>
		<?php } ?>
		<div id="version_highslide" class="updated efngg_version">
			<table>
				<tbody>
					<tr>
						<th scope="row" align="left"><?php _e("Homepage", EffectsForNextGENGallery::i18nDomain); ?>:</th>
						<td><a href="http://highslide.com" target="_blank">Highslide JS</a></td>
					</tr>
					<tr>
						<th scope="row" align="left"><?php _e("Integrated Version", EffectsForNextGENGallery::i18nDomain); ?>:</th>
						<td>4.1.8</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<table class="form-table">
			<tbody>
				<tr class="form_field">
					<th scope="row"><?php _e('I agree to the license condition', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="checkbox" name="efngg_highslide[license]" value="1" <?php checked('1', $this->master->optionsHighslide['license']); ?> /></td>
				</tr>
			</tbody>
		</table>
			
		<h3><?php _e('Supported config parameters', EffectsForNextGENGallery::i18nDomain); ?></h3>
		<table class="form-table">
			<tbody>
				<tr class="form_field">
					<th scope="row"><?php _e('Theme', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><select name="efngg_highslide[theme]">
						<option value="default" <?php selected('default', $this->master->optionsHighslide['theme']); ?>><?php _e('Default', EffectsForNextGENGallery::i18nDomain); ?></option>
					</select></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Align', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><select size="1" name="efngg_highslide[align]">
						<option value="auto" <?php selected('auto', $this->master->optionsHighslide['align']); ?>><?php _e('Auto', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="center" <?php selected('center', $this->master->optionsHighslide['align']); ?>><?php _e('Center', EffectsForNextGENGallery::i18nDomain); ?></option>
					</select></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Show credits', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="checkbox" name="efngg_highslide[showCredits]" value="1" <?php checked('1', $this->master->optionsHighslide['showCredits']); ?> /></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Block right click', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="checkbox" name="efngg_highslide[blockRightClick]" value="1" <?php checked('1', $this->master->optionsHighslide['blockRightClick']); ?> /></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Page number', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><select name="efngg_highslide[numberPosition]">
						<option value="null" <?php selected('null', $this->master->optionsHighslide['numberPosition']); ?>><?php _e('Disable', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="heading" <?php selected('heading', $this->master->optionsHighslide['numberPosition']); ?>><?php _e('Heading', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="caption" <?php selected('caption', $this->master->optionsHighslide['numberPosition']); ?>><?php _e('Caption', EffectsForNextGENGallery::i18nDomain); ?></option>
					</select></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Graphic outline', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><select name="efngg_highslide[outlineType]">
						<option value="null" <?php selected('null', $this->master->optionsHighslide['outlineType']); ?>><?php _e('Disable', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="rounded-white" <?php selected('rounded-white', $this->master->optionsHighslide['outlineType']); ?>><?php _e('rounded-white', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="outer-glow" <?php selected('outer-glow', $this->master->optionsHighslide['outlineType']); ?>><?php _e('outer-glow', EffectsForNextGENGallery::i18nDomain); ?></option>
					</select></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Expand effect', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><select size="1" name="efngg_highslide[easing]">
						<option value="easeInQuad" <?php selected('easeInQuad', $this->master->optionsHighslide['easing']); ?>>easeInQuad (Default)</option>
						<option value="linearTween" <?php selected('linearTween', $this->master->optionsHighslide['easing']); ?>>linearTween</option>
						<option value="easeInCirc" <?php selected('easeInCirc', $this->master->optionsHighslide['easing']); ?>>easeInCirc</option>
						<option value="easeInBack" <?php selected('easeInBack', $this->master->optionsHighslide['easing']); ?>>easeInBack</option>
						<option value="easeOutBack" <?php selected('easeOutBack', $this->master->optionsHighslide['easing']); ?>>easeOutBack</option>
					</select>
					<p class="description"><?php _e('Require <a href="http://www.robertpenner.com/easing/" target="_blank">Easing Equations</a>', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Contract effect', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><select size="1" name="efngg_highslide[easingClose]">
						<option value="easeInQuad" <?php selected('easeInQuad', $this->master->optionsHighslide['easingClose']); ?>>easeInQuad (Default)</option>
						<option value="linearTween" <?php selected('linearTween', $this->master->optionsHighslide['easingClose']); ?>>linearTween</option>
						<option value="easeInCirc" <?php selected('easeInCirc', $this->master->optionsHighslide['easingClose']); ?>>easeInCirc</option>
						<option value="easeInBack" <?php selected('easeInBack', $this->master->optionsHighslide['easingClose']); ?>>easeInBack</option>
						<option value="easeOutBack" <?php selected('easeOutBack', $this->master->optionsHighslide['easingClose']); ?>>easeOutBack</option>
					</select>
					<p class="description"><?php _e('Require <a href="http://www.robertpenner.com/easing/" target="_blank">Easing Equations</a>', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Opacity of the dimming', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_highslide[dimmingOpacity]" value="<?php echo $this->master->optionsHighslide['dimmingOpacity'] ?>" class="small-text" />
					<p class="description">(<?php _e('A float between 0 and 1', EffectsForNextGENGallery::i18nDomain); ?>)</p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Duration of the dimming', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_highslide[dimmingDuration]" value="<?php echo $this->master->optionsHighslide['dimmingDuration'] ?>" class="small-text" />
					<p class="description"><?php _e('milliseconds', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
			</tbody>
		</table>
		
		<h3><?php _e('Custom config file', EffectsForNextGENGallery::i18nDomain); ?></h3>
		<table class="form-table">
			<tbody>
				<tr class="form_field">
					<th scope="row"><?php _e('Absolute file path', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_highslide[customConfigFile]" value="<?php $this->master->optionsHighslide['customConfigFile'] ?>" class="regular-text code" style="width: 50em;" /></td>
				</tr>
			</tbody>
		</table>
		
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
	
	<form id="lightbox" method="post" action="options.php">
		<?php settings_fields('efngg_lightbox'); ?>
		
		<div id="version_lightbox" class="updated efngg_version">
			<table>
				<tbody>
					<tr>
						<th scope="row" align="left"><?php _e("Homepage", EffectsForNextGENGallery::i18nDomain); ?>:</th>
						<td><a href="http://code.google.com/p/slimbox/" target="_blank">Slimbox 2</a></td>
					</tr>
					<tr>
						<th scope="row" align="left"><?php _e("Integrated Version", EffectsForNextGENGallery::i18nDomain); ?>:</th>
						<td>2.03</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<h3><?php _e('Supported config parameters', EffectsForNextGENGallery::i18nDomain); ?></h3>
		<table class="form-table">
			<tbody>
				<tr class="form_field">
					<th scope="row"><?php _e('Theme', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><select name="efngg_lightbox[theme]">
						<option value="default" <?php selected('default', $this->master->optionsLightbox['theme']); ?>><?php _e('Default', EffectsForNextGENGallery::i18nDomain); ?></option>
					</select></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Loop Images', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="checkbox" id="lightboxLoop" name="efngg_lightbox[loop]" value="1" <?php checked('1', $this->master->optionsLightbox['loop']); ?>" /><br/>
					<p class="description"><?php _e('If set to true, allows the user to navigate between the first and last images of a Slimbox gallery, when there is more than one image to display.', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Overlay Opacity', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_lightbox[overlayOpacity]" value="<?php echo $this->master->optionsLightbox['overlayOpacity'] ?>" class="small-text" />
					<p class="description"><?php _e('The level of opacity of the background overlay. 1 Is opaque, 0 is completely transparent. Default is 0.8.', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Overlay Fade Duration', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_lightbox[overlayFadeDuration]" value="<?php echo $this->master->optionsLightbox['overlayFadeDuration'] ?>" class="small-text" />
					<p class="description"><?php _e('The duration of the overlay fade-in and fade-out animations, in milliseconds. Set it to 1 to disable the overlay fade effects. Default is 400.', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Resize Duration', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_lightbox[resizeDuration]" value="<?php echo $this->master->optionsLightbox['resizeDuration'] ?>" class="small-text" />
					<p class="description"><?php _e('The duration of the resize animation for width and height, in milliseconds. Set it to 1 to disable resize animations. Default is 400.', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Resize Easing', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><select name="efngg_lightbox[resizeEasing]">
						<option value="jswing" <?php selected('jswing', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('jswing', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInQuad" <?php selected('easeInQuad', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInQuad', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutQuad" <?php selected('easeOutQuad', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutQuad', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutQuad" <?php selected('easeInOutQuad', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutQuad', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInCubic" <?php selected('easeInCubic', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInCubic', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutCubic" <?php selected('easeOutCubic', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutCubic', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutCubic" <?php selected('easeInOutCubic', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutCubic', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInQuart" <?php selected('easeInQuart', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInQuart', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutQuart" <?php selected('easeOutQuart', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutQuart', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutQuart" <?php selected('easeInOutQuart', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutQuart', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInQuint" <?php selected('easeInQuint', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInQuint', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutQuint" <?php selected('easeOutQuint', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutQuint', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutQuint" <?php selected('easeInOutQuint', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutQuint', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInSine" <?php selected('easeInSine', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInSine', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutSine" <?php selected('easeOutSine', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutSine', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutSine" <?php selected('easeInOutSine', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutSine', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInExpo" <?php selected('easeInExpo', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInExpo', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutExpo" <?php selected('easeOutExpo', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutExpo', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutExpo" <?php selected('easeInOutExpo', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutExpo', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInCirc" <?php selected('easeInCirc', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInCirc', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutCirc" <?php selected('easeOutCirc', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutCirc', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutCirc" <?php selected('easeInOutCirc', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutCirc', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInElastic" <?php selected('easeInElastic', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInElastic', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutElastic" <?php selected('easeOutElastic', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutElastic', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutElastic" <?php selected('easeInOutElastic', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutElastic', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInBack" <?php selected('easeInBack', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInBack', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutBack" <?php selected('easeOutBack', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutBack', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutBack" <?php selected('easeInOutBack', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutBack', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInBounce" <?php selected('easeInBounce', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInBounce', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeOutBounce" <?php selected('easeOutBounce', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeOutBounce', EffectsForNextGENGallery::i18nDomain); ?></option>
						<option value="easeInOutBounce" <?php selected('easeInOutBounce', $this->master->optionsLightbox['resizeEasing']); ?>><?php _e('easeInOutBounce', EffectsForNextGENGallery::i18nDomain); ?></option>
					</select>
					<p class="description"><?php _e('Many easings require a longer execution time to look good, so you should adjust the resizeDuration option above as well. Default is jQuery’s built-in default easing, "jswing".', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Initial Width', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_lightbox[initialWidth]" value="<?php echo $this->master->optionsLightbox['initialWidth'] ?>" class="small-text" />
					<p class="description"><?php _e('The initial width of the box, in pixels. Default is 250.', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Initial Height', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_lightbox[initialHeight]" value="<?php echo $this->master->optionsLightbox['initialHeight'] ?>" class="small-text" />
					<p class="description"><?php _e('The initial height of the box, in pixels. Default is 250.', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Image Fade Duration', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_lightbox[imageFadeDuration]" value="<?php echo $this->master->optionsLightbox['imageFadeDuration'] ?>" class="small-text" />
					<p class="description"><?php _e('The duration of the image fade-in animation, in milliseconds. Set it to 1 to disable this effect and make the image appear instantly. Default is 400.', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
				<tr class="form_field">
					<th scope="row"><?php _e('Caption Animation Duration', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_lightbox[captionAnimationDuration]" value="<?php echo $this->master->optionsLightbox['captionAnimationDuration'] ?>" class="small-text" />
					<p class="description"><?php _e('The duration of the caption animation, in milliseconds. Set it to 1 to disable it and make the caption appear instantly. Default is 400.', EffectsForNextGENGallery::i18nDomain); ?></p></td>
				</tr>
			</tbody>
		</table>
		
		<h3><?php _e('Custom config file', EffectsForNextGENGallery::i18nDomain); ?></h3>
		<table class="form-table">
			<tbody>
				<tr class="form_field">
					<th scope="row"><?php _e('Absolute file path', EffectsForNextGENGallery::i18nDomain); ?></th>
					<td><input type="text" name="efngg_lightbox[customConfigFile]" value="<?php $this->master->optionsLightbox['customConfigFile'] ?>" class="regular-text code" style="width: 50em;" /></td>
				</tr>
			</tbody>
		</table>
		
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>