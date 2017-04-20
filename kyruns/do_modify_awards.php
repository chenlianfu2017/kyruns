<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

//执行修改
if($_POST){
	
	$id=$_POST['id'];
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$prize = $_POST['prize'];
	$pname = $_POST['pname'];
	$level = $_POST['level'];
	$other = $_POST['other'];
	$date2 = $_POST['pdate'];
	$number = $_POST['number'];
	$author = $_POST['author'];
	$ranking = $_POST['ranking'];
	$source = $_POST['source'];
	$remarks = $_POST['remarks'];
	$sql = "UPDATE `tb_tj_awards` SET uid='$uid', date='$date', prize='$prize', pname='$pname', level='$level', other='$other', pdate='$date2', number='$number', author='$author', ranking='$ranking', source='$source',remarks='$remarks' WHERE id = {$id}";
	$query = mysqli_query($conn, $sql);
	if($query==true){
		echo "<script>alert('信息修改成功！');window.location.href='scan_tj_awards.php';</script>";
	}else{
		echo "<script>alert('修改失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='scan_tj_awards.php';</script>";
	}
}
?>