<?php
/*
 * 这是一个引入文件 
 *
 */
header ( "Content-Type: text/html;charset=utf-8" );
//根据获取的id 读取对应条目的详细信息
if($_POST['submit']){
	$uid = $_SESSION['uid'];
	$title = $_POST['mtitle'];
	$content = $_POST['mcontent'];
	$status = 1;
	
	$sql = "INSERT INTO `db_research`.`tb_message`(`mid`, `uid`, `mtitle`, `mcontent`, `mstatus`, `mtime`)values('', '$uid', '$title', '$content', '$status', now())";
	$query = mysqli_query($conn,$sql);
	
	if($query==true){
		echo "<script>alert('意见已提交，等待管理员处理！');window.close();</script>";
	}else{
		echo "<script>alert('提交失败，稍后请重试！');window.location.href='main.php';</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>联系管理员</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	<style type="text/css">
	.fontTitle{
		color:rgb(133,205,295);
	}
	.star{
		color:#FF0000;
	}
	.huang{
	    color:#e67e22;
	}
	.selectTimer{
	
	}
	.div1{
	    
	    margin-top:25px;
        font-size:15px;
        position:absolute;
        top:13px;
	}
	
    </style>
</head>
<body style="background-color:rgb(235,235,235);">
	<div  class="container-fluid" style="width:685px;margin-top:20px;background-color:white;margin-bottom:20px;border-radius:7px;border:1px solid #afb4b5;">	
		<div class="col-md-2"></div>		
		<div class="col-md-5" style="background-color:rgb(255,255,255);">
		    <div class="row-fluid" style="padding-top:18px;">
				<div class="span12">
					<h3 class="text-center fontTitle">
						用户意见反馈
					</h3>
				</div>
				<hr>
			</div>
			<form role="form" style="padding-top:15px;padding-left:70px;" action="" enctype="multipart/form-data" method="post" name="myform" onsubmit="return CheckPost();">
				<div class="form-group col-lg-12">
				    <label for="name" class="fontTitle">意见主题</label>
				    <input type="text"style= "width:480px;" class="form-control input-sm" id="name1"  name="mtitle">
			    </div>
			    <div class="form-group col-lg-12">
				    <label for="name" class="fontTitle">主要内容</label>
				    <textarea  style= "width:480px;height:150px;"class="form-control input-sm" id="name4"  name="mcontent"></textarea>
				</div>
				<div class="form-group col-lg-12"style="padding-left:15px; padding-right:0;padding-top:20px;padding-bottom:50px;">
					<span class="col-lg-6">
					   <input type="submit" class="btn btn-primary btn-sm btn-block" style="border:0px;width:480px;height:30px;background-color:#5bc0de;"name="submit" value="提交">
					</span>
				</div>		    			    
			</form>
		</div>
	</div>
	<script type="text/javascript" src="jquery/jquery.min.js" ></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>