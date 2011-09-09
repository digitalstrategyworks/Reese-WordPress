<?php

class EFNGG_OptionPage{
	
	private $master;
	
	public function __construct($master){
		$this->master = $master;
		
		add_action( 'admin_init', array(&$this, 'registerOptions') );
		
		add_action('admin_print_scripts', array(&$this, 'load_JScripts') );
		add_action('admin_print_styles', array(&$this, 'load_Styles') );
	}
	
	public function addAdminMenu(){
		add_options_page(__('Effects for NextGEN Gallery', EffectsForNextGENGallery::i18nDomain), __('Effects for NGG', EffectsForNextGENGallery::i18nDomain), 'administrator', 'efngg' , array(&$this, 'displayOptionPage'));
	}
	
	public function load_Styles(){
		if($_REQUEST['page'] == "efngg"){
			wp_register_style("jquery-ui-checkbox", $this->master->pluginPath."/css/jquery-ui-checkbox.css", array(), EffectsForNextGENGallery::version);
			wp_register_style("efngg-custom", $this->master->pluginPath."/css/custom.css", array(), EffectsForNextGENGallery::version);
		
			wp_enqueue_style("jquery-ui-checkbox");
			wp_enqueue_style("efngg-custom");
		}
	}
	
	public function load_JScripts(){
		if($_REQUEST['page'] == "efngg"){
			wp_register_script("jquery-ui", $this->master->pluginPath."/js/jquery.ui.core.js", array("jquery"), "1.7.1");
			wp_register_script("jquery-usermode", $this->master->pluginPath."/js/jquery.usermode.js", array("jquery"), EffectsForNextGENGallery::version);
			wp_register_script("jquery-bind", $this->master->pluginPath."/js/jquery.bind.js", array("jquery"), EffectsForNextGENGallery::version);
			wp_register_script("jquery-ui-checkbox", $this->master->pluginPath."/js/jquery.ui.checkbox.js", array("jquery", "jquery-ui", "jquery-usermode", "jquery-bind"), "1.3");
			wp_register_script("jquery-ui-checkbox-config", $this->master->pluginPath."/js/jquery.ui.checkbox.config.js", array("jquery", "jquery-ui", "jquery-usermode", "jquery-bind", "jquery-ui-checkbox"), "0.1");
			
			wp_enqueue_script("jquery");
			wp_enqueue_script("jquery-ui");
			wp_enqueue_script("jquery-usermode");
			wp_enqueue_script("jquery-bind");
			wp_enqueue_script("jquery-ui-checkbox");
			wp_enqueue_script("jquery-ui-checkbox-config");
		}
	}
	
	public function registerOptions(){
		register_setting( 'efngg_generaloptions', 'efngg' );
		register_setting( 'efngg_highslide', 'efngg_highslide' );
		register_setting( 'efngg_lightbox', 'efngg_lightbox' );
		register_setting( 'efngg_colorbox', 'efngg_colorbox' );
		register_setting( 'efngg_pirobox', 'efngg_pirobox' );
		register_setting( 'efngg_shadowbox', 'efngg_shadowbox' );
	}
	
	public function displayOptionPage(){
		
//		// Reset to initial options
//		if($_REQUEST['myaction'] == "reset"){
//			$this->master->loadInitialOptions( ($_REQUEST['tab'] == "")? "general" : $_REQUEST['tab'] );
//		}
		
		switch($_REQUEST['tab']){
			case 'effect':
				require_once($this->master->pluginFilePath.'/admin/effectoptions.php');
				break;
			case 'about':
				require_once($this->master->pluginFilePath.'/admin/about.php');
				break;
			default:
				require_once($this->master->pluginFilePath.'/admin/generaloptions.php');
				break;
		}
	}
}

?>