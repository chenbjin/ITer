
				</div>
				<div class="ui divider"></div>
				<form class="ui fluid action input" action="<?php echo base_url('/search/searchJob/')?>" method="post">
					<input type="text" name="keyword" placeholder="<?php echo $title;?>" required>
					<input type="submit" name="submit" style="display: none"id="search" >
					<label class="ui  submit teal button" for="search">搜索</label>
				</form>

			</div>
			<div class="four wide column"></div>
		</div>
		<div class="three column row">
			<div class="four wide column"></div>
			<div class="eight wide column">
				<div class="ui piled segment">
					<div class="ui teal ribbon label"><?php echo $title;?></div>
	
					<div class="ui list">
					
					<?php foreach ($fulltime as $job) : ?>
						  <div class="col-sm-5"><a class = "item" href = "<?php echo base_url('/career/jobMsg/').'/'.$job['CareerID']?>">
						<i class="right mail outline icon"></i>
						<?php  echo $job['CareerName']; ?>
						  -----【<?php echo $job['CompanyName'].", ".$job['WorkPlace']." 】";?> </a>   
						</div>
						
					<?php endforeach;?>
					<div class="fluid circular ui teal button">加载更多</div>
					</div>

				</div>
			</div>
			<div class="four wide column"></div>
		</div>
	</div>