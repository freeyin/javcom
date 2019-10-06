<?php include('./admin_config/cn.php');
$include="../Jccms_json/admin_boss/boss.php";
	include($include);
	if(IPPASS != NULL){
		if(IPPASS != $_SERVER["REMOTE_ADDR"]){
			header('Location: /');exit();		
	
		}
	}
	session_start();

	if(isset($_SESSION['username'])) {
		header("Location: ./admin_index/");exit();	
	}else{
		
	}
		


?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>800CMS管理中心</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="<?php echo JCCMS_ADMIN_url;?>/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo JCCMS_ADMIN_url;?>/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="<?php echo JCCMS_ADMIN_url;?>/assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="<?php echo JCCMS_ADMIN_url;?>/assets/css/admin.css">
  <link rel="stylesheet" href="<?php echo JCCMS_ADMIN_url;?>/assets/css/app.css">
</head>

<body data-type="login">

  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block  tpl-login-max">
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">
				<span> 登录</span> <i class="am-icon-skyatlas"></i>
				
			</div>
		</div>

		<div class="login-font">
			<i>800CMS </i> or <span> jiuyipan</span>
		</div>
		<div class="am-u-sm-10 login-am-center">
			<form class="am-form" action="" method="POST">
				<fieldset>
					<div class="am-form-group">
						<input type="password" name="username" class="" id="doc-ipt-email-1" placeholder="输入登录账户">
					</div>
					
					<div class="am-form-group">
						<input type="password" name="password"  class="" id="doc-ipt-pwd-1" placeholder="输入登录密码">
					</div>
					<div class="am-form-group ver-code">
                      <input type="password" name="yzm"  class="" id="doc-ipt-pwd-1" placeholder="输入验证码内容">
                      <a><img src="./admin_config/yzm.php" onClick="this.src='./admin_config/yzm.php?nocache='+Math.random()"  alt="点击换一张"/></a>
					</div>				
					
					<p><button name="submit" type="submit" class="am-btn am-btn-default">登录</button></p>
				</fieldset>
			</form>
			







		</div>
	</div>
</div>



<?php
		if(USERNAME == '800cms'){
			echo'<script language="javascript"> alert("您当前使用的是默认账号！请尽早修改默认账号换上更加复杂的账号，避免被有心人入侵"); </script>';	
		}

		if(PASSWORD == '800cms'){
			echo'<script language="javascript"> alert("您当前使用的是默认密码！请尽早修改默认密码换上更加复杂的密码，避免被有心人入侵");  </script>';
		}


if (isset($_POST['submit']) && isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['yzm']) ) {
	function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}
	$include="../Jccms_json/admin_boss/boss.php";
	$username = post_input($_POST["username"]);	
	$password = post_input($_POST["password"]);	
	$yzm = post_input($_POST["yzm"]);	
	include($include);
	session_start();	
	if(IPPASS != NULL){
		if(IPPASS != $_SERVER["REMOTE_ADDR"]){
			echo'<script language="javascript"> alert("您的IP为外来入侵者不在IP白名单内！无法访问！"); window.location.href="?" </script>';exit();		
		}
	}	
 	if($_SESSION['lock'] > '3'){
		file_put_contents('../lock.lock','');
		unset($_SESSION['lock']);
					
	}	
	$file = "../lock.lock";

	if(file_exists($file))
	{
		echo'<script language="javascript"> alert("三次错误进入安全模式，请删除根目录Security.lock文件，恢复正常使用。"); window.location.href="?" </script>';exit();	
	}
	else
	{
		
	}

	 
	
	
	
	if(USERNAME != $username){
		echo'<script language="javascript"> alert("账号错误"); window.location.href="?" </script>';$_SESSION['lock']=$_SESSION['lock']+1;exit();	
	}
	if(PASSWORD != $password){
		echo'<script language="javascript"> alert("密码错误"); window.location.href="?" </script>';$_SESSION['lock']=$_SESSION['lock']+1;exit();				
	}
	if($_SESSION['yzm'] != $yzm){
		echo'<script language="javascript"> alert("验证码错误"); window.location.href="?" </script>';$_SESSION['lock']=$_SESSION['lock']+1;exit();				
	}	


	


	$_SESSION['username']=$username;$_SESSION['password']=$password;
	$ad_top_json_url="../Jccms_json/Basicsetup/Journal.php";
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
	header("Content-type: text/html; charset=utf-8");
	include('../class/class_txttest.php');
	$txt = new  TxtDB($ad_top_json_url);
	$bankinfo = array();
	$bankinfo["ad_top_id"] = time();;
	$bankinfo["ad_top_url"] = $_SERVER["REMOTE_ADDR"];
	$bankinfo["ad_top_pic"] = '';
	$bankinfo["ad_top_md"] = '';
	$txt::insert($bankinfo);  //增	
	echo'<script language="javascript"> alert("登陆成功！正在跳转..."); window.location.href="admin_index" </script>';
	
}
?>
  <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
  <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
  <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/app.js"></script>
</body>

</html>