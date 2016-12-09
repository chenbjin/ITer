
    <div class="ui grid">
        <div class="eight column row">
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
        <div class="eight column row">
            <div class="five wide column"></div>
            <div class="six wide column">
                <div class="ui teal segment">
                    <?php   if($error): ?>
                    <div class="ui error message">
                      <i class="close icon"></i>
                      <div class="header">
                          <strong>Warning: </strong>该公司名已被注册！
                      </div>
                    </div>
                    <?php endif; ?>
                    <h3 class="ui huge center aligned header">账户注册</h3>
					
					<form class="form-signin"  action = "<?php echo base_url("/company/regist");?>" method="post">
                        <div class="ui form">
                            <div class=" field">
                                <label>公司名</label>
                               <input type="text"  name="name"  required autofocus></div>
                            <div class=" field">
                                <label>密码</label>
                               <input type="password"  name="password"   required ></div>
								  <div class=" field">
                                <label>邮箱</label>
                             <input type="email"  name="email"  required ></div>
								  <div class=" field">
                                <label>移动电话</label>
                                <input type="text"  name="mobile" required ></div>
								  <div class=" field">
                                <label>固定电话</label>
                               <input type="text"  name="tel"   required ></div>
								
                            <div class=" field">
                                <label>公司地址</label>
                               <input type="text"  name="address" required></div>
							<div class=" field">
                                <label>公司简述</label>
                            <input type="text"  name="description" required></div>
                            <input type="hidden" name="submitted" value="true">
                            <span style="float: right; color: #3f65b5;">
							<a href="<?php echo base_url('/company/login')?>">已有帐号？</a>
                        </div>
                        
                    <input type = "submit" class ="ui teal fluid submit button" value="确认注册">
					</form>
                </div>
            </div>
            <div class="five wide column"></div>
        </div>
    </div>