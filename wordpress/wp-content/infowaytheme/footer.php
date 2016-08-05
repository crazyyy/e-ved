<div class="clear"></div>
    <!--Start Footer-->
<div class="footer-wrapper">
        <div class="footer">
		<div class="container_24">
      <div class="grid_24">
		 <?php
                /* A sidebar in the footer? Yep. You can can customize
                 * your footer with four columns of widgets.
                 */
                get_sidebar('footer');
                ?>

        </div>
        <div class="clear"></div>
		</div>
        <div class="footersep"></div>
        <div class="clear"></div>
	  <div class="footer-bottom-wrapper">
        <div class="footer-bottom">
		<div class="container_24">
      <div class="grid_24">
          <div class="grid_10 alpha">
            <div class="copyrightinfo">
			<?php if (inkthemes_get_option('inkthemes_footertext') != '') { ?>
			<p><?php echo inkthemes_get_option('inkthemes_footertext'); ?> </p>
			 <?php } else { ?>
              <p><?php echo date('Y'); ?> &copy;&nbsp;<a href="http://www.inkthemes.com">InkThemes.com</a>. All right reserved </p>
			  <?php } ?>
            </div>
          </div>
          <div class="grid_14 omega">
            <div class="copyright_right"><a id="scroll-top" href="#top"><img src="<?php echo get_template_directory_uri(); ?>/images/topsroll-icon.png" alt="Topscroll Icon" /></a>
             </div>
          </div>
        </div>
        <div class="clear"></div>
		</div>
		</div>
      </div>
	   </div>
  </div>
</div>
</div>
<!-- container -->
<?php wp_footer(); ?>
</body>
</html>