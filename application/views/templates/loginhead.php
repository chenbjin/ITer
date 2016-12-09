<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>ITers</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="<?php echo base_url("/static/css/font.css");?>" rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/static/css/all.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/static/css/semantic.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/static/css/homepage.css");?>">
	<script src="<?php echo base_url("/static/js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/semantic.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/all.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/modal.js");?>"></script>
</head>

<body class="companyhead">
	<div class="ui inverted page grid masthead segment">
		<div class="row">
			<div class="column">
				<div class="inverted secondary pointing ui menu">
					<a class="item" href="<?php echo base_url("/career/getCareer/1");?>">正职招聘</a>
					<a class="item" href="<?php echo base_url("/career/getCareer/2");?>">实习招聘</a>
					<a class="item" href="<?php echo base_url("/career/getCareer/3");?>">兼职招聘</a>
					<a class="item" href="<?php echo base_url("/moments/getTopic");?>">经验交流</a>
					<a class="item" href="<?php echo base_url("/iter/getMeeting");?>">宣讲会</a>
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
							<a class="item" href="<?php echo base_url("/iter/login");?>">登陆</a>
							<?php 
						}?>	
					</div>
				</div>

			<div class="four column row">
				<div class="four wide column"></div>
				<div class="ten wide column">
					<div class="ui  transition information">
						<h1 class="ui inverted header"> <strong>ITers学子交流平台</strong>
						</h1>
						<p>找工作、找实习、找兼职，问师兄、问师姐、问同学，全都行</p>
					</div>
				</div>
				<div class="two wide column"></div>
			</div>
		</div>
	</div>
	</div>
<br><br><br><br>