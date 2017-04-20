<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

//得到应该填写的项目编号
$sql = "select * from tb_declare order by did desc limit 1 ";//得到列表中最后一条数据
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$dnumber = $row['dnumber'];//数据表里最后一条数据的项目编号
$number = preg_replace("/^0+/","",$dnumber)+1;//让编号去掉前面的0的部分+1
$num = str_pad($number,6,"0",STR_PAD_LEFT);//＋1后的结果前面补0 补成要求的六位编码
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
		    <div class="row-fluid" style="padding-top:15px;">
				<div class="span12 text-center fontTitle">
					<span style="font-size:28px;">信</span>
					<h3 style="display:inline">息科学与工程学院项目申报</h3>
				</div>
				<div class="col-lg-12" style="margin-top:-15px;">
					<hr align="left" style="width:18%;">
					<hr style="height:1px;background-color:#DA6426;border:none;width:64%;margin-top:-21px;">
					<hr align="right" style="width:18%;margin-top:-21px;">
				</div>
			</div>
			<form role="form" style="padding-top:15px;" action="do_declare.php" enctype="multipart/form-data" method="post" name="myform" onsubmit="return CheckPost();">
				<div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">项目名称（<span class="fontStar">※</span><span style="font-size:12px;">必填</span>）</label>
				  <input type="text" class="form-control input-sm" id="name1"  name="dproname">
			    </div>
			    <div class=" form-group col-lg-8">
				  <label for="name" class="fontTitle">项目负责人<span class="fontStar">&nbsp;※</span></label>
				  <input type="text" class="form-control input-sm" id="name2"  name="dmanname">
				</div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">项目编号（<span style="font-size:12px;">由系统分配</span>）<span class="fontStar">※</span></label>
				  <input type="text" class="form-control input-sm" onfocus="this.blur()" id="name3"   value="<?php echo $num;?>" name="dnumber">
				 
			    </div>			    
			    <div class="form-group col-lg-8">
					<label for="name" class="fontTitle">项目类别<span class="fontStar">&nbsp;※</span></label>
                    <div class="form-group">
						<select class="form-control input-sm" id="name5" name="dtype">
							<option value=""></option>
							<option value="科研项目">科研项目</option>
							<option value="教学改革项目">教学改革项目</option>
							<option value="科研创新团队">科研创新团队</option>
							<option value="教学团队">教学团队</option>
						</select>
                    </div>
			    </div>
			    <div class="form-group col-lg-8" style="margin-top:-15px;">
				  <label for="name" class="fontTitle">申报时间<span class="fontStar">&nbsp;※</span></label>
                    <div class="input-group date form_datetime col-lg-12" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
						<select class="form-control input-sm" id="name6" name="dtime">
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
						</select>
                    </div>
				</div>
				<div class="form-group">
					<div class="col-lg-10">
					  <label for="name" class="fontTitle">项目经费（<span style="font-size:12px;">请填写数字；单位：元。</span>）</label>
					</div>
					<div class="col-lg-8">
					  <input type="text" class="form-control input-sm" id="name7" name="dmoney">
					</div>
				</div>
				<div class="form-group col-lg-12" style="padding-top:15px;">
				  <label for="name" class="fontTitle">申报书上传（<span style="font-size:12px;">支持Word文档、图片上传</span>）<span class="fontStar">&nbsp;※</span></label>
				  <input id="lefile" name="dpath" type="file">
				</div>	
				<div class="form-group col-lg-12">
			      <label for="name" class="fontTitle">项目简介</label>
				  <textarea class="form-control" rows="5"  id="name4"  name="dintroduction"></textarea>
			    </div>	 				 				
				<div class="form-group col-lg-12" style="padding:10px 0 30px">
					<span class="col-lg-6">
					  <input type="submit" class="btn btn-warning btn-sm btn-block" name="submit" value="提交">
					</span>
					<span class="col-lg-6">
					  <input type="reset"  class="btn btn-warning btn-sm btn-block" value="重置">
					</span>
				</div>
			</form>
		</div>
		
		<!--右侧 col-lg-3列 begin -->
		
		<div class="col-md-3" style="padding:0; margin-left:15px;">
		    <div class="row" style="background-color:rgb(255,255,255);padding:0 15px 0;">
				<div style="padding:20px 15px 0">
					<div class="span12 text-left fontTitle">
						<span style="font-size:20px;">项</span>
						<h4 style="display:inline">目浏览</h4>
						<hr align="left" style="height:1px;background-color:#DA6426;border:none;width:25%;margin-top:8px;">
						<hr align="right" style="width:75%;margin-top:-21px;">
					</div>			
				</div>
				
				<!--右侧导航列表 begin-->
			
				<div class="row" style="padding:0 30px 20px;">
					<button type="button" class="btn btn-warning btn-sm btn-block" onclick="tz()">浏览全部</button>
				</div>				
			</div>
			
			
			<div class="row" style="padding:20px 0 15px; background-color:rgb(235,235,235); "></div><!--上下块间距-->
			<div class="row" style="background-color: rgb(255, 255, 255); padding: 0 15px 0;">
	    
			<!--条件查询下拉框  -->
                   
 			<!-- 右侧分时浏览表单 --><!--此表单提交到浏览处理，按年份输出信息 -->
			   <form  name="formyear" method="get">
				    <div style="padding: 20px 0 0;">
						<div class="span12 text-left fontTitle" style="padding:0 15px 0">
							<span style="font-size:20px;">分</span>
							<h4 style="display:inline">时浏览</h4>
							<hr align="left" style="height:1px;background-color:#DA6426;border:none;width:25%;margin-top:8px;">
							<hr align="right" style="width:75%;margin-top:-21px;">
						</div>
                        <div class="form-group" style="padding: 0 15px 0;"><label for="name">选择年份</label> 
							<select class="form-control input-sm" id="year1" name="select-date">
									<option value="">所有年份</option>
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
						<div class="col-lg-12" style="padding:0 15px 25px">
							<input type="submit" class="btn btn-warning btn-sm btn-block" onclick="look()"value="查看">
						</div>
				    </div>
			   </form>
			</div>
		</div>
	</div><!--右侧 导航 列表 end-->
			
	<div class="row" style="padding:20px 0 15px; background-color:rgb(235,235,235); "></div><!--上下块间距-->
	<!--Footer start-->
	<?php include "footer.php";?>
	<!--Footer end-->
</div>
<!--leade into script-->
	<script type="text/javascript">
		function tz(){
		    window.location.href='scan_declare.php';
	
	    }
		function look(){
			document.formyear.action="scan_declare.php";
			}
		function CheckPost()
	    {
	    	if (myform.dproname.value=="")
	    	{
	    		alert("项目名称不可为空");
	    		myform.dproname.focus();
	    		return false;
	    	}
	    	if (myform.dmanname.value=="")
	    	{
	    		alert("项目负责人不可为空");
	    		myform.dmanname.focus();
	    		return false;
	    	}
	    	if (myform.dnumber.value=="")
	    	{
	    		alert("项目编号不可为空");
	    		myform.dnumber.focus();
	    		return false;
	    	}
	    	if (myform.dtype.value=="")
	    	{
	    		alert("项目类型不可为空");
	    		myform.dtype.focus();
	    		return false;
	    	}
	    	if (myform.dtime.value=="")
	    	{
	    		alert("申报时间不可为空");
	    		myform.dtime.focus();
	    		return false;
	    	}
	    
	    }
	</script>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>
    <script src="js/bootstrap-datetimepicker.fr.js"></script>
  </body>
</html>