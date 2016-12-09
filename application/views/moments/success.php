<div class="three column row">
    <div class="four wide column"></div>
    <div class="eight wide column">
		<?php   if($success):	?>
		<div class="ui success message">
		  <i class="close icon"></i>
		  <div class="header">
		      <strong>Congraduation: </strong>经验发布成功，
		  		<a href="<?php echo base_url('/moments/getTopic');?>">请点这里返回查看！</a>
		  </div>
		        </div>
		<?php endif; ?>
	</div>
	<div class="four wide column"></div>
</div>