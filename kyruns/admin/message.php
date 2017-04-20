<?php  
//作为引入的文件，不设置数据库连接和用户登录判断
if($_GET['mid']){
    $id = $_GET['mid'];
	$sql1 = "UODATE tb_message set mstatus = '2' WHERE mtitle = '$title'";
	mysqli_query($sql1);
}
?>
<!-- 模态弹出框 -->
<div class="modal fade  bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             <h4 class="modal-title">意见反馈消息</h4>
         </div>
         <div class="modal-body">
             <div class="container-fluid" style="width:800px;margin-bottom:20px;border-radius:7px;border:0px solid #afb4b5;">
	             <div class="col-md-12" style="background-color: rgb(255, 255, 255);">				
				     <div class="row" style="padding-left: 20px; padding-right: 20px;">
						<!-- 表单2 --><!-- 此表单提交到php函数处理页，进行修改和删除两项操作 -->
					    <form name="form2" method="get">
						    <table class="table">
							    <thead>
								  <tr>
									<th>#</th>
									<th>主题</th>
									<th>作者</th>
									<th>时间</th>								
								  </tr>
							    </thead>
							    <tbody>
								<!--tbody中为要循环输出的内容  -->
								    <?php							
									//1.传入页码  2.根据页码取出数据  3.显示数据+分页条
									$sql = "select * from tb_message WHERE mstatus = '1'";
									$result = mysqli_query($conn,$sql);
									
									//显示数据
		                            $col1 = "active";	    //设置记录行背景颜色为白色
									$col2 = "success";//设置记录行背景颜色为灰色
									$col = $col2;
									$row_num = mysqli_num_rows($result);
									
									while($row = mysqli_fetch_array($result)){
										
										if($col == $col1){
											$col = $col2;
										}else{
											$col = $col1;
										}
									$mid = $row['mid'];
									$title = $row['mtitle'];
									$content = $row['mcontent'];
									$status = $row['mstatus'];
									$time = $row['mtime'];
									$uid = $row['uid'];
									$sql1 = "select * from user_list where uid='$uid'";
									
									$query = mysqli_query($conn,$sql1);
									$row = mysqli_fetch_array($query);
									$name = $row['name'];
									?>
									<tr class="<?php echo $col;?>">
										<td><img src='../img/dot.png'/></td>
										<td><!-- 在标题上添加连接 -->
							             <ul class="nav navbar-nav" style="margin-top:-20px;margin-bottom:-10px;">
								            <li>
								                <a href="message.php?mid=<?php echo $mid;?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $title?></a>
									              <ul class="dropdown-menu">
										             <li><?php echo $content?></li>						
									              </ul>
									        </li>							
							             </ul>					
	                                   </td>
	                                   <td><?php echo $name;?></td>
										<td><?php echo $time;?></td>
	
									</tr>
							  <?php }?>
							    </tbody>
						    </table>
					    </form>
				     </div>
	             </div>
             </div>
             <div class="modal-footer">
                 <a type="button" class="btn btn-default" href="message_read.php" >查看所有</a>
                 <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
             </div>
         </div>
      </div>
   </div>
</div>
