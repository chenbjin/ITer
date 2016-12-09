<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>ITers</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="<?php echo base_url("/static/css/font.css");?>" rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/static/css/semantic.css");?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/static/css/all.css");?>">
	<script src="<?php echo base_url("/static/js/jquery.min.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/semantic.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/all.js");?>"></script>
	<script src="<?php echo base_url("/static/javascript/modal.js");?>"></script>
	<script src="<?php echo base_url("/static/js/date.js");?>"></script>
</head>
<body class="companyhead">
	
	<div class="ui grid">
		<br/>
		<div class="three column row">
			<div class="three wide column"></div>
			<div class="ten wide column">
				<div class="ui   green secondary inverted  segment">
					<div class="ui segment">
						<?php
						$iter = ($this->session->userdata('iter'));
						$UserName = $iter['name'];

						if($UserName || $companyLog)
						{

							$resumeitems = $resume_items[0]; 
                        //print_r($resumeitems);
							?></h3>
							<h2><?php  echo $resumeitems['resumename'];   ?></h2>
							<div class="ui divider"></div>
							<div class="ui grid">
								<div class="ui row">
									<div class="eight wide column">
										<h3><?php  echo $resumeitems['UserName'];   ?></h3>
										<p><?php  if($resumeitems['Gender'] ==0 || $resumeitems['Gender']== "男") echo "男";
											else echo "女";   ?></p>
											<p>出生日期：<?php  echo $resumeitems['Birth_of_Date'];   ?></p>
											<p>地址：<?php  echo $resumeitems['Address'];   ?></p>
											<p>手机：<?php  echo $resumeitems['Tel'];   ?></p>
											<p>邮箱：<?php  echo $resumeitems['Email'];   ?></p>
											<br/>
										</div>
										<div class="four wide column">

											<div class="ui  segment">
												
												<img alt="简历照" style="width:150px;height:150px;" src="<?php 
												if(file_exists("/var/www/iter/uploads/usertx/".$theid.".png"))
													echo base_url("uploads/usertx/".$theid.".png");
												else
													echo base_url("/static/img/small.png");
												?>" class="img-rounded"/>
											</div>
										</div>
										<div class="four wide column">
										</div>
									</div>
								</div>


								<?php if(!empty($lang_items_array))
								{
									?>
									<h4>语言能力：</h4>
									<table class="ui basic table segment">
										<tbody>

											<?php
											foreach($lang_items_array as $row)
											{
												echo "<tr>";
												echo "<td>";
												echo $row['category'];
												echo "</td>";
												echo "<td>";
												echo $row['rank'];
												echo "</td>";
												echo "<td>";
												echo $row['score']."分";
												echo "</td>";
												echo "</tr>";
											}
											?>

										</tbody>
									</table>
									<?php }?>
									<?php if(!empty($schoolwork_items))
									{?>
									<h4>校园工作：</h4>
									<table class="ui basic table segment">
										<tbody>
											<?php 
											foreach($schoolwork_items as $row)
											{
												echo "<tr>";

												echo "<td>";
												echo $row['schoolworkstarttime']."至".$row['schoolworkendtime'];
												echo "</td>";

												echo "<td>";
												echo $row['schoolworkplace'];
												echo "</td>";

												echo "<td>";                
												echo $row['schoolworkcareer'];
												echo "</td>";

												echo "<td>";
												echo $row['schoolcareerinfo'];
												echo "</td>";
												echo "</tr>";
											}
											?>
										</tbody>
									</table>
									<?php }?>
									<?php if(!empty($social_items))
									{?>
									<h4>实习经历：</h4>
									<table class="ui basic table segment">
										<tbody>
											<?php 
											foreach($social_items as $row)
											{
												echo "<tr>";

												echo "<td>";
												echo $row['socialstarttime']."至".$row['socialendtime'];
												echo "</td>";
												echo "<td>";
												echo $row['socialcareer'];
												echo "</td>";
												echo "<td>";
												echo $row['socialplace'];
												echo "</td>";

												echo "<td>";
												echo $row['socialcareerinfo'];
												echo "</td>";
												echo "</tr>";
											}
											?>
										</tbody>
									</table>
									<?php }?>
									<?php if(!empty($project_items))
									{?>
									<h4>项目经验：</h4>
									<table class="ui basic table segment">
										<tbody>
											<?php
											if($project_items)
											{         
												foreach($project_items as $row)
												{
													echo "<tr>";
													echo "<td>";
													echo $row['projectstarttime']."至".$row['projectendtime'];
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
													echo "</tr>";
												}
											}
											?>
										</tbody>
									</table>
									<?php }?>
									<?php if(!empty($award_items))
									{?>
									<h4>所获奖励：</h4>
									<table class="ui basic table segment">

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
													echo "</tr>";
												}
											}

											?>

										</tbody>
									</table>
									<?php }?>
									<?php if(!empty($etc_items))
									{?>
									<h4>其他：</h4>
									<table class="ui basic table segment">

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
													echo "</tr>";
												}
											}
											?>
										</tbody>
									</table>
									<?php }?>
									<?php if(!empty($attach_items))
									{?>
									<h4>附件：</h4>
									<table class="ui basic table segment">
										<thead>
											<tr>
												<th>提交时间</th>
												<th>附件名称</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if($attach_items)
											{         
												foreach($attach_items as $row)
												{
													echo "<tr>";
													echo "<td>";
													echo $row['attachinfo'];
													echo "</td>";
													echo "<td>";
													echo "<a href = ";
													echo "/iter/uploads/userattach/".$row['id']."_".$row['attachtitle'];
													echo ">";
													echo $row['attachtitle'];
													echo "</a>";
													echo "</td>";
													echo ' <td>
													<div class="ui red mini button">';
														echo '<a href="';
														echo base_url('/resume/deleteattachbyid/'.$row['id']);
														echo '">删除</a></div></td>';
														echo "</tr>";

													}
												}

												?>
												<tr>
													<!--从数据库中查询，填入下面的表格中！很简单-->
													<td id="attachtitle" name="attachtitle"  ></td>
													<td id="attachinfo"  name="attachinfo"   ></td>
												</tr>
											</tbody>
										</table>
										<?php }?>
									</div>
								</div>
							</div>
							<div class="three wide column"></div>
						</div>
					</div>
					<?php
				}
				else
				{
					echo "请先登陆,呵呵";
				}
				?>
				<div class="ui grid">
					<div class="three column row">
						<div class="two wide column"></div>
						<div class="twelve wide column">
							<div class="ui horizontal icon divider">
								<i class="circular heart icon"></i>
							</div>
							<h5 class="center aligned ui header">Copyright @ITer 2014-2015</h5>
						</div>
						<div class="two wide column"></div>
					</div>
				</div>

			</body>
			</html>