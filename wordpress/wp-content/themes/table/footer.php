			<div class="clear"></div>
			<div id="footer">	
				<div class="left">
					&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'description' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. <?php _e('All rights reserved','themejunkie'); ?>.
				</div><!-- .left -->
				<div class="right">
					Тема от <a href="http://www.theme-junkie.com">Theme Junkie</a><?php if ($user_ID) : ?><?php else : ?> - 
<?php if (is_home()) { ?><a href="http://skinwp.ru/">Темы WordPress</a>
<?php } elseif (is_single()) {?><a href="http://builderbody.ru/">Бодибилдинг</a>
<?php } elseif (is_category()) {?><a href="http://dyba.biz/">Заработок в Интернете</a>
<?php } elseif (is_archive()) {?><a href="http://fihingclub.ru/">Рыбалка</a>
<?php } elseif (is_page()) {?><a href="http://myturtle.ru/">Черепахи</a>
<?php } else {?><?php } ?><?php endif; ?>
				</div><!-- .right -->
				<div class="clear"></div>
			</div><!-- #footer -->
		</div><!-- .inner-wrap -->
	</div> <!-- #wrapper -->
	<?php wp_footer(); ?>
</body>
</html>