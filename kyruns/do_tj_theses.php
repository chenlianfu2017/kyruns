<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if($_POST['submit']){
	
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$name = $_POST['name'];
	$sname = $_POST['sname'];
	$period = $_POST['period'];
	$author = $_POST['author'];
	$status = $_POST['status'];
	$level = $_POST['level'];
	$other = $_POST['other'];
	$source = $_POST['source'];
	$number = $_POST['number'];
	$remarks = $_POST['remarks'];
	
	$sql = "INSERT INTO `db_research`.`tb_tj_theses` (`id`, `uid`, `date`, `name`, `sname`, `period`, `author`, `status`, `level`, `other`, `source`, `number`, `remarks`)
			VALUES ('', '$uid', '$date', '$name', '$sname', '$period', '$author', '$status', '$level', '$other', '$source', '$number', '$remarks')";
	$query = mysqli_query($conn, $sql);
	
	if($query==true){
		    echo "<script>alert('信息已记录！');window.location.href='tj_theses.php';</script>";
		}else{
			echo "<script>alert('提交失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='tj_theses.php';</script>";
		}
}elseif($_GET){
		//获取传递来的tj_id及查询条件
		$theses_id = $_GET['theses_id'];
		$sql = "DELETE FROM tb_tj_theses WHERE id =".$theses_id;//删除数据
		$query = mysqli_query($conn,$sql);
		if($query==true){
			echo "<script>alert('信息已移除！');window.location.href='scan_tj_theses.php';</script>";
		}else{
			echo "<script>alert('操作失败，稍后请重试！');window.location.href='scan_tj_theses.php';</script>";
		}
	}
?>