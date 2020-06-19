<?php 
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('管理身份已失效请重新登录!')</script><script>location.href='index.php'</script>";
exit;
}
$uploaddir = "../daxiu/";//设置文件保存目录 注意包含/ 
$type=array("jpg","gif","bmp","jpeg","png");//设置允许上传文件的类型 
//获取文件后缀名函数 
function fileext($filename) {return substr(strrchr($filename, '.'), 1); } 
$a=strtolower(fileext($_FILES['file']['name'])); 
if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type)) { $text=implode(",",$type); } else{ $filename=explode(".",$_FILES['file']['name']); do { 
$filename[0]=random(100); //设置随机数长度 
$picname=implode(".",$filename); 
$uploadfile2=$uploaddir.$picname; 
$uploadfile="daxiu/".$picname; 
} 
while(file_exists($uploadfile2)); 
if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile2)) 
{ 
if(is_uploaded_file($_FILES['file']['tmp_name'])) { 
echo "上传失败!"; 
} 
else 
{//输出图片预览 

} 
} 
}

?> 