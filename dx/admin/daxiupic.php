<?php 
session_start();
if(!isset($_SESSION['adminname'])){
echo "<script>alert('���������ʧЧ�����µ�¼!')</script><script>location.href='index.php'</script>";
exit;
}
$uploaddir = "../daxiu/";//�����ļ�����Ŀ¼ ע�����/ 
$type=array("jpg","gif","bmp","jpeg","png");//���������ϴ��ļ������� 
//��ȡ�ļ���׺������ 
function fileext($filename) {return substr(strrchr($filename, '.'), 1); } 
$a=strtolower(fileext($_FILES['file']['name'])); 
if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type)) { $text=implode(",",$type); } else{ $filename=explode(".",$_FILES['file']['name']); do { 
$filename[0]=random(100); //������������� 
$picname=implode(".",$filename); 
$uploadfile2=$uploaddir.$picname; 
$uploadfile="daxiu/".$picname; 
} 
while(file_exists($uploadfile2)); 
if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile2)) 
{ 
if(is_uploaded_file($_FILES['file']['tmp_name'])) { 
echo "�ϴ�ʧ��!"; 
} 
else 
{//���ͼƬԤ�� 

} 
} 
}

?> 