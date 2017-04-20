<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if($_POST['submit']){
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$department = $_POST['department'];
	$name = $_POST['name'];
	$idcard = $_POST['idcard'];
	$paycard = $_POST['paycard'];
	$cname = $_POST['cname'];
	$type = $_POST['type'];
	$address = $_POST['address'];
	$remarks = $_POST['remarks'];
	
	$sql = "INSERT INTO `db_research`.`tb_tj_propertyright` (`id`, `uid`, `date`, `department`, `name`, `idcard`, `paycard`, `cname`, `type`, `address`, `remarks`)
			VALUES ('', '$uid', '$date', '$department', '$name', '$idcard', '$paycard', '$cname', '$type', '$address', '$remarks')";
	$query = mysqli_query($conn, $sql);
	
	if($query==true){
		    echo "<script>alert('信息已记录！');window.location.href='tj_propertyRight.php';</script>";
		}else{
			echo "<script>alert('提交失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='tj_propertyRight.php';</script>";
		}
}elseif($_GET){
		//获取传递来的tj_id及查询条件
		$proright_id = $_GET['proright_id'];
		$sql = "DELETE FROM tb_tj_propertyright WHERE id =".$proright_id;//删除数据
		$query = mysqli_query($conn,$sql);
		if($query==true){
			echo "<script>alert('信息已移除！');window.location.href='scan_tj_propertyRight.php';</script>";
		}else{
			echo "<script>alert('操作失败，稍后请重试！');window.location.href='scan_tj_propertyRight.php';</script>";
		}
	}
?>