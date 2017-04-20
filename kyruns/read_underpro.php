<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if(is_numeric($_GET['note_id']) && $_GET['note_id']<>''){
	$id = $_GET['note_id'];
	$sql = "SELECT * FROM tb_tj_underpro WHERE uid={$_SESSION['uid']} AND id={$id}";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
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
			<title>科研统计</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	</head>
	<body>
		<div class="container-fluid">
			<table class="table table-bordered" style="margin-top: 15px;">
				<tbody>
					<tr>
						<th>课题名称</th>
						<td><?php echo $row['name'];?></td>
					</tr>
					<tr>
						<th>上传时间</th>
						<td><?php echo $row['date'];?></td>
					</tr>
					<tr>
						<th>课题编号</th>
						<td><?php echo $row['number'];?></td>
					</tr>
					<tr>
						<th>周&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;期</th>
						<td><?php echo $row['cycle'];?></td>
					</tr>
					<tr>
						<th>负&nbsp;&nbsp;责&nbsp;&nbsp;人</th>
						<td><?php echo $row['charge'];?></td>
					</tr>
					<tr>
						<th>经&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费</th>
						<td><?php echo $row['funds'];?></td>
					</tr>
					<tr>
						<th>来&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;源</th>
						<td><?php echo $row['source'];?></td>
					</tr>
					<tr>
						<th rowspan="4">备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注:</th>
						<td rowspan="4"><?php echo $row['remarks'];?></td>
					</tr>
				</tbody>
			</table>
			<div class="row-fluid" style="padding-bottom:30px;">
				<div class="span2">
					 <button style="width:100%; margin:0 auto; display:block;" class="btn btn-sm btn-default" type="button" onclick="closeWindow()">关闭</button>
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
