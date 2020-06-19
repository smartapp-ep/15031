<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
//网站配置
$type="WHERE id='1'";
$peizhi=queryall(ubozf,$type);
if(ubo($_POST[wzok])){
$type="money1='$_POST[money1]',money2='$_POST[money2]',money3='$_POST[money3]',money4='$_POST[money4]',money5='$_POST[money5]',daxiu1='$_POST[daxiu1]',daxiu2='$_POST[daxiu2]',zhibo1='$_POST[zhibo1]',zhibo2='$_POST[zhibo2]'   where id='1'";
upalldt(ubozf,$type);
echo msglayerurl("修改成功",8,"zhifu.php");
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>金额设置</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="css/layui.css" media="all">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/style2.css">
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
<li class="layui-this"><a href="zhifu.php">金额设置</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">会员版块价格1</label>
<div class="layui-input-block">
<input type="text" name="money1" value="<?php echo $peizhi[money1]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">会员版块价格2</label>
<div class="layui-input-block">
<input type="text" name="money2" value="<?php echo $peizhi[money2]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">会员版块价格3</label>
<div class="layui-input-block">
<input type="text" name="money3" value="<?php echo $peizhi[money3]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">会员版块价格4</label>
<div class="layui-input-block">
<input type="text" name="money4" value="<?php echo $peizhi[money4]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">会员版块价格5</label>
<div class="layui-input-block">
<input type="text" name="money5" value="<?php echo $peizhi[money5]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">大秀版块价格1</label>
<div class="layui-input-block">
<input type="text" name="daxiu1" value="<?php echo $peizhi[daxiu1]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">大秀版块价格2</label>
<div class="layui-input-block">
<input type="text" name="daxiu2" value="<?php echo $peizhi[daxiu2]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">直播版块价格1</label>
<div class="layui-input-block">
<input type="text" name="zhibo1" value="<?php echo $peizhi[zhibo1]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">直播版块价格2</label>
<div class="layui-input-block">
<input type="text" name="zhibo2" value="<?php echo $peizhi[zhibo2]?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit" class="layui-btn"  value="提交"  name="wzok" >
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