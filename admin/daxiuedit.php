<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
$bjid=ubo($_GET[id]);
$type="where id='$bjid'";
$xg=queryall(daxiu,$type);
$page=ubo($_GET["page"]);
if(ubo($_POST[edit])){
include_once('daxiupic.php'); 
$pic=$uploadfile; 
$name=ubo($_POST[name]);
$url=ubo($_POST[url]);
if ($pic==null){
$pic2=$_POST[pic2]; 
$type="name='$name',pic='$pic2' ,url='$url'  where id='$bjid'";
upalldt(daxiu,$type);
}else{
$pic2=$uploadfile; 
$type="name='$name',pic='$pic2' ,url='$url' where id='$bjid'";
upalldt(daxiu,$type);
}
if ($page){
echo msglayerurl("修改成功",8,"daxiu.php?page=$page");
}else{
echo msglayerurl("修改成功",8,"daxiu.php");
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>修改</title>
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
<li class="layui-this">修改</li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj" enctype="multipart/form-data">
<div class="layui-form-item">
<label class="layui-form-label">名称</label>
<div class="layui-input-block">
<input type="text" name="name" value="<?php echo $xg[name]?>" required lay-verify="required" placeholder="请输入名称" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">上传图片</label>
<div class="layui-input-block">
<input name="file" type="file" value="浏览"  class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">外链图片</label>
<div class="layui-input-block">
<input name="pic2"  class="layui-input" type="text"   value="<?php echo $xg[pic]?>">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">视频连接</label>
<div class="layui-input-block">
<input type="text" name="url" value="<?php echo $xg[url]?>" required lay-verify="required" placeholder="请输入视频连接" class="layui-input">
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