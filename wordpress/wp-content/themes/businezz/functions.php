<?php
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');


?>
<?php
function mtheme_thumb($postid=0, $size='medium', $attributes='') {
	if ($postid<1) $postid = get_the_ID();
	if ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_mime_type' => 'image', )))
		foreach($images as $image) {
			$thumbnail=wp_get_attachment_image_src($image->ID, $size);
?>
<img src="<?php echo $thumbnail[0]; ?>" <?php echo $attributes; ?> />
<?php
		}
	else {
		echo '<img src=' . get_bloginfo ( 'stylesheet_directory' );
		echo '/images/no-attachment.gif>';
	}
	
}

function mtheme_thumb1($postid=0, $size='thumbnail', $attributes='') {
	if ($postid<1) $postid = get_the_ID();
	if ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_mime_type' => 'image', )))
		foreach($images as $image) {
			$thumbnail=wp_get_attachment_image_src($image->ID, $size);
?>
<img src="<?php echo $thumbnail[0]; ?>" <?php echo $attributes; ?> />
<?php
		}
	else {
		echo '<img src=' . get_bloginfo ( 'stylesheet_directory' );
		echo '/images/no-attachment.gif>';
	}
	
}

function limits($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
	$content = strip_tags($content, '');

   if (strlen($_GET['p']) > 0) {
      echo $content;
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo $content."...<a href=\"".get_permalink()."\" class=\"readm\" >".$more_link_text."</a>";
   }
   else {
      echo $content;
   }
}

function limits2($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
	$content = strip_tags($content, '');

   if (strlen($_GET['p']) > 0) {
      echo $content;
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo $content."...<a href=\"".get_permalink()."\" class=\"readmo\" >".$more_link_text."</a>";
   }
   else {
      echo $content;
   }
}

function shorten_text($title, $length) {
	
				if (strlen($title)>$length) 
					{$dots="...";} 
				else 
					{$dots="";}  
				$shorttext=substr($title, 0, $length).$dots;
				return $shorttext;
}
?>
<?php
if (function_exists('register_sidebar'))
{
	register_sidebar(array('name' => 'Home Sidebar'));
	register_sidebar(array('name' => 'Inner Sidebar'));
}
?>
<?php
$themename = "Businezz";
$shortname = "bz";
$options = array (

array(
"name" => "Настройки заголовка",
"type" => "title"),

array(
"type" => "open"),

array(
"name" => "Ссылки  справа вверху",
"desc" => "задайте ваши ссылки для отображения справа вверху над телефонным номером",
"id" => $shortname."_toplinks",
"std" => '<a href="#">Секретарь  | </a><a href="#"> Служба поддержки  | </a><a href="#"> Свяжитесь с нами </a>',
"type" => "textarea"),

array(
"name" => "Номер телефона и текст",
"desc" => "задайте телефонный номер или любую другую информацию",
"id" => $shortname."_tele",
"std" => "Позвоните нам:+01 555 55 55",
"type" => "text"),

array(
"type" => "close"),

array(
"name" => "Настройки Главной",
"type" => "title"),

array(
"type" => "open"),

array(
"name" => "Категория для слайдшоу",
"desc" => "задайте категорию для слайдшоу",
"id" => $shortname."_slidecat",
"std" => 'featured',
"type" => "text"),

array(
"name" => "Число записей в слайдшоу",
"desc" => "задайте число записей для слайдшоу",
"id" => $shortname."_slideno",
"std" => 5,
"type" => "text"),

array(
"name" => "Категория для записи \"О компании\"",
"desc" => "задайте категорию для записи О компании",
"id" => $shortname."_aboutcat",
"std" => "featured",
"type" => "text"),

array(
"name" => "Категория Отзывы",
"desc" => "задайте категорию для отзывов - имя этой категории будет отображаться как заголовок",
"id" => $shortname."_testicat",
"std" => 'featured',
"type" => "text"),

array(
"name" => "Число отзывов",
"desc" => "задайте число отзывов для отображения",
"id" => $shortname."_testino",
"std" => 4,
"type" => "text"),

array(
"name" => "Число записей для отображения в \"Новости компании\"",
"desc" => "задайте число записей, которые будут отображаться на главной странице в сайдбаре - это и будут последние новости компании",
"id" => $shortname."_latestno",
"std" => 5,
"type" => "text"),

array(
"type" => "close"),

array(
"name" => "Настройки отображения",
"type" => "title"),

array(
"type" => "open"),

array(
"name" => "Показывать превью?",
"desc" => "хотите ли вы отображать превью записей рядом с цитатой?",
"id" => $shortname."_thumbs",
"std" => 'Yes',
"options" => array('Yes','No'),
"type" => "select"),

array(
"name" => "Цитаты или полные записи?",
"desc" => "хотите ли вы показывать цитаты или полные тексты постов? (excerpt = цитаты, full post = полный текст)",
"id" => $shortname."_typepost",
"std" => 'Excerpt',
"options" => array('Excerpt','Full Post'),
"type" => "select"),

array(
"type" => "close")

);

/*Add a Theme Options Page*/
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page("Настройки ". $themename, "Настройки ".$themename."", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' настройки сохранены.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' настройки сброшены.</strong></p></div>';

?>
<div class="wrap" style="margin:0 auto; padding:20px 0px 0px;">

<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
<div style="width:808px; background:#eee; border:1px solid #ddd; padding:20px; overflow:hidden; display: block; margin: 0px 0px 30px;">

<?php break;

case "close":
?>

</div>

<?php break;

case "misc":
?>
<div style="width:808px; background:#fffde2; border:1px solid #ddd; padding:20px; overflow:hidden; display: block; margin: 0px 0px 30px;">
	<?php echo $value['name']; ?>
</div>
<?php break;

case "title":
?>

<div style="width:810px; height:22px; background:#555; padding:9px 20px; overflow:hidden; margin:0px; font-family:Verdana, sans-serif; font-size:18px; font-weight:normal; color:#EEE;">
	<?php echo $value['name']; ?>
</div>

<?php break;

case 'text':
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<input style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?>" />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;

case 'textarea':
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo stripslashes($value['std']); } ?></textarea>
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;
/*Ralph Damiano*/
case 'select':
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['desc']; ?>
	</span>
</div>

<?php
break;

case "checkbox":
?>

<div style="width:808px; padding:0px 0px 10px; margin:0px 0px 10px; border-bottom:1px solid #ddd; overflow:hidden;">
	<span style="font-family:Arial, sans-serif; font-size:16px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['name']; ?>
	</span>
	<?php if ($value['image'] != "") {?>
		<div style="width:808px; padding:10px 0px; overflow:hidden;">
			<img style="padding:5px; background:#FFF; border:1px solid #ddd;" src="<?php bloginfo('template_url');?>/images/<?php echo $value['image'];?>" alt="image" />
		</div>
	<?php } ?>
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<br/>
	<span style="font-family:Arial, sans-serif; font-size:11px; font-weight:bold; color:#444; display:block; padding:5px 0px;">
		<?php echo $value['desc']; ?>
	</span>
</div>


<?php
break;

case "submit":
?>

<p class="submit">
<input name="save" type="submit" value="Сохранить изменения" />
<input type="hidden" name="action" value="save" />
</p>

<?php break;
}
}
?>

<p class="submit">
<input name="save" type="submit" value="Сохранить изменения" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Сбросить" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}
function mytheme_wp_head() { ?>
<?php }
add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin'); ?>
