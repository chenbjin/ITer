<?php
$iter = ($this->session->userdata('iter'));
if(!$iter['name']) 
{
	echo "<h2>请先登录！</h2>";
	//redirect("iter/login");
}
else
{
?>
	<p align="center"><font style="FONT-SIZE: 22px" face="黑体,隶书" color="blue">
<?php foreach ($resume_items as $items ) {
	# code...
$ResumeDetail = array();
$ResumeDetail['UserName'] = 				$iter['name'];
$ResumeDetail['WorkType'] = 				$items['WorkType'];
$ResumeDetail['Tel'] = 					$items['Tel'];
$ResumeDetail['School'] = 					$items['School'];
$ResumeDetail['Education'] = 				$items['Education'];
$ResumeDetail['Major'] = 					$items['Major'];
$ResumeDetail['Gender'] = 					$items['Gender'];
$ResumeDetail['Birth_of_Date'] = 			$items['Birth_of_Date'];
$ResumeDetail['Identity'] =  				$items['Identity'];
$ResumeDetail['PoliticyState'] = 			$items['PoliticyState'];
$ResumeDetail['Address'] = 				$items['Address'];
$ResumeDetail['Email'] = 					$items['Email'];
$ResumeDetail['Blog'] = 					$items['Blog'];
$ResumeDetail['EmergencyContacter'] = 		$items['EmergencyContacter'];
$ResumeDetail['EmergencyTel'] = 			$items['EmergencyTel'];
?>


<?php echo $ResumeDetail['UserName']?>个人简历</font></p>
				<table width="100%" border="0">
					<tr>
						<td><FONT face="宋体">
								<TABLE id="Table1" cellSpacing="0" borderColorDark="#ffffff" cellPadding="0" width="100%"
									bgColor="#ccff99" borderColorLight="#6699ff" border="1">
									<TBODY>
										<TR>
											<TD style="HEIGHT: 38px" align="center" bgColor="#99ff99" colSpan="3">基本资料</TD>
										</TR>
									
										
										<TR>
											<TD style="WIDTH: 231px; HEIGHT: 31px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 姓名：
												<span id="Lbl_xm"><?php echo  $ResumeDetail['UserName']?></span></TD>

											<TD align="center" rowSpan="5">&nbsp;&nbsp;
												
												<IMG src="<?= base_url("/static/img/person.png")?>" border="1">
												
											</TD>
										</TR>
										<TR>
											<TD style="WIDTH: 231px; HEIGHT: 31px " align = "center" >身份证号
												<span id="Lbl_sfz"><?php  echo $ResumeDetail['Identity']?></span></TD>
											<TD style="WIDTH: 230px; HEIGHT: 31px">&nbsp;&nbsp;出生年月：
												<span id="Lbl_csny"><?php  echo $ResumeDetail['Birth_of_Date']?></span></TD>
										</TR>
										<tr>
											<TD style="WIDTH: 231px; HEIGHT: 29px">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;性别：
												<span id="Lbl_xb"><?php  echo $ResumeDetail['Gender']?></span></TD>
										</tr>
										<tr>
										
											<TD style="WIDTH: 230px; HEIGHT: 31px">&nbsp; 政治面貌：
												<span id="Lbl_zzmm"><?php echo $ResumeDetail['PoliticyState']?></span></TD>
										</tr>
										<TR>
											<TD style="WIDTH: 231px; HEIGHT: 31px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学历：
												<span id="Lbl_xw"><?php  echo $ResumeDetail['Education']?></span></TD>
											<TD style="WIDTH: 230px; HEIGHT: 31px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学校：
												<span id="Lbl_xl"><?php  echo $ResumeDetail['School']?></span></TD>
										</TR>
										<TR>
											<TD style="WIDTH: 231px; HEIGHT: 30px">&nbsp;&nbsp;&nbsp; 现居地址
												<span id="Lbl_syd"><?php  echo $ResumeDetail['Address']?></span></TD>
											<TD style="WIDTH: 230px; HEIGHT: 30px">&nbsp;&nbsp;专业名称：
												<span id="Lbl_zyname"><?php  echo $ResumeDetail['Major']?></span></TD>
											<TD style="WIDTH: 230px; HEIGHT: 30px">&nbsp;&nbsp;电话
												<span id="Lbl_zyname"><?php  echo $ResumeDetail['Tel']?></span></TD>
											
										</TR>
										<TR>
											<TD style="WIDTH: 231px; HEIGHT: 30px">&nbsp;&nbsp;&nbsp; 电子邮箱
												<span id="Lbl_syd"><?php  echo $ResumeDetail['Email']?></span></TD>
											<TD style="WIDTH: 230px; HEIGHT: 30px">&nbsp;&nbsp;博客
												<span id="Lbl_zyname"><?php  echo $ResumeDetail['Blog']?></span></TD>
											<TD style="WIDTH: 230px; HEIGHT: 30px">&nbsp;&nbsp;紧急联系人
												<span id="Lbl_zyname"><?php  echo $ResumeDetail['EmergencyContacter']?></span></TD>
										</TR>	
										<TR>
											<TD style="WIDTH: 231px; HEIGHT: 30px">&nbsp;&nbsp;&nbsp; 紧急联系电话
												<span id="Lbl_syd"><?php  echo $ResumeDetail['EmergencyTel']?></span></TD>
											<TD style="WIDTH: 230px; HEIGHT: 30px">&nbsp;&nbsp;
												<span id="Lbl_zyname"></span></TD>
											<TD style="WIDTH: 230px; HEIGHT: 30px">&nbsp;&nbsp;
												<span id="Lbl_zyname"></span></TD>
										</TR>	

					</TBODY>
				</TABLE>
			</form>
<?php
	}
}
?>