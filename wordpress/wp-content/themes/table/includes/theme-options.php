<?php 

$themename = "Table";
$shortname = "table";

$admincpMainTabs = array('general','navigation','layout','ad','seo','integration','doc');

$cats_array = get_categories('hide_empty=0');
$pages_array = get_pages('hide_empty=0');
$pages_number = count($pages_array);

$site_pages = array();
$site_cats = array();

foreach ($pages_array as $pagg) {
	$site_pages[$pagg->ID] = htmlspecialchars($pagg->post_title);
	$pages_ids[] = $pagg->ID;
}

foreach ($cats_array as $categs) {
	$site_cats[$categs->cat_ID] = $categs->cat_name;
	$cats_ids[] = $categs->cat_ID;
}

$options = array (

	array( "name" => "nav-general",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "general-1",
				   "type" => "subnav-tab",
				   "desc" => "General Settings"),	

		array( "type" => "subnavtab-end",),

		array( "name" => "general-1",
			   "type" => "subcontent-start",),

			array( "name" => "Стиль",
				   "id" => $shortname."_theme_stylesheet",
				   "type" => "select",
				   "std" => "default.css",
				   "options" => array("default.css"),
				   "desc" => "Измените стиль css по умолчанию",),	 			   
			   
			array( "name" => "Логотип",
				   "id" => $shortname."_logo",
				   "type" => "upload",
				   "std" => get_template_directory_uri() . '/images/logo.png',
				   "desc" => "Загрузите собственный логотип."
			),

			array( "name" => "Включить текст под логотипом",
                   "id" => $shortname."_text_logo_enable",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => "Включить текст под логотипом"),			

			array( "name" => "Favicon",
				   "id" => $shortname."_favicon",
				   "type" => "upload",
				   "std" => get_template_directory_uri() . '/images/favicon.png',
				   "desc" => "Размер должен быть 16px x 16px PNG/Gif"
			),

			array( "type" => "clearfix",),

			array( "name" => "Почта для контактов",
				   "id" => $shortname."_email",
				   "type" => "text",
				   "std" => 'info@yourdomain.com',
				   "desc" => "Почта для контактов",
				   ),	
			
			array( "name" => "Свой CSS",
				   "id" => $shortname."_custom_css",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "Добавьте свои блоки css",),

			array( "type" => "clearfix",),

		array( "name" => "general-1",
			   "type" => "subcontent-end",),

		array( "type" => "subnavtab-end",),					   

	array(  "name" => "nav-general",
			"type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "nav-navigation",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "navigation-1",
				   "type" => "subnav-tab",
				   "desc" => "Pages"),

			array( "name" => "navigation-2",
				   "type" => "subnav-tab",
				   "desc" => "Categories"),

		array( "type" => "subnavtab-end",),

		array( "name" => "navigation-1",
			   "type" => "subcontent-start",),

			array( "name" => "Включить страницы в меню навигации",
				   "id" => $shortname."_menupages",
				   "type" => "checkboxes",
				   "std" => "",
				   "desc" => "Включить страницы в меню навигации",
				   "usefor" => "pages",
				   "options" => $pages_ids),

			array( "name" => "Выпадающее меню",
            "id" => $shortname."_enable_dropdowns",
            "type" => "checkbox",
            "std" => "on",
			"desc" => "Включить выпадающее меню"),

			array( "name" => "Показывать ссылку на главную страницу",
            "id" => $shortname."_home_link",
            "type" => "checkbox2",
            "std" => "on",
			"desc" => "Показывать ссылку на главную страницу"),

			array( "type" => "clearfix",),
			
			array( "name" => "Число выпадающего списка",
            "id" => $shortname."_tiers_shown_pages",
            "type" => "text",
            "std" => "4",
			"desc" => "Настройте глубину выпадающего списка"),

			array( "name" => "Сортировка меню",
                   "id" => $shortname."_sort_pages",
                   "type" => "select",
                   "std" => "post_title",
				   "desc" => "Сортировка меню",
                   "options" => array("post_title", "menu_order","post_date","post_modified","ID","post_author","post_name")),

			array( "name" => "Сортировка по возрастанию/убыванию",
                   "id" => $shortname."_order_page",
                   "type" => "select",
                   "std" => "asc",
				   "desc" => "Сортировка по возрастанию/убыванию",
                   "options" => array("asc", "desc")),

			array( "type" => "clearfix",),


		array( "name" => "navigation-1",
			   "type" => "subcontent-end",),

		array( "name" => "navigation-2",
			   "type" => "subcontent-start",),

			array( "name" => "Включить рубрики в меню навигации",
				   "id" => $shortname."_menucats",
				   "type" => "checkboxes",
				   "std" => "",
				   "desc" => "Включить рубрики в меню навигации",
				   "usefor" => "categories",
				   "options" => $cats_ids),

			array( "name" => "Выпадающее меню",
            "id" => $shortname."_enable_dropdowns_categories",
            "type" => "checkbox",
            "std" => "on",
			"desc" => "Включить выпадающее меню"),

			array( "name" => "Скрыть пустые категории",
            "id" => $shortname."_categories_empty",
            "type" => "checkbox",
            "std" => "on",
			"desc" => "Скрыть пустые категории"),

			array( "type" => "clearfix",),

			array( "name" => "Число выпадающего списка",
            "id" => $shortname."_tiers_shown_categories",
            "type" => "text",
            "std" => "4",
			"desc" => "Настройте глубину выпадающего списка"),

			array( "type" => "clearfix",),

		    array( "name" => "Сортировка меню с рубриками",
                   "id" => $shortname."_sort_cat",
                   "type" => "select",
                   "std" => "name",
				   "desc" => "Сортировка меню с рубриками",
                   "options" => array("name", "ID", "slug", "count", "term_group")),

			array( "name" => "Сортировка по возрастанию/убыванию",
                   "id" => $shortname."_order_cat",
                   "type" => "select",
                   "std" => "asc",
				   "desc" => "Сортировка по возрастанию/убыванию",
                   "options" => array("asc", "desc")),

		array( "name" => "navigation-2",
			   "type" => "subcontent-end",),

	array( "name" => "nav-navigation",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "nav-layout",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "layout-1",
				   "type" => "subnav-tab",
				   "desc" => "Homepage"),

			array( "name" => "layout-2",
				   "type" => "subnav-tab",
				   "desc" => "Single Post / Page"),

		array( "type" => "subnavtab-end",),

		array( "name" => "layout-1",
			   "type" => "subcontent-start",),

            array( "name" => "Включить слайдер на главной",
                   "id" => $shortname."_slider_enable",
                   "type" => "checkbox",
                   "std" => "on",
				   "desc" => "desc."),

            array( "name" => "Кол-во слайдов к показу",
                   "id" => $shortname."_slides_num",
                   "type" => "text",
                   "std" => "3",
				   "desc" => "desc."),

			array( "name" => "Метки для записей, которые включены в сладйер",
                   "id" => $shortname."_featured_post_tags",
                   "type" => "text",
                   "std" => "featured, headline",
				   "desc" => "desc."),						   

            array( "name" => "Включить новостной блок на главной",
                   "id" => $shortname."_news_ticker_enable",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "desc."),

            array( "name" => "Кол-во записей в новостном блоке",
                   "id" => $shortname."_news_ticker_num",
                   "type" => "text",
                   "std" => "3",
                   "desc" => "desc."),

			array( "name" => "Метки для записей, которые включены в новостной блок",
                   "id" => $shortname."_news_ticker_tags",
                   "type" => "text",
                   "std" => "breaking, headline",
				   "desc" => "desc."),		

            array( "name" => "Укорачивать записи на главной",
                   "id" => $shortname."_entry_excerpt_enable",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "desc."),					   	  				   
	
			array( "type" => "clearfix",),

		array( "name" => "layout-1",
			   "type" => "subcontent-end",),			   

		array( "name" => "layout-2",
			   "type" => "subcontent-start",),  

			array( "name" => "Показывать похожие записи",
                   "id" => $shortname."_show_related_posts",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "desc. "),      			   

			array( "name" => "Показывать информацию об авторе",
                   "id" => $shortname."_show_author_box",
                   "type" => "checkbox",
                   "std" => "on",
                   "desc" => "desc. "),                                  
				   
			array( "name" => "Показывать комментарии к записям",
            "id" => $shortname."_show_post_comments",
            "type" => "checkbox2",
            "std" => "on",
			"desc" => ""),

			array( "name" => "Показывать комментарии на страницах",
            "id" => $shortname."_show_page_comments",
            "type" => "checkbox",
            "std" => "false",
			"desc" => ""),

			array( "type" => "clearfix",),

		array( "name" => "layout-2",
			   "type" => "subcontent-end",),

	array( "name" => "nav-layout",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//


//-------------------------------------------------------------------------------------//
	array( "name" => "nav-seo",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "seo-1",
				   "type" => "subnav-tab",
				   "desc" => "Homepage SEO",),

			array( "name" => "seo-2",
				   "type" => "subnav-tab",
				   "desc" => "Single Post Page SEO",),

			array( "name" => "seo-3",
				   "type" => "subnav-tab",
				   "desc" => "Index Page SEO",),

		array( "type" => "subnavtab-end",),

		array( "name" => "seo-1",
			   "type" => "subcontent-start",),

			array( "name" => "Включить собственные заголовки",
				   "id" => $shortname."_seo_home_title",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "",),

			array( "name" => "Включить meta description",
				   "id" => $shortname."_seo_home_description",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "",),

			array( "name" => "Включить meta keywords",
				   "id" => $shortname."_seo_home_keywords",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "",),

			array( "name" => "Включить канонические URL's",
				   "id" => $shortname."_seo_home_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "",),

			array( "type" => "clearfix",),

			array( "name" => "Свой заголовок главной страницы",
				   "id" => $shortname."_seo_home_titletext",
				   "type" => "text",
				   "std" => "",
				   "desc" => "",),

			array( "name" => "meta description на главной",
				   "id" => $shortname."_seo_home_descriptiontext",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "",),

			array( "name" => "meta keywords на главной",
				   "id" => $shortname."_seo_home_keywordstext",
				   "type" => "text",
				   "std" => "",
				   "desc" => "",),

			array( "name" => "Если собственные заголовки отключены, выберите автогенерацию",
				   "id" => $shortname."_seo_home_type",
				   "type" => "select",
				   "std" => "BlogName | Blog description",
				   "options" => array("BlogName | Blog description", "Blog description | BlogName", "BlogName only"),
				   "desc" => "",),

			array( "name" => "Определить характер BlogName и Post title",
				   "id" => $shortname."_seo_home_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => "",),

		array( "name" => "seo-1",
			   "type" => "subcontent-end",),

		array( "name" => "seo-2",
			   "type" => "subcontent-start",),

			array( "name" => "Включить собственные заголовки",
				   "id" => $shortname."_seo_single_title",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "",),

			array( "name" => "Включить собственное description",
				   "id" => $shortname."_seo_single_description",
				   "type" => "checkbox2",
				   "std" => "false",
				   "desc" => "",),

			array( "type" => "clearfix",),

			array( "name" => "Включить собственные keywords",
				   "id" => $shortname."_seo_single_keywords",
				   	"type" => "checkbox",
				   "std" => "false",
				   "desc" => "",),

			array( "name" => "Включить канонические URL's",
				   "id" => $shortname."_seo_single_canonical",
				   "type" => "checkbox2",
				   "std" => "false",
				   "desc" => "",),

			array( "type" => "clearfix",),

			array( "name" => "Поле, которое будет использоваться для заголовоков",
				   "id" => $shortname."_seo_single_field_title",
				   "type" => "text",
				   "std" => "seo_title",
				   "desc" => "",),

			array( "name" => "Поле, которое будет использоваться для description",
				   "id" => $shortname."_seo_single_field_description",
				   "type" => "text",
				   "std" => "seo_description",
				   "desc" => "",),

			array( "name" => "Поле, которое будет использоваться для keywords",
				   "id" => $shortname."_seo_single_field_keywords",
				   "type" => "text",
				   "std" => "seo_keywords",
				   "desc" => "",),

			array( "name" => "Если собственные заголовки отключены, выберите автогенерацию",
				   "id" => $shortname."_seo_single_type",
				   "type" => "select",
				   "std" => "Post title | BlogName",
				   "options" => array("Post title | BlogName", "BlogName | Post title", "Post title only"),
				   "desc" => "",),

			array( "name" => "Определить характер BlogName и Post title",
				   "id" => $shortname."_seo_single_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => " | или -",),

		array( "name" => "seo-2",
			   "type" => "subcontent-end",),

		array( "name" => "seo-3",
				   "type" => "subcontent-start",),

			array( "name" => "Включить канонические URL's",
				   "id" => $shortname."_seo_index_canonical",
				   "type" => "checkbox",
				   "std" => "false",
				   "desc" => "",),

			array( "name" => "Включить meta descriptions",
				   "id" => $shortname."_seo_index_description",
				   	"type" => "checkbox2",
				   "std" => "false",
				   "desc" => "",),

			array( "type" => "clearfix",),

			array( "name" => "Выбрать автогенерацию заголовков",
				   "id" => $shortname."_seo_index_type",
				   "type" => "select",
				   "std" => "Category name | BlogName",
				   "options" => array("Category name | BlogName", "BlogName | Category name", "Category name only"),
				   "desc" => "",),

			array( "name" => "Определить характер BlogName и Post title",
				   "id" => $shortname."_seo_index_separate",
				   "type" => "text",
				   "std" => " | ",
				   "desc" => " | или -",),

			array( "type" => "clearfix",),

		array( "name" => "seo-3",
				   "type" => "subcontent-end",),

	array(  "name" => "nav-seo",
			"type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "nav-integration",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "integration-1",
				   "type" => "subnav-tab",
				   "desc" => "Code Integration"),

		array( "type" => "subnavtab-end",),

		array( "name" => "integration-1",
			   "type" => "subcontent-start",),

			array( "name" => "Включить header code",
                   "id" => $shortname."_integrate_header_enable",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => ""),

			array( "name" => "Включить body code",
                   "id" => $shortname."_integrate_body_enable",
                   "type" => "checkbox2",
                   "std" => "false",
                   "desc" => ""),

			array( "type" => "clearfix",),

			array( "name" => "Включить single top code",
                   "id" => $shortname."_integrate_singletop_enable",
                   "type" => "checkbox",
                   "std" => "false",
                   "desc" => ""),

			array( "name" => "Включить single bottom code",
                   "id" => $shortname."_integrate_singlebottom_enable",
                   "type" => "checkbox2",
                   "std" => "false",
                   "desc" => ""),

			array( "type" => "clearfix",),

			array( "name" => "Добавить код в < head >",
				   "id" => $shortname."_integration_head",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "",),

			array( "name" => "Добавить код в < body > (google analytics и т.д.)",
				   "id" => $shortname."_integration_body",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "",),

			array( "name" => "Добавить код to the top of your posts",
				   "id" => $shortname."_integration_single_top",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "",),

			array( "name" => "Добавить код to the bottom of your posts, before the comments",
				   "id" => $shortname."_integration_single_bottom",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "",),

		array( "name" => "integration-1",
			   "type" => "subcontent-end",),

	array( "name" => "nav-integration",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "nav-doc",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "doc-1",
				   "type" => "subnav-tab",
				   "desc" => "Installation"),

			array( "name" => "doc-2",
				   "type" => "subnav-tab",
				   "desc" => "Troubleshooting"),

		array( "type" => "subnavtab-end",),

		array( "name" => "doc-1",
			   "type" => "subcontent-start",),

			array( "name" => "installation",
				   "type" => "doc",),

		array( "name" => "doc-1",
			   "type" => "subcontent-end",),

		array( "name" => "doc-2",
			   "type" => "subcontent-start",),

			array( "name" => "troubleshooting",
				   "type" => "doc",),

		array( "name" => "doc-2",
			   "type" => "subcontent-end",),

	array( "name" => "nav-doc",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//

	array( "name" => "nav-advertisements",
		   "type" => "contenttab-wrapstart",),

		array( "type" => "subnavtab-start",),

			array( "name" => "advertisements-1",
				   "type" => "subnav-tab",
				   "desc" => "Manage Un-widgetized Advertisements"),

		array( "type" => "subnavtab-end",),

		array( "name" => "advertisements-1",
			   "type" => "subcontent-start",),

			array( "name" => "Enable header ad (468x60)",
				   "id" => $shortname."_header_ad_enable",
				   	"type" => "checkbox",
				   "std" => "false",
				   "desc" => "desc.",),			   

			array( "type" => "clearfix",),
				   
			array( "name" => "Input header ad code",
				   "id" => $shortname."_header_ad_code",
				   "type" => "textarea",
				   "std" => "",
				   "desc" => "desc",),	   				   

		array( "name" => "advertisements-1",
			   "type" => "subcontent-end",),

	array( "name" => "nav-support",
		   "type" => "contenttab-wrapend",),

//-------------------------------------------------------------------------------------//


); 


function custom_colors_css(){
	global $shortname; ?>
	
	<style type="text/css">
		body { color: #<?php echo(get_option($shortname.'_color_mainfont')); ?>; }
		#content-area a { color: #<?php echo(get_option($shortname.'_color_mainlink')); ?>; }
		ul.nav li a { color: #<?php echo(get_option($shortname.'_color_pagelink')); ?>; }
		ul.nav > li.current_page_item > a, ul#top-menu > li:hover > a, ul.nav > li.current-cat > a { color: #<?php echo(get_option($shortname.'_color_pagelink_active')); ?>; }
		h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: #<?php echo(get_option($shortname.'_color_headings')); ?>; }
		
		#sidebar a { color:#<?php echo(get_option($shortname.'_color_sidebar_links')); ?>; }		
		div#footer { color:#<?php echo(get_option($shortname.'_footer_text')); ?> }
		#footer a, ul#bottom-menu li a { color:#<?php echo(get_option($shortname.'_color_footerlinks')); ?> }
	</style>

<?php };

?>