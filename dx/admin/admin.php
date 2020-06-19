<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
$type="WHERE id='1'";
$duqu=queryall(admin,$type);
if(ubo($_POST[edit])){
$username=ubo($_POST[username]);
$password=ubo($_POST[password]);
if($username==null){
echo msglayer("帐号不能为空！",8);
}elseif($password==null){
echo msglayer("密码不能为空！",8);
}else{
$type="name='$username',pass='$password'   where id='1'";
upalldt(admin,$type);
echo msglayerurl("修改成功",8,"admin.php");
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>网站管理员</title>
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
<li class="layui-this">修改密码</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">管理员名称</label>
<div class="layui-input-block">
<input type="text" name="username" value="<?php echo $duqu[name]?>" required lay-verify="required" placeholder="请输入管理员名称" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">密码</label>
<div class="layui-input-block">
<input type="text" name="password" value="<?php echo $duqu[pass]?>" required lay-verify="required" placeholder="请输入密码" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit"  class="layui-btn"  value="提交" name= "edit"   >
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