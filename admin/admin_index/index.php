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
	<?php include('../admin_config/admin_top.php');?>
    <div class="tpl-page-container tpl-page-header-fixed">
	<?php include('../admin_config/admin_list.php');?>
	<div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">使用说明</div>
        <ol class="am-breadcrumb">
          <li>
            <a href="#" class="am-icon-home">首页</a></li>
          <li></ol>
        <div class="tpl-content-scope">
          <div class="note note-info">
            <h3>800CMS 让建站简单化
              <span class="close" data-close="note"></span></h3>
            <p>使用官网最新版本，提高建站体验和建站安全</p>
            <p>1.本系统所有资源均自动采集，无需人工，省时省力。新版架构重新配置</p>
            <p>2.影院自适应所有设备，PC/手机/pad均可使用。</p>
            <p>3.本系统不依托任何第三方CMS，纯PHP，对环境要求小，基本所有的PHP环境都可轻松带起。</p>
            <p>4.所有广告及版权信息均可从后台更改。</p>
            <p>官网QQ群：895805864</p>
            <p>
              800cms 关注X站站长发展,从快捷建站——引流变现，不懈努力！</p></div>
        </div>
        <div class="am-u-md-6 am-u-sm-12 row-mb"></div>
      </div>
	<?php include('../admin_config/admin_foot.php');?>
    </div>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo JCCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>

</html>