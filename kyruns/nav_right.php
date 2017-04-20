<div class="col-md-3" style="padding:0; margin-left:15px;">
    <div class="row" style="background-color:rgb(255,255,255);padding:0 15px 0;">
		<div style="padding:35px 15px 0 15px;">
			<div class="span12 text-left fontTitle">
				<font style="font-size:20px;">站</font>
				<h4 style="display:inline">内导航</h4>
				<hr align="left" style="height:1px;background-color:#DA6426;border:none;width:40%;margin-top:8px;">
				<hr align="right" style="width:60%;margin-top:-21px;">
			</div>
		</div>
		
		<!--右侧导航列表 begin nav nav-pills nav-stacked-->
		
		<div>
		<ul class="list-group" style="padding:10px 15px 30px;">
			<li class="list-group-item">
				<a href="tj_theses.php" class="nav-right-color">论文统计</a>
			</li>
			<li class="list-group-item">
				<a href="tj_undertakeProject.php" class="nav-right-color">承担科研项目</a>
			</li>
			<li class="list-group-item">
				<a href="tj_awards.php" class="nav-right-color">科研获奖统计</a>
			</li>
			<li class="list-group-item">
				<a href="tj_propertyRight.php" class="nav-right-color">知识产权统计</a>  
			</li>
			<li class="list-group-item">
				<a href="tj_competition.php" class="nav-right-color">学生竞赛统计</a>
			</li>
			<li class="list-group-item">
				<a href="tj_industrialization.php" class="nav-right-color">作品产业化统计</a>
			</li>
		</ul>
		</div>
	</div>
	<!--右侧 导航 列表 end-->
	
	<div class="row" style="padding:20px 0 15px; background-color:rgb(235,235,235); "></div><!--上下块间距-->
	
	<!--右侧 查看 搜索 模块儿 begin-->
	<div class="row" style="background-color:rgb(255,255,255); padding:0 15px 0;">
		<div style="padding:15px 15px 0; padding-bottom:0; ">
			<div class="span12 text-left fontTitle">
				<font style="font-size:20px;">统</font>
				<h4 style="display:inline">计浏览</h4>
				<hr align="left" style="height:1px;background-color:#DA6426;border:none;width:40%;margin-top:8px;">
				<hr align="right" style="width:60%;margin-top:-21px;">
			</div>
		</div>
		<div class="row" style="padding:0 30px 20px;">
			<button type="button" class="btn btn-warning btn-sm btn-block" onclick="viewAll()">
				查看统计
			</button>
		</div>
		
	    <div class="row" style="padding:20px 0 15px; background-color:rgb(235,235,235); "></div><!--上下块间距-->

		<div style="padding:15px 15px 0;">
		    <div class="span12 text-left fontTitle">
				<font style="font-size:20px;">分</font>
				<h4 style="display:inline">时浏览</h4>
				<hr align="left" style="height:1px;background-color:#DA6426;border:none;width:40%;margin-top:8px;">
				<hr align="right" style="width:60%;margin-top:-21px;">
			</div>
			<form role="form" name="formyear" method="get">
				<div class="form-group">
				   <label for="name">选择年份</label>
				   <select class="form-control" name="select-date">
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
				<div class="row"style="padding:0 15px 25px;">
					<input type="submit" class="btn btn-warning btn-sm btn-block" onclick="look()"value="查看">
			    </div>
		    </form>
		</div>
	</div>
	<!--右侧查看搜索模块儿 end-->
</div>