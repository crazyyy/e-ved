<?php

// Register Widgets
function tj_widgets_init() {

	// Home Sidebar
	register_sidebar( array (
		'name' => __( 'Home Sidebar', 'themejunkie' ),
		'id' => 'home-sidebar',
		'description' => __( 'Home Sidebar', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="widget clear %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );		

	// Page Sidebar
	register_sidebar( array (
		'name' => __( 'Page Sidebar', 'themejunkie' ),
		'id' => 'page-sidebar',
		'description' => __( 'Page Sidebar', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="widget clear %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Post Sidebar
	register_sidebar( array (
		'name' => __( 'Post Sidebar', 'themejunkie' ),
		'id' => 'post-sidebar',
		'description' => __( 'Post Sidebar', 'themejunkie' ),
		'before_widget' => '<div id="%1$s" class="widget clear %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'init', 'tj_widgets_init' );

?>