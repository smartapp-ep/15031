<?php
error_reporting(0); 
include("os.php");
$playid=$_GET["playid"];
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
$neirong=queryall(daxiu,$type);
$yupiao=30-$neirong[hit];
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
<script type="text/javascript" src="js/js123.js"></script>
<title>大秀</title>
<style>
body {padding: 0;margin: 0;background: #fff;}
</style>
</head>
<body>
<input id="userid" name="userid" value="<?php echo $user[userid]?>" type="hidden">
<input id="pid" name="pid" value="<?php echo $pid?>" type="hidden">
<input id="uid" name="uid" value="<?php echo $uid?>" type="hidden">
<input id="rt" name="rt" value="<?php echo $yupiao?>" type="hidden">
<input id="id" name="id" value="<?php echo $neirong[id]?>" type="hidden">
<input id="url" name="url" value="<?php echo $tzurl?>" type="hidden">

<!-- 加载 -->
<div style="width: 100%;height: 100%;position:fixed;background: #333;opacity: 0.8;z-index: 9999999;display: none;" class="loading">
<div style="width: 100%;height: 300px;line-height: 300px;text-align: center;position: absolute;margin: auto;top: 0;bottom: 0;color: darkred;z-index: 99999999;">
<img src="images/loding.gif" style="margin: 0 auto;width: 45px;vertical-align: middle;">正在查询支付结果,请稍等..</div>
</div>
<div style="background: url(images/gp.png) no-repeat;background-size: contain;width: 300px;height:200px;position: absolute;margin:auto;left: 0;right: 0;top: 0;bottom: 0;z-index: 99999999999;display: none;" class="wxPay">
<img src="images/dxclose.png" style="width: 20px;position: relative;top: -38px;right: -272px;z-index: 999999999999;" class="closeWxPay">
<div style="display: inline-block;width: 80%;margin-top: 65px;height: 30px;margin-left: 8px;font-weight: 900;border-bottom: 1px solid #ccc;" class="bc">本场
<span style="color: red;display: inline-block;margin-left: 15px;"><?php echo $zhifu[daxiu1]?>元</span>
<span style="display: inline-block;float: right;background: darkred;color: #fff;border-radius: 5px;width: 50px;text-align: center;padding: 5px 5px 5px 5px;position: relative;top: -5px;"><a onClick="pay('<?php echo $zhifu[daxiu1]?>');">购买</a></span>
</div>
<div style="display: inline-block;width: 80%;margin-top: 10px;margin-left: 30px;height: 35px;font-weight: 900;" class="yp">月票
<span style="color: red;display: inline-block;margin-left: 15px;"><?php echo $zhifu[daxiu2]?>元</span>
<span style="display: inline-block;float: right;background: darkred;color: #fff;border-radius: 5px;width: 50px;text-align: center;padding: 5px 5px 5px 5px;position: relative;top: -5px;"> <a onClick="pay('<?php echo $zhifu[daxiu2]?>');">购买</a></span>
</div>
<span style="color: cadetblue;display: block;width: 70%;margin-left: 30px;height: 30px;font-size: 13px;">(30天不限场次)</span>
</div>
<!--测试开始-->
<div style="background: url(images/gp.png) no-repeat;background-size: contain;width: 300px;height:200px;position: absolute;margin:auto;left: 0;right: 0;top: 0;bottom: 0;z-index: 99999999999;display: none;" class="wxPay2">
<img src="images/dxclose.png" style="width: 20px;position: relative;top: -38px;right: -272px;z-index: 999999999999;" class="closeWxPay">
<div style="display: inline-block;width: 80%;margin-top: 65px;height: 30px;margin-left: 8px;font-weight: 900;border-bottom: 1px solid #ccc;" class="bc">本场
<span style="color: red;display: inline-block;margin-left: 15px;"><?php echo $zhifu[daxiu1]?>元</span>
<span style="display: inline-block;float: right;background: darkred;color: #fff;border-radius: 5px;width: 50px;text-align: center;padding: 5px 5px 5px 5px;position: relative;top: -5px;"> <a onClick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[daxiu1]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>')">购买</a></span>
</div>
<div style="display: inline-block;width: 80%;margin-top: 10px;margin-left: 30px;height: 35px;font-weight: 900;" class="yp">月票
<span style="color: red;display: inline-block;margin-left: 15px;"><?php echo $zhifu[daxiu2]?>元</span>
<span style="display: inline-block;float: right;background: darkred;color: #fff;border-radius: 5px;width: 50px;text-align: center;padding: 5px 5px 5px 5px;position: relative;top: -5px;"> <a onClick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[daxiu2]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>')">购买</a></span>
</div>
<span style="color: cadetblue;display: block;width: 70%;margin-left: 30px;height: 30px;font-size: 13px;">(30天不限场次)</span>
</div>
<!--结束-->
<div style="width: 250px;height:250px;padding: 0;background: url('images/bg_paysuccess_bill.png') no-repeat;background-size:contain;position: fixed;margin: auto;left: 0;right: 0;top: 0;bottom: 0;font-size: 13px;font-weight: 500;display: none;z-index: 999999999999" id="ticketContent">
<img src="images/bg_info_export.png" style="width: 280px;position: relative;margin: auto;left: -15px;right: 0;top: -7px;bottom: 0;">
<img src="images/gou2x.png" style="width: 30px;display: block;margin: 10px auto;">
<span style="color: #00ff00;display: block;text-align: center;">出票成功</span>
<span style="display: block;text-align: left;margin: 5px 0 5px 30%;" id="ticketId">票号: XC65194657</span>
<span style="display: block;text-align: left;margin: 5px 0 5px 30%;" id="ticketType">单程: 18元</span>
<span style="display: block;text-align: left;margin: 0 0 0 30%;" id="ticketName">乘客: 987迷失</span>
</div>
<img src="images/yp.png" style="position:fixed;left:10px; right:0; top:10px;z-index: 900;display: block;width: 150px;" id="yupiao-ico">
<div style="position:fixed;left:80px; right:0; top:28px;z-index: 900;display: block;font-size: 1em;color: #fff;" id="yupiao-text">
余票 <span style="color: darkorange" id="yupiao-num">3</span>
</div>
<img src="images/mp.png" style="position: fixed; margin: auto; left: 0px; right: 0px; bottom: 100px; z-index: 900; display: block; width: 20%;" id="maipiao">
<div style="width: 100%;height: 100%;position:fixed;text-align: center;font-size: 60px;background: #333;opacity: 0.8;" id="mask">
<img src="images/p2.png" width="250px" height="226px" style="position:fixed;margin:auto;left:0; right:0; top:0; bottom:0;z-index: 999;" id="playerPro">
</div>
<!--<video style="object-fit: cover; width: 100%; height: 767px;" playsinline="true" webkit-playsinline="true" x5nativepanel="" preload="auto" x5-video-player-type="h5" x5-video-player-fullscreen="true" src="<?php echo $neirong[url]?>" id="v">
</video>-->
<video style="object-fit: cover; width: 100%; height: 100%;" playsinline="true" webkit-playsinline="true" x5nativepanel="" preload="auto" x5-video-player-type="h5" x5-video-player-fullscreen="true" src="<?php echo $neirong[url]?>" id="v"  autoplay>
</video>
<script src="js/fastclick.js"></script>
<script src="js/jquery.cookie.js"></script>
<script>
//禁止上拉下拉
document.querySelector('body').addEventListener('touchmove', function(e) {
e.preventDefault();
})
var mask = $('#mask');
var playerPro = $('#playerPro');
var v = document.getElementById('v');
var bodyHeight = document.body.scrollHeight;
var bodyWidth = document.body.scrollWidth;
v.style.height = Math.max(bodyHeight,bodyWidth) + 'px';
var u = navigator.userAgent;
var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
if(isAndroid){
document.getElementById("maipiao").style.bottom = '100px';
}
var vType = '4';
var id=$("#id").val();
function in_array(search,array){
for(var i in array){
if(array[i]==search){
return true;
}
}
return false;
}
$(function(){
//初始化
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
//pay('<?php echo $zhifu[daxiu1]?>');
setTimeout("ubourl('<?php echo $tzurl?>/pay3.php?&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>');",15000);

return false;
});
$('.yp').click(function(){
$('.wxPay').css('display','none');
$('.loading').css('display','block');
//pay('<?php echo $zhifu[daxiu2]?>');
setTimeout("ubourl('<?php echo $tzurl?>/pay3.php?&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>');",15000);
//ubourl('<?php echo $tzurl?>/pay3.php?&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>');
return false;
});
$('.loading').click(function(){
if(v.paused==true) v.play();
});
FastClick.attach(document.body);
mask.click(function(){
setInterval(setAlert,1000);
if(v.paused==true) v.play();
mask.hide();
playerPro.hide();
$('#maipiao').show();
$('#yupiao-ico').show();
$('#yupiao-text').show();
});
$('#v').click(function(){
setInterval(setAlert,1000);
if(v.paused==true) v.play();
mask.hide();
playerPro.hide();
$('#maipiao').show();
$('#yupiao-ico').show();
$('#yupiao-text').show();
});
//弹幕时间
var ticketArr = {"5":{"type":0,"name":"\u65b0\u53f8\u673a","number":21},"10":{"type":1,"name":"\u65b0\u53f8\u673a","number":22},"20":{"type":0,"name":"\u65b0\u53f8\u673a","number":23},"23":{"type":1,"name":"\u65b0\u53f8\u673a","number":24},"29":{"type":1,"name":"\u8001\u8239\u957f1987","number":25},"35":{"type":0,"name":"\u65b0\u53f8\u673a","number":26},"36":{"type":1,"name":"\u65b0\u53f8\u673a","number":27},"48":{"type":1,"name":"\u65b0\u53f8\u673a","number":28},"52":{"type":1,"name":"\u65b0\u53f8\u673a","number":29},"60":{"type":1,"name":"\u65b0\u53f8\u673a","number":30},"62":{"type":1,"name":"\u65b0\u53f8\u673a","number":31},"70":{"type":1,"name":"\u65b0\u53f8\u673a","number":32},"75":{"type":1,"name":"\u65b0\u53f8\u673a","number":33},"80":{"type":1,"name":"\u65b0\u53f8\u673a","number":34},"85":{"type":1,"name":"\u65b0\u53f8\u673a","number":35},"90":{"type":1,"name":"\u65b0\u53f8\u673a","number":36},"95":{"type":1,"name":"\u65b0\u53f8\u673a","number":37},"102":{"type":1,"name":"\u65b0\u53f8\u673a","number":38},"110":{"type":1,"name":"\u65b0\u53f8\u673a","number":39},"120":{"type":1,"name":"\u65b0\u53f8\u673a","number":40},"126":{"type":1,"name":"\u65b0\u53f8\u673a","number":41},"134":{"type":1,"name":"\u65b0\u53f8\u673a","number":42},"142":{"type":1,"name":"\u65b0\u53f8\u673a","number":43}};
var ticketTime = [5,10,20,23,29,35,36,48,52,60,62,70,75,80,85,90,95,102,110,120,126,134,142];
function setAlert(){
if(in_array(parseInt(v.currentTime),ticketTime)){
var one = ticketArr[parseInt(v.currentTime)];
var num = Math.floor(Math.random()*100000000);
$('#ticketId').html('票号: XC'+num);
if(one['type']==0){
$('#ticketType').html('单程: <?php echo $zhifu[daxiu1]?>元');
}else{
$('#ticketType').html('包月: <?php echo $zhifu[daxiu2]?>元');
}
var rt1=parseInt($("#yupiao-num").html());
var rt2=rt1-1;
$('#yupiao-num').html(rt2);
if(rt2==0){
$('#yupiao-num').html("0");
$.cookie('remainTicket-'+id1,0,{ expires: 30, path: '/' });
//v.pause();
//confirm('票已卖完，即刻补票上车');
//setTimeout(setCurrentTime,1000);
//$('.wxPay').css('display','block');
//setTimeout('$("#ticketContent").fadeToggle(1000)',3000);
ubourl('<?php echo $tzurl?>/pay2.php?&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>');
//return false;
}
$('#ticketName').html('乘客: '+one['name']);
if(vType==3){
$.cookie('remainTicket-'+id1,0,{ expires: 30, path: '/' });
}else{
$.cookie('remainTicket-'+id1,rt1-1,{ expires: 30, path: '/' });
}
$("#ticketContent").fadeToggle(1000);
 setTimeout('$("#ticketContent").fadeToggle(1000)',3000);
}
}
 v.addEventListener("playing",function(){
if($.cookie("bp"+id)!='null' && $.cookie("bp"+id)!=undefined){
setTimeout(setCurrentTime,1000); //
}
  },false);
function setCurrentTime(){
 v.pause();
 var arr = $.cookie("bp"+id).split('|');
var timestamp = new Date().getTime();
var curTimeStamp = parseInt(arr[0]) + parseInt(((timestamp - arr[1])/1000));
if(v.duration!=0 && curTimeStamp>=v.duration){
$.cookie('remainTicket-'+$("#id").val(),0,{ expires: 30, path: '/' });
//confirm('票已卖完，即刻补票上车');
//$('.wxPay').css('display','block');
//ubourl('dx.php<?php echo $url?>');
ubourl('<?php echo $tzurl?>/pay2.php?&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=<?php echo $user[userid]?>');
}else{
v.currentTime = curTimeStamp;
$.cookie("bp"+id,null,{ expires: 30, path: '/' });
v.play();
$('#maipiao').show();
$('#yupiao-ico').show();
 $('#yupiao-text').show();
}
}
playerPro.click(function(){
});
window.onunload = function onEnd(){
if(v.currentTime!='NaN' && v.currentTime!=0){
var timestamp = new Date().getTime();
$.cookie("bp"+id,v.currentTime + '|' + timestamp,{ expires: 30, path: '/' });
}
}
});
function ubourl(url){
window.location.href=url; 
}	
</script>
</body>
</html>