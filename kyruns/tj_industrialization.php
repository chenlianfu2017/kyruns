<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
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
			<form role="form" style="padding-top:15px;" action="do_tj_industrialization.php" method="post" name="myform" onsubmit="return CheckPost();">
				<div class="row-fluid col-md-12" style="padding-top:18px;">
					<div class="form-group col-md-3" style="padding-top:18px;padding-left:20px;">
					   <select class="form-control input-sm" name="year">
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
				</div>
				
			    <div class="row" style="padding:30px 0 30px;"></div><!-- 上下块间距 -->
			
				<div class="form-group col-lg-8 col-md-8">
				  <label for="name" class="fontTitle">作品名称（<span class="fontStar">※</span>必填）</label>
				  <input type="text" class="form-control input-sm" id="name1" placeholder="" name="wname">
			    </div>
			    <div class="form-group col-lg-8 col-md-8">
				  <label for="name" class="fontTitle">上传市场名称<span class="fontStar">&nbsp;※</span></label>
				  <input type="text" class="form-control input-sm" id="name2" placeholder="" name="uname">
			    </div>
			    <div class="form-group col-lg-8 col-md-8">
				  <label for="name" class="fontTitle">上传市场链接</label>
				  <input type="text" class="form-control input-sm" id="name3" placeholder="" name="link"><br><br>
			    </div>
			    <div class="form-group col-lg-12 col-md-8" style="margin-top:-30px;">
			      <label for="name" class="fontTitle">作品简介<span class="fontStar">&nbsp;※</span></label>
				  <textarea class="form-control" rows="5" name="introduction"></textarea>
			    </div>
				<div class="form-group col-lg-12 col-md-8">
			      <label for="name" class="fontTitle">备注</label>
				  <textarea class="form-control" rows="7" name="remarks"></textarea>
			    </div>
				<div class="col-lg-12"style="padding-left:0; padding-right:0;padding-top:10px; padding-bottom:60px;">
					<span class="col-lg-6">
					  <button type="submit" name="submit" value="提交" class="btn btn-warning btn-sm btn-block">提交</button>
					</span>
					<span class="col-lg-6">
					  <button type="reset"  name="reset"  value="重置" class="btn btn-warning btn-sm btn-block">重置</button>
					</span>
				</div>
			</form>
		</div>
		
		<!--右侧 col-lg-3列 begin -->
		
		<?php include_once 'nav_right.php';?>

		<!--右侧 col-lg-3列 end -->
		
		<div class="col-md-2">
		</div>
		
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
		document.formyear.action="scan_tj_industrialization.php";
	}
    function CheckPost()
    {
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