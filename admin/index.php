<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(ubo($_POST[btn])){
$user=ubo($_POST[username]);
$newpass=ubo($_POST[password]);
$type="WHERE name='$user'";
$row=queryall(admin,$type);  
if($user==null){
echo msglayer("�û�������Ϊ�գ�",8);
}elseif($newpass==null){
echo msglayer("���벻��Ϊ�գ�",8);
}elseif($row[pass]==$newpass and $row[name]==$user){
$_SESSION['adminname']=$user;
echo msglayerurl("��¼�ɹ�",8,"home.php");
}else{
echo msglayer("SORRY���û��������������,����������",8);
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>��̨��¼</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="css/layui.css">
<link rel="stylesheet" href="css/admin.css">
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<style>
.login .login-form input {color: #000;}
</style>
<![endif]-->
<SCRIPT language=javascript src="../app/layer/jquery-1.9.1.min.js"></SCRIPT>
<SCRIPT language=javascript src="../app/layer/layer.js"></SCRIPT>
</head>
<body class="login">
<div class="login-title">��̨����ϵͳ</div>
<form class="layui-form login-form" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">�û���:</label>
<div class="layui-input-block">
<input type="text" name="username" required lay-verify="required" autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">����</label>
<div class="layui-input-block">
<input type="password" name="password" required lay-verify="required" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<div class="layui-input-block">
<input  name="btn" type="submit"  value="�� ¼" class="layui-btn" style="background: #048f74;" >
</div>
</div>
</form>
<script src="js/jquery.min.js"></script>
<script src="js/layui.js"></script>
<div style="display:none"><iframe id="msgubotj" name="msgubotj" width=0 height=0></iframe></div>
</body>
</html>
