<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
include("../pay/config.php");
//��վ����
$type="WHERE id='1'";
$peizhi=queryall(wzpeizhi,$type);
if(ubo($_POST[wzok])){
$gb=ubo($_POST[gb]);
$tip=ubo($_POST[tip]);
$pc=ubo($_POST[pc]);
$pctip=ubo($_POST[pctip]);
$pcurl=ubo($_POST[pcurl]);
$kl=ubo($_POST[kl]);
$tz=ubo($_POST[tz]);
$type="gb='$gb',tip='$tip',pc='$pc',pctip='$pctip',pcurl='$pcurl',kl='$kl',tz='$tz'  where id='1'";
upalldt(wzpeizhi,$type);
$filename="../pay/config.php";  
$content = '<?php'."\r\n";
$content .='error_reporting(0); '."\r\n";
$content .='$uboid='."'".$uboid."';"."\r\n";
$content .='$ubokey='."'".$ubokey."';"."\r\n";
$content .='$url="http://wxrhjc.com/pay/";'."\r\n";
$content .='$ubotzurl="http://'.$_SERVER['HTTP_HOST'].'/pay/ubotzurl.php";'."\r\n";
$content .='$ubobackurl="http://'.$_SERVER['HTTP_HOST'].'/pay/ubobackurl.php";'."\r\n";
$content .='?>';
writefile($filename,$content);  
echo msglayerurl("�޸ĳɹ�",8,"system.php");
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>��վ����</title>
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
<li class="layui-this"><a href="system.php">վ������</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj">
<div class="layui-form-item">
<label class="layui-form-label">�̻�ID</label>
<div class="layui-input-block">
<input type="text" name="uboid" value="<?php echo $uboid?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">�̻���Կ</label>
<div class="layui-input-block">
<input type="text" name="ubokey" value="<?php echo $ubokey?>" required  lay-verify="required"  autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">��ת����</label>
<?php if($peizhi[tz]==0){?>
<label class="demo--label"><input class="demo--radio" type="radio" name="tz" value="0" checked><span class="demo--radioInput"></span>����</label>
<label class="demo--label"><input class="demo--radio" type="radio" name="tz" value="1"  ><span class="demo--radioInput"></span>�ر�</label>
<?php }else{ ?>
<label class="demo--label"><input class="demo--radio" type="radio" name="tz" value="0"  ><span class="demo--radioInput"></span>����</label>
<label class="demo--label"><input class="demo--radio" type="radio" name="tz" value="1" checked ><span class="demo--radioInput"></span>�ر�</label>
<?php }?>
</div>

<div class="layui-form-item">
<label class="layui-form-label">��վ����</label>
<?php if($peizhi[gb]==0){?>
<label class="demo--label"><input class="demo--radio" type="radio" name="gb" value="0"  checked><span class="demo--radioInput"></span>����</label>
<label class="demo--label"><input class="demo--radio" type="radio" name="gb" value="1" ><span class="demo--radioInput"></span>�ر�</label>
<?php }else{ ?>
<label class="demo--label"><input class="demo--radio" type="radio" name="gb" value="0"  ><span class="demo--radioInput"></span>����</label>
<label class="demo--label"><input class="demo--radio" type="radio" name="gb" value="1" checked ><span class="demo--radioInput"></span>�ر�</label>
<?php }?>
</div>
<div class="layui-form-item">
<label class="layui-form-label">�ر�˵��</label>
<div class="layui-input-block">
<textarea name="tip"  class="layui-textarea"><?php echo $peizhi[tip]?></textarea>
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">���Է���</label>
<div class="layui-input-block">
<?php if($peizhi[pc]==0){?>
<label class="demo--label"><input class="demo--radio" type="radio" name="pc" value="0"  checked><span class="demo--radioInput"></span>��תurl</label>
<label class="demo--label"><input class="demo--radio" type="radio" name="pc" value="1" ><span class="demo--radioInput"></span>�����ʾ</label>
<?php }else{ ?>
<label class="demo--label"><input class="demo--radio" type="radio" name="pc" value="0"  ><span class="demo--radioInput"></span>��תurl</label>
<label class="demo--label"><input class="demo--radio" type="radio" name="pc" value="1" checked><span class="demo--radioInput"></span>�����ʾ</label>
<?php }?>
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">��ʾ����</label>
<div class="layui-input-block">
<textarea name="pctip"  class="layui-textarea"><?php echo $peizhi[pctip]?></textarea>
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">��ת��ַ</label>
<div class="layui-input-block">
<textarea name="pcurl"  class="layui-textarea"><?php echo $peizhi[pcurl]?></textarea>
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">�ƹ����</label>
<?php if($peizhi[kl]==0){?>
<label class="demo--label"><input class="demo--radio" type="radio" name="kl" value="0" checked ><span class="demo--radioInput"></span>����</label>
<label class="demo--label"><input class="demo--radio" type="radio" name="kl" value="1" ><span class="demo--radioInput"></span>�ر�</label>
<?php }else{ ?>
<label class="demo--label"><input class="demo--radio" type="radio" name="kl" value="0"  ><span class="demo--radioInput"></span>����</label>
<label class="demo--label"><input class="demo--radio" type="radio" name="kl" value="1" checked><span class="demo--radioInput"></span>�ر�</label>
<?php }?>
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