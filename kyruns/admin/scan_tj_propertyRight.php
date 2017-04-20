<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<?php include_once 'header_config.php';?>
<body>
	<div id="wrapper">
    <!-- Navigation -->
    	<?php include 'menu.php';?>
		<!--//Navigation-->
        <div id="page-wrapper">
		<!--Content-->
	        <div class="graphs">
		    <div class="row-fluid" style="padding-bottom:20px;">
				<div class="span12">
					<h3 class="text-center fontTitle">
						信息科学与工程学院知识产权专利统计表
					</h3>
				</div>
			</div>
			<div class="row" style="padding-left:15px; padding-right:15px;">
				<!--浏览时条件查询-->	
				<?php include_once 'select_research.php';?>
				<form name="form1" method="get">
				<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
					<div class="panel-body no-padding">
						<table class="table table-hover table-condensed" style="padding: 8px;height:1;padding: 5px;vertical-align: top;border-top: 1px solid #ddd">
							<thead>
								<tr style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd">
									<th>
										#
									</th>
									<th>
										专利名称
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
								$select_author = $_GET['tcname'];
								$select_date = $_GET['select-date'];
								
								if($select_author && $select_date <> ""){
									$sql = "SELECT * FROM `tb_tj_propertyright` WHERE name = '$select_author' AND date = {$select_date} ORDER BY id DESC LIMIT $startPage,$pageSize";
								}elseif($select_date == ""){
									if($select_author == "" ){
										$sql = "SELECT * FROM `tb_tj_propertyright` ORDER BY id DESC LIMIT $startPage,$pageSize";
									}else{
										$sql = "SELECT * FROM `tb_tj_propertyright` WHERE name = '$select_author' ORDER BY id DESC LIMIT $startPage,$pageSize";
									}
								}elseif($select_author == ""){
									if($select_date == "" ){
										$sql = "SELECT * FROM `tb_tj_propertyright` ORDER BY id DESC LIMIT $startPage,$pageSize";
									}else{
										$sql = "SELECT * FROM `tb_tj_propertyright` WHERE date = {$select_date} ORDER BY id DESC LIMIT $startPage,$pageSize";
									}
								}
								$result = mysqli_query($conn,$sql);
								
								//显示数据
	                            $col1 = "active";	    //设置记录行背景颜色为白色
								$col2 = "success";		//设置记录行背景颜色为绿色
								$col = $col2;
								$row_num = mysqli_num_rows($result);
	
								for($i=0;$i<$row_num;$i++){
									$row = mysqli_fetch_array($result);
									if($col == $col1){
										$col = $col2;
									}else{
										$col = $col1;
									}
									$id = $row['id'];//当前行id
									$cname = $row['cname'];
									$name = $row['name'];
									$date = $row['date'];
									?>
									<tr class="<?php echo $col;?>" style="padding:0;margin:0;border:0;vertical-align:top;border-top: 1px solid #ddd;vertical-align:bottom;border-bottom: 2px solid #ddd">
										<td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"></td>
						                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><!-- 在标题上添加连接 -->
					                    	<a href="javascript:void(0)" title="点击查看详情" onclick="javascript:window.open('read_propertyRight.php?note_id=<?php echo $id;?>','_blank','toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=1, resizable=0, titlebar=1, width=800, height=420, left=288, top=184')" style="text-decoration:none;"><?php echo $cname;?></a>    
						                </td>
						                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><?php echo $name;?></td>
						                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><?php echo $date;?></td>
						            </tr>
							 <?php }?>
								</tbody>
							</table>
						</div>
					</div>
				</form>	
			</div>
			
			<div class="row" style="padding-left:15px; padding-right:15px;">
			<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}">
			<div class="panel-body no-padding">
			    <nav class="pull-right">
					<ul class="pagination fontTitle" style="margin:0;font-size:14px;line-height:2">	
						<?php 
						
						//显示分页条
						//获取数据总条数
						if($select_date == "" && $select_author == ""){
							$total_sql = "SELECT COUNT(*) FROM `tb_tj_propertyright`";
						}elseif($select_date == "" && $select_author != ""){
							$total_sql = "SELECT COUNT(*) FROM `tb_tj_propertyright` WHERE name = '$select_author'";
						}elseif($select_date != "" && $select_author == ""){
						    $total_sql = "SELECT COUNT(*) FROM `tb_tj_propertyright` WHERE date = '$select_date'";
						}elseif($select_date != "" && $select_author != ""){
							$total_sql = "SELECT COUNT(*) FROM `tb_tj_propertyright` WHERE date = '$select_date' AND name = '$select_author'";
						}
						$total_result = mysqli_fetch_array(mysqli_query($conn,$total_sql));//错误原因：变量写错$totla_result跟$total_result不对应
						//var_dump($total_result);
						$total = $total_result[0];//数组第0个键值里就包含了所有的信息
						//计算页数
						$total_pages = ceil($total/$pageSize);
						//计算偏移量
						$pageoffset = ($showPage-1)/2;
						//判断是否显示首页上一页及尾页下一页
						$select_name ='&tcname='.$select_author ;
						$select_year='&select-date='.$select_date;
						$p=$select_name.$select_year;
						$page_banner = "";
						if($page>1){
							$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=1.$p'>首页</a></li>";
							$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($page-1).$p."'>上一页</a></li>";
						}else{
							$page_banner.="<li><span>首页</span></li>";
							$page_banner.="<li><span>上一页</span></li>";
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
							$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".$i.$p."'>{$i}</a><li>";
						}
						//尾部省略
						/* if($total_pages > $showPage&&$total_pages >$page + $pageoffset){
							$page_banner.="<li>...</li>";
						} */
						if($page<$total_pages){
							$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($page+1).$p."'>下一页</a></li>";
							$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($total_pages).$p."'>尾页</a></li>";
						}else{
							$page_banner.="<li><span>下一页</span></li>";
							$page_banner.="<li><span>尾页</span></li>";
						}	
						$page_banner .= "<div style='padding-top:2px;' class='pull-right'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;共 $total_pages 页";
						$page_banner .= '<form action="scan_tj_theses.php" method="get" style="display:inline;">';
						$page_banner .= '&nbsp;&nbsp;到第&nbsp;<input autocomplete="off" class="input-sm" name="p" size="2" style="border:1px; background-color:#f0eaf1;" type="text">&nbsp;页&nbsp;';
						$page_banner .= '<button class="btn btn-sm btn-info" type="submit" value="确定">确定</button>';
						$page_banner .= '</form></div>';
						echo $page_banner;
						?>
					</ul>
				</nav>
			</div>
			</div>
			</div>
			<!--//Content -->
		
			<!--footer-->
			<?php include_once 'footer.php';?>
			<!--//footer-->
		</div><!-- //container-fluid -->
      </div><!-- /#page-wrapper -->
	</div><!-- /#wrapper -->
    <?php include 'message.php';?>
	<!-- Metis Menu Plugin JavaScript -->
	<script>
		function look(){
			document.formyear.action="scan_tj_propertyRight.php";
			}
		function out(){
			document.formyear.action="export_tj_propertyRight.php";
			}
	</script>
</body>
</html>