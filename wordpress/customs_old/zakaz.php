<?php
   function ValidateEmail($email)
   {
      $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
      return preg_match($pattern, $email);
   }

   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      $mailto = 'centerved@mail.ru ';
      $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
      $subject = 'Заявка на курс таможенного регулирования';
      $message = 'Values submitted from web site form:';
      $success_url = './form-ok.php';
      $error_url = '';
      $error = '';
      $eol = "\n";
      $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
      $boundary = md5(uniqid(time()));

      $header  = 'From: '.$mailfrom.$eol;
      $header .= 'Reply-To: '.$mailfrom.$eol;
      $header .= 'MIME-Version: 1.0'.$eol;
      $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
      $header .= 'X-Mailer: PHP v'.phpversion().$eol;
      if (!ValidateEmail($mailfrom))
      {
         $error .= "The specified email address is invalid!\n<br>";
      }

      if (!empty($error))
      {
         $errorcode = file_get_contents($error_url);
         $replace = "##error##";
         $errorcode = str_replace($replace, $error, $errorcode);
         echo $errorcode;
         exit;
      }

      $internalfields = array ("submit", "reset", "send", "captcha_code");
      $message .= $eol;
      $message .= "IP Address : ";
      $message .= $_SERVER['REMOTE_ADDR'];
      $message .= $eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (!is_array($value))
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
            else
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
         }
      }

      $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
      $body .= '--'.$boundary.$eol;
      $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
      $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $body .= $eol.stripslashes($message).$eol;
      if (!empty($_FILES))
      {
          foreach ($_FILES as $key => $value)
          {
             if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize)
             {
                $body .= '--'.$boundary.$eol;
                $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
                $body .= 'Content-Transfer-Encoding: base64'.$eol;
                $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
                $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
             }
         }
      }
      $body .= '--'.$boundary.'--'.$eol;
      if ($mailto != '')
      {
         mail($mailto, $subject, $body, $header);
      }
      header('Location: '.$success_url);
      exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 9 - http://www.wysiwygwebbuilder.com">
<style type="text/css">
body
{
   background-color: #8E002B;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
   margin: 0;
   padding: 0;
}
</style>
<style type="text/css">
a
{
   color: #0000FF;
   text-decoration: underline;
}
a:visited
{
   color: #800080;
}
a:active
{
   color: #FF0000;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
</style>
<style type="text/css">
#Image3
{
   border: 0px #000000 solid;
}
#Image1
{
   border: 0px #000000 solid;
}
#Image2
{
   border: 0px #000000 solid;
}
#wb_Text3 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: center;
}
#wb_Text3 div
{
   text-align: center;
}
#Image6
{
   border: 0px #000000 solid;
}
#wb_Text24 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: right;
}
#wb_Text24 div
{
   text-align: right;
}
#wb_Text25 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: right;
}
#wb_Text25 div
{
   text-align: right;
}
#wb_Text26 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: right;
}
#wb_Text26 div
{
   text-align: right;
}
#wb_Form2
{
   background-color: transparent;
   border: 0px #000000 solid;
}
#Editbox1
{
   border: 0px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#696969;
   font-family: 'Trebuchet MS';
   font-size: 19px;
   text-align: left;
   vertical-align: middle;
}
#Editbox2
{
   border: 0px #F5FFFA solid;
   background-color: #FFFFFF;
   color :#808080;
   font-family: 'Trebuchet MS';
   font-size: 19px;
   text-align: left;
   vertical-align: middle;
}
#Editbox3
{
   border: 0px #C0C0C0 solid;
   background-color: #FFFFFF;
   color :#808080;
   font-family: 'Trebuchet MS';
   font-size: 19px;
   text-align: left;
   vertical-align: middle;
}
#Button1
{
   color: #000000;
   font-family: 'Trebuchet MS';
   font-size: 21px;
}
#Image4
{
   border: 0px #000000 solid;
}
#Image5
{
   border: 0px #000000 solid;
}
</style>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="wb.rotate.min.js"></script>
<script type="text/javascript" src="wwb9.min.js"></script>
</head>
<body>
<div id="wb_Shape10" style="position:absolute;left:49px;top:25px;width:502px;height:362px;z-index:10;">
<img src="images/img0029.png" id="Shape10" alt="" style="border-width:0;width:502px;height:362px;"></div>

<div id="wb_Text3" style="position:absolute;left:111px;top:45px;width:390px;height:37px;text-align:center;z-index:12;">
<span style="color:#696969;font-family:'Trebuchet MS';font-size:29px;">Оставить заявку</span></div>
<div id="wb_Text24" style="position:absolute;left:80px;top:121px;width:85px;height:20px;text-align:right;z-index:13;">
<style type="text/css">
#wb_Text2
{
text-shadow: 1px 1px #0c779d;
color: red;
}
</style><span style="color:#000000;font-family:'Trebuchet MS';font-size:15px;">ваше имя:</span></div>
<div id="wb_Text25" style="position:absolute;left:61px;top:190px;width:103px;height:20px;text-align:right;z-index:14;">
<style type="text/css">
#wb_Text2
{
text-shadow: 1px 1px #0c779d;
color: red;
}
</style><span style="color:#000000;font-family:'Trebuchet MS';font-size:15px;">ваш e-mail:</span></div>
<div id="wb_Text26" style="position:absolute;left:62px;top:256px;width:104px;height:20px;text-align:right;z-index:15;">
<style type="text/css">
#wb_Text2
{
text-shadow: 1px 1px #0c779d;
color: red;
}
</style><span style="color:#000000;font-family:'Trebuchet MS';font-size:15px;">ваш телефон:</span></div>
<div id="wb_Form2" style="position:absolute;left:102px;top:92px;width:434px;height:274px;z-index:16;">
<form name="Form1" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="Form2">
<div id="wb_Image3" style="position:absolute;left:68px;top:151px;width:347px;height:51px;z-index:0;">
<img src="images/filedbg2.png" id="Image3" alt="" style="width:347px;height:51px;"></div>
<div id="wb_Image1" style="position:absolute;left:69px;top:82px;width:347px;height:51px;z-index:1;">
<img src="images/filedbg2.png" id="Image1" alt="" style="width:347px;height:51px;"></div>
<div id="wb_Image2" style="position:absolute;left:68px;top:13px;width:348px;height:51px;z-index:2;">
<img src="images/filedbg2.png" id="Image2" alt="" style="width:348px;height:51px;"></div>
<input type="text" id="Editbox1" onmouseover="Animate('Shape6', '', '', '', '', '100', 500, '');return false;" onmouseout="Animate('Shape6', '', '', '', '', '70', 500, '');return false;" style="position:absolute;left:111px;top:25px;width:301px;height:30px;line-height:30px;z-index:3;" name="Editbox1" value="" placeholder="&#1074;&#1072;&#1096;&#1077; &#1080;&#1084;&#1103;">
<input type="text" id="Editbox2" onmouseover="Animate('Shape7', '', '', '', '', '100', 500, '');return false;" onmouseout="Animate('Shape7', '', '', '', '', '70', 500, '');return false;" style="position:absolute;left:108px;top:93px;width:306px;height:31px;line-height:31px;z-index:4;" name="Editbox2" value="" placeholder="&#1074;&#1072;&#1096; e-mail">
<input type="text" id="Editbox3" onmouseover="Animate('Shape8', '', '', '', '', '100', 500, '');return false;" onmouseout="Animate('Shape8', '', '', '', '', '70', 500, '');return false;" style="position:absolute;left:113px;top:163px;width:298px;height:30px;line-height:30px;z-index:5;" name="Editbox3" value="" placeholder="&#1074;&#1072;&#1096; &#1090;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;">
<input type="submit" id="Button1" onmouseover="Animate('Shape6', '', '', '', '', '100', 2500, '');Animate('Shape7', '', '', '', '', '100', 1500, '');Animate('Shape8', '', '', '', '', '100', 500, '');return false;" onmouseout="Animate('Shape6', '', '', '', '', '70', 2500, '');Animate('Shape7', '', '', '', '', '70', 1500, '');Animate('Shape8', '', '', '', '', '70', 500, '');return false;" name="" value="Оставить заявку" style="position:absolute;left:48px;top:216px;width:314px;height:45px;z-index:6;">
<div id="wb_Image4" style="position:absolute;left:74px;top:23px;width:28px;height:33px;z-index:7;">
<img src="images/icon-person.png" id="Image4" alt="" style="width:28px;height:33px;"></div>
<div id="wb_Image5" style="position:absolute;left:77px;top:161px;width:30px;height:29px;z-index:8;">
<img src="images/icon-phone.png" id="Image5" alt="" style="width:30px;height:29px;"></div>
<div id="wb_Image6" style="position:absolute;left:74px;top:97px;width:32px;height:25px;z-index:9;">
<img src="images/icon-mail.png" id="Image6" alt="" style="width:32px;height:25px;"></div>
</form>
</div>
</body>
</html>