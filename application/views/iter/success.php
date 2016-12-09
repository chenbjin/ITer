	<div class="ui grid stackable ui grid">
<div class="three column row">
    <div class="four wide column"></div>
    <div class="eight wide column">
		<?php   if($success):	?>
		<div class="ui success message">
		  <i class="close icon"></i>
		  <div class="header">
		      <strong>Congraduation: </strong>用户注册成功，
		  		<a href="<?php echo base_url('/iter/login');?>">请点这里返回登录！</a>
		  </div>
		        </div>
		<?php endif; ?>
	</div>
	<div class="four wide column"></div>
</div>
</div>