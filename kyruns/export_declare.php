<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

header("Content-Type:application/vnd.ms-excel; Charset=UTF-8");
$filename = "信工学院项目申报统计单";
$filename = mb_convert_encoding("$filename","GB2312","UTF-8");
header("Content-Disposition:attachment;filename=$filename.xls");

$select_year = $_GET['dtime'];
$dtype = $_GET['dtype'];


if($select_year == ""){
	if($dtype == ""){
		$sql="SELECT * FROM tb_declare WHERE uid = {$_SESSION['uid']}";
	}else{
		$sql="SELECT * FROM tb_declare WHERE uid = {$_SESSION['uid']} AND dtype = '$dtype'";
	}

}else{
	if($dtype == ""){
		$sql="SELECT * FROM tb_declare WHERE uid = {$_SESSION['uid']} AND dtime = '$select_year'";
	}else{
		$sql="SELECT * FROM tb_declare WHERE uid = {$_SESSION['uid']} AND dtime = '$select_year' AND dtype = '$dtype'";
	}
}
$query= mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
    .font{
    	font-size:20px;
    	color:red;
    }
    th{
    	border:1px solid #000000;
    	font-size:16px;
    }
    td{
    	border:1px solid #000000;
    	font-size:14px;
    }
    </style>
</head>
<body>
	<!-- <table style="width:1000px; border:1px; color:red; text-align:center" > -->
	<table class="table table-bordered">
		<tr>
			<th colspan="10" scope="col" class="font">项目申报统计单</th>
		</tr>
		<thead>
		<tr>
		    <th>编号</th> 
		    <th>项目名称</th> 
		    <th>负责人</th> 
		    <th>经费</th> 
		    <th>类别</th>
		    <th>年份</th>
		    <th>简介</th> 
		    <th>审核状态</th>
		    <th>项目余额</th>
		</tr>
		</thead>
		<tbody>
		<?php

		 while($row=mysqli_fetch_array($query)){
		 	$dstatus=$row['dstatus'];
		  	
		?>
	    <tr>
			
		 	<td><?php echo $row['dnumber'];?></td>
		 	<td><?php echo $row['dproname'];?></td> 
		 	<td><?php echo $row['dmanname'];?></td>
		 	<td><?php echo $row['dmoney'];?></td> 
		 	<td><?php echo $row['dtype'];?></td> 
		 	<td><?php echo $row['dtime'];?></td>
		    <td><?php echo $row['dintroduction'];?></td>
		    <td style="<?php if($dstatus == 1){echo 'color:blue;';}elseif($dstatus == 2){echo 'color:green';}elseif($dstatus == 0){echo 'color:red';}?>">
					   <?php if ($dstatus == 1){echo "等待审核";}elseif($dstatus == 2){ echo "通过审核";}elseif($dstatus == 0){ echo "未通过";}?></td>
		    <td><?php echo $row['dbalance'];?></td>		    
		</tr>
		
		<?php 	
		 }
		?>
		</tbody>
	</table>
</body>
</html>
