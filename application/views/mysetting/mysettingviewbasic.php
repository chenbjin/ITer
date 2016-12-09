<div class="ten wide column">
    <div class="ui   green secondary inverted  segment">
        <div class="ui segment">

            <h2>
                简历<?php echo $basicinfo['ResumeID'];?> &nbsp;&nbsp;&nbsp;&nbsp;

                <a class="ui teal label" target= "_blank" href="<?php echo base_url("/index.php/preview/getpreview/")?>/<?php echo $basicinfo['ResumeID']?>">
                    <i class="text file outline icon"></i>
                    预览简历
                </a>
                <a class="ui red label" href="<?php echo base_url("/index.php/resume/deleteByResumeID/")?>/<?php echo $basicinfo['ResumeID']?>">
                    <i class="text file outline icon"></i>
                    删除简历
                </a>
            </h2>

            <div  class="ui divider"></div>
            <div class="ui grid stackable ui grid">
                <div class="row">
                    <div class="eight wide column">
                        <h4>基本信息：</h4>
                        <form action="<?php echo base_url("/index.php/resume/updatebasicByResumeID/".$basicinfo['ResumeID'])?>" method = "post">
                            <div class="ui form">
                                <div class="inline field">
                                    <label>简历名称：</label>
                                    <input type="text" id="resumename" name="resumename" required autofocus value="<?php echo $basicinfo['resumename'];?>"></div>
                                    <div class="inline field">
                                        <label>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</label>
                                        <input type="text" id="basicname" name="basicname" required value="<?php echo $basicinfo['UserName'];?>" ></div>


                                        <div class="inline field">
                                            <label>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</label>
                                            <input type="text"   id="basicgender" name="basicgender" required value="<?php echo $basicinfo['Gender'];?>"></div>


                                            <div class="inline field">
                                                <label>家庭住址：</label>
                                                <input type="text"   id="basicaddress" name="basicaddress" required value="<?php echo $basicinfo['Address'];?>"></div>

                                                <div class="inline  field">
                                                    <label>出生日期：</label>
                                                    <input type="text"  class="form-control" onfocus="HS_setDate(this)"  id="basicbirthofdate" name="basicbirthofdate" required value="<?php echo $basicinfo['Birth_of_Date'];?>"></div>
                                                    <div class="inline field">
                                                        <label>手机号码：</label>
                                                        <input type="text" id="basictel" name="basictel" required value="<?php echo $basicinfo['Tel'];?>"></div>
                                                        <div class="inline field">
                                                            <label>邮箱地址：</label>
                                                            <input type="text" id="basicemail" name= "basicemail" required value="<?php echo $basicinfo['Email'];?>" ></div>
                                                            <div class="inline field">
                                                                <label>政治面貌：</label>
                                                                <input type="text" id="basicpoliticystate" name="basicpoliticystate" required value="<?php echo $basicinfo['PoliticyState'];?>"></div>
                                                            </div>
                                                            <div class="four wide column"></div>

                                                            <input class="ui teal  button" type="submit" value="保存修改"></input>
                                                        </form>

                                                    </div>

                                                    <div class="four wide column">
                                                        <br/>
                                                        <br/>
                                                        <?php echo form_open_multipart('/index.php/resume/updatepicture/'.$basicinfo['ResumeID']);?>
                                                        <div class="ui  segment">
                                                            <div class="ui blue  ribbon label">简历照片</div>

                                                            <img alt="简历照" style="width:150px;height:150px;" src="<?php 
                                                            if(file_exists("/var/www/iter/uploads/usertx/".$basicinfo['ResumeID'].".png"))
                                                                echo base_url("uploads/usertx/".$basicinfo['ResumeID'].".png");
                                                            else
                                                                echo base_url("/static/img/small.png");
                                                            ?>" class="img-rounded"/>
                                                            <input type="file" name="userpicture" size="20" />

                                                            <br /><br />

                                                            <input type="submit" name = "sub" value="upload" />

                                                        </form>
                                                        <h6 class="alert">只能上传png头像</h6>



                                                    </div>
                                                    <div class="four wide column"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>