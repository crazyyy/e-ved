   <?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
   	<ul class="sidebar">
        <li>
        <h2><?php _e('Новости компании'); ?></h2>
            <ul>
            
            <?php $my_query = new WP_Query('showposts='.$bz_latestno); while ($my_query->have_posts()) : $my_query->the_post(); ?>
        
        <li>               
 
                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h3> 
                                        <div class="sdate"><?php the_time('j F Y'); ?></div>      
       				<div class="scontent"><?php limits2(100, ""); ?></div>
        </li>
        
        <?php endwhile; ?>
            
        </ul>
        </li>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar("Home Sidebar") ) : else : ?>
    	
        <li>
        <h2><?php _e('Архивы'); ?></h2>
            <ul>
            <?php wp_get_archives('type=monthly'); ?>
            </ul>
        </li>
        
	<?php endif; ?>
	</ul>
