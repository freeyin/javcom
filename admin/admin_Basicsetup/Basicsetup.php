<?php include('../admin_config/config.php');?>
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
    <link rel="icon" type="image/png" href="<?php echo JCCMS_ADMIN_url;?>assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo JCCMS_ADMIN_url;?>assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="<?php echo JCCMS_ADMIN_url;?>assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="<?php echo JCCMS_ADMIN_url;?>assets/css/admin.css">
    <link rel="stylesheet" href="<?php echo JCCMS_ADMIN_url;?>assets/css/app.css">
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/echarts.min.js"></script>
  </head>
  
  <body data-type="index">
	<?php include('../admin_config/admin_top.php');;?>
    <div class="tpl-page-container tpl-page-header-fixed">
	<?php include('../admin_config/admin_list.php');;?>
        <div class="tpl-content-wrapper">

            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li class="am-active">基本设置</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 基本设置
                    </div>
                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">
<?php
 $ad_top_json_url=JCCMS_ROOT."Basicsetup/Basicsetup.json";
error_reporting(E_ALL^E_NOTICE^E_WARNING);
header("Content-type: text/html; charset=utf-8");
include('../../class/class_txttest.php');
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
$date = $txt::select('1544977155');
$ad_top_url=$date['1'];
$ad_top_pic=$date['2'];
$ad_top_md=$date['3'];
$str_webs1 = explode('$$',$ad_top_url);
$web_title = $str_webs1['0'];	
$web_keywords =$str_webs1['1'];	
$web_description = $str_webs1['2'];	
$web_logo =$str_webs1['3'] ;	
$web_email =$ad_top_pic;	
$web_moban =$ad_top_md;
$web_moban = explode('@@',$web_moban);	
$web_moban_pc = $web_moban['0'];
$web_moban_wap = $web_moban['1'];	
?>	

                        <div class="am-u-sm-12 am-u-md-9">
                            <form method="post"  class="am-form am-form-horizontal">
								<div class="am-form-group">
                                    <label for="user-phone"  class="am-u-sm-3 am-form-label">PC模板选择 </label>
                                    <div class="am-u-sm-9">
                                        <select name="web_moban_pc" data-am-selected="{searchBox: 1}" >
										  <option value="<?php echo $web_moban_pc;?>">目前模板：<?php echo $web_moban_pc;?></option>
<?php 
  $filesnames = scandir("../../template/");
foreach ($filesnames as $name) {
	 if(strpos($name,'.') !==false || strpos($name,'-') !==false ){
	}else{
		echo	'<option value="'.$name.'">'.$name.'</option>';
	}
}
?>										  

										</select> 
										<a href="http://127.0.0.1/temp.html" target="_blank">
											<bas class="am-btn am-btn-primary">模板预览图</bas>
										</a>
                                    </div>
								</div>
								<div class="am-form-group">
                                    <label for="user-phone"  class="am-u-sm-3 am-form-label">WAP模板选择 </label>
                                    <div class="am-u-sm-9">
                                        <select name="web_moban_wap" data-am-selected="{searchBox: 1}" >
										  <option value="<?php echo $web_moban_wap;?>">目前模板：<?php echo $web_moban_wap;?></option>
<?php 
  $filesnames = scandir("../../template/");
foreach ($filesnames as $name) {
	 if(strpos($name,'.') !==false || strpos($name,'-') !==false ){
	}else{
		echo	'<option value="'.$name.'">'.$name.'</option>';
	}
}
?>										  

										</select> 
										<a href="http://127.0.0.1/temp.html" target="_blank">
											<bas class="am-btn am-btn-primary">模板预览图</bas>
										</a>
                                    </div>
								</div>								
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站名称</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="<?php echo $web_title;?>" name="web_title" placeholder="网站名称">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">关键字</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="<?php echo $web_keywords;?>" name="web_keywords" placeholder="关键字">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">关键描述</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="<?php echo $web_description;?>" name="web_description" placeholder="关键描述">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站logoURL</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="<?php echo $web_logo;?>" name="web_logo" placeholder="网站logoURL">
                                    </div>
                                </div>
								
                                <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label">广告邮箱</label>
                                    <div class="am-u-sm-9">
                                        <input type="email" value="<?php echo $web_email;?>" name="web_email" placeholder="广告邮箱">
                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="name" name="submit" class="am-btn am-btn-primary">保存修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			<?php include('../admin_config/admin_foot.php');?>
    </div>
<?php

if (isset($_POST['submit']) && isset($_POST['web_title']) && isset($_POST['web_keywords'])  && isset($_POST['web_description'])  && isset($_POST['web_logo']) && isset($_POST['web_email']) && isset($_POST['web_moban_pc'])&& isset($_POST['web_moban_wap'])) {
function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}



$web_title = post_input($_POST["web_title"]);
$web_title=str_replace('|','',$web_title);	
$web_keywords = post_input($_POST["web_keywords"]);	
$web_keywords=str_replace('|','',$web_keywords);	
$web_description = post_input($_POST["web_description"]);
$web_description=str_replace('|','',$web_description);	
$web_logo = post_input($_POST["web_logo"]);
$web_email = post_input($_POST["web_email"]);
$web_email=str_replace('|','',$web_email);
$web_moban_pc = post_input($_POST["web_moban_pc"]);
$web_moban_wap = post_input($_POST["web_moban_wap"]);

$bankinfo["ad_top_id"] = '1544977155';
$bankinfo["ad_top_url"] = $web_title."$$".$web_keywords."$$".$web_description."$$".$web_logo;
$bankinfo["ad_top_pic"] = $web_email;
$bankinfo["ad_top_md"] = $web_moban_pc.'@@'.$web_moban_wap;

$txt::alter($bankinfo,$ad_top_json_url); //改
?>
<script language="javascript"> 
<!-- 

alert("恭喜修改成功！"); 
window.location.href="Basicsetup.php" 

--> 
</script> 
<?php



}
//{"result":"ok","ad_top":[{"ad_top_url":"3","ad_top_pic":"3","ad_top_md":"3","ad_top_time":"123"}]}
?>		
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>

</html>