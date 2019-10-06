<?php	
function class_301($JCCMS_ROOT){
$ad_top_json_url=$JCCMS_ROOT."admin_boss/ad.json";

include('./class/class_txttest.php');
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
$order = "asc";
$user=$txt::show($order);
$count=count($user);
$str = explode('|', $user['0']);	
$ad_top_url=$str['1'];
$ad_top_md=$str['3'];
$str_err_ids = explode('--',$ad_top_md);$str_err=$str_err_ids['1'];

if($str_err =="ok"){
	header('Location: '.$ad_top_url);exit();	

}
}
class_301(JCCMS_ROOT);
?>