<?php
/*
Plugin Name: WP-prettyPhoto
Plugin URI: https://fusi0n.org/category/wp-prettyphoto
Description: prettyPhoto is a jQuery based lightbox clone. Not only does it support images, it also add support for videos, flash, YouTube, iFrame. It's a full blown media modal box. WP-prettyPhoto embeds those functionalities in WordPress.
Version: 1.6.2
Author: Pier-Luc Petitclerc
Author URI: https://fusi0n.org
Text Domain: wp-prettyphoto
License: http://creativecommons.org/licenses/by/3.0/
*/

class WP_prettyPhoto {

  /**
   * Options array
   * @var array WP-prettyPhoto Options (Since 1.4, this also contains options default and current values and descriptions)
   * @access private
   * @since 1.3
  */
  public $opts = array();

  /**
   * Switch to temporarily enable/disable parsing
   * @var bool status
   * @access public
   * @static
   * @since 1.5
   * @see wppp_shortcode
  */
  static public $status = true;

  /**
   * Class constructor
   * Sets default options, add filters, options page & shortcodes
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @param null
   * @return void
   * @since 1.2
   * @access public
  */
  public function __construct() {
    $this->_buildOptions();
    $wpurl = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__), '', plugin_basename(__FILE__));
    if (!is_admin()) {
      if ($this->wppp_jsreplace == '1') {
        // jQuery - removing to make sure we're using 1.4.4
        wp_deregister_script('jquery');
        wp_register_script('jquery', $wpurl.'js/jquery-1.4.4.min.js', false, '1.4.4');
        wp_enqueue_script('jquery');
      }
      // prettyPhoto JavaScript
      wp_register_script('prettyphoto', $wpurl.'js/jquery.prettyPhoto.js', array('jquery'), '3.1');
      wp_enqueue_script('prettyphoto');
      // prettyPhoto CSS
      wp_register_style('prettyphoto', $wpurl.'css/prettyPhoto.css', false, '3.1', 'screen');
      wp_enqueue_style('prettyphoto');
    }
    else {
      $this->loadLocale(get_locale());
      add_action('admin_init', array(&$this, 'wppp_admin_init'));
      add_action('admin_menu', array(&$this, 'wppp_hooks_admin'));
      add_action('plugin_action_links_'.plugin_basename(__FILE__), array(&$this, 'wppp_plugin_links'));
    }
		if ($this->wppp_usecode  == '1') {
      add_shortcode('ppo', array(&$this, 'wppp_shortcode'));
      add_shortcode('ppg', array(&$this, 'wppp_shortcode'));
    }
		add_action('wp_head', array(&$this, 'wppp_styles'));
    if ($this->_doOutput()) {
      add_filter('the_content', array(&$this, 'wppp_content_hook'), 99, 1);
      add_filter('the_excerpt', array(&$this, 'wppp_content_hook'), 99, 1);
    }
  }

  /**
   * Overload hack
   * @param string $name Function name
   * @param mixed $args Arguments
   * @return null
   * @access public
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @since 1.4
  */
  public function __call($name, $args) {
    if (!function_exists($name) || !method_exists($this, $name)) {
      if (substr($name, 0, 14) == 'wppp_settings_') {
        $setting = str_replace('wppp_settings_', '', $name);
        $this->wppp_settings($setting);
      }
      elseif ((substr($name, 0, 13) == 'wppp_section_') && ($name != 'wppp_section_callback')) {
        $section = str_replace('wppp_section_', '', $name);
        $this->wppp_section_callback($section);
      }
    }
  }

  /**
   * Overloading hack/shortcut to retrieve option value
   * @param string $name Option Name (Key in the array without wppp_ prefix)
   * @return array Option data
   * @access public
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @since 1.4.1
  */
  public function __get($name) {
    $name = (substr($name,0,5) == 'wppp_')? $name : "wppp_$name";
    return get_option($name, $this->opts[$name]['default']);
  }

  /**
   * Produces options output
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @param void
   * @return bool
   * @since 1.3.3
   * @access private
  */
  private function _doOutput() {
    $a = array('wppp_automate_all', 'wppp_automate_img', 'wppp_automate_swf', 'wppp_automate_mov', 'wppp_automate_yt', 'wppp_automate_ext');
    foreach ($a as $i) {
      if ($this->$i == '1') return true;
    }
    return false;
  }

  /** Plugin activation hook used to set default option values
   * @param null
   * @return void
   * @since 1.4
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @access public
  */
  public function wppp_activation_hook() {
    foreach ($this->opts as $k=>$v) {
			if (get_option($k) === false) { add_option($k, $this->opts[$k]['default']); }
    }
  }

  /**
   * Option page (section) registration hook
   * @param void
   * @return null
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @access public
   * @since 1.4
  */
  public function wppp_admin_init() {
    foreach ($this->opts as $optName => $optVal) {
      register_setting('prettyphoto', $optName);
    }
  }

  public function wppp_hooks_admin() {
    add_options_page('WP-prettyPhoto', 'WP-prettyPhoto', 'edit_files', __FILE__, array(&$this, 'wppp_options_page'));
  }

  /**
   * Outputs settings section header text
   * @param null
   * @return void
   * @access public
   * @since 1.4
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @see http://codex.wordpress.org/Settings_API#Adding_Settings_Sections
  */
  public function wppp_section_callback($s=null) {
    switch ($s) {
      case 'automate':
        echo '<p>'.__('Automatic prettyfying options.').'</p>';
      break;
      case 'appearance':
        echo '<p>'.__('Below is a list of the prettyPhoto themes you have installed. To learn more about themeing prettyPhoto, refer to the <a href="http://blog.fusi0n.org/wp-prettyphoto/technical-information-and-usage-instructions#theming" target="_blank">documentation</a>.</p>');
      break;
      case 'technical':
        echo '<p>'.__('Technical settings').'.</p>';
      break;
    }
  }

  private function _getOptionsBySection() {
    $section = array();
    $keys = array_keys($this->opts);
    $count = count($keys);
    for ($i=0;$i<$count;$i++) {
      $sect = $this->opts[$keys[$i]]['section'];
      $section[$sect][] = $keys[$i];
    }
    return $section;
  }

  public function wppp_options_page() {
    $opts = $this->_getOptionsBySection();
    foreach ($opts as $optSect=>$optName) {
			foreach ($optName as $opt) {
				$$optSect .= $this->wppp_settings($opt);
			}
    }
    echo <<<EOHTML
    <div class="wrap">
      <h2>WP prettyPhoto Options</h2>
      <form method="post" action="options.php">
EOHTML;
    $plugin_options = implode(',', array_keys($this->opts));
    $nonce = 	(function_exists('settings_fields'))? settings_fields('prettyphoto') : wp_nonce_field('update-options').'<input type="hidden" name="action" value="update" /><input type="hidden" name="page_options" value="'.$plugin_options.'" />';
    echo <<<EOHTML
        <input type="hidden" name="action" value="update" />
        <h3>Automation</h3>
				{$automate}
        <h3>Appearance</h3>
        {$appearance}
        <h3>Technical</h3>
        {$technical}
        <p class="submit">
          <input type="submit" name="Submit" value="Save Changes" />
        </p>
      </form>
    </div>
EOHTML;
  }

  /**
   * Outputs settings for the settings page
   * I *really* don't like to output directly from a function but apparently there's no other way
   * I'll use include, but it sure as hell ain't prettier. Don't hold it against me.
   * @param null
   * @return void
   * @since 1.4
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
  */
  public function wppp_settings($k) {
    $ret = '';
    $opt = get_option($k);
    if (isSet($this->opts[$k]['values'])) {
      $e = '';
      foreach ($this->opts[$k]['values'] as $childVal) {
        $e .= ($opt == $childVal)? "<option value='$childVal' selected='selected'>$childVal</option>\n" : "<option value='$childVal'>$childVal</option>\n";
      }
      $ret .= '<label for='.$k.'>'.$this->opts[$k]['desc'].'</label> <select name="'.$k.'" id="'.$k.'">'.$e.'</select>';
    }
    else {
      switch ($this->opts[$k]['type']) {
        case 'int':
          $checked = (int)$opt == 1? ' checked="checked"' : '';
        $ret .= '<input type="checkbox" value="1" id="'.$k.'" name="'.$k.'"'.$checked.' /> <label for="'.$k.'">'.$this->opts[$k]['desc'].'</label>';
          break;
        case 'string':
        case 'float':
        case 'double':
        case 'bigint':
          if ($k == 'wppp_callback') {
            $ret .= '<label for="'.$k.'">'.$this->opts[$k]['desc'].'</label><br /><textarea cols="30" rows="10" id="'.$k.'" name="'.$k.'">'.$opt.'</textarea>';
						settings_fields('prettyphoto');
          }
          elseif ($k == 'wppp_picturecallback') {
            $ret .= '<label for="'.$k.'">'.$this->opts[$k]['desc'].'</label><br /><textarea cols="30" rows="10" id="'.$k.'" name="'.$k.'">'.$opt.'</textarea>';
          }
					elseif (strpos($k, 'markup') !== false) {
						$ret .= '<label for="'.$k.'">'.$this->opts[$k]['desc'].'</label><br /><textarea cols="30" rows="10" id="'.$k.'" name="'.$k.'">'.htmlentities($opt).'</textarea>';
					}
          else {
            $ret .= '<label for="'.$k.'">'.$this->opts[$k]['desc'].'</label> <input type="text" value="'.$opt.'" name="'.$k.'" id="'.$k.'">';
          }
          break;
      }
    }
		$ret .= '<br />';
    return $ret;
  }

  /**
   * Adds Settings and Documentation links to plugin's links because people obviously can't find it...
   * Note to self: Never underestimate the power of stupid people in large groups.
   * @param array $links Already present links
   * @return array Links array containing Settings & Documentation
   * @access public
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @since 1.4.2
  */
  public function wppp_plugin_links($links) {
    $additionalLinks = array('<a href="options-general.php?page=wp-prettyphoto/wp-prettyphoto.php">'.__('Settings').'</a>',
                             '<a href="http://forums.no-margin-for-errors.com/?CategoryID=8">'.__('Help').'</a>');
    return array_merge($additionalLinks, $links);
  }

  /**
   * Replaces occurences of $wppp_rel with the prettyPhoto rel hook
   * @param string $content Post/page contents
   * @return string Prettified post/page contents
   * @author Rupert Morris
   * @author Tanin "Regular Expression God"
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @since 1.0
   * @link http://0xtc.com/2008/05/27/auto-lightbox-function.xhtml
   * @access public
  */
  public function wppp_content_hook($content) {
    $fileTypes        = $this->_getFileTypes(array('type'=>'all','context'=>true));
    $pattern          = array();
    $rel              = $this->wppp_rel;
    $pattern[]        = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)($fileTypes)('|\")(.*?)>/i";
    $pattern[]        = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)($fileTypes)('|\")(.*?)(rel=('|\")".$rel."(.*?)('|\"))([ \t\r\n\v\f]*?)((rel=('|\")".$rel."(.*?)('|\"))?)([ \t\r\n\v\f]?)([^\>]*?)>/i";
    if ($this->wppp_automate_yt == '1') { $pattern[] = '/<a(.*?)href=(\'|")(http:\/\/www\.youtube\.com\/watch\?v=[A-Za-z0-9]*)(\'|")(.*?)>/i'; }
    if ($this->wppp_automate_ext == '1') { $pattern[] = '/<a(.*?)href=(\'|")(.*iframe=true.*)(\'|")(.*?)>/i'; }
    return preg_replace_callback($pattern, array(&$this,'_regexCallback'), $content);
  }

  /**
   * Callback function used to detect whether a string contains a link to a _blank target
   * @param array $matches Regular Expression matches from preg_replace()
   * @return bool True if _blank was found in matches, false if it wasn't
   * @global object $post
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @see wppp_content_hook
   * @since 1.2.1
   * @access private
  */
  private function _regexCallback($matches) {
    global $post;
    $rel            = $this->wppp_rel;
    $pattern        = array();
    $replacement    = array();
    $pattern[]      = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)($fileTypes)('|\")(.*?)>/i";
    $pattern[]      = "/<a(.*?)href=('|\")([A-Za-z0-9\/_\.\~\:-]*?)($fileTypes)('|\")(.*?)(rel=('|\")".$rel."(.*?)('|\"))([ \t\r\n\v\f]*?)((rel=('|\")".$rel."(.*?)('|\"))?)([ \t\r\n\v\f]?)([^\>]*?)>/i";
    $replacement[]  = '<a$1href=$2$3$4$5$6 rel="'.$rel.'[g'.$post->ID.']">';
    $replacement[]  = '<a$1href=$2$3$4$5$6$7>';

    if ($this->wppp_automate_yt == '1') {
      $pattern[]    = '/<a(.*?)href=(\'|")(http:\/\/www\.youtube\.com\/watch\?v=[A-Za-z0-9]*)(\'|")(.*?)>/i';
      $pattern[]    = "/<a(.*?)href=('|\")(http:\/\/www\.youtube\.com\/watch\?v=[A-Za-z0-9]*)('|\")(.*?)(rel=('|\")".$rel."(.*?)('|\"))([ \t\r\n\v\f]*?)((rel=('|\")".$rel."(.*?)('|\"))?)([ \t\r\n\v\f]?)([^\>]*?)>/i";
      $replacement[]= '<a$1href=$2$3$4$5 rel="'.$rel.'[g'.$post->ID.']">';
      $replacement[]= '<a$1href=$2$3$4$5$6$7>';
    }
    if ($this->wppp_automate_ext == '1') {
      $pattern[]    = '/<a(.*?)href=(\'|")(.*iframe=true.*)(\'|")(.*?)>/i';
      $pattern[]    = "/<a(.*?)href=('|\")(.*iframe=true.*)(.*?)(rel=('|\")".$rel."(.*?)('|\"))([ \t\r\n\v\f]*?)((rel=('|\")".$rel."(.*?)('|\"))?)([ \t\r\n\v\f]?)([^\>]*?)>/i";
      $replacement[]= '<a$1href=$2$3$4$5 rel="'.$rel.'[g'.$post->ID.']">';
      $replacement[]= '<a$1href=$2$3$4$5$6$7>';
    }
    return !strpos($matches['0'], '_blank')? preg_replace($pattern,$replacement,$matches['0']) : $matches['0'];
  }

  /**
   * Loads gettext localization
   * Translation file (wp-prettyphoto.mo) must be found inside "PLUGIN_DIR/lang/LOCALE_STRING"
   * @param string $locale Locale (fr_FR)
   * @return bool
   * @access private
   * @since 1.4.2
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
  */
  private function loadLocale($locale) {
    $moFile = dirname(__FILE__).'/lang/'.$locale.'/wp-prettyphoto.mo';
    if (is_dir(dirname($moFile))) {
      if (is_readable($moFile)) {
        load_plugin_textdomain('wp-prettyphoto', $moFile);
        return true;
      }
    }
    return false;
  }
  /**
   * Gets file extension(s) associated with media type
   * @param array $opts Options array
   * @param string $opts['type'] Media Type (mov, swf, img or all)
   * @param bool $opts['context'] Validate against configuration
   * @return string Pipe-separated file extension(s)
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @since 1.3
   * @access private
  */
  private function _getFileTypes($opts=array()) {
    switch ($opts['type']) {
      case 'mov':
        return $opts['context']? $this->wppp_automate_mov == '1'? '\.mov' : false : '\.mov';
      break;
      case 'swf':
        return $opts['context']? $this->wppp_automate_swf == '1'? '\.swf' : false : '\.swf';
      break;
      case 'img':
        return $opts['context']? $this->wppp_automate_img == '1'? '\.bmp|\.gif|\.jpg|\.jpeg|\.png' : false : '\.bmp|\.gif|\.jpg|\.jpeg|\.png';
      break;
      case 'all':
      default:
        return $this->_getFileTypes(array('type'=>'mov', $opts['context'])).'|'.$this->_getFileTypes(array('type'=>'swf', $opts['context'])).'|'.$this->_getFileTypes(array('type'=>'img', $opts['context']));
    }
  }

  /**
   * Adds prettyPhoto in the page that is being viewed
   * @param null
   * @return void
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @example add_action('wp_head', 'wppp_styles');
   * @link http://www.no-margin-for-errors.com/projects/prettyPhoto/#howtouse
   * @since 1.0
   * @access public
  */
  public function wppp_styles() {
    $wppp_rel             = $this->wppp_rel;
    $wppp_speed           = $this->wppp_speed;
    $wppp_padding         = $this->wppp_padding;
    $wppp_opacity         = $this->wppp_opacity;
    $wppp_title           = $this->wppp_title == '1'? 'true' : 'false';
    $wppp_resize          = $this->wppp_resize == '1'? 'true' : 'false';
    $wppp_counterlabel    = $this->wppp_counterlabel;
    $wppp_theme           = $this->wppp_theme;
    $wppp_callback        = $this->wppp_callback;
    $wppp_hideflash       = $this->wppp_hideflash == '1'? 'true' : 'false';
    $wppp_modal           = $this->wppp_modal == '1'? 'true' : 'false';
    $wppp_picturecallback = $this->wppp_picturecallback;
    $wppp_wmode		  = $this->wppp_wmode;
    $wppp_autoplay	  = $this->wppp_autoplay == '1'? 'true' : 'false';
    $wppp_markup	  = $this->wppp_markup;
    $wppp_imarkup	  = $this->wppp_imarkup;
    $wppp_fmarkup	  = $this->wppp_fmarkup;
    $wppp_qmarkup	  = $this->wppp_qmarkup;
    $wppp_frmmarkup	  = $this->wppp_frmmarkup;
    $wppp_inmarkup	  = $this->wppp_inmarkup;
    $output = <<<EOHTML
      <script type="text/javascript" charset="utf-8">
        /* <![CDATA[ */
        jQuery(document).ready(function($) {
          $("a[rel^='{$wppp_rel}']").prettyPhoto();
        });
				/* ]]> */
     </script>
         		
EOHTML;
    echo $output;
  }
  

  /**
   * Builds Options Array
   * @param null
   * @access private
   * @return void
   * @since 1.4.1
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
  */
  private function _buildOptions($init=false) {
    $this->opts = array('wppp_automate_all' => array('default' => '1',
                                                     'type'    => 'int',
                                                     'section' => 'automate',
                                                     'name'    => __('Automate all'),
                                                     'desc'    => __('Automatic replacement of all supported media types')),
                        'wppp_automate_img' => array('default' => '1',
                                                     'type'    => 'int',
                                                     'section' => 'automate',
                                                     'name'    => __('Automate images'),
                                                     'desc'    => __('Automatic replacement of image links (BMP, GIF, JPG, JPEG, PNG)')),
                        'wppp_automate_swf' => array('default' => '1',
                                                     'type'    => 'int',
                                                     'section' => 'automate',
                                                     'name'    => __('Automate flash'),
                                                     'desc'    => __('Automatic replacement of Flash video links (SWF)')),
                        'wppp_automate_mov' => array('default' => '1',
                                                     'type'    => 'int',
                                                     'section' => 'automate',
                                                     'name'    => __('Automate QuickTime'),
                                                     'desc'    => __('Automatic replacement of Quicktime video links (MOV)')),
                        'wppp_automate_yt'  => array('default' => '1',
                                                     'type'    => 'int',
                                                     'section' => 'automate',
                                                     'name'    => __('Automate YouTube'),
                                                     'desc'    => __('Automatic replacement of YouTube links')),
                        'wppp_automate_ext' => array('default' => '0',
                                                     'type'    => 'int',
                                                     'section' => 'automate',
                                                     'name'    => __('Automate iFrames'),
                                                     'desc'    => __('Automatic replacement of external iFrames')),
                        'wppp_rel'          => array('default' => 'wp-prettyPhoto',
                                                     'type'    => 'string',
                                                     'section' => 'technical',
                                                     'name'    => __('Rel value'),
                                                     'desc'    => __('Value of the links\' "REL" attribute you want WP-prettyPhoto to look for')),
                        'wppp_speed'        => array('default' => 'normal',
                                                     'type'    => 'string',
                                                     'values'  => array('slow','normal','fast'),
                                                     'section' => 'appearance',
                                                     'name'    => __('Speed'),
                                                     'desc'    => __('The speed at which the prettyPhoto box should open')),
                        'wppp_padding'      => array('default' => '20',
                                                     'type'    => 'string',
                                                     'section' => 'appearance',
                                                     'name'    => __('Padding'),
                                                     'desc'    => __('Padding on each side of the displayed element inside prettyPhoto\'s box. Percentage values only (0-100)')),
                        'wppp_opacity'       => array('default'=> 0.35,
                                                     'type'    => 'float',
                                                     'section' => 'appearance',
                                                     'name'    => __('Opacity'),
                                                     'desc'    => __('Opacity of prettyPhoto\'s box. Float values between 0 and 1.0.')),
                        'wppp_title'         => array('default'=> '1',
                                                     'type'    => 'int',
                                                     'section' => 'appearance',
                                                     'name'    => __('Show title'),
                                                     'desc'    => __('Show title (value of the links\' ALT attribute) inside prettyPhoto box.')),
                        'wppp_resize'        => array('default'=> '1',
                                                     'type'    => 'int',
                                                     'section' => 'appearance',
                                                     'name'    => __('Allow resize'),
                                                     'desc'    => __('Allow the prettyPhoto box to be resizeable')),
                        'wppp_counterlabel'  => array('default'=> '/',
                                                     'type'    => 'string',
                                                     'section' => 'appearance',
                                                     'name'    => __('Counter label'),
                                                     'desc'    => __('String value of the separator character for galleries')),
                        'wppp_theme'         => array('default'=> 'dark_rounded',
                                                     'type'    => 'string',
                                                     'section' => 'appearance',
                                                     'name'    => __('Theme'),
                                                     'values'  => $this->_getThemes(),
                                                     'desc'    => __('prettyPhoto theme to use')),
                        'wppp_hideflash'     => array('default'=> '0',
                                                      'type'   => 'int',
                                                      'section'=> 'appearance',
                                                      'name'   => __('Hide Flash'),
                                                      'desc'   => __('If set to true, all Flash files on the page will be hidden when prettyPhoto opens. Fixes a bug when you can\'t set the Flash wmode')
                                                      ),
                        'wppp_wmode'         => array('default'=> 'opaque',
                                                      'type'   => 'string',
                                                      'values'  => array('window','opaque','transparent'),
                                                      'section'=> 'appearance',
                                                      'name'   => __('Flash WMode'),
                                                      'desc'   => __('Opaque, Window or Transparent')
                                                      ),
                        'wppp_autoplay'      => array('default'=> '0',
                                                      'type'   => 'int',
                                                      'section'=> 'appearance',
                                                      'name'   => __('Autoplay'),
                                                      'desc'   => __('True to Autoplay, False not to.')
                                                      ),
                        'wppp_modal'         => array('default'=> '0',
                                                      'type'   => 'int',
                                                      'section'=> 'technical',
                                                      'name'   => __('Modal'),
                                                      'desc'   => __('If set to true, only the close button will close prettyPhoto')
                                                      ),
                        'wppp_jsreplace'     => array('default'=> '1',
                                                     'type'    => 'int',
                                                     'section' => 'technical',
                                                     'name'    => __('Replace JavaScript'),
                                                     'desc'    => __('Replace WordPress\' jQuery with bundled version')),
                        'wppp_usecode'       => array('default'=> '0',
                                                      'type'   => 'int',
                                                      'section'=> 'technical',
                                                      'name'   => __('Enable ShortCodes'),
                                                      'desc'   => __('Enables usage of ShortCodes to display prettyPhoto - useful when you\'re not automatically prettifying all media types but still want to use it occasionnaly')),
												'wppp_markup'        => array('default'=>'<div class="pp_pic_holder"> \
                                                                  <div class="pp_top"> \
                                                                    <div class="pp_left"></div> \
                                                                    <div class="pp_middle"></div> \
                                                                    <div class="pp_right"></div> \
                                                                  </div> \
                                                                  <div class="pp_content_container"> \
                                                                    <div class="pp_left"> \
                                                                    <div class="pp_right"> \
                                                                      <div class="pp_content"> \
                                                                        <div class="pp_fade"> \
                                                                          <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                                                          <div class="pp_loaderIcon"></div> \
                                                                          <div class="pp_hoverContainer"> \
                                                                            <a class="pp_next" href="#">next</a> \
                                                                            <a class="pp_previous" href="#">previous</a> \
                                                                          </div> \
                                                                          <div id="pp_full_res"></div> \
                                                                          <div class="pp_details clearfix"> \
                                                                            <a class="pp_close" href="#">Close</a> \
                                                                            <p class="pp_description"></p> \
                                                                            <div class="pp_nav"> \
                                                                              <a href="#" class="pp_arrow_previous">Previous</a> \
                                                                              <p class="currentTextHolder">0/0</p> \
                                                                              <a href="#" class="pp_arrow_next">Next</a> \
                                                                            </div> \
                                                                          </div> \
                                                                        </div> \
                                                                      </div> \
                                                                    </div> \
                                                                    </div> \
                                                                  </div> \
                                                                  <div class="pp_bottom"> \
                                                                    <div class="pp_left"></div> \
                                                                    <div class="pp_middle"></div> \
                                                                    <div class="pp_right"></div> \
                                                                  </div> \
                                                                </div> \
                                                                <div class="pp_overlay"></div> \
                                                                <div class="ppt"></div>',
                                                     'type'    => 'string',
                                                     'section' => 'technical',
                                                     'name'    => __('Markup'),
                                                     'desc'    => __('Markup')),
                        'wppp_imarkup'       => array('default'=>'<img id="fullResImage" src="" />',
                                                      'type'    => 'string',
                                                      'section' => 'technical',
                                                      'name'    => __('Image Markup'),
                                                      'desc'    => __('Image Markup')),
                        'wppp_fmarkup'       => array('default' =>'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',
                                                      'type'    => 'string',
                                                      'section' => 'technical',
                                                      'name'    => __('Flash Markup'),
                                                      'desc'    => __('Flash Markup')),
                        'wppp_qmarkup'       => array('default'=>'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',
                                                      'type'    => 'string',
                                                      'section' => 'technical',
                                                      'name'    => __('QuickTime Markup'),
                                                      'desc'    => __('QuickTime Markup')),
                        'wppp_frmmarkup'     => array('default' =>'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',
                                                      'type'    => 'string',
                                                      'section' => 'technical',
                                                      'name'    => __('iFrame Markup'),
                                                      'desc'    => __('iFrame Markup')),
                        'wppp_inmarkup'     => array('default' =>'<div class="pp_inline clearfix">{content}</div>',
                                                      'type'    => 'string',
                                                      'section' => 'technical',
                                                      'name'    => __('Inline Markup'),
                                                      'desc'    => __('Inline Markup')),
                        'wppp_picturecallback'=>array('default'=> 'function(){}',
                                                     'type'    => 'string',
                                                     'section' => 'technical',
                                                     'name'    => __('Picture Callback'),
                                                     'desc'    => __('Picture Callback function (MUST be "function(){YOUR_JS_CODE_HERE}")'),
                                                     ),
                        'wppp_callback'      => array('default'=> 'function(){}',
                                                     'type'    => 'string',
                                                     'section' => 'technical',
                                                     'name'    => __('Callback function'),
                                                     'desc'    => __('Callback function (MUST be "function(){YOUR_JS_CODE_HERE}")')),
                  );
    if ($init === true) { $this->wppp_activation_hook(); }
  }

  /**
   * Fetches a list of installed prettyPhoto themes
   * @param null
   * @return array Numeric array containing directory names of installed themes
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @since 1.1
   * @access private
  */
  private function _getThemes() {
    $themes = array();
    $dir = scandir(dirname(__FILE__).'/images/prettyPhoto');
    foreach ($dir as $key=>$dirname) {
      if ((strlen($dirname) > 2) && is_dir(dirname(__FILE__).'/images/prettyPhoto/'.$dirname)) { $themes[] = $dirname; }
    }
    return $themes;
  }

  /**
   * Adds ShortCode capabilities
   *
   * Available ShortCodes:
   *  - [ppo file="file.png" title="image title" desc="image description" button="true|false"]Link/button text[/ppo] - Opens a prettyPhoto displaying file
   *  - [ppg files="file1.png,file2.png" titles="title1,title2" desc="desc1,desc2" button="true|false"]Link/button text[/ppg] - Opens a prettyPhoto gallery of filesArray
   * @param array $params User defined attributes
   * @param string $content ShortCode Contents
   * @param string $code ShortCode Name (ppo, ppg)
   * @access public
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @since 1.5
   * @return string ShortCode output
   */
  public function wppp_shortcode($params, $content=null, $code) {
    $wpurl = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__), '', plugin_basename(__FILE__));
    $shortCodes = array('ppo' => array('img'    => '',
                                       'title'  => '',
                                       'desc'   => '',
                                       'button' => 'false'),
                        'ppg' => array('files'  => "['".$wpurl."images/fullscreen/1.jpg','".$wpurl."images/fullscreen/2.jpg','".$wpurl."images/fullscreen/3.jpg'];",
                                       'titles' => "['Title 1','Title 2','Title 3'];",
                                       'desc'   => "['Desc 1','Desc 2','Desc 3'];",
                                       'button' => 'false')
                       );
    extract(shortcode_atts($shortCodes[$code], $params));
    switch ($code) {
      case 'ppo':
        $imgd = array('img'  => $img,
                     'title'=> $title,
                     'desc' => $desc);
        array_walk_recursive($imgd, array(&$this, 'sanitizeValue'));
        $output = "$.prettyPhoto.open('{$imgd['img']}', '{$imgd['title']}', '{$imgd['desc']}');return false;";
        break;
      case 'ppg':
        $files  = explode(',', $files);
        $titles = explode(',', $titles);
        $desc   = explode(',', $desc);
        $img = array('img'  => $files,
                     'title'=> $titles,
                     'desc' => $desc);
        array_walk_recursive($img, array(&$this, 'sanitizeValue'));
        $images       = '[\''.implode("','", $img['img']).'\']';
        $titles       = '[\''.implode("','", $img['title']).'\']';
        $descriptions = '[\''.implode("','", $img['desc']).'\']';
        $output = "$.prettyPhoto.open($images, $titles, $descriptions);return false;";
        break;
    }
    return $button == 'true'? "<input type=\"button\" value=\"$content\" onclick=\"$output\" />" : "<a href=\"#\" onclick=\"$output\">$content</a>";
  }

  /**
   * Sanitizes shortcode parameters
   * @param string $v Element Value
   * @param string $k Element Key
   * @return string Sanitized value
   * @since 1.5
   * @author Pier-Luc Petitclerc <pL@fusi0n.org>
   * @access private
   */
  private function sanitizeValue($v, $k) {
    return str_replace(',','&#44;',htmlspecialchars($v, ENT_QUOTES, 'UTF-8', false));
  }
}

// Fire in the hole!
$wppp = new WP_prettyPhoto();
register_activation_hook(__FILE__, array(&$wppp, 'wppp_activation_hook'));
