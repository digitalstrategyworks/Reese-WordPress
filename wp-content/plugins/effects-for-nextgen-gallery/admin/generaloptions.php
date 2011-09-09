<div class="wrap">
	<?php screen_icon(); ?>
	<h2><?php _e('General options', EffectsForNextGENGallery::i18nDomain); ?></h2>
	<form method="post" action="options.php">
		<?php settings_fields('efngg_generaloptions'); ?>
		
		<ul class="subsubsub"> 
			<li><a href="?page=efngg" class="current"><?php _e('General options', EffectsForNextGENGallery::i18nDomain); ?></a> | </li> 
			<li><a href="?page=efngg&tab=effect"><?php _e('Effect options', EffectsForNextGENGallery::i18nDomain); ?></a> | </li> 
			<li><a href="?page=efngg&tab=about"><?php _e('About', EffectsForNextGENGallery::i18nDomain); ?></a></li> 
		</ul>
		<br class="clear" />
		
		<!-- Prüfung der Highslide-Bibliotheken -->
		
		
		<h3><?php _e('de-/activate effects', EffectsForNextGENGallery::i18nDomain); ?></h3>
		<table class="widefat group" style="width: 30em;">
			<thead>
				<tr>
					<th scope="col">&#160;</th>
					<th scope="col"><?php _e('State', EffectsForNextGENGallery::i18nDomain); ?></th>
					<th scope="col"><?php _e('NGG active effect', EffectsForNextGENGallery::i18nDomain); ?></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
	            	<th scope="row"><?php _e('No effect', EffectsForNextGENGallery::i18nDomain); ?></th>
	            	<td><span class="icon_cross"></span></td>
	            	<td><input type="radio" name="nggeffect" value="none" <?php checked('none', $this->master->nggOptions['thumbEffect']); ?> disabled="disabled" /></td>
	            	<td></td>
	            </tr>
	            <tr>
	            	<th scope="row">Thickbox</th>
	            	<td><span class="icon_cross"></span></td>
	            	<td><input type="radio" name="nggeffect" value="thickbox" <?php checked('thickbox', $this->master->nggOptions['thumbEffect']); ?> disabled="disabled" /> (WP incl. support)</td>
	            	<td></td>
	            </tr>
	            <tr>
	            	<th scope="row"><a href="http://www.digitalia.be/software/slimbox2" target="_blank" title="<?php _e('Library: Slimbox 2', EffectsForNextGENGallery::i18nDomain); ?>">Lightbox</a></th>
	                <td><input name="efngg[lightbox_state]" type="checkbox" value="1" <?php checked('1', $this->master->options['lightbox_state']); ?> /></td>
	                <td><input type="radio" name="nggeffect" value="lightbox" <?php checked('lightbox', $this->master->nggOptions['thumbEffect']); ?> disabled="disabled" /></td>
	                <td><a href="?page=efngg&tab=effect&effect=lightbox"><span class="icon_tool"></span></a></td>
	            </tr>
				<tr>
					<th scope="row"><a href="http://highslide.com/" target="_blank">Highslide</a></th>
					<td><input name="efngg[highslide_state]" type="checkbox" value="1" <?php checked('1', $this->master->options['highslide_state']); ?> /></td>
					<td><input type="radio" name="nggeffect" value="highslide" <?php checked('highslide', $this->master->nggOptions['thumbEffect']); ?> disabled="disabled" /></td>
					<td><a href="?page=efngg&tab=effect&effect=highslide"><span class="icon_tool"></span></a></td>
	            </tr>
	            <tr>
	            	<th scope="row">Shutter</th>
	            	<td><span class="icon_cross"></span></td>
	            	<td><input type="radio" name="nggeffect" value="shutter" <?php checked('shutter', $this->master->nggOptions['thumbEffect']); ?> disabled="disabled" /> (NGG incl. support)</td>
	            	<td></td>
	            </tr>
	            <tr>
	            	<th scope="row"><?php _e('Custom', EffectsForNextGENGallery::i18nDomain); ?></th>
	            	<td><span class="icon_check"></span></td>
	            	<td><input type="radio" name="nggeffect" value="custom" <?php checked('custom', $this->master->nggOptions['thumbEffect']); ?> disabled="disabled" /></td>
	            	<td></td>
	            </tr>
	    	</tbody>
		</table>
		<h3><?php _e('Custom effects', EffectsForNextGENGallery::i18nDomain); ?></h3>
		<table class="widefat" style="width: 30em;">
			<thead>
				<tr>
					<th scope="col">&#160;</th>
					<th scope="col"><?php _e('State', EffectsForNextGENGallery::i18nDomain); ?></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
	            	<th scope="row"><?php _e('No effect', EffectsForNextGENGallery::i18nDomain); ?></th>
	            	<td><input name="efngg[custom_state]" type="radio" value="none" <?php checked('none', $this->master->options['custom_state']); ?> /></td>
	            	<td></td>
	            </tr>
	    	</tbody>
		</table>
		
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
</div>