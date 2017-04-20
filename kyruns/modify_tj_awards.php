<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

//获取要修改的值
if(is_numeric($_GET['awards_id']) && $_GET['awards_id']<>''){
	$id=$_GET['awards_id'];
	$sql = "SELECT * FROM tb_tj_awards WHERE uid={$_SESSION['uid']} AND id={$id}";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	if($row==''){
		echo "<script>alert('非法操作');window.location.href='scan_tj_awards.php'</script>";
	}
}else{
	echo "<script>alert('未选中任何修改项');window.location.href='scan_tj_awards.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
		
	<!--导航栏-->
	<?php include "menu.php";?>
	<!--导航栏 end-->
	
	<!--表单-->
	<div class="row" style="padding-top:15px;">
		<div class="col-md-2"></div>
		<div class="col-md-5" style="background-color:rgb(255,255,255);margin-right:30px;">
			<form role="form" style="padding-top:15px;" action="do_modify_awards.php" method="post" name="myform" onsubmit="return CheckPost();">
				<div class="row-fluid col-md-12" style="padding-top:5px;">
					<div class="form-group col-md-3" style="padding-top:18px;padding-left:20px; padding-right:0;">
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
								年&nbsp;-&nbsp;信工学院科研获奖统计
						   </h3>
					   </div>
				</div>
				
				<div class="row" style="padding:30px 0 20px;"></div><!-- 间距 -->
			
				<div class="form-group col-lg-8">
				<input type="hidden"  class="form-control input-sm" id="id"  name="id" value="<?php echo $row['id'];?>">
				  <label for="name" class="fontTitle">奖项（<span class="fontStar">※</span>必填）</label>
				  <input type="text" class="form-control input-sm" id="name1" placeholder="" name="prize" value="<?php echo $row['prize'];?>">
			    </div>
			    <div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">获奖成果名称（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="name2" placeholder="" name="pname" value="<?php echo $row['pname'];?>">
			    </div>
				<div class="col-lg-12">
				  <label for="name" class="fontTitle">获奖等级（<span class="fontStar">※</span>）</label><br>
				  <label class="checkbox-inline">
				    <input type="radio" name="level" id="radioInline1" value="一等奖" >一等奖
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="level" id="radioInline2" value="二等奖">二等奖
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="level" id="radioInline3" value="三等奖">三等奖
				  </label><br>
				  <label class="checkbox-inline">
					  <input type="radio" name="level" id="radioInline10" value="其他">其他：<input name="other" value="<?php if($row['level']=="其他"){echo $row['other'];} ?>" type="text" id="textInfo" class="form-control input-sm" style="display:inline; width:auto; height:auto;">
				   </label>
				</div>
				<div class="col-lg-8"><p></p>
				  <label for="name" class="fontTitle">获奖时间（<span class="fontStar">※</span>）</label>
                    <div class="input-group date form_datetime col-lg-12" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                        <input type="text" name="pdate" class="tcal form-control input-sm" value="<?php echo $row['pdate']?>"/>
                    </div>
				</div>
				<div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">获奖证书编号（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="num" name="number" value="<?php echo $row['number'];?>">
				</div>
				<div class="form-group col-lg-8">
				  <label for="name" class="fontTitle">获奖者姓名（<span class="fontStar">※</span>）</label>
				  <input type="text" class="form-control input-sm" id="num" name="author" value="<?php echo $row['author'];?>">
				</div>
				<div class="col-lg-12">
				  <label for="name" class="fontTitle">本人排名（<span class="fontStar">※</span>）</label><br>
				  <label class="checkbox-inline">
				    <input type="radio" name="ranking" id="radioInline1" value="第一" >第一
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="ranking" id="radioInline2" value="第二">第二
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="ranking" id="radioInline3" value="第三">第三
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="ranking" id="radioInline3" value="第四">第四
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="ranking" id="radioInline3" value="第五">第五
				  </label>
				  <label class="checkbox-inline">
				    <input type="radio" name="ranking" id="radioInline3" value="其他">其他
				  </label>
				</div>
				
				<div class="form-group col-lg-12" style="padding-top:15px;">
			      <label for="name" class="fontTitle">依托项目（包括项目来源）</label>
				  <p class="help-block fontTitle" style="font-size:12px;">项目包括省级、市厅级、校级、院级各级项目，如有多个项目，请全部填写</p>
				  <textarea class="form-control" rows="5" name="source"><?php echo $row['source']; ?></textarea>
			    </div>
				
				<div class="form-group col-lg-12">
			      <label for="name" class="fontTitle">备注：</label>
				  <textarea class="form-control" rows="5" name="remarks"><?php echo $row['remarks']; ?></textarea>
			    </div>
				<div class="col-lg-12"style="padding:10px 0 40px;">
					<span class="col-lg-6">
					  <button type="submit" class="btn btn-warning btn-sm btn-block" name="submit">保存修改</button>
					</span>
					<span class="col-lg-6">
					  <button type="reset"  class="btn btn-warning btn-sm btn-block">重置</button>
					</span>
				</div>
			</form>
		</div>
		
		<!--右 col-lg-3列 -->
		<?php include_once 'nav_right.php';?>
		<!--//右 col-lg-3列-->
		<div class="col-md-2"></div>
	</div><!--表单 end-->
	
	<!--Footer start-->
	<?php include "footer.php";?>
	<!--Footer end-->
	</div>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="datetimepicker/tcal.js"></script>
    <script>
    function viewAll(){
		window.location.href='scan_tj_awards.php';
    }
    function look(){
        document.formyear.action='scan_tj_awards.php';
    }
    <!-- 输出radio选中的值 -->
	window.onload = function(){
	    var level = "<?php echo $row['level']; ?>";
	    var ranking= "<?php echo $row['ranking']; ?>";
		var a = document.forms[0].elements["ranking"];
	    for(var i=0;i<a.length;i++){
	       if(a[i].value==ranking){a[i].checked=true;break;}   
	    }
	    var a = document.forms[0].elements["level"];  
	    for(var i=0;i<a.length;i++){
	       if(a[i].value==level){a[i].checked=true;break;}   
	    }
	}
    function CheckPost()
    {
        if(myform.year.value==""){
            alert("请选择统计年份");
            myform.year.focus();
            return false;
            }
    	if (myform.prize.value=="")
    	{
    		alert("奖项名称不可为空");
    		myform.prize.focus();
    		return false;
    	}
    	if (myform.pname.value=="")
    	{
    		alert("获奖成果名称不可为空");
    		myform.pname.focus();
    		return false;
    	}
    	if (myform.pdate.value=="")
    	{
    		alert("获奖时间不可为空");
    		myform.pdate.focus();
    		return false;
    	}
    	if (myform.author.value=="")
    	{
    		alert("获奖者姓名不可为空");
    		myform.author.focus();
    		return false;
    	}
    	if (myform.number.value=="")
    	{
    		alert("获奖证书编号不可为空");
    		myform.number.focus();
    		return false;
    	}
    }
    </script>
  </body>
</html>