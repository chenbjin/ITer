<div class="three column row">
	<div class="four wide column"></div>
		<div class="eight wide column">
			<div class="ui piled segment">
				<div class="ui orange ribbon label">宣讲会信息</div>
				<div class="ui list">
                    	<?php foreach ($meeting as $meet): ?>
                    	  <div class="item">
						      <div class="right floated">	  						
	  							<?php echo $meet['Time'];?>
	  						  </div>
						      <i class="right attachment icon"></i>
						      <div class="content">
						      	<div class="header">
							      	<a href="<?php echo base_url("/iter/meetingDetial")?>/<?php echo $meet['MeetingID']?>">
										<?php echo $meet['MeetingName']; ?>
									</a>
								</div>
						      </div>
						  </div>
                    	<?php endforeach; ?>
	  			</div>
				<div class="fluid circular ui teal button">加载更多</div>
			</div>
		</div>
	<div class="four wide column"></div>
</div>