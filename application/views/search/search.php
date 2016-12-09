<div class="ui grid stackable ui grid">
		<div class="three column row">
			<div class="four wide column"></div>
			<div class="eight wide column">
				<form class="ui fluid action input" action="<?php echo base_url('/search/searchJob/')?>" method="post">
					<input type="text" name="keyword" placeholder="找正职、找实习、找兼职" required>
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
					<div class="ui green ribbon label">搜索结果</div>
					<h4>关键字：<?php echo $keyword;?></h4>
					<div class="ui divider"></div>
					<div class="ui list">
					<?php foreach ($result as $job) : ?>
						<a class = "item" href = "<?php echo base_url('/career/jobMsg/').'/'.$job['CareerID']?>">
							<i class="right mail outline icon"></i>
							<?php  echo $job['CareerName']; ?>
						  -----【<?php echo $job['CompanyName'].", ".$job['WorkPlace']." 】";?> 
						</a>
					<?php endforeach;?>
					</div>			
				</div>
			</div>
			<div class="four wide column"></div>
		</div>
	</div>