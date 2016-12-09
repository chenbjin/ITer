				</div>
				<?php 	$iter = ($this->session->userdata('iter'));
					if(isset($iter['name']))
					{
					?>
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
		</div>
	<div class="three column row">
			<div class="four wide column"></div>
			<div class="eight wide column">
				<div class="ui teal segment">
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
						<blockquote>
						<?php echo $job[0]['CareerDescription'];?>
						</blockquote>
					</p>
					<p>职位要求：
						<blockquote>
						<?php echo $job[0]['CareerRequire'];?>
						</blockquote>
						</p>
					<div class="fluid circular ui teal small apply button" onclick = "getresumelist()">申请职位</div>
					
				</div>
			</div>
			<div class="four wide column"></div>
		</div>
	</div>


<?php }
else
{
	echo '<script>alert("请先登录");</script>';
}?>
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
		var url="http://chenbingjin.cn/iter/resume/getresumeidandnamelist/"
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
		//alert(arr[0].resumename)
		//alert(arr.length)
		for(var i=0;i< arr.length;i++) 
		{ 
			var theOption=document.createElement("option"); 
			if(arr[i].resumename.length==0)
			{
				theOption.innerHTML='<div class="item" >简历'+arr[i].ResumeID+'</div>';
			}
			else
			{
				theOption.innerHTML='<div class="item" >'+arr[i].resumename+'</div>';
			}
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
<div class="ui  small apply modal">
<i class="close icon"></i>
<div class="header">您正在申请该职位</div>
<div class="content">
	<div class="ui left floated header">请选择要投递的简历：</div>
       <div class="ui left floated compact menu">     
      <select  id="resumeidlist" name= "resumeidlist">
      </select>
            </div>
</div>
<form class="form-horizontal" role="form" action ="" id = "resumeform" name = "resumeform" method="post">
<div class="actions">
    <div class="ui black button">取消</div>
   
   <button type="button" class="ui positive right labeled icon button" data-dismiss="modal" onclick="deliverresume()">确定申请
        <i class="checkmark icon"></i>
	</button>
</div>
</form>
</div>