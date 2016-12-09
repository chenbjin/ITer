
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
        <div class="ui red ribbon label">发布职位</div>
        <br/>
        <br/>
        <form method="post" id="myform">
         <div class="ui form">
          <div class="grouped inline field">
            <label>职位名称：</label>
            
            <input type="text"  name="CareerName" id="CareerName"  required autofocus></div>
            
            <div class="grouped inline field">
             <label>招聘人数：</label>
             <input type="text"  name="RecruitingNumbers" id="RecruitingNumbers"  required></div>
             
             
             
             <div class="grouped inline field">
               <label>开始时间：</label>
               <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="begin"></div>

               <div class="grouped inline field">
                 <label>结束时间：</label>
                 <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="end"></div>

                 <div class="grouped inline fields" id = "forms">
                  <label>职位类型：</label>
                  <!--隐藏起来的input,利用JS得到它的type-->
                  <input type="text" style = "display:none" name="CareerType" id= "CareerType"  value = "1" required>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input  onchange="getCheckboxValue('jobtype1')" value = "1" type="radio" id="jobtype1" name="jobtype">
                      <label></label>
                    </div>
                    <label>正职</label>
                  </div>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input onchange="getCheckboxValue('jobtype2')" value = "2" type="radio"  id="jobtype2" name="jobtype">
                      <label></label>
                    </div>
                    <label>实习</label>
                  </div>
                  <div class="field">
                    <div class="ui radio checkbox">
                      <input onchange="getCheckboxValue('jobtype3')" type="radio"  value = "3" id="jobtype3" name="jobtype">
                      <label></label>
                    </div>
                    <label>兼职</label>
                  </div>
                </div>
                <script>
                function getCheckboxValue(ids){

                  var s = document.getElementById(ids);


                  var oShow = document.getElementById("CareerType");
                  oShow.value = s.value;
                  return false;
                }
                </script>
                
                <label>工作城市：</label>
                <div class=" field">
                  <select  name="fromProvince" id="fromProvince" onchange="selectMoreCity1(this)"></select>
                  <select name="fromCity" id="fromCity">
                    <option selected value="" name = "WorkPlace" id = "WorkPlace" >城市</option>
                  </select>
                </div>
                <script type="text/javascript" language ="javascript"><!--
                //BindProvince();//只初始化省份
                     BindCity1("广州");//初始化  
                     // --></script>

                     <label>职位描述：</label>
                     <div class="inline field">

                       <textarea  name="CareerDescription" id="CareerDescription"  required ></textarea>
                     </div>
                     <label>职位要求：</label>
                     <div class="inline field">

                      <textarea  name="CareerRequire"   id="CareerRequire" required></textarea>
                    </div>
                  </div>
                  <input type="hidden" name="submitted" value="true">
                  
                  <div class="ui teal submit  button"  type="submit " onclick="release()" >发布</div>
                  <div class="ui teal submit tt  button"  type="submit " style="display:none" id="releasesuccess">发布</div>
                  <div class="ui red   button">取消</div>

                  <script>
                  var xmlHttp


                  function release()
                  { 
                    xmlHttp = GetXmlHttpObject();
                    if (xmlHttp==null)
                    {
                      alert ("Browser does not support HTTP Request")
                      return;
                    }

                    var CareerName = document.getElementById("CareerName");
                    var RecruitingNumbers = document.getElementById("RecruitingNumbers");
                    var begin = document.getElementById("begin");
                    var end = document.getElementById("end");
                    var CareerType = document.getElementById("CareerType");

                    var CareerDescription = document.getElementById("CareerDescription");
                    var CareerRequire = document.getElementById("CareerRequire");
                    var CareerDescription0 = CareerDescription.value;
                    var CareerRequire0 = CareerRequire.value;
                    CareerDescription.value=CareerDescription0.replace(/\n/g,"<br/>");
                    CareerRequire.value=CareerRequire0.replace(/\n/g,"<br/>");
  //苦逼
  var obj=document.getElementById('fromCity');

  var index=obj.selectedIndex; //序号，取当前选中选项的序号

  var WorkPlace = obj.options[index].text;

  
  //alert(WorkPlace);
  
  if(CareerName.value != "" && RecruitingNumbers.value != "" && begin.value != "" && end.value != "" && CareerType.value != "" &&WorkPlace != "" && CareerDescription.value != "" && CareerRequire.value != "")
  {
    var url="http://chenbingjin.cn/iter/company/pushCareer2";
    xmlHttp.open("POST",url,true); 
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=UTF-8");
    xmlHttp.send("CareerName="+CareerName.value+"&RecruitingNumbers="+RecruitingNumbers.value+"&begin="+begin.value+"&end="+end.value+"&CareerType="+CareerType.value+"&WorkPlace="+WorkPlace+"&CareerDescription="+CareerDescription.value+"&CareerRequire="+CareerRequire.value);
    xmlHttp.onreadystatechange=stateChanged;
  }
  else
  {
    alert("职位信息不能为空");
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
<div class="four wide column"></div>
</form>
</div>
</div>

</div>
<div class="four wide column"></div>
</div>
<div class="ui tt basic modal">
  <div class="header">
    发布新职位
  </div>
  <div class="content">
    <div class="left">
      <i class="home icon"></i>
    </div>
    <div class="right">
      <h2>职位信息已经成功发布，请定时查看学生申请信息</h2>
    </div>
  </div>
  <div class="actions">

    <div class="two fluid ui buttons">
     <div class="ui negative labeled icon button">
      <a href="<?php echo base_url("/company/pushCareer");?>">
        <div class="ui negative labeled icon button">
          继续发布新职位  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
      </a>
    </div>
    <div class="ui positive right labeled icon button">
      <a href="<?php echo base_url("/company/");?>">
        <div class="ui positive right labeled icon button">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返回职位列表
       </div>
     </a>
   </div>
 </div>
</div>
</div>