<?php
/*
Plugin Name: Effects for NextGEN Gallery
Plugin URI: http://www.fanninger.at/page/wp-plugin-effects-nextgen-gallery
Description: Advanced wordpress and NextGen Gallery with some extra effects.
Version: 0.9
Author: fanningert
Author URI: http://www.fanninger.at
*/

class EffectsForNextGENGallery {
	const version = '0.8.5';
	const i18nDomain = 'efngg';

	private $pluginName;
	private $library;
	
	public $nggOptions;
	public $options;
	public $optionsHighslide;
	public $optionsLightbox;
	public $pluginPath;
	public $pluginFilePath;
	public $functions;
	
	public $supportedEffect = false;
	
	/**
     * Class Constructor
     */
	public function __construct(){
		$this->options = get_option('efngg');
		$this->optionsHighslide = get_option('efngg_highslide');
		$this->optionsLightbox = get_option('efngg_lightbox');
		
		$this->nggOptions = get_option('ngg_options');
		
		$this->pluginPath = WP_PLUGIN_URL . '/' . basename(dirname(__FILE__));
		$this->pluginFilePath = dirname(__FILE__);
		$this->pluginName = __('Effects for NextGEN Gallery', self::i18nDomain);
		
		$this->loadNeededLibraries();
		
		//Register Install and Deinstall hooks
		register_activation_hook(__FILE__, array(&$this->functions, 'checkOptionValues'));
		
		//add effects
		if($this->supportedEffect && !is_admin()){
			$this->addEffects();
		}
		
		if ( is_admin() ){
			require_once("lib/OptionPage.php");
			
			//Admin-Menu
			$optionObject = new EFNGG_OptionPage(&$this);
			add_action('admin_menu', array(&$optionObject, 'addAdminMenu'));
		}
	}
	
	public function addEffects(){
		$this->library = new Effect( &$this );
		add_action('wp_print_scripts', array(&$this->library, 'addScript'));
		add_action('wp_print_styles', array(&$this->library, 'addStyle'));
	}
	
	public function getNGGEffectQuery(){
		return $this->nggOptions['thumbCode'];
	}
	
	public function loadNeededLibraries(){
		include_once($this->pluginFilePath."/lib/effect.php");
		include_once($this->pluginFilePath."/lib/functions.php");
		
		//Load function class
		$this->functions = new EFNG_Functions(&$this);
		
		if( ( ( $this->nggOptions['thumbEffect'] == 'highslide' && $this->optionsHighslide['license'] == 1 ) || $this->nggOptions['thumbEffect'] == 'lightbox' ) && $this->options[ ($this->nggOptions['thumbEffect'] . "_state") ] == 1 ){
			require_once("effects/" . $this->nggOptions['thumbEffect'] . "/effect.php");
			$this->supportedEffect = true;
		}else{
			$this->supportedEffect = false;
		}
	}
}

//i18n
load_plugin_textdomain('efngg', 'wp-content/plugins/' . basename(dirname(__FILE__)) . '/lang/');

new EffectsForNextGENGallery();
?>