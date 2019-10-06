<?php



$JCCMS_pages=$C_T_3; //初始化页码 $type=$C_T_2;




 function JCCMS_chulis($type) {
	$data=file('./JCSQL/JCSQL_data/demoX/vod.JCSQL');
	$count=count($data)-1;
	$data_chuli="";
	for ($x=1; $x<=$count; $x++) {
		$data_arr=explode("|-|",$data[$x]);	$datas=$data_arr['1'];
		if($datas==$type){ $data_chuli .=$data_arr['0']."|-|".$data_arr['1']."|-|".$data_arr['2']."|-|".$data_arr['3']."|-|".$data_arr['4']."|-|".$data_arr['5'];$data_chuli .="\n";	 }	
	} 
	
	$arr = explode("\n", $data_chuli);
	$n=count($arr)-1;
	$ccd='';
	for ($i=1;$i<=100;$i++){//100的需要显示的行数的例子，不是100时请换为具体数
	$x=rand(0,$n);
	   $ccd .=$arr[$x]."\n";//随机显示一行
	}


	return    $JCCMS_SQL = array_values(array_filter( explode("\n", $ccd)));//处理之后的数据数组
	 	 
 }







 function JCCMS_types($type) {
/*********视频分类名称设置开始**********/
	switch($type){
	case '5':$C_T_2_type='5';$C_T_2_name = '日韩有码';break;
	case '6':$C_T_2_type='6';$C_T_2_name = '日韩无码';break;
	case '7':$C_T_2_type='7';$C_T_2_name = '欧美视频';break;
	case '8':$C_T_2_type='8';$C_T_2_name = '国产视频';break;
	case '9':$C_T_2_type='9';$C_T_2_name = '偷拍自拍';break;
	case '10':$C_T_2_type='10';$C_T_2_name = '成人动漫';break;
	case '11':$C_T_2_type='11';$C_T_2_name = '经典三级';break;
	case '15':$C_T_2_type='15';$C_T_2_name = '美熟少妇';break;
	case '16':$C_T_2_type='16';$C_T_2_name = '变态另类';break;
	default:$C_T_2_type='5';$C_T_2_name = '日韩有码';break;		
		}
		echo $C_T_2_name;
/*********视频分类名称设置结束**********/
 }





/*********列表分页数量直接输出开始**********/ 
 function JCCMS_pages($JCCMS_page) { echo $JCCMS_page; }
/*********列表分页数量直接输出结束**********/ 





 function JCCMS_SQLs($JCCMS_SQL,$x,$mozu) {
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
 





 
?>
