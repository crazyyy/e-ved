<div id="featured-slider">
    <div class="flexslider loading">
		<ul class="slides">
		<?php
		    query_posts( array(
				'showposts' => get_option('table_slides_num'),
				'tag' => get_option('table_featured_post_tags'),			
				'caller_get_posts' => 1 				
				)
			);
		?>        
		<?php if (have_posts()) : while ( have_posts() ) : the_post() ?>
		      
	        <li>
	        
	            <a title="<?php the_title();?>" href="<?php the_permalink(); ?>" rel="<?php the_title();?>"><?php the_post_thumbnail('slide-thumb', array('class' => 'entry-thumb')); ?></a>
	            
				<div class="entry-comment">
					<?php comments_popup_link( __( '0', 'themejunkie' ), __( '1', 'themejunkie' ), __( '%', 'themejunkie' ) ); ?>
				</div><!-- .entry-comment -->    
				        
	        	<div class="entry-date">
					<span class="entry-month"><?php the_time('M'); ?></span>
					<span class="entry-day"><?php the_time('d'); ?></span>
				</div><!-- .entry-date --> 
					    	    
	    	    <p class="flex-caption entry-title">
	    	    	<a title="<?php the_title();?>" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	    	    </p><!-- .flex-caption .entry-title -->
		    	    
		    </li>
		
		<?php endwhile; ?>
		<?php else : ?>
		<?php endif; ?>
		</ul><!-- .slides -->
    </div><!-- .flexslider -->
</div><!-- #featured-slider -->
	
<?php wp_reset_query();?>
