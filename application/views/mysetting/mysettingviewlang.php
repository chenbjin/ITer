  <div  class="ui segment">
    <h4>语言能力：</h4>
    <table class="ui compact table segment">
      <thead>
        <tr>
          <th>语言类别</th>
          <th>等级</th>
          <th>分数</th>
          <th>管理</th>
        </tr>
      </thead>
      <tbody id="langtbody">
        <?php
        if($lang_items)
        {					
          foreach($lang_items as $row)
          {
           // print_r($row);
            echo "<tr>";
            echo "<td>";
            echo $row['category'];
            echo "</td>";
            echo "<td>";
            echo $row['rank'];
            echo "</td>";
            echo "<td>";
            echo $row['score'];
            echo "</td>";
            echo ' <td> ';

            echo '<a href="';
            echo base_url('/resume/deletelangbyid/'.$row['langid']);
            echo '"><div class="ui red mini button">删除</div></a></td>';
            echo "</tr>";

          }
        }
        ?>
      </tbody>
    </table>
    <div class="ui teal  alan button"><i class="ui add icon"></i>添加</div>
  </div>

  <div class="ui small alan modal">
    <i class="close icon"></i>
    <div class="header">添加语言信息</div>
    <div class="content">
      <div class="left">
        <i class="massive tags  icon"></i>
      </div>
      <div class="right">
        <form role="form"  nam= "langform" id = "langform" method="post">
          <div class="ui form">

            <div class="inline field">
              <label>语言类别：</label>
              <input type="text" class="form-control" id="forcategorys" name="forcategorys"></div>
              <div class="inline field">
                <label>语言等级：</label>
                <input type="text" class="form-control" id="forranks" name="forranks" ></div>
                <div class="inline field">
                  <label>分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;数：</label>
                  <input type="text" class="form-control" id="forscores" name="forscores" ></div>

                </div>

              </form>
            </div>
          </div>
          <div class="actions">
            <div class="ui black button">取消</div>
            <div class="ui positive right labeled icon submit button" onclick= "sendlang()">
              添加
              <i class="checkmark icon"></i>
            </div>
          </div>
        </div>
        <script>
          function sendlang()
          {
          //  alert("sendlang");
           xmlHttp = GetXmlHttpObject();
           if (xmlHttp==null)
           {
            alert ("Browser does not support HTTP Request")
            return;
          }
          var forcategory           =document.getElementById("forcategorys");
          var forrank           =document.getElementById("forranks");
          var forscore           =document.getElementById("forscores");

          var url="<?php echo base_url('/resume/addlang')?>/<?php echo $CurrentResumeID;?>/<?php echo $userid;?>";
         // alert(url);
          xmlHttp.open("POST",url,true); 
          xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
          xmlHttp.send("forcategorys="+forcategory.value+"&forranks="+forrank.value+"&forscores="+forscore.value);
          xmlHttp.onreadystatechange=stateChanged;
        }

        function stateChanged() 
        { 
          if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
          { 
            var temp = xmlHttp.responseText
    //alert(temp)
    var arr = JSON.parse(temp)
    //alert(arr.status)
    if(arr.status == "success")
    {
      location.replace(location.href);
      alert("添加信息成功!");
    }
  }
  

}

function GetXmlHttpObject()
{
  var xmlHttp=null;
  try
  {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
}
catch (e)
{
 //Internet Explorer
 try
 {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp;
}
</script>

