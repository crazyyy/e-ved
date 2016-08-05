   	<ul class="sidebar">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar("Inner Sidebar") ) : else : ?>
    	
         <li>
        <h2><?php _e('Категории'); ?></h2>
            <ul>
            <?php wp_list_cats('sort_column=name&hierarchical=0'); ?>
            </ul>
        </li>
      	
        <li>
        <h2><?php _e('Архивы'); ?></h2>
            <ul>
            <?php wp_get_archives('type=monthly'); ?>
            </ul>
        </li>
        
        <li>
        <h2><?php _e('Ссылки'); ?></h2>
            <ul>
             <?php get_links(2, '<li>', '</li>', '', TRUE, 'url', FALSE); ?>
             </ul>
        </li>
        
	<?php endif; ?>
	</ul>
