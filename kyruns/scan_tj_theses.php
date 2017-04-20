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
	<div class="row" style="padding-top:15px;">
	<div class="col-md-1"></div>
		<?php include_once 'nav_left.php';?>
		<div class="col-md-7" style="background-color:rgb(255,255,255);"><!-- 表单循环输出  begin -->
		    <div class="row-fluid" style="padding-top:18px;">
				<div class="span12 text-center fontTitle">
					<span style="font-size:28px;">信</span><h3 style="display:inline;">息科学与工程学院科研论文统计表</h3>
				</div>
				<!-- <hr> -->
			</div>
			<div class="row" style="padding-left:50px; padding-right:50px; padding-top:20px">
		    		    
				<!--表单2-->
				<!-- 此表单提交到php函数处理页，进行修改和删除两项操作 -->
				<form name="form1" method="get">
				    <table class="table table-bordered table-hover" >
						<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									论文名称
								</th>
								<th>
									作者
								</th>
								<th>
									年份
								</th>
							</tr>
						</thead>
						<tbody><!--tbody中为要循环输出的内容  -->
							
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
							$select_date = $_GET['select-date'];
							$select_year='&select-date='.$select_date;
							if($select_date==""){
								$sql = "SELECT * FROM tb_tj_theses WHERE uid = {$_SESSION['uid']} order by id desc LIMIT $startPage,$pageSize";
								$result = mysqli_query($conn,$sql);
								$row_num = mysqli_num_rows($result);
								/* if($row_num==0){
									$page = "1";
									echo "<script>alert('已超出浏览范围！');</script>";
									exit;
								} */
							}else{
								$sql = "SELECT * FROM tb_tj_theses WHERE uid = {$_SESSION['uid']} AND date = {$select_date} order by id desc LIMIT $startPage,$pageSize";
								$result = mysqli_query($conn,$sql);
								$row_num = mysqli_num_rows($result);
								/* if($row_num==0){
									$select_date = "";
									echo "<script>alert('无内容！');</script>";
									exit;
								} */
							}
							
							//显示数据
                            $col1 = "";	    //设置记录行背景颜色为白色
							$col2 = "active";		//设置记录行背景颜色为灰色
							$col = $col2;

							for($i=0;$i<$row_num;$i++){
								$row = mysqli_fetch_array($result);
								if($col == $col1){
									$col = $col2;
								}else{
									$col = $col1;
								}
								
								$id = $row['id'];//当前行id
								$name = $row['name'];
								$author = $row['author'];
								$date = $row['date'];
								?>
								<tr class="<?php echo $col;?>" >
									<td><input type="radio" name="theses_id"  value="<?php echo $id;?>"/></td>
					                <td><!-- 在标题上添加连接 -->
				                    	<a class="text-link" href="javascript:void(0)" onclick="javascript:window.open('read_theses.php?note_id=<?php echo $id;?>','_blank', 'toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=1, resizable=0, titlebar=1, width=800, height=420, left=288, top=184')"><img src="img/more.png"/>&nbsp;<?php echo $name;?></a>    
					                </td>
					                <td><?php echo $author;?></td>
					                <td><?php echo $date;?></td>
					            </tr>
							    <?php
									}
								?>

							<tr bgcolor="#cbcac3">
							    <td><img src="img/arrow_ltr.gif" width="38" height="22" /></td>
							    <td style="text-align:left;">
				                    <button class="btn btn-sm btn-warning" type="submit" onclick="mod()">修改</button>
									<button class="btn btn-sm btn-warning" type="submit" onclick="del()">删除</button>		
								</td>
							    <td></td><td></td>
							</tr>
							
						</tbody>
					</table>
				</form>
			</div>
			<div class="row" style="padding-top:15px; padding-right:50px; padding-bottom:30px;">
			    <nav class="pull-right">
				<ul class="pagination fontPage">
				
			    <?php //显示分页条
					
					//获取数据总条数
					$total_sql = "SELECT COUNT(*) FROM tb_tj_theses WHERE uid = {$_SESSION['uid']}";
					$total_result = mysqli_fetch_array(mysqli_query($conn,$total_sql));//错误原因：变量写错$totla_result跟$total_result不对应
					//var_dump($total_result);
					$total = $total_result[0];//数组第0个键值里就包含了所有的信息
					//计算页数
					$total_pages = ceil($total/$pageSize);
					//计算偏移量
					$pageoffset = ($showPage-1)/2;
					//判断是否显示首页上一页及尾页下一页
					$page_banner = "";
					if($page>1){
						$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=1.$select_year'><font style='color:#4e4e4e'>首页</font></a></li>";
						$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($page-1).$select_year."'><font style='color:#4e4e4e'>上一页</font></a></li>";
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
						$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".$i.$select_year."'><font style='color:#4e4e4e'>{$i}</font></a><li>";
					}
					//尾部省略
					/* if($total_pages > $showPage&&$total_pages >$page + $pageoffset){
						$page_banner.="<li>...</li>";
					} */
					if($page<$total_pages){
						$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($page+1).$select_year."'><font style='color:#4e4e4e'>下一页</font></a></li>";
						$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($total_pages).$select_year."'><font style='color:#4e4e4e'>尾页</font></a></li>";
					}else{
						$page_banner.="<li><span style='color:#ACACAC'>下一页</span></li>";
						$page_banner.="<li><span style='color:#ACACAC'>尾页</span></li>";
					}	
					$page_banner .= "&nbsp;&nbsp;共 $total_pages 页";
					$page_banner .= '<form action="scan_tj_theses.php" method="get" style="display:inline">';
					$page_banner .= '&nbsp;&nbsp;到第&nbsp;<input autocomplete="off" type="text" class="input-sm" name="p" style="background-color:#FFFFFF;color:#4e4e4e;border-width:1px;border-color:#ECECEC;width:50px;height:20px; padding-left:3px;padding-bottom:1px;">&nbsp;页&nbsp;';
					$page_banner .= '<button class="btn btn-sm btn-warning" type="submit" value="确定">确定</button>';
					$page_banner .= '</form>';
					echo $page_banner;
				?>
				</ul>				
				</nav>
			</div>
		</div><!-- 表单循环输出 end -->
		
		<div class="col-md-1"></div>
	</div>	
	
	<!--Footer start-->
	<?php include_once 'footer.php';?>
	<!--Footer end-->
</div>
	<script>
		function del(){
			if(confirm("此操作会删除选中项，是否继续？")){
				document.form1.action="do_tj_theses.php";
				}
			}
		function mod(){
			document.form1.action="modify_tj_theses.php";
			}
		function look(){
			document.formyear.action="scan_tj_theses.php";
			}
		function out(){
			document.formyear.action="export_tj_theses.php";
			}
	</script>
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<!--  <script src="js/bootstrap-datetimepicker.js"></script>
    <script src="js/bootstrap-datetimepicker.fr.js"></script>-->
  </body>
</html>