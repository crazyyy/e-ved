<?php
/**
 * The template for displaying front page pages.
 *
 */
?>
<?php get_header(); ?>  
<div class="slider_wrapper">
 <input type="hidden" id="txt_name" value="<?php if (inkthemes_get_option('inkthemes_slider_speed') != '') { ?> <?php echo stripslashes(inkthemes_get_option('inkthemes_slider_speed')); ?>
		<?php } else { ?>10000<?php } ?>"/>
<div id="featured">
<div id="showcase" class="showcase">
<div class="showcase-slide">
<div class="showcase-content">
 <?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring1 = inkthemes_get_option('inkthemes_slideimage1');
            $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring1)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.         
            ?>
              <?php if ($check_img_ofset == 0 && inkthemes_get_option('inkthemes_slideimage1') != '') { ?>
                  <div class="slider-video"><?php echo inkthemes_get_option('inkthemes_slideimage1'); ?></div>
            <?php } else { ?> 
   <?php if (inkthemes_get_option('inkthemes_slideimage1') != '') { ?>
			<a href="<?php echo inkthemes_get_option('inkthemes_slidelink1'); ?>" >
				<img src="<?php echo inkthemes_get_option('inkthemes_slideimage1'); ?>"  alt="Slide 1"/>
			</a>
			<?php } else { ?>
		  <a href="http://www.inkthemes.com"><img src="<?php echo get_template_directory_uri(); ?>/images/1.png" alt="Slide 1"></a> 
		   <?php } } ?> 
</div>
<div class="showcase-thumbnail">
<div class="showcase-thumbnail-content">
<?php if (inkthemes_get_option('inkthemes_slidehead1') != '') { ?>
			<h3><?php echo stripslashes(inkthemes_get_option('inkthemes_slidehead1')); ?></h3>
			<?php } else { ?>
              <h3>Infoway Theme </h3>
			   <?php } ?>
			   <?php if (inkthemes_get_option('inkthemes_slidedesc') != '') { ?>
			    <p> <?php echo stripslashes(inkthemes_get_option('inkthemes_slidedesc')); ?></p>
                            <?php } else { ?>
              <p>Premium Wordpress Theme</p>
			  <?php } ?>
</div>
</div>
</div>
<?php if (inkthemes_get_option('inkthemes_slideimage2') != '') { ?>
<div class="showcase-slide">
<div class="showcase-content">
<?php
                //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                $mystring2 = inkthemes_get_option('inkthemes_slideimage2');
                $check_img_ofset = 0;
                foreach ($value_img as $get_value) {
                    if (preg_match("/$get_value/", $mystring2)) {
                        $check_img_ofset = 1;
                    }
                }
                // Note our use of ===.  Simply == would not work as expected
                // because the position of 'a' was the 0th (first) character.
                ?>
            <?php if ($check_img_ofset == 0 && inkthemes_get_option('inkthemes_slideimage2') != '') { ?>
                <div class="slider-video"><?php echo inkthemes_get_option('inkthemes_slideimage2'); ?></div>
            <?php } else { ?> 
		   <?php if (inkthemes_get_option('inkthemes_slideimage2') != '') { ?>
		<a href="<?php echo inkthemes_get_option('inkthemes_slidelink2'); ?>" >
			<img src="<?php echo inkthemes_get_option('inkthemes_slideimage2'); ?>"  alt="Slide 2"/>
		</a>
          <?php } else { }?>
		  <?php }  ?> 
</div>
<div class="showcase-thumbnail">
	<div class="showcase-thumbnail-content">
		<?php if (inkthemes_get_option('inkthemes_slidehead2') != '') { ?>
			<h3><?php echo stripslashes(inkthemes_get_option('inkthemes_slidehead2')); ?></h3>
			<?php } else { ?>
              <h3>Single Click Install</h3>
			  <?php } ?>
			  <?php if (inkthemes_get_option('inkthemes_slidedesc2') != '') { ?>
			    <p> <?php echo stripslashes(inkthemes_get_option('inkthemes_slidedesc2')); ?></p>
                <?php } else { ?>
              <p>Themes by InkThemes.com</p>
			  <?php } ?>
	</div>
</div>
</div>
  <?php  } ?> 
  <!-- Third Content -->
		  <?php if (inkthemes_get_option('inkthemes_slideimage3') != '') { ?>
  				<div class="showcase-slide">
<div class="showcase-content">
  <?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring3 = inkthemes_get_option('inkthemes_slideimage3');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring3)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.
            ?>
            <?php if ($check_img_ofset == 0 && inkthemes_get_option('inkthemes_slideimage3') != '') { ?>
                <div class="slider-video"><?php echo inkthemes_get_option('inkthemes_slideimage3'); ?></div>
            <?php } else { ?>
		  <?php if (inkthemes_get_option('inkthemes_slideimage3') != '') { ?>
		<a href="<?php echo inkthemes_get_option('inkthemes_slidelink3'); ?>" >
			<img src="<?php echo inkthemes_get_option('inkthemes_slideimage3'); ?>"  alt="Slide 3"/>
		</a>
          <?php } else { }?>
		  <?php } ?> 
</div>
<div class="showcase-thumbnail">
	<div class="showcase-thumbnail-content">
<?php if (inkthemes_get_option('inkthemes_slidehead3') != '') { ?>
			<h3><?php echo stripslashes(inkthemes_get_option('inkthemes_slidehead3')); ?></h3>
			<?php } else { ?>
              <h3>Easily Customozable</h3>
			  <?php } ?>
			  <?php if (inkthemes_get_option('inkthemes_slidedesc3') != '') { ?>
			    <p> <?php echo stripslashes(inkthemes_get_option('inkthemes_slidedesc3')); ?></p>
                <?php } else { ?>
              <p>Best Businesses Theme Forever</p>
			  <?php } ?> 
	</div>
</div>
</div>
<?php } ?> 
          <!-- Fourth Content -->
		    <?php if (inkthemes_get_option('inkthemes_slideimage4') != '') { ?>
				<div class="showcase-slide">
<div class="showcase-content">
<?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring4 = inkthemes_get_option('inkthemes_slideimage4');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring4)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.
            ?>
            <?php if ($check_img_ofset == 0 && inkthemes_get_option('inkthemes_slideimage4') != '') { ?>
                <div class="slider-video"><?php echo inkthemes_get_option('inkthemes_slideimage4'); ?></div>
            <?php } else { ?>
		  <?php if (inkthemes_get_option('inkthemes_slideimage4') != '') { ?>
		<a href="<?php echo inkthemes_get_option('inkthemes_slidelink4'); ?>" >
			<img src="<?php echo inkthemes_get_option('inkthemes_slideimage4'); ?>"  alt="Slide 4"/>
		</a>
          <?php } else { }?>
		   <?php } ?> 
</div>
<div class="showcase-thumbnail">
	<div class="showcase-thumbnail-content">
<?php if (inkthemes_get_option('inkthemes_slidehead4') != '') { ?>
			<h3><?php echo stripslashes(inkthemes_get_option('inkthemes_slidehead4')); ?></h3>
			<?php } else { ?>
              <h3>Premium Wordpress theme</h3>
			    <?php } ?>
			    <?php if (inkthemes_get_option('inkthemes_slidedesc4') != '') { ?>
			    <p> <?php echo stripslashes(inkthemes_get_option('inkthemes_slidedesc4')); ?></p>
                <?php } else { ?>
              <p>Hey Guys, I am a back again to about </p>
			  <?php } ?>
	</div>
</div>
</div>
 <?php } ?> 
          <!-- Fifth Slider -->
		      <?php if (inkthemes_get_option('inkthemes_slideimage5') != '') { ?>
				<div class="showcase-slide">
<div class="showcase-content">
<?php
            //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
            $mystring5 = inkthemes_get_option('inkthemes_slideimage5');
            $check_img_ofset = 0;
            foreach ($value_img as $get_value) {
                if (preg_match("/$get_value/", $mystring5)) {
                    $check_img_ofset = 1;
                }
            }
            // Note our use of ===.  Simply == would not work as expected
            // because the position of 'a' was the 0th (first) character.
            ?>
            <?php if ($check_img_ofset == 0 && inkthemes_get_option('inkthemes_slideimage5') != '') { ?>
                <div class="slider-video"><?php echo inkthemes_get_option('inkthemes_slideimage5'); ?></div>
            <?php } else { ?>
		  <?php if (inkthemes_get_option('inkthemes_slideimage5') != '') { ?>
		<a href="<?php echo inkthemes_get_option('inkthemes_slidelink5'); ?>" >
			<img src="<?php echo inkthemes_get_option('inkthemes_slideimage5'); ?>"  alt="Slide 5"/>
		</a>
          <?php } else { }?> 
		   <?php } ?> 
</div>
<div class="showcase-thumbnail">
	<div class="showcase-thumbnail-content">
		 <?php if (inkthemes_get_option('inkthemes_slidehead5') != '') { ?>
			<h3><?php echo stripslashes(inkthemes_get_option('inkthemes_slidehead5')); ?></h3>
			<?php } else { ?>
              <h3>Wordpress theme</h3>
			  	<?php } ?> 
   			  <?php if (inkthemes_get_option('inkthemes_slidedesc5') != '') { ?>
			    <p> <?php echo stripslashes(inkthemes_get_option('inkthemes_slidedesc5')); ?></p>
                <?php } else { ?>
              <p>With Single Click Installation</p>
			  <?php } ?>
	</div>
</div>
</div>
<?php } ?> 
			</div>
			</div>
			<div class="slider_shadow"></div>
        <div class="infotag"> 
		<?php if (inkthemes_get_option('inkthemes_main_heading') != '') { ?>
		<h1><?php echo stripslashes(inkthemes_get_option('inkthemes_main_heading')); ?></h1>
		 <?php } else { ?>
		<h1><?php _e('Monthly Fees, No Multiple Packages, No Hidden Costs. Grab Any Theme by 
          InkThemes for JUST $45 & Prepar0e Yourself To Be Astonished.','infoway'); ?></h1>
		  <?php } ?>
		  </div>
			</div>
	   <div class="clear"></div>
	   <div class="contentbox">
        <div class="grid_16 alpha">
          <div class="feturebox">
            <div class="featurebox_inner">
              <!-- <div class="grid_5 alpha">-->
              <div class="featurebox_desc first">
			  <?php if (inkthemes_get_option('inkthemes_firsthead') != '') { ?>
		 <h2><a href="<?php echo inkthemes_get_option('inkthemes_link1'); ?>"><?php echo stripslashes(inkthemes_get_option('inkthemes_firsthead')); ?></a></h2>
		 <?php } else { ?>
     <h2><a href="#"><?php _e('Easily Customozable','infoway'); ?></a></h2>
	 <?php } ?>
	 <?php if (inkthemes_get_option('inkthemes_firstdesc') != '') { ?>
                    <p><?php echo stripslashes(inkthemes_get_option('inkthemes_firstdesc')); ?></p>
                <?php } else { ?>
                    <p><?php _e('Hey Guys, I am a back again to about the hidden profit within local offline businesses. Here in this article would first like to tell something about what exactly is offline or local business.','infoway'); ?></p>
                <?php } ?> 
                <a href="<?php echo inkthemes_get_option('inkthemes_link1'); ?>" class="readmore"> <?php if (inkthemes_get_option('inkthemes_link1_text') != '') { 
                 echo stripslashes(inkthemes_get_option('inkthemes_link1_text'));?>&nbsp;<span class="button-tip"></span> <?php  } else { ?>                         
                  <?php echo READ_MORE; ?><span class="button-tip"></span>
                     <?php    }?>
</a></div>
              <!--   </div>-->
              <!-- <div class="grid_5">-->
              <div class="featurebox_desc second">
			  <?php if (inkthemes_get_option('inkthemes_secondhead') != '') { ?>
		 <h2><a href="<?php echo inkthemes_get_option('inkthemes_link2'); ?>"><?php echo stripslashes(inkthemes_get_option('inkthemes_secondhead')); ?></a></h2>
		 <?php } else { ?>
     <h2><a href="<?php echo inkthemes_get_option('inkthemes_link2'); ?>"><?php _e('Wordpress themes','infoway'); ?></a></h2>
	 <?php } ?>
	 <?php if (inkthemes_get_option('inkthemes_seconddesc') != '') { ?>
                    <p><?php echo stripslashes(inkthemes_get_option('inkthemes_seconddesc')); ?></p>
                <?php } else { ?>
                    <p><?php _e('Hey Guys, I am a back again to about the hidden profit within local offline businesses. Here in this article would first like to tell something about what exactly is offline or local business.','infoway'); ?></p>
                <?php } ?>      
			                 
                <a href="<?php echo inkthemes_get_option('inkthemes_link2'); ?>" class="readmore"> <?php if (inkthemes_get_option('inkthemes_link2_text') != '') { 
                 echo stripslashes(inkthemes_get_option('inkthemes_link2_text'));?>&nbsp;<span class="button-tip"></span> <?php         } else { ?>                         
                  <?php echo READ_MORE; ?><span class="button-tip"></span>
                     <?php    }?>
</a></div>
              <!-- </div>-->
              <!-- <div class="grid_5 omega">-->
              <div class="featurebox_desc third">
			  <?php if (inkthemes_get_option('inkthemes_thirdhead') != '') { ?>
		 <h2><a href="<?php echo inkthemes_get_option('inkthemes_link3'); ?>"><?php echo stripslashes(inkthemes_get_option('inkthemes_thirdhead')); ?></a></h2>
		 <?php } else { ?>
    <h2><a href="<?php echo inkthemes_get_option('inkthemes_link3'); ?>"><?php _e('Wordpress themes','infoway'); ?></a></h2>
	 <?php } ?>
	 <?php if (inkthemes_get_option('inkthemes_thirddesc') != '') { ?>
                    <p><?php echo stripslashes(inkthemes_get_option('inkthemes_thirddesc')); ?></p>
                <?php } else { ?>
                    <p><?php _e('Hey Guys, I am a back again to about the hidden profit within local offline businesses. Here in this article would first like to tell something about what exactly is offline or local business.','infoway'); ?></p>
                <?php } ?>      
			  
               <a href="<?php echo inkthemes_get_option('inkthemes_link3'); ?>" class="readmore"> <?php if (inkthemes_get_option('inkthemes_link3_text') != '') { 
                 echo stripslashes(inkthemes_get_option('inkthemes_link3_text'));?>&nbsp;<span class="button-tip"></span> <?php  } else { ?>                         
                  <?php echo READ_MORE; ?><span class="button-tip"></span>
                     <?php } ?>
</a></div>
              <!--</div>-->
            </div>
          </div>
          <div class="clear"></div>
          <!--carousel slider	-->          
          <?php
		query_posts('post_type=post');
		 while (have_posts()) : the_post(); ?>
          <?php
          $content1 = $post->post_content;          
          $searchimages1 = '~<img [^>]* />~';
          preg_match_all( $searchimages1, $content1, $pics1 );
          $iNumberOfPics1 = count($pics1[0]);  
		  $car_img = 'off';
          if ($iNumberOfPics1 > 0){
          $car_img = 'on';
			break;
          } else {
			$car_img = 'off';
         }
          endwhile;           
          wp_reset_query(); 
          ?>
          <?php if ((have_posts()) && post_type_exists( 'post') && (($car_img == 'on') || (has_post_thumbnail()))){ ?>
            <div id="carousel-full">
            <div class="carousel-posts">
              <ul>
            <?php
			 $args = array(
			'post_status' => 'publish',
            'posts_per_page' => -1,
			'order' => 'DESC'
			);
			$query = new WP_Query($args); 
			?>
			<?php while ($query->have_posts()) : $query->the_post(); ?>
			<?php
			$content = $post->post_content;
			$searchimages = '~<img [^>]* />~';
			/*Run preg_match_all to grab all the images and save the results in $pics*/
			preg_match_all( $searchimages, $content, $pics );
			// Check to see if we have at least 1 image
			$iNumberOfPics = count($pics[0]);
			if (($iNumberOfPics > 0) || (has_post_thumbnail())){ 
		?>
                <li>
                   <div class="thumbnail"> 				
				  <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                         <?php inkthemes_get_thumbnail(200, 140); ?>
                    <?php } else { ?>
                        <?php inkthemes_get_image(200, 140); ?> 
                        <?php
                    }
                    ?>
				  <span></span>
				  </div>
                  <div class="wrap">
                    <h6> <a href="<?php the_permalink() ?>" rel="bookmark" title="infoway Images"><?php the_title(); ?></a> </h6>
                    <p> <?php the_category(', '); 				
?></p>					
                  </div>
		 </li>
		 <?php
		 }
		endwhile;                	
		// Reset Query
		wp_reset_query();
		?>           
              </ul>
            </div>
            <div class="carousel-nav"> <a class="prev"  href="#"><span>prev</span></a> <a class="next"  href="#"><span>next</span></a> </div>
          </div>
          	 <?php
		}              	
		?>  
          <!-- /End Carousel -->          
        </div>
        <div class="grid_8 omega">
		        <div class="signinwidgetarea">
					   <?php if (is_active_sidebar('home-page-right-feature-widget-area')) : ?>
					    <div class="signinformbox1 widget">
            <?php dynamic_sidebar('home-page-right-feature-widget-area'); ?>
			</div>
			</div>
        <?php else : ?>
		  
            <?php infoway_front(); ?>
          
		  </div>	
		    <?php endif; ?>
        </div>					
		     </div>
           <div class="testimonial">
          <div class="grid_24">
<?php if (inkthemes_get_option('inkthemes_testimonial_head') != '') { ?>
                    <h2><?php echo stripslashes(inkthemes_get_option('inkthemes_testimonial_head')); ?></h2>
                <?php } else { ?>
                    <h2><?php _e('What Our Clients Say','infoway'); ?></h2>
                <?php } ?>  	
 <?php if (inkthemes_get_option('inkthemes_testimonial_desc') != '') { ?>
                    <p><?php echo stripslashes(inkthemes_get_option('inkthemes_testimonial_desc')); ?></p>
                <?php } else { ?>
                    <p><?php _e('In at tortor eget purus commodo aliquet eget non tortor. In consequat, ante first like to tell something about what exactly is offline iaculis, nc erat pretium  at  Venenatis arcu ipsum  ac metus. Aliquam pharetra dapibus.','infoway'); ?></p> 
                      <?php } ?> 
                    
          </div>
		  </div>
        </div>
	 </div>


	 <?php get_footer(); ?>