<?php
switch($C_T_1){
	case 'type':$C_T_1 = 'type';break;//分类
	case 'neiron':$C_T_1 = 'neiron';break;//内容	
	default:$C_T_1 = 'type';break;//默认视频	
	}
include('search/'.$C_T_1.'.php');	
?>