<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if (is_numeric($_GET['id']) && $_GET ['id'] != '') {
	$id = $_GET ['id'];
	$sql = "SELECT * FROM tb_dynamic WHERE id='$id'";
	$result = mysqli_query ( $conn, $sql );
	$row = mysqli_fetch_array ( $result );
	if($row==''){
		echo "<script>alert('非法操作');window.close();</script>";
	}
}else{
	echo "<script>alert('未找到资源');window.close();</script>";
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>成果展示</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<style>
		    body{
		    	background-color:#F5F5F5;
		    }
			h3{
				color:#4F52F4;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid center-block" style="border:1px solid #9D9FF9; border-radius:3px; width:680px; padding-bottom:30px; margin-top:15px; margin-bottom:30px;">
				<div class="row-fluid">
					<div class="span12">
						<h3 class="text-center">
							<?php echo $row['dtitle'];?>
						</h3>
						<h6 class="text-center">
							<?php echo $row['dtime'];?>
						</h6>
					</div>
				</div>
				<hr style="height:1px; background-color:#D0D0D0; border:none; width:98%;">
				<div class="row-fluid">
					<div class="span12 center-block" style="width:600px;">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['dcontent'];?>
					</div>
				</div>
				<div class="row-fluid" style="padding:10px 0 10px;"></div>
				<div class="row-fluid">
					<img class="img-rounded center-block" alt="优秀项目" style="width:auto;height:auto;" src="admin/<?php echo $row['dpath'];?>">
				</div>
				<div class="row-fluid" style="padding-top:20px;">
					<div class="row">
						 <button style="width:100px; margin:0 auto; display:block;" class="btn btn-sm btn-primary" type="button" onclick="closeWindow()">关闭</button>
					</div>
				</div>
			</div>
		</div>
		<script>
			function closeWindow(){
				window.close();
			}
		</script>
		<script type="text/javascript" src="jquery/jquery.min.js" ></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js" ></script>
	</body>
</html>