<?php get_header(); ?>

<div id="content"><!--content start-->
 <div class="wrap">
  <div id="con"><!--con start-->
     <div id="con_top"></div>
   <div id="con_mid"><!--con mid start-->
   <div id="inner_content"><!--inner content start-->
 
 <div id="left_side">
  
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div class="post" id="post-<?php the_ID(); ?>">   
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h2>       
            <div class="blogdate" style="padding-top:0; padding-bottom:0; margin-bottom:20px;">Опубликовано <?php the_time('j F Y'); ?> Автор: <?php the_author(); ?></div> 
            
            	<!-- gallerycode -->
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
                <div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>
				<!-- gallerycode -->
                
       	<div class="content"><?php the_content(); ?></div> 
        
        		<!-- gallerynavigation -->
				<div class="imgnav">
					<div class="imgleft"><?php previous_image_link() ?></div>
					<div class="imgright"><?php next_image_link() ?></div>
				</div>
				<br clear="all" />
				<!-- gallerynavigation -->
                
        <div class="meta">
        <div class="tag_icon"><?php the_tags('', ' ', '<br />'); ?></div>
        <div class="cat_icon"><?php the_category(' ') ?></div>
        </div><!--meta-->    
        
        <?php comments_template(); ?>      
        </div><!--post-->
        
<?php endwhile; endif; ?>

   
    </div><!--left_side -->
    
    
      <div id="right"><!--right start-->
   <div id="right_top"></div><!--right _top start-->
   <div id="right_mid"><!--right mid start-->
   
<?php include (TEMPLATEPATH . '/blogsidebar.php'); ?>
   
<?php get_footer(); ?>
