<?php
error_reporting(0); 
include("os.php");
$playid=$_GET["playid"];
$ly=$_GET["ly"];
$pid=$_GET[pid];
$uid=$_GET[uid];
$ip=$_SERVER["REMOTE_ADDR"];
$type="where ip='$ip'";
$user=queryall(uboip,$type);
if($pid){
$url="?pid=".$pid."&uid=".$uid;
$link="&pid=".$pid."&uid=".$uid;
}else{
$url="";
$link="";
}
$type="where id='$playid'";
$neirong=queryall(ubozb,$type);
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
$tzurl="http://".$_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html class="js cssanimations">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta charset="gb2312">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta content="black" name="apple-mobile-web-app-status-bar-style">
<meta content="telephone=no" name="format-detection">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/kl.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/js123.js"></script>
<title>直播</title>
<script>
function onBridgeReady(){
WeixinJSBridge.call('hideOptionMenu');
}
if (typeof WeixinJSBridge == "undefined"){
if( document.addEventListener ){
document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
}else if (document.attachEvent){
document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
}
}else{
onBridgeReady();
}
</script>
<style>
body {padding: 0;margin: 0;background: #000;width: 100%;}
.gift ul {list-style: none;margin: 0;padding: 0;border-top: 1px solid #eee;border-left: 1px solid #eee;}
.gift ul li {float: left;width: 25%;height: 100px;box-sizing:border-box;-webkit-box-sizing: border-box;border-right: 1px solid #eee;border-bottom: 1px solid #eee;display: block;text-align: center;font-size: 16px;padding: 10px 0 0 0;}
.gift ul li .jb {color: yellow;font-size: 14px;display: block;padding-top: 5px;}
.gift ul li img{width: 30px;}
</style>
</head>
<body>
<input id="userid" name="userid" value="<?php echo $user[userid]?>" type="hidden">
<input id="pid" name="pid" value="<?php echo $pid?>" type="hidden">
<input id="uid" name="uid" value="<?php echo $uid?>" type="hidden">
<input id="url" name="url" value="<?php echo $tzurl?>" type="hidden">
<input id="id" name="id" value="<?php echo $neirong[id]?>" type="hidden">
<!-- 加载 -->
<div style="width: 100%;height: 200px;line-height: 200px;text-align: center;position: absolute;margin: auto;top: 0;bottom: 0;background: #000;color: #fff;z-index: 9999999;display: none;" class="loading">
<img src="images/loding.gif" style="margin: 0 auto;width: 45px;vertical-align: middle;">升级VIP享受高速观看通道..</div>
<!-- 分享 -->
<div class="share" style="width: 100%;height: 150px;position: absolute;left: 0;bottom: 0;color: #fff;z-index: 9999999;display: none;">
<div style="width: 100%;height: 150px;background: #000;opacity: 0.6;position: absolute;left: 0;bottom: 0;">
</div>
<span style="position: absolute;display: block;width: 80%;height: 40px;line-height: 40px;border-bottom: 2px solid #fff;margin: 10px auto 10px auto;text-align: center;font-weight: 900;left: 0;right: 0;">每日分享领金币</span>
<div style="width: 80%;margin:auto;text-align: center;position: absolute;left: 0;right: 0;top: 65px;">
<img src="images/wechat_share_normal.png" style="float: left;width: 50px;">
<img src="images/wechat_quan_share_normal.png" style="width: 50px;">
<img src="images/weibo_share_normal.png" style="float: right;width: 50px;">
</div>
<div style="width: 80%;margin:auto;text-align: center;font-size: 13px;position: absolute;left: 0;right: 0;bottom: 10px;">
<span style="float: left;text-indent: 10px;">微信</span>
<span style="width: 50px;">朋友圈</span>
<span style="float: right;padding-right: 10px;">微博</span>
</div>
</div>
<!-- 弹幕 -->
<div class="msg" style="width: 100%;height: 40px;position: absolute;left: 0;bottom: 15px;display: none;z-index: 9999999;">
<input style="width: 70%;height: 40px;background: #fff;border: 1px solid #ccc;border-radius: 5px;text-indent: 10px;margin-left: 3%;opacity: 0.8;" placeholder="说点什么吧" class="msgText" type="text">
<span style="width: 80px;height: 40px;text-align: center;line-height: 40px;background: lightskyblue;color: #fff;display: inline-block;vertical-align: middle;border-radius: 5px;" class="send">发送</span>
</div>
<!-- coin -->
<div style="width: 60%;height: 200px;background: #fff;position: fixed;left: 0;right: 0;top: 0;bottom: 0;margin: auto;z-index: 99999999;border-radius: 5px;text-align: center;font-size: 13px;display: none;" class="coin">
<img src="images/dxclose.png" style="width: 40px;margin-top: 15px;">
<span style="font-size: 18px;display: block;margin-top: 10px;">金币不足</span>
<span style="display: block;margin-top: 10px;color: #666;">当前金币不足，去充值</span>
<span style="display: inline-block;width: 60px;height: 30px;background: #ccc;color: #fff;border-radius: 5px;line-height: 30px;margin-top: 15px;margin-right: 15px;" class="coinClose">取消</span>
<span style="display: inline-block;width: 60px;height: 30px;background: darkred;color: #fff;border-radius: 5px;line-height: 30px;margin-top: 15px;" class="coinPay"><a onClick="pay('<?php echo $zhifu[daxiu1]?>');">确定</a></span>
</div>
<!-- 礼物 -->
<div class="gift" style="color: #fff;display: none;z-index: 9999999;width: 100%;height: 240px;position: absolute;left: 0;bottom: 0;">
<div style="width: 100%;height: 240px;background: #000;opacity: 0.6;color: #fff;position: absolute;left: 0;bottom: 0;">
</div>
<div style="width: 100%;height: 40px;position: absolute;left: 0;bottom: 0;line-height: 40px;padding-left: 3%;">余额 
<span style="font-size: 18px;color: yellow;"><?php echo $user[jb]?></span>
<span style="float: right;width: 80px;height: 40px;line-height: 40px;background: yellow;font-size: 18px;font-weight: 900;color: #000;text-align: center;padding-right: 3%;" class="coinPay"><a onClick="pay('<?php echo $zhifu[daxiu1]?>');">充值</a></span>
</div>
<div style="width: 100%;height: 200px;position: absolute;left: 0;bottom: 40px;">
<ul>
<li><img src="images/10000041.png"><br>鼓掌<span class="jb">30金币</span></li>
<li><img src="images/10000011.png"><br>玫瑰花<span class="jb">50金币</span></li>
<li><img src="images/10000079.png"><br>飞吻<span class="jb">99金币</span></li>
<li><img src="images/10000052.png"><br>奶嘴<span class="jb">99金币</span></li>
<li><img src="images/10000028.png"><br>私人别墅<span class="jb">288金币</span></li>
<li><img src="images/40000802.png"><br>怦然心动<span class="jb">388金币</span></li>
<li><img src="images/40000001.png"><br>法拉利<span class="jb">999金币</span></li>
<li><img src="images/40000006.png"><br>私人飞机<span class="jb">1999金币</span></li>
</ul>
</div>
</div>
<!-- 用户信息 -->
<div style="width: 100%;height: 250px;background: #000;opacity: 0.8;color: #fff;position: absolute;margin: auto;left: 0;right: 0;display: none;" id="userMask">
</div>
<div class="userInfo" style="position:absolute;width: 100%;top:0;left: 0;color: #fff;font-size: 13px;margin: auto;left: 0;right: 0;display: none;z-index: 9999999999;">
<img src="images/huhua.png" style="position:absolute;width: 40px;right: 30px;top: 30px;border-radius:50%; overflow:hidden;">
<img class="am-circle" src="<?php $neinong[pic]?>" style="width: 60px;height:60px;display: block;margin: 30px auto 10px auto;border-radius:50%; overflow:hidden;">
<span style="text-align: center;display: block;"><?php echo $neirong[name]?></span>
<span style="text-align: center;display: block;margin-top: 5px;">ID:<?php echo $neirong[id]?>   <?php echo $neirong[diqu]?></span>
<div style="display: flex;margin-top: 5px;">
<div style="flex:1;text-align: center;">关注: <span style="color: yellow">2135</span></div>
<div style="flex:1;text-align: center;">富豪值: <span style="color: yellow">6857</span></div>
</div>
<div style="display: flex;margin-top: 5px;">
<div style="flex:1;text-align: center;">粉丝: <span style="color: yellow">4573</span></div>
<div style="flex:1;text-align: center;">魅力值: <span style="color: yellow">3875</span>
</div>
</div>
<button type="button" style="width: 70%;margin: 5px auto 0 auto;display: none;height: 35px;line-height: 35px;border-radius:5px;background: #ccc;border: none;color: #000;" class="followed">已关注</button>
<button type="button" style="width: 70%;margin: 5px auto 0 auto; display: block;height: 35px;line-height: 35px;border-radius:5px;background: yellow;border: none;" id="<?php echo $neirong[id]?>" class="follow">+ 关注</button>
</div>
<!--买票按-->
<img src="images/mp22.png" style="position: fixed; margin: auto; left: 0px; right: 0px; bottom: 100px; z-index: 900; display: block; width: 20%;" id="maipiao">
<div style="background: url(images/gb2.png) no-repeat;background-size: contain;width: 300px;height:200px;position: absolute;margin:auto;left: 0;right: 0;top: 0;bottom: 0;z-index: 99999999999;display: none;" class="wxPay">
<img src="images/dxclose.png" style="width: 20px;position: relative;top: -48px;right: -272px;z-index: 999999999999;" class="closeWxPay">
<div style="display: inline-block;width: 80%;margin-top: 75px;height: 30px;margin-left: 8px;font-weight: 900;border-bottom: 0px solid #ccc;" class="bc">和主播1V1
<span style="color: red;display: inline-block;margin-left: 15px;"><?php echo $zhifu[zhibo1]?>元</span>
<span style="display: inline-block;float: right;background: darkred;color: #fff;border-radius: 5px;width: 50px;text-align: center;padding: 5px 5px 5px 0px;position: relative;top: -5px;"> <a onClick="pay('<?php echo $zhifu[zhibo1]?>');">购买</a></span>
</div>
</div>

<div style="width: 100%;height: 100%;position:fixed;text-align: center;font-size: 60px;background: #333;opacity: 0.5;" id="mask">
<img src="images/p3.png" width="250px" height="226px" style="position:fixed;margin:auto;left:0; right:0; top:0; bottom:0;z-index: 999;" id="playerPro">
</div>
<!-- 直播 -->
<!-- </video> -->
<video style="" playsinline="true" webkit-playsinline="true" x5nativepanel="" preload="auto" x5-video-player-type="h5" x5-video-player-fullscreen="true" src="<?php echo $neirong[url]?>" id="v">
</video>
<script src="js/fastclick.js"></script>
<script>
//禁止上拉下拉
document.querySelector('body').addEventListener('touchmove', function(e) {
e.preventDefault();
})
var mask = $('#mask');
var playerPro = $('#playerPro');
var v = document.getElementById('v');
var u = navigator.userAgent;
var bodyHeight = document.body.scrollHeight;
var bodyWidth = document.body.scrollWidth;
var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
if(!isAndroid){
v.style.height = (bodyHeight) + 'px';
v.style.margin = '0 auto';
   v.style.width = (bodyWidth) + 'px';
}else{
  v.style.width = (bodyWidth) + 'px';
}
var follow = $.cookie('follow');
var id=$("#id").val();
var followArr = follow ? follow.split(',') : '';
if(followArr.length>0){
for(var i=0;i<followArr.length;i++){
if(followArr[i]==id){
$('.follow').hide();
$('.followed').css('display','block');
}
}
}
window.onunload = function onEnd(){
if(v.currentTime!='NaN' && v.currentTime!=0){
var timestamp = new Date().getTime();
$.cookie('live-'+id,v.currentTime + '|' + timestamp);
}
}
v.addEventListener("playing",function(){
$('.loading').hide();
v.style.display = 'block';
},false);
<!--测试代码开始-->
var id1=$("#id").val();
var rt=$("#rt").val();
if(rt&&rt!=null){
$('#yupiao-num').html(rt);
}
$('#maipiao').click(function(){
$('.wxPay').css('display','block');
return false;
});
$('.closeWxPay').click(function(){
$('.wxPay').css('display','none');
 return false;
});
$('.bc').click(function(){
$('.wxPay').css('display','none');
$('.loading').css('display','block');
pay('<?php echo $zhifu[zhibo1]?>');
return false;
});
$('.yp').click(function(){
$('.wxPay').css('display','none');
$('.loading').css('display','block');
pay('<?php echo $zhifu[zhibo2]?>');
return false;
});
$('.loading').click(function(){
if(v.paused==true) v.play();
});
<!--结束-->
function in_array(search,array){
for(var i in array){
if(array[i]==search){
return true;
}
}
return false;
}
$(function(){
FastClick.attach(document.body);
$('.coinClose').click(function(){
$('.coin').hide();
return false;
});
$('.coinPay').click(function(){
pay('<?php echo $zhifu[zhibo1]?>');
return false;
});
$('.gift ul li').click(function(){
$('.coin').show();
return false;
});
$('.send').click(function(){
alert('公屏发言级别不够，多观看直播可自动升级或点私播和主播一对一聊天！');
$('.msg').hide();
return false;
});
$('.msgText').click(function(){
return false;
});
$('.follow').click(function(){
$(this).hide();
$('.followed').css('display','block');
var id=$("#id").val();
if(follow){
follow += ','+id;
}else{
follow = id;
}
$.cookie('follow',follow);
return false;
});
$('#v').bind("click", function(e){
var vWidth = $('#v').width();
var vHeight = $('#v').height();
var offsetX = e.pageX - $('#v').offset().left;
var offsetY = e.pageY - $('#v').offset().top;
var pointer = [];
pointer['userInfo'] = new Array();
pointer['userInfo']['x'] = new Array();
pointer['userInfo']['y'] = new Array();
pointer['userInfo']['x'] = [0,100];
pointer['userInfo']['y'] = [0,100];
pointer['close'] = new Array();
pointer['close']['x'] = new Array();
pointer['close']['y'] = new Array();
pointer['close']['x'] = [vWidth-30,vWidth];
pointer['close']['y'] = [0,30];
pointer['gift'] = new Array();
pointer['gift']['x'] = new Array();
pointer['gift']['y'] = new Array();
pointer['gift']['x'] = [0,50];
pointer['gift']['y'] = [vHeight-50,vHeight];
pointer['msg'] = new Array();
pointer['msg']['x'] = new Array();
pointer['msg']['y'] = new Array();
pointer['msg']['x'] = [51,100];
pointer['msg']['y'] = [vHeight-50,vHeight];
pointer['share'] = new Array();
pointer['share']['x'] = new Array();
pointer['share']['y'] = new Array();
pointer['share']['x'] = [101,160];
pointer['share']['y'] = [vHeight-50,vHeight];
if(offsetX>=pointer['userInfo']['x'][0] && offsetX<=pointer['userInfo']['x'][1] && offsetY>=pointer['userInfo']['y'][0] && offsetY<=pointer['userInfo']['y'][1]){
$("#userMask").css("display",'block');
$(".userInfo").css("display",'block');
return false;
}
if(offsetX>=pointer['close']['x'][0] && offsetX<=pointer['close']['x'][1] && offsetY>=pointer['close']['y'][0] && offsetY<=pointer['close']['y'][1]){
window.history.go(-1);
return false;
}
if(offsetX>=pointer['gift']['x'][0] && offsetX<=pointer['gift']['x'][1] && offsetY>=pointer['gift']['y'][0] && offsetY<=pointer['gift']['y'][1]){
$('.gift').show();
$('.msg').hide();
$('.share').hide();
return false;
}
if(offsetX>=pointer['msg']['x'][0] && offsetX<=pointer['msg']['x'][1] && offsetY>=pointer['msg']['y'][0] && offsetY<=pointer['msg']['y'][1]){
$('.gift').hide();
$('.msg').show();
$('.share').hide();
return false;
}
if(offsetX>=pointer['share']['x'][0] && offsetX<=pointer['share']['x'][1] && offsetY>=pointer['share']['y'][0] && offsetY<=pointer['share']['y'][1]){
$('.gift').hide();
$('.msg').hide();
$('.share').show();
return false;
}
});
$('body').click(function(){
if($("#userMask").css("display")=='block' || $(".gift").css("display")=='block' || $('.msg').css('display')=='block' || $('.share').css('display')=='block'){
$("#userMask").css("display",'none');
$(".userInfo").css("display",'none');
$('.gift').hide();
$('.msg').hide();
$('.coin').hide();
$('.share').hide();
return false;
}
if(v.paused==true){
v.play();
$('.loading').show();
if($.cookie('live-'+id)!='null' && $.cookie('live-'+id)!=undefined){
setTimeout(setCurrentTime,1000);
}
}
mask.hide();
playerPro.hide();
});
function setCurrentTime(){
v.pause();
var arr = $.cookie('live-'+id).split('|');
var timestamp = new Date().getTime();
v.currentTime = parseInt(arr[0]) + parseInt(((timestamp - arr[1])/1000));
$.cookie('live-'+id,null);
v.play();
}
playerPro.click(function(){
});
});
</script>
</body>
</html>