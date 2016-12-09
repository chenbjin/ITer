
<div class="ui grid">
	<div class="three column row">
		<div class="four wide column"></div>
		<div class="eight wide column">
			<div class="ui  transition information">
				<h1 class="ui inverted header"> <strong>ITers学子交流平台</strong>
				</h1>
			</div>

		</div>
		<div class="four wide column"></div>
	</div>
	<div class="three column row stackable ui grid">

		<h2 class = "hidden" id="usersessionname" name="usersessionname" value = '<?php 	
		$iter = ($this->session->userdata('iter'));
		$username = $iter['name'];
		echo $username."'>";
		?></h2>

		<h2 class = "hidden" id="careerid" name="careerid" value = '<?php 	
		echo $job[0]['CareerID']."'>";
		?></h2>

		<div class="ui divider"></div>
	</div>
	<div class="four wide column"></div>

	<div class="three column row stackable ui grid">
		<div class="two wide column"></div>
		<div class="eight wide column">
			
			<div class="ui  segment">
				<div class="ui teal ribbon label">职位详情</div>
				<h3><?php echo $job[0]['CareerName'];?></h3>
				<h4><?php echo $job[0]['CompanyName'];?>公司</h4>
				<hr/>
				<p>工作城市：<?php echo $job[0]['WorkPlace'];?></p>
				<p>招聘人数：<?php echo $job[0]['RecruitingNumbers'];?></p>

				<p>起止时间：<?php echo $job[0]['StartTime']."至".$job[0]['EndTime'];?></p>

				<p>招聘状态：<?php
				$day =date('Y-m-d');
				if(strtotime($job[0]['EndTime']) > strtotime($day))
					echo "招聘中";
				else echo "招聘结束";
				;?></p>
				
				<hr/>
				<p>
					职位描述： 
					<div>
						<?php echo $job[0]['CareerDescription'];?>
					</div>
				</p>
				<p>职位要求：
					<div>
						<?php echo $job[0]['CareerRequire'];?>
					</div>
				</p>
				
				
					<!-- <button  class="btn btn-primary btn-lg btn-block" style="width:30%"data-toggle="modal" 
					<!--data-target="#select-resume" type="button" onclick = "getresumelist()">获取简历信息</button>-->
					<a href="<?php echo base_url("/company/editcareer/".$job[0]['CareerID']);?>">
						<div class="ui green button">编辑</div>
					</a>
					<div class="ui red button">删除</div>


				</div>
			</div>
			<div class="four wide column">




				<div class="ui red segment">
					<div class="ui red ribbon label">申请情况</div>
					<div class="ui divider" ></div>
					未处理：（<span id= "countremain">0</span>）
					<div class="ui list">
						<?php
		 // print_r($resumestatus_item);
						if($resumestatus_item)
						{	
							$counttop = 0;
							foreach($resumestatus_item as $row)
							{
				//echo $row['Status'];
								if($row['Status'] == "已投递")
								{
									$counttop ++;
									echo '<a class="item" href="http://chenbingjin.cn/iter/index.php/preview/getpreview/';
									echo $row['ResumeID'].'/'.'1'.'">';
									echo '<i class="right mail outline icon"></i>';
									echo " 简历 ".$row['ResumeID'];
									echo '</a>';
								}

							}
							echo '<input id= "remains" style="display:none" type = "text" value= '.$counttop.'></input>';
						}
						?>

					</div>
					<div class="ui divider" ></div>
					已处理：（<span id= "countalready" >0</span>）
					<div class="ui list">
						<?php
		 // print_r($resumestatus_item);
						if($resumestatus_item)
						{
							$count = 0;
							foreach($resumestatus_item as $row)
							{
				//echo $row['Status'];
								if($row['Status'] != "已投递")
								{
									$count++;
									echo '<a class="item" href="#">
									<i class="right mail outline icon"></i>';
									echo $row['ResumeID'];
									echo '</a>';
								}
							}
							echo '<input id= "already" type = "text" style="display:none"  value= '.$count.'></input>';
						}
						?>
						<script>
						$(document).ready(
							function ()
							{
								var remains = document.getElementById("remains");
								var countremain = document.getElementById("countremain");
								countremain.innerHTML = remains.value;

								var already = document.getElementById("already");
								var countalready = document.getElementById("countalready");
								countalready.innerHTML = already.value;
							}
							);
						</script>
					</div>
				</div>
			</div>
			<div class="two wide column"></div>
		</div>	


				<!--class="btn btn-primary btn-lg btn-block" style="width:30%"data-toggle="modal" 
				data-target="#select-resume"-->

				<script>
				var xmlHttp

				function getresumelist()
				{ 
					var username = document.getElementById("usersessionname").getAttribute("value");
	//alert(username);
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	}
	var url="http://chenbingjin.cn/iter/resume/getresumeidlist/"
	url=url+username
		//alert(url)
		xmlHttp.onreadystatechange=stateChanged 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
	}

	function stateChanged() 
	{ 
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			var resumelistparent = document.getElementById("resumeidlist");
			var temp = xmlHttp.responseText
			var arr = JSON.parse(temp)
		//alert(arr[0].ResumeID)
		//alert(arr.length)
		for(var i=0;i<arr.length;i++) 
		{ 
			var theOption=document.createElement("option"); 
			theOption.innerHTML=arr[i].ResumeID; 
			theOption.value=arr[i].ResumeID; 
			resumelistparent.appendChild(theOption); 
		}
	} 
}

function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
	{
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
}
catch (e)
{
 //Internet Explorer
 try
 {
 	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
 }
 catch (e)
 {
 	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
}
return xmlHttp;
}

function deliverresume()
{
	var selected = document.getElementById("resumeidlist").value;
	var resumeform = document.getElementById("resumeform").value;
	var careerid = document.getElementById("careerid").getAttribute("value");
	
	document.all("resumeform").setAttribute("action","http://chenbingjin.cn/iter/resume/deliverresume/"+selected+"/"+careerid);
	document.all("resumeform").submit();
}
</script>
