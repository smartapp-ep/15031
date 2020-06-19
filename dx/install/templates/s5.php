<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title><?php


echo $Title; ?> - <?php
echo $Powered; ?></title>
<link rel="stylesheet" href="./css/install.css?v=9.0" />
<script src="js/jquery.js"></script>
<?php
$uri = $_SERVER['REQUEST_URI'];
$root = substr($uri, 0, strpos($uri, "Install"));
$admin ="../admin";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div class="wrap">
  <?php
require './templates/header.php'; ?>
  <section class="section">
    <div class="">
      <div class="success_tip cc"> <a href="<?php
echo $admin; ?>" class="f16 b">安装完成，进入后台管理</a>
		<p>为了您站点的安全，安装完成后即可将网站根目录下的“Install”文件夹删除，或者/config/目录下创建ubo.php.loc文件防止重复安装。<p>
      </div>
      <div class=""> </div>
    </div>
  </section>
</div>

<?php
require './templates/footer.php'; ?>

</body>
</html>
