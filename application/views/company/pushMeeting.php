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
    <div class="four wide column"></div>
    <div class="eight wide column">
      <div class="ui segment">
        <div class="ui red ribbon label">发布宣讲会信息</div>
        <br/><br/>
        <div class="ui form">
          <form class="form-signin" method="post" >
            <div class=" field">
              <label>宣讲会名称：</label>
              <input type="text" name="MeetingName" id = "MeetingName"required autofocus>
            </div>

            <div class=" field">
              <label>宣讲内容：</label>
              <textarea name="MeetingContent" id = "MeetingContent"required></textarea>
            </div>
            
            <div class=" field">
             <label>宣讲安排：</label>
             <textarea  name="MeetingPlan" id = "MeetingPlan"required></textarea>
           </div>
           <input type="hidden" name="submitted" value="true">
           <div class="ui teal submit  meeting button"  type="submit " style="display:none" id="releasesuccess">发布</div>
           <div class="ui teal submit button" type="submit" onclick="release()">发布</div>

           <div class="ui red submit button">取消</div>
         </div>
       </form>
     </div>
     <div class="four wide column"></div>
   </div>

   <script>
   var xmlHttp

   function releaseg()
   {
    alert("dd");
  }
  function release()
  { 
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp==null)
    {
      alert ("Browser does not support HTTP Request")
      return;
    }


    var MeetingName = document.getElementById("MeetingName");
    var MeetingContent = document.getElementById("MeetingContent");
    var MeetingContent0 = MeetingContent.value;
    var MeetingPlan = document.getElementById("MeetingPlan");
    var MeetingPlan0 = MeetingPlan.value;
    MeetingContent.value=MeetingContent0.replace(/\n/g,"<br/>");
    MeetingPlan.value=MeetingPlan0.replace(/\n/g,"<br/>");
     // alert(MeetingName.value);
     // alert(MeetingContent.value);
     // alert(Meetingplan.value);
     if(MeetingName.value != "" && MeetingContent.value != "" && MeetingPlan.value != "" )
     {

       var url="http://chenbingjin.cn/iter/company/pushMeeting2";
       xmlHttp.open("POST",url,true); 
       xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
       xmlHttp.send("MeetingName="+MeetingName.value+"&MeetingContent="+MeetingContent.value+"&MeetingPlan="+MeetingPlan.value);
       xmlHttp.onreadystatechange=stateChanged;
     }
     else
     {
       alert("宣讲会信息不能为空");
     }
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
      var releasesuccess = document.getElementById("releasesuccess");
      releasesuccess.click();
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
<div class="ui meeting basic modal">
  <div class="header">
    发布宣讲会
  </div>
  <div class="content">
    <div class="left">
      <i class="home icon"></i>
    </div>
    <div class="right">
      <p>宣讲信息已经成功发布!</p>
    </div>
  </div>
  <div class="actions">

    <div class="two fluid ui buttons">
     <div class="ui negative labeled icon button">
      <a href="<?php echo base_url("/company/pushMeeting");?>">
        <div class="ui negative labeled icon button">
          继续发布宣讲信息  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </a>
    </div>
    <div class="ui positive right labeled icon button">
      <a href="<?php  echo base_url("/company/MeetingList");?>">
        <div class="ui positive right labeled icon button">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返回宣讲会列表
       </div>
     </a>
   </div>
 </div>
</div>
</div>    

