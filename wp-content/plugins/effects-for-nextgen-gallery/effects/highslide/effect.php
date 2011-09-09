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
		wp_deregister_script('highslide');
		wp_deregister_script('easing-equations');
		
		wp_register_script("highslide", $this->effectPath."/lib/highslide-full.packed.js", array(), $this->master->optionsHighslide['effectVersion']);
		if(file_exists(dirname(__FILE__)."/lib/easing_equations.js")){
			wp_register_script("easing-equations", $this->effectPath."/lib/easing_equations.js", array(), EffectsForNextGENGallery::version);
		}
		
		//Add Config
		if( $this->master->optionsHighslide['customConfigFile'] == null || strlen($this->master->optionsHighslide['customConfigFile']) > 0 ){
			wp_register_script("highslide-config", $this->effectPath."/highslide.config.js", array(), EffectsForNextGENGallery::version);
			wp_localize_script("highslide-config", "efnggHighslideJSConfig", array(
				"graphicsDir" => $this->effectPath."/lib/themes/".$this->master->optionsHighslide['theme']."/graphics/",
				"align" => $this->master->optionsHighslide['align'],
				"showCredits" => (($this->master->optionsHighslide['showCredits'] == 1)? '1' : '0'),
				"blockRightClick" => (($this->master->optionsHighslide['blockRightClick'] == 1)? '1' : '0'),
				"easing" => $this->master->optionsHighslide['easing'],
				"easingClose" => $this->master->optionsHighslide['easingClose'],
				"dimmingOpacity" => $this->master->optionsHighslide['dimmingOpacity'],
				"dimmingDuration" => $this->master->optionsHighslide['dimmingDuration'],
				"numberPosition" => $this->master->optionsHighslide['numberPosition'],
				"outlineType" => $this->master->optionsHighslide['outlineType']
			));
		}else{
			wp_register_script("highslide-config", $this->master->optionsHighslide['customConfigFile'], array(), EffectsForNextGENGallery::version);
		}
		
		//Add Highslide Translation
		wp_register_script("highslide-translation", $this->effectPath."/highslide.translation.js", array(), EffectsForNextGENGallery::version);
		wp_localize_script("highslide-translation", "efnggHighslideTranslation", array(
			"cssDirection" => __("ltr", EffectsForNextGENGallery::i18nDomain),
			"loadingText" => __("Loading..", EffectsForNextGENGallery::i18nDomain),
			"loadingTitle" => __("Click to cancel", EffectsForNextGENGallery::i18nDomain),
			"focusTitle" => __("Click to bring to front", EffectsForNextGENGallery::i18nDomain),
			"fullExpandTitle" => __("Expand to actual size (f)", EffectsForNextGENGallery::i18nDomain),
			"fullExpandText" => __("Full size", EffectsForNextGENGallery::i18nDomain),
			"creditsText" => __("Powered by <i>Highslide JS</i>", EffectsForNextGENGallery::i18nDomain),
			"creditsTitle" => __("Go to the Highslide JS homepage", EffectsForNextGENGallery::i18nDomain),
			"previousText" => __("Previous", EffectsForNextGENGallery::i18nDomain),
			"previousTitle" => __("Previous (arrow left)", EffectsForNextGENGallery::i18nDomain),
			"nextText" => __("Next", EffectsForNextGENGallery::i18nDomain),
			"nextTitle" => __("Next (arrow right)", EffectsForNextGENGallery::i18nDomain),
			"moveTitle" => __("Move", EffectsForNextGENGallery::i18nDomain),
			"moveText" => __("Move", EffectsForNextGENGallery::i18nDomain),
			"closeText" => __("Close", EffectsForNextGENGallery::i18nDomain),
			"closeTitle" => __("Close (esc)", EffectsForNextGENGallery::i18nDomain),
			"resizeTitle" => __("Resize", EffectsForNextGENGallery::i18nDomain),
			"playText" => __("Play", EffectsForNextGENGallery::i18nDomain),
			"playTitle" => __("Play slideshow (spacebar)", EffectsForNextGENGallery::i18nDomain),
			"pauseText" => __("Pause", EffectsForNextGENGallery::i18nDomain),
			"pauseTitle" => __("Pause slideshow (spacebar)", EffectsForNextGENGallery::i18nDomain),
			"number" => __("Image %1 of %2", EffectsForNextGENGallery::i18nDomain),
			"restoreTitle" => __("Click to close image, click and drag to move. Use arrow keys for next and previous.", EffectsForNextGENGallery::i18nDomain)
		));
		
		wp_enqueue_script("highslide");
		if(file_exists(dirname(__FILE__)."/lib/easing_equations.js")){
			wp_enqueue_script("easing-equations");
		}
		wp_enqueue_script("highslide-config");
		wp_enqueue_script("highslide-translation");
	}
	
	public function addStyle(){
		wp_register_style("highslide", $this->effectPath."/lib/highslide.css", array(), $this->master->optionsHighslide['effectVersion']);
		wp_register_style("highslide-theme", $this->effectPath."/lib/themes/".$this->master->optionsHighslide['theme']."/theme.css", array("highslide"), EffectsForNextGENGallery::version);
		wp_register_style("highslide-config", $this->effectPath."/lib/highslide-config.css", array("highslide", "highslide-theme"), EffectsForNextGENGallery::version);
		
		wp_enqueue_style("highslide");
		wp_enqueue_style("highslide-theme");
		wp_enqueue_style("highslide-config");
	}
	
	public function addLibraries(){
		$this->addScript();
		$this->addStyle();
	}
}
?>