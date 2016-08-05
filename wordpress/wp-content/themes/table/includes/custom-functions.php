<?php

add_theme_support( 'automatic-feed-links' );
add_editor_style();
//add_custom_image_header();

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 644;

/*-----------------------------------------------------------------------------------*/
/*	Custom Menus
/*-----------------------------------------------------------------------------------*/
function register_main_menus() {
	register_nav_menus(
		array(
			'primary-nav' => __( 'Primary Nav','themejunkie' ),
			'secondary-nav' => __( 'Secondary Nav','themejunkie' ),			
		)
	);
}

if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

/*-----------------------------------------------------------------------------------*/
/*	Register and deregister Scripts files	
/*-----------------------------------------------------------------------------------*/
if(!is_admin()) {
	add_action( 'wp_print_scripts', 'my_deregister_scripts', 100 );
}

function my_deregister_scripts() {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script('jquery', get_template_directory_uri().'/includes/js/jquery.min.js', false, '1.6.4');
		wp_enqueue_script('jquery-superfish', get_template_directory_uri().'/includes/js/superfish.js', false, '1.4.2');
		wp_enqueue_script('jquery-custom', get_template_directory_uri().'/includes/js/custom.js', false, '1.4.2');
        wp_enqueue_script('jquery-ui', get_template_directory_uri().'/includes/js/jquery-ui-1.8.5.custom.min.js', false, '1.8.5');
        wp_enqueue_script('jquery-flexislider', get_template_directory_uri().'/includes/js/jquery.flexslider.js', false, '1.0');
        
        //wp_enqueue_script('jquery-lazyload');

		if ( is_singular() && get_option('thread_comments') ) wp_enqueue_script( 'comment-reply' );
}

/*-----------------------------------------------------------------------------------*/
/*	Remove 'P' tag from post excerpt
/*-----------------------------------------------------------------------------------*/
remove_filter('the_excerpt', 'wpautop');


if (is_home() || is_archive() || is_search() ) {
	add_filter('img_caption_shortcode', create_function('$a, $b, $c','return $c;'), 10, 3);
} 


/*-----------------------------------------------------------------------------------*/
/*	Exclude Pages from Search Results
/*-----------------------------------------------------------------------------------*/
function tj_exclude_pages($query) {
        if ($query->is_search) {
        $query->set('post_type', 'post');
                                }
        return $query;
}
add_filter('pre_get_posts','tj_exclude_pages');


/*-----------------------------------------------------------------------------------*/
/*	Get limit excerpt	
/*-----------------------------------------------------------------------------------*/
function tj_content_limit($max_char, $more_link_text = '', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "";
      echo $content;
      echo " ...";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "";
        echo $content;
        echo " ...";
   }
   else {
      echo "";
      echo $content;
   }
}

/* Related Posts */
function tj_related_posts() {
	global $post, $wpdb;
	$backup = $post;  // backup the current object
	$tags = wp_get_post_tags($post->ID);
	$tagIDs = array();
	if ($tags) {
	  $tagcount = count($tags);
	  for ($i = 0; $i < $tagcount; $i++) {
	    $tagIDs[$i] = $tags[$i]->term_id;
	  }
	  
	  $showposts = 4;
	  $showposts = !empty($showposts) ? $showposts : 4;
	  
	  $args=array(
	    'tag__in' => $tagIDs,
	    'post__not_in' => array($post->ID),
	    'showposts'=>$showposts,
	    'caller_get_posts'=>1
	  );
	  $my_query = new WP_Query($args);
	  if( $my_query->have_posts() ) { $related_post_found = true; ?>
		<ul>		
	    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<li>
					<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('related-entry-thumb', array('class' => 'entry-thumb')); ?></a>	
					<a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
				</li>				
	    <?php endwhile; ?>
		</ul>		
	  <?php }
	}
	
	//show recent posts if no related found
	if(!$related_post_found){ ?>
		<ul>
		<?php
		$posts = get_posts('numberposts=4&offset=0');
		foreach($posts as $post) { ?>
			<li>
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('related-entry-thumb', array('class' => 'entry-thumb')); ?></a>	
				<a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
			</li>
		<?php } ?>
		</ul>
		
		<?php 
	}
	wp_reset_query();
}

?>