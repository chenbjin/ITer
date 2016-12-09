<div class="ui red segment">
					<a href="meetinglist.php">
						<div class="ui red ribbon label">
							宣讲会
							<i class="hand up icon"></i>
						</div>
					</a>

					<div class="ui  divider"></div>
					<div class="ui list">
						<?php foreach ($meeting as $meet) : ?>
						<a class="item" href="<?php echo base_url("/iter/meetingDetial")?>/<?php echo $meet['MeetingID']?>">
							<i class="right triangle icon"></i>
							<?php echo $meet['MeetingName'];?>
						</a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>