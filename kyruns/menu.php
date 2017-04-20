<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>科研管理系统</title>
    <link href="css/tj_common.css" rel="stylesheet">
    <link href="font/glyphicons-halflings-regular.svg">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="datetimepicker/tcal.css" />
    <link href="css/main.css" rel="stylesheet"><!-- 导航条引入效果文件 -->
</head>
<body style="background-color:rgb(235,235,235);">
<div class="container-fluid">
    <div class="row" style="height:222px;">
		<div class="jumbotron" style="padding:0;">
		    <div class="container" style="background-image:url(img/banner.jpg);padding-top:222px; width:100%; background-repeat:no-repeat; background-size:cover;"></div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="padding:0;">
			<nav class="navbar navbar-default navbar-static-top" role="navigation"  style="padding-right:20px; background-color:rgb(255,255,255); ">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> 
					<a class="navbar-brand" href="main.php">首页</a>
				</div>
				<!--class="active" 高亮显示 -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">科研统计<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a tabindex="-1" href="">论文</a>
									<ul class="dropdown-menu">
										<li>
											<a tabindex="-1" href="tj_theses.php">统计论文</a>
                                        </li>
                                        <li>
											<a tabindex="-1" href="scan_tj_theses.php">浏览论文</a>
                                        </li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="">承担项目</a>
									<ul class="dropdown-menu">
										<li>
											<a tabindex="-1" href="tj_undertakeProject.php">统计项目</a>
                                        </li>
                                        <li>
											<a tabindex="-1" href="scan_tj_underpro.php">浏览项目</a>
                                        </li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="">科研获奖</a>
									<ul class="dropdown-menu">
										<li>
											<a tabindex="-1" href="tj_awards.php">统计获奖情况</a>
                                        </li>
                                        <li>
											<a tabindex="-1" href="scan_tj_awards.php">浏览统计</a>
                                        </li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="">知识产权</a>
									<ul class="dropdown-menu">
										<li>
											<a tabindex="-1" href="tj_propertyRight.php">统计产权</a>
                                        </li>
                                        <li>
											<a tabindex="-1" href="scan_tj_propertyRight.php">浏览统计</a>
                                        </li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="">学生竞赛</a>
									<ul class="dropdown-menu">
										<li>
											<a tabindex="-1" href="tj_competition.php">竞赛统计</a>
                                        </li>
                                        <li>
											<a tabindex="-1" href="scan_tj_competition.php">浏览统计</a>
                                        </li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="">作品产业化</a>
									<ul class="dropdown-menu">
										<li>
											<a tabindex="-1" href="tj_industrialization.php">产业化统计</a>
                                        </li>
                                        <li>
											<a tabindex="-1" href="scan_tj_industrialization.php">浏览统计</a>
                                        </li>
									</ul>
								</li>
							</ul>
						</li>
						<li><a href="#"  class="dropdown active" data-toggle="dropdown">项目申报<strong class="caret"></strong></a>
							    <ul class="dropdown-menu">
								   <li>
									<a href="declare.php">项目申报</a>
								   </li>
								   <li>
									<a href="scan_declare.php">浏览项目</a>
								   </li>
							    </ul>
						   </li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">费用报销<strong class="caret"></strong></a>
						    <ul class="dropdown-menu">
							   <li>
								<a href="cost.php">费用报销</a>
							   </li>
							   <li>
								<a href="scan_cost.php">费用浏览</a>
							   </li>
						    </ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="exit.php" target="_parent">退出</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a style="color:;">当前用户：<?php echo $_SESSION['username'];?>&nbsp;老师 &nbsp;|</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
