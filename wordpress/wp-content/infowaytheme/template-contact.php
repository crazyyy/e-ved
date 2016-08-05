<?php
/*
  Template Name: Contact Page
 */
?>
<?php get_header(); ?>
<?php
$nameError = '';
$emailError = '';
$commentError = '';
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = 'Please enter your name.';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
    if (trim($_POST['email']) === '') {
        $emailError = 'Please enter your email address.';
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $emailError = 'You entered an invalid email address.';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    if (trim($_POST['comments']) === '') {
        $commentError = 'Please enter a message.';
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }
    if (!isset($hasError)) {
        $emailTo = get_option('tz_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }
        $subject = '[PHP Snippets] From ' . $name;
        $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
        $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }
}
?>
<script>
jQuery(document).ready(function(){
jQuery("#contactForm").validate();
});
</script>

   <div class="heading_wrapper">
        <div class="heading_container">
          <div class="page-heading">
	<h1 class="page-title"><a href="#"><?php the_title(); ?></a>&nbsp;<img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png"  alt="arrow"/></h1>	  
	 </div>
        </div>
      </div>
	  <div class="clear"></div>
	   <div class="page-content">
        <div class="grid_16 alpha">
          <div class="content-bar">
            <div class="contact-page">
 			   <?php if (have_posts()) : the_post(); ?>
                <h1 class="page-title"><a href="#"><?php the_title(); ?></a></h1>
            <?php endif; ?>	
                <?php the_content(); ?>
				 <?php if (isset($emailSent) && $emailSent == true) { ?>
                    <div class="thanks">
                        <p>Thanks, your email was sent successfully.</p>
                    </div>
                <?php } else { ?>
                    <?php if (isset($hasError) || isset($captchaError)) { ?>
                        
                    <?php } ?>
				
              <form action="<?php the_permalink(); ?>" id="contactForm" class="contactForm" method="post">
			  <label for="name"> Name </label>
                <input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName']))
                    echo $_POST['contactName']; ?>" placeholder="" class="required requiredField" />
					<?php if ($nameError != '') { ?>
                            <span class="error"> <?php echo $nameError; ?> </span>
                        <?php } ?>
                <br />
               
                <label for="email"> Email </label>
                <input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))
                        echo $_POST['email']; ?>" placeholder="" class="required requiredField email" />
				<?php if ($emailError != '') { ?>
                            <span class="error"> <?php echo $emailError; ?> </span>
                            <br/>
                        <?php } ?>		
                <br />
                
                 <label for="comments"> Comments </label>
                <textarea name="comments" id="commentsText" rows="20" cols="30" placeholder=""  class="required requiredField"><?php
                    if (isset($_POST['comments'])) {
                        if (function_exists('stripslashes')) {
                            echo stripslashes($_POST['comments']);
                        } else {
                            echo $_POST['comments'];
                        }
                    }?></textarea>
					
				<?php if ($commentError != '') { ?>
                            <span class="error"> <?php echo $commentError; ?> </span>
                            <br/>
                        <?php } ?>	
				
                <br />
                <br />
                <input class="submit" type="submit" value="Send Message"/>
                <input type="hidden" name="submitted" id="submitted" value="true" />
              </form>
		<?php } ?>	  
            </div>
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