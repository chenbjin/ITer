 <div  class="ui segment">
  <h4>项目经验：</h4>
  <table class="ui compact table segment">
    <thead>
      <tr>
        <th>起止时间</th>
        <th>项目名称</th>
        <th>团队规模</th>
        <th>负责工作</th>
        <th>项目描述</th>
        <th>管理</th>
      </tr>
    </thead>
    <tbody>
     <?php
     if($project_items)
     {         
      foreach($project_items as $row)
      {
        echo "<tr>";
        echo "<td>";
        echo $row['projectstarttime']."--".$row['projectendtime'];
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
        echo ' <td>
        ';

        echo '<a href="';
        echo base_url('/resume/deleteprojectbyid/'.$row['id']);
        echo '">  <div class="ui red mini button">删除</div></a></td>';
        echo "</tr>";
      }
    }
    ?>
    <tr>

      <th class="text-muted" id = "projectstarttime" name = "projectstarttime"              ></th>
      <th class="text-muted" id = "projectendtime"   name = "projectendtime"              ></th>
      <th class="text-muted" id = "projectname"      name = "projectname"              ></th>
      <th class="text-muted" id = "projectsize"      name = "projectsize"              ></th>
      <th class="text-muted" id = "taskeachperson"   name = "taskeachperson"              ></th>
      <th class="text-muted" id = "projectinfo"      name = "projectinfo"         ></th>

    </tr>
  </tbody>
</table>
<div class="ui teal  aproj button">
  <i class="ui add icon"></i>
  添加
</div>
</div>


<div class="ui small aproj modal">
  <i class="close icon"></i>
  <div class="header">添加项目经历</div>
  <div class="content">
    <div class="left">
      <i class="massive tags  icon"></i>
    </div>
    <div class="right">
      <form role="form"  name = "projectform" id = "projectform" method="post">
        <div class="ui form mini">
          <div class="inline field">
            <label>开始时间：</label>
            <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="forprojectstarttime" name ="forprojectstarttime"></div>

            <div class="inline field">
              <label>结束时间：</label>
              <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="forprojectendtime" name ="forprojectendtime"></div>

              <div class="inline field">
                <label>项目名称：</label>
                <input type="text" id="forprojectname" name="forprojectname"></div>
                <div class="inline field">
                  <label>团队人数：</label>
                  <input type="text" id="forprojectsize" name="forprojectsize" ></div>

                  <div class="inline field">
                    <label>负责工作：</label>
                    <input type="text" id="fortaskeachperson" name="fortaskeachperson"></div>

                    <div class=" field">
                      <label>项目描述：</label>
                      <textarea id="forprojectinfo" name="forprojectinfo"></textarea>
                    </div>

                  </div>

                </form>
              </div>
            </div>
            <div class="actions">
              <div class="ui black button">取消</div>
              <div class="ui positive right labeled icon submit button" onclick="functioneditproject()">
                添加
                <i class="checkmark icon"></i>
              </div>
            </div>
          </div>

          <script type="text/javascript">
           function functioneditproject()
           {

             alert("添加项目信息成功!");
             xmlHttp = GetXmlHttpObject();
             if (xmlHttp==null)
             {
              alert ("Browser does not support HTTP Request")
              return;
            }
            var forprojectstarttime             =document.getElementById("forprojectstarttime");
            var forprojectendtime           =document.getElementById("forprojectendtime");
            var forprojectname           =document.getElementById("forprojectname");
            var forprojectsize             =document.getElementById("forprojectsize");
            var fortaskeachperson           =document.getElementById("fortaskeachperson"); 
            var forprojectinfo   =document.getElementById("forprojectinfo");
            var url="<?php echo base_url('/resume/addproject')?>/<?php echo $CurrentResumeID;?>/<?php echo $userid;?>";
                                  //alert(url);
                                  xmlHttp.open("POST",url,true); 
                                  xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
                                  xmlHttp.send("forprojectstarttime="+forprojectstarttime.value+"&forprojectendtime="+forprojectendtime.value+"&forprojectname="+forprojectname.value+"&forprojectsize="+forprojectsize.value+"&fortaskeachperson="+fortaskeachperson.value+"&forprojectinfo="+forprojectinfo.value);
                                  
                                  xmlHttp.onreadystatechange=stateChanged;
                                }
                              </script>

