<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>科研管理系统后台登陆</title><!--登陆界面-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	 <!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!----webfonts--->
	<link href='fonts/webfont.ttf' rel='stylesheet' type='text/css'>
	<!---//webfonts--->  
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
    <div class="login-logo">
<!-- 		<a href=""><img src="images/logo.png" alt=""/></a> -->
    </div>
		<h1 class="form-heading"style="text-align:center; color:#945e3a">科研管理系统后台登陆</h1>
    <div class="app-cam">
		<form role="form" name="userform" action="loginCheck.php" method="post" onsubmit="return CheckPost();">
			<input autocomplete="off" type="text" class="text" name="username" placeholder="账户">
			<input autocomplete="off" type="password" name="password" placeholder="密码">
			<div class="submit"><input type="submit" name="submit" value="登陆"></div>
		</form>
    </div>
   <div class="copy_layout login">
      <p>Copyright 2015-2016 <a href="http://172.18.69.203/miic/index.php" target="_blank">MIIC</a>© All Rights Reserved</p>
   </div>
   <script>
	function CheckPost(){
		if(userform.username.value==""){
			alert('请填写用户名');
			userform.username.focus();
			return false;
			}
		if(userform.password.value==""){
			alert('请输入密码');
			userform.password.focus();
			return false;
			}
		}
   </script>
</body>
</html>
