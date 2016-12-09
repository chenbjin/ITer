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
               <div class="ui red ribbon label">宣讲会</div>

                    <table class="ui table segment">
                        <thead>
                            <tr>
                                <th>宣讲会名称</th>
                                <th>发布时间</th>
                                <th>详细情况</th>
                                <th>操作</th>                     
                            </tr>
                        </thead>
                        <tbody>
                    <?php if($meeting) {
                        foreach ($meeting as $meet) : ?>
                      <tr>
                        <td><?php echo $meet['MeetingName'];?></td>
                        <td><?php echo $meet['Time'];?></td>
                        <td><a  class="ui mini green circular button" href="<?php echo base_url('/company/meetingDetial/').'/'.$meet['MeetingID']?>">查看详情</a></td>
                        <td><a  class="ui mini green circular button" href="<?php echo base_url('/company/deleteMeeting/').'/'.$meet['MeetingID']?>">删除</a></td>
                      </tr>
                      <?php endforeach; } ?>
                
                        </tbody>
                    </table>
                    <a href="<?php echo base_url("/company/pushMeeting")?>"><div class="fluid circular ui teal button">发布宣讲会</div></a>
                </div>
            </div>

            </div>
            <div class="two wide column"></div>
    </div>
