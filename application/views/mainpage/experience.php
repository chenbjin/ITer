<div class="five wide column">
	<div class="ui teal segment">
		<a href="">
			<div class="ui teal ribbon label">
				经验交流
				<i class="hand up icon"></i>
			</div>
		</a>
		<div class="ui  divider"></div>
		<div class="ui list">
			<?php 
			if(isset($topic))
			{
				if(!empty($topic))
				foreach($topic as $item) 
					{ ?>	
				<a class="item" href="<?php echo base_url("/moments/topicDetial")?>/<?php echo $item['TopicID']?>">
					<i class="right triangle icon"></i>
					<?php echo $item['TopicTitle'];?>
				</a>
				<?php 
			}
			
		}?>

	</div>
</div>
