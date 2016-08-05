<?php
// Add scripts and stylesheet
function enqueue_styles() {
global $themename, $themeslug, $options;
wp_register_style($themeslug . 'storecss', get_template_directory_uri() . '/functions/theme-page-style.css');
wp_enqueue_style($themeslug . 'storecss');
}
// Add page to the menu
function inkthemes_add_menu() {
$page = add_theme_page('InkThemes Themes Page', 'Leads Capture', 'administrator', 'themes', 'inkthemes_page_init');
add_action('admin_print_styles-' . $page, 'enqueue_styles');
}

add_action('admin_menu', 'inkthemes_add_menu');

// Create the page
function inkthemes_page_init() {
$root = get_template_directory_uri();
?>
<div id="contain">
<div id="themesheader">
<div class="lead_head">
<h1>Leads Capture</h1>
<p>Below are the messages received from your Visitors including their contacts details.</p>
</div>
<br />      
</div>	
<?php
global $wpdb,$inkthemes_table;
if(isset($_POST['chk_all_submit'])){
 if(!empty($_POST['check_info_list'])) {
    foreach($_POST['check_info_list'] as $checked) {        
        $wpdb->query($wpdb->prepare("DELETE FROM $inkthemes_table WHERE id = %d", $checked));                
    }
}
}
if (isset($_GET['delete'])) {
$id = $_GET['delete'];
$wpdb->query($wpdb->prepare("DELETE FROM $inkthemes_table WHERE id = %d", $id));
}
$sql = mysql_query("SELECT * FROM $inkthemes_table");
$nr = mysql_num_rows($sql);
if($nr>=1){
if (isset($_GET['pn'])) {
$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);
} else {
$pn = 1;
}
$itemsPerPage = 20;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1) {
$pn = 1;
} else if ($pn > $lastPage) {
$pn = $lastPage;
}
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
$centerPages .= '&nbsp; <a href="' . get_permalink() . '?page=themes&pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
$centerPages .= '&nbsp; <a href="' . get_permalink() . '?page=themes&pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
$centerPages .= '&nbsp; <a href="' . get_permalink() . '?page=themes&pn=' . $sub2 . '">' . $sub2 . '</a> &nbsp;';
$centerPages .= '&nbsp; <a href="' . get_permalink() . '?page=themes&pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
$centerPages .= '&nbsp; <a href="' . get_permalink() . '?page=themes&pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
$centerPages .= '&nbsp; <a href="' . get_permalink() . '?page=themes&pn=' . $add2 . '">' . $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
$centerPages .= '&nbsp; <a href="' . get_permalink() . '?page=themes&pn=' . $sub1 . '">' . $sub1 . '</a> &nbsp;';
$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
$centerPages .= '&nbsp; <a href="' . get_permalink() . '?page=themes&pn=' . $add1 . '">' . $add1 . '</a> &nbsp;';
}
$limit = 'LIMIT ' . ($pn - 1) * $itemsPerPage . ',' . $itemsPerPage;
$sql2 = mysql_query("SELECT * FROM $inkthemes_table ORDER BY id DESC $limit");
$paginationDisplay = "";
if ($lastPage != "1") {
$paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage . '&nbsp;  &nbsp;  &nbsp; ';

if ($pn != 1) {
$previous = $pn - 1;
$paginationDisplay .= '&nbsp;  <a href="' . get_permalink() . '?page=themes&pn=' . $previous . '"> Back</a> ';
}

$paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
if ($pn != $lastPage) {
$nextPage = $pn + 1;
$paginationDisplay .= '&nbsp;  <a href="' . get_permalink() . '?page=themes&pn=' . $nextPage . '"> Next</a> ';
}
}
}
?>
</div>
<?php if($_GET['page']=='themes'){ ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

	<SCRIPT language="javascript">
$(function(){
 
    // add multiple select / deselect functionality
    $("#selectall_chkinfo").click(function () {
          $('.chk_info').attr('checked', this.checked);
		    });
 
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".chk_info").click(function(){
 
        if($(".chk_info").length == $(".chk_info:checked").length) {
            $("#selectall_chkinfo").attr("checked", "checked");
			
        } else {
            $("#selectall_chkinfo").removeAttr("checked");
        }
 
    });
});
</SCRIPT>
<?php } ?>
<div class="main-table">
<form action='' method='post'>
<table class="wp-list-table widefat fixed pages">
<thead>
<tr>
<th><input type="checkbox" id="selectall_chkinfo"/></th>
<?php	global $table_info,$wpdb;
$sqlfeatch = mysql_query("SELECT * FROM $table_info");
//echo $form_count = mysql_num_rows($sqlfeatch);
while ($row = mysql_fetch_array($sqlfeatch)) {	 
$csv1[]=$row["lead_name"]; ?>
<th  scope="col"><?php echo $row["lead_name"]; ?> </th>
<?php }?> 
<th  scope="col">Date</th>
<th  scope="col">Action</th>
</tr>	
</thead>
<?php
$uploads = wp_upload_dir();
$newfile=$uploads[basedir];
$importpath=$uploads[baseurl];
$importleads=$importpath."/leads_capture_data.csv";
$filename = $newfile."/leads_capture_data.csv";
$handle = fopen($filename, 'w+');
fputcsv($handle, array('Leads',$csv1[0],$csv1[1],$csv1[2],$csv1[3],$csv1[4],$csv1[5],$csv1[6],$csv1[7],$csv1[8],$csv1[9],'Date M/DD/YYYY'));
$count=1;	
//data fetch for CSV file				
while ($row = mysql_fetch_array($sql)) { 
$id = $row["id"];
$name = $row["name"];
$leadform1 = $row["leadform1"];
$leadform2 = $row["leadform2"];
$leadform3 = $row["leadform3"];
$leadform4 = $row["leadform4"];
$leadform5 = $row["leadform5"];
$leadform6 = $row["leadform6"];
$leadform7 = $row["leadform7"];
$leadform8 = $row["leadform8"];
$leadform9 = $row["leadform9"];
$date = $row["date"];
$handle = fopen($filename, 'a');
fputcsv($handle, array($count,$name,$leadform1, $leadform2,$leadform3,$leadform4,$leadform5,$leadform6,$leadform7,$leadform8,$leadform9,$date ));	
fclose($handle);
$count++;
}
//data fetch for dashboard 
if($nr>=1){
while ($row = mysql_fetch_array($sql2)) {
$id = $row["id"];
$name = $row["name"];
$leadform1 = $row["leadform1"];
$leadform2 = $row["leadform2"];
$leadform3 = $row["leadform3"];
$leadform4 = $row["leadform4"];
$leadform5 = $row["leadform5"];
$leadform6 = $row["leadform6"];
$leadform7 = $row["leadform7"];
$leadform8 = $row["leadform8"];
$leadform9 = $row["leadform9"];
$date = $row["date"];
?>  
<tbody id="trans_list">
<tr class="data">   
<th  scope="col"><input type="checkbox" class="chk_info" name="check_info_list[]" value="<?php echo $id; ?>"/></th>
<th  scope="col"><?php echo $name; ?></th>					
<th  scope="col"><?php echo $leadform1; ?></th>			
<th  scope="col"><?php echo $leadform2; ?></th>				
<th  scope="col"><?php echo $leadform3; ?></th>				
<th  scope="col"><?php echo $leadform4; ?></th>				
<th  scope="col"><?php echo $leadform5; ?></th>				
<th  scope="col"><?php echo $leadform6; ?></th>					
<th  scope="col"><?php echo $leadform7; ?></th>				
<th  scope="col"><?php echo $leadform8; ?></th>			
<th  scope="col"><?php echo $leadform9; ?></th>		
<th  scope="col"><?php echo $date ?></th>
<th  scope="col"><a href="<?php echo get_permalink() . "?page=themes&pn=" . $pn . "&delete=" . $id; ?>"><img src="<?php echo $root; ?>/functions/images/ico-close.png" alt="Delete" height="16" width="16" /></a></th>
</tr>
<tbody id="trans_list">
<?php } }?>
</table>
<input type='submit' id='chk_all_submit' name='chk_all_submit'  value='Delete Checked'/>
<div class="page-bottom">	<strong><?php echo $nr; ?>&nbsp Items</strong>&nbsp &nbsp <?php echo $paginationDisplay; ?> </div> 
<table class="wp-list-table widefat fixed pages" style="width:180px;">
<thead><tr> <th  scope="col" style="text-align:center;">Download CSV File</th>		 
</tr> <tbody id="trans_list"> <tr>	 
<th  scope="col" style="text-align:center;"> <a id="csvfile" href="<?php echo $importleads; ?>" alt="Download CSV File"><img src="<?php echo $root; ?>/functions/images/export.png" alt="Download CSV File" height="32" width="32" /></a>	</th>
</table> </thead>
</div>        
</div>	 </div>
</div>
</div>
<?php
}