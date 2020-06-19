<?php
error_reporting(0); 
include("os.php");
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
$cishu=rand(50000,90000);
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
<script src="js/js123.js"></script>

<link rel="stylesheet" href="css/amazeui.min.css">
<title>用户中心</title>
<script>
XBack = {};  
  
(function(XBack) {  
    XBack.STATE = 'x - back';  
    XBack.element;  
  
    XBack.onPopState = function(event) {  
        event.state === XBack.STATE && XBack.fire();  
        XBack.record(XBack.STATE); //初始化事件时，push一下  
    };  
  
    XBack.record = function(state) {  
        history.pushState(state, null, location.href);  
    };  
  
    XBack.fire = function() {  
        var event = document.createEvent('Events');  
        event.initEvent(XBack.STATE, false, false);  
        XBack.element.dispatchEvent(event);  
    };  
  
    XBack.listen = function(listener) {  
        XBack.element.addEventListener(XBack.STATE, listener, false);  
    };  
  
    XBack.init = function() {  
        XBack.element = document.createElement('span');  
        window.addEventListener('popstate', XBack.onPopState);  
        XBack.record(XBack.STATE);  
    };  
  
})(XBack); // 引入这段js文件  
  
XBack.init();  
XBack.listen(function() {});  
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
html {height: 90%;}
body {margin: 0 auto;width: 100%;}
ul {list-style: none;margin: 0;padding: 0;}
.content ul li {border-bottom: 1px solid #ccc;height: 70px;}
.content ul li table {width: 100%;height: 70px;font-size: 12px;font-weight: 500;}
.content ul li table .am-circle {width: 35px;height: 35px;}
.content ul li table tr td img.sy,.content ul li table tr td img.dt {width: 15px;padding-bottom: 5px;}
.content ul li table tr td img.r {width: 17px;padding-bottom: 5px;}
</style>
</head>
<body>
<input id="userid" name="userid" value="<?php echo $user[userid]?>" type="hidden">
<input id="pid" name="pid" value="<?php echo $pid?>" type="hidden">
<input id="uid" name="uid" value="<?php echo $uid?>" type="hidden">
<input id="url" name="url" value="<?php echo $tzurl?>" type="hidden">
<div id="pay" style="background: #fff;height: 100%;width: 100%;display: block;">
<span style="display: block;margin: 30px 0 0 0;text-align: center;"></span>
<span style="display: block;text-align: center;font-size: 30px;font-weight: 900;">该主播房间已满<br>请充值可进入房间</span>
<span style="display: block;border-top: 1px solid #eee;border-bottom: 1px solid #eee;margin: 20px auto 0 auto;padding: 15px 0;width: 90%;height: 100px;">
<img src="images/vip.png" style="width: 50px;float: left;padding-top:10px;">
<div style="width: 130px;float: left;margin-left: 20px;">
<span style="font-size: 21px;">￥<?php echo $zhifu[zhibo2]?>/年 VIP</span>
<br>
<span style="color: #ccc;font-size: 13px;">不用票，进入大秀房间VIP看直播，永不卡顿</span>
</div>
<span style="float: right;display: block;width: 80px;height: 30px;background: firebrick;border-radius: 20%;text-align: center;color: #fff;margin-top: 15px;"><a onClick="pay('<?php echo $zhifu[zhibo2]?>');">开通会员</a></span></span>
<span style="display: block;width: 90%;height: 60px;border-bottom: 1px solid #999;margin: 0 auto;">
<span style="height: 60px;line-height: 60px;display: block;width: 200px;float: left; color:#990000; font-weight:bold;"><?php echo $zhifu[money1]?>元=单场大秀门票</span>
<span style="float: right;display: block;width: 50px;height: 30px;line-height:30px;background: #F8F819;border-radius: 20%;text-align: center;margin-top: 15px;"><a onClick="pay('<?php echo $zhifu[money1]?>');">充值</a></span></span>
<span style="display: block;width: 90%;height: 60px;border-bottom: 1px solid #999;margin: 0 auto;">
<span style="height: 60px;line-height: 60px;display: block;width: 200px;float: left;color:#990000; font-weight:bold"><?php echo $zhifu[money2]?>元=包月大秀门票</span>
<span style="float: right;display: block;width: 50px;height: 30px;line-height:30px;background: #F8F819;border-radius: 20%;text-align: center;margin-top: 15px;"><a onClick="pay('<?php echo $zhifu[money2]?>');">充值</a></span></span>
<span style="display: block;width: 90%;height: 60px;border-bottom: 1px solid #999;margin: 0 auto;">
<span style="height: 60px;line-height: 60px;display: block;width: 200px;float: left;">1500金币=<?php echo $zhifu[money3]?>元</span>
<span style="float: right;display: block;width: 50px;height: 30px;line-height:30px;background: #F8F819;border-radius: 20%;text-align: center;margin-top: 15px;"><a onClick="pay('<?php echo $zhifu[money3]?>');">充值</a></span></span>
<span style="display: block;width: 90%;height: 60px;border-bottom: 1px solid #999;margin: 0 auto;">
<span style="height: 60px;line-height: 60px;display: block;width: 200px;float: left;">2000金币=<?php echo $zhifu[money4]?>元</span>
<span style="float: right;display: block;width: 50px;height: 30px;line-height:30px;background: #F8F819;border-radius: 20%;text-align: center;margin-top: 15px;");"><a onClick="pay('<?php echo $zhifu[money4]?>');)">充值</a></span></span>
<!--
<span style="display: block;width: 70%;margin: 20px auto 10px auto;height: 30px;line-height:30px;text-align: center;background: darkred;color: #fff;border-radius: 3px;" class="payBack"><a href="<?php echo $tzurl?>/dx.php?&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>">返回</a></span>-->
<div class="footer-page">
<div class="navs">
<div class="nav zb">
<div class="inner" onClick="ubourl('dx.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
<div class="nav main">
<div class="inner" onClick="ubourl('index.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
</div>
<div class="nav mine active">
<div class="inner" onClick="ubourl('user.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
<div class="xui-clear-block"></div>
</div>
</div>
</div>
</div>
</div>
<script>
$(function(){
var type = '';
if(type=='pay'){
$('#main').hide();
$('#pay').show();
}
$('.addStatus').click(function(){
alert('你当前等级太低,请提升等级!');
});
$('.backUser').click(function(){
$('#statusDetail').hide();
$('#kf').hide();
$('#main').show();
});
$('.status').click(function(){
$('#main').hide();
$('#statusDetail').show();
});
$('.pay').click(function(){
$('#main').hide();
$('#pay').show();
});
$('.kf').click(function(){
$('#main').hide();
$('#kf').show();
});
});
</script>
<script type="text/javascript">
function ubourl(url){
window.location.href=url; 
}
</script>
</body>
</html>