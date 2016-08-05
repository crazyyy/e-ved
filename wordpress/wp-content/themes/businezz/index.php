<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
<?php get_header(); ?>

<div id="content"><!--content start-->
 <div class="wrap">
  <div id="con"><!--con start-->
     <div id="con_top"></div>
   <div id="con_mid"><!--con mid start-->
   <div id="inner_content"><!--inner content start-->
 
 <div id="left_side">
  
<?php include (TEMPLATEPATH . '/slideshow.php'); ?>
   

    <div class="line"></div>
    

<?php $my_query = new WP_Query('showposts=1&category_name='.$bz_aboutcat); while ($my_query->have_posts()) : $my_query->the_post(); ?>
      
      <h2 class="tits"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <div class="about"><p><?php limits2(180,"Далее"); ?></p></div>
        
<?php endwhile; ?>


        <h2 class="tits"><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo $bz_testicat; ?></a></h2>
<?php $my_query = new WP_Query('showposts='.$bz_testino.'&category_name='.$bz_testicat); while ($my_query->have_posts()) : $my_query->the_post(); ?>

       	<div class="testi">
        <div class="testi_img"><?php mtheme_thumb1(); ?></div>
        <p><?php limits2(70,"Далее"); ?></p>
        </div>
        
<?php endwhile; ?>
    
    </div><!--left_side -->
    
    
      <div id="right"><!--right start-->
   <div id="right_top"></div><!--right _top start-->
   <div id="right_mid"><!--right mid start-->
   
<?php include (TEMPLATEPATH . '/homesidebar.php'); ?>
   
<?php get_footer(); ?>
