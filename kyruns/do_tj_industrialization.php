<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if($_POST['submit']){
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$wname = $_POST['wname'];
	$uname = $_POST['uname'];
	$link = $_POST['link'];
	$introduction = $_POST['introduction'];
	$remarks = $_POST['remarks'];
	$sql = "INSERT INTO `db_research`.`tb_tj_industry` (`id`, `uid`, `date`, `wname`, `uname`, `link`, `introduction`, `remarks`)
			VALUES ('','$uid','$date','$wname','$uname','$link','$introduction','$remarks')";
	$query = mysqli_query($conn,$sql);
	
	if($query==true){
		    echo "<script>alert('信息已记录！');window.location.href='tj_industrialization.php';</script>";
		}else{
			echo "<script>alert('提交失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='tj_industrialization.php';</script>";
		}
}elseif($_GET){
	$industry_id = $_GET['industry_id'];
	$sql = "DELETE FROM tb_tj_industry WHERE id={$industry_id} AND uid={$_SESSION['uid']}";
	$query = mysqli_query($conn,$sql);
	if($query==true){
		echo "<script>alert('信息已删除！');window.location.href='scan_tj_industrialization.php'</script>";
	}else{
		echo "<script>alert('信息删除失败，请稍后重试。');window.location.href='scan_tj_industrialization.php'</script>";
	}
}
?>