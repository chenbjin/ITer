  <div class="three column row">
    <div class="four wide column"></div>
    <div class="eight wide column">
    	<?php   if(!$login):	?>
		<div class="ui error message">
		  <i class="close icon"></i>
		  <div class="header">
		      <strong>Warming: </strong>请先登录，
		  		<a href="<?php echo base_url('/iter/login');?>">请点这里登录！</a>
		  </div>
		        </div>
		<?php endif; ?>
      <div class="ui segment">
        <div class="ui red ribbon label">发布经验</div>
        <br/><br/>
        <div class="ui form">
          <form class="form-signin" method="post" >
            <div class=" field">
              <label>经验名称：</label>
              <input type="text" name="title" placeholder="标题" required autofocus>
            </div>

            <div class=" field">
              <label>经验内容：</label>
              <textarea name="content" required></textarea>
            </div>
           	<input type="hidden" name="submitted" value="true">
	        <input type="submit" name="submit" value="true" style="display: none"id="commit" >
			<label class="ui  blue submit teal button" for="commit"><i class="icon edit"></i> 发布</label>
       </form>
     </div>
     <div class="four wide column"></div>
   </div>