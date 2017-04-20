<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

//项目编号输出项目申报的所有编号
$sql2= "SELECT * FROM `tb_declare` WHERE uid={$_SESSION['uid']} ORDER BY did DESC";
$query2=mysqli_query($conn,$sql2);
//获取要修改的数据
if(is_numeric($_GET['cid']) && $_GET['cid']<>''){
    $cost_id=$_GET['cid'];
    $sql = "SELECT * FROM `tb_cost` WHERE uid={$_SESSION['uid']} AND `cid`= {$cost_id}";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row==''){
    	echo "<script>alert('非法操作');window.location.href='scan_cost.php'</script>";
    	exit();
    }else{
    	if($row['cstatus']==2){
    		echo "<script>alert('经费已通过审核，不能进行更改');history.go(-1);</script>";
    		exit();
    	}
    }
}else{
	echo "<script>alert('未选中任何修改项');history.go(-1);</script>";
	exit();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

	<!-- 导航栏 -->
	<?php include_once 'menu.php';?>
	<!--//导航栏 -->
	
	<!--表单-->
	<div class="row" style="padding-top:15px;">
		<div class="col-md-2"></div>
		<div class="col-md-5" style="background-color:rgb(255,255,255);margin-right:30px;">
			<form role="form" style="padding-top:15px;" action="do_modify_cost.php" enctype="multipart/form-data" method="post" name="myform" onsubmit="return CheckPost();">
			<div class="row-fluid col-md-12" style="padding-top:5px;">
				<div class="form-group col-md-3" style="padding-top:18px;padding-left:20px; padding-right:0;">
					 <select class="form-control input-sm" name="ctime">
					     <option value="<?php echo $row['ctime'];?>"><?php echo $row['ctime'];?></option>
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
					 	年&nbsp;-&nbsp;信工学院费用报销修改
				    </h3>
			    </div>
				</div>
			    
			    <div class="row" style="padding:30px 0 20px;"></div><!-- 上下块间距 -->
			
			    <input type="hidden"  class="form-control input-sm" id="id"  name="cid" value="<?php echo $row['cid'];?>">
				<div class="form-group col-lg-8">
				  <label for="name" class="fontTitle" >依托项目名称（<span class="fontStar">※</span>必填）</label>
				  <input type="text" class="form-control input-sm" id="name1"  name="cname" value="<?php echo $row['cname']; ?>">
			    </div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">依托项目编号（<span class="fontStar">※</span>）</label>
				  <div class="form-group">
						<select class="form-control input-sm" id="name3" name="cnumber">
							<option value="<?php echo $row['cnumber'];?>"><?php echo $row['cnumber'];?></option>
							<option value=""></option>
							<?php while($row2 = mysqli_fetch_array($query2)){?>
							<option value="<?php echo $row2['dnumber']?>"><?php echo $row2['dnumber']?></option>
							<?php }?>
						</select>
	              </div>
			    </div>
			    <div class="form-group col-lg-8" style="margin-top:-15px;">
				  <label for="name" class="fontTitle">负责人（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name3" placeholder="" name="cmanname" value="<?php echo $row['cmanname']; ?>">
			    </div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">经费（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name3" placeholder="" name="ccost" value="<?php echo $row['ccost'];?>">
			    </div>
			   <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">项目类别（<span class="fontStar">※</span>）</label>
                        <div class="form-group">
							<select class="form-control input-sm" id="name2" name="ctype">
									<option value="<?php echo $row['ctype'];?>"><?php echo $row['ctype'];?></option>
									<option value="出差">出差</option>
									<option value="论文">论文</option>
									<option value="耗材">耗材</option>
									<option value="其他">其他</option>
							</select>
                        </div>
			    </div>
			    <div class="form-group col-lg-8">
				    <label for="name" class="fontTitle">图片（<span class="fontStar">※</span>）</label>
			        <div class="input-append">
                      <input id="photoCover" name="cpicpath" type="file">
                    </div>
			    </div>
			    <div class="form-group col-lg-12">
				  <label for="name" class="fontTitle">简要说明<span class="fontStar">※</span></label>
				  <textarea class="form-control" name="cintroduction" rows="5"><?php echo $row['cintroduction'];?></textarea>
			    </div>
				<div class="col-lg-12"style="padding:10px 0 40px;">
					<span class="col-lg-6">
					  <button type="submit" name="submit" class="btn btn-warning btn-sm btn-block">修改</button>
					</span>
					<span class="col-lg-6">
					  <button type="reset" name="reset" class="btn btn-warning btn-sm btn-block">重置</button>
					</span>
				</div>
			</form>
		</div>

		<!--右侧 col-lg-3列 begin -->
		
		<div class="col-md-3" style="margin-right: 30px;">
			<div class="row" style="background-color: rgb(255, 255, 255); padding: 0 15px 0;">
				<!-- 表单1 --><!--此表单提交到当前页处理，按类型、年份输出信息 -->
				<div style="padding:18px 15px 0;">
					<div class="span12 text-left fontTitle">
						<font style="font-size:20px;">项</font>
						<h4 style="display:inline">目申报</h4>
						<hr align="left" style="height:1px;background-color:#DA6426;border:none;width:35%;margin-top:8px;">
						<hr align="right" style="width:65%;margin-top:-21px;">
					</div>
				</div>
				<div class="panel-group" id="panel-564300" style="width:90%;margin-left:15px;"><!--左侧导航列表 begin-->
					<div class="panel panel-warning text-center">
						<div class="panel-heading" style="background-color:#EDA741;height:30px; padding:3px; 0 0;">
							 <a class="panel-title collapsed" style="color:#FEFEFE; font-size:15px; text-decoration:none; outline:none;" data-toggle="collapse" data-parent="#panel-564300" href="#panel-element-367935">
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;申报
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
						</div>
						<div id="panel-element-367935" class="panel-collapse collapse">
							<div class="panel-body" style="height:30px; padding-top:3px;padding-bottom:0;">
								<a href="declare.php" style="color:#EC971F;">申报项目</a>
							</div>
							<div class="panel-body" style="height:30px; padding-top:3px;padding-bottom:0;">
								<a href="scan_declare.php" style="color:#EC971F;">查看申报</a>
							</div>
						</div>
					</div>
			    </div>
			</div>
			
			<div class="row" style="padding:10px 0 20px;"></div><!-- 上下块间距 -->
			
			<div class="row" style="background-color: rgb(255, 255, 255); padding: 0 15px 0;">
				<!-- 表单1 --><!--此表单提交到当前页处理，按类型、年份输出信息 -->
				<div style="padding:18px 15px 0;">
					<div class="span12 text-left fontTitle">
						<font style="font-size:20px;">费</font>
						<h4 style="display:inline">用报销</h4>
						<hr align="left" style="height:1px;background-color:#DA6426;border:none;width:35%;margin-top:8px;">
						<hr align="right" style="width:65%;margin-top:-21px;">
					</div>
				</div>
				<div class="panel-group" id="panel-564300" style="width:90%;margin-left:15px;">
					<div class="panel panel-warning text-center">
						<div class="panel-heading" style="background-color:#EDA741; height:30px; padding:3px; 0 0;">
							 <a class="panel-title collapsed" style="color:#FEFEFE; font-size:15px; text-decoration:none; outline:none;" data-toggle="collapse" data-parent="#panel-564300" href="#panel-element-367934">
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;报销
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
						</div>
						<div id="panel-element-367934" class="panel-collapse collapse">
							<div class="panel-body" style="height:30px; padding-top:3px;padding-bottom:0;">
								<a href="cost.php" style="color:#EC971F">经费申请</a>
							</div>
							<div class="panel-body" style="height:30px; padding-top:3px;padding-bottom:0;">
								<a href="scan_cost.php" style="color:#EC971F">查看申请</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row" style="padding:10px 0 20px;"></div><!-- 上下块间距 -->
			
			<div class="row" style="background-color: rgb(255, 255, 255); padding: 0 15px 0;">
				<!-- 表单1 --><!--此表单提交到当前页处理，按类型、年份输出信息 -->
				<div style="padding:18px 15px 0;">
					<div class="span12 text-left fontTitle">
						<font style="font-size:20px;">经</font>
						<h4 style="display:inline">费查询</h4>
						<hr align="left" style="height:1px;background-color:#DA6426;border:none;width:35%;margin-top:8px;">
						<hr align="right" style="width:65%;margin-top:-21px;">
					</div>
				</div>
				<form name="form1" method="get">
					<!--类型查询下拉框  -->
				   	<div class="panel-group" id="panel-564300">										   					
						<div class="form-group" style="padding:0 15px 0;">
							<label for="name" class="fontTitle">报销类别</label>
							<select class="form-control input-sm" id="" name="ctype">
								<option value="">所有类别</option>
								<option value="出差">出差</option>
								<option value="论文">论文</option>
								<option value="耗材">耗材</option>
								<option value="其他">其他</option>
							</select>
						</div>
					</div>
					<!-- 年份查询下拉框  -->
				    <div class="panel-group" id="panel-564300">
						<div class="form-group" style="padding: 0 15px 0;">
							<label for="name" class="fontTitle">选择年份</label> 
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
						<div class="col-lg-12" style="padding:10px 0 35px;">
							<span class="col-lg-6">
								<input type="submit" class="btn btn-warning btn-sm btn-block" onclick="look()"value="查看">
							</span>
							<span class="col-lg-6">
								<button type="button" class="btn btn-warning btn-sm btn-block" onclick="back()">返回</button>
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--右侧 col-lg-3列 end -->
		<div class="col-md-2"></div>
	</div>
	<!--表单 end-->
	<!--Footer start-->
	<?php include "footer.php";?>
	<!--Footer end-->
</div>
	<script>
	function look(){
	    document.form1.action="scan_cost.php";
	}
    function back(){
	    history.go(-1);
	}
	//输出至对应单选框
	window.onload = function(){
	    var ststus= "<?php echo $row[status]; ?>";
	    var level = "<?php echo $row[level]; ?>";
	    var a = document.forms[0].elements["status"];
	    for(var i=0;i<a.length;i++){
	       if(a[i].value==ststus){a[i].checked=true;break;}   
	    }
	    a = document.forms[0].elements["level"];  
	    for(var i=0;i<a.length;i++){
	       if(a[i].value==level){a[i].checked=true;break;}   
	    }
	}
	</script>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>