		<div class="three column row">
			<div class="four wide column"></div>
			<div class="eight wide column">
				
				<div class="ui  teal  segment">
                    <div class="ui comments">
						<?php if($reply != 0) {
	  					foreach ($reply as $item): ?>
		                <div class="comment">
		                  <div class="avatar">
		                          <i class="user icon large blue inverted  circular"></i>
		                  </div>
		                  <div class="content">
		                  	<div class="text">
		                      	<a class="author"><?php echo $item['UserName'];?></a>
		                          : <?php echo $item['ReplyContent'];?>
		                      </div>    
		                      <div class="text" style="color: #808080">
		                          评论我的话题 "<a href="<?php echo base_url("/moments/topicDetial")?>/<?php echo $item['TopicID']?>"><?php echo $item['TopicTitle'];?></a> "
		                      	<div class="mini ui button">
								          <a class="button" href="<?php echo base_url("/moments/updateReply")?>/<?php echo $item['ReplayID']?>">阅</a>
		 
								        </div>

		                      </div>  
		                      <div class="metadata">
		      
		                          <span class="date"><?php echo $item['ReplyTime'];?></span>
		                      </div>
		                                     
		                </div>
		                <div class="ui divider"></div>
		                <?php endforeach; } ?>
	  				</div>
	  					
					<div class="fluid circular ui teal button">加载更多</div>
				</div>
					

			</div>
			</div>
			<div class="four wide column"></div>
		</div>
	</div>