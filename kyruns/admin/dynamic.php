<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<title>科研后台管理系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="keywords" content="河北北方学院，科研管理系统，科研统计，科研管理"/>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	 <!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css'/>
	<link href="css/font-awesome.css" rel="stylesheet" type='text/css'> 
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script> 
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Nav CSS -->
	<link href="css/custom.css" rel="stylesheet" type='text/css'>
    <!-- Editor CSS-->
	<!-- <link rel="stylesheet" href="css/min.css" type='text/css'/> -->
	<link rel="stylesheet" href="./editor/themes/default/default.css" type='text/css'/>
	<link rel="stylesheet" href="./editor/plugins/code/prettify.css" type='text/css'/>
	<!--//Editor CSS  -->
	<style type="text/css">
		.fontTitle{
			color:#5f615f;
		}
		.star{
			color:#FF0000;
		}
		.huang{
		    color:#e67e22;
		}
	</style>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation-->
        <?php include "menu.php";?>
		<!--//Navigation-->
        <div id="page-wrapper" style="background-color:#f2f4f8">
			<div class="graphs">
				<!--Content-->
				<!-- 成果发布 -->
				<div class="row" style="padding-bottom:20px;">
				    <div class="row col-md-2"></div>			
				    <div id="content" style="margin:0;" class="row col-md-8">
					    <div class="row" style="padding-bottom:15px; padding-top:0px;">
						    <div class="span12">
							    <h3 class="text-center fontTitle" style="font-size:23px;color:#85CDFF;">
								     科研成果发布
							    </h3>
						    </div>
						    <hr style="background-color:#bce8f1;height:1px;border:none; width:100%;">
					    </div>
	                    <!-- //此处添加 php 上传文件 -->
					    <div class="row-fluid col-md-12">
						    <form class="form" role="form" name="myform" action="doUpload.php" method="POST" enctype="multipart/form-data" onSubmit="return CheckPost()">
						         <div class="form-group">
						    	     <label for="name" class="fontTitle" style="font-size:15px;">标题 ：</label>
						    	     <input name="dtitle" type="text" style="width:250px; height:24px; padding:2px;font-size:12px;line-height:2;border:1px solid #ccc;border-radius:3px;"/>
						         </div>
						         <div class="form-group">
						             <label for="name" class="pull-left fontTitle" style="font-size:15px;width:auto;">图片 ：</label>
						             <input name="dpath" type="file" id="inputfile" class="pull-left fontTitle" style="font-size:12px;margin-left:5px;width:250px;height:22px;"/>
						         </div>
						         <div class="form-group" style="clear:both; padding-top:10px;">
						   		     <label for="name" class="fontTitle" style="padding-bottom:5px;font-size:15px;">内容 ：</label><br/>
								     <textarea name="content" style="width:700px;height:200px;visibility:hidden;">
								     <?php echo htmlspecialchars($htmlData); ?></textarea>
						         </div>
						         <div class="col-lg-3" style="margin-left:0;padding-left:0;"> 
								    <input type="submit" name="submit" value="添加" class="btn btn-warning btn-sm btn-block">
							     </div>
						   </form>
					    </div>
				    </div>
	                <!-- //成果发布 -->
				    <!--//Content -->
				</div>
				<!--footer-->
			    <?php include_once 'footer.php';?>
			    <!--//footer-->
			</div><!-- //graphs -->
        </div><!--//#page-wrapper -->
    </div><!-- //#wrapper -->
<!-- Editor JS -->
<script src="js/jquery-ui.min.js"></script>
<!-- <script src="js/min.js"></script> -->
<script charset="utf-8" src="./editor/kindeditor.js"></script>
<script charset="utf-8" src="./editor/lang/zh_CN.js"></script>
<script charset="utf-8" src="./editor/plugins/code/prettify.js"></script>
<script src="js/main.js"></script>
<script>
	KindEditor.ready(function(K) {
		var editor1 = K.create('textarea[name="content"]', {
			cssPath : './editor/plugins/code/prettify.css',
			uploadJson : './editor/php/upload_json.php',
			fileManagerJson : './editor/php/file_manager_json.php',
			allowFileManager : true,
			afterCreate : function() {
				var self = this;
				K.ctrl(document, 13, function() {
					self.sync();
					K('form[name=example]')[0].submit();
				});
				K.ctrl(self.edit.doc, 13, function() {
					self.sync();
					K('form[name=example]')[0].submit();
				});
			}
		});
		prettyPrint();
	});
</script>
<SCRIPT>
	function CheckPost(){
		if (myform.dtitle.value==""){
			alert("项目名称不能为空！");
			myform.dtitle.focus();
			return false;
		}
		if (myform.dcontent.value==""){
			alert("请填写内容！");
			upform.dcontent.focus();
			return false;
		}
	}
</SCRIPT>
<!-- //Editor JS -->
</body>
</html>