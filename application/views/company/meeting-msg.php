	   <div class="ui grid">
        <div class="three column row">
            <div class="four wide column"></div>
            <div class="eight wide column">
                <div class="ui  transition information">
                    <h1 class="ui inverted header"> <strong>ITers学子交流平台</strong>
                    </h1>

                </div>
                <div class="ui divider"></div>

            </div>
            <div class="four wide column"></div>
        </div>
		<div class="three column row">
			<div class="four wide column"></div>
			<div class="eight wide column">
				<div class="ui teal segment">
					<div class="ui orange ribbon label">宣讲会详情</div>
					<h3><?php echo $meeting['MeetingName'];?></h3>
					<h4><?php echo $meeting['CompanyName'];?></h4>
					<hr/>
				
					<p>
						<strong>主要内容：</strong></br>
						<?php echo $meeting['MeetingContent'];?>
					</p>
					<p><strong>宣讲安排：</strong></br>
						<?php echo $meeting['MeetingPlan'];?></p>

						
					</div>
					

				</div>
			</div>
			<div class="four wide column"></div>
		</div>
	</div>