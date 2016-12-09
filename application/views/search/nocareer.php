<br><br><br><br><br><br>
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
		<?php   if($nocareer):	?>
		<div class="ui success message">
		  <i class="close icon"></i>
		  <div class="header">
		      <strong>关键词: <?php echo $keyword;?> </strong>暂无相应职位，
		  		<a href="<?php echo base_url('/iter');?>">点这里返回主页！</a>
		  </div>
		        </div>
		<?php endif; ?>
	</div>
	<div class="four wide column"></div>
</div>
</div>