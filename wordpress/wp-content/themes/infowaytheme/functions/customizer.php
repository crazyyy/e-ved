<?php
class Infoway_Customizer {
    public static function Infoway_Register($wp_customize) {
        self::Infoway_Sections($wp_customize);
        self::Infoway_Controls($wp_customize);
    }
    public static function Infoway_Sections($wp_customize) {
        /**
         * General Section
         */
        $wp_customize->add_section('general_setting_section', array(
            'title' => __('General Settings', 'infoway'),
            'description' => __('Allows you to customize header logo, favicon, background etc settings for Infoway Theme.', 'infoway'), //Descriptive tooltip
            'panel' => '',
            'priority' => '10',
            'capability' => 'edit_theme_options'
            )
        );
        /**
         * Home Page Top Infobar Settings
         */
        $wp_customize->add_section('home_top_infobar_area', array(
            'title' => __('Top infobar Settings', 'infoway'),
            'description' => __('Allows you to setup Top Infobar section for Infoway Theme.', 'infoway'), //Descriptive tooltip
            'panel' => '',
            'priority' => '11',
            'capability' => 'edit_theme_options'
          )
        );
        /**
         * Home Page Top Feature Area
         */
        $wp_customize->add_section('home_top_feature_area', array(
            'title' => __('Top Feature Area', 'infoway'),
            'description' => __('Allows you to setup Top feature area section for Infoway Theme.', 'infoway'), //Descriptive tooltip
            'panel' => '',
            'priority' => '12',
            'capability' => 'edit_theme_options'
          )
        );
        /**
         * Add panel for home page feature area
         */
        $wp_customize->add_panel('home_page_feature_area_panel', array(
            'title' => __('Home Page Feature Area', 'infoway'),
            'description' => __('Allows you to setup home page feature area section for Infoway Theme.', 'infoway'),
            'priority' => '13',
            'capability' => 'edit_theme_options'
        ));
        /**
         * Home Page Feature Main Heading
         */
        $wp_customize->add_section('home_feature_main_heading', array(
            'title' => __('Home Page Main Heading', 'infoway'),
            'description' => __('Allows you to setup main heading Of home page area section for Infoway Theme.', 'infoway'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 1
         */
        $wp_customize->add_section('home_feature_area_section1', array(
            'title' => __('First Feature Area', 'infoway'),
            'description' => __('Allows you to setup first feature area section for Infoway Theme.', 'infoway'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page feature area 2
         */
        $wp_customize->add_section('home_feature_area_section2', array(
            'title' => __('Second Feature Area', 'infoway'),
            'description' => __('Allows you to setup second feature area section for Infoway Theme.', 'infoway'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );

        /**
         * Home Page feature area 3
         */
        $wp_customize->add_section('home_feature_area_section3', array(
            'title' => __('Third Feature Area', 'infoway'),
            'description' => __('Allows you to setup third feature area section for Infoway Theme.', 'infoway'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Home Page testimonial Section
         */
        $wp_customize->add_section('home_page_test_feature', array(
            'title' => __('Home Page Testimonial Area', 'infoway'),
            'description' => __('Allows you to setup Testimonial section for Infoway Theme.', 'infoway'),
            'panel' => 'home_page_feature_area_panel',
            'priority' => '',
            'capability' => 'edit_theme_options'
                )
        );
        /**
         * Style Section
         */
        $wp_customize->add_section('style_section', array(
            'title' => __('Style Setting', 'infoway'),
            'description' => __('Allows you to setup Top Footer Section Text for Infoway Theme.', 'infoway'),
            'panel' => '',
            'priority' => '14',
            'capability' => 'edit_theme_options'
                )
        );
    }
    public static function Infoway_Section_Content() {

        $section_content = array(
            'general_setting_section' => array(
                'infoway_logo',
                'infoway_favicon',
                'infoway_bodybg',
                'infoway_topright',
                'infoway_contact_number'
            ),
            'home_top_infobar_area' => array(
                'infoway_topinfobar_text',
                'infoway_topinfobar_sitename',
                'infoway_topinfobar_url'
            ),
            'home_top_feature_area' => array(
                'infoway_slideimage1',
                'infoway_slidelink1'
            ),
            'home_feature_main_heading' => array(
                 'infoway_main_heading'
            ),
            'home_feature_area_section1' => array(
                'infoway_firsthead',
                'infoway_firstdesc',
                'infoway_link1'
            ),
            'home_feature_area_section2' => array(
                'infoway_secondhead',
                'infoway_seconddesc',
                'infoway_link2',
            ),
            'home_feature_area_section3' => array(
                'infoway_thirdhead',
                'infoway_thirddesc',
                'infoway_link3'
            ),
             'home_page_test_feature' => array(
                'infoway_testimonial_head',
                 'infoway_testimonial_desc'
            ),
             'style_section' => array(
                'infoway_customcss'
            )
        );
        return $section_content;
    }

    public static function Infoway_Settings() {

        $infoway_settings = array(
            'infoway_logo' => array(
                'id' => 'infoway_options[infoway_logo]',
                'label' => __('Custom Logo', 'infoway'),
                'description' => __('Choose your own logo. Optimal Size: 221px Wide by 84px Height.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/logo.png'
            ),
            'infoway_favicon' => array(
                'id' => 'infoway_options[infoway_favicon]',
                'label' => __('Custom Favicon', 'infoway'),
                'description' => __('Here you can upload a Favicon for your Website. Specified size is 16px x 16px.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),     
            'infoway_bodybg' => array(
                'id' => 'infoway_options[infoway_bodybg]',
                'label' => __('Body Background Image', 'infoway'),
                'description' => __('Select image to change your website background', 'infoway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => ''
            ),  
            'infoway_topright' => array(
                'id' => 'infoway_options[infoway_topright]',
                'label' => __('Top Right Contact Details', 'infoway'),
                'description' => __('Enter your contact detail/number to display it at the top right corner.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Call 24 Hours: 1.888.222.5847', 'infoway')
            ), 
            'infoway_contact_number' => array(
                'id' => 'infoway_options[infoway_contact_number]',
                'label' => __('Contact No.', 'infoway'),
                'description' => __('Enter your contact number on which you want to receive calls 
			(Feature active only when site is viewed on moblie devices).
			example: +91-1800-548-783', 'infoway'),
                'type' => 'option',
                'setting_type' => 'text',
                'default' => __('1.888.222.5847', 'infoway')
            ), 
            // Top Infobar
             'infoway_topinfobar_text' => array(
                'id' => 'infoway_options[infoway_topinfobar_text]',
                'label' => __('Top Infobar Text', 'infoway'),
                'description' => __('top infobar text for Infobar Section', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Your most important notice information for site visitors with a link can come here.', 'infoway', 'infoway')
            ), 
            'infoway_topinfobar_sitename' => array(
                'id' => 'infoway_options[infoway_topinfobar_sitename]',
                'label' => __('Top Infobar button Url', 'infoway'),
                'description' => __('Enter your sitename', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Click Here', 'infoway')
            ), 
            'infoway_topinfobar_url' => array(
                'id' => 'infoway_options[infoway_topinfobar_url]',
                'label' => __('Top Infobar button text', 'infoway'),
                'description' => __('Enter your siteurl', 'infoway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => ''
            ),
            // Top Feature Area
            'infoway_slideimage1' => array(
                'id' => 'infoway_options[infoway_slideimage1]',
                'label' => __('Upload Home Page Image', 'infoway'),
                'description' => __('Choose Image for Top feature Area. Optimal size is 950px wide and 363px height.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'image',
                'default' => get_template_directory_uri() . '/images/1.jpg'
            ),
            'infoway_slidelink1' => array(
                'id' => 'infoway_options[infoway_slidelink1]',
                'label' => __('Home Page Image Link', 'infoway'),
                'description' => __('Enter yout link url for Home page image', 'infoway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
             // Home Page Main Heading
            'infoway_main_heading' => array(
                'id' => 'infoway_options[infoway_main_heading]',
                'label' => __('Feature Page Heading', 'infoway'),
                'description' => __('Enter your text for Feature page heading. just below the slider section', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('No Cost, Free To Use & With Single Click Installation. Use Infoway Now & Make beautiful Website & Astonish Everyone.', 'infoway')
            ),
            // First Feature Box
            'infoway_firsthead' => array(
                'id' => 'infoway_options[infoway_firsthead]',
                'label' => __('First Feature Heading', 'infoway'),
                'description' => __('Mention the heading for First Feature Box that will showcase your business services.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Easy to Customize', 'infoway')
            ),       
            'infoway_firstdesc' => array(
                'id' => 'infoway_options[infoway_firstdesc]',
                'label' => __('First Feature Description', 'infoway'),
                'description' => __('Write short description for your First Feature Box.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('An Infoway is a WordPress theme which is easily customizable. You can customize the theme as per your requirement. The theme provides an exiting benefit to your websites. It also features a clean design and sure you will be more happier to use it', 'infoway')
            ),
            'infoway_link1' => array(
                'id' => 'infoway_options[infoway_link1]',
                'label' => __('First feature Link', 'infoway'),
                'description' => __('Enter your text for First feature Link.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
            // Second Feature Box
            'infoway_secondhead' => array(
                'id' => 'infoway_options[infoway_secondhead]',
                'label' => __('Second Feature Heading', 'infoway'),
                'description' => __('Mention the heading for Second Feature Box that will showcase your business services.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Build Site Quickly', 'infoway')
            ),       
            'infoway_seconddesc' => array(
                'id' => 'infoway_options[infoway_seconddesc]',
                'label' => __('Second Feature Description', 'infoway'),
                'description' => __('Write short description for your Second Feature Box.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('The Infoway Wordpress Theme is highly optimized for speed, so that your website loads faster as compared to others. The themes is compatible with all major browsers. Also it provides eye captivating appearance to your website.', 'infoway')
            ),
            'infoway_link2' => array(
                'id' => 'infoway_options[infoway_link2]',
                'label' => __('Second feature Link', 'infoway'),
                'description' => __('Enter your text for Second feature Link.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
             // Third Feature Box
             'infoway_thirdhead' => array(
                'id' => 'infoway_options[infoway_thirdhead]',
                'label' => __('Third Feature Heading', 'infoway'),
                'description' => __('Mention the heading for Third Feature Box that will showcase your business services.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Search Optimized', 'infoway')
            ),       
            'infoway_thirddesc' => array(
                'id' => 'infoway_options[infoway_thirddesc]',
                'label' => __('Third Feature Description', 'infoway'),
                'description' => __('Write short description for your Third Feature Box.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('A Premium WordPress Theme with single click installation. Just a click and your website is ready to use. Infoway theme is better suitable for any business or personal website. The theme is compatible with various niches.', 'infoway')
            ),
            'infoway_link3' => array(
                'id' => 'infoway_options[infoway_link3]',
                'label' => __('Third feature Link', 'infoway'),
                'description' => __('Enter your text for Third feature Link.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'link',
                'default' => '#'
            ),
             'infoway_testimonial_head' => array(
                'id' => 'infoway_options[infoway_testimonial_head]',
                'label' => __('Testimonial Heading', 'infoway'),
                'description' => __('Enter your text Testimonial Heading.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('What Our Clients Say', 'infoway')
            ),
            'infoway_testimonial_desc' => array(
                'id' => 'infoway_options[infoway_testimonial_desc]',
                'label' => __('Testimonial Description', 'infoway'),
                'description' => __('Enter your text Testimonial Description.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => __('Infoway was one of the most easiest theme to work with. My Clients loved their websites built using Infoway Theme. I highly recommend it to anyone want to build a business site.', 'infoway')
            ),
            'infoway_customcss' => array(
                'id' => 'infoway_options[infoway_customcss]',
                'label' => __('Custom CSS', 'infoway'),
                'description' => __('Quickly add your custom CSS code to your theme by writing the code in this block.', 'infoway'),
                'type' => 'option',
                'setting_type' => 'textarea',
                'default' => ''
            ),            
        );
        return $infoway_settings;
    }
    public static function Infoway_Controls($wp_customize) {
        $sections = self::Infoway_Section_Content();
        $settings = self::Infoway_Settings();
        foreach ($sections as $section_id => $section_content) {
            foreach ($section_content as $section_content_id) {
                switch ($settings[$section_content_id]['setting_type']) {
                    case 'image':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'infoway_sanitize_url');
                        $wp_customize->add_control(new WP_Customize_Image_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id']
                                )
                        ));
                        break;
                    case 'text':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'infoway_sanitize_text');
                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));
                        break;
                    case 'textarea':
                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'infoway_sanitize_textarea');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'textarea'
                                )
                        ));
                        break;
                    case 'link':

                        self::add_setting($wp_customize, $settings[$section_content_id]['id'], $settings[$section_content_id]['default'], $settings[$section_content_id]['type'], 'infoway_sanitize_url');

                        $wp_customize->add_control(new WP_Customize_Control(
                                $wp_customize, $settings[$section_content_id]['id'], array(
                            'label' => $settings[$section_content_id]['label'],
                            'description' => $settings[$section_content_id]['description'],
                            'section' => $section_id,
                            'settings' => $settings[$section_content_id]['id'],
                            'type' => 'text'
                                )
                        ));

                        break;
                    default:
                        break;
                }
            }
        }
    }
    public static function add_setting($wp_customize, $setting_id, $default, $type, $sanitize_callback) {
        $wp_customize->add_setting($setting_id, array(
            'default' => $default,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array('Infoway_Customizer', $sanitize_callback),
            'type' => $type
                )
        );
    }
    /**
     * adds sanitization callback funtion : textarea
     * @package Infoway
     */
    public static function infoway_sanitize_textarea($value) {
        $value = esc_html($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : url
     * @package Infoway
     */
    public static function infoway_sanitize_url($value) {
        $value = esc_url($value);
        return $value;
    }
    /**
     * adds sanitization callback funtion : text
     * @package Infoway
     */
    public static function infoway_sanitize_text($value) {
        $value = sanitize_text_field($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : email
     * @package Infoway
     */
    public static function infoway_sanitize_email($value) {
        $value = sanitize_email($value);
        return $value;
    }

    /**
     * adds sanitization callback funtion : number
     * @package Infoway
     */
    public static function infoway_sanitize_number($value) {
        $value = preg_replace("/[^0-9+ ]/", "", $value);
        return $value;
    }

}
// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('Infoway_Customizer', 'Infoway_Register'));
function inkthemes_registers() {
          wp_register_script( 'inkthemes_jquery_ui', '//code.jquery.com/ui/1.11.0/jquery-ui.js', array("jquery"), true  );
	wp_register_script( 'inkthemes_customizer_script', get_template_directory_uri() . '/js/inkthemes_customizer.js', array("jquery","inkthemes_jquery_ui"), true  );
	wp_enqueue_script( 'inkthemes_customizer_script' );
	wp_localize_script( 'inkthemes_customizer_script', 'ink_advert', array(
	'pro' => __('View PRO version','infoway'),
	'url' => esc_url('http://www.inkthemes.com/wp-themes/infoway-wordpress-theme-with-built-in-lead-capture/'),
	'support_text' => __('Need Help!','infoway'),
	'support_url' => esc_url('http://www.inkthemes.com/lets-connect/'),
	)			
	);
}
add_action( 'customize_controls_enqueue_scripts', 'inkthemes_registers' );
