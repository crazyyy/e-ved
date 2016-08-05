<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage infoway
 * @since infoway 1.0
 */
?>
<?php get_header(); ?>
<div class="clear"></div>
<div class="page-content">
  <div class="grid_16 alpha">
    <div class="content-bar">
      <!-- Start the Loop. -->
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <!--post start-->
      <div class="post single">
        <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
          <?php the_title(); ?>
          </a></h1>          
           <ul class="post_meta">
              <li class="post_date"><span></span>&nbsp;&nbsp;
                <?php the_date('Y-m-d'); ?>
              </li>
              <li class="posted_by">&nbsp;&nbsp;<span>By</span>&nbsp;&nbsp;
                <?php the_author_posts_link(); ?>
              </li>
              <li class="post_category">&nbsp;&nbsp;<span>Posted in</span>&nbsp;&nbsp;
                <?php the_category(', '); ?>
              </li>
            </ul>
          
        <div class="post_content single">
          <div class="singleimgbox">
            <?php the_content(); ?>
           
          </div>
          <div class="clear"></div>
          <?php if (has_tag()) { ?>
          <div class="tag">
            <?php the_tags('Post Tagged with ', ', ', ''); ?>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php endwhile;
else: ?>
      <div class="post">
        <p>
          <?php _e('Sorry, no posts matched your criteria.', 'infoway'); ?>
        </p>
      </div>
      <?php endif; ?>
      <!--End Loop-->
      <!--Start Comment box-->
      <?php comments_template(); ?>
      <!--End Comment box-->
    </div>
  </div>
  <div class="grid_8 omega">
      <?php get_sidebar(); ?>
      <div class="clear"></div>
  </div>
</div>
</div>
</div>
<?php get_footer(); ?>
