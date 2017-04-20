<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

header("Content-Type:application/vnd.ms-excel; Charset=UTF-8");
header("Content-Disposition:attachment;filename=$filename.xls");
$filename = "信工学院科研获奖统计";
$filename = mb_convert_encoding("$filename","GB2312","UTF-8");//目标编码<-原编码
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
			<th colspan="11" scope="col" class="font">信工学院科研获奖统计</th>
		</tr>
		<tr>
		  <th>编号</th>
		  <th>奖项</th> 
		  <th>获奖成果名称</th> 
		  <th>获奖等级</th> 
		  <th>获奖时间</th> 
		  <th>获奖证书编号</th>
		  <th>获奖者姓名</th>
		  <th>本人排名</th> 
		  <th>依托项目（包括项目来源）</th>
		  <th>年份</th>
		  <th>备注</th>
		</tr>
		<?php 
			$select_date = $_GET['select-date'];//$select_date接收的数字传值，get传递过程中不受影响
			$select_author = $_GET['tcname']; //$select_author接收的中文传值，get传递过程中不再保持中文编码，做数据库查询字段时用''号不要用{}号
			
			if($select_author && $select_date <> ""){
				$sql = "SELECT * FROM `tb_tj_awards` WHERE author = '$select_author' AND date = {$select_date}";
			}elseif($select_date == ""){
				if($select_author == "" ){
					$sql = "SELECT * FROM `tb_tj_awards`";
				}else{
					$sql = "SELECT * FROM `tb_tj_awards` WHERE author = '$select_author'";
				}
			}elseif($select_author == ""){
				if($select_date == "" ){
					$sql = "SELECT * FROM `tb_tj_awards`";
				}else{
					$sql = "SELECT * FROM `tb_tj_awards` WHERE date = {$select_date}";
				}
			}
			$query = mysqli_query($conn,$sql);
			$i = 0;
		    while($row=mysqli_fetch_array($query)){
		?>
		<tr>
		  <td><?php echo ++$i;?></td> 
		  <td><?php echo $row['prize'];?></td> 
		  <td><?php echo $row['pname'];?></td>
		  <td><?php echo $row['level'];?></td> 
		  <td><?php echo $row['pdate'];?></td> 
		  <td><?php echo $row['number'];?></td>
		  <td><?php echo $row['author'];?></td>
		  <td><?php echo $row['ranking'];?></td>
		  <td><?php echo $row['source'];?></td>
		  <td><?php echo $row['date'];?></td>
		  <td><?php echo $row['remarks'];?></td>
		</tr>
	<?php }?>
	</table>
</body>
</html>