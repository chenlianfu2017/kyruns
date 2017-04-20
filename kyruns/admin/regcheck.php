<?php  
include_once 'conn.php';
$username=$_POST['username'];  
$password=md5($_POST[password].ALL_PS);
$pwd_again=md5($_POST[pwd_again].ALL_PS); 
  
$remark=$_POST['remark'];  
//var_dump($remark);
if($username==""|| $password=="")  
{  
    echo"<script>alert('用户名或密码不能为空');window.location.href='add_user.php';</script>";  
}else{  
    if($password!=$pwd_again)  
    {  
        echo"<script>alert('两次输入的密码不一致,请重新输入');window.location.href='add_user.php';</script>";  
    }else{
		$sql= "select * from user_list where username ='$username'";
		$result = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($result);
    	if($num){
    		echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
    	}else{
    		$sql = "INSERT INTO `user_list`( `uid`, `username`, `password`, `remark`) VALUES ('','$username','$password','$remark')";
    		$query = mysqli_query($conn,$sql);
	        if(!$query){   
	            echo"<script>alert('注册失败');window.location.href='add_user.php';</script>"; 
	        }else{  
	            echo"<script>alert('注册成功');window.location.href='add_user.php';</script>"; 
	        } 
    	}
    }  
}  
?>  