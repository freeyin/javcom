<?php include('../admin_config/config.php');
$ad_top_json_url=JCCMS_ROOT."Basicsetup/statistics.json";
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
                <li>系统设置</li>
				<li>流量统计设置</li>
            </ol>
            <div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 流量统计设置
                    </div>
                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form method="post"  class="am-form am-form-horizontal">
							<div class="am-form-group">
                                    <label for="user-intro" class="am-u-sm-3 am-form-label">流量统计JS代码</label>
                                    <div class="am-u-sm-9">
                                        <textarea name="lmjs" rows="5" id="user-intro" placeholder="请提供js广告代码如：<script src=‘http://127.0.0.8/assets/js/echarts.min.js’></script>"><?php include($ad_top_json_url);?></textarea>
                                        <small>可填写多个js广告代码</small>
                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button name="submit" type="submit" class="am-btn am-btn-primary">保存修改</button>
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


if (isset($_POST['submit']) && isset($_POST['lmjs'])) {
error_reporting(E_ALL^E_NOTICE^E_WARNING);
header("Content-type: text/html; charset=utf-8");
include('../../class/class_txttest_js.php');
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
$bankinfo['lmjs']=$_POST["lmjs"];
$txt::alter($bankinfo); 




?>
<script language="javascript"> 
<!-- 

alert("恭喜修改成功！"); 
window.location.href="statistics.php" 

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