<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
//根据获取的id 读取对应条目的详细信息

if(is_numeric($_GET['note_id']) && $_GET['note_id']<>''){
	$id = $_GET['note_id'];
	$sql = "SELECT * FROM tb_declare WHERE did={$id}";
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
		<link rel="stylesheet" href="css/bootstrap.min.css" />
	</head>
	<body>
		<div class="container-fluid">
			<table class="table table-bordered" style="margin-top: 15px;">
				<tbody>
					<tr>
						<th>项目编号</th>
						<td><?php echo $row['dnumber'];?></td>
					</tr>
					<tr>
						<th>项目名称</th>
						<td><?php echo $row['dproname'];?></td>
					</tr>
					<tr>
						<th>项目负责人</th>
						<td><?php echo $row['dmanname'];?></td>
					</tr>
					<tr>
						<th>项目类型</th>
						<td><?php echo $row['dtype'];?></td>
					</tr>
					<tr>
						<th>项目经费</th>
						<td><?php echo $row['dmoney'];?></td>
					</tr>
					<tr>
						<th>项目余额</th>
						<td><?php echo $row['dbalance'];?></td>
					</tr>
					<tr>
						<th>项目申报年份</th>
						<td><?php echo $row['dtime'];?></td>
					</tr>
					<tr>
						<th>项目审核状态</th>
						<td><span style="<?php if($row['dstatus'] == 1){echo 'color:blue;';}elseif($row['dstatus'] == 2){echo 'color:green';}elseif($row['dstatus'] == 0){echo 'color:red';}?>">
								<?php if($row['dstatus'] == 1){echo "等待审核";}elseif($row['dstatus'] == 2){ echo "通过审核";}elseif($row['dstatus'] == 0){ echo "未通过";}?>
							</span>
						</td>
					</tr>
					<tr>
						<th>项目描述</th>
						<td><?php echo $row['dintroduction'];?></td>
					</tr>
					<tr>
						<th>项目申报书</th>
						<td> <a href="javascript:void(0);" onclick="javascript:window.open('download.php?filename=upload/File/<?php echo basename($row['dpath']);?>','_blank','')"><?php echo $row['dpath']?></a></td>
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
		<script type="text/javascript" src="js/jquery.min.js" ></script>
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	</body>
</html>