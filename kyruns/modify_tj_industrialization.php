<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

//获取修改数据
if(is_numeric($_GET['industry_id']) && $_GET['industry_id']<>''){
	$industry_id=$_GET['industry_id'];
	$sql = "SELECT * FROM `tb_tj_industry` WHERE uid={$_SESSION['uid']} AND `id` = {$industry_id}";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	if($row==''){
		echo "<script>alert('非法操作');window.location.href='scan_tj_industrialization.php'</script>";
	}
}else{
	echo "<script>alert('未选中任何修改项');window.location.href='scan_tj_industrialization.php'</script>";
}
//执行修改
if($_POST['submit']){
	$id = $_POST['id'];
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$wname = $_POST['wname'];
	$uname = $_POST['uname'];
	$link = $_POST['link'];
	$introduction = $_POST['introduction'];
	$remarks = $_POST['remarks'];
	$sql = "UPDATE `tb_tj_industry` SET uid='$uid', date='$date', wname='$wname', uname='$uname', link='$link', introduction='$introduction', remarks='$remarks' where id = {$id}";
	$query = mysqli_query($conn,$sql);

	if($query==true){
		echo "<script>alert('信息修改成功！');window.location.href='scan_tj_industrialization.php';</script>";
	}else{
		echo "<script>alert('修改失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='scan_tj_industrialization.php';</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

	<!--导航栏-->
	<?php include_once 'menu.php';?>
	<!--导航栏 end-->
	
	<!--表单-->
	<div class="row" style="padding-top:15px;">
		<div class="col-md-2"></div>
		<div class="col-md-5" style="background-color:rgb(255,255,255);margin-right:30px;">
			<form role="form" style="padding-top:15px;" action="modify_tj_industrialization.php" method="post" name="myform" onsubmit="return CheckPost();">
				<div class="row-fluid col-md-12">
					<div class="form-group col-md-3" style="padding-top:18px;padding-left:20px;">
					   <select class="form-control input-sm" name="year">
					     <option value="<?php echo $row['date']?>"><?php echo $row['date']?></option>
					     <option value=""></option>
					     <option value="2015">2015</option>
						 <option value="2016">2016</option>
						 <option value="2017">2017</option>
						 <option value="2018">2018</option>
						 <option value="2019">2019</option>
						 <option value="2020">2020</option>
						 <option value="2021">2021</option>
						 <option value="2022">2022</option>
						 <option value="2023">2023</option>
						 <option value="2024">2024</option>
						 <option value="2025">2025</option>
						 <option value="2026">2026</option>
						 <option value="2027">2027</option>
						 <option value="2028">2028</option>
						 <option value="2029">2029</option>
						 <option value="2030">2030</option>
						 <option value="2031">2031</option>
						 <option value="2032">2032</option>
						 <option value="2033">2033</option>
						 <option value="2034">2034</option>
						 <option value="2035">2035</option>
						 <option value="2036">2036</option>
						 <option value="2037">2037</option>
						 <option value="2038">2038</option>
						 <option value="2039">2039</option>
						 <option value="2040">2040</option>
						 <option value="2041">2041</option>
						 <option value="2042">2042</option>
						 <option value="2043">2043</option>
						 <option value="2044">2044</option>
						 <option value="2045">2045</option>
						 <option value="2046">2046</option>
						 <option value="2047">2047</option>
						 <option value="2048">2048</option>
						 <option value="2049">2049</option>
						 <option value="2050">2050</option>
						 <option value="2051">2051</option>
						 <option value="2052">2052</option>
					   </select>
					   </div>
					   <div class="span12 col-md-9" style="padding-left:3px;padding-right:0;">
						   <h3 class="text-left fontTitle">
								年&nbsp;-&nbsp;作品产品化情况统计
						   </h3>
					   </div>
					   <div class="col-lg-12" style="margin-top:-25px;">
						   <hr align="left" style="width:18%;">
						   <hr style="height:1px;background-color:#DA6426;border:none;width:64%;margin-top:-21px;">
						   <hr align="right" style="width:18%;margin-top:-21px;">
					   </div>
				</div>
				
			    <div class="row" style="padding:10px 0 0;"></div><!-- 上下块间距 -->
			
				<input type="hidden"  class="form-control input-sm" id="id"  name="id" value="<?php echo $row['id'];?>">
				<div class="form-group col-lg-8 col-md-8">
				  <label for="name" class="fontTitle">作品名称（<span class="fontStar">※</span>必填）</label>
				  <input type="text" class="form-control input-sm" id="name1" placeholder="" name="wname" value="<?php echo $row['wname'];?>">
			    </div>
			    <div class="form-group col-lg-8 col-md-8" style="padding-top:3px;">
				  <label for="name" class="fontTitle">上传市场名称<span class="fontStar">※</span></label>
				  <input type="text" class="form-control input-sm" id="name2" placeholder="" name="uname" value="<?php echo $row['uname'];?>">
			    </div>
			    <div class="form-group col-lg-8 col-md-8" style="padding-top:3px;">
				  <label for="name" class="fontTitle">上传市场链接</label>
				  <input type="text" class="form-control input-sm" id="name3" placeholder="" name="link" value="<?php echo $row['link'];?>">
			    </div>
			    <div class="form-group col-lg-12 col-md-12" style="padding-top:5px;">
			      <label for="name" class="fontTitle">作品简介<span class="fontStar">※</span></label>
				  <textarea class="form-control" rows="5" name="introduction"><?php echo $row['introduction'];?></textarea>
			    </div>
				<div class="form-group col-lg-12 col-md-12" style="padding-top:5px;">
			      <label for="name" class="fontTitle">备注：</label>
				  <textarea class="form-control" rows="5" name="remarks"><?php echo $row['remarks'];?></textarea>
			    </div>
				<div class="col-lg-12"style="padding:15px 0 36px;">
					<span class="col-lg-6 col-md-6">
					  <button type="submit" name="submit" class="btn btn-warning btn-sm btn-block">保存修改</button>
					</span>
					<span class="col-lg-6 col-md-6">
					  <button type="reset" class="btn btn-warning btn-sm btn-block">重置</button>
					</span><br><br><br>
					<div class="text-center fontStar">_________________________________________________</div>
				</div>
			</form>
		</div>
		<!--右侧 col-lg-3列 -->
		<?php include_once 'nav_right.php';?>
		<!--//右侧 col-lg-3列 -->
		<div class="col-md-2"></div>
	</div>
	
	<!--表单 end-->
	
	<!--Footer start-->
	<?php include_once 'footer.php';?>
	<!--Footer end-->
</div>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
    function viewAll(){
	    window.location.href='scan_tj_industrialization.php';
    }
    function look(){
        document.formyear.action='scan_tj_industrialization.php';
    }
    function CheckPost(){
        if(myform.year.value==""){
            alert("请选择年份");
            myform.year.focus();
            return false;
            }
    	if (myform.wname.value=="")
    	{
    		alert("作品名称不可为空");
    		myform.wname.focus();
    		return false;
    	}
    	if (myform.uname.value=="")
    	{
    		alert("上传市场名称名称不可为空");
    		myform.uname.focus();
    		return false;
    	}
    	if (myform.introduction.value=="")
    	{
    		alert("作品简介不可为空");
    		myform.introduction.focus();
    		return false;
    	}
    }
    </script>
  </body>
</html>