<?php
function uploadFile($fileInfo, $uploadPath = 'uploads' , $allowExt = array('jpg','JPG','jpeg','JPEG','bmp','BMP','png','PNG','gif','GIF','doc','docx','pdf','rtf'), $flag = true, $maxSize = 3145728) {
	// 判断错误号
	if ($fileInfo ['error'] > 0) {
		switch ($fileInfo ['error']) {
			case 1 :
				$mes = '上传的文件超过了php配置文件中upload_max_filesize选项的值';
				break;
			case 2 :
				$mes = '超过了表单max_file_size限制的大小';
				break;
			case 3 :
				$mes = '文件部分被上传';
				break;
			case 4 :
				$mes = '没有选择上传的文件';
				break;
			case 6 :
				$mes = '没有找到临时目录';
				break;
			case 7 :
			case 8 :
				$mes = '系统错误';
				break;
		}
		exit ( $mes );
	}
	$ext = pathinfo ( $fileInfo ['name'], PATHINFO_EXTENSION ); // 规定文件扩展名上传的文件类型
	// $allowExt=array('jpg','jpeg','png','gif');//规定文件允许上传的格式
	if (! is_array ( $allowExt )) {
		exit ( '系统错误' );
	}
	// 检测上传文件的类型
	if (! in_array ( $ext, $allowExt )) {
		exit ( '非法文件类型' );
	}
	// 检测上传文件的大小是否符合规范
	if ($fileInfo ['size'] > $maxSize) {
		exit ( '上传文件过大' );
	}
	// 检测图片是否为真实的图片类型
	/* if ($flag) {
		if (! getimagesize ( $fileInfo ['tmp_name'] )) {
			exit ( '不是真实图片类型' );
		}
	} */
	// 检测文件是否是通过HTTP POST方式提交上来的
	if (! is_uploaded_file ( $fileInfo ['tmp_name'] )) {
		exit ( '文件不是通过HTTP POST方式进行上传' );
	}
	// 上传图片保存路径
	if (! file_exists ( $uploadPath )) {
		mkdir ( $uploadPath, 0777, true ); // 可读可写可执行
		chmod ( $uploadPath, 0777 );
	}
	$uniName=date('YmdHis',time()).'.'.$ext;//重命名文件
	//$uniName = md5 ( uniqid ( microtime ( true ), true ) ) . '.' . $ext;
	$destination = $uploadPath . '/' . $uniName;
	if (! @move_uploaded_file ( $fileInfo ['tmp_name'], $destination )) {
		exit ( '文件移动失败' );
	}
	return $destination;
}

?>