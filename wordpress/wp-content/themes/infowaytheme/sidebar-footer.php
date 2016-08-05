 <div class="grid_6 alpha">
            <div class="footer_widget first">
			<?php if (is_active_sidebar('first-footer-widget-area')) : ?>
			<?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php else : ?>
              <h4>About This Site</h4>
              <p>
                <!--<span class="colorway">Colorway</span>-->
                A cras tincidunt,  is a  tellus et. Gravida scel sum sed iaculis, is a nunc non nam. Placerat sed hase llus, purus purus elit. </p>
				 <?php endif; ?>
            </div>
          </div>
          <div class="grid_6">
            <div class="footer_widget second">
			<?php if (is_active_sidebar('second-footer-widget-area')) : ?>
			 <?php dynamic_sidebar('second-footer-widget-area'); ?>
        <?php else : ?> 
              <h4>Archives Widget</h4>
              <ul>
                <li><a href="#">January 2010</a></li>
                <li><a href="#">December 2009</a></li>
                <li><a href="#">November 2009</a></li>
                <li><a href="#">October 2009</a></li>
              </ul>
			   <?php endif; ?>  
            </div>
          </div>
          <div class="grid_6">
            <div class="footer_widget third">
			<?php if (is_active_sidebar('third-footer-widget-area')) : ?>
			<?php dynamic_sidebar('third-footer-widget-area'); ?>
        <?php else : ?>
              <h4>Categories</h4>
              <ul >
                <li><a href="#">Entertainment</a></li>
                <li><a href="#">Technology</a></li>
                <li><a href="#">Template Design</a></li>
                <li><a href="#">Sports & Recreation</a></li>
                <li><a href="#">Jobs & Lifestyle</a></li>
              </ul>
			  <?php endif; ?>
            </div>
          </div>
          <div class="grid_6 omega">
            <div class="footer_widget last">
			<?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
			<?php dynamic_sidebar('fourth-footer-widget-area'); ?>
        <?php else : ?>
              <h4>Search Site</h4>
              <form class="searchform" action="#" method="get">
                <input onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}"  value="Search" type="text" value="" name="s" id="s" />
                <input type="submit" value="" name="submit"/>
              </form>
			   <?php endif; ?>
            </div>
          </div>
		  