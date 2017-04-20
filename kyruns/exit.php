<?php
session_start();
$_SESSION['user_shell'] = '';
session_destroy();
header("location:index.php");
?>