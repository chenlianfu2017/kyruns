<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if($_GET){
$uid=$_GET['uid'];
$row=mysqli_query($conn,"delete from `user_list` where `uid`=$uid");
	if($row){
		echo "<script>alert('删除成功');window.location.href='scan_user.php';</script>";
	}
	else {
		echo "删除失败";
	}
}
?>