<div class="ui grid stackable ui grid">
        <div class="three column row">
            <div class="six wide column"></div>
            <div class="four wide column">

                <div class="ui teal segment">
                <?php   if($error) {  ?>
                <div class="ui error message">
                  <i class="close icon"></i>
                  <div class="header">
                      <strong>该用户名已被注册！</strong>
                  </div>
                        </div>
                <?php }else { ?>
                    <h3 class="ui huge center aligned header">账户注册</h3>
                <?php };?>
					<form class="form-signin"  action = "<?php echo base_url("/iter/regist");?>" method="post">
                        <div class="ui form">
                            <div class=" field">
                                <label>邮箱</label>
                                <input type="text" name="email" required autofocus></div>
                            <div class=" field">
                                <label>用户名</label>
                                <input type="text" name="name" required ></div>
                            <div class=" field">
                                <label>密码</label>
                                <input type="password"  name="password" required></div>
							<div class=" field">
                                <label>电话</label>
                                <input type="text"  name="tel" required></div>
                        </div>
                        <span style="float: right; color: #3f65b5;">
                            <a href="<?php echo base_url('/company/regist')?>">公司注册？</a>
                        </span>
                         <span style="color: #3f65b5;">
                            <a href="<?php echo base_url('/iter/login')?>">已有账号？</a>
                        </span>

                    <input type = "submit" class ="ui teal fluid submit button" value="确认注册">
					</form>
                </div>
            </div>
            <div class="six wide column"></div>
        </div>

    </div>