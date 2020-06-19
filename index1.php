<?php
error_reporting(0); 
$installfile='config/ubo.php.loc';
if(file_exists($installfile)){
include("os.php");
$pid=$_GET[pid];
$uid=$_GET[uid];
if($pid){
$url="?pid=".$pid."&uid=".$uid;
}else{
$url="";
}
$ip=$_SERVER["REMOTE_ADDR"];
$type = "order by id DESC limit 0,1";
$user=queryall(uboip,$type);
$userid=$user[userid];
if ($userid==null){
$userid=rand(1000000,9000000);
}else{
$userid=$user[userid]+1;
}
$tx=rand(1,40);
$sql = "SELECT ip FROM uboip WHERE  ip='$ip'";
$query = mysql_query($sql);
$rows=mysql_fetch_array($query);
if (!$rows) {
mysql_query("insert into uboip set userid='$userid',ms='游客',ip='$ip',tx='$tx',jb='0'"); 
}
//读取域名列表
$type="order by rand() limit 1";
$urlpeizhi=queryall(tzurl,$type);
//随机跳转域名
if($tz=="0"){
$tzurl="http://".$urlpeizhi[tzurl]."/";
}else{
$tzurl="";
}
}else{ 
echo "<script>location.href='install'</script>";
exit;
}
?>
<html>
<head>
<span style="display:none"><script type="text/javascript" src="jquery.js"></script></script></span>
<meta http-equiv="Content-Language" content="zh-CN">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=gb2312">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<title></title>
<style>
 html, body {margin: 0px;padding: 0px; }body {background-color: #fb7299;font-family: 'microsoft yahei';animation: bg-show 1.5s ease-in backwards;-webkit-animation: bg-show 1.5s ease-in backwards; }.ani {position: fixed;left: 0px;right: 0px;top: 0px;bottom: 0px;margin: auto;width: 200px;height: 88px;text-align: center;color: white;font-size: 24px;animation: ani-show 1.5s ease backwards;-webkit-animation: ani-show 1.5s ease backwards; }.go {background-color: #E74C3C;border: 0px;font-family: 'microsoft yahei';height: 40px;width: 200px;color: white;border-radius: 5px;animation: show 0.6s cubic-bezier(.02, .58, .02, .98) backwards 3s;-webkit-animation: show 0.6s cubic-bezier(.02, .58, .02, .98) backwards 3s;font-size: 18px; }@keyframes show {from {opacity: 0;transform: translateY(60px);}to {opacity: 1;transform: translateY(0px);} }@-webkit-keyframes show {from {opacity: 0;-webkit-transform: translateY(60px);}to {opacity: 1;-webkit-transform: translateY(0px);} }@keyframes ani-show {from {opacity: 0;}to {opacity: 1;} }@-webkit-keyframes ani-show {from {opacity: 0;}to {opacity: 1;} }@keyframes bg-show {from {background-color: #444;}to {background-color: #fb7299;} }@-webkit-keyframes bg-show{from {background-color: #444;}to {background-color: #fb7299;} }
</style>
</head>
<script type="text/javascript">
setTimeout(function(){
window.location.href="<?php echo $tzurl?>dx.php<?php echo $url?>";
},2000);
</script>
<body>
<div class="ani" id="dialog"><img src="data:image/svg+xml;base64,PCEtLSBCeSBTYW0gSGVyYmVydCAoQHNoZXJiKSwgZm9yIGV2ZXJ5b25lLiBNb3JlIEAgaHR0cDovL2dvby5nbC83QUp6YkwgLS0+Cjxzdmcgd2lkdGg9IjU1IiBoZWlnaHQ9IjgwIiB2aWV3Qm94PSIwIDAgNTUgODAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZmlsbD0iI0ZGRiI+CiAgICA8ZyB0cmFuc2Zvcm09Im1hdHJpeCgxIDAgMCAtMSAwIDgwKSI+CiAgICAgICAgPHJlY3Qgd2lkdGg9IjEwIiBoZWlnaHQ9IjIwIiByeD0iMyI+CiAgICAgICAgICAgIDxhbmltYXRlIGF0dHJpYnV0ZU5hbWU9ImhlaWdodCIKICAgICAgICAgICAgICAgICBiZWdpbj0iMHMiIGR1cj0iNC4zcyIKICAgICAgICAgICAgICAgICB2YWx1ZXM9IjIwOzQ1OzU3OzgwOzY0OzMyOzY2OzQ1OzY0OzIzOzY2OzEzOzY0OzU2OzM0OzM0OzI7MjM7NzY7Nzk7MjAiIGNhbGNNb2RlPSJsaW5lYXIiCiAgICAgICAgICAgICAgICAgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiIC8+CiAgICAgICAgPC9yZWN0PgogICAgICAgIDxyZWN0IHg9IjE1IiB3aWR0aD0iMTAiIGhlaWdodD0iODAiIHJ4PSIzIj4KICAgICAgICAgICAgPGFuaW1hdGUgYXR0cmlidXRlTmFtZT0iaGVpZ2h0IgogICAgICAgICAgICAgICAgIGJlZ2luPSIwcyIgZHVyPSIycyIKICAgICAgICAgICAgICAgICB2YWx1ZXM9IjgwOzU1OzMzOzU7NzU7MjM7NzM7MzM7MTI7MTQ7NjA7ODAiIGNhbGNNb2RlPSJsaW5lYXIiCiAgICAgICAgICAgICAgICAgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiIC8+CiAgICAgICAgPC9yZWN0PgogICAgICAgIDxyZWN0IHg9IjMwIiB3aWR0aD0iMTAiIGhlaWdodD0iNTAiIHJ4PSIzIj4KICAgICAgICAgICAgPGFuaW1hdGUgYXR0cmlidXRlTmFtZT0iaGVpZ2h0IgogICAgICAgICAgICAgICAgIGJlZ2luPSIwcyIgZHVyPSIxLjRzIgogICAgICAgICAgICAgICAgIHZhbHVlcz0iNTA7MzQ7Nzg7MjM7NTY7MjM7MzQ7NzY7ODA7NTQ7MjE7NTAiIGNhbGNNb2RlPSJsaW5lYXIiCiAgICAgICAgICAgICAgICAgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiIC8+CiAgICAgICAgPC9yZWN0PgogICAgICAgIDxyZWN0IHg9IjQ1IiB3aWR0aD0iMTAiIGhlaWdodD0iMzAiIHJ4PSIzIj4KICAgICAgICAgICAgPGFuaW1hdGUgYXR0cmlidXRlTmFtZT0iaGVpZ2h0IgogICAgICAgICAgICAgICAgIGJlZ2luPSIwcyIgZHVyPSIycyIKICAgICAgICAgICAgICAgICB2YWx1ZXM9IjMwOzQ1OzEzOzgwOzU2OzcyOzQ1Ozc2OzM0OzIzOzY3OzMwIiBjYWxjTW9kZT0ibGluZWFyIgogICAgICAgICAgICAgICAgIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiAvPgogICAgICAgIDwvcmVjdD4KICAgIDwvZz4KPC9zdmc+"><br>
<br>快捷登陆中<br>
<br>
</div>
</body>
<div style="display:none">
<!--统计代码-->
</div>
</html> 