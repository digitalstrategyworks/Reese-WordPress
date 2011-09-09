<?php
/**
 * @package Buffet
 * @subpackage API
 */

/**
 * bf_form_input() - Input Field Helper Function
 * 
 * This function is similar to form_input() function in Codeigniter's Form Helper class.
 * You can pass the field name and value the first and second parameter respectively.
 * 
 * @since	0.5.2
 * @link	http://codeigniter.com/user_guide/helpers/form_helper.html	CodeIgniter User Guide on Form Helper
 * @return	string						HTML code of the input field
 * @param 	string[optional]	$data	Name of the input field
 * @param	string[optional]	$value	Default value of the input field
 * @param	mixed[optional]		$extra	A string or associative array containing additional data
 */
function bf_form_input($data = '', $value = '', $extra = '') {
	$defaults = array('type' => 'text', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);
	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
}

/**
 * bf_form_textarea() - Textarea Helper Function
 * 
 * This function is similar to form_textarea() function in CodeIgniter's Form Helper class.
 * The parameters required is the same is bf_form_input().
 * 
 * @since	0.5.2
 * @link	http://codeigniter.com/user_guide/helpers/form_helper.html	CodeIgniter User Guide on Form Helper
 * @return	string						HTML code of the textarea
 * @param 	string[optional]	$data	Name of the textarea
 * @param	string[optional]	$value	Default value of the textarea
 * @param	mixed[optional]		$extra	A string or associative array containing additional data
 */
function bf_form_textarea($data = '', $value = '', $extra = '') {
	$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'cols' => '90', 'rows' => '12');

	if ( ! is_array($data) OR ! isset($data['value'])) {
		$val = $value;
	} else {
		$val = $data['value']; 
		unset($data['value']); // textareas don't use the value attribute
	}

	return "<textarea "._parse_form_attributes($data, $defaults).$extra.">".$val."</textarea>";
}

/**
 * bf_form_dropdown() - Dropdown Menu Helper Function
 * 
 * This function is similar to form_dropdown() function in CodeIgniter's Form Helper class.
 * 
 * @since	0.5.2
 * @link	http://codeigniter.com/user_guide/helpers/form_helper.html	CodeIgniter User Guide on Form Helper
 * @return	string							HTML code of the dropdown menu
 * @param	string[optional]	$name		Name of the dropdown menu
 * @param	array[optional]		$options	Associative array containing the options
 * @param	array[optional]		$selected	Associative array containing the selected options
 * @param	string[optional]	$extra		A string containing additional data
 */
function bf_form_dropdown($name = '', $options = array(), $selected = array(), $extra = '') {
	if ( ! is_array($selected)) {
		$selected = array($selected);
	}

	// If no selected state was submitted we will attempt to set it automatically
	if (count($selected) === 0) {
		// If the form name appears in the $_POST array we have a winner!
		if (isset($_POST[$name])) $selected = array($_POST[$name]);
	}

	if ($extra != '') $extra = ' '.$extra;

	$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';
	$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";

	foreach ($options as $key => $val) {
		$key = (string) $key;
		if (is_array($val)) {
			$form .= '<optgroup label="'.$key.'">'."\n";
			foreach ($val as $optgroup_key => $optgroup_val) {
				$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';
				$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
			}
			$form .= '</optgroup>'."\n";
		} else {
			$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';
			$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
		}
	}
	$form .= '</select>';
	return $form;
}

/**
 * bf_form_checkbox() - Checkbox Helper Function
 * 
 * This function is similar to form_checkbox() function in CodeIgniter's Form Helper class.
 * 
 * @since	0.5.2
 * @link	http://codeigniter.com/user_guide/helpers/form_helper.html	CodeIgniter User Guide on Form Helper
 * @return	string							HTML code of the checkbox
 * @param	string[optional]	$data		Name of the checkbox
 * @param	string[optional]	$value		Value of the checkbox
 * @param	boolean[optional]	$checked	Boolean specifying the default state of the checkbox
 * @param	string[optional]	$extra		A string containing additional data
 */
function bf_form_checkbox($data = '', $value = '', $checked = FALSE, $extra = '') {
	$defaults = array('type' => 'checkbox', 'name' => (( ! is_array($data)) ? $data : ''), 'value' => $value);

	if (is_array($data) AND array_key_exists('checked', $data)) {
		$checked = $data['checked'];
		
		if ($checked == FALSE) unset($data['checked']);
		else $data['checked'] = 'checked';
	}

	if ($checked == TRUE) $defaults['checked'] = 'checked';
	else unset($defaults['checked']);

	return "<input "._parse_form_attributes($data, $defaults).$extra." />";
}

/**
 * bf_form_radio() - Radio Button Helper Function
 * 
 * This function is similar to form_radio() function in CodeIgniter's Form Helper class.
 * 
 * @since	0.5.2
 * @link	http://codeigniter.com/user_guide/helpers/form_helper.html	CodeIgniter User Guide on Form Helper
 * @return	string							HTML code of the radio button
 * @param	string[optional]	$data		Name of the radio button
 * @param	string[optional]	$value		Value of the radio button
 * @param	boolean[optional]	$checked	Boolean specifying the default state of the radio button
 * @param	string[optional]	$extra		A string containing additional data
 */
function bf_form_radio($data = '', $value = '', $checked = FALSE, $extra = '') {
	if ( ! is_array($data)) {	
		$data = array('name' => $data);
	}

	$data['type'] = 'radio';
	return bf_form_checkbox($data, $value, $checked, $extra);
}

/**
 * bf_set_radio() - Set Radio Helper Function
 * 
 * This function is similar to set_radio() function in CodeIgniter's Form Helper class.
 * 
 * @since	0.5.2
 * @link	http://codeigniter.com/user_guide/helpers/form_helper.html	CodeIgniter User Guide on Form Helper
 * @return	string	HTML code containing the result
 * @params	string[optional]	$field		Name of the field
 * @params	string[optional]	$value		Value of the field
 * @params	boolean[optional]	$default	Default state of the field
 */
function bf_set_radio($field = '', $value = '', $default = FALSE) {
	if ( ! isset($_POST[$field])) {
		if (count($_POST) === 0) {
			return ' checked="checked"';
		}
		return '';
	}

	$field = $_POST[$field];
	
	if (is_array($field)) {
		if ( ! in_array($value, $field)) {
			return '';
		}
	} else {
		if (($field == '' OR $value == '') OR ($field != $value)) {
			return '';
		}
	}

	return ' checked="checked"';
}

/**
 * @ignore
 */
function _parse_form_attributes($attributes, $default) {
	if (is_array($attributes)) {
		foreach ($default as $key => $val) {
			if (isset($attributes[$key])) {
				$default[$key] = $attributes[$key];
				unset($attributes[$key]);
			}
		}
	
		if (count($attributes) > 0) {
			$default = array_merge($default, $attributes);
		}
	}
	
	$att = '';
	
	foreach ($default as $key => $val) {
		if ($key == 'value') {
			$val = form_prep($val);
		}
	
		$att .= $key . '="' . $val . '" ';
	}
	
	return $att;
}

/**
 * form_prep() - Prepare String Helper Function
 * 
 * Prepares the string to be used in the textarea. This is similar to form_prep() function in CodeIgniter's form class.
 * 
 * @since	0.5.2
 * @link	http://codeigniter.com/user_guide/helpers/form_helper.html	CodeIgniter User Guide on Form Helper
 * @return	string						Formatted string
 * @param	string[optional]	$str	String to be formatted
 */
function form_prep($str = '') {
	// if the field name is an array we do this recursively
	if (is_array($str)) {
		foreach ($str as $key => $val){
			$str[$key] = form_prep($val);
		}
		return $str;
	}

	if ($str === '') return '';

	$temp = '__TEMP_AMPERSANDS__';

	// Replace entities to temporary markers so that 
	// htmlspecialchars won't mess them up
	$str = preg_replace("/&#(\d+);/", "$temp\\1;", $str);
	$str = preg_replace("/&(\w+);/",  "$temp\\1;", $str);

	$str = htmlspecialchars($str);

	// In case htmlspecialchars misses these.
	$str = str_replace(array("'", '"'), array("&#39;", "&quot;"), $str);

	// Decode the temp markers back to entities
	$str = preg_replace("/$temp(\d+);/","&#\\1;",$str);
	$str = preg_replace("/$temp(\w+);/","&\\1;",$str);

	return $str;
}

/**
 * bf_quick_news_posts() - Render News Posts Helper Function
 * 
 * This function is a quick way to render a news section anywhere in the theme.
 * 
 * @since	0.5.2
 * @return	string						HTML Code
 * @param	string				$class	CSS class selector for the whole DIV area
 * @param	mixed[optional]		$q		Query parameters, takes in the same data as query_posts()
 */
function bf_quick_news_posts($class, $q = '') {
	global $wpdb;
	wp_reset_query();
	
	$output = '';
	$query = new WP_Query($q);
	if ( $query->have_posts() ) {
	?>	
		<div class="clearfix hfeed <?php echo $class ?>">
			<?php while ($query->have_posts()) : $query->the_post() ?>
			<div <?php bf_post_class(); ?>>
			<?php bf_newsheader(); ?>
			<?php bf_newsbody(); ?>
			<?php bf_newsfooter(); ?>
			</div>
			<?php endwhile; ?>
		</div><!-- .hfeed -->
	<?php	
	}
}

/* End of file helpers.php */
/* Location: ./includes/helpers.php */
