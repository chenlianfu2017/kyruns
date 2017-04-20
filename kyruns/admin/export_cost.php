<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

header("Content-Type:application/vnd.ms-excel; Charset=UTF-8");
header("Content-Disposition:attachment;filename=$filename.xls");
$filename = "信工学院费用报销统计单";
$filename = mb_convert_encoding("$filename","GB2312","UTF-8");

$select_year = $_GET['ctime'];
$type = $_GET['ctype'];
if($select_year == ""){
	if($type == ""){
		$sql="SELECT * FROM  tb_cost ";
	}else{
		$sql="SELECT * FROM  tb_cost WHERE  ctype = '$type'";
	}
}else{
	if($type == ""){
		$sql="SELECT * FROM  tb_cost WHERE  ctime = '$select_year'";
	}else{
		$sql="SELECT * FROM  tb_cost WHERE  ctime = '$select_year' AND ctype = '$type'";
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
			<th colspan="10" scope="col" class="fontTitle">费用报销统计单</th>
		</tr>
		<thead>
		<tr>
		    <th>依托项目编号</th> 
		    <th>依托项目名称</th> 
		    <th>报销人</th> 
		    <th>经费</th> 
		    <th>报销类别</th>
		    <th>年份</th>
		    <th>简介</th> 
		    <th>审核状态</th>
		    <th>报销照片凭证</th>
		</tr>
		</thead>
		<tbody>
			<?php
			while($row=mysqli_fetch_array($query)){
				$cstatus=$row['cstatus'];
			?>
		    <tr>
			 	<td><?php echo $row['cnumber'];?></td>
			 	<td><?php echo $row['cname'];?></td> 
			 	<td><?php echo $row['cmanname'];?></td>
			 	<td><?php echo $row['ccost'];?></td> 
			 	<td><?php echo $row['ctype'];?></td> 
			 	<td><?php echo $row['ctime'];?></td>
			    <td><?php echo $row['cintroduction'];?></td>
			    <td style="<?php if($cstatus == 1){echo 'color:red;';}elseif($cstatus == 2){echo 'color:green';}?>">
					<?php if ($cstatus == 1){echo "等待审核";}elseif($cstatus == 2){ echo "通过审核";}?>
				</td>
			    <td><?php echo $row['cpicpath'];?></td>
			</tr>		
	  <?php }?>
		</tbody>
	</table>
</body>
</html>
