<?php
/**
 * PHP file call
 */
define('LEADS_PATH',CLASS_PATH.'leads_form/');
define('CSS_PATH',CLASS_PATH.'css/');
$file_name = array(	'database_lead_table', 'custom_lead_form', 'leads_class','themes-page');
foreach($file_name as $files){
    if(file_exists(LEADS_PATH.$files.'.php')){
        require_once(LEADS_PATH.$files.'.php');
    }
}
if(file_exists(CLASS_PATH.'infowway-front.php')){
        require_once(CLASS_PATH.'infowway-front.php');
    }
?>
