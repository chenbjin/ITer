        <div class="three column row">
            <div class="six wide column"></div>
            <div class="four wide column">
                <div class="ui teal segment">
                  <?php   if(isset($error)) {  ?>
                  <div class="ui error message">
                      <i class="close icon"></i>
                      <div class="header">
                          <strong>密码不一致！</strong>
                      </div>
                  </div>
                  <?php }else { ?>
                  <h3 class="ui huge center aligned header">修改密码</h3>
                  <?php };?>
                  <div class="ui form">
                      <form action="<?php echo base_url("/index.php/iter/setpw/".$userid)?>" method = "post">
                        <div class=" field">
                           <div class=" field">
                               <div class=" field">

                                <label>新密码：</label>
                                <input type="password" name="password" required autofocus></div>
                                <div class=" field">
                                    <label>确认密码：</label>
                                    <input type="password" name="passwordconfirm"  id="passwordconfirm" required></div>
                                </div>
                                <input type="submit" class="ui teal fluid submit button" value="确定"></input>
                            </div>
                        </form>
                    </div>
                    <div class="six wide column"></div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
