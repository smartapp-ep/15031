<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $Title; ?> - <?php
echo $Powered; ?></title>
<link rel="stylesheet" href="./css/install.css?v=9.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div class="wrap">
  <?php
require './templates/header.php'; ?>
  <div class="section">
    <div class="main cc">
      </div>
    <div class="bottom tac"> <a href="<?php
echo $_SERVER['PHP_SELF']; ?>?step=2" class="btn">接 受</a> </div>
  </div>
</div>
<?php
require './templates/footer.php'; ?>
</body>
</html>
