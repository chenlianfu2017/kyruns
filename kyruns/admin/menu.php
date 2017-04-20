<?php
$sql5 = "SELECT COUNT(*) FROM tb_message WHERE mstatus = '1'";
$query = mysqli_query ( $conn, $sql5 );
$number = mysqli_fetch_array ( $query );
$num = $number [0];
?>
<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<span class="navbar-brand">科研后台管理系统</span>
	</div>
	<!--navbar-header 在此处可向 Nav 头部添加元素-->
	<ul class="nav navbar-nav navbar-right">
		<li class="m_2" style="padding-top:7px;"><a href="./exit.php"><i class="fa fa-lock"></i>退出</a></li>
		<!--<li class="dropdown">			
			<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
				<img src="images/admin.jpg">
				<span class="badge"><?php echo $num;?></span>
			</a>
			<ul class="dropdown-menu">
				<li class="dropdown-menu-header text-center"><strong>管理员</strong></li>
				<li class="m_2"><a data-toggle="modal" href="bs-example-modal-sm"><i class="fa fa-envelope-o"></i>消息反馈<span class="label label-success"><?php echo $num;?></span></a></li>
				<li class="m_2"><a href="#"><i class="fa fa-user"></i>账户</a></li>
				<li class="m_2"><a href="./exit.php"><i class="fa fa-lock"></i>退出</a></li>
			</ul> 
		</li>-->
	</ul>
	<!--//navbar-header -->
	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li><a href="main.php"><i class="fa fa-home fa-fw nav_icon"></i>主页</a>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gears nav_icon"></i>科研统计<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="scan_tj_theses.php">论文统计</a></li>
						<li><a href="scan_tj_underpro.php">教师承担项目</a></li>
						<li><a href="scan_tj_awards.php">科研获奖统计</a></li>
						<li><a href="scan_tj_propertyRight.php">知识产权统计</a></li>
						<li><a href="scan_tj_competition.php">学生竞赛统计</a></li>
						<li><a href="scan_tj_industry.php">作品产业化</a></li>
					</ul>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text-o nav_icon"></i>项目申报<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="scan_declare.php">全部项目</a></li>
						<li><a href="scan_declare_1.php">科研项目</a></li>
						<li><a href="scan_declare_2.php">科研创新团队</a></li>
						<li><a href="scan_declare_3.php">教学改革项目</a></li>
						<li><a href="scan_declare_4.php">科研创新团队</a></li>
					</ul>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-rmb nav_icon"></i> 费用报销<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="scan_cost.php">所有费用支出</a></li>
						<li><a href="scan_cost_1.php">出差费用报销</a></li>
						<li><a href="scan_cost_2.php">论文费用报销</a></li>
						<li><a href="scan_cost_3.php">耗材费用报销</a></li>
						<li><a href="scan_cost_4.php">其他费用报销</a></li>
					</ul>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user nav_icon"></i>用户管理<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="add_user.php">添加用户</a></li>
						<li><a href="scan_user.php">查看用户</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fa fa-hand-o-right nav_icon"></i>优秀项目展示<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li><a href="dynamic.php">添加项目</a></li>
						<li><a href="scan_dynamic.php">查看项目</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>