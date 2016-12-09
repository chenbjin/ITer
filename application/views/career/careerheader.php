<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>ITers</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="<?php echo base_url("/static/css/font.css");?>" rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/static/css/semantic.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/static/css/all.css");?>">
	<script src="<?php echo base_url("/static/js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/semantic.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/all.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/modal.js");?>"></script>
	<script src="<?php echo base_url("/static/js/date.js");?>"></script>
</head>
<body>
	<div id = "banners" class="ui teal inverted stay menu">
		<a class="item" href="<?php echo base_url("/iter")?>"> <i class="home icon"></i>
			ITers
		</a>
		<a class="item" href="<?php echo base_url("/career/getCareer/1");?>"> <i class="mail icon"></i>
			正职招聘</a>
			<a class="item" href="<?php echo base_url("/career/getCareer/2");?>"> <i class="mail icon"></i>
				实习招聘</a>
				<a class="item" href="<?php echo base_url("/career/getCareer/3");?>"> <i class="mail icon"></i>
					兼职招聘</a>
					<a class="item" href="<?php echo base_url("/moments/getTopic");?>"> <i class="mail icon"></i>
						经验交流</a>
						
						<a class="item" href="<?php echo base_url("/iter/getMeeting");?>">
							<i class="bullhorn icon"></i>
							宣讲会
						</a>
						<div class="right menu">
							<?php if((isset($normaluser) && $normaluser==TRUE))
							{
								$iter = ($this->session->userdata('iter'));
								?>
								<a class="item" href="<?php echo base_url("/moments/getUnreadReply/".$iter['name']);?>">
										<i class="bullhorn icon"></i>
										消息
									</a>
								<a class="item" href="<?php echo base_url("/iter/mysetting");?>">我的简历</a>
								<div class="ui dropdown link item">
									<?php  
									
									echo $iter['name'];
									?>
									<i class="dropdown icon"></i>
									<div class="menu">
										<a class="item" href="<?php echo base_url("/iter/resetpwd/".$iter['name']);?>">修改密码</a>
										<a class="item" href="<?php echo base_url("/iter/logout");?>">退出</a>
									</div>
								</div>
								<?php
							}
							else 
							{
								?>
								<a class="item" href="<?php echo base_url("/iter/regist");?>">注册</a>
								<a class="item" href="<?php echo base_url("/iter/login");?>">登录</a>
								<?php 
							}?>	
						</div>
					</div>
				</div>
				<div class="ui grid">
					<div class="three column row">
						<div class="four wide column"></div>
						<div class="eight wide column">
							<div class="ui  transition information">
								<br><br><br>
								<h1 class="ui inverted header"> <strong>ITers学子交流平台</strong>
								</h1>
<script type="text/javascript">
	$(document).ready(function() {
			var tree1 = document.getElementById("banners");
			var lis = tree1.getElementsByTagName('a');
			lis[<?php echo $type;?>].setAttribute("class","active item");
		})
</script>