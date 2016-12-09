    <div class="ui grid ">
        <div class="three column row ">
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
            <div class="six wide column"></div>
            <div class="four wide column">
                <div class="ui teal segment">
                    <?php   if($error) { ?>
                    <div class="ui error message">
                      <i class="close icon"></i>
                      <div class="header">
                          <strong>邮箱或密码错误！</strong>
                      </div>
                        </div>
                    <?php }else { ?>
                    <h3 class="ui huge center aligned header">欢迎</h3>
                    <?php }; ?>
						
                        <div class="ui form" >
                        <form class="form-signin" action = "<?php echo base_url("/company/login");?>" method="post">
                            <div class="field">
                                <label>邮箱</label>
									 <input type="text"  name="email" required autofocus>                           
									</div>
                            <div class=" field">
                                <label>密码</label>
                              <input type="password" name="password"  required>
								</div>
                            <div class="inline field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="remember" value="true">
                                    <label>记住我</label>
									 <input type="hidden" name="submitted" value="true">
                                </div>
                                 <span style="float: right; color: #3f65b5;">
                            <a href="<?php echo base_url('/company/regist')?>">注册帐号？</a>
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
  