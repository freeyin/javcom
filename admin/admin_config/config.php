<?php

 $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';

if($http_type=='http://'){
	$duankou=':'.$_SERVER["SERVER_PORT"];
}
if($http_type=='https://'){
	$duankou='';
}
 $JCCMS_ADMIN_href=$http_type.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
define('JCCMS_ADMIN_href',$JCCMS_ADMIN_href);
 $JCCMS_ADMIN_url=$http_type.$_SERVER['SERVER_NAME'].$duankou.'/';
define('JCCMS_ADMIN_url',$JCCMS_ADMIN_url);
define('JCCMS_ROOT','./../../Jccms_json/');
define('JCCMS_BOSS','../../Jccms_json/admin_boss/boss.php');
session_start();
include(JCCMS_BOSS);
if ($_SESSION['username'] == NULL && $_SESSION['username'] != USERNAME) {
	
header("Location: ../index.php");exit();	
}
if ($_SESSION['password'] == NULL && $_SESSION['password'] != PASSWORD ) {
header("Location: ../index.php");exit();	
}
if(is_array($_GET)&&count($_GET)>0)//先判断是否通过get传值了
    {
        if(isset($_GET["err"]))//是否存在"id"的参数
        {
            $err=$_GET["err"];//存在
			if($err == 1){
				session_destroy();
				header("Location: ../index.php");exit();	
			}
        }
    }


?>

