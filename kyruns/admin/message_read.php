<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>科研统计</title>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
	<!-- Custom CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Nav CSS -->
	<link href="css/custom.css" rel="stylesheet">
		<style>
		    body{
		    	background-color:rgb() ;
		    }
			h3{
				font-size: ;
				color:#65cfe5;
			}
			hr{
				background-color:#65cfe5;
				height:1px;
				border:none;
				width:80%;
			}
			.style1{
			    border-radius:5px;
			    padding:10px 40px;
			    width:650px;
			    height:50px;
			    font-size:18px;
			    color:#65cfe5;
			    background-color:#fcf8e3;
			}
			.style2{
			    padding:20px 110px;
			    width:650px;
			    height:60px;
			    font-size:14px;
			    background-color:#f2dede;
			    border-radius:5px;
			}
			.style3{
			    padding:20px 110px;
			    width:650px;
			    height:60px;
			    font-size:14px;
			    background-color:#dff0d8;
			    border-radius:5px;
			}
			.style4{
			    padding:20px 110px;
			    width:650px;
			    height:260px;
			    font-size:14px;
			    background-color:#dff0d8;
			    border-radius:5px;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid" style="width:685px;margin-top:20px;margin-bottom:20px;border-radius:7px;border:1px solid #afb4b5;">
			<div class="row-fluid"><br/><br/>
				<div class="span12">								
					<h3 class="text-center">
						用户意见反馈表所有详情
					</h3>
				</div>
			</div><br/>
			<hr>
			<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
		        <div class="panel-body no-padding">		
		            <form name="form1" method="get">
		                 <table class="table">
				              <thead>
					              <tr>
						            <th>#</th>
						            <th>意见主题</th>
						            <th>意见内容</th>
						            <th>时间</th>
					              </tr>
				              </thead>
				              <tbody><!--tbody中为要循环输出的内容  -->
			                <?php 
			               
			                //根据获取的id 读取对应条目的详细信息
			                $sql = "SELECT * FROM tb_message";
			                $result = mysqli_query($conn,$sql);
			                $col1 = "active";	    //设置记录行背景颜色为白色
							$col2 = "success";//设置记录行背景颜色为灰色
							$col = $col2;
								while($row = mysqli_fetch_array($result)){
								if($col == $col1){
									$col = $col2;
								}else{
									$col = $col1;
								}
								
								$id = $row['mid'];//当前行id
								$title = $row['mtitle'];
								$content = $row['mcontent'];
								$mtime = $row['mtime'];
								?>
								<tr class="<?php echo $col;?>" >
									<td></td>
					                <td><?php echo $title;?></td>
					                <td><?php echo $content;?></td>
					                <td><?php echo $mtime;?></td>	
					            </tr>
							    <?php
									}
								?>
						           </tbody>
				                </table>
				            </form>	
				        </div>
			<div class="row-fluid">
				<div class="span5">
				</div>
				<div class="span5">
				</div>
			</div>
			<hr style="width:98%;">
			<div class="span2">
				<a class="btn btn-sm" href="javascript:history.go(-1);" style="margin-left:570px;margin-bottom:30px;background-color: #5bc0de;color:#ffffff;" type="button">返回</a>
			</div>
		</div>
	</div>
	</body>
</html>