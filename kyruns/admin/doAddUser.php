<?php  
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

$username=$_POST['username'];  
$password=md5($_POST[password].ALL_PS);
$name = $_POST['name'];
  
$sex=$_POST['sex'];  
//var_dump($remark);
if($username==""|| $password==""){  
    echo"<script>alert('用户名或者密码不能为空');window.location.href='add_user.php';</script>";  
}else{  
	$sql= "select  * from user_list where username ='$username'";
	$result = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($result);
    if($num){
    	echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
    }
    else {		
    	$sql = "INSERT INTO `user_list`( `uid`, `username`, `password`,`name`, `sex`) VALUES ('','$username','$password','$name','$sex')";
    	$query = mysqli_query($conn,$sql);
         
        if(!$query){
            echo"<script>alert('注册失败');window.location.href='add_user.php';</script>"; 
        }else{
            echo"<script>alert('注册成功');window.location.href='add_user.php';</script>"; 
        } 
    } 
}  
?>  