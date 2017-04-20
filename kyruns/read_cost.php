<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
//根据获取的id 读取对应条目的详细信息

if(is_numeric($_GET['note_id']) && $_GET['note_id']<>''){
	$id = $_GET['note_id'];
	$sql = "SELECT * FROM tb_cost WHERE uid = {$_SESSION['uid']} AND cid={$id}";
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
			<title>费用报销</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	</head>
	<body>
		<div class="container-fluid">
			<table class="table table-bordered" style="margin-top: 15px;">
				<tbody>
					<tr>
						<th>依托项目编号</th>
						<td><?php echo $row['cnumber'];?></td>
					</tr>
					<tr>
						<th>依托项目名称</th>
						<td><?php echo $row['cname'];?></td>
					</tr>
					<tr>
						<th>报&nbsp;&nbsp;销&nbsp;&nbsp;人</th>
						<td><?php echo $row['cmanname'];?></td>
					</tr>
					<tr>
						<th>报销类型</th>
						<td><?php echo $row['ctype'];?></td>
					</tr>
					<tr>
						<th>报销经费</th>
						<td><?php echo $row['ccost'];?></td>
					</tr>
					<tr>
						<th>报销时间</th>
						<td><?php echo $row['ctime'];?></td>
					</tr>
					<tr>
						<th>项目描述</th>
						<td><?php echo $row['cintroduction'];?></td>
					</tr>
					<tr>
						<th>项目审核状态</th>
						<td><span style="<?php if($row['cstatus'] == 1){echo 'color:blue;';}elseif($row['cstatus'] == 2){echo 'color:green';}elseif($row['cstatus'] == 0){echo 'color:red';}?>">
								<?php if ($row['cstatus'] == 1){echo "等待审核";}elseif($row['cstatus'] == 2){ echo "通过审核";}elseif($row['cstatus'] == 0){ echo "未通过";}?>
							</span>
						</td>
					</tr>
					<tr>
						<th>费用报销凭证</th>
						<td><img class="img-rounded center-block" style="width:auto; height:auto;" src="<?php echo $row['cpicpath']?>"></td>
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