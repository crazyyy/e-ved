<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
        // VARIABLES
        $themename = 'Infoway Pro Theme Option';
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = inkthemes_get_option('of_options');
		// Front page on/off
		  $file_rename = array("on" => "On", "off" => "Off");
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        //Stylesheet Reader
        $alt_stylesheets = array("default" => "default", "black" => "black", "blue" => "blue", "green" => "green", "brown" => "brown", "pink" => "pink", "purple" => "purple", "red" => "red", "darkgreen" => "darkgreen", "yellow" => "yellow");
		$lan_stylesheets = array("Default" => "Default", "rtl" => "rtl");	
		
		$captcha_option = array("on" => "On", "off" => "Off");
		
		
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_stylesheet_directory_uri() . '/images/';

        $options = array();
        $options[] = array("name" => "General Settings",
            "type" => "heading");

        $options[] = array("name" => "Custom Logo",
            "desc" => "Upload a logo for your Website. The recommended size for the logo is 340px width x 46px height.",
            "id" => "inkthemes_logo",
            "type" => "upload");

        $options[] = array("name" => "Custom Favicon",
            "desc" => "Specify a 16px x 16px image that will represent your website's favicon.",
            "id" => "inkthemes_favicon",
            "type" => "upload");
			
		 $options[] = array("name" => " Background Image",
            "desc" => "Choose a suitable background image that will complement your website.",
            "id" => "inkthemes_bodybg",
            "std" => "",
            "type" => "upload");
			
		$options[] = array("name" => "Top Right Contact Details",
            "desc" => "Mention the contact details here which will be displayed on the top right corner of Website.",
            "id" => "inkthemes_topright",
            "std" => "",
            "type" => "textarea");
			
		$options[] = array("name" => "Contact Number for Tap to Call Feature",
            "desc" => "Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.",
            "id" => "inkthemes_contact_number",
            "std" => "",
            "type" => "text");
        
        $options[] = array("name" => "Google Tracking Code",
            "desc" => "Paste your Google Analytics (or other) tracking code here.",
            "id" => "inkthemes_analytics",
            "std" => "",
            "type" => "textarea");
			
	$options[] = array("name" => "Front Page On/Off",
            "desc" => "If the front page option is active then home page will appear otherwise blog page will display.",
            "id" => "re_nm",
            "std" => "on",
            "type" => "radio",
            "options" => $file_rename);
			
	 $options[] = array("name" => "Leads Capture Settings",
          "type" => "heading");
		  
	$options[] = array("name" => "Lead Capture Form Heading",
            "desc" => "Mention the heading for the lead capture form that will display on the sidebar.",
			"id" => "inkthemes_leadhead",
            "std" => "",
            "type" => "textarea");
			
	$options[] = array("name" => "E-mail Address",
	"desc" => "E-mail Address- Mention multiple e-mail ids here to receive mails from lead capture form. Add comma and space to separate two email ids. For eg:- example@gmail.com, example1@gmail.com ",
	"id" => "inkthemes_email_sending",
	"std" => "",
	"type" => "textarea");
	
	$options[] = array("name" => "Captcha On/Off",
	"desc" => "By default captcha is activated. Turn it off to deactivate this.",
	"id" => "capt_en",
	"std" => "on",
	"type" => "radio",
	"options" => $captcha_option);	
	 
	
		//front Page Topinfo Bar  Setting		
		$options[] = array("name" => "Top Infobar Setting",
            "type" => "heading");		
			
		$options[] = array("name" => "Top Infobar Heading",
            "desc" => "Here you can mention the text which will appear on the top of the website.",
            "id" => "inkthemes_topinfobar_text",
            "std" => "",
            "type" => "textarea");

		$options[] = array("name" => "Top Infobar Link Text",
            "desc" => "Mention the text for the button.",
            "id" => "inkthemes_topinfobar_sitename",
            "std" => "",
            "type" => "text");		
		
		$options[] = array("name" => "Top Infobar Link URL",
            "desc" => "Mention the URL for the button to redirect the user to any page.",
            "id" => "inkthemes_topinfobar_url",
            "std" => "",
            "type" => "text");
			
        //Home Page Slider Setting
        $options[] = array("name" => "Slider Settings",
            "type" => "heading");			
			
		$options[] = array("name" => "Slider Speed",
            "desc" => "Set the speed of the slider in milliseconds. For e.g. if you want to set the speed of the slider for 8 seconds then enter 8000 in the field or if you want to set the slider speed for 2.5 seconds then enter 2500 in the field.",
            "id" => "inkthemes_slider_speed",
            "std" => "8000",
            "type" => "text");	
					
         //First Slider
        $options[] = array("name" => "First Slider Image",
            "desc" => "Upload the First image for the slider. Recommended size is 950px width x 370px height.",
            "id" => "inkthemes_slideimage1",
            "std" => "",
            "type" => "upload");
      	$options[] = array("name" => "First Slider Heading",
            "desc" => "Mention the heading for the First slider.",
            "id" => "inkthemes_slidehead1",
            "std" => "",
            "type" => "text");
		$options[] = array("name" => "First Slider Description",
            "desc" => "Here mention a short description for the First slider heading.",
            "id" => "inkthemes_slidedesc",
            "std" => "",
            "type" => "textarea");
			
		$options[] = array("name" => "Link for First slider",
            "desc" => "Mention the URL for First image.",
            "id" => "inkthemes_slidelink1",
            "std" => "",
            "type" => "text");		
				
        //Second Slider
        $options[] = array("name" => "Second Slider Image",
            "desc" => "Upload the Second image for the slider. Recommended size is 950px width x 370px height.",
            "id" => "inkthemes_slideimage2",
            "std" => "",
            "type" => "upload");
			$options[] = array("name" => "Second Slider Heading",
            "desc" => "Mention the heading for the Second slider.",
            "id" => "inkthemes_slidehead2",
            "std" => "",
            "type" => "text");
		$options[] = array("name" => "Second Slider Description",
            "desc" => "Here mention a short description for the Second slider heading.",
            "id" => "inkthemes_slidedesc2",
            "std" => "",
            "type" => "textarea");
		$options[] = array("name" => "Link for Second slider",
            "desc" => "Mention the URL for Second image.",
            "id" => "inkthemes_slidelink2",
            "std" => "",
            "type" => "text");			
      
			
			
		//Third Slider	
        $options[] = array("name" => "Third Slider Image",
            "desc" => "Upload the Third image for the slider. Recommended size is 950px width x 370px height.",
            "id" => "inkthemes_slideimage3",
            "std" => "",
            "type" => "upload");
			$options[] = array("name" => "Third Slider Heading",
            "desc" => "Mention the heading for the Third slider.",
            "id" => "inkthemes_slidehead3",
            "std" => "",
            "type" => "text");
		$options[] = array("name" => "Third Slider Description",
            "desc" => "Here mention a short description for the Third slider heading.",
            "id" => "inkthemes_slidedesc3",
            "std" => "",
            "type" => "textarea");
		$options[] = array("name" => "Link for Third slider",
            "desc" => "Mention the URL for Third image.",
            "id" => "inkthemes_slidelink3",
            "std" => "",
            "type" => "text");			
       
        //Fourth Slider
        $options[] = array("name" => "Fourth Slider Image",
            "desc" => "Upload the Fourth image for the slider. Recommended size is 950px width x 370px height.",
            "id" => "inkthemes_slideimage4",
            "std" => "",
            "type" => "upload");
			$options[] = array("name" => "Fourth Slider Heading",
            "desc" => "Mention the heading for the Fourth slider.",
            "id" => "inkthemes_slidehead4",
            "std" => "",
            "type" => "text");
		$options[] = array("name" => "Fourth Slider Description",
            "desc" => "Here mention a short description for the Fourth slider heading.",
            "id" => "inkthemes_slidedesc4",
            "std" => "",
            "type" => "textarea");
		$options[] = array("name" => "Link for Fourth slider",
            "desc" => "Mention the URL for Fourth image.",
            "id" => "inkthemes_slidelink4",
            "std" => "",
            "type" => "text");		

		        //Fifth Slider
        $options[] = array("name" => "Fifth Slider Image",
            "desc" => "Upload the Fifth image for the slider. Recommended size is 950px width x 370px height.",
            "id" => "inkthemes_slideimage5",
            "std" => "",
            "type" => "upload");
			
			$options[] = array("name" => "Fifth Slider Heading",
            "desc" => "Mention the heading for the Fifth slider.",
            "id" => "inkthemes_slidehead5",
            "std" => "",
            "type" => "text");
			
		$options[] = array("name" => "Fifth Slider Description",
            "desc" => "Here mention a short description for the Fifth slider heading.",
            "id" => "inkthemes_slidedesc5",
            "std" => "",
            "type" => "textarea");
			
		$options[] = array("name" => "Link for Fifth slider",
            "desc" => "Mention the URL for Fifth image.",
            "id" => "inkthemes_slidelink5",
            "std" => "",
            "type" => "text");	
       
      		
       	//Homepage Feature Area
		 $options[] = array("name" => "Feature Settings",
            "type" => "heading");
						
		$options[] = array("name" => "Feature page Heading",
            "desc" => "Mention the text (punch line) for feature heading here which will display just below the slider.",
            "id" => "inkthemes_main_heading",
            "std" => "",
            "type" => "textarea");
			
        $options[] = array("name" => "Front Page Feature Section Starts From Here.",
            "type" => "saperate",
            "class" => "saperator");
        //Left Feature Area
            $options[] = array("name" => "First Feature Heading",
            "desc" => "Here mention the heading for the First column.",
            "id" => "inkthemes_firsthead",
            "std" => "",
            "type" => "text");
	
        $options[] = array("name" => "First Feature Description",
            "desc" => "Mention the short description for the First column heading.",
            "id" => "inkthemes_firstdesc",
            "std" => "",
            "type" => "textarea");
        
       $options[] = array("name" => "First Feature Link Text",
            "desc" => "Mention the text here that will be used to link the pages.",
            "id" => "inkthemes_link1_text",
            "std" => "",
            "type" => "text");
			
	$options[] = array("name" => "First Feature Link URL",
            "desc" => "Mention the URL here to link the text to any pages.",
            "id" => "inkthemes_link1",
            "std" => "",
            "type" => "text");

        //Second Feature Separetor
            $options[] = array("name" => "Second Feature Heading",
            "desc" => "Here mention the heading for the Second column.",
            "id" => "inkthemes_secondhead",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Second Feature Description",
            "desc" => "Mention the short description for the Second column heading.",
            "id" => "inkthemes_seconddesc",
            "std" => "",
            "type" => "textarea");
        
        $options[] = array("name" => "Second Feature Link Text",
            "desc" => "Mention the text here that will be used to link the pages.",
            "id" => "inkthemes_link2_text",
            "std" => "",
            "type" => "text");
			
	$options[] = array("name" => "Second Feature Link URL",
            "desc" => "Mention the URL here to link the text to any pages.",
            "id" => "inkthemes_link2",
            "std" => "",
            "type" => "text");

        //Third Feature Separetor
        $options[] = array("name" => "Third Feature Heading",
            "desc" => "Here mention the heading for the Third column.",
            "id" => "inkthemes_thirdhead",
            "std" => "",
            "type" => "text");
        
        $options[] = array("name" => "Third Feature Description",
            "desc" => "Mention the short description for the Third column heading.",
            "id" => "inkthemes_thirddesc",
            "std" => "",
            "type" => "textarea");
        
        $options[] = array("name" => "Third Feature Link Text",
            "desc" => "Mention the text here that will be used to link the pages.",
            "id" => "inkthemes_link3_text",
            "std" => "",
            "type" => "text");
			
	$options[] = array("name" => "Third Feature Link URL",
            "desc" => "Mention the URL here to link the text to any pages.",
            "id" => "inkthemes_link3",
            "std" => "",
            "type" => "text");		
       
   		 //Home Page Bottom Feature Separetor
	 $options[] = array("name" => "Testimonial Settings",
            "type" => "heading");
			 
        $options[] = array("name" => "Bottom Feature Start From Here.",
            "type" => "saperate",
            "class" => "saperator");
			
	$options[] = array("name" => "Testimonial Heading",
            "desc" => "Mention the testimonial heading here to tell the visitors about your business in short.",
            "id" => "inkthemes_testimonial_head",
            "std" => "",
            "type" => "textarea");	

	$options[] = array("name" => "Testimonial Description",
            "desc" => "Here mention the short description of your business so that the visitors can understand your business.",
            "id" => "inkthemes_testimonial_desc",
            "std" => "",
            "type" => "textarea");
			
		

//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
        $options[] = array("name" => "Styling Options",
            "type" => "heading");
        $options[] = array("name" => "Theme Stylesheet",
            "desc" => "Select any desired color for the theme from different available colors.",
            "id" => "inkthemes_altstylesheet",
            "std" => "black",
            "type" => "select",
            "options" => $alt_stylesheets);
			
		$options[] = array("name" => "Theme Language",
            "desc" => "By default the theme content displays from left to right which you can change to right to left i.e. switching it to sRTL.",
            "id" => "infoway_lanstylesheet",
            "std" => "Default",
            "type" => "select",
            "options" => $lan_stylesheets);	
		
        $options[] = array("name" => "Custom CSS",
            "desc" => "Quickly add some custom CSS code to your theme by writing the code in this block.",
            "id" => "inkthemes_customcss",
            "std" => "",
            "type" => "textarea");

//****=============================================================================****//
//****-------------This code is used for creating social logos options-------------****//					
//****=============================================================================****//
		$options[] = array("name" => "Social Icons",
            "type" => "heading");
			
		 $options[] = array("name" => "Twitter URL",
            "desc" => "Mention the URL of your Twitter here.",
            "id" => "inkthemes_twitter",
            "std" => "",
            "type" => "text");
		
        $options[] = array("name" => "Facebook URL",
            "desc" => "Mention the URL of your Facebook here.",
            "id" => "inkthemes_facebook",
            "std" => "",
            "type" => "text");  
			
		$options[] = array("name" => "Google+ URL",
            "desc" => "Mention the URL of your Google+ here.",
            "id" => "inkthemes_google",
            "std" => "",
            "type" => "text");
        
        $options[] = array("name" => "LinkDin Feed URL",
            "desc" => "Mention the URL of your LinkDin here",
            "id" => "inkthemes_link",
            "std" => "",
            "type" => "text");
			
		$options[] = array("name" => "YouTube Feed URL",
            "desc" => "Mention the URL of your YouTube here",
            "id" => "inkthemes_youtube",
            "std" => "",
            "type" => "text");
			
		$options[] = array("name" => "Pinterest Feed URL",
            "desc" => "Mention the URL of your Pinterest here",
            "id" => "inkthemes_pin",
            "std" => "",
            "type" => "text");
			
			

//****=============================================================================****//
//****-------------This code is used for creating Bottom Footer Setting options-------------****//					
//****=============================================================================****//			
        $options[] = array("name" => "Footer Settings",
            "type" => "heading");
        $options[] = array("name" => "Footer Text",
            "desc" => "Write the text here that will be displayed on the footer i.e. at the bottom of the Website.",
            "id" => "inkthemes_footertext",
            "std" => "",
            "type" => "textarea");
        //------------------------------------------------------------------//
//-------------This code is used for creating SEO description-------//							
//------------------------------------------------------------------//						
        $options[] = array("name" => "SEO Options",
            "type" => "heading");
        $options[] = array("name" => "Meta Keywords (comma separated)",
            "desc" => "Meta keywords provide search engines with additional information about topics that appear on your site. This only applies to your home page. Keyword Limit Maximum 8",
            "id" => "inkthemes_keyword",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Meta Description",
            "desc" => "You should use meta descriptions to provide search engines with additional information about topics that appear on your site. This only applies to your home page.Optimal Length for Search Engines, Roughly 155 Characters",
            "id" => "inkthemes_description",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Meta Author Name",
            "desc" => "You should write the full name of the author here. This only applies to your home page.",
            "id" => "inkthemes_author",
            "std" => "",
            "type" => "textarea");

        inkthemes_update_option('of_template', $options);
        inkthemes_update_option('of_themename', $themename);
        inkthemes_update_option('of_shortname', $shortname);
    }

}
?>
