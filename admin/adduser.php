<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}

if(ubo($_POST[add])){
$user=ubo($_POST[user]);
$pass=ubo($_POST[pass]);
$type="WHERE user='$user'";
$row=queryall(ubouser,$type); 
$type = "order by id DESC limit 0,1";
$u=queryall(ubouser,$type);
$userid=$u[userid];
if ($userid==null){
$userid="10000";
}else{
$userid=$u[userid]+1;
}
if($user==null){
echo msglayer("帐号不能为空！",8);
}elseif($pass==null){
echo msglayer("密码不能为空！",8);
}elseif($row){
echo msglayer("商户已存在",8);
}else{
$qq=ubo($_POST[qq]);
$tel=ubo($_POST[tel]);
$alipayname=ubo($_POST[alipayname]);
$alipay=ubo($_POST[alipay]);
$fencheng=ubo($_POST[fencheng]);
$kl=ubo($_POST[kl]);
$type="(`id`, `user`, `pass`, `qq`, `tel`,`alipayname`, `alipay`,`userid`,`fencheng`,`kl`,`kl2`) VALUES (null,'$user','$pass','$qq','$tel','$alipayname','$alipay','$userid','$fencheng','$kl','$kl')"; 
dbinsert(ubouser,$type);
echo msglayerurl("添加成功",8,"user.php");
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>添加渠道</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="css/layui.css" media="all">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--CSS引用-->
<link rel="stylesheet" href="css/peizhi.css">
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<SCRIPT language=javascript src="../app/layer/jquery-1.9.1.min.js"></SCRIPT>
<SCRIPT language=javascript src="../app/layer/layer.js"></SCRIPT>
</head>
<body>
<div class="layui-layout layui-layout-admin">
<?php include_once('header.php'); ?> 
<?php include_once('left.php'); ?> 
<!--主体-->

<div class="layui-body">
<!--tab标签-->
<div class="layui-tab layui-tab-brief">
<ul class="layui-tab-title">
<li class=""><a href="user.php">推广渠道</a></li>
<li class="layui-this"><a href="adduser.php">添加渠道</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">用户名</label>
<div class="layui-input-block">
<input type="text" name="user" value="" required lay-verify="required" placeholder="请输入用户名" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">密码</label>
<div class="layui-input-block">
<input type="password" name="pass" value="" required lay-verify="required" placeholder="请输入密码" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">QQ</label>
<div class="layui-input-block">
<input type="text" name="qq" value="" required lay-verify="required" placeholder="请输入QQ" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">电话</label>
<div class="layui-input-block">
<input type="text" name="tel" value="" required lay-verify="required" placeholder="请输入电话" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">收款人</label>
<div class="layui-input-block">
<input type="text" name="alipayname" value="" required lay-verify="required" placeholder="请输入收款人" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">收款账号</label>
<div class="layui-input-block">
<input type="text" name="alipay" value="" required lay-verify="required" placeholder="请输入您的收款账号(必填)" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">扣量比例</label>
<div class="layui-input-block">
<select name="kl"    class="layui-btn">
<option value='0'>不扣量</option>
<?php 
for($i=2;$i<31;$i++){
echo "<option value='$i'>$i 笔 扣1笔 </option>";
}
?>
</select> （&#25628;&#34382;&#31934;&#21697;&#31038;&#21306;&#119;&#119;&#119;&#46;&#115;&#111;&#117;&#104;&#111;&#46;&#110;&#101;&#116;&#25552;&#20379;&#26412;&#28304;&#30721;
）
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">分成比例</label>
<div class="layui-input-block">
<select name="fencheng"    class="layui-btn">
<?php 
for($i=0;$i<101;$i++){
echo "<option value='$i'>$i % </option>";
}
?>
</select>
</div>
</div>
<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit"  class="layui-btn"  value="提交" name= "add"   >
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>