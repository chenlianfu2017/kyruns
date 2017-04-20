<?php 
	include_once 'conn.php';
	//user_shell($_SESSION['uid'],$_SESSION['user_shell']);
	//user_mktime($_SESSION['times']);
	
	$sql1="select * from user_admin ";
	$query1=mysqli_query($conn,$sql1);
	$ucount=mysqli_num_rows($query1);
	$info1=mysqli_fetch_array($query1);
	$username=$info1['username'];
	$sql2="select * from tb_declare";
	$query2=mysqli_query($conn,$sql2);
	$acount=mysqli_num_rows($query2);
	$sql3="select * from tb_cost";
	$query3=mysqli_query($conn,$sql3);
	$tcount=mysqli_num_rows($query3);
	$sql4="select * from tb_tj_theses";
	$query4=mysqli_query($conn,$sql4);
	$lcount=mysqli_num_rows($query4);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>后台管理系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"><!--指定页面是否支持缩放-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Nav CSS -->
	<link href="css/custom.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/lines.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--webfonts
	<link href='fonts/webfont.ttf' rel='stylesheet' type='text/css'>
	-->
	<!--jquery JS-->
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<div id="wrapper">
		<!-- Navigation-->
        <?php include "menu.php";?>
		<!--//Navigation-->
		<div id="page-wrapper">
			<div class="graphs">
				<div>
				  <div >
				    <div class="row" style="padding-bottom:20px;">
				      <div class="span12">
					    <h3 class=" fontTitle" style="padding-left: 60px;">
							管理首页
						</h3>
					  </div>
				    </div>	
				    <small>
				      <font color="#333" style="padding-left:60px;">管理员，欢迎您登陆后台</font>
				    </small>
				  </div><br/>
				  <div class="tip" style="padding-left: 60px;">您好，<font color="#FF0000"><?php echo ($info1[name]);?></font>&nbsp;老师&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您当前登录时间为:&nbsp;&nbsp;<font color="#FF0000"><?php date_default_timezone_set('PRC'); echo date("Y-m-d H:i:s");?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;登录IP为:&nbsp;&nbsp;<font color="#FF0000"><?php $ip=$_SERVER["REMOTE_ADDR"]; echo ($ip); ?></font></div>
				</div><br/>
				<div class="page_main">
				<h3 style="padding-left: 50px;">基本信息</h3><br/>
				  <div class="page_table table_list" style="padding-left: 60px;">
				    <table style="width:100%; border:0px; cellspacing:0; cellpadding:0;">
				      <tr>
				        <td width="120">当前管理员登录名: </td>
				        <td width="250"><?php echo $username;?><a href="modify_admin.php?username=<?php echo $username?>" style="margin-left:10%">修改账户</a></td>
				        <td width="120">服务器时间: </td>
				        <td><font color="red"><?php echo date("Y-m-d G:i T",time());  ?></font></td>
				      </tr>
				      <tr>
				      	<td width="120">用户数: </td>
				        <td><span><font color="red"><?php echo ($ucount);?></font>
				        <a href="scan_user.php" style="margin-left:10%">用户管理</a></span></td>
				        <td width="120">项目申报总数: </td>
				        <td width="250"><font color="red"><?php echo ($acount);?></font><a href="scan_declare.php" style="margin-left:10%">项目申报管理</a></td>
				      </tr>
				      <tr>
				        <td width="120">费用报销数: </td>
				        <td width="250"><font color="red"><?php echo($tcount);?></font><a href="scan_cost.php" style="margin-left:11%">费用报销管理</a></td>
				        <td width="120">论文统计总数: </td>
				        <td width="250"><font color="red"><?php echo($lcount);?></font><a href="scan_tj_theses.php" style="margin-left:11%">论文统计管理</a></td>
				      </tr>
				    </table>
				  </div>
				</div>
			</div><!-- //graphs -->
			<!--//Content-->
			
			<!--footer-->
			<?php include_once 'footer.php';?>
			<!--//footer-->
		</div><!-- //page-wrapper -->
    </div><!--//wrapper  -->
    <?php include "message.php"?>	
	<!--bootstrap  JS -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>