<div  class="ui segment">
    <h4>其他：</h4>
    <table class="ui compact table segment">
        <thead>
            <tr>
                <th>标题</th>
                <th>描述</th>
                <th>管理</th>
            </tr>
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
            echo "<td>";
            echo $row['etcinfo'];
            echo "</td>";
            echo ' <td>
            ';

            echo '<a href="';
            echo base_url('/resume/deleteetcbyid/'.$row['id']);
            echo '"><div class="ui red mini button">删除</div></a></td>';
            echo "</tr>";
        }
    }
    ?>
    <tr>
        
        <td id="etctitle" name="etctitle"  ></td>
        <td id="etcinfo"  name="etcinfo"   ></td>
    </tr>
</tbody>
</table>
<div class="ui teal  others button">
    <i class="ui add icon"></i>
    添加
</div>
</div>

<div class="ui small others modal">
    <i class="close icon"></i>
    <div class="header">其他</div>
    <div class="content">
        <div class="left">
            <i class="massive tags  icon"></i>
        </div>
        <div class="right">
            <form  role="form"  name= "etcform" id = "etcform" method="post">
                <div class="ui form mini">

                    <div class=" field">
                        <label>标题：</label>
                        <input type="text" id="foretctitle" name="foretctitle"></div>

                        <div class=" field">
                            <label>描述：</label>
                            <textarea  id="foretcinfo" name="foretcinfo"></textarea>
                        </div>

                    </div>

                </form>
            </div>
        </div>
        <div class="actions">
            <div class="ui black button">取消</div>
            <div class="ui positive right labeled icon submit button" onclick = "functioneditbasicetc()">
                添加
                <i class="checkmark icon"></i>
            </div>
        </div>
    </div>


    <script type="text/javascript">
       function functioneditbasicetc()
       {

          
          

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp==null)
        {
            alert ("Browser does not support HTTP Request")
            return;
        }
        
        var foretctitle             =document.getElementById("foretctitle");
        var foretcinfo           =document.getElementById("foretcinfo");
        var url="<?php echo base_url('/resume/addetc')?>/<?php echo $CurrentResumeID;?>/<?php echo $userid;?>";
                        //alert(url);
                        xmlHttp.open("POST",url,true); 
                        xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
                        xmlHttp.send("foretctitle="+foretctitle.value+"&foretcinfo="+foretcinfo.value);
                        //alert("添加语言信息成功2!");
                        xmlHttp.onreadystatechange=stateChanged; 
                        return false;
                    }
                </script>