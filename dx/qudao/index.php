<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(ubo($_POST[btnPost])){
if(ubo($_POST[t]=="1")){
$userid=ubo($_POST[userid]);
$newpass=ubo($_POST[password]);
$type="WHERE userid='$userid'";
$row=queryall(ubouser,$type); 
if($userid==null){
echo msglayer("渠道不能为空！",6);
}elseif($newpass==null){
echo msglayer("用户密码不能为空！",6);
}elseif($row[pass]==$newpass and $row[userid]==$userid){
$_SESSION['userid']=$userid;
echo msglayerurl("登录成功",4,"data.php");
}else{
echo msglayer("SORRY！渠道或者密码错误,请重新输入",6);
}
}elseif(ubo($_POST[t]=="2")){
$userid=ubo($_POST[userid]);
$newpass=ubo($_POST[password]);
$type="WHERE userid='$userid'";
$row=queryall(ubouid,$type); 
if($userid==null){
echo msglayer("子渠道不能为空！",6);
}elseif($newpass==null){
echo msglayer("用户密码不能为空！",6);
}elseif($row[pass]==$newpass and $row[userid]==$userid){
$_SESSION['uid']=$userid;
echo msglayerurl("登录成功",4,"uiddata.php");
}else{
echo msglayer("SORRY！子渠道或者密码错误,请重新输入",6);
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>渠道后台登录</title>
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link type="text/css" rel="stylesheet" href="css/iapppay.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<SCRIPT language=javascript src="../app/layer/jquery-1.9.1.min.js"></SCRIPT>
<SCRIPT language=javascript src="../app/layer/layer.js"></SCRIPT>
</head>
<body class="login">
<form  method="post" action="" target="msgubotj">
<div class="login-head">
</div>
<div class="login-body">
<div style="width: 850px;height:450px; margin: auto;background-image: url(css/background_login.png)">
<div class="login-main">
<div style="text-align: center;">
<div style="margin-left: 31px;">
<span style="font-size: 20px; color: #595757;font-family:微软雅黑,regular;">渠道后台</span>
</div>
</div>
<div style="height: auto;">
<div class="login-item" >
类型：<input name="t"  type="radio" value="1"  checked="checked"/>
<label>渠道</label>
<input name="t" type="radio" value="2" />
<label>子渠道</label>
</div>

<div class="login-item" >
推广ID：<input type="text"  name="userid"  class="input" placeholder="推广ID"/>
</div>

<div class="login-item">
密码：<input  name="password"  class="input" type="password" placeholder="密 码" />
</div>
</div>
<div style="margin-bottom: 10px;text-align: center;padding-top: 35px;">
<input  id="btnPost" name="btnPost" type="submit"  class="login-link" value="登 录"/>
</div>
</div>
</div>
</div>
</form>
<div style="display:none"><iframe id="msgubotj" name="msgubotj" width=0 height=0></iframe></div>
</body>
</html>