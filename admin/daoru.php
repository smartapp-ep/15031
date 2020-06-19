<?php
error_reporting(0); 
include("../config/conn.php");
include("../config/common.php");
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
if(ubo($_POST[drok])){
$path = '../backup/';
$filename = $path.$_FILES["file"]["name"] ;
$database2=ubo($_POST[database]);
$localhost2=ubo($_POST[localhost]);
$root2=ubo($_POST[root]);
$password2=ubo($_POST[password]);
mysql_query("CREATE DATABASE `$database2` DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;"); //创建数据库
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
$content .='////////////////////这里信息根据自己的实际情况可以修改////////////////////////////'."\r\n";
$content .= '$localhost = "'."$localhost2".'";       //服务器地址，一般为localhost'."\r\n";
$content .= '$root = "'."$root2".'";                 //服务器MYSQL登陆用户名'."\r\n";
$content .= '$password = "'."$password2".'";                 //服务器的MYsQL登陆密码'."\r\n";
$content .= '$database = "'."$database2".'";      //你使用的数据库'."\r\n";
$content .='///////////////以上可以修改部份/////////////////////////////////////////////////'."\r\n";
$content .= '////////////////////////////////////////////////////以下内容,非专业人员请不要修改，避免错误；'."\r\n";
$content .= '$conn = @mysql_connect("$localhost","$root","$password") or die ("数据库连接出错，请检查");'."\r\n";
$content .= '@mysql_select_db("$database",$conn) or die ("数据库表不存在或者未连接");'."\r\n";
$content .= 'mysql_query("set names gbk"); //使用GBK中文件编码，防止出错'."\r\n";
$content .='////////////////////////////////////////////////////////////////////////////////////////////////////////'."\r\n";
$content .='?>';
$filename ="conn.php";
$path = "../config/";//你要保证这个文件夹存在，并且可写
if(file_exists($path)){unlink($path);}
$fp = fopen($path.$filename, 'w+');
fputs($fp, $content);
fclose($fp);
echo msglayerurl("导入成功",8,"daoru.php");

//备份数据库结束

}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="gb2312">
<title>数据导入</title>
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
<li class=""><a href="beifen.php">数据备份</a></li>
<li class="layui-this"><a href="daoru.php">数据导入</a></li>
</ul>
<div class="layui-tab-content">
<div class="layui-tab-item layui-show">
<form class="layui-form form-container" action="" method="post" target="msgubotj" enctype="multipart/form-data" >
<div class="layui-form-item">
<label class="layui-form-label">选择文件</label>
<div class="layui-input-block">
<input type="file" name="file"  required lay-verify="required" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">数据库地址</label>
<div class="layui-input-block">
<input type="text" name="localhost" value="<?php echo $localhost?>" required lay-verify="required" placeholder="数据库地址" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">数据库用户</label>
<div class="layui-input-block">
<input type="text" name="root" value="<?php echo $root?>" required lay-verify="required" placeholder="数据库用户" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">数据库密码</label>
<div class="layui-input-block">
<input type="text" name="password" value="<?php echo $password?>" required lay-verify="required" placeholder="数据库密码" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label class="layui-form-label">数据库名称</label>
<div class="layui-input-block">
<input type="text" name="database" value="<?php echo $database?>" required lay-verify="required" placeholder="数据库名称" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<div class="layui-input-block">
<input type="submit"  class="layui-btn"  value="提交" name= "drok"   >
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