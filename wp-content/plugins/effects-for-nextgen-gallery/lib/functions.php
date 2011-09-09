<?php

class EFNG_Functions{
	
	private $master;
	
	public function __construct($master){
		$this->master = $master;
	}
	
	public function checkOptionValues(){
		/* General options */
		if($this->master->options['custom_state'] == null){
			$this->master->options['custom_state'] = $this->getInitialOptionValue("general", "custom_state");
		}
		
		/* Highslide options */
		if($this->master->optionsHighslide['license'] == null){
			$this->master->optionsHighslide['license'] = $this->getInitialOptionValue("highslide", "license");
		}
		if($this->master->optionsHighslide['effectName'] == null){
			$this->master->optionsHighslide['effectName'] = $this->getInitialOptionValue("highslide", "effectName");
		}
		if($this->master->optionsHighslide['effectVersion'] == null){
			$this->master->optionsHighslide['effectVersion'] = $this->getInitialOptionValue("highslide", "effectVersion");
		}
		if($this->master->optionsHighslide['theme'] == null){
			$this->master->optionsHighslide['theme'] = $this->getInitialOptionValue("highslide", "theme");
		}
		if($this->master->optionsHighslide['align'] == null){
			$this->master->optionsHighslide['align'] = $this->getInitialOptionValue("highslide", "align");
		}
		if($this->master->optionsHighslide['outlineType'] == null){
			$this->master->optionsHighslide['outlineType'] = $this->getInitialOptionValue("highslide", "outlineType");
		}
		if($this->master->optionsHighslide['showCredits'] == null){
			$this->master->optionsHighslide['showCredits'] = $this->getInitialOptionValue("highslide", "showCredits");
		}
		if($this->master->optionsHighslide['blockRightClick'] == null){
			$this->master->optionsHighslide['blockRightClick'] = $this->getInitialOptionValue("highslide", "blockRightClick");
		}
		if($this->master->optionsHighslide['easing'] == null){
			$this->master->optionsHighslide['easing'] = $this->getInitialOptionValue("highslide", "easing");
		}
		if($this->master->optionsHighslide['easingClose'] == null){
			$this->master->optionsHighslide['easingClose'] = $this->getInitialOptionValue("highslide", "easingClose");
		}
		if($this->master->optionsHighslide['dimmingOpacity'] == null){
			$this->master->optionsHighslide['dimmingOpacity'] = $this->getInitialOptionValue("highslide", "dimmingOpacity");
		}
		if($this->master->optionsHighslide['dimmingDuration'] == null){
			$this->master->optionsHighslide['dimmingDuration'] = $this->getInitialOptionValue("highslide", "dimmingDuration");
		}
		if($this->master->optionsHighslide['numberPosition'] == null){
			$this->master->optionsHighslide['numberPosition'] = $this->getInitialOptionValue("highslide", "numberPosition");
		}
		
		/* Lightbox options */
		if($this->master->optionsLightbox['effectName'] == null){
			$this->master->optionsLightbox['effectName'] = $this->getInitialOptionValue("lightbox", "effectName");
		}
		if($this->master->optionsLightbox['effectVersion'] == null){
			$this->master->optionsLightbox['effectVersion'] = $this->getInitialOptionValue("lightbox", "effectVersion");
		}
		if($this->master->optionsLightbox['theme'] == null){
			$this->master->optionsLightbox['theme'] = $this->getInitialOptionValue("lightbox", "theme");
		}
		if($this->master->optionsLightbox['loop'] == null){
			$this->master->optionsLightbox['loop'] = $this->getInitialOptionValue("lightbox", "loop");
		}
		if($this->master->optionsLightbox['overlayOpacity'] == null){
			$this->master->optionsLightbox['overlayOpacity'] = $this->getInitialOptionValue("lightbox", "overlayOpacity");
		}
		if($this->master->optionsLightbox['overlayFadeDuration'] == null){
			$this->master->optionsLightbox['overlayFadeDuration'] = $this->getInitialOptionValue("lightbox", "overlayFadeDuration");
		}
		if($this->master->optionsLightbox['resizeDuration'] == null){
			$this->master->optionsLightbox['resizeDuration'] = $this->getInitialOptionValue("lightbox", "resizeDuration");
		}
		if($this->master->optionsLightbox['resizeEasing'] == null){
			$this->master->optionsLightbox['resizeEasing'] = $this->getInitialOptionValue("lightbox", "resizeEasing");
		}
		if($this->master->optionsLightbox['initialWidth'] == null){
			$this->master->optionsLightbox['initialWidth'] = $this->getInitialOptionValue("lightbox", "initialWidth");
		}
		if($this->master->optionsLightbox['initialHeight'] == null){
			$this->master->optionsLightbox['initialHeight'] = $this->getInitialOptionValue("lightbox", "initialHeight");
		}
		if($this->master->optionsLightbox['imageFadeDuration'] == null){
			$this->master->optionsLightbox['imageFadeDuration'] = $this->getInitialOptionValue("lightbox", "imageFadeDuration");
		}
		if($this->master->optionsLightbox['captionAnimationDuration'] == null){
			$this->master->optionsLightbox['captionAnimationDuration'] = $this->getInitialOptionValue("lightbox", "captionAnimationDuration");
		}
		
		/* Save */
		update_option("efngg", $this->master->options);
		update_option("efngg_highslide", $this->master->optionsHighslide);
		update_option("efngg_lightbox", $this->master->optionsLightbox);
	}
	
	public function getInitialOptionValue($namespace, $name){
		switch($namespace){
			case "general":
				switch($name){
					case "custom_state":
						return "none";
				}
				break;
			case "highslide":
				switch($name){
					case "license":
						return 0;
					case "effectName":
						return "Highslide JS";
					case "effectVersion":
						return "4.1.8";
					case "theme":
						return "default";
					case "outlineType":
						return "null";
					case "numberPosition":
						return "null";
					case "align":
						return "center";
					case "showCredits":
						return 1;
					case "blockRightClick":
						return 1;
					case "easing":
						return "easeInQuad";
					case "easingClose":
						return "easeInQuad";
					case "dimmingOpacity":
						return 0.5;
					case "dimmingDuration":
						return 0;
				}
				break;
			case "lightbox":
				switch($name){
					case "effectName":
						return "Slimbox2";
					case "effectVersion":
						return "2.03";
					case "theme":
						return "default";
					case "loop":
						return 0;
					case "overlayOpacity":
						return 0.8;
					case "overlayFadeDuration":
						return 400;
					case "resizeDuration":
						return 400;
					case "resizeEasing":
						return "jswing";
					case "initialWidth":
						return 250;
					case "initialHeight":
						return 250;
					case "imageFadeDuration":
						return 400;
					case "captionAnimationDuration":
						return 400;
				}
				break;
		}
	}
}

?>