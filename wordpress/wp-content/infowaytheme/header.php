<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<script type="text/javascript">
 function hide_all(){
    document.getElementById("topinfobox").style.display='none';
 }
</script>
<title>
<?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;
            wp_title('|', true, 'right');
// Add the blog name.
            bloginfo('name');
// Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";
// Add a page number if necessary:
            if ($paged >= 2 || $page >= 2)
                echo ' | ' . sprintf(PAGES_NO, max($paged, $page));
            ?>
</title>
<?php if (is_front_page()) { ?>
<?php if (inkthemes_get_option('inkthemes_keyword') != '') { ?>
<meta name="keywords" content="<?php echo inkthemes_get_option('inkthemes_keyword'); ?>" />
<?php } else {                
            } ?>
<?php if (inkthemes_get_option('inkthemes_description') != '') { ?>
<meta name="description" content="<?php echo inkthemes_get_option('inkthemes_description'); ?>" />
<?php } else {                
            } ?>
<?php if (inkthemes_get_option('inkthemes_author') != '') { ?>
<meta name="author" content="<?php echo inkthemes_get_option('inkthemes_author'); ?>" />
<?php } else {                
            } ?>
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if (is_singular() && get_option('thread_comments'))
           wp_enqueue_script('comment-reply');
        /* Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         */
        wp_head();
        ?>
</head>

<!--[if IE 7]>
<style>
#carousel-full .carousel-posts {
	margin:0;
	width:620px !important;
 }
</style>
<![endif]-->


<body <?php body_class(); ?> style="<?php if (inkthemes_get_option('inkthemes_bodybg') !='') { ?> background: fixed url('<?php echo inkthemes_get_option('inkthemes_bodybg'); ?>') <?php } ?>">
<div class="wrapper">
<div class="body_wrapper">
<div class="topmain_wrapper">
  <div class="topinfobar" id="topinfobox">
    <div class="container_24">
      <div class="grid_24">
        <div class="grid_5 alpha">
          <div class="socialicon">
            <ul class="social_logos">
              <?php if (inkthemes_get_option('inkthemes_twitter') != '') { ?>
              <li class="sl-1"><a title="Tweet this" href="<?php echo inkthemes_get_option('inkthemes_twitter'); ?>"><span></span></a></li>
              <?php } ?>
              <?php if (inkthemes_get_option('inkthemes_facebook') != '') { ?>
              <li class="sl-2"><a title="Share on Facebook" href="<?php echo inkthemes_get_option('inkthemes_facebook'); ?>"><span></span></a></li>
              <?php } ?>
              <?php if (inkthemes_get_option('inkthemes_google') != '') { ?>
              <li class="sl-3"><a title="Google Plus" href="<?php echo inkthemes_get_option('inkthemes_google'); ?>"> <span></span></a></li>
              <?php } ?>
              <?php if (inkthemes_get_option('inkthemes_link') != '') { ?>
              <li class="sl-5"><a title="Share on Linkedin" href="<?php echo inkthemes_get_option('inkthemes_link'); ?>"><span></span></a></li>
              <?php } ?>
              <?php if (inkthemes_get_option('inkthemes_youtube') != '') { ?>
              <li class="sl-6"><a title="Share on Youtube" href="<?php echo inkthemes_get_option('inkthemes_youtube'); ?>"><span></span></a></li>
              <?php } ?>
              <?php if (inkthemes_get_option('inkthemes_pin') != '') { ?>
              <li class="sl-7"><a title="Pinterest" href="<?php echo inkthemes_get_option('inkthemes_pin'); ?>"><span></span></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="grid_15"> <div class="info">
          <?php if (inkthemes_get_option('inkthemes_topinfobar_text') != '') { ?>
          <p><?php echo stripslashes(inkthemes_get_option('inkthemes_topinfobar_text')); ?></p>
          <?php } else { ?>
          <p>
            <?php _e('Best Painters in the New York City. We paint and decorate your homes.','infoway'); ?>
          </p>
          <?php } ?>
          </div></div>
        <div class="grid_2">
          <div class="siteinfourl"><a href="<?php echo inkthemes_get_option('inkthemes_topinfobar_url'); ?>">
            <?php if (inkthemes_get_option('inkthemes_topinfobar_sitename') != '') { ?>
            <p><?php echo stripslashes(inkthemes_get_option('inkthemes_topinfobar_sitename')); ?></p>
            <?php } else { ?>
            <p>
              <?php _e('Inkthemes.com','infoway'); ?>
            </p>
            <?php } ?>
            </a></div>
        </div>
        <div class="grid_2 omega">
          <div class="closeicon"><a href="javascript:hide_all();"><img src="<?php echo get_template_directory_uri(); ?>/images/close-icon.png" alt="Close Icon"  /></a></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="toptip"></div>
    </div>
  </div>
</div>
<div class="container_24">
<div class="grid_24">
<div class="header" id="#top">
  <div class="grid_12 alpha">
    <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php if (inkthemes_get_option('inkthemes_logo') != '') { ?><?php echo inkthemes_get_option('inkthemes_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
  </div>
  <div class="grid_12 omega">&nbsp;&nbsp;&nbsp;
   <div class="contactinfo"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-icon.png" alt="Contact Info" />&nbsp;&nbsp;&nbsp;&nbsp;
      <?php if (inkthemes_get_option('inkthemes_topright') != '') { ?>
      <span class="calldetails"> <?php echo stripslashes(inkthemes_get_option('inkthemes_topright')); ?> </span> <br/>
	   <?php } else { ?>
	   <span class="calldetails">Call 24 Hours: 1.888.222.5847</span>
      <?php } ?>
	   <?php if (inkthemes_get_option('inkthemes_contact_number') != '') { ?>
      <a class="btn" href="tel:<?php echo stripslashes(inkthemes_get_option('inkthemes_contact_number')); ?>"><span></span></a>
	<?php } ?>
    </div>
  </div>
</div>
<div class="clear"></div>
<div class="wrapper_menu">
  <div class="menu_container">
    <div class="menu_bar">
      <div id="MainNav"> <a href="#" class="mobile_nav closed">Pages Navigation Menu<span></span></a>
        <?php inkthemes_nav(); ?>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>