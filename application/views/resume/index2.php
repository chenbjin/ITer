<?php
//echo validation_errors();
$iter = ($this->session->userdata('iter'));
?>

    <script src="jquery.provincesCity.js" type="text/javascript"></script>
    <script src="provincesdata.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?=base_url("/static/js/WdatePicker.js")?>"></script>
<div class="row">
<?php
  foreach($resume_items as $items)
  {
	  $ResumeID = $items['ResumeID'];
	  $UserName = $iter['name'];
	  echo form_open("resume/UpdateResume");
?>
	<div class="col-xs-6">
  <ul>
  <li>个人基本信息</li>
  </ul>
<div>
<input type = "text" style = "display:none" name = "ResumeID" id = "ResumeID" value = "<?php echo $ResumeID; ?>"></input>
 <th><font id="Lid_type">求职类型</font></th>
<td><select name="WorkType" id = "WorkType" value="<?php echo $items['WorkType'] ;?> "> 
<option value="0" SELECTED>全职</option>
<option value="1" >兼职</option>
<option value="2" >实习</option>
  </select></td>
</div>
<div >姓名：<input name = "UserName" id = "UserName" type = "text" placeholder="姓名" value="<?php echo $UserName ;?> "> </input></div>
<div>
手机号：<input name = "Tel" id = "Tel" type = "text" placeholder = "手机号" value="<?php echo $items['Tel'] ;?> "></input>
</div>

<div>
学校：<input type = "text" placeholder = "学校" name = "School" id = "School" value="<?php echo $items['School'] ;?> "></input>
</div>

<div>
  <th>学历： </th>
  <td colspan="3" > 
<input type="Radio" name="Education"  id = "Education" value="0" >博士
<input type="Radio" name="Education"  id = "Education" value="1" >硕士
<input type="Radio" name="Education"  id = "Education" value="2" CHECKED >本科
<input type="Radio" name="Education"  id = "Education" value="3" >大专
<input type="Radio" name="Education"  id = "Education" value="4" >高中
 </td>
</div>

<div>
专业：<input type = "text" placeholder = "专业" id = "Major" name = "Major" value="<?php echo $items['Major'] ;?> " ></input>
</div>


<div>性别：<input name = "Gender" id = "Gender" type = "radio" value="1" checked >男<input type = "radio" name="Gender">女</div>
<div><font id="Birth_of_Date_text">出生日期:</font></th>

 <td colspan="3">
    <input class="Wdate"  value= "1993-01-01" type="text" id="Birth_of_Date" name = "Birth_of_Date" onFocus="WdatePicker({isShowClear:false,readOnly:true})"/>
</div>

<div>
 <th><font id="Lid_type">证件类型</font></th>
  <td><select name="id_type">
<option value="">请选择</option>  
<option value="1" SELECTED>身份证</option>
<option value="2" >护照</option>
<option value="3" >军官证</option>
<option value="7" >香港身份证</option>
<option value="8" >澳门身份证</option>
<option value="5" >港澳通行证</option>
<option value="6" >台胞证</option>
<option value="4" >其他</option>   
    </select></td>
  <th><span>*</span><font id="Identity" name = "idnumber">证件号码</font></th>
  <td><input type="text" name="Identity" class="frame7"  value="<?php echo $items['Identity'] ;?> "></td>
</div>

<div>
  <th>政治面貌</th>
  <td colspan="3"> 
<input type="Radio" name="PoliticyState"  id = "PoliticyState" value="1" CHECKED>中共党员(含预备党员) 
<input type="Radio" name="PoliticyState"  id = "PoliticyState" value="5" >团员
<input type="Radio" name="PoliticyState"  id = "PoliticyState" value="6" >群众
<input type="Radio" name="PoliticyState"  id = "PoliticyState" value="2" >民主党派
<input type="Radio" name="PoliticyState"  id = "PoliticyState" value="3" >无党派人士
<input type="Radio" name="PoliticyState"  id = "PoliticyState" value="4" >无可奉告 </td>
</div>

<div>
现居住地址：<input type = "text"  name = "Address" id = "Address" placeholder = "输入您现在的地址" value="<?php echo $items['Address'] ;?> "></input>
</div>
<div>
电子邮箱: <input name = "Email" id = "Email" type = "text" placeholder = "电子邮箱" value="<?php echo $items['Email'] ;?> "></input>
</div>
<div>
个人博客: <input name = "Blog" id = "Blog" type = "text" placeholder = "个人博客" value="<?php echo $items['Blog'] ;?> "></input>
</div>


<div>
紧急联系人: <input name = "EmergencyContacter" id = "EmergencyContacter" type = "text" placeholder = "紧急联系人" value="<?php echo $items['EmergencyContacter'] ;?> "></input>
</div>
<div>
联系电话: <input name = "EmergencyTel" id = "EmergencyTel" type = "text" placeholder = "联系电话" value="<?php echo $items['EmergencyTel'] ;?> "></input>
</div>


<input type = "submit" name = "submit" value = "提交"></input>
  </form>

</div>

<?php
}
?>
</div>
