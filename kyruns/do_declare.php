<?php
include_once 'conn.php';
include_once 'upload_func_declare.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if($_POST['submit']){
	
	$fileInfo=$_FILES['dpath'];
	$dpath=uploadFile($fileInfo,'upload/File');//调用此方法，返回一个上传成功后文件的完整路径
	$uid = $_SESSION['uid'];
	$dproname = $_POST['dproname'];
	$dnumber = $_POST['dnumber'];
	$dtype = $_POST['dtype'];
	$dmanname = $_POST['dmanname'];
	$dmoney = $_POST['dmoney'];
	$dtime = $_POST['dtime'];
	$dintroduction = $_POST['dintroduction'];
	$dstatus = 1;
	$dbalance = $dmoney;//刚开始申请的总金额等于余额

	$sql = "INSERT INTO `db_research`.`tb_declare` (`did`, `uid`, `dproname`,`dnumber`, `dtype`, `dmanname`, `dmoney`, `dtime`, `dpath`, `dintroduction`, `dstatus`, `dbalance`)
	       VALUES('','$uid','$dproname','$dnumber','$dtype','$dmanname','$dmoney','$dtime','$dpath','$dintroduction','$dstatus','$dbalance')";
	$query = mysqli_query($conn,$sql);
	
	if($query==true){
	    echo "<script>alert('信息已记录！');window.location.href='declare.php';</script>";
	}else{
		echo "<script>alert('提交失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='declare.php';</script>";
	}
	
}elseif($_GET){//信息删除
		//获取传递来的declare_id及查询条件
		$declare_id = $_GET['did'];
		
		$sql0 = "SELECT * FROM tb_declare WHERE uid = {$_SESSION['uid']} and did ={$declare_id}";
		$row = mysqli_fetch_array(mysqli_query($conn, $sql0));
		if($row['dstatus']==2){
			echo "<script>alert('项目已通过审核，不能删除');history.go(-1);</script>";
			exit();
		}
		
		$sql = "DELETE FROM tb_declare WHERE uid = {$_SESSION['uid']} and did ={$declare_id}";//删除数据
		$query = mysqli_query($conn,$sql);	
		if($query==true){
			echo "<script>alert('信息已移除！');window.location.href='scan_declare.php';</script>";
		}else{
			echo "<script>alert('操作失败，稍后请重试！');window.location.href='scan_declare.php';</script>";
		}
	}
?>