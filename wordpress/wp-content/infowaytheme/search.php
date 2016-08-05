<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * 
 */
?>
<?php get_header(); ?>
<div class="heading_wrapper">
  <div class="heading_container">
    <div class="page-heading">
      <h1 class="page_title"><?php printf(SEARCH_RESULT_FOR, '' . get_search_query() . ''); ?></h1>
    </div>
  </div>
</div>
<div class="clear"></div>
<div class="page-content">
  <div class="grid_16 alpha">
    <div class="content-bar">
            <?php if (have_posts()) : ?>
                <!--Start Post-->
                <?php get_template_part('loop', 'search'); ?>
                <!--End Post-->
            <?php else : ?>
                <article id="post-0" class="post no-results not-found">
                    <header class="entry-header">
                        <h1 class="entry-title">
                            <?php echo NOTHING_FOUND; ?>
                        </h1>
                    </header>
                    <!-- .entry-header -->
                    <div class="entry-content">
                        <p>
                            <?php echo SORRY_NOTHING_MATCHED_YOUR_SEARCH_CRITERIA_PLEASE_TRY_AGAIN_WITH_SOME_DIFFERENT_KEYWORD; ?>
                        </p>
                        <?php get_search_form(); ?>
                    </div>
                    <!-- .entry-content -->
                </article>
            <?php endif; ?>
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
