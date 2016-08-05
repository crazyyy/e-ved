 <?php
/*
  Template Name: Fullwidth Page
 */
?>
<?php get_header(); ?>
   <div class="clear"></div> 
<div class="heading_wrapper">
        <div class="heading_container">
          <div class="page-heading">
  	 <h1 class="page-title"><a href="#"><?php the_title(); ?></a>&nbsp;&nbsp;<img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png"  alt="arrow"/></h1>
          </div>
        </div>
      </div>
<div class="page_container">
        <div class="page-content">
          <div class="fullwidth">
	 <?php if (have_posts()) : the_post(); ?>
        <?php /*?><h1 class="page-title"><a href="#"><?php the_title(); ?>
		</a></h1><?php */?>
        <?php the_content(); ?>	
    <?php endif; ?>	  	  
          </div>
        </div>
      </div>
	  </div>
	  </div>
	   <div class="clear"></div> 
  <?php get_footer(); ?>