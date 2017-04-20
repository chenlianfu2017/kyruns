<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

//set_time_limit(0); //脚本不超时 
/*
 * 上传文件
 */
if(is_uploaded_file($_FILES['tmp_name']['tmp_name'])){
	$upfile=$_FILES["tmp_name"];
	$name=$upfile["name"];
	$type=$upfile["type"];
	$size=$upfile["size"];
	$tmp_name=$upfile["tmp_name"];
	$error=$upfile["error"];
	
    $type = substr($name, strrpos($name, ".") + 1);//获取文件类型   
    $name=date('YmdHis',time()).".".$type;//文件重命名
    $fileType = array('xlsx','xls');//将可能的文件类型定义为一个数组
    $countArray = count($fileType); 
    
    //判断该类型是否在数组中存在
    //循环的方法,支持$fileType数组中所有类型的文件
    $yes=0;
    for($i=0;$i<=$countArray;$i++){
    	if($type == $fileType[$i]){
    	   $yes = 1;
     	}
     }
    if($yes == 1){
    	move_uploaded_file($tmp_name,'../upload/Excel/'.$name);//将文件上传到本地的文件夹中
    	$inputFileName ='../upload/Excel/'.$name ; 		
    }else{
    	return 2;
    }
}
/** Include path **/
//set_include_path(get_include_path() . PATH_SEPARATOR . 'http://www.jb51.net/../Classes/');//设置环境变量 

/** PHPExcel_IOFactory */
include '../PHPExcel/PHPExcel/IOFactory.php'; 

/*
 	判断文件后缀名
*/
	if($type == "xls"){
		$inputFileType = 'Excel5';    //这个是读 xls的    
		//$inputFileName = './adm.xls'; 
	}
   	else{
		if($type == "xlsx"){
			$inputFileType = 'Excel2007';//这个是计xlsx的
   			//$inputFileName = './nicai.xlsx'; 
   		}else{
   			echo "请导入后缀名为xls或xlsx的文件";
   		}
   	}
    // echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />'; 
    $objReader = PHPExcel_IOFactory::createReader($inputFileType); 
    $objPHPExcel = $objReader->load($inputFileName); //读取文件
    /* 
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); //取得总行数 
    $highestColumn = $sheet->getHighestColumn(); //取得总列 
    */    
    $objWorksheet = $objPHPExcel->getActiveSheet();//取得总行数 
    $highestRow = $objWorksheet->getHighestRow();//取得总列数 

    //echo 'highestRow='.$highestRow; 
    $highestColumn = $objWorksheet->getHighestColumn(); 
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数 
    $headtitle=array(); 
    for ($row = 1;$row <= $highestRow;$row++){ 
        $strs=array(); 
        //注意highestColumnIndex的列数索引从0开始 
        for ($col = 0;$col < $highestColumnIndex;$col++){  
            $strs[$col] =$objWorksheet->getCellByColumnAndRow($col, $row)->getValue(); 
        }  
        $info = array( 
        	'username'=>"$strs[0]", 
            'password'=>"$strs[1]", 
            'name'=>"$strs[2]", 
        	'sex'=>"$strs[3]", 
        ); 
        //在这儿，你可以连接，你的数据库，写入数据库了 
		//$username = $info[username];
		@$password = md5($info[password].ALL_PS);
		//$name = $info[name];
		//$sex = $info[sex];              
        $sql = "INSERT INTO `user_list`(`uid`, `username`, `password`, `name`, `sex`) VALUES ('','$info[username]','$password','$info[name]','$info[sex]')";
   		$query = mysqli_query($conn,$sql); 
   		if(!$query){   
            echo"<script>alert('注册失败，请重新尝试或联系管理员！');window.location.href='add_user.php'</script>"; 
        }else{  
        	if($row == $highestRow){
            echo"<script>alert('导入成功！');window.location.href='add_user.php'</script>"; 
        	}
        } 
    } 
?>
<script type="text/javascript">
	$('input[id=lefile]').change(function() {
    	$('#photoCover').val($(this).val());
    });
</script>