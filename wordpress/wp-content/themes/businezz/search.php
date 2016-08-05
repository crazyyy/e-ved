<?php get_header(); ?>

<div id="content"><!--content start-->
 <div class="wrap">
  <div id="con"><!--con start-->
     <div id="con_top"></div>
   <div id="con_mid"><!--con mid start-->
   <div id="inner_content"><!--inner content start-->
 
 <div id="left_side">
 
 <h2 class="search">Результаты поискаs для "<?php echo $_GET['s']; ?>"</h2>
  
<?php if (have_posts()) : ?>

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
