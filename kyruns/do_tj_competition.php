<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if($_POST['submit']){
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$wname = $_POST['wname'];
	$student = $_POST['student'];
	$sponsor = $_POST['sponsor'];
	$teacher = $_POST['teacher'];
	$level = $_POST['level'];
	$remarks = $_POST['remarks'];
	$query = mysqli_query($conn,"INSERT INTO `db_research`.`tb_tj_competition` (`id`, `uid`, `date`, `wname`, `student`, `sponsor`, `teacher`, `level`, `remarks`)
			VALUES ('','$uid','$date','$wname','$student','$sponsor','$teacher','$level','$remarks')");
	
	if($query==true){
	    echo "<script>alert('信息已记录！');window.location.href='tj_competition.php';</script>";
	}else{		
		echo "<script>alert('提交失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='tj_competition.php';</script>";
	}
}elseif($_GET){
		//获取传递来的tj_id及查询条件
		$competition_id = $_GET['competition_id'];
		$sql = "DELETE FROM tb_tj_competition WHERE id ={$competition_id} AND uid={$_SESSION['uid']}";//删除数据
		$query = mysqli_query($conn,$sql);
		echo mysqli_error($conn);
		if($query==true){
			echo "<script>alert('信息已移除！');window.location.href='scan_tj_competition.php';</script>";
		}else{
			echo "<script>alert('操作失败，稍后请重试！');window.location.href='scan_tj_competition.php';</script>";
		}
	}
?>