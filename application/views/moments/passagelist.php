		<div class="three column row">
			<div class="four wide column"></div>
			<div class="eight wide column">
				
				<div class="ui piled segment">
					<div class="ui blue ribbon label">经验交流</div>
                    <a href="<?php echo base_url("/moments/pushTopic");?>"><div class=" ui teal label"><i class="add icon"></i> 我要发文章</div></a>

                    <div class="ui divided list">
                    	<?php foreach ($topic as $item) : ?>
                    	  <div class="item">
						      <div class="right floated">	  						
	  							<?php echo $item['Time'];?>
	  						  </div>
	  						  <div class="right floated">
	  						  <a href="<?php echo base_url("/moments/topicDetial")?>/<?php echo $item['TopicID']?>">	
	  						   <i class="right comment outline icon"></i>  						
	  							<?php echo $item['ReplyNum'];?>条评论
	  						  </a>
	  						  </div>
						      <i class="right attachment icon"></i>
						      <div class="content">
						      	<div class="header">
							      	<a href="<?php echo base_url("/moments/topicDetial")?>/<?php echo $item['TopicID']?>">
										<?php echo $item['TopicTitle']; ?>
									</a>
								</div>
						      </div>
						  </div>
                    	<?php endforeach; ?>
	  				</div>
	  					
					<div class="fluid circular ui teal button">加载更多</div>
				</div>
					

			</div>
			</div>
			<div class="four wide column"></div>
		</div>
	</div>