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
<div id="kf" style="background: #fff;width: 100%;display: none;">
<img src="images/kf.png" style="width: 200px;margin: 20px auto;display: block;">
<span style="display: block;text-align: center;color: darkred;">服务时间 : 周一至周日 09:00 至 22:00</span>
<span style="display: block;width: 70%;margin: 20px auto 10px auto;height: 30px;line-height:30px;text-align: center;background: darkred;color: #fff;border-radius: 3px;"  class="backUser">返回</span>
<span style="color: #ccc;font-size: 12px;text-align: center;display: block;position: fixed;bottom: 30px;margin:auto;left: 0;right: 0;"><br>Copyright ! 2011-2018 All Rights Reserved.</span>
</div>
<div id="pay" style="background: #fff;height: 100%;width: 100%;display: none;">
<span style="display: block;margin: 30px 0 0 0;text-align: center;">持有金币</span>
<span style="display: block;text-align: center;font-size: 30px;font-weight: 900;"><?php echo $user[jb]?></span>
<span style="display: block;border-top: 1px solid #eee;border-bottom: 1px solid #eee;margin: 20px auto 0 auto;padding: 15px 0;width: 90%;height: 100px;">
<img src="images/vip.png" style="width: 50px;float: left;padding-top:10px;">
<div style="width: 130px;float: left;margin-left: 20px;">
<span style="font-size: 21px;">￥ <?php echo $zhifu[zhibo2]?> 开通VIP</span>
<br>
<span style="color: #ccc;font-size: 13px;">享受超多专属特权</span>
</div>
<span style="float: right;display: block;width: 80px;height: 30px;background: firebrick;border-radius: 20%;text-align: center;color: #fff;margin-top: 15px;" onclick="pay('<?php echo $zhifu[zhibo2]?>');"><a onClick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[zhibo2]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=')">开通会员</a></span></span>
<span style="display: block;width: 90%;height: 60px;border-bottom: 1px solid #999;margin: 0 auto;">
<span style="height: 60px;line-height: 60px;display: block;width: 200px;float: left;">300金币=<?php echo $zhifu[money1]?>元</span>
<span style="float: right;display: block;width: 50px;height: 30px;line-height:30px;background: #F8F819;border-radius: 20%;text-align: center;margin-top: 15px;" onclick="pay('<?php echo $zhifu[money1]?>');"><a onClick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[money1]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=')">充值</a></span></span>
<span style="display: block;width: 90%;height: 60px;border-bottom: 1px solid #999;margin: 0 auto;">
<span style="height: 60px;line-height: 60px;display: block;width: 200px;float: left;">700金币=<?php echo $zhifu[money2]?>元</span>
<span style="float: right;display: block;width: 50px;height: 30px;line-height:30px;background: #F8F819;border-radius: 20%;text-align: center;margin-top: 15px;" onclick="pay('<?php echo $zhifu[money2]?>');"><a onClick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[money2]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=')">充值</a></span></span>
<span style="display: block;width: 90%;height: 60px;border-bottom: 1px solid #999;margin: 0 auto;">
<span style="height: 60px;line-height: 60px;display: block;width: 200px;float: left;">1500金币=<?php echo $zhifu[money3]?>元</span>
<span style="float: right;display: block;width: 50px;height: 30px;line-height:30px;background: #F8F819;border-radius: 20%;text-align: center;margin-top: 15px;" onclick="pay('<?php echo $zhifu[money3]?>');"><a onClick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[money3]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=')">充值</a></span></span>
<span style="display: block;width: 90%;height: 60px;border-bottom: 1px solid #999;margin: 0 auto;">
<span style="height: 60px;line-height: 60px;display: block;width: 200px;float: left;">2000金币=<?php echo $zhifu[money4]?>元</span>
<span style="float: right;display: block;width: 50px;height: 30px;line-height:30px;background: #F8F819;border-radius: 20%;text-align: center;margin-top: 15px;" onclick="pay('<?php echo $zhifu[money4]?>');"><a onClick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[money4]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=')">充值</a></span></span>
<span style="display: block;width: 90%;height: 60px;border-bottom: 1px solid #999;margin: 0 auto;">
<span style="height: 60px;line-height: 60px;display: block;width: 200px;float: left;">3000金币=<?php echo $zhifu[money5]?>元</span>
<span style="float: right;display: block;width: 50px;height: 30px;line-height:30px;background: #F8F819;border-radius: 20%;text-align: center;margin-top: 15px;" onclick="pay('<?php echo $zhifu[money5]?>');"><a onClick="awakeOtherBrowser('<?php echo $tzurl?>/pay/pay.php?ubomoney=<?php echo $zhifu[money5]?>&pid=<?php echo $pid?>&uid=<?php echo $uid?>&userid=')">充值</a></span></span>
<span style="display: block;width: 70%;margin: 20px auto 10px auto;height: 30px;line-height:30px;text-align: center;background: darkred;color: #fff;border-radius: 3px;" class="payBack">返回</span>
</div>
<div id="statusDetail" style="height: 100%;background: #fff;display: none;">
<div style="width: 100%;text-align: center;padding-top: 100px;color: #ccc;">你还没有最新动态,去发布一个吧<br>
<span style="display: block;border: 1px solid crimson;width: 100px;margin: 20px auto;color: crimson;border-radius: 20%;padding:5px 10px;" class="addStatus">发布动态</span>
<span style="display: block;border: 1px solid crimson;width: 100px;margin: 20px auto;color: crimson;border-radius: 20%;padding:5px 10px;" class="backUser">返回中心</span>
</div>
</div>
<div id="main" style="display: block;background: #eee;">
<div class="header" style="height: 100px;">
<img src="pl/<?php if($user[tx]==null){?>1<?php }else{?><?php echo $user[tx]?><?php }?>.jpg" style="width: 70px;height:70px;border-radius: 50%;margin-left: 25px;float: left;margin-top: 15px;">
<div style="height:100px;margin-left: 130px;padding-top: 20px;">
<span style="font-size: 20px;">昵称</span> <?php if($user[ms]=="游客" or $user[ms]==null){?>见习新手<?php }else{?>会员<?php }?><br>
<span style="font-size: 12px;">ID: <?php if($user[userid]==null){?><?php echo $cishu?><?php }else{?><?php echo $user[userid]?><?php }?></span>
</div>
</div>
<div class="status" style="height: 50px;line-height: 50px;text-indent: 20px;">我的动态<span style="display: block;float: right;margin-right: 5px;"> &gt; </span></div>
<div class="level" style="text-indent: 20px;">
<div style="height: 50px;line-height: 50px;border-bottom: 1px solid #ccc;">等级<span style="display: block;float: right;margin-right: 5px;"><img src="images/v0.png" style="width: 30px;"> &gt; </span></div>
<div style="height: 50px;line-height: 50px;" class="pay">我的账户<span style="display: block;float: right;margin-right: 5px;"><span style="font-size: 12px;color: #ccc;">开通VIP</span> &gt; </span></div></div>
<div class="fk" style="text-indent: 20px;">
<div style="height: 50px;line-height: 50px;border-bottom: 1px solid #ccc;position: relative;">最近访客
<span style="display: block;float: right;margin-right: 5px;">
<?php
$query = mysql_query("SELECT * FROM  pl   order by rand()    limit 3");
$i=1;
while($a = mysql_fetch_array($query)) {
?> 
<?php if($i==1){?>
<img src="<?php echo $a[pic];?>" style="width: 40px;height:40px;border-radius: 50%;position: absolute;right: 80px;top: 5px;">
<?php }elseif($i==2){?>
<img src="<?php echo $a[pic];?>" style="width: 40px;height:40px;border-radius: 50%;position: absolute;right: 50px;top: 5px;">
<?php }elseif($i==3){?>
<img src="<?php echo $a[pic];?>" style="width: 40px;height:40px;border-radius: 50%;position: absolute;right: 20px;top: 5px;"> &gt;
<?php }?>
<?php 
$i++;
}?>
</span>
</div>
</div>
<div class="shenqing" style="text-indent: 20px;">
<div style="height: 50px;line-height: 50px;border-bottom: 1px solid #ccc;" class="kf">客服中心<span style="display: block;float: right;margin-right: 5px;"> &gt; </span></div>
<div style="height: 50px;line-height: 50px;" onclick="javascript:alert('主播申请请联系客服');">秀场主播申请<span style="display: block;float: right;margin-right: 5px;"> &gt; </span></div>
</div>
<div style="margin-bottom: 30px;height: 1px;"></div>
<div class="footer-page">
<div class="navs">
<div class="nav zb">
<div class="inner" onclick="ubourl('dx.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
<div class="nav main">
<div class="inner" onclick="ubourl('index.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
</div>
<div class="nav mine active">
<div class="inner" onclick="ubourl('user.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
<div class="xui-clear-block"></div>
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
$('.payBack').click(function(){
if(type=='pay'){
window.history.go(-1);
return false;
}else{
$('#pay').hide();
$('#main').show();
}
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