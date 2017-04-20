<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

header("Content-Type:application/vnd.ms-excel; Charset=UTF-8");
header("Content-Disposition:attachment;filename=$filename.xls");
$filename = "信工学院作品产业化统计单";
$filename = mb_convert_encoding("$filename","GB2312","UTF-8");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<th colspan="7" scope="col" class="font">作品产业化统计单</th>
		</tr>
		<thead>
			<tr>
			    <th>编号</th> 
			    <th>作品名称</th> 
			    <th>上传市场名</th> 
			    <th>上传市场链接</th> 
			    <th>作品简介</th>
			    <th>年份</th>
			    <th>备注</th> 
			</tr>
		</thead>
		<tbody>
		<?php
			$select_date = $_GET['select-date'];//$select_date接收的数字传值，get传递过程中不受影响
			$select_author = $_GET['tcname']; //$select_author接收的中文传值，get传递过程中不再保持中文编码，做数据库查询字段时用''号不要用{}号
			if($select_author && $select_date <> ""){
				$sql = "SELECT * FROM `tb_tj_industry` WHERE wname = '$select_author' AND date = {$select_date}";
			}elseif($select_date == ""){
				if($select_author == "" ){
					$sql = "SELECT * FROM `tb_tj_industry`";
			 	}else{
			 		$sql = "SELECT * FROM `tb_tj_industry` WHERE wname = '$select_author'";
			 	}
			}elseif($select_author == ""){
			 	if($select_date == "" ){
			 		$sql = "SELECT * FROM `tb_tj_industry`";
			 	}else{
			 		$sql = "SELECT * FROM `tb_tj_industry` WHERE date = {$select_date}";
			 	}
			 }
			 $query = mysqli_query($conn,$sql);
			 $i = 0;
			 while($row=mysqli_fetch_array($query)){
		?>
	    <tr>
			<td><?php echo ++$i;?></td> 
		 	<td><?php echo $row['wname'];?></td> 
		 	<td><?php echo $row['uname'];?></td>
		 	<td><?php echo $row['link'];?></td> 
		 	<td><?php echo $row['introduction'];?></td> 
		 	<td><?php echo $row['date'];?></td>
		    <td><?php echo $row['remarks'];?></td>
		</tr>
	  <?php }?>
		</tbody>
	</table>
</body>
</html>
