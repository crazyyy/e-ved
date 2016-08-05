<?php
/**
 * Shieldfy Client
 * @version 4.5.0
 * @author Shieldfy Development Team
 * info@shieldfy.com
*/
//namespace Shieldfy;
define('SHIELDFY_DS',DIRECTORY_SEPARATOR);
define('SHIELDFY_VERSION','4.5.0');

if(!defined('SHIELDFY_ROOT_DIR')){
	define('SHIELDFY_ROOT_DIR',dirname(__FILE__) . SHIELDFY_DS);
}
define('SHIELDFY_DIR',SHIELDFY_ROOT_DIR.'shieldfy'. SHIELDFY_DS);
define('SHIElDFY_CACHE_DIR',SHIELDFY_DIR.'tmpd'. SHIELDFY_DS);

define('SHIELDFY_TOKEN',"e9e70240f8d2c6141dddf11f0971a52cef5824af");
define('SHIELDFY_ApiEndpoint',"http://api2.shieldfy.com/");
define('SHIELDFY_ServerEndpoint',"https://shieldfy.com/");
define('SHIELDFY_BlockView','<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Access Denied</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--></head><body><div class="container"><div class="row"><div class="col-sm-8 col-sm-offset-2"><div class="well" style="margin-top:80px;padding:40px;"><div class="row"><div class="col-sm-4"><img src="http://shieldfy.com/assets/img/block-sign.png" class="img-responsive"></div><div class="col-sm-8"><h1>Whooops!</h1><h4>Your request blocked for security reasons</h4><p>if you believe that your request shouldn\'t be blocked contact the administrator</p><hr/>Protected By <a href="http://shieldfy.com" target="_blank">Shieldfy</a> &trade; Web Shield </div></div></div></div></div></div></body></html>');

/* ping check */
if(isset($_GET['shaction']) && isset($_GET['token'])){
	if($_GET['shaction'] == 'ping' && $_GET['token'] == 'e9e70240f8d2c6141dddf11f0971a52cef5824af'){
		echo 'running:'.SHIELDFY_VERSION;
		exit;
	}
}

/* Core Shield Class */
class ShieldfyCoreShield{
	/* Views */
	public function block(){
		$this->end(403,"Unauthorize Action :: Shieldfy Web Shield",SHIELDFY_BlockView);
	}

	public function blockAndReport($data){
		//send report
		$res = $this->callApi('firewall/report',$data);
		$this->block();
	}
	public function end($status = 403,$message = "",$html = ""){
		@header($_SERVER["SERVER_PROTOCOL"].' '.$status.' '.$message);@die($html);
	}

	public function show($arr = array()){
		header('Content-Type: application/json');
		echo json_encode($arr);
		exit;
	}
	public function response($status,$message = ''){
		$arr = array('handshake'=>1,'status'=>$status,'message'=>$message);
		$this->show($arr);
	}

	/* Api */
	public function callApi($route,$postdata = array()){
		$url = SHIELDFY_ApiEndpoint;
		$url .=$route;
		$result = $this->_call($url,$postdata);
		$result = @json_decode($result);
		if($result && $result->handshake){
			return $result;
		}else{
			return false;
		}
	}
	public function callServer($route,$postdata = array()){
		$url = SHIELDFY_ServerEndpoint;
		$url .=$route;
		$result = $this->_call($url,$postdata);
		return $result;
	}

	private function _call($url,$postdata = array()){
		if(extension_loaded('curl') && is_callable('curl_init')){
			return $this->_curl($url,$postdata);
		}else{
			return $this->_file($url,$postdata);
		}
	}
	private function _curl($url,$postdata = array()){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_HTTPHEADER,array('X-Shieldfy-Website-Key: '.SHIELDFY_TOKEN));

		if(!empty($postdata)){
			curl_setopt($ch,CURLOPT_POST, count($postdata));
			$postdata = http_build_query(
			    $postdata
			);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$postdata);
		}

		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	private function _file($url,$postdata = array()){
		$opts = array('http' =>
			    array(
			        'method'  => 'POST',
			        'header'  => "Content-type: application/x-www-form-urlencoded \r\n".
			        			 'X-Shieldfy-Website-Key: '.SHIELDFY_TOKEN,
			    )
			);
		if(!empty($postdata)){
			$postdata = http_build_query(
			    $postdata
			);
			$opts['http']['content'] = $postdata;
		}
		$context  = stream_context_create($opts);
		return file_get_contents($url, false, $context);
	}
	public function compress($data){
		if(is_callable('bzcompress')){
			return 'bz|'.bzcompress($data);
		}elseif(is_callable('gzcompress')){
			return 'gz|'.gzcompress($data);
		}else{
			return $data;
		}
	}
	public function encrypt($data){
		if(extension_loaded('mcrypt') && is_callable('mcrypt_encrypt')){
			return 'mcr|'.$this->mcryptEncrypt($data);
		}else{
			return 'rot|'.$this->rotEncrypt($data);
		}
	}
	private function mcryptEncrypt($data){
		$key = SHIELDFY_TOKEN;
		$key = pack('H*',$key);
		$key = $key."\0\0\0\0";
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);

		$iv = mcrypt_create_iv($iv_size, MCRYPT_DEV_URANDOM);
    $crypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);
  	$combo = $iv . $crypt;
  	$data = base64_encode($iv . $crypt);
  	return $data;
	}
	private function rotEncrypt($data){
		$key = SHIELDFY_TOKEN;
		$key = str_split(str_pad('', strlen($data), $key, STR_PAD_RIGHT));
	    $stra = str_split($data);
	    foreach($stra as $k=>$v){
	    	$tmp = ord($v)+ord($key[$k]);
	    	$stra[$k] = chr( $tmp > 255 ?($tmp-256):$tmp);
	    }
	    return join('', $stra);
	}
	public function getUserIP(){
		$ipaddress = '';
			if (@$_SERVER['HTTP_CLIENT_IP']){
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			}else if(@$_SERVER['HTTP_X_FORWARDED_FOR']){
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else if(@$_SERVER['HTTP_X_FORWARDED']){
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			}else if(@$_SERVER['HTTP_FORWARDED_FOR']){
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			}else if(@$_SERVER['HTTP_FORWARDED']){
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			}else if(@$_SERVER['REMOTE_ADDR']){
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			}else{
				$ipaddress = 'UNKNOWN';
			}
		return $ipaddress;
	}
}
/* Main Shield Class */
class ShieldfyShield extends ShieldfyCoreShield{
	public $config = array();
	public $userIP = null;
	private static $_instance = null;
	private function __construct () { }
	public static function init ()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
	public function shield(){
		$this->userIP = $this->getUserIP();
		$this->run();
	}
	private function run(){
		/* check cached ban */
		if($this->userIP && $this->userIP != 'UNKNOWN'){
			$cache_file = SHIElDFY_CACHE_DIR.'ban'.SHIELDFY_DS.md5($this->userIP).'.shcache';
			if(file_exists($cache_file)){
				$this->block();
			}
		}
		/* expose useful headers */
		header('X-XSS-Protection: 1; mode=block');
		header('X-Content-Type-Options: nosniff');

		/* remove deprecated */
		if(isset($HTTP_COOKIE_VARS)) $HTTP_COOKIE_VARS = array();
		if(isset($HTTP_ENV_VARS)) $HTTP_ENV_VARS = array();
		if(isset($HTTP_GET_VARS)) $HTTP_GET_VARS = array();
		if(isset($HTTP_POST_VARS)) $HTTP_POST_VARS = array();
		if(isset($HTTP_POST_FILES)) $HTTP_POST_FILES = array();
		if(isset($HTTP_RAW_POST_DATA)) $HTTP_RAW_POST_DATA = array();
		if(isset($HTTP_SERVER_VARS)) $HTTP_SERVER_VARS = array();
		if(isset($HTTP_SESSION_VARS)) $HTTP_SESSION_VARS = array();

		/* prepare GET */
		$send['get'] = $_GET;
		/* prepare POST */
		$send['post'] = $_POST;
		/* prepare SERVER */
		$send['server']['ps'] = (isset($_SERVER['PHP_SELF']))?$_SERVER['PHP_SELF']:'';
		$send['server']['pi'] = (isset($_SERVER['PATH_INFO']))?$_SERVER['PATH_INFO']:'';
		/* get some info */
		$send['info']['ip'] = $this->userIP;
		$send['info']['uri'] = (isset($_SERVER['REQUEST_URI']))?$_SERVER['REQUEST_URI']:'';
		$send['info']['ua'] = (isset($_SERVER['HTTP_USER_AGENT']))?$_SERVER['HTTP_USER_AGENT']:'';
		$send['info']['rm'] = (isset($_SERVER['REQUEST_METHOD']))?$_SERVER['REQUEST_METHOD']:'';
		$send['info']['xrw'] = (isset($_SERVER['HTTP_X_REQUESTED_WITH']))?$_SERVER['HTTP_X_REQUESTED_WITH']:'';
		$send['info']['ho'] = (isset($_SERVER['HTTP_ORIGIN']))?$_SERVER['HTTP_ORIGIN']:'';
		$send['info']['hh'] = (isset($_SERVER['HTTP_HOST']))?$_SERVER['HTTP_HOST']:'';
		$send['info']['r'] = (isset($_SERVER['HTTP_REFERER']))?$_SERVER['HTTP_REFERER']:'';

		/* check for illegal types of file uploads */
		foreach($_FILES as $name=>$info){
			//check content if its illegal
			$res = file_get_contents($info['tmp_name']);
			if(strstr($res, '<?php')){
				//its php file , exit now
				$send = $this->compress(json_encode($send));
				$this->blockAndReport(array('params'=>$send));
			}
		}

		/* check cached firewall */
		$cache_file = SHIElDFY_CACHE_DIR.'firewall'.SHIELDFY_DS.md5(json_encode($send)).'.shcache';
		if(file_exists($cache_file) && (filemtime($cache_file) + 3600 ) > time() && $result = file_get_contents($cache_file)) {
			if($result == 'NO'){
				$this->block();
			}else{
				//expose cached header
				$headers = json_decode($result,1);
				if($headers && is_array($headers)){
					foreach($headers as $header_key=>$header_value){
						@header($header_key.' : '.$header_value);
					}
				}
			}
		}else{
			@unlink($cache_file);
			$send = $this->compress(json_encode($send));
			$result = $this->callApi("firewall/check",array('params'=>$send));
			if($result && $result->status == 'pass'){
				/* pass lets cache it for a while */
				@file_put_contents($cache_file, "YES");
				/* expose useful headers if any */
				if($result->headers){
					$headers = (array)$result->headers;
					@file_put_contents($cache_file, json_encode($headers));
					foreach($headers as $header_key=>$header_value){
						@header($header_key.' : '.$header_value);
					}
				}
			}
			if($result && $result->status == 'replace'){
				$get = (array)$result->get;
				$post = (array)$result->post;
				if($get){
					$get = json_decode(json_encode($get), true);
					$_GET = $get;
				}
				if($post){
					$post = json_decode(json_encode($post), true);
					$_POST = $post;
				}
			}
			if($result && $result->status == 'block'){
				/* block cache it then block */
				file_put_contents($cache_file, "NO");
				$this->block();
			}
		}
	}
}
$uri = trim($_SERVER['SCRIPT_NAME'],'/');
if($uri != 'shieldfy.php'):
	/* main shield */
	header('X-Web-Shield: ShieldfyWebShield');
	header('X-Powered-By: NONE');
	ShieldfyShield::init()->shield();
	return; //end shield
endif;

/* internal shield server */
@set_time_limit(0);
@ini_set('max_execution_time', 600);
error_reporting(0);
/* error handling */
function ShieldfyErrorHandler($errno, $errstr, $errfile, $errline){
	$fp = fopen(SHIElDFY_CACHE_DIR.'logs'.SHIELDFY_DS.'err_log.shieldfy', "a");
	fwrite($fp, date("H:i:s")." :: $errno :: $errstr :: => $errfile:$errline"."\n");
	fclose($fp);
}
$seh = set_error_handler("ShieldfyErrorHandler");
/* Router  */
class ShieldfyServer extends ShieldfyCoreShield{
	private static $_instance = null;
	private static $map = null;
	private static $source = null;
	private function __construct () { }
	public static function getInstance ()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }
    function auth(){
    	$id = @$_SERVER['HTTP_X_SHIELDFY_WEBSITE_KEY'];
    	if($id == ''){
    		$id = @$_GET['token'];
    	}
    	if($id != SHIELDFY_TOKEN){
    		$this->block();
    	}
    	return $this;
    }
	function load($source){
		self::$source = $source;
		return $this;
	}
	function to($map){
		self::$map = $map;
		return $this;
	}
	function run(){
		$source = trim(self::$source,'/');
		if(empty($source)){
			$this->end(404,"Not Found");
			return false;
		}
		$map = self::$map;
		if(is_array($map)){
			foreach($map as $route => $action){
				if($source == $route){
					$action_arr = explode('@', $action);
					$result = self::loadAndRun($action_arr[0],$action_arr[1]);
					if($result){
						return true;
					}else{
						$this->end(404,"Not Found");
						return false;
					}
				}
			}
			$this->end(404,"Not Found");
			return false;
		}
	}
	function loadAndRun($controller,$action){
		$controller = 'Shieldfy'.$controller;
		$controllerClass = new $controller;
		if(is_callable(array($controllerClass,$action))){
			$return = $controllerClass->$action();
			return true;
		}else{
			return false;
		}
	}
}
/* controllers */
/* == installer == */
class ShieldfyInstaller extends ShieldfyCoreShield{
	function hello(){
		$info = array(
			'php_version'=>PHP_VERSION,
			'sapi_type'=>php_sapi_name(),
			'os_info'=>php_uname(),
	        'disabled_functions'=>(@ini_get('disable_functions') ? @ini_get('disable_functions') : 'None'),
	        'loaded_extensions'=>implode(',', get_loaded_extensions()),
	        'display_errors'=>ini_get('display_errors'),
	        'register_globals'=>(ini_get('register_globals') ? ini_get('register_globals') : 'None'),
	        'post_max_size'=>ini_get('post_max_size'),
	        'curl'=>extension_loaded('curl') && is_callable('curl_init'),
	        'fopen'=>ini_get('allow_url_fopen'),
			'mcrypt'=>extension_loaded('mcrypt'),
			'root'=>SHIELDFY_ROOT_DIR,
		);
		if(@touch('shieldfy_tmpfile.tmp')){
			$info['create_file'] = 1;
	        $delete = @unlink('shieldfy_tmpfile.tmp');
	        if($delete){
	        	$info['delete_file'] = 1;
	        }else{
	        	$info['delete_file'] = 0;
	        }
	    }else{
	    	$info['create_file'] = 0;
	    	$info['delete_file'] = 0;
	    }
	    if(file_exists(SHIELDFY_ROOT_DIR.'.htaccess')){
	    	$info['htaccess_exists'] = 1;
	    	if(is_writable(SHIELDFY_ROOT_DIR.'.htaccess')){
	    		$info['htaccess_writable'] = 1;
	    	}else{
	    		$info['htaccess_writable'] = 0;
	    	}
	    }else{
	    	$info['htaccess_exists'] = 0;
	    }
		$this->response(200,$info);
	}

	function install(){
		/* htaccess Start */
			$old_content = '';
			if(!file_exists(SHIELDFY_ROOT_DIR.'.htaccess')){
	            touch(SHIELDFY_ROOT_DIR.'.htaccess');
	            chmod(SHIELDFY_ROOT_DIR.'.htaccess', 0755);
	        }else{
	        	$old_content = file_get_contents(SHIELDFY_ROOT_DIR.'.htaccess');
	        	file_put_contents(SHIELDFY_ROOT_DIR.'.htaccess_shieldfy_bkp',$old_content );
	        }
	        $content = $_POST['ht']."\n";
	        if (get_magic_quotes_gpc()) {
	        	$content = stripslashes($content);
	        }
	        $fp = fopen(SHIELDFY_ROOT_DIR.'.htaccess', "w");
	        /* check sapi type for firewall install */
	        $sapi_type = php_sapi_name();
	        if (substr($sapi_type, 0, 3) == 'cgi' || substr($sapi_type, 0, 3) == 'fpm') {
	            $firewall = "auto_prepend_file = ".SHIELDFY_ROOT_DIR."shieldfy.php";
	            file_put_contents(SHIELDFY_ROOT_DIR.'.user.ini', $firewall);
	        }else{
	        	$content .= "# ============= Firewall ============="."\n";
						$content .= '<IfModule mod_php5.c>'."\n";
						$content .= 'php_value auto_prepend_file "'.SHIELDFY_ROOT_DIR.'shieldfy.php"'."\n";
						$content .= '</IfModule>'."\n";
	        }
	        $content .= "# ============= Shieldfy end ============="."\n";
	        //check if shieldfy already exists
	        if($old_content != ''){
		        if(strstr($old_content, '# ============= Shieldfy start =============') && strstr($old_content, '# ============= Shieldfy end =============')){
					$old_content = preg_replace('/(\#[=\s*]+Shieldfy start[=\s*]+.*#[=\s*]+Shieldfy end[=\s*]+)/is', '', $old_content);
				}
			}
			$res = fwrite($fp, $content.$old_content);
			fclose($fp);
	        chmod(SHIELDFY_ROOT_DIR.'.htaccess', 0644);
	    /* htaccess End */
	    /* required folders */
	    mkdir(SHIELDFY_ROOT_DIR.'shieldfy');
	    file_put_contents(SHIELDFY_ROOT_DIR.'shieldfy'.SHIELDFY_DS.".htaccess", "order deny,allow \n");
	    mkdir(SHIELDFY_ROOT_DIR.'shieldfy'.SHIELDFY_DS.'tmpd');
	    mkdir(SHIELDFY_ROOT_DIR.'shieldfy'.SHIELDFY_DS.'tmpd'.SHIELDFY_DS.'ban');
	    mkdir(SHIELDFY_ROOT_DIR.'shieldfy'.SHIELDFY_DS.'tmpd'.SHIELDFY_DS.'firewall');
	    mkdir(SHIELDFY_ROOT_DIR.'shieldfy'.SHIELDFY_DS.'tmpd'.SHIELDFY_DS.'logs');
	   	file_put_contents(SHIELDFY_ROOT_DIR.'shieldfy'.SHIELDFY_DS.'tmpd'.SHIELDFY_DS.".htaccess", "order deny,allow \n deny from all");
	    $this->response(200,"ok");
	}

	function update(){
		//request with version id to see updates
		//if there is no update result:0 if there is result:base64code
		$res = $this->callServer('api/update',array('ver'=>SHIELDFY_VERSION));
		$re = @json_decode($res);
		if(!$re){
			echo 'Invalid Data :'.$res;
			return;
		}
		if($re->status == 0){
			echo 'No Update Available';
			return;
		}
		if($re->status == 1){
			//check signature
			$sign = $re->sign;
			$fileContent = $re->content;

			if(sha1($fileContent) != $re->sign){
				echo 'Invalid Signature';
				return;
			}
			//check permissions
			if(is_writable(__FILE__)){
				$old_file = file_get_contents(__FILE__);
				@file_put_contents(SHIELDFY_ROOT_DIR.'_shieldfy_bkp.php', $old_file);
				$code = base64_decode($fileContent);
				$result = file_put_contents(__FILE__, $code);
				if($result){
					@unlink(SHIELDFY_ROOT_DIR.'_shieldfy_bkp.php');
					echo 'Update Done';
					return;
				}else{
					echo 'Write Failed : Retriving Old Data';
					$result = file_put_contents(__FILE__, $old_file);
					if($result){
						echo 'Old Data Restored';
						return;
					}else{
						echo 'Old Data Couldnt be restored , Requrest manual update';
						return;
					}
				}
			}else{
				echo 'You Dont Have Permission To Update';
				return;
			}
		}
	}


	function version(){
		echo  SHIELDFY_VERSION;
	}
}
/* == scanner == */
class ShieldfyScanner extends ShieldfyCoreShield{
	function discover(){
		$root = (isset($_POST['root'])  && $_POST['root'] != '' )?$_POST['root']:SHIELDFY_ROOT_DIR;
		$it = new \RecursiveIteratorIterator(
		    new \RecursiveDirectoryIterator($root, \RecursiveDirectoryIterator::SKIP_DOTS),
		    \RecursiveIteratorIterator::LEAVES_ONLY,
		    \RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
		);
		$i = iterator_count($it);
		$this->response(200,$i);
	}
	function scan(){
		$offset = @$_POST['offset'];
		$scanner_id = @$_POST['scanner_id'];
		if(isset($_POST['execludes'])){
			$execludes = @$_POST['execludes'];
		}else{
			$execludes = array();
		}
		$execludes[SHIELDFY_ROOT_DIR.'shieldfy.php'] = md5_file(SHIELDFY_ROOT_DIR.'shieldfy.php');
		$root = (isset($_POST['root'])  && $_POST['root'] != '' )?$_POST['root']:SHIELDFY_ROOT_DIR;
		$it = new \RecursiveIteratorIterator(
		    new \RecursiveDirectoryIterator($root, \RecursiveDirectoryIterator::SKIP_DOTS),
		    \RecursiveIteratorIterator::LEAVES_ONLY,
		    \RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
		);
		$limit = 5;
		$files = array();
		$return = array();
		$i = $offset + $limit;
		$ix = new \LimitIterator($it, $offset, $limit);
		foreach ($ix as $path => $dir):
			if(!$dir->isDir()){
				$ext = $dir->getExtension();
				if($ext == 'php' || $ext == 'phtml' || $ext == 'php3' || $ext == 'php4' || $ext == 'inc' || $ext == 'htaccess'){
					if(isset($execludes[$dir->getPathname()])){
						continue;
					}
					$content = file_get_contents($dir->getPathname());
					$compressed = $this->compress($this->encrypt($content));
					$files[] = array($dir->getPathname(),md5($content),$compressed);
				}else{
					$size = $dir->getSize();
					if($size > 2097152){
						continue;
					}
					$content = file_get_contents($dir->getPathname());
					if(strstr($content, '<?php')){
						if(isset($execludes[$dir->getPathname()])){
							continue;
						}
						$compressed = $this->compress($this->encrypt($content));
						$files[] = array($dir->getPathname(),md5($content),$compressed);
					}
				}
			}
		endforeach;
		if($files){
			$res = $this->callApi("scanner/check",array('params'=>$files));
			$return['files'] = $res->data;
		}
		$return['offset'] = $i;
		$this->response(200,$return);
	}
	function view(){
		$file = $_POST['file'];
		if(file_exists($file)){
			if(is_readable($file)){
				$content = file_get_contents($file);
				$tosend = base64_encode($this->compress($this->encrypt($content)));
				$this->response(200,$tosend);
			}else{
				$this->response(403,"Dont have permission to read");
			}
		}else{
			$this->response(403,"Not found");
		}
	}
}
/* == Logs == */
class ShieldfyLogs extends ShieldfyCoreShield{
	function errors(){
		$err = file_get_contents(SHIElDFY_CACHE_DIR.'logs'.SHIELDFY_DS.'err_log.shieldfy');
		if($err){
			file_put_contents(SHIElDFY_CACHE_DIR.'logs'.SHIELDFY_DS.'err_log.shieldfy', "");
			$this->response(200,$err);
		}else{
			$this->response(404,"Nothing Found");
		}
	}
	function clear(){
		$cache_dir = SHIElDFY_CACHE_DIR.'firewall'.SHIELDFY_DS;
		$res = scandir($cache_dir);
		foreach($res as $file){
			if(!is_dir($file)){
				$ext = pathinfo($file, PATHINFO_EXTENSION);
				if($ext == 'shcache'){
					@unlink(SHIElDFY_CACHE_DIR.'firewall'.SHIELDFY_DS.$file);
				}
			}
		}
		$this->response(200,"Ok");
	}
}
/* Route Map */
$map = array(
	/* init */
	'hello'=>'Installer@hello',
	'install'=>'Installer@install',
	'update'=>'Installer@update',
	'version'=>'Installer@version',
	/* logs */
	'logs/errors'=>'Logs@errors',
	'cache/clear' => 'Logs@clear',
	/* scanner */
	'scanner/discover'=>'Scanner@discover',
	'scanner/scan'=>'Scanner@scan',
	'scanner/view_file'=>'Scanner@view',
);
/* execute */
ShieldfyServer::getInstance()->auth()->load($_GET['a'])->to($map)->run();
exit;
