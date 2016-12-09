        <div class="three column row">
          <div class="four wide column"></div>
          <div class="eight wide column">
            <div class="ui  piled segment">
              <div class="ui teal segment">
                <h3>教育信息</h3>
                <div class="ui divider"></div>

                <div class="ui form">
                  <?php
                  $attributes = array('class' => 'form-horizontal','role' => 'form');              
                  echo form_open("index.php/resume/update_edu",$attributes);
                  ?>
                  <div class="inline field">
                   
                      <input type="text"  class="form-control" style="display:none"  id="userid"  name="userid" value="<?php echo $userid;?>"></div>
                    
                    <div class="inline field">
                      <label>入学时间：</label>
                      <input type="text"  class="form-control" onfocus="HS_setDate(this)"   required  id="edu-in"  name="edu-in"></div>

                      <div class="inline field">
                        <label>毕业时间：</label>
                        <input type="text"  class="form-control" onfocus="HS_setDate(this)"  required id="edu-out" name="edu-out"></div>

                        <div class="inline field">
                          <label>就读学校：</label>
                          <input type="text"  id="university" name="university" required placeholder=""></div>
                          <div class="inline field">
                            <label>所学专业：</label>
                            <input type="text" id="major" name="major" required placeholder=""></div>
                            <div class="inline field">
                              <label>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;历：</label>
                              <input type="text"  id="xueli" name="xueli"  required placeholder=""></div>
                            <button type="submit" class="ui teal fluid submit button">提交基本建立信息</button>
                          </form>
                           </div>
                        </div>
                      </div>
                    </div>