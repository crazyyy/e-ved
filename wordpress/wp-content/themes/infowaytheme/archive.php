<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 *
 */
?>
<?php get_header(); ?>

<div class="heading_wrapper">
  <div class="heading_container">
    <div class="page-heading">
      <h1 class="page_title single-heading">
                    <?php if (is_day()) : ?>
                        <?php printf(DAILY_ARCHIVES, get_the_date()); ?>
                    <?php elseif (is_month()) : ?>
                        <?php printf(MONTHLY_ARCHIVES, get_the_date('F Y')); ?>
                    <?php elseif (is_year()) : ?>
                        <?php printf(YEARLY_ARCHIVES, get_the_date('Y')); ?>
                    <?php else : ?>
                        <?php echo BLOG_ARCHIVES; ?>
                    <?php endif; ?>
                </h1> 
    </div>
  </div>
</div>
<div class="clear"></div>
<div class="page-content">
  <div class="grid_16 alpha">
    <div class="content-bar">
                <?php
                /* Since we called the_post() above, we need to
                 * rewind the loop back to the beginning that way
                 * we can run the loop properly, in full.
                 */
                rewind_posts();
                /* Run the loop for the archives page to output the posts.
                 * If you want to overload this in a child theme then include a file
                 * called loop-archives.php and that will be used instead.
                 */
                get_template_part('loop', 'archive');
                ?>
                <div class="clear"></div>
                <?php inkthemes_pagination(); ?> 
            
          </div>
  </div>
  <div class="grid_8 omega">
    <!--Start Sidebar-->
    <?php get_sidebar(); ?>
    <!--End Sidebar-->
  </div>
</div>
</div>
</div>
<?php get_footer(); ?>
