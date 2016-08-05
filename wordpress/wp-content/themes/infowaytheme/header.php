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
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php
        wp_head();
        ?>
    </head>
    <body <?php body_class(); ?> id="regal_body" style="<?php if (infoway_get_option('infoway_bodybg') != '') { ?> background: fixed url('<?php echo infoway_get_option('infoway_bodybg'); ?>') <?php } ?>">
        <div class="wrapper">
            <div class="body_wrapper">
                <div class="topmain_wrapper">
                    <div class="topinfobar" id="topinfobox">
                        <div class="container_24">
                            <div class="grid_24">
                                <div class="grid_20 alpha"> <span class="info">
                                        <?php if (infoway_get_option('infoway_topinfobar_text') != '') { ?>
                                            <p><?php echo stripslashes(infoway_get_option('infoway_topinfobar_text')); ?></p>
                                        <?php } else { ?>
                                            <p>
                                                <?php _e('Your most important notice information for site visitors with a link can come here.', 'infoway'); ?>
                                            </p>
                                        <?php } ?>
                                    </span></div>
                                <div class="grid_2">
                                    <div class="siteinfourl"><a href="<?php echo infoway_get_option('infoway_topinfobar_url'); ?>">
                                            <?php if (infoway_get_option('infoway_topinfobar_sitename') != '') { ?>
                                                <p><?php echo stripslashes(infoway_get_option('infoway_topinfobar_sitename')); ?></p>
                                            <?php } else { ?>
                                                <p>
                                                    <?php _e('Click Here', 'infoway'); ?>
                                                </p>
                                            <?php } ?>
                                        </a></div>
                                </div>
                                <div class="grid_2 omega">
                                    <div class="closeicon"><a href="javascript:hide_all();"><img src="<?php echo get_template_directory_uri(); ?>/images/close-icon.png"  /></a></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="toptip"></div>
                        </div>
                    </div>
                </div>
                <div class="container_24">
                    <div class="grid_24">
                        <div class="header" id="top">
                            <div class="grid_12 alpha">
                                <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php if (infoway_get_option('infoway_logo') != '') { ?><?php echo infoway_get_option('infoway_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
                            </div>
                            <div class="grid_12 omega">&nbsp;&nbsp;&nbsp;
                                <div class="contactinfo"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-icon.png" />&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php if ('' != infoway_get_option('infoway_topright')) { ?>
                                        <span class="calldetails"> <?php echo stripslashes(infoway_get_option('infoway_topright')); ?> </span> <br/>
                                        <a class="btn" href="tel:<?php echo stripslashes(infoway_get_option('infoway_contact_number')); ?>"><span><?php _e('Tap To Call', 'infoway'); ?></span></a>
                                    <?php } else {
                                        ?>
                                        <span class="calldetails"><?php _e('Call 24 Hours: 1.888.222.5847', 'infoway'); ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="wrapper_menu">
                            <div class="menu_container">
                                <div class="menu_bar">
                                    <div id="MainNav"> <a href="#" class="mobile_nav closed"><?php _e('Pages Navigation Menu', 'infoway'); ?><span></span></a>
                                        <?php infoway_nav(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>