<?php
/*
Template Name: Blog Template
*/
 ?>
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
  
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div class="post" id="post-<?php the_ID(); ?>">   
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h2>                  
        </div><!--post-->
        
<?php endwhile; endif; ?>


<?php
//The Query
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$new_query = new WP_Query();
$new_query->query( 'posts_per_page=5&paged='.$paged );

//The Loop
while ($new_query->have_posts()) : $new_query->the_post();
?>
        <div class="blogpost" id="post-<?php the_ID(); ?>">   
        <div class="compop"> <?php comments_popup_link('0', '1', '%'); ?></div>
		<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h3>    
        <div class="blogdate">Опубликовано <?php the_time('j F Y'); ?></div>          
        <?php if($bz_thumbs=="Yes") {?><div class="testi_img"><?php mtheme_thumb1(); ?></div> <?php } ?>   
       	<?php if($bz_typepost=="Excerpt") {?><div class="content"><?php limits2(250, "<br />Далее &raquo;"); ?></div> 
		<?php } else { ?>  <div class="content"><?php the_content("<br />Далее &raquo;"); ?></div> <?php } ?>
        <div class="clear"><!-- --></div>
        </div><!--post-->

<?php endwhile; ?>

<?php
if($new_query->max_num_pages>1){?>
    <div class="paginate">
    <?php
      if ($paged > 1) { ?>
        <a href="<?php echo '?paged=' . ($paged -1); //prev link ?>"><</a>
                        <?php }
    for($i=1;$i<=$new_query->max_num_pages;$i++){?>
        <a href="<?php echo '?paged=' . $i; ?>" <?php echo ($paged==$i)? 'class="selected"':'';?>><?php echo $i;?></a>
        <?php
    }
    if($paged < $new_query->max_num_pages){?>
        <a href="<?php echo '?paged=' . ($paged + 1); //next link ?>">></a>
    <?php } ?>
    </div>
<?php } ?>




    
    </div><!--left_side -->
    
    
      <div id="right"><!--right start-->
   <div id="right_top"></div><!--right _top start-->
   <div id="right_mid"><!--right mid start-->
   
<?php include (TEMPLATEPATH . '/blogsidebar.php'); ?>
   
<?php get_footer(); ?>
