   <div  class="ui segment">
    <h4>实习经历：</h4>
    <table class="ui compact table segment">
        <thead>
            <tr>
                <th>起止时间</th>
                <th>工作单位</th>
                <th>职位</th>
                <th>职务描述</th>
                <th>管理</th>
            </tr>
        </thead>
        <tbody>
         <?php
         if($social_items)
         {         
          foreach($social_items as $row)
          {
            echo "<tr>";
            echo "<td>";
            echo $row['socialstarttime']."--".$row['socialendtime'];
            echo "</td>";
            echo "<td>";
            echo $row['socialplace'];
            echo "</td>";
            echo "<td>";
            echo $row['socialcareer'];
            echo "</td>";
            echo "<td>";
            echo $row['socialcareerinfo'];
            echo "</td>";
            echo ' <td>
           ';

                echo '<a href="';
                echo base_url('/resume/deletesocialbyid/'.$row['id']);
                echo '"> <div class="ui red mini button">删除</div></a></td>';
                echo "</tr>";
            }
        }
        ?>
        <tr>
          <td id="socialstarttime" name="socialstarttime"></td>
          <td id="socialendtime" name="socialendtime"></td>
          <td id="socialcareer" name="socialcareer"></td>
          <td id="socialcareerinfo" name="socialcareerinfo"></td>

      </tr>
  </tbody>
</table>
<div class="ui teal  aintern button">
    <i class="ui add icon"></i>
    添加
</div>
</div>


<div class="ui small aintern modal">
    <i class="close icon"></i>
    <div class="header">添加实习经历</div>
    <div class="content">
        <div class="left">
            <i class="massive tags  icon"></i>
        </div>
        <div class="right">
            <form role="form"  name= "socialform" id = "socialform" method="post">
                <div class="ui form mini">
                    <div class="inline field">
                        <label>开始时间：</label>
                        <input type="text"  class="form-control" onfocus="HS_setDate(this)" id="forsocialstarttime" name="forsocialstarttime" ></div>

                        <div class="inline field">
                            <label>结束时间：</label>
                            <input type="text"  class="form-control" onfocus="HS_setDate(this)" id="forsocialendtime"  name="forsocialendtime" ></div>
                            <div class="inline field">
                                <label>工作单位：</label>
                                <input type="text" id="forsocialplace" name="forsocialplace"></div>
                                <div class="inline field">
                                    <label>职位名称：</label>
                                    <input type="text" id="forsocialcareer"  name="forsocialcareer" ></div>
                                    <div class=" field">
                                        <label>职务描述：</label>
                                        <textarea id="forsocialcareerinfo"  name="forsocialcareerinfo"></textarea>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="actions">
                        <div class="ui black button">取消</div>
                        <div class="ui positive right labeled icon submit button" onclick="functioneditbasicsocial()">
                            添加
                            <i class="checkmark icon"></i>
                        </div>
                    </div>
                </div>


                <script type="text/javascript">

                    function functioneditbasicsocial()
                    {

                        xmlHttp = GetXmlHttpObject();
                        if (xmlHttp==null)
                        {
                            alert ("Browser does not support HTTP Request")
                            return;
                        }
                        var   forsocialstarttime           =document.getElementById("forsocialstarttime");
                        var   forsocialendtime         =document.getElementById("forsocialendtime");
                        var   forsocialcareer         =document.getElementById("forsocialcareer");
                        var   forsocialcareerinfo           =document.getElementById("forsocialcareerinfo");
                        var   forsocialplace           =document.getElementById("forsocialplace");

                        var url="<?php echo base_url('/resume/addsocial')?>/<?php echo $CurrentResumeID;?>/<?php echo $userid;?>";
                        //alert(url);
                        xmlHttp.open("POST",url,true); 
                        xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
                        xmlHttp.send("forsocialstarttime="+forsocialstarttime.value+"&forsocialplace="+forsocialplace.value+"&forsocialendtime="+forsocialendtime.value+"&forsocialcareer="+forsocialcareer.value+"&forsocialcareerinfo="+forsocialcareerinfo.value);
                        //alert("添加语言信息成功2!");
                        xmlHttp.onreadystatechange=stateChanged;
                    }


                </script>

