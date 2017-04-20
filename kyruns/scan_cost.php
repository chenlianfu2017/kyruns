<?php
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<!--导航栏-->
	<?php include_once 'menu.php';?>
	<!--//导航栏 -->
		<div class="row" style="padding-top:15px;">
			<div class="col-md-1"></div>
			<div class="col-md-3" style="margin-right: 30px;">
				<div class="row" style="background-color: rgb(255, 255, 255); padding: 0 15px 0;">
					<!-- 表单1 --><!--此表单提交到当前页处理，按类型、年份输出信息 -->
					<div style="padding:18px 15px 0;">
						<div class="span12 text-left fontTitle">
							<font style="font-size:20px;">条</font>
							<h4 style="display:inline">件查询</h4>
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
									<option value="<?php echo $_GET['ctype']?>"><?php if($_GET['ctype']==''){echo "所有类别";}else{echo $_GET['ctype'];}?></option>
									<option value="">所有类别</option>
									<option value="出差">出差费用报销</option>
									<option value="论文">论文费用报销</option>
									<option value="耗材">耗材费用报销</option>
									<option value="其他">其他费用报销</option>
								</select>
							</div>
						</div>
						<!-- 年份查询下拉框  -->
					    <div class="panel-group" id="panel-564300">
							<div class="form-group" style="padding: 0 15px 0;">
								<label for="name" class="fontTitle">选择年份</label> 
								<select class="form-control input-sm" id="year1" name="ctime">
									<option value="<?php echo $_GET['ctime']?>"><?php if($_GET['ctime']==''){echo "所有年份";}else{echo $_GET['ctime'];}?></option>
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
									<input type="submit" class="btn btn-warning btn-sm btn-block" onclick="out()" value="导出">
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- 表单1 end -->
            <!-- 右侧表单循环输出  -->
			<div class="col-md-7" style="background-color: rgb(255, 255, 255);">				
				<div class="row-fluid" style="padding-top: 18px;">
					<div class="span12 text-center fontTitle">
						<span style="font-size:28px">信</span>
						<h3 style="display:inline">息科学与工程学院费用报销统计表</h3>
					</div>
				</div>
				<div class="row" style="padding:20px 50px 0">
				<!-- 表单2 --><!-- 此表单提交到php函数处理页，进行修改和删除两项操作 -->
					<form name="form2" method="get">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>依托项目名称</th>
									<th>依托项目编号</th>
									<th>报销人</th>
									<th>年份</th>
									<th>报销金额</th>
									<th>审核状态</th>									
								</tr>
							</thead>
							<tbody>
								<!--tbody中为要循环输出的内容  -->
						    <?php
							//1.传入页码  2.根据页码取出数据  3.显示数据+分页条
							$page = $_GET['p'];
							if(!isset($page)){
								$page = 1;
							}
							$pageSize = 5;
							$showPage = 5;
							$startPage=($page-1)*$pageSize;
							//取出数据
							$select_date = $_GET['ctime'];
						    $ttype=$_GET['ctype'];
						    if($ttype != "" ){//如果限制类型
								if($select_date == ""){//不限制年份								
							    	$sql = "SELECT * FROM tb_cost WHERE uid = '$_SESSION[uid]' AND ctype='$ttype' ORDER BY cid DESC LIMIT $startPage,$pageSize";							   					    
							    }else{//限制年份								
							    	$sql = "SELECT * FROM tb_cost WHERE uid = '$_SESSION[uid]' AND ctype='$ttype' AND ctime = '$select_date' ORDER BY cid DESC LIMIT $startPage,$pageSize";
							    }
						    }else{//不限制类型
								if( $select_date == ""){//不限制年份	不限制类型								
									$sql = "SELECT * FROM tb_cost WHERE uid = '$_SESSION[uid]' ORDER BY cid DESC LIMIT $startPage,$pageSize";
								}else {//限制年份 不限制类型
									$sql = "SELECT * FROM tb_cost WHERE uid = '$_SESSION[uid]' AND ctime = '$select_date' ORDER BY cid DESC LIMIT $startPage,$pageSize";
								}							
							}
							$result = mysqli_query($conn,$sql);
							//显示数据
                            $col1 = "";
							$col2 = "active";//灰色
							$col = $col2;
							while($row = mysqli_fetch_array($result)){
								if ($col == $col1){
									$col = $col2;
								}elseif($col == $col2){
									$col = $col1;
								}
								$cid = $row['cid']; // 当前行id
								$cnumber = $row['cnumber'];
								$cname = $row['cname'];
								$ctype = $row['ctype'];
								$cmanname = $row['cmanname'];
								$ccost = $row['ccost'];
								$cstatus = $row['cstatus'];
								$ctime = $row['ctime'];
								?>
								<tr class="<?php echo $col;?>">
									<td><input type="radio" name="cid" value="<?php echo $cid;?>" /></td>
									<td><!-- 在标题上添加连接 --> 
										<a class="text-link" href="javascript:void(0)" onclick="javascript:window.open('read_cost.php?note_id=<?php echo $cid;?>','_blank','toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=1, resizable=0, titlebar=1, width=900, height=500, left=288, top=184')"><img src="img/more.png">&nbsp;<?php echo $cname;?></a></td>
									<td><?php echo $cnumber;?></td>
									<td><?php echo $cmanname;?></td>
									<td><?php echo $ctime;?></td>
									<td><?php echo $ccost;?></td>
									<!-- 根据cstatus的值输出不同的颜色 1：显示红色等待审核 2：显示绿色通过审核-->
									<td style="<?php if($cstatus == 1){echo 'color:blue;';}elseif($cstatus == 2){echo 'color:green';}elseif($cstatus == 0){echo 'color:red';}?>">
										<?php if ($cstatus == 1){echo "等待审核";}elseif($cstatus == 2){ echo "通过审核";}elseif($cstatus == 0){ echo "未通过";}?>
									</td>
								</tr>
							    <?php }?>
							    <tr bgcolor="#cbcac3">
							       <td><img src="img/arrow_ltr.gif" width="38" height="22" /></td>
							       <td style="text-align:left;">
				                      <button class="btn btn-sm btn-warning" type="submit" onclick="mod()">修改</button>
									  <button class="btn btn-sm btn-warning" type="submit" onclick="del()">删除</button>	
								   </td>
							       <td></td><td></td><td></td><td></td><td></td>
							   </tr>						
							</tbody>
						</table>
					</form>
				</div>

			    <div class="row" style="padding-top:15px; padding-right:50px; padding-bottom:30px;">
			        <nav class="pull-right">
				        <ul class="pagination fontTitle">
					        <?php //显示分页条
							
							//获取数据总条数
							if($ttype != ""){
								if($select_date == ""){
									$total_sql = "SELECT COUNT(*) FROM tb_cost WHERE uid = '$_SESSION[uid]' AND ctype = '$ttype'";
								}else{
									$total_sql = "SELECT COUNT(*) FROM tb_cost WHERE uid = '$_SESSION[uid]' AND ctype = '$ttype' AND ctime = '$select_date'";
								}
							}else{
								if($select_date == ""){
									$total_sql = "SELECT COUNT(*) FROM tb_cost WHERE uid = '$_SESSION[uid]'";
								}else{
									$total_sql = "SELECT COUNT(*) FROM tb_cost WHERE uid = '$_SESSION[uid]' AND ctime = '$select_date'";
								}
							}
							$total_result = mysqli_fetch_array(mysqli_query($conn,$total_sql));//错误原因：变量写错$totla_result跟$total_result不对应
							//var_dump($total_result);
							$total = $total_result[0];//数组第0个键值里就包含了所有的信息
							
							//计算页数
							$total_pages = ceil($total/$pageSize);
							//echo $total;
		
							//计算偏移量
							$pageoffset = ($showPage-1)/2;
							//判断是否显示首页上一页及尾页下一页
							$page_banner = "";
							$type='ctype='.$ttype;
							$select_year='ctime='.$select_date;
							$d="&".$type."&".$select_year;
							if($page > 1){
								$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=1.$d'><font style='color:#4e4e4e'>首页</font></a></li>";
								$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($page-1).$d."'><font style='color:#4e4e4e'>上一页</font></a></li>";
							}else{
								$page_banner.="<li><span style='color:#ACACAC'>首页</span></li>";
								$page_banner.="<li><span style='color:#ACACAC'>上一页</span></li>";
							}
							//初始化数据
							$start = 1;
							$end = $total_pages;
							if($total_pages > $showPage){
								/* if($page > $pageoffset + 1){
									$page_banner.="<li>...</li>";
								} */
								if($page > $pageoffset){
									$start = $page - $pageoffset;
									$end = $total_pages > $page+$pageoffset?$page+$pageoffset:$total_pages;
								}else{
									$start = 1;
									$end = $total_pages > $showPage?$showPage:$total_pages;
								}
								if($page + $pageoffset > $total_pages){
									$start = $start - ($page + $pageoffset - $end);
								}
							}
							for($i = $start;$i<=$end;$i++){
								$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".$i.$d."'><font style='color:#4e4e4e'>{$i}</font></a><li>";
							}
							//尾部省略
							/* if($total_pages > $showPage&&$total_pages >$page + $pageoffset){
								$page_banner.="<li>...</li>";
							} */
							if($page<$total_pages){
								$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($page+1).$d."'><font style='color:#4e4e4e'>下一页</font></a></li>";
								$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($total_pages).$d."'><font style='color:#4e4e4e'>尾页</font></a></li>";
							}else{
								$page_banner.="<li><span style='color:#ACACAC'>下一页</span></li>";
								$page_banner.="<li><span style='color:#ACACAC'>尾页</span></li>";
							}	
							$page_banner .= "&nbsp;&nbsp;共 $total_pages 页";
							$page_banner .= '<form action="scan_cost.php" method="get" style="display:inline;">';
							$page_banner .= '&nbsp;&nbsp;到第&nbsp;<input autocomplete="off" type="text" class="input-sm" name="p" style="background-color:#FFFFFF;color:#4e4e4e;border-width:1px;border-color:#ECECEC;width:50px;height:20px; padding-left:3px;padding-bottom:1px;">&nbsp;页&nbsp;';
							$page_banner .= '<button class="btn btn-sm btn-warning" type="submit" value="确定">确定</button>';
							$page_banner .= '</form>';
		                    echo $page_banner;
		                    ?>								
				       </ul>				
			       </nav>
			    </div>
			</div>
		</div><!-- //表单2 -->
		<!--//右侧表单循环输出  -->
		<div class="col-md-1"></div>
		<!--Footer start-->
		<?php include "footer.php";?>
		<!--Footer end-->
	</div>	
	<script>
		function look(){
		    document.form1.action="scan_cost.php";
		}
	    function out(){
		    document.form1.action="export_cost.php";
		}
		function del(){
			if(confirm("此操作会删除选中项，是否继续？")){
				document.form2.action="do_cost.php";
			}
		}
		function mod(){
			document.form2.action="modify_cost.php";
		}
	</script>
	<script src="jquery/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>
	<script src="js/bootstrap-datetimepicker.fr.js"></script>
</body>
</html>