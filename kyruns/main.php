<?php 
include_once 'conn.php';
user_shell($_SESSION['uid'],$_SESSION['user_shell']);
user_mktime($_SESSION['times']);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>科研管理系统</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet"><!-- 导航条引入效果文件 -->
    <link href="css/tj_common.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
	<!--导航条-->
	<?php include_once 'menu_main.php';?>
	
	<!--轮播图-->
	<div class="row">
	  <div class="col-md-12" style="padding:0; ">
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/1.jpg" style="width:100%" data-src=" " alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>科 研 统 计</h1>
                        <p>信息科学与工程学院科研统计      点击下方按钮进入科研统计页。                 科研统计共6大类 ，包括：论文统计  荣誉奖项  学生竞赛统计 作品产业化  知识产权  教师承担项目统计。</p>
                        <p><a class="btn btn-lg btn-info" href="tj_theses.php" role="button"> Go here ! </a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/2.jpg" style="width:100%" data-src="" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>项 目 申 报</h1>
                        <p>信息科学与工程学院项目申报    项目申报需等待管理员审核，审核通过的项目不能进行更改及删除操作。                  申报项目要仔细    请将申报材料准备齐全  以避免因材料不全造成审核障碍！</p>
                        <p><a class="btn btn-lg btn-info" href="declare.php" role="button"> Go here ! </a></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="img/3.jpg" style="width:100%" data-src="" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>费 用 报 销</h1>
                        <p>费用报销分依托项目和不依托项目两种申请方式  依托项目的申请需等待所依托的项目通过审核后才能进行费用的报销申请。  申请审核通过后系统会屏蔽此次申请的修改及删除操作。</p>
                        <p><a class="btn btn-lg btn-info" href="cost.php" role="button"> Go here ! </a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
	  </div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
		
		    <!--中间部分的文字说明-->
		
			<p class="text-center" style="color:#6D6D6D; padding-top:30px; padding-bottom:50px; ">
				             河北北方学院信息科学与工程学院
				<strong>科研管理系统 </strong> 
				            是面向学校教师及学校科研工作者进行科研统计、项目申报、费用报销的在线申请流程的信息管理服务平台。<br>
				            科研统计包括：统计论文、教师承担科研项目、科研获奖 、知识产权、学生竞赛情况 、作品产业化六项内容；项目进行申报后需等待管理员的审核，<br>
				           审核通过后系统会屏蔽用户对此项目申报的修改及删除操作；费用报销分依托项目的报销申请和不依托项目的报销申请，依托项目的报销<br>
				           申请需等待所依托项目的项目申请通过后才能进行费用报销的申请，申请通过后此次申请不再支持修改及删除操作。<br>
				           如长时间收不到反馈信息请联系管理员（联系方式见站内底部“联系管理员”）。                
				<small></small>
			</p>
			
			<!--主要功能导航-->
			
			<div class="row">
				<div class="col-md-4 col-xs-4">
					<div class="thumbnail">
						<img alt="Bootstrap Thumbnail First" src="img/tongji1.jpg">
						<div class="caption">
							<h3>
								科研统计
							</h3>
							<p>
									您可以点击此处，进行查看统计，一共包括六项内容：论文统计、教师承担项目、科研获奖、知识产权专利、学生竞赛及作品产业化统计。
							</p>
							<p>
								<a class="btn btn-info" href="tj_theses.php">进入统计</a> <a class="text-title btn" href="scan_tj_theses.php">查看条目</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="thumbnail">
						<img alt="Bootstrap Thumbnail Second" src="img/shenbao.jpg">
						<div class="caption">
							<h3>
								项目申报
							</h3>
							<p>
									您可以点击此处，进行查看您所申报的项目是否已通过管理员的审核，若审核状态长时间不被管理员操作，可通过底部链接及时联系管理员。
							</p>
							<p>
								<a class="btn btn-info" href="declare.php">申报入口</a>
								<a class="text-title btn" href="scan_declare.php">查看状态</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-4">
					<div class="thumbnail">
						<img alt="Bootstrap Thumbnail Third" src="img/baoxiao.jpg">
						<div class="caption">
							<h3>
								费用报销
							</h3>
							<p>
									您可以点击此处，快速查看您所申请的费用报销是否通过审核，若在一个审核周期内没有收到管理员的反馈，可通过底部链接及时联系管理员。
							</p>
							<p>
								<a class="btn btn-info" href="cost.php">申报入口</a>
								<a class="text-title btn" href="scan_cost.php">查看状态</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			
		    <!--优秀项目展示的预说明-->
			
			<div class="row" style="color:#686868">
				<p class="text-center" style="padding-top:30px; padding-bottom:50px; font-size:30px;">
					<strong >优秀科研项目展示</strong> 
					<em></em> 
					<small></small>
				</p>
			</div>
						
			<!--优秀项目展示-->
			<?php 
			$sql = "SELECT * FROM tb_dynamic ORDER BY id DESC LIMIT 0,6";
			$result = mysqli_query($conn,$sql);
			$row_num = mysqli_num_rows($result);
			for($i=0;$i<$row_num;$i++){
				$row = mysqli_fetch_array($result);
				$id = $row['id'];//当前行id
				$dtitle = $row['dtitle'];
				$dpath = $row['dpath']; //$dpath显示图片
				$dcontent=$row['dcontent'];
				$dtime = $row['dtime'];
			?>  <div class="col-md-4 col-xs-4">
					<img class="img-circle center-block" style="width:200px;height:200px;" alt="优秀项目" src="admin/<?php echo $dpath;?>">
					<dl id="dl">
						<dt class="text-center" style="color:#DE733B">
                         	<a title="显示详情" href="javascript:void(0)" onclick="javascript:window.open('model.php?id=<?php echo $id;?>','_blank','toolbar=0, location=0, directories=0, status=0, menubar=0, scrollbars=1, resizable=0, titlebar=1, width=800, height=400, left=288, top=184')">&nbsp;<?php echo $dtitle;?></a>
						</dt>
						<dd class="text-center">
                         	<?php echo "$dtime"?>
						</dd>
						<dd class="text-center" style="height:50px;">
							<?php if(strlen($dcontent)>120){ $dcontent = mb_strcut($dcontent,0,120,'utf-8')."......";echo $dcontent;}else{echo $dcontent;}?>
						</dd>
					</dl>
				</div>
			<?php } //end for(){}?>
		</div>
	</div>
	
	<script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!--Footer-->
	<?php include_once 'footer.php';?>
	<!--//footer -->
	</div>
    
  </body>
</html>