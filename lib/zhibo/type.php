
<?php
$JCCMS_page=$C_T_3; //初始化页码 $type=$C_T_2;

switch($C_T_2){
	case '24':$C_T_2_type='24';$C_T_2_name = '精选直播';$flerr="top";break;
	case '25':$C_T_2_type='25';$C_T_2_name = '女性直播';$flerr="nv";break;
	case '26':$C_T_2_type='26';$C_T_2_name = '男性直播';$flerr="nan";break;
	case '27':$C_T_2_type='27';$C_T_2_name = '男女直播';$flerr="nannv";break;
	case '28':$C_T_2_type='28';$C_T_2_name = '人妖直播';$flerr="renyao";break;
	default:$C_T_2_type='24';$C_T_2_name = '精选直播';$flerr="top";break;	
	}
	$JCCMS_type_id=$C_T_2_type;$JCCMS_type_name=$C_T_2_name;
	
$zhibo=file('./assets/img/zhibo.png');
$zhiboapi=$zhibo['0'];
 $zhibourl=$zhiboapi."/".$flerr."/json.php?page=".$JCCMS_page;

 include('./template/'.$web_moban.'/zhibo_type.html');
?>




