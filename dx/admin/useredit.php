<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
$bjid=ubo($_GET[id]);
$type="where id='$bjid'";
$xg=queryall(ubouser,$type);
$page=ubo($_GET["page"]);
if(ubo($_POST[edit])){
$pass=ubo($_POST[pass]);
if($pass==null){
$newpass=$xg[pass];
}else{
$newpass=$pass;
}
$tel=ubo($_POST[tel]);
$qq=ubo($_POST[qq]);
$alipayname=ubo($_POST[alipayname]);
$alipay=ubo($_POST[alipay]);
$fencheng=ubo($_POST[fencheng]);
$kl=ubo($_POST[kl]);
$type="pass='$pass',tel='$tel',qq='$qq',alipayname='$alipayname',alipay='$alipay',fencheng='$fencheng',kl='$kl',kl2='$kl'  where id='$bjid'";
upalldt(ubouser,$type);
if ($page){
echo msglayerurl("�޸ĳɹ�",8,"user.php?page=$page");
}else{
echo msglayerurl("�޸ĳɹ�",8,"user.php");
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>�޸�������Ϣ</title>
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
<li class="layui-this">�޸�������Ϣ����&#25628;&#34382;&#31934;&#21697;&#31038;&#21306;&#119;&#119;&#119;&#46;&#115;&#111;&#117;&#104;&#111;&#46;&#110;&#101;&#116;&#25552;&#20379;&#26412;&#28304;&#30721;
����</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">�û���</label>
<div class="layui-input-block">
<input type="text" name="user" value="<?php echo $xg[user]?>" required lay-verify="required" placeholder="�������û���" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">����</label>
<div class="layui-input-block">
<input type="text" name="pass" value="<?php echo $xg[pass]?>" required lay-verify="required" placeholder="����������" class="layui-input">
</div>
</div>

<div class="layui-form-item">
<label class="layui-form-label">QQ</label>
<div class="layui-input-block">
<input type="text" name="qq" value="<?php echo $xg[qq]?>" required lay-verify="required" placeholder="������QQ" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">�绰</label>
<div class="layui-input-block">
<input type="text" name="tel" value="<?php echo $xg[tel]?>" required lay-verify="required" placeholder="������绰" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">�տ���</label>
<div class="layui-input-block">
<input type="text" name="alipayname" value="<?php echo $xg[alipayname]?>" required lay-verify="required" placeholder="�������տ���" class="layui-input">
</div>
</div>

<div class="layui-form-item">
<label class="layui-form-label">�տ��˺�</label>
<div class="layui-input-block">
<input type="text" name="alipay" value="<?php echo $xg[alipay]?>" required lay-verify="required" placeholder="�����������տ��˺�(����)" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">��������</label>
<div class="layui-input-block">
<select name="kl"    class="layui-btn">
<option value="<?php echo $xg[kl]?>"><?php echo $xg[kl]?> �� ��1�� </option>
<option value='0'>������</option>
<?php 
for($i=2;$i<31;$i++){
echo "<option value='$i'>$i �� ��1�� </option>";
}
?>
</select>
</div>11111111111111111111
</div>
<div class="layui-form-item">
<label class="layui-form-label">�ֳɱ���</label>
<div class="layui-input-block">
<select name="fencheng"    class="layui-btn">
<option value="<?php echo $xg[fencheng]?>"><?php echo $xg[fencheng]?>% </option>
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