<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
//��վ����
$type="WHERE id='1'";
$peizhi=queryall(ubozf,$type);
if(ubo($_POST[wzok])){
$type="money1='$_POST[money1]',money2='$_POST[money2]',money3='$_POST[money3]',money4='$_POST[money4]',money5='$_POST[money5]',daxiu1='$_POST[daxiu1]',daxiu2='$_POST[daxiu2]',zhibo1='$_POST[zhibo1]',zhibo2='$_POST[zhibo2]'   where id='1'";
upalldt(ubozf,$type);
echo msglayerurl("�޸ĳɹ�",8,"zhifu.php");
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
<link rel="stylesheet" href="css/style2.css">
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
<li class="layui-this"><a href="zhifu.php">�������</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">��Ա���۸�1</label>
<div class="layui-input-block">
<input type="text" name="money1" value="<?php echo $peizhi[money1]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">��Ա���۸�2</label>
<div class="layui-input-block">
<input type="text" name="money2" value="<?php echo $peizhi[money2]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">��Ա���۸�3</label>
<div class="layui-input-block">
<input type="text" name="money3" value="<?php echo $peizhi[money3]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">��Ա���۸�4</label>
<div class="layui-input-block">
<input type="text" name="money4" value="<?php echo $peizhi[money4]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">��Ա���۸�5</label>
<div class="layui-input-block">
<input type="text" name="money5" value="<?php echo $peizhi[money5]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">������۸�1</label>
<div class="layui-input-block">
<input type="text" name="daxiu1" value="<?php echo $peizhi[daxiu1]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">������۸�2</label>
<div class="layui-input-block">
<input type="text" name="daxiu2" value="<?php echo $peizhi[daxiu2]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">ֱ�����۸�1</label>
<div class="layui-input-block">
<input type="text" name="zhibo1" value="<?php echo $peizhi[zhibo1]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">ֱ�����۸�2</label>
<div class="layui-input-block">
<input type="text" name="zhibo2" value="<?php echo $peizhi[zhibo2]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit" class="layui-btn"  value="�ύ"  name="wzok" >
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