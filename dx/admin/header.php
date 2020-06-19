<?php
$admin=$_SESSION['adminname'];
?>
<!--头部-->
<div class="layui-header header">
<a href=""><img class="logo" src="images/admin_logo.png" alt=""></a>
<div class="user-action">
<a href="admin.php"><?php echo $admin?></a>
<a href="../index.php" target="_blank">站点首页</a>
<a href="http://www.ubotj.com/" target="_blank">帮助</a>
<a class="" href="logout.php?logout=logout">退出</a>
</div>
</div>




