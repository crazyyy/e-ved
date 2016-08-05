<?php
include_once TEMPLATEPATH . '/functions/inkthemes-functions.php';
$functions_path = TEMPLATEPATH . '/functions/';
define('CLASS_PATH',$functions_path);
/* These files build out the options interface.  Likely won't need to edit these. */
require_once ($functions_path . 'define_template.php');  //Language File defined
require_once ($functions_path . 'admin-functions.php');  // Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');  // Admin Interfaces (options,framework, seo)
/* These files build out the theme specific options and associated functions. */
require_once ($functions_path . 'theme-options.php');   // Options panel settings and custom settings
require_once ($functions_path . 'dynamic-image.php');
require_once (CLASS_PATH . 'control.php');
include_once TEMPLATEPATH . '/functions/shortcodes.php';
?>
<?php
/* ----------------------------------------------------------------------------------- */
/* Styles Enqueue */
/* ----------------------------------------------------------------------------------- */
function inkthemes_add_stylesheet() {
    if(inkthemes_get_option('inkthemes_altstylesheet')!='default'){
    wp_enqueue_style('coloroptions', get_template_directory_uri() . "/color/" . inkthemes_get_option('inkthemes_altstylesheet') . ".css", '', '', 'all');
    }	
	if(inkthemes_get_option('infoway_lanstylesheet') != 'Default'){	 
	wp_enqueue_style('rtloptions', get_template_directory_uri() . "/color/" . inkthemes_get_option('infoway_lanstylesheet') . ".css", '', '', 'all');
}	
	wp_enqueue_style('shortcodes', get_template_directory_uri() . "/css/shortcode.css", '', '', 'all');
}

add_action('init', 'inkthemes_add_stylesheet');
/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */
function inkthemes_wp_enqueue_scripts() {
    if (!is_admin()) {		
		wp_enqueue_script('jquery');
		wp_enqueue_script('inkthemes_home_slider', get_template_directory_uri() . '/js/jquery.aw-showcase.js', array('jquery'));  
		wp_enqueue_script('inkthemes-jcarousellite', get_template_directory_uri() . '/js/jcarousellite_1.0.1.min.js', array('jquery'));   
		wp_enqueue_script('inkthemes-ddsmoothmenu', get_template_directory_uri() . '/js/ddsmoothmenu.js', array('jquery'));
		wp_enqueue_script('inkthemes-jquery.prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'));
		wp_enqueue_script('inkthemes-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'));
		wp_enqueue_script('inkthemes-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
		wp_enqueue_script('slider-init', get_template_directory_uri() . '/js/slider-init.js', array('jquery'));
		} elseif (is_admin()) {
    }
}
add_action('init', 'inkthemes_wp_enqueue_scripts');
/* ----------------------------------------------------------------------------------- */
/* Custom Jqueries Enqueue */
/* ----------------------------------------------------------------------------------- */
function inkthemes_custom_jquery(){
    wp_enqueue_script('mobile-menu', get_template_directory_uri() . "/js/mobile-menu.js", array('jquery'));
}
add_action('wp_footer','inkthemes_custom_jquery');
//Front Page Rename
$get_status = inkthemes_get_option('re_nm');
$get_file_ac = TEMPLATEPATH . '/front-page.php';
$get_file_dl = TEMPLATEPATH . '/front-page-hold.php';
//True Part
if ($get_status === 'off' && file_exists($get_file_ac)) {
    rename("$get_file_ac", "$get_file_dl");
}
//False Part
if ($get_status === 'on' && file_exists($get_file_dl)) {
    rename("$get_file_dl", "$get_file_ac");
}

//
function inkthemes_get_option($name) {
    $options = get_option('inkthemes_options');
    if (isset($options[$name]))
        return $options[$name];
}
//
function inkthemes_update_option($name, $value) {
    $options = get_option('inkthemes_options');
    $options[$name] = $value;
    return update_option('inkthemes_options', $options);
}
//
function inkthemes_delete_option($name) {
    $options = get_option('inkthemes_options');
    unset($options[$name]);
    return update_option('inkthemes_options', $options);
}
?>