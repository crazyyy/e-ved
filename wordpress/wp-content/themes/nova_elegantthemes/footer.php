		<?php if ( !is_home() ) { ?>
			<div id="footer-widgets">
				<div class="container">
					<div id="widgets-wrapper" class="clearfix">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
						<?php endif; ?>
					</div> <!-- end #widgets-wrapper -->
				</div> <!-- end .container -->
			</div> <!-- end #footer-widgets -->
		<?php } ?>

		<div id="footer">
			<div class="container clearfix">
				<p id="copyright"><?php _e('Designed by ','Nova'); ?> <a href="wordpresshelpme.ru" title="Premium WordPress Themes">Elegant WordPress Themes</a> | Локализация <a target="_blank" title="шаблоны wordpress" href="http://wordpresshelpme.ru"><img src="http://favicon.yandex.net/favicon/morestyle.ru" alt="темы wordpress"/></a></p>
			</div> <!-- end .container -->
		</div> <!-- end #footer -->
	</div> <!-- end #center-highlight-->

	<?php include(TEMPLATEPATH . '/includes/scripts.php'); ?>

	<?php wp_footer(); ?>
</body>
</html>