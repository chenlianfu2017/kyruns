<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

include_once 'upload.func.php';
$fileInfo=$_FILES['dpath'];
$dpath=uploadFile($fileInfo,'images/uploads');//调用此方法，返回一个上传成功后文件的完整路径

if($_POST['submit']){
	$dtitle=$_POST['dtitle'];
	$dcontent=$_POST['content'];
	$dtime=date("Y-m-d");
	$sql="INSERT INTO tb_dynamic (id,dtitle,dpath,dcontent,dtime) VALUES ('','$dtitle','$dpath','$dcontent','$dtime')";
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('添加成功!');window.location.href='scan_dynamic.php';</script>";
	}else{
		echo "<script>alert('添加失败!');window.location.href='dynamic.php';</script>";
	}
}
?>