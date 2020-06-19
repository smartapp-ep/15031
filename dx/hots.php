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
<link rel="stylesheet" href="css/amazeui.min.css">
<title>热门</title>
<link rel="stylesheet" href="css/amazeui.min.css">
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
body {margin: 0 auto;width: 100%;}
ul {list-style: none;margin: 0;padding: 0;}
.header { width: 100%; height: 48px; position: fixed; top: 0; left: 0; background: #FA5B5B; z-index: 999; }
.header ul { width: 100%; }
.header ul li { float: left; width: 16.666%; height: 48px; display: block; }
.header ul li a { text-align: center; display: block; height: 48px; line-height: 48px; color: #fff; }
.header ul li a.active { color: #EEEE00; }
.header .header-hot { position: fixed; z-index: 999; right: 6%; top: 8px; width: 15px; }
.header .header-ss { position: fixed; z-index: 999; left: 6%; top: 9px; width: 30px; }
.header .header-xx { position: fixed; z-index: 999; right: 6%; top: 9px; width: 30px; }
.footer {width: 100%;height: 40px;position: fixed;bottom: 0;left: 0;border-top:1px solid #dc143c;display:box;display:-webkit-box;display:-moz-box;}
.footer .footer-left {box-flex:1;-webkit-box-flex:1;text-align: center;}
.footer .footer-center {box-flex:1;-webkit-box-flex:1;text-align: center;}
.footer .footer-right {box-flex:1;-webkit-box-flex:1;text-align: center;}
.footer .footer-left img {width: 40px;}
.footer .footer-center img {width: 60px;position: fixed;left: 0;right: 0;bottom: 0;margin: auto;}
.footer .footer-right img {width: 40px;}
.content {width: 100%;margin-top: 45px;}
</style>
</head>
<body>
<div class="header">
<ul>
<li><img src="images/sousuo.png"class="header-ss"></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('gz.php<?php echo $url?>');"><b>关注</b></b></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('hots.php<?php echo $url?>');" class="active"><b>热门</b></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('new.php<?php echo $url?>');"><b>最新</b></a></li>
<li><a href="javascript:void(0);" onClick="ubourl('dx.php<?php echo $url?>');"><b>秀场</b></a></li>
<li><img src="images/xiaoxi.png"class="header-xx"></a></li>
</ul>
<!--<img src="images/ic_big_authenticate.png" class="header-hot">-->
</div>
<div class="content">
<ul>
<?php
$query = mysql_query("SELECT * FROM ubozb  order by rand()  limit 20");
while($a = mysql_fetch_array($query)) {
?> 
<li style="position: relative;"  onclick="openplay('<?php echo $a[id]?>');">
<table style="margin:10px 0 5px 3%;width: 95%;">
<tbody>
<tr>
<td rowspan="2" style="width: 60px;"><img class="am-circle lazy" data-original="<?php echo $a[pic]?>" src="<?php echo $a[pic]?>" style="display: inline;" height="50" width="50"></td>
<td style=""><?php echo $a[name]?></td>
<td rowspan="2" style="text-align: right;padding-right: 10%;"><span style="color: red;font-size: 16px;"><?php echo $a[hit]?></span><span style="color: #999;font-size: 13px;">在看</span></td>
</tr>
<tr>
<td style="font-size: 12px;color: #999;"></td>
</tr>
</tbody>
</table>
<img class="lazy" data-original="<?php echo $a[pic]?>" style="width: 100%; display: inline;" src="<?php echo $a[pic]?>">
<img src="images/live_live.png" style="position: absolute;width: 70px;right: 10px;top: 70px;">
</li>
<?php }?>		
</ul>
</div>
<div class="footer-page">
<div class="navs">
<div class="nav zb">
<div class="inner" onclick="ubourl('dx.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
<div class="nav main active">
<div class="inner" onclick="ubourl('index1.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
</div>
<div class="nav mine">
<div class="inner" onclick="ubourl('user.php<?php echo $url?>')" >
<div class="pic"></div></div></div>
<div class="xui-clear-block"></div>
</div>
</div>
</div>
</div>
<script src="js/jquery.lazyload.js"></script>
<script>
$(function() {
$("img.lazy").lazyload({effect : "fadeIn"});
});
function openplay(id){
window.location.href='./play.php?playid='+id+'<?php echo $link?>'; 
}
function ubourl(url){
window.location.href=url; 
}	
</script>
</body>
</html>