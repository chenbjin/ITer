  <div  class="ui segment">
  	<h4>校园工作：</h4>
  	<table class="ui compact table segment">
  		<thead>
  			<tr>
  				<th>起止时间</th>
  				<th>工作单位</th>
  				<th>职位</th>
  				<th>职务描述</th>
  				<th>管理</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  			if($schoolwork_items)
  			{         
  				foreach($schoolwork_items as $row)
  				{
  					echo "<tr>";
  					echo "<td>";
  					echo $row['schoolworkstarttime'];
  					echo "--";
  					echo  $row['schoolworkendtime'];
  					echo "</td>";
  					echo "<td>";
  					echo $row['schoolworkplace'];
  					echo "</td>";
  					echo "<td>";
  					echo $row['schoolworkcareer'];
  					echo "</td>";
  					echo "<td>";
  					echo $row['schoolcareerinfo'];
  					echo "</td>";
  					echo ' <td>
  				';
  					echo '<a href="';
  					echo base_url('/resume/deleteschoolworkbyid/'.$row['id']);
  					echo '"> <div class="ui red mini button">删除</div></a></td>';
  					echo "</tr>";

  				}
  			}
  			?>
  		</tbody>
  	</table>
  	<div class="ui teal  aschool button"><i class="ui add icon"></i>添加</div>
  </div>


  <div class="ui small aschool modal">
  	<i class="close icon"></i>
  	<div class="header">添加校园工作经历</div>
  	<div class="content">
  		<div class="left">
  			<i class="massive tags  icon"></i>
  		</div>
  		<div class="right">
  			<form role="form"  name="schoolworkform" id="schoolworkform" method="post">
  				<div class="ui form mini">
  					<div class="inline field">
  						<label>开始时间：</label>
  						<input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="foredustarttime" name="foredustarttime"></div>

  						<div class="inline field">
  							<label>结束时间：</label>
  							<input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="foreduendtime" name="foreduendtime"></div>
  							<div class="inline field">
  								<label>工作单位：</label>
  								<input type="text" id="foreduworkplace" name="foreduworkplace"></div>
  								<div class="inline field">
  									<label>职位名称：</label>
  									<input type="text" id="foreducareer" name="foreducareer" ></div>
  									<div class=" field">
  										<label>职务描述：</label>
  										<textarea id="foreducareerinfo" name="foreducareerinfo"></textarea>

  									</div>
  								</div>

  							</form>
  						</div>
  					</div>
  					<div class="actions">
  						<div class="ui black button">取消</div>
  						<div class="ui positive right labeled icon submit button" onclick="functioneditedu()">
  							添加
  							<i class="checkmark icon"></i>
  						</div>
  					</div>
  				</div> 



  				<script type="text/javascript">

  					function functioneditedu()
  					{


  						xmlHttp = GetXmlHttpObject();
  						if (xmlHttp==null)
  						{
  							alert ("Browser does not support HTTP Request")
  							return;
  						}
  						var foredustarttime = document.getElementById("foredustarttime");
  						var foreduendtime = document.getElementById("foreduendtime");
  						var foreduworkplace = document.getElementById("foreduworkplace");
  						var foreducareer = document.getElementById("foreducareer");
  						var foreducareerinfo = document.getElementById("foreducareerinfo");

  						var url="<?php echo base_url('/resume/addschoolwork')?>/<?php echo $CurrentResumeID;?>/<?php echo $userid;?>";
						//alert(url);
						xmlHttp.open("POST",url,true); 
						xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
						xmlHttp.send("foredustarttime="+foredustarttime.value+"&foreduendtime="+foreduendtime.value+"&foreduworkplace="+foreduworkplace.value+"&foreducareer="+foreducareer.value+"&foreducareerinfo="+foreducareerinfo.value);
						//alert("添加语言信息成功2!");
						xmlHttp.onreadystatechange=stateChanged;
					}


				</script>