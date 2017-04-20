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
	
		<div class="col-md-2">
		</div>
		
		<div class="col-md-5" style="background-color:rgb(255,255,255);margin-right:30px;">
		    <form role="form"  action="do_tj_theses.php" method="post" name="myform" onsubmit="return CheckPost();">
			    <div class="row-fluid col-md-12" style="padding-top:18px;">
					<div class="form-group col-md-3" style="padding-top:18px;padding-left:20px; padding-right:0;">
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
				   <div class="span12 col-md-9" style="padding-left:3px;">
					   <h3 class="text-left fontTitle">
							年&nbsp;-&nbsp;信工学院科研论文统计
					   </h3>
				   </div>
				</div>
			    
			    <div class="row" style="padding:30px 0 20px;"></div><!-- 上下块间距 -->
			
				<div class="form-group col-lg-8" style="padding-top:15px;">
				  <label for="name" class="fontTitle">论文名称（<span class="fontStar">※</span>必填）</label>
				  <input type="text" class="form-control input-sm" id="name1" placeholder="" name="name">
			    </div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">发布刊物或会议名称（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name2" placeholder="" name="sname">
			    </div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">年卷期（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name3" placeholder="" name="period">
			    </div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">作者（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name4" placeholder="" name="author">
			    </div>
				<div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">依托项目编号</label>
				  <input type="text" class="form-control input-sm" id="num" name="number">
				</div>
				<div class="col-lg-12">
				  <label for="name" class="fontTitle">论文状态（<span class="fontStar">※</span>）</label><br>
				  <label class="checkbox-inline">
				    <input type="radio" name="status" id="radioInline1" value="已收录" checked>已收录
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="status" id="radioInline2" value="已发表">已发表
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="status" id="radioInline3" value="已投稿">已投稿
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="status" id="radioInline4" value="撰写中">撰写中
				  </label>
				</div>
                
				<div class="col-lg-12" style="padding-top:15px;">
				  <label for="name" class="fontTitle">论文级别（<span class="fontStar">※</span>）</label><br>
				   <label class="checkbox-inline">
					  <input type="radio" name="level" id="radioInline5" value="SCI收录" checked>SCI收录
				   </label>
				   <label class="checkbox-inline">
					  <input type="radio" name="level" id="radioInline6" value="EI收录">EI收录
				   </label>
				   <label class="checkbox-inline">
					  <input type="radio" name="level" id="radioInline7" value="ISTP收录">ISTP收录
				   </label>
				   <label class="checkbox-inline">
					  <input type="radio" name="level" id="radioInline8" value="核心期刊">核心期刊
				   </label><br>
				   <label class="checkbox-inline">
					  <input type="radio" name="level" id="radioInline9" value="普通期刊">普通期刊
				   </label><br>
				   <label class="checkbox-inline">
					  <input type="radio" name="level" id="radioInline10" value="其他：">其他：<input id="textInfo" name="other" type="text" class="form-control input-sm" style="display:inline; width:auto; height:auto;">
				   </label>
				</div>
				<div class="form-group col-lg-12" style="padding-top:15px;">
			      <label for="name" class="fontTitle">论文依托项目（<span class="fontStar">※</span>）（包括项目来源）</label>
				  <p class="help-block fontTitle" style="font-size:12px;">项目包括省级、市厅级、校级、院级各级项目，如有多个项目，请全部填写</p>
				  <textarea class="form-control" rows="5" name="source"></textarea>
			    </div>
				<div class="form-group col-lg-12">
			      <label for="name" class="fontTitle">备注</label>
				  <textarea class="form-control" rows="5" name="remarks"></textarea>
			    </div>
				<div class="col-lg-12"style="padding:10px 0 40px;">
					<span class="col-lg-6">
					  <button type="submit" name="submit" class="btn btn-warning btn-sm btn-block">提交</button>
					</span>
					<span class="col-lg-6">
					  <button type="reset"  name="reset"  class="btn btn-warning btn-sm btn-block">重置</button>
					</span>
				</div>
			</form>
		</div>
		
		<!--右侧 col-lg-3列 begin -->
		
		<?php include_once 'nav_right.php';?>

		<!--右侧 col-lg-3列 end -->
		
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
	    window.location.href='scan_tj_theses.php';
    }
	function look(){
		document.formyear.action="scan_tj_theses.php";
	}
    function CheckPost()
    {
    	if (myform.year.value=="")
    	{
    		alert("请选择统计年份");
    		myform.year.focus();
    		return false;
    	}
    	if (myform.name.value=="")
    	{
    		alert("论文名称不可为空");
    		myform.name.focus();
    		return false;
    	}
    	if (myform.sname.value=="")
    	{
    		alert("发布刊物或会议名称不可为空");
    		myform.sname.focus();
    		return false;
    	}
    	if (myform.period.value=="")
    	{
    		alert("年卷期不可为空");
    		myform.period.focus();
    		return false;
    	}
    	if (myform.author.value=="")
    	{
    		alert("作者不可为空");
    		myform.author.focus();
    		return false;
    	}
    	if (myform.status.value=="")
    	{
    		alert("论文状态不可为空");
    		myform.period.focus();
    		return false;
    	}
    	if (myform.level.value=="")
    	{
    		alert("论文级别不可为空");
    		myform.level.focus();
    		return false;
    	}
    	if (myform.source.value=="")
    	{
    		alert("依托项目不可为空");
    		myform.source.focus();
    		return false;
    	}
    }
    </script>
  </body>
</html>