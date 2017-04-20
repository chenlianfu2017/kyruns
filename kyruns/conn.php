<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
$conn=mysqli_connect('localhost','root','root','db_research') or die("数据库连接失败！");
mysqli_query($conn,"set names utf8");
define('ALL_PS',"JChome");
//error_reporting(0);
//判断用户权限
function user_shell($uid,$shell){
	$conn=mysqli_connect('localhost','root','root','db_research');//连接数据库
	$sql="select * from user_list where `uid` = '$uid'";
	$query=mysqli_query($conn,$sql);
	$us=is_array($row=mysqli_fetch_array($query));
    $shell=$us?$shell==md5($row[username].$row[password].ALL_PS):FALSE; 
  if($shell){
    	return $row;
  }else{
  	  echo "<script>alert('无权访问，请先登录!');window.location.href='index.php'</script>";
  	  exit();
  	   }
}
//判断登录时间
function user_mktime($onlinetime){
	$new_time=time();//当前最新时间
	if($new_time-$onlinetime>'1800'){	
	echo"<script>alert('登陆超时，请重新登陆!');window.location.href='index.php'</script>";
    exit();
	session_destroy();
	}else{
    	$_SESSION[times]=time();//用户界面只要有操作就会触发 mktime()系统函数
    }
}
?>
