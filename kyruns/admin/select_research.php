<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	<div class="panel-body no-padding">
		<form  name="formyear" method="get" class="form-inline" >
			<div class="form-group col-md-12" style="padding: 0 15px 0;">
				<div class="row">
					<span class="col-md-3">
						<label for="name">作者</label>
						<input name="tcname" autocomplete="off" value="<?php echo $_GET['tcname'];?>" style="background-color:#FFFFFF; height:30px; padding: 5px 10px;font-size:12px;line-height:2;border:1px solid #ccc;border-radius:3px; width:70%;" type="text">
					</span>
					<span class="col-md-3">
					<label for="name">选择年份</label>
					<select class="input-sm" id="year1" name="select-date" style="width:70%;border:1px solid #ccc;">
						<option value="<?php echo $_GET['select-date']?>"><?php if($_GET['select-date']==''){echo "所有年份";}else{echo $_GET['select-date'];}?></option>
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
					</span>
					<span class="col-lg-3"> 
						<input type="submit" class="btn btn-default btn-sm btn-block" onclick="look()" value="查看">
					</span>
					<span class="col-lg-3"> 
						<input type="submit" class="btn btn-default btn-sm btn-block" onclick="out()" value="导出">
					</span>
				</div>
			</div>					
		</form>
	</div>
</div>