 <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="找工作、找实习、找兼职">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">搜索</button>
              </span>
            </div>
            <!-- /input-group -->
            <div class="col-sm-3"></div>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-sm-6">

            <div class="panel panel-default">
              <div class="panel-heading">招聘信息</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h5>
                      <a href="<?php echo base_url('/career/getCareer/1') ?>">校园招聘：</a>
                    </h5>
                  </div>
                  <div class="col-md-3 col-md-offset-6">
                    <h5>
                      <a href="<?php echo base_url('/career/getCareer/1') ?>">更多>></a>
                    </h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <table >

                    <?php foreach ($fulljob as $job ) { ?>
                        <div class="col-sm-5"><a href = "<?php echo base_url('/career/jobMsg/').'/'.$job['CareerID']?>">
                    <?php  echo $job['CareerName']; ?>
                       </a></div> 
                       <div class="col-sm-4"><?php echo $job['WorkPlace'];?></div>
                       <div class="col-sm-3"><?php echo $job['CompanyName'];?></div> 
                       
                    <?php } ?>  
                     
                      </table>                 
                  </div>
                </div>
              </div>
              <ul class="list-group">
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5>
                        <a href="<?php echo base_url('/career/getCareer/2') ?>">实习招聘：</a>
                      </h5>
                    </div>
                    <div class="col-md-3 col-md-offset-6">
                      <h5>
                        <a href="<?php echo base_url('/career/getCareer/2') ?>">更多>></a>
                      </h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                    <table >
                        
                    <?php foreach ($intership  as $job ) { ?>
                        <div class="col-sm-5"><a href = "<?php echo base_url('/career/jobMsg/').'/'.$job['CareerID']?>">
                    <?php  echo $job['CareerName']; ?>
                       </a></div> 
                       <div class="col-sm-4"><?php echo $job['WorkPlace'];?></div>
                       <div class="col-sm-3"><?php echo $job['CompanyName'];?></div> 
                       
                    <?php } ?>  
                     
                      </table>  

                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5>
                        <a href="<?php echo base_url('/career/getCareer/3') ?>">兼职招聘：</a>
                      </h5>
                    </div>
                    <div class="col-md-3 col-md-offset-6">
                      <h5>
                        <a href="<?php echo base_url('/career/getCareer/3') ?>">更多>></a>
                      </h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                     <table >
                        
                    <?php foreach ($parttimejob  as $job ) { ?>
                        <div class="col-sm-5"><a href = "<?php echo base_url('/career/jobMsg/').'/'.$job['CareerID']?>">
                    <?php  echo $job['CareerName']; ?>
                       </a></div> 
                       <div class="col-sm-4"><?php echo $job['WorkPlace'];?></div>
                       <div class="col-sm-3"><?php echo $job['CompanyName'];?></div> 
                       
                    <?php } ?>  
                     
                      </table>  
 
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="panel panel-default">
              <div class="panel-heading">经验分享</div>
              <div class="panel-body">
                 <a href="expri-passage.php">java程序员面试经验分享</a>
                 <p></p>
                  <p>腾讯后台面经 </p>
                  <p>腾讯面经 </p>
                </li>
              </div>
                <ul class="list-group">
                <li class="list-group-item">
                  <a href="#">PHP程序员面试经验分享</a>
                  <p></p>
                  <p>PHP面试十问</p>
                </li>
                <li class="list-group-item">
                   <a href="#">PHP程序员笔试经验分享</a>
                   <p></p>
                   <p>PHP笔试注意事项</p>

                </li>
              </ul>
              </div>
            </div>
          
        </div>
