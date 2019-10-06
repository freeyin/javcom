<?php
header('Content-Type:text/html;charset=utf-8');
date_default_timezone_set('PRC'); //设置中国时区 
error_reporting(E_ALL^E_NOTICE^E_WARNING);

$files=file('JCSQL.JCSQL');
 $files=$files['0'];
 $filess=date('Ymd', time());
if($files ==$filess){
	
}else{
?>
<script type="text/javascript">
　　window.location.href="/JCSQL/index.php";
　　</script>
<?php
exit();	
}


 
// 定义应用目录
//类型 
//?m=vod-type-5-2.html

if(isset($_GET['m'])){	
	$C_T = $_GET['m'];
}else{	
	$C_T = NULL;
}
$C_T =explode(".",$C_T);
$C_T =$C_T['0'];
$C_T =explode("-",$C_T);
if(isset($C_T['0'])){	
	$C_T_0=$C_T['0'];
}else{	
	$C_T_0 = NULL;
}
if(isset($C_T['1'])){	
	$C_T_1=$C_T['1'];
}else{	
	$C_T_1 = NULL;
}
if(isset($C_T['2'])){	
	$C_T_2=$C_T['2'];
}else{	
	$C_T_2 = '5';
}
if(isset($C_T['3'])){	
	$C_T_3=$C_T['3'];
}else{	
	$C_T_3 = 0;
}

define('JCCMS_ROOT','./Jccms_json/');
include('./class/class_301.php');



$file_path =JCCMS_ROOT."Basicsetup/Basicsetup.json";;
if(file_exists($file_path)){
$str = file_get_contents($file_path);//将整个文件内容读入到一个字符串中
$str = explode('|',$str);
$ad_top_url=$str['1'];
$ad_top_pic=$str['2'];
$ad_top_md=$str['3'];
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
$useragent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',
    substr($useragent, 0, 4))) {
    // 手机
   $web_moban = $web_moban_wap;
} else {
    // 电脑
   $web_moban = $web_moban_pc;
}

}

$qita =JCCMS_ROOT."qita/qita_dizhi.json";;
if(file_exists($qita)){
$strs = file_get_contents($qita);//将整个文件内容读入到一个字符串中
$strs = explode('|',$strs);
$dizhi1=$strs['1'];
$dizhi2=$strs['2'];
$dizhigongao=$strs['3'];

}





	













switch($C_T_0){
	case 'vod':$C_T_0 = 'vod';break;//视频
	case 'book':$C_T_0 = 'book';break;//小说	
	case 'pic':$C_T_0 = 'pic';break;//图片
	case 'zhibo':$C_T_0 = 'zhibo';break;//图片	
	case 'search':$C_T_0 = 'search';break;//视频搜索	
	default:$C_T_0 = 'index';break;//默认视频	
	}
switch($C_T_1){
	case 'type':$C_T_1 = 'type';break;//分类
	case 'detail':$C_T_1 = 'detail';break;//介绍页面新增20190226
	case 'neiron':$C_T_1 = 'neiron';break;//内容
	
	default:$C_T_1 = 'type';break;//默认视频	
	}	
$C_T_2=$C_T_2;//分类id或者视频id
$C_T_3=$C_T_3;//分页id



	  function Jccms_json_ad_top($html) {

		function show($order = "asc") {
				//数据显示程序段
				if (file_exists ( JCCMS_ROOT."ad/ad_top/ad.json" )) { //检测文件是否存在
					$array = file ( JCCMS_ROOT."ad/ad_top/ad.json" ); //将文件全部内容读入到数组$array
					if ($order == "asc") {
						$arr = $array;
					}
					else
					{
						$arr = array_reverse ( $array ); //将$array里的数据安行翻转排列（即最后一行当第一行，依此类推）读入数组$arr的每一个单元（$arr[0]...）。
					}
				}
				return $arr;
		}
			
				$user=show("asc");
			
			$count=count($user);
			for ($x=0; $x<=$count-1; $x++) {$str = explode('|', $user[$x]);$ad_top_url=$str['1'];$ad_top_pic=$str['2'];
				$htmlyoulian=preg_replace('#链接#',$ad_top_url,$html);
				echo $htmlyoulian=preg_replace('#图片#',$ad_top_pic,$htmlyoulian);	

				
			} 
		}
	  function Jccms_json_ad_video($html) {

		function shows($order = "asc") {
				//数据显示程序段
				if (file_exists ( JCCMS_ROOT."ad/ad_video/ad.json" )) { //检测文件是否存在
					$array = file ( JCCMS_ROOT."ad/ad_video/ad.json" ); //将文件全部内容读入到数组$array
					if ($order == "asc") {
						$arr = $array;
					}
					else
					{
						$arr = array_reverse ( $array ); //将$array里的数据安行翻转排列（即最后一行当第一行，依此类推）读入数组$arr的每一个单元（$arr[0]...）。
					}
				}
				return $arr;
		}
			
				$user=shows("asc");
			
			$count=count($user);
			for ($x=0; $x<=$count-1; $x++) {$str = explode('|', $user[$x]);$ad_top_url=$str['1'];$ad_top_pic=$str['2'];
				$htmlyoulian=preg_replace('#链接#',$ad_top_url,$html);
				echo $htmlyoulian=preg_replace('#图片#',$ad_top_pic,$htmlyoulian);	

				
			} 
		}
include('./lib/'.$C_T_0.'.php');


include('./class/class_ad_Popup.php');
include('./class/class_statistics.php');
include('./class/cllass_ad_js.php');
include('./class/class_ad_float.php');
?>

	
