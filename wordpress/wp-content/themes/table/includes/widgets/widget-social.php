<?php
/**
 * Theme Junkie Social Widget
 */
 
class TJ_Widget_Social extends WP_Widget {

	function TJ_Widget_Social() {
		$widget_ops = array('classname' => 'widget_social', 'description' => __('Display your social profiles'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('social', __('ThemeJunkie - Social Profiles'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$feedburner_id = $instance['feedburner_id'];
		$twitter_id = $instance['twitter_id'];
		$facebook_id = $instance['facebook_id'];
		?>
		
<!--begin of social widget--> 
	<div id="subscribe">
		<ul class="subscribe-icons">
			<li class="subscribe-twitter"><a href="http://twitter.com/<?php echo $twitter_id; ?>" rel="nofollow" target="_blank"><?php _e('Twitter', 'themejunkie'); ?></a></li>
			<li class="subscribe-facebook"><a href="http://www.facebook.com/<?php echo $facebook_id; ?>" rel="nofollow" target="_blank"><?php _e('Facebook', 'themejunkie'); ?></a></li>
			<li class="subscribe-email"><a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedburner_id; ?>&amp;loc=en_US" rel="nofollow" target="_blank"><?php _e('Email', 'themejunkie'); ?></a></li>
			<li class="subscribe-rss"><a href="http://feeds.feedburner.com/<?php echo $feedburner_id; ?>" rel="nofollow" target="_blank"><?php _e('RSS', 'themejunkie'); ?></a></li>			
		</ul> <!--end .subscribe-icons-->
		
		<div class="clear"></div>
		
	</div> <!--end #subscribe-->
<!--end of social widget--> 

		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['feedburner_id'] = $new_instance['feedburner_id'];
		$instance['twitter_id'] =  $new_instance['twitter_id'];
		$instance['facebook_id'] =  $new_instance['facebook_id'];
		return $instance;
	}

	function form( $instance ) { 
		$instance = wp_parse_args( (array) $instance, array( 'feedburner_id' => 'themejunkie', 'twitter_id' => 'theme_junkie', 'facebook_id' => 'themejunkie' ) );
		$feedburner_id = $instance['feedburner_id'];
		$twitter_id = format_to_edit($instance['twitter_id']);
		$facebook_id = format_to_edit($instance['facebook_id']);
	?>
			
		<p><label for="<?php echo $this->get_field_id('feedburner_id'); ?>"><?php _e('Enter your Feedburner ID:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('feedburner_id'); ?>" name="<?php echo $this->get_field_name('feedburner_id'); ?>" type="text" value="<?php echo $feedburner_id; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Enter your Twitter ID:'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" value="<?php echo $twitter_id; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('facebook_id'); ?>"><?php _e('Enter your Facebook ID:'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('facebook_id'); ?>" value="<?php echo $facebook_id; ?>" /></p>
		<?php }
}

register_widget('TJ_Widget_Social');

