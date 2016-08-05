<a id="post-<?php the_ID(); ?>" class="entry-box <?php if($post_count % 3 == 0) { echo 'entry-last'; } ?>" href="<?php the_permalink(); ?>">
	
	<?php the_post_thumbnail('entry-thumb', array('class' => 'entry-thumb')); ?>
	
	<div class="entry-comment">
		<?php comments_number('0','1','%'); ?>
	</div><!-- .entry-comment -->
	
	<div class="entry-date">
		<span class="entry-month"><?php the_time('M'); ?></span>
		<span class="entry-day"><?php the_time('d'); ?></span>
	</div><!-- .entry-date -->
	
	<h2 class="entry-title"><?php the_title(); ?></h2>
	
	<?php if(get_option('table_entry_excerpt_enable') == 'on') { ?>	  		
		<div class="entry-excerpt">
			<?php tj_content_limit('130'); ?>
		</div><!-- .entry-excerpt -->
	<?php } ?>
		
</a><!-- #post-<?php the_ID(); ?> .entry-box -->
