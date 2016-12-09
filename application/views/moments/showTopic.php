<div class="row">
<div class="col-sm-8">
	<?php foreach ($topic as $item) : ?>
	<div style="display: block;">
	  <h2>
	    <a href="<?php echo base_url("/moments/topicDetial")?>/<?php echo $item['TopicID']?>"><?php echo $item['TopicTitle']; ?></a>
	  	<p style="float: right;font-size: 15px;">
	  		<span><?php echo $item['UserName'];?></span>
	  		<span><?php echo $item['Time'];?>  </span>
	  	</p>
	  </h2>
	  <div id="content">
	    <?php echo $item['TopicContent'];?>
	  </div>
	  <a href="#">评论: <span class="badge"><?php echo $item['ReplyNum'];?></span></a>
	  <hr>
	  <!--
	  <div>
	  		<form class="form-inline" role="form" action="<?php echo base_url("/moments/reply")?>/<?php echo $item['TopicID']?>" method="post">
	  			<div class="form-group">
	  				<input type="text" class="form-control"name="reply" placeholder="写下你的评论..."required>
	  			</div>
	  			<input type="hidden" name="submitted" value="true">
	  			<div class="form-group">
	  				<button class="btn btn-lg btn-primary" type="submit">评论</button>
	  			</div>
	  		</form>

	  </div>
	-->
	</div>
	<?php endforeach; ?>
</div>
<div class="col-sm-2">
	<div style="display: block; float:left; color: #fff;">
		<button class="btn btn-lg" type="submit"><a href="<?php echo base_url("/moments/pushTopic");?>">发布话题</a></button>
	</div>
</div>
</div>
