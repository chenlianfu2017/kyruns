<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);//获取要修改的数据

if($_GET){
	$id= $_GET['uid'];
	$sql = "SELECT * FROM `user_list` WHERE uid = '$id'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
}

//执行修改
if($_POST['submit']){
	$username = $_POST['username'];
	$password = md5($_POST['password'].ALL_PS);
	$name = $_POST['name'];
	$sex = $_POST['sex'];
	$sql2 = "UPDATE `user_list` SET username='$username', password='$password', name='$name', sex='$sex' WHERE uid = '$id'";
	$query = mysqli_query($conn, $sql2);
	if($query==true){
		echo "<script>alert('信息修改成功！');window.location.href='scan_user.php';</script>";
	}else{
		echo "<script>alert('修改失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='scan_user.php';</script>";
	}
}
?>

<!DOCTYPE html>
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
							修改用户信息
						</h3>
					</div>
				</div>
				<div class="row" style="padding-left:15px; padding-right:15px;">
				<!--浏览时条件查询-->	
					<form name="formUser" method="post" action="" class="form-inline" onsubmit="return checkPost();">
						<div class="form-group col-md-12" style="padding: 0 15px 0;">
							<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
								<div class="panel-body no-padding">
									<div class="row">
										<span class="col-md-3">
											<label for="name">用户名：</label>
											<input name="username" value="<?php echo $row['username'];?>"style="height:30px;font-size:12px;line-height:0;border:1px solid #ccc;border-radius:3px; width:130px;" type="text">
										</span>
										<span class="col-lg-3">
											<label for="name">密码：</label>
											<input name="password" value="" style="height:30px; font-size:12px;line-height:0;border:1px solid #ccc;border-radius:3px; width:140px;" type="text">
										</span>
										<span class="col-lg-3">
											<label for="name">姓名：</label>
											<input name="name" value="<?php echo $row['name'];?>"style="height:30px; padding: 5px 5px;font-size:12px;line-height:2;border:1px solid #ccc;border-radius:3px; width:140px;" type="text">
										</span>
										<span class="col-lg-3">
											<label for="name">性别：</label>
											<select name="sex" class="input-sm" id="sex"  style="width:140px;border:1px solid #ccc;">
												<option value="<?php echo $row['sex'];?>"><?php echo $row['sex'];?></option>
												<option value="男">&nbsp;&nbsp;男</option>
												<option value="女">&nbsp;&nbsp;女</option>
											</select>
			 							</span>
			 							<input class="btn btn-sm btn-info pull-right" style="margin-right:5px;" type="submit" name="submit" value="修改" >
									</div>
								</div>
							</div>
						</div>
					</form>					
				</div>
	  			
				<!--//Content -->
			
				<!--footer-->
				<?php include_once 'footer.php';?>
				<!--//footer-->
			</div><!-- //graphs -->
	    </div><!-- /#page-wrapper -->
	</div><!-- /#wrapper -->
<?php include "message.php";?>
<!-- 判空函数 -->
<script>
function checkPost(){
	if(formUser.username1.value==''){
		alert('请填写用户名');
		formUser.username1.focus();
		return false;
		}
	if(formUser.password1.value==''){
		alert('请为用户指定初始密码');
		formUser.password1.focus();
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