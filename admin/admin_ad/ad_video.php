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
                <li>广告设置</li>
				 <li class="am-active">播放横幅广告</li>
            </ol>
<div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 播放横幅广告
                    </div>



                </div>
                <div class="tpl-block">
                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="ad_video_add.php"><button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                            <form class="am-form">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-title">广告链接</th>
                                            <th class="table-type">广告图片</th>
                                            <th class="table-date am-hide-sm-only">备注</th>
											 <th class="table-date am-hide-sm-only">修改时间</th>
                                            <th class="table-set">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody style="word-break: break-all;">	
									
<?php	
$ad_top_json_url=JCCMS_ROOT."ad/ad_video/ad.json";
error_reporting(E_ALL^E_NOTICE^E_WARNING);
header("Content-type: text/html; charset=utf-8");
include('../../class/class_txttest.php');
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
//$txt::insert($bankinfo);  //增
//$txt::alter($bankinfo); //改
//$txt::delete(105); //删
//$date = $txt::select(105); //查
//var_dump($date);
$order = "asc"; // asc 升序 desc 降序
$txt::show($order); //显示所有
$user=$txt::show($order);
$count=count($user);

for ($x=0; $x<=$count-1; $x++) {
	$str = explode('|', $user[$x]);
     $ad_top_id=$str['0'];	
     $ad_top_url=$str['1'];
	$ad_top_pic=$str['2'];
	$ad_top_md=$str['3'];
	$ad_top_time=$str['4'];
	
?>
                                        <tr>
                                            <td><a href="#"><?php echo $ad_top_url?></a></td>
                                            <td><?php echo $ad_top_pic?></td>
                                            <td class="am-hide-sm-only"><?php echo $ad_top_md?></td>
											<td class="am-hide-sm-only"><?php echo $ad_top_time?></td>
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
<a href="ad_video_mod.php?id=<?php echo $ad_top_id?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                                                        <a href="?sc=6000&id=<?php echo $ad_top_id?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

<?php	
	
} 

?>	

                                    </tbody>
                                </table>
                                <hr>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="tpl-alert"></div>
            </div>        </div>
				<?php include('../admin_config/admin_foot.php');?>
    </div>
<?php
if (isset($_GET['sc']) && isset($_GET['id']) ) {	
function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}	
$sc = post_input($_GET["sc"]);	
$id = post_input($_GET["id"]);	
if($sc =="6000"){
	
$txt::delete($id);	
?>
	<script language="javascript"> 
	<!-- 

	alert("恭喜删除成功！"); 
	window.location.href="ad_video.php" 

	--> 
	</script> 
<?php
	}
}	
?>	
	
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>

</html>