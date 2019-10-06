(function(){
	var $_GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();
    var imgs=[
        {src:ad_float_pic,link:ad_float_url}

    ];
    var side={
        left1:{src:"http://imgss.tripsmc.com/static/images/ps/1547685782771409544.gif",link:'http://www.baidu.com'},
        left2:{src:"http://imgss.tripsmc.com/static/images/ps/1536215709251854345.gif",link:'http://www.baidu.com'},
        left3:{src:"http://img99.yingshengyl.com/static/images/ps/1538549784327367065.gif",link:'http://www.baidu.com'},
        right1:{src:"http://imgss.tripsmc.com/static/images/ps/1544486867510000753.gif",link:'http://www.baidu.com'},
        right2:{src:"http://imgss.tripsmc.com/static/images/ps/1530753634949938830.gif",link:'http://www.baidu.com'},
        right3:{src:"http://img99.yingshengyl.com/static/images/ps/153933106057273678.gif",link:'http://www.baidu.com'},
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
            dom1.innerHTML='<a class="propa_bottom" href="'+imgs[num].link+'" >'+'<img id="propa_bottom" src='+imgs[num].src+' /><span class="close">关闭</span></a>';
            if(document.cookie.search('propa=true')==-1){
                var expires = 24 * 60 * 60 * 1000;
                var date = new Date(+new Date()+expires);
                document.cookie="propa=true;expires="+date.toUTCString(); 
                console.log(document.cookie);
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
    if(side.left1.src){
        propaHTML+='<a class="propa_left1" href="'+side.left1.link+'" >'+'<img src='+side.left1.src+' /><span class="close">关闭</span></a>'
    }
    if(side.left2.src){
        propaHTML+='<a class="propa_left2" href="'+side.left2.link+'" >'+'<img src='+side.left2.src+' /><span class="close">关闭</span></a>'
    }
    if(side.left3.src){
        propaHTML+='<a class="propa_left3" href="'+side.left3.link+'" >'+'<img src='+side.left3.src+' /><span class="close">关闭</span></a>'
    }
    if(side.right1.src){
        propaHTML+='<a class="propa_right1" href="'+side.right1.link+'" >'+'<img src='+side.right1.src+' /><span class="close">关闭</span></a>'
    }
    if(side.right2.src){
        propaHTML+='<a class="propa_right2" href="'+side.right2.link+'" >'+'<img src='+side.right2.src+' /><span class="close">关闭</span></a>'
    }
    if(side.right3.src){
        propaHTML+='<a class="propa_right3" href="'+side.right3.link+'" >'+'<img src='+side.right3.src+' /><span class="close">关闭</span></a>'
    }
    document.getElementsByTagName('head')[0].appendChild(style);
    dom.innerHTML=propaHTML;
    document.body.appendChild(dom);
    for(var i=0,max=document.getElementsByClassName('close').length;i<max;i++){
        document.getElementsByClassName('close')[i].onclick=function(event){  
            event.preventDefault();
            this.parentNode.style.display='none';
        }
    }
})(); 