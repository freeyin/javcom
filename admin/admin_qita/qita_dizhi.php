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
                <li class="am-active">其它设置</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 其它设置
                    </div>
                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">
<?php
 $ad_top_json_url=JCCMS_ROOT."qita/qita_dizhi.json";
error_reporting(E_ALL^E_NOTICE^E_WARNING);
header("Content-type: text/html; charset=utf-8");
include('../../class/class_txttest.php');
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
$date = $txt::select('1544977155');
$dizhi1=$date['1'];
$dizhi2=$date['2'];
$dizhigongao=$date['3'];
	
?>	

                        <div class="am-u-sm-12 am-u-md-9">
                            <form method="post"  class="am-form am-form-horizontal">

								
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">发布地址一</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="<?php echo $dizhi1;?>" name="dizhi1" placeholder="发布地址一">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">发布地址二</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="<?php echo $dizhi2;?>" name="dizhi2" placeholder="发布地址二">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">公告内容</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="<?php echo $dizhigongao;?>" name="dizhigongao" placeholder="公告内容控制30个字符以内">
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

if (isset($_POST['submit']) && isset($_POST['dizhi1']) && isset($_POST['dizhi2'])  && isset($_POST['dizhigongao']) ) {
function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}		
$dizhi1 = post_input($_POST["dizhi1"]);	
$dizhi2 = post_input($_POST["dizhi2"]);	
$dizhigongao = post_input($_POST["dizhigongao"]);
$bankinfo["ad_top_id"] = '1544977155';
$bankinfo["ad_top_url"] = $dizhi1;
$bankinfo["ad_top_pic"] = $dizhi2 ;
$bankinfo["ad_top_md"] = $dizhigongao;

$txt::alter($bankinfo,$ad_top_json_url); //改
?>
<script language="javascript"> 
<!-- 

alert("恭喜修改成功！"); 
window.location.href="qita_dizhi.php" 

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