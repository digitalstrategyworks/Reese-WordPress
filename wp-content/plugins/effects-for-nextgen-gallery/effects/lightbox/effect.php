<?php

class Effect implements iEffect{
	
	private $effectPath;
	private $master;
	
	public function __construct( $master ) {
		$this->master = $master;
		$this->effectPath = $this->master->pluginPath . '/effects/' . basename(dirname(__FILE__));
	}
	
	public function addScript(){
		// Deregister other version of the needed scripts
		wp_deregister_script('jquery-easing');
		wp_deregister_script('lightbox');
		
		wp_register_script("jquery-easing", $this->effectPath."/lib/jquery.easing.js", array("jquery"), '1.3');
		wp_register_script("lightbox", $this->effectPath."/lib/slimbox2.js", array("jquery", "jquery-easing"), $this->master->optionsHighslide['effectVersion']);
		
		//Add Config
		if( $this->master->optionsLightbox['customConfigFile'] == null || strlen($this->master->optionsLightbox['customConfigFile']) > 0 ){
			wp_register_script("lightbox-config", $this->effectPath."/lightbox.config.js", array("jquery", "jquery-easing", "lightbox"), EffectsForNextGENGallery::version);
			wp_localize_script("lightbox-config", "lightboxJSConfig", array(
				"loop" => $this->master->optionsLightbox['loop'],
				"overlayOpacity" => $this->master->optionsLightbox['overlayOpacity'],
				"overlayFadeDuration" => $this->master->optionsLightbox['overlayFadeDuration'],
				"resizeDuration" => $this->master->optionsLightbox['resizeDuration'],
				"resizeEasing" => $this->master->optionsLightbox['resizeEasing'],
				"initialWidth" => $this->master->optionsLightbox['initialWidth'],
				"initialHeight" => $this->master->optionsLightbox['initialHeight'],
				"imageFadeDuration" => $this->master->optionsLightbox['imageFadeDuration'],
				"captionAnimationDuration" => $this->master->optionsLightbox['captionAnimationDuration'],
				"counterText" => __("Image {x} of {y}", EffectsForNextGENGallery::i18nDomain)
			));
		}else{
			wp_register_script("lightbox-config", $this->master->optionsLightbox['customConfigFile'], array(), EffectsForNextGENGallery::version);
		}
		
		wp_enqueue_script("jquery");
		wp_enqueue_script("jquery-easing");
		wp_enqueue_script("lightbox");
		wp_enqueue_script("lightbox-config");
	}
	
	public function addStyle(){
		wp_register_style("lightbox", $this->effectPath."/lib/themes/".$this->master->optionsLightbox['theme']."/slimbox2.css", array(), $this->master->optionsHighslide['effectVersion']);
		wp_enqueue_style("lightbox");
	}
	
	public function addLibraries(){
		$this->addScript();
		$this->addStyle();
	}
}

?>