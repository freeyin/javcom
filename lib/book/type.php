<?php
//include('./JCSQL/JCSQL_lib/JCSQL_lib.php');
$data=file('./JCSQL/JCSQL_data/demoX/book.JCSQL');
$JCCMS_page=$C_T_3; //初始化页码 $type=$C_T_2;
//$pagesize = 20; //设置记录显示条数
$count=count($data)-1;
$data_chuli="";
//屏蔽报错
error_reporting(E_ALL^E_NOTICE^E_WARNING);
for ($x=1; $x<=$count; $x++) {
	$data_arr=explode("|-|",$data[$x]);	
	 $datas=$data_arr['1'];
	if($datas==$C_T_2){ $data_chuli .=$data_arr['0']."|-|".$data_arr['1']."|-|".$data_arr['2']."|-|".$data_arr['3']."|-|".$data_arr['4']."|-|".$data_arr['5'];$data_chuli .="\n";	 }	
} 

switch($C_T_2){
	case '18':$C_T_2_type='18';$C_T_2_name = '激情都市';break;
	case '19':$C_T_2_type='19';$C_T_2_name = '家庭乱伦';break;
	case '20':$C_T_2_type='20';$C_T_2_name = '青春校园';break;
	case '21':$C_T_2_type='21';$C_T_2_name = '武侠虚幻';break;
	case '22':$C_T_2_type='22';$C_T_2_name = '人妻熟女';break;
	case '23':$C_T_2_type='23';$C_T_2_name = '强暴虐待';break;
	default:$C_T_2_type='18';$C_T_2_name = '激情都市';break;	
	}
	$JCCMS_type_id=$C_T_2_type;$JCCMS_type_name=$C_T_2_name;

	
	
 $JCCMS_SQL = array_values(array_filter( explode("\n", $data_chuli)));//处理之后的数据数组

 function JCCMS_page($JCCMS_page) {
	echo $JCCMS_page;
 } 

 function JCCMS_SQL($JCCMS_SQL,$x,$mozu) {
	 $JCCMS_SQL=explode("|-|",$JCCMS_SQL[$x]);
		switch($mozu){
			case 'JCCMS_SQL_id':$mozus =$JCCMS_SQL['0'];break;
			case 'JCCMS_SQL_type':$mozus =$JCCMS_SQL['1'];break;
			case 'JCCMS_SQL_name':$mozus =$JCCMS_SQL['2'];break;	
			case 'JCCMS_SQL_pic':$mozus =$JCCMS_SQL['3'];break;
			case 'JCCMS_SQL_playurl':$mozus =$JCCMS_SQL['4'];break;
			case 'JCCMS_SQL_time':$mozus =$JCCMS_SQL['5'];break;		
			default:$mozus = $JCCMS_SQL['0'];break;
			}	 
			 echo $mozus;
 }

 include('./template/'.$web_moban.'/book_type.html');
?>







