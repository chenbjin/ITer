<br><br><br><br><br><br>
   <div class="ui grid">
        <div class="three column row">
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
            <div class="two wide column"></div>
            <div class="twelve wide column">
                <div class="ui segment">
               <div class="ui red ribbon label">已发职位</div>

                    <table class="ui table segment">
                        <thead>
                            <tr>
                                <th>职位</th>
                                <th>工作地区</th>
                                <th>发布时间</th>
                                <th>申请情况</th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tbody>
						  <?php foreach ($career as $job) : ?>
								<tr>
								  <td><?php echo $job['CareerName'];?></td>
								  <td><?php echo $job['WorkPlace'];?></td>
								  <td><?php echo $job['PushTime'];?></td>
								  <td><a  class="ui mini green circular button" href="<?php echo base_url('/company/getspecific/').'/'.$job['CareerID']?>">查看详情</a></td>
								  <td><a  class="ui mini green circular button" href="<?php echo base_url('/company/deleteCareer/').'/'.$job['CareerID']?>">删除</a></td>
								</tr>
								<?php endforeach;?>
								
                        </tbody>
                    </table>
                    <a href="<?php echo base_url("/company/pushCareer")?>"><div class="fluid circular ui teal button">发布新职位</div></a>
                </div>
            </div>

            </div>
            <div class="two wide column"></div>
        </div>
