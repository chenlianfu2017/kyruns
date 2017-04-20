<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if($_POST['submit']){
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$name = $_POST['name'];
	$number = $_POST['number'];
	$source = $_POST['source'];
	$cycle = $_POST['cycle'];
	$charge = $_POST['charge'];
	$funds = $_POST['funds'];
	$remarks = $_POST['remarks'];

	$sql = "INSERT INTO `db_research`.`tb_tj_underpro` (`id`, `uid`, `date`, `name`, `number`, `source`, `cycle`, `charge`, `funds`, `remarks`)
			VALUES ('', '$uid', '$date', '$name', '$number', '$source', '$cycle', '$charge', '$funds', '$remarks')";
	$query = mysqli_query($conn, $sql);
	
	if($query==true){
		    echo "<script>alert('信息已记录！');window.location.href='tj_undertakeProject.php';</script>";
		}else{
			echo "<script>alert('提交失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='tj_undertakeProject.php';</script>";
		}
}elseif($_GET){
		//获取传递来的tj_id及查询条件
		$underpro_id = $_GET['underpro_id'];
		$sql = "DELETE FROM tb_tj_underpro WHERE id =".$underpro_id;//删除数据
		$query = mysqli_query($conn,$sql);
		if($query==true){
			echo "<script>alert('信息已移除！');window.location.href='scan_tj_underpro.php';</script>";
		}else{
			echo "<script>alert('操作失败，稍后请重试！');window.location.href='scan_tj_underpro.php';</script>";
		}
	}
?>