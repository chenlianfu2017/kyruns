<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if($_POST['submit']){
	/* if($_POST['level'] == "其他") {
		$_POST['level'] = $_POST['other'];
	} */
	
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$prize = $_POST['prize'];
	$pname = $_POST['pname'];
	$level = $_POST['level'];
	$other = $_POST['other'];
	$date2 = $_POST['date'];
	$number = $_POST['number'];
	$author = $_POST['author'];
	$ranking = $_POST['ranking'];
	$source = $_POST['source'];
	$remarks = $_POST['remarks'];
	$sql = "INSERT INTO `db_research`.`tb_tj_awards` (`id`, `uid`, `date`, `prize`, `pname`, `level`,`other`, `pdate`, `number`, `author`, `ranking`, `source`, `remarks`)
			VALUES('','$uid','$date','$prize','$pname','$level','$other','$date2','$number','$author','$ranking','$source','$remarks')";
	$query = mysqli_query($conn,$sql);
	
	if($query==true){
	    echo "<script>alert('信息已记录！');window.location.href='tj_awards.php';</script>";
	}else{
		echo "<script>alert('提交失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='tj_awards.php';</script>";
	}
	
}elseif($_GET){
		//获取传递来的tj_id及查询条件
		$awards_id = $_GET['awards_id'];
		$sql = "DELETE FROM tb_tj_awards WHERE id =".$awards_id;//删除数据
		$query = mysqli_query($conn,$sql);
		if($query==true){
			echo "<script>alert('信息已移除！');window.location.href='scan_tj_awards.php';</script>";
		}else{
			echo "<script>alert('操作失败，稍后请重试！');window.location.href='scan_tj_awards.php';</script>";
		}
	}
?>