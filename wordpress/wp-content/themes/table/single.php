<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	    
        	    
        <div id="content">

		  	<?php if(get_option('table_show_related_posts') == 'on') { ?>	  	
		    	<div class="related-posts">
		    		<?php tj_related_posts(); ?>
		    		<div class="clear"></div>
		    	</div><!-- .related-posts -->  
		  	<?php } ?>
	    	    
		 	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h1 class="entry-title"><?php the_title(); ?></h1>
				
				<div class="entry-meta">
					<?php _e('by','themejunkie'); ?> <?php the_author_posts_link(); ?> <?php _e('on','themejunkie'); ?> <?php the_time('M jS, Y') ?> &middot; <?php comments_popup_link(); ?>
				</div><!-- .entry-meta -->		
								
			   	<div class="entry-content">
					<?php if(get_option('table_integrate_singletop_enable') == 'on') echo (get_option('table_integration_single_top')); ?>	   	
		            <?php the_content(''); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themejunkie' ), 'after' => '</div>' ) ); ?>
					<?php if(get_option('table_integrate_singlebottom_enable') == 'on') echo (get_option('table_integration_single_bottom')); ?>				    	
			    	<div class="clear"></div>
					<?php printf(the_tags(__('<div class="entry-tags"><span>Tags:</span>&nbsp;','themejunkie'),', ','</div>')); ?>
					<?php edit_post_link('('.__('Edit', 'themejunkie').')', '<span class="entry-edit">', '</span>'); ?>
			  	</div><!-- .entry-content -->
			  	
		  	</div><!-- #post-<?php the_ID(); ?> -->
		  	
		  	<div class="clear"></div>
		  	
		  	<?php if(get_option('table_show_author_box') == 'on') { ?>	  	
			  	<div class="authorbox">
					<p><?php echo get_avatar( get_the_author_meta('email'), '50' ); ?>
					<strong><?php the_author_posts_link(); ?></strong><br />
					<?php the_author_meta( 'description' ); ?></p>
					<div class="clear"></div>
				</div><!-- .authorbox-->
			<?php } ?>
			
	    	<?php if(get_option('table_show_post_comments') == 'on') { ?>
		  		<?php comments_template(); ?> 	
		  	<?php } ?>
		  	
	  	</div><!-- #content -->
	  	
	<?php endwhile; else: ?>
	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
