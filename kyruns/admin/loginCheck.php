<?php
include_once 'conn.php';
if(isset($_POST['submit'])){
// 判断用户名
  $username=str_replace(" ","",$_POST['username']);//用户名空格的过滤，本身的用户名不允许有空格
  $sql="select * from user_admin where `username`='$username'";
  $query=mysqli_query($conn,$sql);//mysql_query()函数，向数据库发送查询
  $us=is_array($row=mysqli_fetch_array($query));//判断数组，返回布尔值，如果该用户名存在则进行一下操作
// 判断密码
  $ps=$us?md5($_POST[password].ALL_PS)==$row[password]: FALSE;
  if($ps){//如果用户名和密码均正确，则进行将用户名和密码存储到session中
    $_SESSION['uid']=$row[uid];
    $_SESSION['user_shell']=md5($row[username].$row[password].ALL_PS);
    $_SESSION['times']=time();//登陆成功时记录登陆时的时间
    echo "<script>window.location.href='main.php'</script>";
  }else{
    echo"<script>alert('用户名或密码错误！');window.location.href='index.php'</script>";
    session_destroy();
       }
}
?>
