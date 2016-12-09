<div class="row">
        <div class="col-sm-3">
              <div class="list-group">
			  <!--这里要修改，成获取自己简历的名称，简历列表这里不需要用超链接-->
			  
                <a href="#" class="list-group-item active">简历列表</a>
				<?php
				
					$CurrentResumeID= -1;
					//先假设现在最近的一个简历ID是-1，在循环中控制，得到最近使用的简历,这里有作用域的问题，在下面的页面中获取不到...,用data吧.
                    if($careerid_list !="false")
                      		{
                      			foreach($careerid_list as $row)
                      			{
                      				?>
									<a href= "<?php echo site_url("/index.php/iter/mysetting/".$row['ResumeID'])?>" class="list-group-item"><?php 
									if($row['resumename'])
									echo $row['resumename'];
									else
									
									echo "简历".$row['ResumeID']?></a>
									<?php
									$CurrentResumeID = $row['ResumeID'];
                      			}
                      		}	
				?>
				
				
				<!--获取得到简历个数-->
            </div>
			  <div class="list-group">
				<a href="<?php echo base_url("/index.php/resume/createresume/".$userid)?>" class="list-group-item active">新建简历</a>
			  </div>
        </div>
	
		  
			   