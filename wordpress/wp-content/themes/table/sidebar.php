<div id="sidebar" name="<?php echo get_template_directory_uri();?>">

	<?php if(is_home()) : ?>

	    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('home-sidebar') ) : ?>
	        <?php the_widget('WP_Widget_Text', 'title=Home Sidebar&text=You could add some widgets in this area.', 'before_title=<h3 class="widget-title">&after_title=</h3>'); ?>
	    <?php endif; ?>
	    
	<?php elseif(is_page()) : ?>
	
	    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('page-sidebar') ) : ?>
	        <?php the_widget('WP_Widget_Text', 'title=Page Sidebar&text=You could add some widgets in this area.', 'before_title=<h3 class="widget-title">&after_title=</h3>'); ?>
	    <?php endif; ?>	
	    
	<?php else : ?>

	    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('post-sidebar') ) : ?>
	        <?php the_widget('WP_Widget_Text', 'title=Post Sidebar&text=You could add some widgets in this area.', 'before_title=<h3 class="widget-title">&after_title=</h3>'); ?>
	    <?php endif; ?>		
	    
	<?php endif; ?>    
	  
</div><!-- #sidebar -->
