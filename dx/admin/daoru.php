<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
if(ubo($_POST[drok])){
$path = '../backup/';
$filename = $path.$_FILES["file"]["name"] ;
$database2=ubo($_POST[database]);
$localhost2=ubo($_POST[localhost]);
$root2=ubo($_POST[root]);
$password2=ubo($_POST[password]);
mysql_query("CREATE DATABASE `$database2` DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;"); //�������ݿ�
mysql_connect($localhost2, $root2, $password2) or die('Error: ' . mysql_error());
mysql_select_db($database2) or die('Error selecting MySQL database: ' . mysql_error());
$templine = '';
$lines = file($filename);
foreach ($lines as $line)
{
if (substr($line, 0, 2) == '--' || $line == '')
continue;
$templine .= $line;
if (substr(trim($line), -1, 1) == ';')
{
  mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    $templine = '';
}
}

$content = '<?php'."\r\n";
$content .='////////////////////������Ϣ�����Լ���ʵ����������޸�////////////////////////////'."\r\n";
$content .= '$localhost = "'."$localhost2".'";       //��������ַ��һ��Ϊlocalhost'."\r\n";
$content .= '$root = "'."$root2".'";                 //������MYSQL��½�û���'."\r\n";
$content .= '$password = "'."$password2".'";                 //��������MYsQL��½����'."\r\n";
$content .= '$database = "'."$database2".'";      //��ʹ�õ����ݿ�'."\r\n";
$content .='///////////////���Ͽ����޸Ĳ���/////////////////////////////////////////////////'."\r\n";
$content .= '////////////////////////////////////////////////////��������,��רҵ��Ա�벻Ҫ�޸ģ��������'."\r\n";
$content .= '$conn = @mysql_connect("$localhost","$root","$password") or die ("���ݿ����ӳ�������");'."\r\n";
$content .= '@mysql_select_db("$database",$conn) or die ("���ݿ�����ڻ���δ����");'."\r\n";
$content .= 'mysql_query("set names gbk"); //ʹ��GBK���ļ����룬��ֹ����'."\r\n";
$content .='////////////////////////////////////////////////////////////////////////////////////////////////////////'."\r\n";
$content .='?>';
$filename ="conn.php";
$path = "../config/";//��Ҫ��֤����ļ��д��ڣ����ҿ�д
if(file_exists($path)){unlink($path);}
$fp = fopen($path.$filename, 'w+');
fputs($fp, $content);
fclose($fp);
echo msglayerurl("����ɹ�",8,"daoru.php");

//�������ݿ����

}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>���ݵ���</title>
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
<li class=""><a href="beifen.php">���ݱ���</a></li>
<li class="layui-this"><a href="daoru.php">���ݵ���</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj" enctype="multipart/form-data" >
<div class="layui-form-item">
<label class="layui-form-label">ѡ���ļ�</label>
<div class="layui-input-block">
<input type="file" name="file"  required lay-verify="required" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">���ݿ��ַ</label>
<div class="layui-input-block">
<input type="text" name="localhost" value="<?php echo $localhost?>" required lay-verify="required" placeholder="���ݿ��ַ" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">���ݿ��û�</label>
<div class="layui-input-block">
<input type="text" name="root" value="<?php echo $root?>" required lay-verify="required" placeholder="���ݿ��û�" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">���ݿ�����</label>
<div class="layui-input-block">
<input type="text" name="password" value="<?php echo $password?>" required lay-verify="required" placeholder="���ݿ�����" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">���ݿ�����</label>
<div class="layui-input-block">
<input type="text" name="database" value="<?php echo $database?>" required lay-verify="required" placeholder="���ݿ�����" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit"  class="layui-btn"  value="�ύ" name= "drok"   >
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