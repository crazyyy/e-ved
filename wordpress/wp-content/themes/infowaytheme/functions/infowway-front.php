<?php
/**
  @ InfoWay front page function
  @ infoway_front()
  **/
function infoway_front(){
?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#refresh_img').click(function(){
		jQuery('#captcha_img').attr('src', '<?php echo get_template_directory_uri()."/functions/leads_form/captcha.php";?>');
		});
	jQuery('#signinForm').submit(function(){
	var get_captcha = jQuery('#vercode').val();		
	var comp = '<?php echo inkthemes_get_option('capt_en'); ?>';
	if(comp=="on")
			{
        	jQuery.ajax({
			type: 'POST',
			async: false,
			url: '<?php echo admin_url("admin-ajax.php"); ?>',
			data: {"action": "validate_captcha", "code":get_captcha },
            success: function(response){
				if(response=='yes'){
				 jQuery("#signinForm").unbind('submit');
                 jQuery("#signinForm").submit();
				
				}
				 else{
				jQuery('.captcha_color').css("display", "block");
				event.preventDefault();
				}
            }
	        });
			}
			else
			{ return true;
			}
		  });
		});
	
	</script>
<div class="signinformbox">
<div class="signupForm">
			  <?php if (inkthemes_get_option('inkthemes_leadhead') != '') { ?>
		 <h2 class="heading"><?php echo stripslashes(inkthemes_get_option('inkthemes_leadhead')); ?></h2>
		 <?php } else { ?>
              <h2 class="heading">Marketing Secrets Highly Profitable Online Small Secret Bonus</h2>
			  <?php } ?> 
			  <?php	
$a=new LeadCapture();
$captcha_option = inkthemes_get_option('capt_en');
$captcha_option_on = "on";
/*
if ($captcha_option === $captcha_option_on) {	
if($_POST['vercode']!=$_SESSION['captcha']){
$capfail=true;
}
}*/
if (inkthemes_get_option('inkthemes_email_sending') != '') {
$multiemail =inkthemes_get_option('inkthemes_email_sending');
}
if((isset($_POST['submit']))){
global $custom_table,$wpdb;
 //label1
   if(is_array($_POST['Name'])){ $lab2=$_POST['Name']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_lead_name($chk1); }
 else { $name=$a->set_lead_name($_POST['Name']); }
  //label2
   if(is_array($_POST['Email'])){ $lab2=$_POST['Email']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form1($chk1); }
 else{ $lead_form1=$a->set_form1($_POST['Email']);}
 //label3 
 if(is_array($_POST['Number'])){ $lab2=$_POST['Number']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form2($chk1); }
 else{$lead_form2=$a->set_form2($_POST['Number']);}
 //label4
 if(is_array($_POST['Message'])){ $lab2=$_POST['Message']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form3($chk1); }
  else{ $lead_form3=$a->set_form3($_POST['Message']);}
 //label5
 if(is_array($_POST['label1'])){ $lab2=$_POST['label1']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form4($chk1); }
 else{  $lead_form4=$a->set_form4($_POST['label1']); }
 //label6
 if(is_array($_POST['label2'])){ $lab2=$_POST['label2']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form5($chk1); }
 else{  $lead_form5=$a->set_form5($_POST['label2']); }
 //label7
 if(is_array($_POST['label3'])){ $lab2=$_POST['label3']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form6($chk1); }
 else {$lead_form6=$a->set_form6($_POST['label3']); }
 //label8
 if(is_array($_POST['label4'])){ $lab2=$_POST['label4']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form7($chk1); }
 else{  $lead_form7=$a->set_form7($_POST['label4']); }
 //label9
 if(is_array($_POST['label5'])){ $lab2=$_POST['label5']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form8($chk1); }
 else{  $lead_form8=$a->set_form8($_POST['label5']); }
 //label10
 if(is_array($_POST['label6'])){ $lab2=$_POST['label6']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form9($chk1); }
 else { $lead_form9=$a->set_form9($_POST['label6']); } 
 //label11
 if(is_array($_POST['label7'])){ $lab2=$_POST['label7']; $chk1= implode(",", $lab2);
 $lead_form5=$a->set_form10($chk1); }
 else {  $lead_form9=$a->set_form10($_POST['label7']); }
 //randvalue
 $rand=$a->set_randvalue($_POST['randvalue']);
$multiemail=$a->set_multiemail($multiemail);
if(isset($_POST['submit']))
{
global $wpdb;
$a->email_send();
$a->savetodb();
}
}

?> 
 <?php  if((!isset($_POST['submit']))){?>
              <form action="<?php get_template_directory(); ?>" id="signinForm" class="signinForm" method="post" autocomplete="on">
			  <?php global $custom_table, $wpdb, $table_info;
		        //$table_info=$table_prefix."table_info";
				$sqlfeatch = mysql_query("SELECT * from $custom_table CS JOIN $table_info I ON CS.text_value=I.lead_name order by I.arrange");
				while ($row = mysql_fetch_array($sqlfeatch)) {
                $id = $row["ID"];
				$texttype = $row["text_name"];
                 $textname = $row["text_value"];
                $textid = $row["text_label"];
				if($texttype=='text'){
				if ($textname=='Email') { ?>
				<input type="email" name="<?php echo $textid; ?>" id="uname" <?php  $br=new LeadCapture();  $browser =$br->user_browser(); if($browser == "ie"){?> onfocus="if (this.value == '<?php echo $textname; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $textname; ?>';}" value="<?php echo $textname; ?>"  <?php }?>  placeholder="<?php echo $textname; ?>" class="required requiredField email" required  />
				<?php } else{	?>				
				<input type="<?php echo $texttype; ?>" name="<?php echo $textid; ?>" id="uname" <?php  $br=new LeadCapture();  $browser =$br->user_browser(); if($browser == "ie"){?> onfocus="if (this.value == '<?php echo $textname; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $textname; ?>';}" value="<?php echo $textname; ?>"  <?php }?>  placeholder="<?php echo $textname; ?>" class="required requiredField" required  />
				 <?php } }                 	
				if($texttype=='textarea'){?>
			         <textarea name="<?php echo $textid; ?>" id="comments" rows="5" cols="30" <?php  $br=new LeadCapture();  $browser =$br->user_browser(); if($browser == "ie"){?> onfocus="if (this.value == '<?php echo $textname; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $textname; ?>';}" value="<?php echo $textname; ?>"  <?php }?>  placeholder="<?php echo $textname; ?>" class="required requiredField" required ><?php if($browser == "ie"){ echo $textname; } ?></textarea>
                <br/>
                
				<?php }
				
				if($texttype=='checkbox') { 
				echo "<div class='checkpanel'>";
				?>
				<label class="cname"><?php echo $textname.'</br>';?></label><?php
				global $wpdb,$field_table,$radio_table;
				$sqlfeatch2 = mysql_query("SELECT * FROM $field_table order by arrange");
				while ($row2 = mysql_fetch_array($sqlfeatch2)) {
				$rtext = $row2["text_name"];
				$fname = $row2["field_name"];
				$fnid = $row2["field_id"];
				$id2 = $row2["ID"];
				if($id==$id2){	?>
                
			<div class="checkinput">	<input type="checkbox" id="chkbox" name="<?php echo $textid; ?>[]" value="<?php echo $rtext; ?>"><label class="checkname"><?php echo $rtext; ?></label> </div>
               				<?php  } }
				echo "</div>";
				 }				
				 
				if($texttype=='radio'){ 
               echo "<div class='radiopanel'>"; ?>
				<label class="rname"> <?php echo $textname.'</br>'; ?> </label> <?php
				global $wpdb,$field_table,$radio_table;
				$sqlfeatch2 = mysql_query("SELECT * FROM $field_table order by arrange");				
				while ($row2 = mysql_fetch_array($sqlfeatch2)) {
				$rtext = $row2["text_name"];
				$fname = $row2["field_name"];
				$fnid = $row2["field_id"];
				$id2 = $row2["ID"];
				if($id==$id2){	?>                
				<input type="radio" required = "required" id="radiobox" name="<?php echo $textid; ?>" value="<?php echo $rtext; ?>"><label class="radioname"><?php echo $rtext; ?></label>
                       
					<?php  } 
					
					}
					echo "</div>";
				}
				if($texttype=='select'){ 
               echo "<div class='radiopanel'>"; ?>
				<label class="rname"> <?php echo $textname.'</br>'; ?> </label> <?php
				global $wpdb,$field_table,$radio_table;
				$sqlfeatch2 = mysql_query("SELECT * FROM $field_table order by arrange");	
				echo "<select id='select_option' name='".$textid."'>";
				while ($row2 = mysql_fetch_array($sqlfeatch2)) {
				$rtext = $row2["text_name"];
				$fname = $row2["field_name"];
				$fnid = $row2["field_id"];
				$id2 = $row2["ID"];
				if($id==$id2){	?>      
				<option value="<?php echo $rtext; ?>"><?php echo $rtext; ?></option>
				       
					<?php  } 
					
					}
					echo "</select></div>";
				}
				
				}
				$captcha_option_on = "on";
				if ($captcha_option === $captcha_option_on) {	
                echo "<div class='catchapanel'>";
				 $cap_path =get_template_directory_uri()."/functions/leads_form/captcha.php";
				//echo get_template_directory_uri();
				      $refresh_cap_path =get_template_directory_uri()."/functions/images/reload.png";
					  //echo get_stylesheet_directory();
				 ?>
        
	<input type="text"  name="vercode" id="vercode" value="" placeholder="Captcha Field" class="required requiredField"  required  /><span class="captcha_img"><img id="captcha_img"  src="<?php echo $cap_path; ?>"/><a id="refresh_img" href="javascript:void(0)"><img id="reload_img" src="<?php echo $refresh_cap_path; ?>"/></a></span>
	
				<?php 
				echo "<div class='captcha_color' style='margin-left:13px; display:none;'> <p>Enter valid captcha!</p></div>";
				echo "</div>";
				}
				?>	 
                <input  class="btnsubmit" type="submit" name="submit" value="Send Your Message"/>
				<input type="hidden" name="randvalue" id="randvalue" value="<?php echo rand(); ?>" />
				        </form>
			  <?php } ?>
            </div>
			</div>
			<?php } 
			
			function validate_captcha(){
session_start();
	// Get captcha value from session
	 $sessionCaptcha = $_SESSION['captcha'];
     $requestCaptcha=$_POST['code'];
	 if (strCmp(strToUpper($sessionCaptcha),strToUpper($requestCaptcha)) == 0)
		{echo "yes";
	    }
		else{
			echo "no";
	    }
die(0);
}
add_action( 'wp_ajax_validate_captcha', 'validate_captcha' );
add_action( 'wp_ajax_nopriv_validate_captcha', 'validate_captcha' );
			class Lead_InfoWay_Widget extends WP_Widget {
    function __construct() {
        $params = array(
            'name' => 'LeadsCapture InfoWay Widget',
            'description' => 'Just drag and drop the widget to LeadsCapture InfoWay in the page'
        );
        parent::__construct('Lead_InfoWay_Widget', '', $params);
    }
    public function widget($args,$instance) {
		        extract($args);
        $title 	= apply_filters('widget_title', '');
        $number = strip_tags($instance['number']);
		
		echo $before_widget; 
                if ( $title )
                echo $before_title . $title . $after_title;
infoway_front();
        //echo $after_widget;
           }
}
add_action('widgets_init', create_function('', 'return register_widget("Lead_InfoWay_Widget");'));

?>