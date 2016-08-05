<?php
// Load $captcha_key_site and $captcha_key_secret
if (file_exists(dirname(__FILE__).'/sgantivirus.login.keys.php')) include_once(dirname(__FILE__).'/sgantivirus.login.keys.php');
if (!isset($captcha_key_site) || $captcha_key_site == '' || !isset($captcha_key_secret) || $captcha_key_secret == '' ) return;

session_start();

if (isset($_REQUEST['captcha_task'])) $captcha_task = trim($_REQUEST['captcha_task']);
else $captcha_task = '';

if ($captcha_task != 'check' && isset($_SESSION["siteguarding_verification_page"]))
{
    $time_stamp = intval($_SESSION["siteguarding_verification_page"]);
    if ( (time() - $time_stamp) < 3 * 60 ) return;
}

if ($captcha_task == '') 
{
?>
    <html>
      <head>
        <title>SiteGuarding.com verification page</title>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes"/>
        <script type="text/javascript">
          var onloadCallback = function() {
            grecaptcha.render('html_element', {
              'sitekey' : '<?php echo $captcha_key_site; ?>'
            });
          };
        </script>
      </head>
      <body>
      <style>
        #login {
            width: 310px;
            padding: 8% 0 0;
            margin: auto;
        }
body {
    font-family: 'Roboto Condensed', sans-serif;
}
.tbig{font-size:15px}
.tsmall{font-size:9px}
.btn {
	-moz-box-shadow: 0px 10px 14px -7px #3e7327;
	-webkit-box-shadow: 0px 10px 14px -7px #3e7327;
	box-shadow: 0px 10px 14px -7px #3e7327;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
	background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
	background-color:#77b55a;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
	border:1px solid #4b8f29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:16px;
	padding:7px 33px;
	text-decoration:none;
	text-shadow:0px 1px 0px #5b8a3c;
}
.btn:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
	background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
	background-color:#72b352;
}
.btn:active {
	position:relative;
	top:1px;
}
.center{text-align: center;}
a {
    color: #4B9307;
    text-decoration: none;
}
a:hover {
    color: #1d591d;
    text-decoration: underline;
}

      </style>
        <div id="login">
        <form action="?" method="POST">
          <p class="center">
            <img width="238" src="/wp-content/plugins/wp-antivirus-site-protection/images/logo_siteguarding.png" />
          </p>
          <p class="tbig center">
            Login page protected with <a href="https://www.siteguarding.com/en/" target="_blank">SiteGuarding.com</a> Website Antivirus
          </p>
          <div id="html_element"></div>
          <br>
          <p class="center">
            <input type="submit" class="btn" value="Login page">
          </p>
          <p class="tsmall center">
            <a href="https://www.siteguarding.com/en/bruteforce-attack" target="_blank">How it works. Learn more</a>
          </p>
          <input type="hidden" name="captcha_task" value="check">
          <input type="hidden" name="captcha_session" value="<?php echo md5(time().mt_rand()); ?>">
        </form>
        </div>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
        </script>
      </body>
    </html>


<?php
    
    exit;
}
else {
    if(isset($_POST['g-recaptcha-response'])) $captcha = $_POST['g-recaptcha-response'];
    
    $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$captcha_key_secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
    
    //print_r($response);
    if($response['success'] != 1)
    {
        // Error
        ?>
        <html>
        <head>
        <META HTTP-EQUIV="Refresh" CONTENT="3;url=/wp-login.php">
        </head>
        <body>
        <p style="text-align: center;padding:30px 0">We can't verify your request. Please try again.</p>
        </body>
        </html>
        <?php
        exit;
    }
    else {
        $_SESSION["siteguarding_verification_page"] = time();
    }
}

/* Dont remove this code: SiteGuarding_Block_6C33B41CEC02 */
?>