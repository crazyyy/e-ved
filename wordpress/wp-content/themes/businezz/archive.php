<?php get_header(); ?>

<div id="content"><!--content start-->
 <div class="wrap">
  <div id="con"><!--con start-->
     <div id="con_top"></div>
   <div id="con_mid"><!--con mid start-->
   <div id="inner_content"><!--inner content start-->
 
 <div id="left_side">
  
<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="search">Архив категории &#8216;<?php single_cat_title(); ?>&#8217; :</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="search">Записи помеченные &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="search">Архив за <?php the_time('j F Y'); ?>:</h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="search">Архив за <?php the_time('F, Y'); ?>:</h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="search">Архив за <?php the_time('Y'); ?>:</h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="search">Архив автора</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="search">Архив блога</h2>
 	  <?php } ?>

		<?php while (have_posts()) : the_post(); ?>
        
        <div class="post" id="post-<?php the_ID(); ?>">   
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h2> 
        <div class="blogdate" style="padding-top:0; padding-bottom:0; margin-bottom:20px;">Опубликовано <?php the_time('j F Y'); ?></div>                   
        </div><!--post-->
        
<?php endwhile; endif; ?>

    
    </div><!--left_side -->
    
    
      <div id="right"><!--right start-->
   <div id="right_top"></div><!--right _top start-->
   <div id="right_mid"><!--right mid start-->
   
<?php include (TEMPLATEPATH . '/blogsidebar.php'); ?>
   
<?php get_footer(); ?>
