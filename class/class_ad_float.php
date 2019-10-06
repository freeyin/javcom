<?php	
$ad_top_json_url=JCCMS_ROOT."ad/ad_float/ad.json";
error_reporting(E_ALL^E_NOTICE^E_WARNING);
include_once('../class/class_txttest.php');
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
$user=$txt::show($order);
$count=count($user);
$str = explode('|', $user['0']);
$ad_top_url=$str['1'];
$ad_top_pic=$str['2'];
$ad_top_md=$str['3'];
$str_err_ids = explode('--',$ad_top_md);$str_err=$str_err_ids['1'];

if($str_err =="ok"){
$ad_float_pics=$ad_top_pic;$ad_float_urls=$ad_top_url;
	// echo'<script language="javascript">var  ad_float_pic="'.$ad_top_pic.'"; var ad_float_url="'.$ad_top_url.'";</script><script language="javascript" src="/assets/js/dipiao_duilian.js"></script>';

}

$ad_top_json_url=JCCMS_ROOT."ad/ad_Couplets/ad.json";
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
$order = "asc"; // asc 升序 desc 降序
$user=$txt::show($order);
$count=count($user);
	$left1_url=null;$left1_pic=null;
	$left2_url=null;$left2_pic=null;
	$left3_url=null;$left3_pic=null;	
for ($x=0; $x<=$count-1; $x++) {
	$str = explode('|', $user[$x]);
     $ad_top_id=$str['0'];	
     $ad_top_url=$str['1'];
	$ad_top_pic=$str['2'];
	$ad_top_md=$str['3'];
	$ad_top_time=$str['4'];
	$str_err_ids = explode('--',$ad_top_md);
	$str_err=$str_err_ids['1'];
	$ad_top_md=$str_err_ids['0'];

	if($ad_top_id =="1544970714"){$str_err_name="上对联";
		if($str_err =="ok"){$str_err_names="开启";
		 $left1_url=$ad_top_url;$left1_pic=$ad_top_pic;
		}
	}
	if($ad_top_id =="1544970715"){$str_err_name="中对联";
		if($str_err =="ok"){$str_err_names="开启";
		 $left2_url=$ad_top_url;$left2_pic=$ad_top_pic;
		}	
	}
	if($ad_top_id =="1544970716"){$str_err_name="下对联";
		if($str_err =="ok"){$str_err_names="开启";
		 $left3_url=$ad_top_url;$left3_pic=$ad_top_pic;
		}		
	}

	
} 

?>
<script language="javascript">
(function(){
    var imgs=[
        {src:"<?php echo $ad_float_pics?>",link:'<?php echo $ad_float_urls?>'}
    ];
    var side={
        left1:{src:"<?php echo $left1_pic?>",link:'<?php echo $left1_url?>'},
        left2:{src:"<?php echo $left2_pic?>",link:'<?php echo $left2_url?>'},
        left3:{src:"<?php echo $left3_pic?>",link:'<?php echo $left3_url?>'},
        right1:{src:"<?php echo $left1_pic?>",link:'<?php echo $left1_url?>'},
        right2:{src:"<?php echo $left2_pic?>",link:'<?php echo $left2_url?>'},
        right3:{src:"<?php echo $left3_pic?>",link:'<?php echo $left3_url?>'},
    }
    var ua = navigator.userAgent.toLocaleLowerCase(),
        mobileOn=ua.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i);
        dom=document.createElement('div'),
        style=document.createElement('style'),
        propaHTML='';
        num=parseInt(Math.random()*imgs.length);
    style.innerHTML='.propa_bottom{position:fixed;width:100%;height:auto;left:0;bottom:0}'+
                    '.propa_bottom img{display:block;width:100%;height:auto}'+
                    '.propa_left1,.propa_left2,.propa_left3{position:fixed;left:0;}'+
                    '.propa_right1,.propa_right2,.propa_right3{position:fixed;right:0;text-align: right;}'+
                    '.propa_left1 img,.propa_left2 img,.propa_left3 img,.propa_right1 img,.propa_right2 img,.propa_right3 img{opacity: 1;max-height:100%;max-width:100%;}'+
                    '.propa_left1,.propa_right1{top:0}'+
                    '.propa_left2,.propa_right2{top:50%;margin-top:-7.25%}'+
                    '.close{position:absolute;left:0;top:0;font-size: 14px;padding: 5px 10px;background: rgba(0, 0, 0, 0.8);color: #fff;display: inline-block;}'+
                    '.propa_right1 .close,.propa_right2 .close,.propa_right3 .close{right:0; left:unset}';
    if(mobileOn){
        if(imgs[num].src){
            var dom1=document.createElement('div');
            dom1.innerHTML='<a class="propa_bottom"  target="_blank"  href="'+imgs[num].link+'" >'+'<img id="propa_bottom" src='+imgs[num].src+' /><span class="close">关闭</span></a>';
            if(document.cookie.search('propa=true')==-1){
                document.body.appendChild(dom1);
                document.getElementById('propa_bottom').onload = function(e){
                    style.innerHTML+='.propa_left3,.propa_right3{bottom:'+document.getElementById('propa_bottom').offsetHeight+'px}';
                }
            }else{
                style.innerHTML+='.propa_left3,.propa_right3{bottom:0}';
            }
        }
        style.innerHTML+='.propa_right1,.propa_right2,.propa_right3,.propa_left1,.propa_left2,.propa_left3{width:20%;max-height: 25%;overflow:hidden}';
    }else{
        style.innerHTML+='.propa_right1,.propa_right2,.propa_right3,.propa_left1,.propa_left2,.propa_left3{width:200px;max-height: 25%;overflow:hidden}';
    }
    if(!mobileOn||!imgs[num].src){
        style.innerHTML+='.propa_left3,.propa_right3{bottom:0}';
    }
    if(side.left1.src&&document.cookie.search('propa_left1=true')==-1){
        propaHTML+='<a class="propa_left1" target="_blank" href="'+side.left1.link+'" >'+'<img src='+side.left1.src+' /><span class="close">关闭</span></a>'
    }
    if(side.left2.src&&document.cookie.search('propa_left2=true')==-1){
        propaHTML+='<a class="propa_left2" target="_blank" href="'+side.left2.link+'" >'+'<img src='+side.left2.src+' /><span class="close">关闭</span></a>'
    }
    if(side.left3.src&&document.cookie.search('propa_left3=true')==-1){
        propaHTML+='<a class="propa_left3" target="_blank" href="'+side.left3.link+'" >'+'<img src='+side.left3.src+' /><span class="close">关闭</span></a>'
    }
    if(side.right1.src&&document.cookie.search('propa_right1=true')==-1){
        propaHTML+='<a class="propa_right1" target="_blank" href="'+side.right1.link+'" >'+'<img src='+side.right1.src+' /><span class="close">关闭</span></a>'
    }
    if(side.right2.src&&document.cookie.search('propa_right2=true')==-1){
        propaHTML+='<a class="propa_right2" target="_blank" href="'+side.right2.link+'" >'+'<img src='+side.right2.src+' /><span class="close">关闭</span></a>'
    }
    if(side.right3.src&&document.cookie.search('propa_right3=true')==-1){
        propaHTML+='<a class="propa_right3" target="_blank" href="'+side.right3.link+'" >'+'<img src='+side.right3.src+' /><span class="close">关闭</span></a>'
    }
    document.getElementsByTagName('head')[0].appendChild(style);
    dom.innerHTML=propaHTML;
    document.body.appendChild(dom);
    for(var i=0,max=document.getElementsByClassName('close').length;i<max;i++){
        document.getElementsByClassName('close')[i].onclick=function(event){  
            event.preventDefault();
            this.parentNode.style.display='none';
            var expires = 24 * 60 * 60 * 1000;
            var date = new Date(+new Date()+expires);
            document.cookie=this.parentNode.className+"=true;expires="+date.toUTCString(); 
            console.log(document.cookie);
        }
    }
})(); 
</script>