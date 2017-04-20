<?php
include_once 'upload_func_declare.php';
//执行修改
if($_POST){
	//文件上传
	$fileInfo=$_FILES['dpath'];
	$dpath=uploadFile($fileInfo,'upload/File');

	$did=$_POST['did'];
	$uid = $_SESSION['uid'];
	$dproname = $_POST['dproname'];
	$dnumber = $_POST['dnumber'];
	$dtype = $_POST['dtype'];
	$dmanname = $_POST['dmanname'];
	$dmoney = $_POST['dmoney'];
	$dintroduction = $_POST['dintroduction'];
	$dtime = $_POST['dtime'];

	$sql2 = "UPDATE `tb_declare` SET uid = '$uid', dproname = '$dproname', dnumber = '$dnumber', dtype = '$dtype', dmanname = '$dmanname', dmoney = '$dmoney', dpath = '$dpath', dintroduction = '$dintroduction', dtime = '$dtime' WHERE did = '$did'";
	$query = mysqli_query($conn, $sql2);

	if($query==true){
		echo "<script>alert('信息修改成功！');window.location.href='scan_declare.php';</script>";
	}else{
		echo "<script>alert('修改失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='scan_declare.php';</script>";
	}
}
?>