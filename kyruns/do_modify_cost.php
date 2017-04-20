<?php
include_once 'conn.php';
include_once 'upload_func_cost.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
//执行修改
if($_POST){
	
	/* 此处判断是否是依托项目和是否超支（状态前提：已知未通过审核，不依托项目的费用申请不限制经费上限）
	 * 无论依托项目或不依托项目
	 * 未通过审核有两种状态：0 拒绝通过 ，1 等待审核，每次用户修改费用报销申请后状态重置为 1 等待审核状态
	 * 
	 */
	$cnumber = $_POST['cnumber'];
	$ccost = $_POST['ccost'];
	$sql = "SELECT * FROM tb_cost WHERE cnumber={$cnumber} AND uid={$_SESSION['uid']}";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
	//如果是依托项目,则判断经费是否超支
	if($cnumber<>''){
		$sql="SELECT * FROM tb_declare WHERE dnumber={$cnumber} AND uid={$_SESSION['uid']}";
		$query=mysqli_query($conn,$sql);
		$result=mysqli_fetch_array($query);
		if($result['dbalance']<$ccost){
			echo "<script>alert('所依托的项目其经费余额不足，本次申请的经费不得超过所依托项目的经费余额');history.go(-1);</script>";
			exit();
		}
	}
	
	//上传
	$fileInfo=$_FILES['cpicpath'];
	$cpicpath=uploadFile($fileInfo,'upload/Img');
	
	$cid=$_POST['cid'];
	$uid = $_SESSION['uid'];
	$cname = $_POST['cname'];
	$cmanname = $_POST['cmanname'];
	$ctype = $_POST['ctype'];
	$ctime = $_POST['ctime'];
	$cintroduction = $_POST['cintroduction'];
	$cstatus = 1;

	$sql2 = "UPDATE `tb_cost` SET uid='$uid', cname='$cname', cmanname='$cmanname', cnumber='$cnumber', ccost='$ccost', ctype='$ctype', ctime='$ctime', cintroduction='$cintroduction', cpicpath='$cpicpath',cstatus='$cstatus' WHERE cid = '$cid'";  
	$query = mysqli_query($conn, $sql2);
	if($query==true){
		echo "<script>alert('信息修改成功！');window.location.href='scan_cost.php';</script>";
	}else{
		echo "<script>alert('修改失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='scan_cost.php';</script>";
	}
}
?>