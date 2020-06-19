<?php
error_reporting(0); 
session_start();
$logout= $_GET[logout];
switch($logout){
case 'logout':
if(isset($_SESSION['adminname'])){
$_SESSION = array();
if(isset($_COOKIE[session_name()])){
setcookie(session_name(),'',time()-3600);
}
session_destroy();
}
echo "<script>location.href='index.php'</script>";
}
?>
