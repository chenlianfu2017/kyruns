<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

//获取修改数据
if(is_numeric($_GET['underpro_id']) && $_GET['underpro_id']<>''){
	$underpro_id=$_GET['underpro_id'];
	$sql = "SELECT * FROM `tb_tj_underpro` WHERE uid={$_SESSION['uid']} AND `id` = {$underpro_id}";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	if($row==''){
		echo "<script>alert('非法操作');window.location.href='scan_tj_underpro.php'</script>";
	}
}else{
	echo "<script>alert('未选中任何修改项');window.location.href='scan_tj_underpro.php'</script>";
}

//执行修改
if($_POST['submit']){

	if ($_POST['level'] == "其他：") {
		$_POST['level'] = $_POST['other'];
	}
	$id=$_POST['id'];
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$name = $_POST['name'];
	$number = $_POST['number'];
	$source = $_POST['source'];
	$cycle = $_POST['cycle'];
	$charge = $_POST['charge'];
	$funds = $_POST['funds'];
	$remarks = $_POST['remarks'];

	$sql = "UPDATE `tb_tj_underpro` SET uid='$uid', date='$date', name='$name', number='$number',source='$source',cycle='$cycle',charge='$charge',funds='$funds', remarks='$remarks' WHERE id = {$id}";  
	$query = mysqli_query($conn, $sql);
	if($query==true){
		echo "<script>alert('信息修改成功！');window.location.href='scan_tj_underpro.php';</script>";
	}else{
		echo "<script>alert('修改失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='scan_tj_underpro.php';</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
		
	<!--导航栏-->
	<?php include "menu.php";?>
	<!--导航栏 end-->
	
	<!--内容主体 begin-->
	<div class="row" style="padding-top:15px;">
		<div class="col-md-2"></div>
		<!--表单 begin-->
		
		<div class="col-md-5" style="background-color:rgb(255,255,255);margin-right:30px;">
			<form role="form" style="padding-top:15px;" action="modify_tj_underpro.php" method="post" name="myform" onsubmit="return CheckPost();">
				<div class="row-fluid col-md-12" style="padding-top:5px;">
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
					   <div class="span12 col-md-9" style="padding-left:3px;">
						   <h3 class="text-left fontTitle">
								年&nbsp;-&nbsp;教师承担科研项目统计
						   </h3>
					   </div>
				</div>
				
			    <div class="row" style="padding:15px 0 17px;"></div><!-- 上下块间距 -->
				
				<div class="form-group col-lg-8" style="padding-top:3px;">
				  <input type="hidden"  class="form-control input-sm" id="id"  name="id" value="<?php echo$row[id];?>">
				  <label for="name" class="fontTitle">课题名称（<span class="fontStar">※</span>必填）</label>
				  <input type="text" class="form-control input-sm" id="name1" placeholder="" name="name" value="<?php echo $row[name];?>">
			    </div>
			    <div class="form-group col-lg-8" style="padding-top:3px;">
				  <label for="name" class="fontTitle">课题编号（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name2" placeholder="" name="number" value="<?php echo $row[number];?>">
			    </div>
			    <div class="form-group col-lg-8" style="padding-top:3px;">
				  <label for="name" class="fontTitle">课题来源（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name3" placeholder="" name="source" value="<?php echo $row[source];?>">
			    </div>
			    <div class="form-group col-lg-8" style="padding-top:3px;">
				  <label for="name" class="fontTitle">项目周期（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name4" placeholder="" name="cycle" value="<?php echo $row[cycle];?>">
			    </div>
				<div class="form-group col-lg-8" style="padding-top:3px;">
				  <label for="name" class="fontTitle">课题负责人（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name4" placeholder="" name="charge" value="<?php echo $row[charge];?>">
			    </div>
				<div class="form-group col-lg-8" style="padding-top:3px;">
				  <label for="name" class="fontTitle">项目经费（万元）</label>
				  <input type="text" class="form-control input-sm" id="name4" placeholder="" name="funds" value="<?php echo $row[funds];?>">
			    </div>
				<div class="form-group col-lg-12" style="padding-top:2px;">
			      <label for="name" class="fontTitle">其他：</label>
				  <textarea class="form-control" rows="5" name="remarks"><?php echo $row[remarks];?></textarea>
			    </div>
				<div class="col-lg-12" style="padding:15px 0 55px">
					<span class="col-lg-6">
					  <button type="submit" name="submit" class="btn btn-warning btn-sm btn-block">保存修改</button>
					</span>
					<span class="col-lg-6">
					  <button type="reset"  class="btn btn-warning btn-sm btn-block">重置</button>
					</span>
				</div>
			</form>
		</div>
		
		<!--表单 end-->
		
		<!--右侧 col-lg-3列 begin -->
		<?php include_once 'nav_right.php';?>
		<!--右侧 col-lg-3列 end -->
		<div class="col-md-2"></div>
	</div>
	
	<!--内容主体 end-->
	
	<!--Footer start-->
	
	<?php include "footer.php";?>
	
	<!--Footer end-->
	
</div>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
    function viewAll(){
	    window.location.href='scan_tj_underpro.php';
    }
    function look(){
		document.formyear.action='scan_tj_underpro.php';
    }
    function CheckPost()
    {
        if(myfrom.year.value==""){
            alert("请选择统计时间");
            myform.year.focus();
            return false;
            }
    	if (myform.name.value=="")
    	{
    		alert("课题名称不可为空");
    		myform.name.focus();
    		return false;
    	}
    	if (myform.number.value=="")
    	{
    		alert("课题编号不可为空");
    		myform.number.focus();
    		return false;
    	}
    	if (myform.cycle.value=="")
    	{
    		alert("课题周期不可为空");
    		myform.cycle.focus();
    		return false;
    	}
    	if (myform.charge.value=="")
    	{
    		alert("课题负责人不可为空");
    		myform.charge.focus();
    		return false;
    	}
    	
    	
    	if (myform.source.value=="")
    	{
    		alert("课题来源不可为空");
    		myform.source.focus();
    		return false;
    	}
    }
    </script>
  </body>
</html>