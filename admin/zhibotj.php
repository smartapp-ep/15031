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
$name=ubo($_POST[name]);
$pic3=ubo($_POST[pic2]);
$url=ubo($_POST[url]);
$option = array('������','�Ϻ���','������','�Ͼ���','������','�����','������','�ɶ���','�ൺ��','������','������','������','������','�人��','��ɳ��','ʯ��ׯ��','�ϲ���','������','�Ϸ���','֣����','������','������˹��','���ױ�����','�����׶���','������','������','�ں���','��ɽ��','��˳��','��Ϫ��','������','�����첼��','������','������','������','������','������','������','������','������','������','������','������','������','������','������','������','������','������','������','������','��������','��ͷ��','���������','������','ͨ����','������','������','������','������','������','������','������','������','������','������','������','������','������','��ԭ��','������','������','������','������','������','������','������','�ٷ���','������','���ͺ�����','�����','�̽���','������','������','��«����','������','������','������','��ƽ��','��Դ��','��ɽ��','ͨ����','������','������','������','�׳���','������','������','������','������','������','Ӫ����','������','������','�˳���','������','˷����','������','������','��Ȫ��','��ͬ��','̫ԭ��','������','�ȷ���','��ˮ��','�е���','�żҿ���','��̨��','������','�ػʵ���','��ɽ��');
$index = rand(0, count($option)-1);
$diqu=$option[$index];
$hit=rand(1000,5000);
if($name==null){
echo msglayer("���Ʋ���Ϊ�գ�",3);
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
echo msglayerurl("��ӳɹ�",8,"zhibotj.php");
}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>���</title>
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
<li class=""><a href="zhibo.php">ֱ����Դ</a></li>
<li class="layui-this"><a href="zhibotj.php">�����Դ</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj" enctype="multipart/form-data">
<div class="layui-form-item">
<label class="layui-form-label">����</label>
<div class="layui-input-block">
<input type="text" name="name" value="" required lay-verify="required" placeholder="����������" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">�ϴ�ͼƬ</label>
<div class="layui-input-block">
<input name="file" type="file" value="���"  class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">����ͼƬ</label>
<div class="layui-input-block">
<input type="text" name="pic2" value="" required lay-verify="required" placeholder="���ʹ���ϴ�ͼƬ��Ϊ��" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">��Ƶ����</label>
<div class="layui-input-block">
<input type="text" name="url" value="" required lay-verify="required" placeholder="��������Ƶ����" class="layui-input">
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