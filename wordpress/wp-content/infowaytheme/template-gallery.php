<?php
/*
  Template Name: Gallery Page
 */
?>
<?php get_header(); ?>
<div class="heading_wrapper">
        <div class="heading_container">
          <div class="page-heading">
		  <h1 class="page-title gallery"><a href="#"><?php the_title();?>&nbsp;&nbsp;<img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png"  alt="arrow" /></a></h1>		  
          </div>
        </div>
      </div>
	  <div class="page_container">
        <div class="page-content gall">
          <div class="gallery1">
             <ul class="thumbnail">
       <?php
            if ($wp_query->have_posts()) : while (have_posts()) : the_post();
                    the_content();
                    $attachment_args = array(
                        'post_type' => 'attachment',
                        'numberposts' => -1,
                        'post_status' => null,
                        'post_parent' => $post->ID,
                        'orderby' => 'menu_order ID'
                    );
                    $attachments = get_posts($attachment_args);
                    if ($attachments) {
                        foreach ($attachments as $gallery_image) {
                            $attachment_img = wp_get_attachment_url($gallery_image->ID);
							 $img_source=inkthemes_image_resize($attachment_img,208,140);
                            echo '<li><a rel="prettyPhoto[gallery1]" alt="' . $gallery_image->post_title . '" href="' . $attachment_img . '">';
                            echo '<img src="'.$img_source[url].'" alt=""/>';
                            echo '</a></li>';
                        }
                    }
                    ?>
            <?php endwhile;
        endif; ?>
    </ul> 
          </div>
        </div>
      </div>
	  </div>
	  </div>
	  <div class="clear"></div> 
  <?php get_footer(); ?>