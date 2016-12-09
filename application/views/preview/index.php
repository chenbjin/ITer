           <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3><?php
							$iter = ($this->session->userdata('iter'));
							$UserName = $iter['name'];
							
							if($UserName)
							{
							echo $UserName;
							$resumeitems = $resume_items[0];		
						?></h3>
                        <p><?php echo $resumeitems['Gender'];?>, 出生日期：<?php echo $resumeitems['Birth_of_Date'];?></p>
                        <p>地址:<?php echo $resumeitems['Address']; ?></p>
                        <p>手机：<?php echo $resumeitems['Tel']; ?></p>
                        <p>邮箱：<?php echo $resumeitems['Email']; ?></p>
						<div class = "row">
						<div class="col-sm-10">
						<img alt="140x140" src="<?php echo base_url("/uploads/usertx/".$theid.".png")?>" class="img-rounded"/>
						</div>
						</div>
                        <br/>
                        <h4> <strong>教育信息</strong>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3"><?php echo $resumeitems['eduin']." 至 ".$resumeitems['eduout']; ?></div>
                            <div class="col-sm-2"><?php echo $resumeitems['School']; ?></div>
                            <div class="col-sm-2"><?php echo $resumeitems['Major']; ?></div>
                            <div class="col-sm-4"><?php echo $resumeitems['eduxueli']; ?></div>
                        </div>
                        <br/>
                        <h4> <strong>语言能力</strong>
                        </h4>
                        <hr>
					<div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover" id="test" name="test">
                        <thead>
                          <th class="text-muted" id = "categorytitle">语言类别</th>
                          <th class="text-muted" id = "ranktitle">等级</th>
                          <th class="text-muted" id = "scoretitle">分数</th>
						
                        </thead>
                          <tbody>
							
                         

						<?php
							foreach($lang_items_array as $row)
							{
							echo "<tr>";
							echo "<td>";
							echo $row['category'];
							echo "</td>";
							echo "<td>";
							echo $row['rank'];
							echo "</td>";
							echo "<td>";
							echo $row['score']."分";
							echo "</td>";
							}
						?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                        <br/>
                        <h4>
                            <strong>校内职务</strong>
                        </h4>
                        <hr>
						  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted" class = "starttime">起止时间</th>
                          <th class="text-muted" class = "workplace">工作单位</th>
                          <th class="text-muted" class = "career">职位</th>
                          <th class="text-muted" class = "careerinfo">职务描述</th>
                        
                        </thead>
                         <tbody>
	
						<?php 
						foreach($schoolwork_items as $row)
							{
							echo "<tr>";
							
							echo "<td>";
							echo $row['schoolworkstarttime']."至".$row['schoolworkendtime'];
							echo "</td>";
							
							echo "<td>";
							echo $row['schoolworkplace'];
							echo "</td>";
							
							echo "<td>";				
							echo $row['schoolworkcareer'];
							echo "</td>";
							
							echo "<td>";
							echo $row['schoolcareerinfo'];
							echo "</td>";
							}
						?>
                         </tbody>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                        <br/>
                        <h4>
                            <strong>实习经历</strong>
                        </h4>
                        <hr>
						 <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
						  <th class="text-muted" class = "starttime">起止时间</th>
						  <th class="text-muted" class = "career">职位</th>
                          <th class="text-muted" class = "place">地点</th>
                          <th class="text-muted" class = "careerinfo">职务描述</th>

						</thead>
                       <?php 
						foreach($social_items as $row)
							{
							echo "<tr>";
							
							echo "<td>";
							echo $row['socialstarttime']."至".$row['socialendtime'];
							echo "</td>";
							echo "<td>";
							echo $row['socialcareer'];
							echo "</td>";
							echo "<td>";
							echo $row['socialplace'];
							echo "</td>";
							
							echo "<td>";
							echo $row['socialcareerinfo'];
							echo "</td>";
							}
						?>
						
                        </tbody>
                      </table>

                    </div>
                    <div class="col-md-2"></div>
                  </div>

                        <h4>
                            <strong>项目经历</strong>
                        </h4>
						 <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
						 <table class="table table-hover">
                        <thead>
                          <th class="text-muted" class = "starttime">起始时间</th>
					
                          <th class="text-muted" class = "projectname">项目名称</th>
                          <th class="text-muted" class = "projectsize">团队规模</th>
                          <th class="text-muted" class = "taskeachperson">负责工作</th>
                          <th class="text-muted" class = "projectinfo">项目描述</th>
                        
                        </thead>
						<tbody>
                       
                             <?php
                                if($project_items)
                                {         
                                  foreach($project_items as $row)
                                  {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row['projectstarttime']."至".$row['projectendtime'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row['projectname'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row['projectsize'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row['taskeachperson'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row['projectinfo'];
                                    echo "</td>";
                                    echo "</tr>";
                                  }
                                }
                              ?>
							  </tbody>
                      </table>

                    </div>
                    <div class="col-md-2"></div>
                  </div>
                        <h4>
                            <strong>所获奖励</strong>
                        </h4>
                       <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
						 <table class="table table-hover">
                        <thead>
                          <th class="text-muted" class = "awardstime">获奖时间</th>
                          <th class="text-muted" class = "awardsname">奖励名称</th>
                          <th class="text-muted" class = "Sponsor">颁奖单位</th>
                          <th class="text-muted" class = "awardsinfo">描述</th>
                        </thead>
                        <tbody>
                  
                        <?php
                                if($award_items)
                                {         
                                  foreach($award_items as $row)
                                  {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row['awardstime'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row['awardsname'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row['Sponsor'];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row['awardsinfo'];
                                    echo "</td>";
                                    echo "</tr>";
                                  }
                                }
								
                              ?>
							
                         </tbody>
                      </table>

                    </div>
                    <div class="col-md-2"></div>
                  </div>
                        <br/>
                        <hr>
                        <h4>
                        <strong>其他</strong>
                        </h4>
						 <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
						 <table class="table table-hover">
                        <thead>
                          <th class="text-muted" class = "awardstime">获奖时间</th>
                          <th class="text-muted" class = "awardsname">奖励名称</th>
                          <th class="text-muted" class = "Sponsor">颁奖单位</th>
                          <th class="text-muted" class = "awardsinfo">描述</th>
                        </thead>
                        <tbody>
						<?php
							  if($etc_items)
                                {         
                                  foreach($etc_items as $row)
                                  {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row['etctitle'];
                                    echo "</td>";
									echo "</tr>";
									echo "<tr>";
                                    echo "<td>";
                                    echo $row['etcinfo'];
                                    echo "</td>";
                                    echo "</tr>";
                                  }
                                }
						?>
                     </tbody>
                      </table>

                    </div>
                    <div class="col-md-2"></div>
                  </div>
					<?php
						}
						else
						{
							echo "请先登陆,呵呵";
						}
					?>
                </div>
            </div>
            <div class="col-sm-1"></div>

        </div>
            </div>
            <div class="col-sm-1"></div>
       

