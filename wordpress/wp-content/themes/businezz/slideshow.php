<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
 <div id="slider">
 
  <?php $my_query = new WP_Query('showposts='.$bz_slideno.'&category_name='.$bz_slidecat); while ($my_query->have_posts()) : $my_query->the_post(); ?>
    
          <span class="slides">  
                    <div class="slide_img"><?php mtheme_thumb(); ?></div>
                    <div class="slide_text">
                    <h2 class="slide_big"><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php echo shorten_text(get_the_title(), 18); ?></a></h2>
                    <h3 class="slide_small">Опубликовано <?php the_time('j F Y'); ?></h3> 
       				<p><?php limits(135,"Далее"); ?></p>
                    </div>
                    <div class="clear"><!-- --></div>
        </span><!--slides-->    

<?php endwhile; ?>

   </div><!--slider -->
