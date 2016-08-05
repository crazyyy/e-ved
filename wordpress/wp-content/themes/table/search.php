<?php get_header(); ?>

    <div id="content" class="one-col">
    
		<?php get_template_part('includes/breadcrumbs'); ?>

		<?php
			$post_count = 1;
		?>
		<?php if (have_posts()) : while ( have_posts() ) : the_post() ?>
				
			<?php include(TEMPLATEPATH. '/includes/loop.php'); ?>
			
			<?php if ($post_count % 3 == 0) { echo '<div class="clear"></div>'; } ?>
			
		<?php $post_count++; endwhile; ?>
	
		<div class="clear"></div>
		
		<div class="left">
			<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
				<div class="pagination">
			    	<div class="left"><?php previous_posts_link(__('Newer Entries', 'themejunkie')) ?></div>
			   		<div class="right"><?php next_posts_link(__('Older Entries', 'themejunkie')) ?></div>
			    	<div class="clear"></div>
				</div> <!-- .pagination -->
			<?php } ?>
		</div><!-- .left -->
		
		<div class="right">
		    <div id="search">
		    	<?php get_search_form(); ?>
		    </div><!-- #search -->
		</div><!-- .right -->
    
		<div class="clear"></div>
    
		<?php else : ?>
		
			<?php get_template_part('includes/not-found'); ?>

		<div class="clear"></div>
		
		<div class="right">
		    <div id="search">
		    	<?php get_search_form(); ?>
		    </div><!-- #search -->
		</div><!-- .right -->			

		<?php endif; ?>
		
    </div><!-- #content -->
    
<?php get_footer(); ?>