<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

//获取项目申报里的项目编号
$sql2= "SELECT * FROM `tb_declare` WHERE uid={$_SESSION['uid']} order by did desc";
$query2=mysqli_query($conn,$sql2);
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<!--导航栏  -->
	<?php include_once 'menu.php';?>
	<!--//导航栏 -->
	
	<!--左侧表单 begin-->
	<div class="row" style="padding-top:15px;">	
		<div class="col-md-2"></div>	
		<div class="col-md-5" style="background-color:rgb(255,255,255);margin-right:30px;">
		    <div class="row-fluid" style="padding-top:18px;">
				<div class="span12 text-center fontTitle">
					<span style="font-size:28px;">信</span>
					<h3 style="display:inline;">息科学与工程学院费用报销申请</h3>
				</div>
				<div class="col-lg-12" style="margin-top:-15px;">
					<hr align="left" style="width:14%;">
					<hr style="height:1px;background-color:#DA6426;border:none;width:72%;margin-top:-21px;">
					<hr align="right" style="width:14%;margin-top:-21px;">
				</div>
			</div>
			<form role="form" style="padding-top:15px;" action="do_cost.php" enctype="multipart/form-data" method="post" name="myform" onsubmit="return CheckPost();">
				<div class="form-group col-lg-8">
				    <label for="name" class="fontTitle">报销负责人（<span class="fontStar">※</span><span style="font-size:12px;"> 必填</span>）</label>
				    <input type="text" class="form-control input-sm" id="name1" name="cmanname">
			    </div>
			    <div class=" form-group col-lg-8">
				    <label for="name" class="fontTitle">依托项目名称或项目名称（<span style="font-size:12px;">选填</span>）</label>
				     <input type="text" class="form-control input-sm" id="name2" name="cname">
				</div>
				<div class="form-group col-lg-8">
					<label for="name" class="fontTitle">依托项目编号（<span style="font-size:12px;">选填</span>）</label>
	                <div class="form-group">
						<select class="form-control input-sm" id="name3" name="cnumber">
							<option value=""></option>
							<?php while($row2 = mysqli_fetch_array($query2)){?>
							<option value="<?php echo $row2['dnumber']?>"><?php echo $row2['dnumber']?></option>
							<?php }?>
						</select>
	                </div>
				</div>
				<div class=" form-group col-lg-8" style="margin-top:-15px;">
				    <label for="name" class="fontTitle">报销金额（<span class="fontStar">&nbsp;※</span><span style="font-size:12px;">&nbsp;&nbsp;单位：元 。请输入数字！</span>）</label>
				    <input type="text" class="form-control input-sm" id="name3" name="ccost">
				</div>
				
			    <div class="form-group col-lg-8">
				    <label for="name" class="fontTitle">报销类别（<span class="fontStar">※</span>必填）</label>
                    <div class="form-group">
						<select class="form-control input-sm" id="name5" name="ctype">
							<option value=""></option>
							<option value="出差">出差</option>
							<option value="论文">论文</option>
							<option value="耗材">耗材</option>
							<option value="其他">其他</option>
						</select>
                    </div>
			    </div>
				<div class="col-lg-8" style="margin-top:-15px;">
					<label for="name" class="fontTitle">报销申请时间（<span class="fontStar">※</span>必填）</label>
                    <div class="input-group date form_datetime col-lg-12" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                        <div class="form-group">
							<select class="form-control input-sm" id="year1" name="ctime">
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
                    </div>
				</div>
				<div class="form-group col-lg-12" style="padding-top:15px;">
				  <label for="name" class="fontTitle">发票凭证（<span class="fontStar">&nbsp;※</span>必填）（<span style="font-size:12px;">对发票进行拍照上传</span>）</label>
				  <input id="lefile" name="cpicpath" type="file">
				</div>
				<div class="form-group col-lg-12">
			      <label for="name" class="fontTitle">经费使用说明（<span style="font-size:12px;">简要说明经费使用情况</span>）</label>
				  <textarea class="form-control" rows="5" id="name6" name="cintroduction"></textarea>
			    </div>	
				<div class="col-lg-12" style="padding:10px 0 35px;">
					<span class="col-lg-6">
						<input type="submit" class="btn btn-warning btn-sm btn-block" name="submit" value="提交">
					</span>
					<span class="col-lg-6">
						<input type="reset"  class="btn btn-warning btn-sm btn-block" value="重置">
					</span>
				</div>
			</form>
		</div>
		<!-- //左侧表单-->
		
		<!--右侧 col-lg-3列 begin -->
		<div class="col-md-3" style="background-color:rgb(255,255,255);">
		<!--条件查询下拉框，此表单提交到浏览处理，按类别、年份输出信息 -->
		<div class="row" style="padding:18px 45px 0">
		    <form  name="formyear" method="get" action="scan_cost.php">
			    <div class="row">
				    <div>
						<div class="span12 text-left fontTitle">
							<font style="font-size:20px;">查</font>
							<font style="font-size:18px;display:inline">看申请结果</font>
							<hr align="left" style="height:1px;background-color:#DA6426;border:none;width:40%;margin-top:8px;">
							<hr align="right" style="width:60%;margin-top:-21px;">
						</div>
					</div>
				    <div class="form-group"><label for="name">选择类别</label> 
						<select class="form-control input-sm" name="ctype">
							<option value="">全部类别</option>
							<option value="出差">出差</option>
							<option value="论文">论文</option>
							<option value="耗材">耗材</option>
							<option value="其他">其他</option>
						</select>
                     </div>
                     <div class="form-group"><label for="name">选择年份</label> 
					 	<select class="form-control input-sm" id="year1" name="ctime">
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
					<div class="col-lg-12" style="padding:10px 0 35px">
						<input type="submit" class="btn btn-warning btn-sm btn-block" onclick="look()" value="查看">
					</div>
			    </div>
		   </form>
		   </div>
		</div>
	</div>
	<!--//右侧 导航 列表 -->
	<div class="row" style="padding:20px 0 15px; background-color:rgb(235,235,235); "></div><!--上下块间距-->
	<!--Footer-->	
	<?php include "footer.php";?>
	<!--//Footer-->
</div>
	<!--表单 end-->
	
    <script type="text/javascript">
    //判空
    function CheckPost()
    {
    	if (myform.cmanname.value=="")
    	{
    		alert("报销人不可为空");
    		myform.cmanname.focus();
    		return false;
    	}
    	if (myform.ctype.value=="")
    	{
    		alert("报销类型不可为空");
    		myform.ctype.focus();
    		return false;
    	}
    	if (myform.ctime.value=="")
    	{
    		alert("申请时间不可为空");
    		myform.ctime.focus();
    		return false;
    	}
    	if (myform.ccost.value=="")
    	{
    		alert("报销金额不可为空");
    		myform.ccost.focus();
    		return false;
    	}
    	if (myform.cpicpath.value=="")
    	{
    		alert("报销照片凭证不可为空");
    		myform.cpicpath.focus();
    		return false;
    	}
    }
    //跳转
    function tz(){
	    window.location.href='scan_cost.php';
    }
	</script>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>