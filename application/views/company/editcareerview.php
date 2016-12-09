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
        <div class="ui red ribbon label">修改职位信息</div>
        <br/>
        <br/>
        <form method="post">
          <input type="text" style="display:none"  name="CareerID"  value = "<?php echo $careerinfo[0]['CareerID']?>"required ></input>
          <div class="ui form">
            <div class="grouped inline field">
              <label>职位名称：</label>

              <input type="text"  name="CareerName"  value= "<?php echo $careerinfo[0]['CareerName']?>" required autofocus></div>

              <div class="grouped inline field">
               <label>招聘人数：</label>
               <input type="text"  name="RecruitingNumbers"  value= "<?php echo $careerinfo[0]['RecruitingNumbers']?>"  required></div>



               <div class="grouped inline field">
                 <label>开始时间：</label>
                 <input type="text"  class="form-control" onfocus="HS_setDate(this)"   value= "<?php echo $careerinfo[0]['StartTime']?>" id="begin"  name="begin"></div>

                 <div class="grouped inline field">
                   <label>结束时间：</label>
                   <input type="text"  class="form-control" onfocus="HS_setDate(this)"  value= "<?php echo $careerinfo[0]['EndTime']?>"  id="end"  name="end" ></div>

                   <div class="grouped inline fields" id = "forms">
                    <label>职位类型：</label>
                    <!--隐藏起来的input,利用JS得到它的type-->
                    <input type="text" style = "display:none" name="CareerType" id= "CareerType" value= "<?php echo $careerinfo[0]['CareerType']?>" required>
                    <div class="field">
                      <div class="ui radio checkbox">
                        <input  onchange="getCheckboxValue('jobtype1')" value = "1" checked type="radio" id="jobtype1" name="jobtype">
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
                    <option selected value="" name = "WorkPlace" id = "WorkPlace" ><?php echo $careerinfo[0]['WorkPlace']?></option>
                  </select>
                </div>
                <script type="text/javascript" language ="javascript"><!--
                //BindProvince();//只初始化省份
                var city = document.getElementById("WorkPlace");

                     BindCity1(city.innerHTML);//初始化  
                     // --></script>

                     <label>职位描述：</label>
                     <div class="inline field">

                       <textarea  name="CareerDescription" required ><?php echo $careerinfo[0]['CareerDescription']?></textarea>
                     </div>
                     <label>职位要求：</label>
                     <div class="inline field">

                      <textarea  name="CareerRequire" required><?php echo $careerinfo[0]['CareerRequire']?></textarea>
                    </div>
                  </div>
                  <input type="hidden" name="submitted" value="true">

                  <button class="ui teal submit tt  button" type="submit">保存</button>
                  <div class="ui red   button">取消</div>
                  <div class="four wide column"></div>
                </form>
              </div>
            </div>
          </div>
          <div class="four wide column"></div>
        </div>
        <div class="ui tt basic modal">
          <div class="header">
            成功修改职位信息
          </div>
          <div class="content">
            <div class="left">
              <i class="home icon"></i>
            </div>
            <div class="right">
              <h2>职位信息已经成功修改，请定时查看学生申请信息</h2>
            </div>
          </div>
          <div class="actions">
            <div class="two fluid ui buttons">
           </a>
         </div>
       </div>
     </div>