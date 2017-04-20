<?php 
include("conn.php");
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);

if($_GET['did']){
	$id = $_GET['did'];
	if($_GET['decision']==0){
		$sql0 = "UPDATE `tb_declare` SET dstatus = '0' where did = '$id'";
		$query0= mysqli_query($conn,$sql0);	
	}
	if($_GET['decision']==1){
		$sql2 = "UPDATE `tb_declare` SET dstatus = '2' where did = '$id'";
		$query2= mysqli_query($conn,$sql2);
	}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<?php include_once 'header_config.php';?>
<body>
	<div id="wrapper">
		<!-- Navigation-->
        <?php include "menu.php";?>
		<!--//Navigation-->
        <div id="page-wrapper">
        	<!--Content-->
            <div class="graphs">
                <div class="row-fluid" style="padding-bottom:20px;">
                    <div class="span12">
					   <h3 class="text-center fontTitle">
					      信息科学与工程学院教学改革项目申报统计表
					   </h3>
				    </div>
                </div>
			    <div class="row" style="padding-left:40px; padding-right:50px;">
					<!--浏览时条件查询-->
                    <?php include_once 'select_declare.php';?>
				    <div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				        <div class="panel-body no-padding">			
				            <form name="form1" method="get">
				                <table class="table table-hover table-condensed" style="padding: 8px;height:1;padding: 5px;vertical-align: top;border-top: 1px solid #ddd">
						            <thead>
							           <tr>
								         <th>#</th>
								         <th>项目名称</th>
								         <th>项目编号</th>
								         <th>项目负责人</th>
								         <th>项目类型</th>
								         <th>年份</th>
								         <th>审核状态</th>
								         <th>经费</th>
								         <th>余额</th>
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
									$manname = $_GET['dmanname'];
									$time = $_GET['dtime'];
									$type = $_GET['dtype'];
									
									if($time == ""){
										 if($manname == "" ){
										 	$sql = "SELECT * FROM tb_declare WHERE dtype = '教学改革项目' ORDER BY did DESC LIMIT $startPage,$pageSize";
										 }else{
										 	$sql = "SELECT * FROM tb_declare WHERE dtype = '教学改革项目' AND dmanname = '$manname' ORDER BY did DESC LIMIT $startPage,$pageSize";							 	
										 }
									}else{
									    if($manname == "" ){
											$sql = "SELECT * FROM tb_declare WHERE dtype = '教学改革项目' AND dtime = '$time' ORDER BY did DESC LIMIT $startPage,$pageSize";
										 }else{
										 	$sql = "SELECT * FROM tb_declare WHERE dtype = '教学改革项目' AND dmanname = '$manname' AND dtime = '$time' ORDER BY did DESC LIMIT $startPage,$pageSize";
										 }							 
									}
									$result = mysqli_query($conn,$sql);
									//显示数据
		                            $col1 = "active";	    //设置记录行背景颜色为白色
									$col2 = "success";//设置记录行背景颜色为灰色
									$col = $col2;
									$row_num = mysqli_num_rows($result);
									for($i=0;$i<$row_num;$i++){
										$row = mysqli_fetch_array($result);
										if($col == $col1){
											$col = $col2;
										}else{
											$col = $col1;
										}
										$did = $row['did'];//当前行id
										$dproname = $row['dproname'];
										$dnumber = $row['dnumber'];
										$dmanname = $row['dmanname'];
										$dtype = $row['dtype'];								
										$dtime = $row['dtime'];
										$dstatus = $row['dstatus'];
										$dmoney = $row['dmoney'];
										$dbalance = $row['dbalance'];
										?>
										<tr class="<?php echo $col;?>" style="vertical-align:top;border-top: 1px solid #ddd;vertical-align:bottom;border-bottom: 2px solid #ddd">
											<td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"></td>
							                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><!-- 在标题上添加连接 -->
							                   <a href="javascript:void(0)" onclick="javascript:window.open('read_declare.php?note_id=<?php echo $did;?>','_blank','toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=1, resizable=0, titlebar=1, width=900, height=500, left=288, top=184')"><?php echo $dproname;?></a>
							                </td>
							                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><?php echo $dnumber;?></td>
							                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><?php echo $dmanname;?></td>
							                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><?php echo $dtype;?></td>
							                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><?php echo $dtime;?></td>
							                <!-- 根据dstatus的值输出不同的颜色 1：显示同意 2：显示已同意 -->
							                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd;<?php if($dstatus == 1){echo 'color:blue;';}elseif($dstatus == 2){echo 'color:green';}elseif($dstatus==0){echo 'color:red';}?>">
							                <?php
							                	if($dstatus == 1){?>
								                	<a href ="scan_declare_3.php?did=<?php echo $did;?>&decision=1"><?php echo "同意";?>&nbsp;|</a>
								                	<a href ="scan_declare_3.php?did=<?php echo $did;?>&decision=0"><?php echo "拒绝";?></a>
							               <?php }else{
								                	if($dstatus==0){
								                		echo "已拒绝";
								                	}else{
								                		echo "已同意";
								                	}
							                	}?>
							                </td>
							                <td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><?php echo $dmoney;?></td>
											<td style="padding:8px;line-height:0.5;vertical-align:top;border-top:1px solid #ddd"><?php echo $dbalance;?></td>	
							            </tr>
									    <?php
											}
										?>
						           </tbody>
				                </table>
				            </form>	
				        </div>
				    </div>
			    </div>		
			 	<div class="row" style="padding-left:40px; padding-right:50px;">
			        <div  class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			            <div class="panel-body no-padding">
				            <nav class="pull-right">
					            <ul class="pagination fontTitle" style="margin:0;font-size:14px;line-height:2">
						        <?php //显示分页条
								
								//获取数据总条数
								if($time == "" && $manname == ""){
									$total_sql = "SELECT COUNT(*) FROM tb_declare WHERE dtype = '教学改革项目'";
								}elseif($time == "" && $manname != ""){
									$total_sql = "SELECT COUNT(*) FROM tb_declare WHERE dmanname = '$manname' AND dtype = '教学改革项目'";
								}elseif($time != "" && $manname == ""){
								    $total_sql = "SELECT COUNT(*) FROM tb_declare WHERE dtime = '$time' AND dtype = '教学改革项目'";
								}elseif($time != "" && $manname != ""){
									$total_sql = "SELECT COUNT(*) FROM tb_declare WHERE dtime = '$time' AND dmanname = '$manname' AND dtype = '教学改革项目'";
								}
								$total_result = mysqli_fetch_array(mysqli_query($conn,$total_sql));//错误原因：变量写错$totla_result跟$total_result不对应
								//var_dump($total_result);
								$total = $total_result[0];//数组第0个键值里就包含了所有的信息
								//计算页数
								$total_pages = ceil($total/$pageSize);
								//计算偏移量
								$pageoffset = ($showPage-1)/2;
								//判断是否显示首页上一页及尾页下一页
								$name = '&dmanname='.$manname;
								$select_year = '&dtime='.$time;
								$d = $name.$select_year;
								$page_banner = "";
								if($page>1){
									$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=1.$d'>首页</a></li>";
									$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($page-1).$d."'>上一页</a></li>";
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
									$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".$i.$d."'>{$i}</a><li>";
								}
								//尾部省略
								/* if($total_pages > $showPage&&$total_pages >$page + $pageoffset){
									$page_banner.="<li>...</li>";
								} */
								if($page<$total_pages){
									$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($page+1).$d."'>下一页</a></li>";
									$page_banner.="<li><a href='".$_SERVER['PHP_SELF']."?p=".($total_pages).$d."'>尾页</a></li>";
								}else{
									$page_banner.="<li><span>下一页</span></li>";
									$page_banner.="<li><span>尾页</span></li>";
								}	
								$page_banner .= "&nbsp;&nbsp;共 $total_pages 页";
								$page_banner .= '<form action="scan_cost_3.php" method="get" style="display:inline;">';
								$page_banner .= '&nbsp;&nbsp;到第&nbsp;<input autocomplete="off" class="input-sm" name="p" size="3" style="border:1px; background-color:#f0eaf1;" type="text">&nbsp;页&nbsp;';
								$page_banner .= '<button class="btn btn-sm btn-info" type="submit" value="确定">确定</button>';
								$page_banner .= '</form>';
								echo $page_banner;
							   ?>
					           </ul>
				            </nav>
			            </div>
			        </div>
			    </div><!--//Content -->
				<!--footer-->
				<?php include_once 'footer.php';?>
				<!--//footer-->
			</div><!-- //container-fluid -->
      	</div><!-- /#page-wrapper -->
   	</div><!-- /#wrapper -->
   	<?php include "message.php";?>
	<!-- Metis Menu Plugin JavaScript -->
	<script>
		function look(){
			document.formyear.action="scan_declare_3.php";
			}
		function out(){
			document.formyear.action="export_declare.php";
			}

	</script>
</body>
</html>