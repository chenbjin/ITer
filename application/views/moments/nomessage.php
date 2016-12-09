<div class="three column row">
    <div class="four wide column"></div>
    <div class="eight wide column">
		<?php   if($nomessage):	?>
		<div class="ui success message">
		  <i class="close icon"></i>
		  <div class="header">
		      <strong>Attention: </strong>暂无新消息，
		  		<a href="<?php echo base_url('/moments/getTopic');?>">请点这里查看更多话题！</a>
		  </div>
		        </div>
		<?php endif; ?>
	</div>
	<div class="four wide column"></div>
</div>