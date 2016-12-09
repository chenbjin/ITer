<div  class="ui segment">
    <h4>所获奖励：</h4>
    <table class="ui compact table segment">
        <thead>
            <tr>
                <th>获奖时间</th>
                <th>奖励名称</th>
                <th>颁奖单位</th>
                <th>描述</th>
                <th>管理</th>
            </tr>
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
                echo ' <td>
                ';
                
                echo '<a href="';
                echo base_url('/resume/deleteawardbyid/'.$row['id']);
                echo '"> <div class="ui red mini button">删除</div></a></td>';
                echo "</tr>";
            }
        }
        ?>
        <tr>
            <!--从数据库中查询，填入下面的表格中！很简单-->
            <td id="awardstime"  name="awardstime"     ></td>
            <td id="awardsname"  name="awardsname"     ></td>
            <td id="Sponsor"     name="Sponsor"        ></td>
            <td id="awardsinfo"  name="awardsinfo"     ></td>                                                       
        </tr>
    </tbody>
</table>
<div class="ui teal  awar button">
    <i class="ui add icon"></i>
    添加
</div>
</div>

<div class="ui small awar modal">
    <i class="close icon"></i>
    <div class="header">添加所获奖励</div>
    <div class="content">
        <div class="left">
            <i class="massive tags  icon"></i>
        </div>
        <div class="right">
            <form role="form"  name= "awardform" id = "awardform" method="post">
                <div class="ui form mini">
                    <div class="inline field">
                        <label>获奖时间：</label>
                        <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="forawardstime" name="forawardstime" ></div>

                        <div class="inline field">
                            <label>奖励名称：</label>
                            <input type="text" id="forawardsname" name="forawardsname" ></div>
                            <div class="inline field">
                                <label>颁奖单位：</label>
                                <input type="text" id="forSponsor" name="forSponsor" ></div>
                                <div class=" field">
                                    <label>奖励描述：</label>
                                    <textarea id="forawardsinfo" name="forawardsinfo"></textarea>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
                <div class="actions">
                    <div class="ui black button">取消</div>
                    <div class="ui positive right labeled icon submit button" onclick="functioneditbasicaward()">
                        添加
                        <i class="checkmark icon"></i>
                    </div>
                </div>
            </div>



            <script type="text/javascript">
             function functioneditbasicaward()
             {
              
                var awardstime             =document.getElementById("awardstime");
                var awardsname           =document.getElementById("awardsname");
                var Sponsor           =document.getElementById("Sponsor");
                var awardsinfo             =document.getElementById("awardsinfo");
                
                

                xmlHttp = GetXmlHttpObject();
                if (xmlHttp==null)
                {
                    alert ("Browser does not support HTTP Request")
                    return;
                }
                var forawardstime   =document.getElementById("forawardstime");
                var forawardsname =document.getElementById("forawardsname");
                var forSponsor    =document.getElementById("forSponsor");
                var forawardsinfo  =document.getElementById("forawardsinfo");


                var url="<?php echo base_url('/resume/addaward')?>/<?php echo $CurrentResumeID;?>/<?php echo $userid;?>";
                        //alert(url);
                        xmlHttp.open("POST",url,true); 
                        xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
                        xmlHttp.send("forawardstime="+forawardstime.value+"&forawardsname="+forawardsname.value+"&forSponsor="+forSponsor.value+"&forawardsinfo="+forawardsinfo.value);
                        //alert("添加语言信息成功2!");
                        xmlHttp.onreadystatechange=stateChanged; 
                        return false;

                    }
                </script>