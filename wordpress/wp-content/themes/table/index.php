<?php get_header(); ?>

	<?php // BEGIN OF FEATURED SLIDER
		if(get_option('table_slider_enable') == 'on') {  
	?> 
	
		<?php get_template_part('includes/home-slider'); ?>

	<?php } // END OF FEATURED SLIDER ?>
	
	<?php get_sidebar(); ?>
	
	<div class="clear"></div>
	
	<?php if(get_option('table_news_ticker_enable') == 'on') { ?>
		<div id="news-ticker">
		    <span class="text"><?php _e('Headline &raquo; ','themejunkie'); ?></span>
		    <ul class="news">
		        <?php
		        query_posts( array(
		            'tag' => get_option('table_news_ticker_tags'),
		            'showposts' => get_option('table_news_ticker_num')
		        ));
		        if( have_posts() ) : while( have_posts() ) : the_post();
		            ?>
		            <li class="news-ticker">
		                <?php the_time('M d,Y'); ?> - <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themejunkie' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a> -  <span class="headline-comment"><?php comments_popup_link( __( '0 Comment', 'themejunkie' ), __( '1 Comment', 'themejunkie' ), __( '% Comments', 'themejunkie' ) ); ?></span>
		            </li>
		            <?php endwhile; endif; wp_reset_query(); ?>
		    </ul><!-- .news -->

			<span class="headline-nav">
				<a class="headline-previous" href="#pre-headline">&larr;</a>
				<a class="headline-next" href="#next-headline">&rarr;</a>
			</span><!-- .headline-nav -->

		    <div class="clear"></div>
		</div><!-- #news-ticker -->
	<?php } ?>	
	
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
	<?php endif; ?>
	    
<?php get_footer(); ?>