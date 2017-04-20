<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

header("Content-Type:application/vnd.ms-excel; Charset=UTF-8");
$filename = "信工学院知识产权专利统计单";
$filename = mb_convert_encoding("$filename","GB2312","UTF-8");
header("Content-Disposition:attachment;filename=$filename.xls");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
	<table class="table table-bordered">
		<tr>
			<th colspan="10" scope="col" class="font">信工学院知识产权专利统计单</th>
		</tr>
		<tr>
		  <th>编号</th>
		  <th>部门</th> 
		  <th>姓名</th> 
		  <th>身份证号</th> 
		  <th>工资卡号</th> 
		  <th>成果或专利名称</th>
		  <th>种类</th>
		  <th>是否署名本校</th>
		  <th>年份</th>
		  <th>备注</th>
		</tr>
		<?php 
			$select_date = $_GET['select-date'];
			if($select_date==""){
				$sql = "SELECT * FROM tb_tj_propertyright WHERE uid = {$_SESSION['uid']}";
				$query = mysqli_query($conn,$sql);
			}else{
				$sql = "SELECT * FROM tb_tj_propertyright WHERE uid = {$_SESSION['uid']} AND date = {$select_date}";
				$query = mysqli_query($conn,$sql);
			}
			$i = 0;
		    while($row=mysqli_fetch_array($query)){
		?>
		<tr>
		  <td><?php echo ++$i;?></td> 
		  <td><?php echo $row['department'];?></td> 
		  <td><?php echo $row['name'];?></td>
		  <td><?php echo $row['idcard'];?></td> 
		  <td><?php echo $row['paycard'];?></td> 
		  <td><?php echo $row['cname'];?></td>
		  <td><?php echo $row['type'];?></td>
		  <td><?php echo $row['address']?></td>
		  <td><?php echo $row['date']?></td>
		  <td><?php echo $row['remarks'];?></td>
		</tr>
		
		<?php 
		 }
		?>
	</table>
</body>
</html>
