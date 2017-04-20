<div class="row">
	<div class="col-md-12">
		<nav class="navbar navbar-default navbar-fixed-top navbar-inverse"
			role="navigation" style="padding-right: 20px;">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">切换导航</span><span class="icon-bar"></span><span
						class="icon-bar"></span><span class="icon-bar"></span>
				</button>
				<span class="navbar-brand"><font color="#FFFFFF">科研管理系统</font></span>
			</div>

			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown">科研统计<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li class="dropdown-submenu"><a tabindex="-1" href="">论文</a>
								<ul class="dropdown-menu">
									<li><a tabindex="-1" href="tj_theses.php">统计论文</a></li>
									<li><a tabindex="-1" href="scan_tj_theses.php">浏览论文</a></li>
								</ul></li>
							<li class="dropdown-submenu"><a tabindex="-1" href="">承担项目</a>
								<ul class="dropdown-menu">
									<li><a tabindex="-1" href="tj_undertakeProject.php">统计项目</a></li>
									<li><a tabindex="-1" href="scan_tj_underpro.php">浏览项目</a></li>
								</ul></li>
							<li class="dropdown-submenu"><a tabindex="-1" href="">科研获奖</a>
								<ul class="dropdown-menu">
									<li><a tabindex="-1" href="tj_awards.php">统计获奖情况</a></li>
									<li><a tabindex="-1" href="scan_tj_awards.php">浏览统计</a></li>
								</ul></li>
							<li class="dropdown-submenu"><a tabindex="-1" href="">知识产权</a>
								<ul class="dropdown-menu">
									<li><a tabindex="-1" href="tj_propertyRight.php">统计产权</a></li>
									<li><a tabindex="-1" href="scan_tj_propertyRight.php">浏览统计</a>
									</li>
								</ul></li>
							<li class="dropdown-submenu"><a tabindex="-1" href="">学生竞赛</a>
								<ul class="dropdown-menu">
									<li><a tabindex="-1" href="tj_competition.php">竞赛统计</a></li>
									<li><a tabindex="-1" href="scan_tj_competition.php">浏览统计</a></li>
								</ul></li>
							<li class="dropdown-submenu"><a tabindex="-1" href="">作品产业化</a>
								<ul class="dropdown-menu">
									<li><a tabindex="-1" href="tj_industrialization.php">产业化统计</a>
									</li>
									<li><a tabindex="-1" href="scan_tj_industrialization.php">浏览统计</a>
									</li>
								</ul></li>
						</ul></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown">项目申报<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="declare.php">项目申报</a></li>
							<li><a href="scan_declare.php">项目浏览</a></li>
						</ul></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown">费用报销<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="cost.php">费用报销</a></li>
							<li><a href="scan_cost.php">查看状态</a></li>
							<!--<li class="divider">这个可以添加横隔线</li>-->
						</ul></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="exit.php" target="_parent">退出</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a style="color:#FFFFFF;">欢迎您：<?php echo $_SESSION['username'];?>&nbsp;老师&nbsp;|</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>