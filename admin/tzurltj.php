<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}

if(ubo($_POST[add])){
$tzurl=ubo($_POST[tzurl]);
$type="WHERE tzurl='$tzurl'";
$row=queryall(tzurl,$type); 
if($tzurl==null){
echo msglayer("��������Ϊ�գ�",8);
}elseif($row){
echo msglayer("�����Ѵ���",8);
}else{
$type="(`id`, `tzurl`) VALUES (null,'$tzurl')"; 
dbinsert(tzurl,$type);
echo msglayerurl("��ӳɹ�",8,"tzurl.php");
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>�������</title>
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
<li class=""><a href="tzurl.php">�����б�</a></li>
<li class="layui-this"><a href="tzurltj.php">�������</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">������ַ</label>
<div class="layui-input-block">
<input type="text" name="tzurl" value="" required lay-verify="required" placeholder="��������������http://" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit"  class="layui-btn"  value="�ύ" name= "add"   >
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