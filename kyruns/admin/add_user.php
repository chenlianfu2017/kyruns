<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<?php include_once 'header_config.php';?>
<body>
	<div id="wrapper">
    <!-- Navigation -->
	<?php include "menu.php" ;?>
	<!--//Navigation-->
    <div id="page-wrapper">
		<!--Content-->
	    <div class="graphs">
		    <div class="row" style="padding-bottom:20px;">
				<div class="span12">
					<h3 class="text-center fontTitle">
						添加用户
					</h3>
				</div>
			</div>
			<div class="row" style="padding-left:15px; padding-right:15px;">
			<!--浏览时条件查询-->	
				<form name="formUser" method="post" action="doAddUser.php" class="form-inline" onsubmit="return checkPost();">
					<div class="form-group col-md-12" style="padding: 0 15px 0;">
						<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							<div class="panel-body no-padding">
								<div class="row">
									<span class="col-md-3">
										<label for="name">用户名：</label>
										<input name="username" style="height:30px;font-size:12px;line-height:0;border:1px solid #ccc;border-radius:3px;" type="text">
									</span>
									<span class="col-lg-3">
										<label for="name">密码：</label>
										<input name="password" style="height:30px; font-size:12px;line-height:0;border:1px solid #ccc;border-radius:3px;" type="text">
										<!-- <input type="submit" class="btn btn-default btn-sm btn-block" onclick="out()" value="导出">  -->
									</span>
									<span class="col-lg-3">
										<label for="name">姓名：</label>
										<input name="name" style="height:30px; padding: 5px 5px;font-size:12px;line-height:0;border:1px solid #ccc;border-radius:3px;" type="text">
									</span>
									<span class="col-lg-2" style="padding:0;margin:0;">
										<label for="name">性别：</label>
										<select name="sex" class="input-sm" id="sex"  style="border:1px solid #ccc;">
											<option value=""></option>
											<option value="男">&nbsp;&nbsp;男</option>
											<option value="女">&nbsp;&nbsp;女</option>
										</select>
		 							</span>
		 							<span class="col-lg-1">
		 								<input class="btn btn-sm btn-info pull-right" style="margin-right:5px;" type="submit" name="submit" value="添加" >
									</span>
								</div>
							</div>
						</div>
					</div>
				</form>					
				<div class="form-group col-md-12" style="padding: 0 15px 0;">
					<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
						 <div class="panel-body no-padding">
							 <form role="form" name="form2" enctype="multipart/form-data" method="post" action="add_user_up.php" >
				                 <div class="row pull-right" style="padding-right:20px;">
				                 	<h4 style="padding-top:5px; font-size:15px;display:inline;"> Excel表格导入：</h4>
				                 	<input id="photoCover" name="tmp_name" type="file" class="input-small" style="display:inline;width:225px;">
				                 	<input type="submit" name="submit" class="btn btn-sm btn-info" value="导入" style="margin-left:60px;display:inline;"/>
				                 </div>
							 </form>
						 </div>					
					</div>
				</div>		
			</div><!--//Content -->
			<!--footer-->
			<?php include_once 'footer.php';?>
			<!--//footer-->
		</div><!-- //graphs -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<?php include "message.php";?>
<!-- 判空函数 -->
<script type="text/javascript">
function checkPost(){
	if(formUser.username.value==''){
		alert('请填写用户名');
		formUser.username.focus();
		return false;
		}
	if(formUser.password.value==''){
		alert('请为用户指定初始密码');
		formUser.password.focus();
		return false;
		}
	if(formUser.name.value==''){
		alert('请填写用户真实姓名');
		formUser.name.focus();
		return false;
		}
	if(formUser.sex.value==''){
		alert('请选择用户性别');
		formUser.sex.focus();
		return false;
	}
}
	$('input[id=lefile]').change(function() {
		$('#photoCover').val($(this).val());
	});
</script>
</body>
</html>