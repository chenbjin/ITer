    <div class="ui grid stackable ui grid" style="background-image: <?=base_url('/static/img/bg.jpg')?>">
        <div class="three column row">
            <div class="six wide column"></div>
            <div class="four wide column">
                <div class="ui teal segment">
                    <?php   if($error) { ?>
                    <div class="ui error message">
                      <i class="close icon"></i>
                      <div class="header">
                          <strong>用户名或密码错误！</strong>
                      </div>
                        </div>
                    <?php }else { ?>
                    <h3 class="ui huge center aligned header">欢迎</h3>
					<?php }; ?>
                        <div class="ui form" >
                        <form class="form-signin" action = "<?php echo base_url("/iter/login");?>" method="post">
                            <div class="field">
                                <label>用户名</label>
									<input type="text" name="name"  required autofocus>                               
									</div>
                            <div class=" field">
                                <label>密码</label>
                                <input type="password" name="password" required>
								</div>
                            <div class="inline field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="remember" value="true">
                                    <label>记住我</label>
                                </div>
                                <span style="float: right; color: #3f65b5;">
                                    <a href="<?php echo base_url('/iter/regist')?>">注册账号？</a>
                                </span>
                                <span style=" color: #3f65b5;">
                                    <a href="<?php echo base_url('/company/login')?>">公司登陆？</a>
                                </span>
                                 </div>
						<input type = "submit" class ="ui teal fluid submit button" value="登陆">
						</form>
                    </div>        
                </div>
            </div>
            <div class="six wide column"></div>
        </div>
    </div>
</div>
  