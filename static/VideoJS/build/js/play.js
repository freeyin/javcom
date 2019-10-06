function initVideo(param) {
    var videoH5Id = '#' + param.id + '_html5_api',
        ua = navigator.userAgent.toLocaleLowerCase(),
        mobileOn=ua.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i),
        videoObj = videojs(param.id, {
            sources: [
                {
                    src: param.url,
                    type: 'application/x-mpegURL'
                }
            ],
            width: '100%',
            height:'100%',
            controls: true,
            autoplay: false,
            flash: {
                swf: '/static/VideoJS/video-js.swf'
            },
            techOrder: ['html5', 'flash'],
            controlBar: {
                remainingTimeDisplay: false
            }
        });
    if(mobileOn){
        videoObj.addClass('mobile');
    }else{
        var keyListen={
            speed:5,
            resetSpeed:1,
            showMove:videojs.dom.createEl('div', { }, { class:'show-move' }),
            direct:0
        }
        document.onkeydown=function(event){
            var e = event || window.event || arguments.callee.caller.arguments[0];
            console.log(e.keyCode);
            if(e&&(e.keyCode==39||e.keyCode==37||e.keyCode==32)){
                e.preventDefault();
            }
            if(e.keyCode==32){
                if(videoObj.paused()){
                    videoObj.play();
                }else{
                    videoObj.pause();
                }
            }
            if(e&&e.keyCode==39&&!videoObj.paused()){
                if(keyListen.direct<0){
                  keyListen.speed=5
                }
                keyListen.direct=1;
                keyListen.speed+=5;
                videoObj.currentTime(videoObj.currentTime()+keyListen.speed);
                keyListen.showMove.innerHTML='+'+keyListen.speed;
                videojs.dom.appendContent(videoObj.el_, keyListen.showMove);
            }
            if(e&&e.keyCode==37&&!videoObj.paused()){
                if(keyListen.direct>0){
                  keyListen.speed=5
                }
                keyListen.direct=-1;
                keyListen.speed+=5;
                videoObj.currentTime(videoObj.currentTime()-keyListen.speed);
                keyListen.showMove.innerHTML='-'+keyListen.speed;
                videojs.dom.appendContent(videoObj.el_, keyListen.showMove);
            }
            if(keyListen.resetSpeed){
                clearTimeout(keyListen.resetSpeed);
                keyListen.resetSpeed=setTimeout(function(){
                    keyListen.speed=5
                },500);
            }
        }
    }
    if (param.ad && param.ad.pre && param.ad.pre.url) {
        videoObj.ads({ timeout: 10000 });
        var preAD = {
            preAdLink: function () {
                window.open(param.ad.pre.link);
                videoObj.pause();
            },
            skip: videojs.dom.createEl('div', { }, { class:'adskip' }, mobileOn ? [videojs.dom.createEl('span', { }, { },'查看详情'),videojs.dom.createEl('span', { }, { },'跳过广告')]:videojs.dom.createEl('span', { }, { },'跳过广告')),
            closeAD: null
        }
        videoObj.on('readyforpreroll', function () {
            videoObj.ads.startLinearAdMode();
            videoObj.src(param.ad.pre.url);
            videoObj.one('adplaying', function () {
                clearTimeout(preAD.closeAD);
                videoObj.trigger('ads-ad-started');
                videojs.dom.appendContent(videoObj.el_, preAD.skip);
                videoObj.on(videoObj.children_[0],'click', preAD.preAdLink);
                if (mobileOn) {
                    videoObj.el_.parentNode.style.paddingBottom = '28px';
                    videoObj.on(videoObj.children_[0],'touchend', preAD.preAdLink);
                }
                videoObj.on(preAD.skip, 'click', function () {
                    videoObj.ads.endLinearAdMode();
                    preAD.preAdLink();
                    videoObj.el_.removeChild(preAD.skip);
                    videoObj.off(videoObj.children_[0],'click', preAD.preAdLink);
                    videoObj.off(videoObj.children_[0],'touchend', preAD.preAdLink);
                    if (mobileOn) { 
                        videoObj.el_.parentNode.style.paddingBottom = '0';
                    }
                });
            });
            videoObj.one('adended', function () {
                videoObj.ads.endLinearAdMode();
                videoObj.off(videoObj.children_[0],'click', preAD.preAdLink);
                videoObj.off(videoObj.children_[0],'touchend', preAD.preAdLink);
                videoObj.el_.removeChild(preAD.skip);
                videoObj.el_.parentNode.style.paddingBottom = '0';
            });
        });
        videoObj.trigger('adsready');
        preAD.closeAD = setTimeout(function () {
            videoObj.ads.endLinearAdMode();
        }, 15000);
    }
    if (param.ad && param.ad.pause && param.ad.pause.url && !(ua.indexOf('sogou') > -1 && ua.indexOf('mobile') > -1)) {
        var pauAD = {
            adCover:videojs.dom.createEl('a', {
                style: "position:absolute;bottom:3em;left:0;top:3em;right:0;text-align:center;",
                href: param.ad.pause.link ? param.ad.pause.link : 'javascript:void(0);'
            }, { class: "pasuAD", target: "_blank" },
                videojs.dom.createEl('img', { style: "max-width:100%; max-height:100%;", src: param.ad.pause.url })
            ),
            manual: false
        }
        videoObj.on('pause', function () {
            if (mobileOn) {
                videojs.dom.$(videoH5Id).style.left = '-100%';
            }
            videojs.dom.appendContent(videoObj.el_, pauAD.adCover);
        })
        videoObj.on('play', function () {
            if (mobileOn) {
                videojs.dom.$(videoH5Id).style.left = '0';
            }
            if (videojs.dom.$('.pasuAD')) {
                videoObj.el_.removeChild(pauAD.adCover);
            }
        })
    }
    return videoObj;
  };