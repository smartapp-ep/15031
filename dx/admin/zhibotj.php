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
$name=ubo($_POST[name]);
$pic3=ubo($_POST[pic2]);
$url=ubo($_POST[url]);
$option = array('北京市','上海市','深圳市','南京市','杭州市','天津市','重庆市','成都市','青岛市','苏州市','无锡市','常州市','温州市','武汉市','长沙市','石家庄市','南昌市','三亚市','合肥市','郑州市','保定市','鄂尔多斯市','呼伦贝尔市','巴彦淖尔市','沈阳市','大连市','乌海市','鞍山市','抚顺市','本溪市','丹东市','乌兰察布市','锦州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','哈尔滨市','包头市','齐齐哈尔市','辽阳市','通辽市','徐州市','嘉兴市','宁波市','绍兴市','大庆市','安庆市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','松原市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','杭州市','临汾市','吕梁市','呼和浩特市','赤峰市','盘锦市','铁岭市','朝阳市','葫芦岛市','长春市','吉林市','杭州市','四平市','辽源市','白山市','通化市','杭州市','杭州市','杭州市','白城市','杭州市','杭州市','杭州市','杭州市','杭州市','营口市','阜新市','忻州市','运城市','晋中市','朔州市','晋城市','长治市','阳泉市','大同市','太原市','沧州市','廊坊市','衡水市','承德市','张家口市','邢台市','邯郸市','秦皇岛市','唐山市');
$index = rand(0, count($option)-1);
$diqu=$option[$index];
$hit=rand(1000,5000);
if($name==null){
echo msglayer("名称不能为空！",3);
}else{
include_once('zhibopic.php'); 
$pic=$uploadfile; 
if ($pic==null){
$pic2=$pic3; 
}else{
$pic2=$uploadfile; 
}
$type="(`id`, `name`,`url`,`pic`,`hit`,`diqu`) VALUES (null,'$name','$url','$pic2','$hit','$diqu')";
dbinsert(ubozb,$type);
echo msglayerurl("添加成功",8,"zhibotj.php");
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>添加</title>
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
<li class=""><a href="zhibo.php">直播资源</a></li>
<li class="layui-this"><a href="zhibotj.php">添加资源</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj" enctype="multipart/form-data">
<div class="layui-form-item">
<label class="layui-form-label">名称</label>
<div class="layui-input-block">
<input type="text" name="name" value="" required lay-verify="required" placeholder="请输入名称" class="layui-input">
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
<input type="text" name="pic2" value="" required lay-verify="required" placeholder="如果使用上传图片请为空" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">视频连接</label>
<div class="layui-input-block">
<input type="text" name="url" value="" required lay-verify="required" placeholder="请输入视频连接" class="layui-input">
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