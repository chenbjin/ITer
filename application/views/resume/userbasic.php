        <div class="three column row">
        	<div class="four wide column"></div>
        	<div class="eight wide column">
        		<div class="ui  piled segment">
        			<div class="ui teal segment">
        				<h3>基本信息</h3>

        				<div class="ui  form ">
        					<div class="ui divider"></div>
        					<?php
        					$attributes = array('class' => 'form-horizontal','role' => 'form');              
        					echo form_open( base_url("/resume/updatebasic"),$attributes);
        					?>
        					
        					<input type="text"  id="userid" style="display:none"name="userid" value="<?php echo $userid?>">

        					<div class="inline  field">
        						<label>
        							性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：
        						</label>
        						<input type="text" id="gender" name="gender" placeholder = "男/女" required autofocus ></div>
        						
        						<div class="inline field">
        							<label>家庭住址：</label>
        							
        							<input type="text" id="address" name="address"  required>
        						</div>

        						<div class="inline  field">
        							<label>出生日期：</label>
        							<input type="text" class="form-control" onfocus="HS_setDate(this)"  id="born" name="born" required>
        						</div>
        						<div class="inline field">
        							<label>手机号码：</label>
        							<input type="text" id="phone" name="phone" required ></div>
        							<div class="inline field">
        								<label>邮箱地址：</label>
        								<input type="text" id="email" name="email" required></div>
        								<div class="inline field">
        									<label>政治面貌：</label>
        									<input type="text" id="politicystate" name="politicystate" required></div>
        									<input type="submit" class="ui teal fluid submit button" value="下一步">
        								</form>
        							</div>
        						</div>
        					</div>
        				</div>

        				<div class="four wide column">
        				</div>
        			</div>



