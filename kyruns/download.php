<?php 
header("content-type:text/html;charset=utf-8");
$file_name=$_GET['filename'];

if(!file_exists($file_name)){
	echo "<script>alert('NOT FOND');window.close();</script>";
}else{
	$file=fopen($file_name,"r");
	Header("Content-type:application/octet-stream");
	Header("Accept-Ranges:bytes");
	Header("Accept-Length:".filesize($file_name));
	Header("Content-Disposition:attachment;filename=".$file_name);
	echo fread($file,filesize($file_name));
	fclose($file);
	echo "<script>alert('下载完成');window.location.href='scan_declare.php';</script>";
	exit();
}

?>