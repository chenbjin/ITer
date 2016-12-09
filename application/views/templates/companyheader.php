<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php echo $title;?></title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="<?php echo base_url("/static/css/font.css");?>" rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/static/css/semantic.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/static/css/all.css");?>">
	<script src="<?php echo base_url("/static/js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/semantic.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/all.js");?>"></script>
	<script src="<?php echo base_url("/static/js/city.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/modal.js");?>"></script>
	<script src="<?php echo base_url("/static/js/date.js");?>"></script>
</head>
<body class = "companyhead">
  <div  id = "banners" class="ui stay teal inverted menu">
    <a class="item" href="<?php echo base_url("/iter")?>" <i class="home icon"></i>
      ITers
    </a>
    <a class="item" href="<?php echo base_url("/company")?>"> <i class="mail icon"></i>
      已发职位
    </a>
    <a class="item" href="<?php echo base_url("/company/pushCareer")?>">
      <i class="mail icon"></i>
      发布职位
    </a>
    <a class="item" href="<?php echo base_url("/company/MeetingList")?>">
      <i class="bullhorn icon"></i>
      宣讲会
    </a>
    <a class="item" href="<?php echo base_url("/company/pushMeeting")?>">
      <i class="bullhorn icon"></i>
      发布宣讲会
    </a>
    <div class="right menu">
		
        <?php if((isset($company) && $company==TRUE))
		  {
			
          $company = ($this->session->userdata('company'));
         
		?>
		 
	     
		 <div class="ui dropdown link item">

                <i class="user icon"></i>
             <?php  echo $company['name'];?>
       
        <i class="dropdown icon"></i>

        <div class="menu">
          <a class="item" href="<?php echo base_url("/company/resetpwd/".$company['name']);?>">修改密码</a>
          <a class="item" href="<?php echo base_url("/company/logout");?>">退出</a>

        </div>
		<?php
		}
		else
		{
		?>
		<a class="item" href="<?php echo base_url("/company/regist");?>">
                <i class="user icon"></i>
                注册
            </a>
            <a class="item" href="<?php echo base_url("/company/login");?>">
                <i class="user icon"></i>
                登陆
            </a>
		<?php 
		}
		?>	
      </div>

    </div>

  </div>
<br><br><br><br><br><br>
 <script type="text/javascript">
  $(document).ready(function() {
      var tree1 = document.getElementById("banners");
      var lis = tree1.getElementsByTagName('a');
      lis[<?php echo $type;?>].setAttribute("class","active item");
    })
</script>