<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

//获取要修改的数据
if(is_numeric($_GET['proright_id']) && $_GET['proright_id']<>''){
	$proright_id=$_GET['proright_id'];
	$sql = "SELECT * FROM `tb_tj_propertyright` WHERE uid={$_SESSION['uid']} AND `id`={$proright_id}";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	if($row==''){
		echo "<script>alert('非法操作');window.location.href='scan_tj_propertyRight.php'</script>";
	}
}else{
	echo "<script>alert('未选中任何修改项');window.location.href='scan_tj_propertyRight.php'</script>";
}

//执行修改
if($_POST['submit']){
	
	if ($_POST['level'] == "其他：") {
		$_POST['level'] = $_POST['other'];
	}
	$id= $_POST['id'];
	$uid = $_SESSION['uid'];
	$date = $_POST['year'];
	$department = $_POST['department'];
	$name = $_POST['name'];
	$idcard = $_POST['idcard'];
	$paycard = $_POST['paycard'];
	$cname = $_POST['cname'];
	$type = $_POST['type'];
	$address = $_POST['address'];
	$remarks = $_POST['remarks'];

	$sql = "UPDATE `tb_tj_propertyright` SET uid='$uid', date='$date', department='$department', name='$name', idcard='$idcard',paycard='$paycard',cname='$cname',type='$type',address='$address', remarks='$remarks' WHERE id = {$id}";  
	$query = mysqli_query($conn, $sql);

	if($query==true){
		echo "<script>alert('信息修改成功！');window.location.href='scan_tj_propertyRight.php';</script>";
	}else{
		echo "<script>alert('修改失败，稍后请重试，或联系管理员以审查系统错误！');window.location.href='scan_tj_propertyRight.php';</script>";
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
			<form role="form" style="padding-top:15px;" action="modify_tj_propertyright.php" method="post" name="myform" onsubmit="return CheckPost();">
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
								年&nbsp;-&nbsp;知识产权专利统计
						   </h3>
					   </div>
				</div>
				
			    <div class="row" style="padding:15px 0 20px;"></div><!-- 上下块间距 -->
			
				<div class="form-group col-lg-8">
				  <input type="hidden"  class="form-control input-sm" id="id"  name="id" value="<?php echo $row[id];?>">
				  <label for="name" class="fontTitle">部门（<span class="fontStar">※</span>必填）<span class="help-block" style="display:inline;">（如：信息科学与工程学院）</span></label>
				  <input type="text" class="form-control input-sm" id="name1" placeholder="" name="department" value="<?php echo $row[department];?>">
			    </div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">姓名（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name2" placeholder="" name="name" value="<?php echo $row[name];?>">
			    </div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">身份证号（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name3" placeholder="" name="idcard"  value="<?php echo $row[idcard];?>">
			    </div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">工资卡号<span class="help-block" style="display: inline;">（可先不填）</span></label>
				  <input type="text" class="form-control input-sm" id="name4" placeholder="" name="paycard" value="<?php echo $row[paycard];?>">
			    </div>
				<div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">成果或专利名称（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name4" placeholder="" name="cname" value="<?php echo $row[cname];?>">
			    </div>
				
				<div class="form-group col-lg-8">
					<label for="name" class="fontTitle">种类（<span class="fontStar">※</span>）</label><br>
					<div class="radio">
					   <label>
						  <input type="radio" name="type" id="optionsRadios1" value="获软件著作权登记" >获软件著作权登记
					   </label>
					</div>
					<div class="radio">
					   <label>
						  <input type="radio" name="type" id="optionsRadios2" value="发明专利">发明专利
					   </label>
					</div>
					<div class="radio">
					   <label>
						  <input type="radio" name="type" id="optionsRadios3" value="实用新型专利" >实用新型专利
					   </label>
					</div>
					<div class="radio">
					   <label>
						  <input type="radio" name="type" id="optionsRadios4" value="外观设计专利">外观设计专利
					   </label>
					</div>
					<div class="radio">
					   <label>
						  <input type="radio" name="type" id="optionsRadios5" value="其他" >其他
					   </label>
					</div>
				</div>
				<div class="form-group col-lg-8">
				    <label for="name" class="fontTitle">是否署名本校（<span class="fontStar">※</span>）</label><br>
				    <div class="radio">
						<label>
						    <input type="radio" name="address" id="address" value="是">是
						</label>
					</div>
					<div class="radio">
					   <label>
						    <input type="radio" name="address" id="address" value="否">否
					   </label>
					</div>
				</div>
				<div class="form-group col-lg-12">
			      <label for="name" class="fontTitle">备注：</label>
				  <textarea class="form-control" rows="5" name="remarks"><?php echo $row['remarks'];?></textarea>
			    </div>
				<div class="col-lg-12" style="padding:10px 0 40px;">
					<span class="col-lg-6">
					  <button type="submit" class="btn btn-warning btn-sm btn-block" name="submit">保存修改</button>
					</span>
					<span class="col-lg-6">
					  <button type="reset"  class="btn btn-warning btn-sm btn-block">重置</button>
					</span>
				</div>
			</form>
		</div>
		<!--右侧 col-lg-3列  -->
		<?php include_once 'nav_right.php';?>
		<!--//右侧 col-lg-3列 -->
		<div class="col-md-2"></div>
	</div><!--表单 end-->
	<!--Footer start-->
	<?php include_once 'footer.php';?>
	<!--Footer end-->
</div>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
    function viewAll(){
	    window.location.href='scan_tj_propertyRight.php';
    }
    function look(){
		document.formyear.action='scan_tj_propertyRight.php';
    }
	<!-- 输出radio框中的选中值 -->
	window.onload = function(){
	    var type= "<?php echo $row['type'];?>";
	    var address = "<?php echo $row['address'];?>";
	    var a = document.forms[0].elements["type"];
	    for(var i=0;i<a.length;i++){
	       if(a[i].value==type){a[i].checked=true;break;}   
	    }
	    a = document.forms[0].elements["address"];  
	    for(var i=0;i<a.length;i++){
	       if(a[i].value==address){a[i].checked=true;break;}   
	    }
	}
	//判空
    function CheckPost()
    {
        if(myform.year.value==""){
            alert("请选择年份");
            myform.year.focus();
            return false;
            }
    	if (myform.department.value=="")
    	{
    		alert("部门名称不可为空");
    		myform.department.focus();
    		return false;
    	}
    	if (myform.name.value=="")
    	{
    		alert("姓名不可为空");
    		myform.name.focus();
    		return false;
    	}
    	if (myform.idcard.value=="")
    	{
    		alert("身份证号码不可为空");
    		myform.idcard.focus();
    		return false;
    	}
    	if (myform.cname.value=="")
    	{
    		alert("成果或专利名称不可为空");
    		myform.cname.focus();
    		return false;
    	}	
    }
    </script>
  </body>
</html>