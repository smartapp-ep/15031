<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
$type="WHERE id='1'";
$duqu=queryall(admin,$type);
if(ubo($_POST[edit])){
$username=ubo($_POST[username]);
$password=ubo($_POST[password]);
if($username==null){
echo msglayer("�ʺŲ���Ϊ�գ�",8);
}elseif($password==null){
echo msglayer("���벻��Ϊ�գ�",8);
}else{
$type="name='$username',pass='$password'   where id='1'";
upalldt(admin,$type);
echo msglayerurl("�޸ĳɹ�",8,"admin.php");
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>��վ����Ա</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="css/layui.css" media="all">
<link rel="stylesheet" href="css/font-awesome.min.css">
<!--CSS����-->
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
<!--����-->
<div class="layui-body">
<!--tab��ǩ-->
<div class="layui-tab layui-tab-brief">
<ul class="layui-tab-title">
<li class="layui-this">�޸�����</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">����Ա����</label>
<div class="layui-input-block">
<input type="text" name="username" value="<?php echo $duqu[name]?>" required lay-verify="required" placeholder="���������Ա����" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">����</label>
<div class="layui-input-block">
<input type="text" name="password" value="<?php echo $duqu[pass]?>" required lay-verify="required" placeholder="����������" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit"  class="layui-btn"  value="�ύ" name= "edit"   >
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