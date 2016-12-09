创建简历的这个页面可以和mysetting一样
<div class="container">
    <div class="row">
      <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-3">
              <div class="list-group">
                <a href="#" class="list-group-item active">简历列表</a>
                <a href="#" class="list-group-item">简历1</a>
              
              <a href="#" class="list-group-item">简历2</a>
              <a href="#" class="list-group-item">简历3</a>
              <a href="add-resume.php" class="list-group-item">新建简历</a>
            </div>
          </div>

          <div class="col-sm-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-6"> <strong>新简历</strong>
                    &nbsp
                    <a href="resume-preview.php">预览简历</a>
                  </div>

                  <div class="col-md-3 col-md-offset-3">
                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#rename-re">重命名</button>
                    &nbsp
                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                      <span class="glyphicon glyphicon-trash"></span>
                      删除
                    </button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-4">
                    <h4> <strong>基本信息：</strong>
                    </h4>
                  </div>
                  <div class="col-md-2 col-md-offset-6">
                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#basic-edit">
                      <span class="glyphicon glyphicon-pencil"></span>
                      编辑
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-6">
                    <p>姓名：数据库抓取</p>
                    <p>性别：</p>
                    <p>手机：</p>
                    <p>邮箱：</p>
                    <p>居住地：</p>
                    <p>政治面貌：</p>
                    <p>出生年月：</p>
                  </div>
                  <div class="col-md-3">
                    <div class="thumbnail">
                      <img alt="140x140" src="img/top_logo.gif" class="img-rounded"/>
                      <div class="caption">
                        <hr/>
                        <input class="input-file" id="photo" name="photo" type="file" value="上传照片"></div>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-group">
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>教育信息：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edu-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted">起止时间</th>
                          <th class="text-muted">所学专业</th>
                          <th class="text-muted">学历</th>
                          <th class="text-muted">GPA</th>
                          <th class="text-muted">管理</th>
                        </thead>
                        <tr>
                          <td>2011.09-2015.07</td>
                          <td>计算机科学与技术</td>
                          <td>本科</td>
                          <td>5.0</td>
                          <td>
                            <a href="#">删除</a>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>语言能力：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#language-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted">语言类别</th>
                          <th class="text-muted">等级</th>
                          <th class="text-muted">分数</th>
                          <th class="text-muted">管理</th>
                        </thead>

                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>

                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>校园工作：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#schooljob-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted">起始时间</th>
                          <th class="text-muted">工作单位</th>
                          <th class="text-muted">职位</th>
                          <th class="text-muted">职务描述</th>
                          <th class="text-muted">管理</th>
                        </thead>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>实习经历：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#internship-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted">起始时间</th>
                          <th class="text-muted">工作单位</th>
                          <th class="text-muted">职位</th>
                          <th class="text-muted">职务描述</th>
                          <th class="text-muted">管理</th>
                        </thead>
                      </table>

                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>项目经历：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#project-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted">起始时间</th>
                          <th class="text-muted">项目名称</th>
                          <th class="text-muted">团队规模</th>
                          <th class="text-muted">负责工作</th>
                          <th class="text-muted">项目描述</th>
                          <th class="text-muted">管理</th>
                        </thead>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>所获奖励：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#award-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted">获奖时间</th>
                          <th class="text-muted">奖励名称</th>
                          <th class="text-muted">颁奖单位</th>
                          <th class="text-muted">描述</th>
                          <th class="text-muted">管理</th>
                        </thead>
                      </table>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>其他：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                      <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#others-edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                        增加
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted">标题</th>
                          <th class="text-muted">
                            <small>描述</small>
                          </th>
                          <th class="text-muted">管理</th>

                        </thead>
                      </table>

                    </div>
                    <div class="col-md-2"></div>
                  </div>

                </li>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <h4>
                        <strong>作品/附件：</strong>
                      </h4>
                    </div>
                    <div class="col-md-2 col-md-offset-4">  
                        <input class="input-file" id="add" name="add" type="file">

                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                      <table class="table table-hover">
                        <thead>
                          <th class="text-muted">
                            <small>作品列表</small>
                          </th>
                          <th class="text-muted">管理</th>
                        </thead>
                      </table>

                    </div>
                   
                  </div>

                </li>
              </ul>
            </div>

          </div>

        </div>

      </div>
  </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >删除简历</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="sure" class="col-sm-5 control-label">确定删除该简历？</label>
            <br/>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">确定</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->
<!-- /.modal -->
<div class="modal fade" id="rename-re" tabindex="-1" role="dialog" aria-labelledby="rename-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >重命名</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="resume-name" class="col-sm-2 control-label">简历名称</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="resume-name" ></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->
<!-- /.modal -->

<!-- /.modal -->
<div class="modal fade" id="basic-edit" tabindex="-1" role="dialog" aria-labelledby="basic-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >基本信息</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">*姓名</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="name" ></div>
          </div>
          <div class="form-group">
            <label for="male" class="col-sm-2 control-label">*性别</label>
            <div class="col-sm-4">
              <div class="controls">
                <label class="radio-inline">
                  <input type="radio" value="1" checked="checked" name="sex">男</label>
                <label class="radio-inline">
                  <input type="radio" value="2" name="sex">女</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">*出生日期</label>
            <div class="col-sm-4">
              <select name="tYEAR" id="tYEAR" size="1" onChange="createSelectDate()"></select>
              <select name="tMON" id="tMON" size="1" onChange="createSelectDate()"></select>
              <select name="tDAY" id="tDAY" size="1" ></select>
              <script type="text/javascript">createSelectDate(1);</script>
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-sm-2 control-label">*居住地</label>
            <div class="col-sm-8">
              <select  name="fromProvince" id="fromProvince" onchange="selectMoreCity1(this)"></select>
              <select name="fromCity" id="fromCity">
                <option selected value="">城市</option>
              </select>
            </div>
          </div>
          <script type="text/javascript" language ="javascript"><!--
                //BindProvince();//只初始化省份
                     BindCity1("广州");//初始化  
            // --></script>
          <div class="form-group">
            <label for="phone"class="col-sm-2 control-label">*手机</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="phone" ></div>
          </div>
          <div class="form-group">
            <label for="Email" class="col-sm-2 control-label">*邮箱</label>
            <div class="col-sm-4">
              <input type="email" class="form-control" id="Email" ></div>
          </div>

          <div class="form-group">
            <label for="politicystate" class="col-sm-2 control-label">*政治面貌</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="politicystate" ></div>
          </div>

          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-warning">
              <a href="resume-edu">下一步</a>
            </button>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->
<!-- /.modal -->
<div class="modal fade" id="edu-edit" tabindex="-1" role="dialog" aria-labelledby="edu-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >教育信息</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="time" class="col-sm-2 control-label">*就读时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="time"></div>
          </div>
          <div class="form-group">
            <label for="university" class="col-sm-2 control-label">*就读学校</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="university"></div>
          </div>
          <div class="form-group">
            <label for="major" class="col-sm-2 control-label">*专业名称</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="major" ></div>
          </div>
          <div class="form-group">
            <label for="degree" class="col-sm-2 control-label">*学历</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="major" ></div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->

<!-- /.modal -->
<div class="modal fade" id="language-edit" tabindex="-1" role="dialog" aria-labelledby="language-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >语言能力</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="language-type" class="col-sm-2 control-label">语言类别</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="language-type"></div>
          </div>
          <div class="form-group">
            <label for="lan-level" class="col-sm-2 control-label">等级</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="lan-level" ></div>
          </div>
          <div class="form-group">
            <label for="point" class="col-sm-2 control-label">分数</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="major" ></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->
<!-- /.modal -->
<div class="modal fade" id="schooljob-edit" tabindex="-1" role="dialog" aria-labelledby="schooljob-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >校园工作</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="sc-time" class="col-sm-2 control-label">起止时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="sc-time" ></div>
          </div>
          <div class="form-group">
            <label for="organization" class="col-sm-2 control-label">工作单位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="organization"></div>
          </div>
          <div class="form-group">
            <label for="position" class="col-sm-2 control-label">职位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="position" ></div>
          </div>
          <div class="form-group">
            <label for="sc-job-discribe" class="col-sm-2 control-label">职位描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="sc-job-discri"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->

<!-- /.modal -->
<div class="modal fade" id="internship-edit" tabindex="-1" role="dialog" aria-labelledby="internship-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >实习经历</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="in-time" class="col-sm-2 control-label">起止时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="in-time" ></div>
          </div>
          <div class="form-group">
            <label for="company" class="col-sm-2 control-label">工作单位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="company"></div>
          </div>
          <div class="form-group">
            <label for="in-position" class="col-sm-2 control-label">职位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="in-position" ></div>
          </div>
          <div class="form-group">
            <label for="in-job-discribe" class="col-sm-2 control-label">职位描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="job-discri"></textarea>

            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->

<!-- /.modal -->
<div class="modal fade" id="project-edit" tabindex="-1" role="dialog" aria-labelledby="project-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >项目经历</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="pr-time" class="col-sm-2 control-label">起止时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="pr-time" ></div>
          </div>
          <div class="form-group">
            <label for="project-name" class="col-sm-2 control-label">项目名称</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="project-name"></div>
          </div>

          <div class="form-group">
            <label for="teamsize" class="col-sm-2 control-label">团队规模</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="teamsize" ></div>
          </div>
          <div class="form-group">
            <label for="workfor" class="col-sm-2 control-label">负责工作</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="workfor" ></div>
          </div>
          <div class="form-group">
            <label for="project-discri" class="col-sm-2 control-label">项目描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="project-discri"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->

<!-- /.modal -->
<div class="modal fade" id="award-edit" tabindex="-1" role="dialog" aria-labelledby="award-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >所获奖励</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="aw-time" class="col-sm-2 control-label">获奖时间</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="aw-time" ></div>
          </div>
          <div class="form-group">
            <label for="aw-name" class="col-sm-2 control-label">奖励名称</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="aw-name"></div>
          </div>
          <div class="form-group">
            <label for="aw-organization" class="col-sm-2 control-label">颁奖单位</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="aw-organization" ></div>
          </div>
          <div class="form-group">
            <label for="aw-discri" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="aw-discri"></textarea>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->

<!-- /.modal -->
<div class="modal fade" id="others-edit" tabindex="-1" role="dialog" aria-labelledby="others-edit-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" >其他</h4>
      </div>
      <div class="modal-body">
        <!-- /.modal-body -->
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="ot-title" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ot-title" ></div>
          </div>
          <div class="form-group">
            <label for="ot-discri" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="3" id="ot-discri"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- List group -->

<?php
echo validation_errors();
?>

    <script src="jquery.provincesCity.js" type="text/javascript"></script>
    <script src="provincesdata.js" type="text/javascript"></script>
	<script language="javascript" type="text/javascript" src="<?=base_url("/static/js/WdatePicker.js")?>"></script>
	<script language="javascript" type="text/javascript" src="<?=base_url("/static/js/jquery.provincesCity.js")?>"></script>
	<script language="javascript" type="text/javascript" src="<?=base_url("/static/js/provincesdata.js")?>"></script>
<div class="row">
<?php
echo form_open('resume/create');
?>
	<div class="col-xs-6">
  <ul>
  <li>个人基本信息</li>
  </ul>
<div>
 <th><font id="Lid_type">求职类型</font></th>
  <td><select name="WorkType" id = "WorkType"> 
<option value="0" SELECTED>全职</option>
<option value="1" >兼职</option>
<option value="2" >实习</option>
  </select></td>
</div>

<div >姓名：<input name = "UserName" id = "UserName" type = "text" placeholder="姓名"></input></div>
<div>
手机号：<input name = "Tel" id = "Tel" type = "text" placeholder = "手机号"></input>
</div>

<div>
学校：<input type = "text" placeholder = "学校" name = "School" id = "School"></input>
</div>

<div>
  <th>学历： </th>
  <td colspan="3"> 
<input type="Radio" name="Education"  id = "Education" value="0" >博士
<input type="Radio" name="Education"  id = "Education" value="1" >硕士
<input type="Radio" name="Education"  id = "Education" value="2" CHECKED >本科
<input type="Radio" name="Education"  id = "Education" value="3" >大专
<input type="Radio" name="Education"  id = "Education" value="4" >高中
 </td>
</div>

<div>
专业：<input type = "text" placeholder = "专业" id = "Major" name = "Major"></input>
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
  <th><span>*</span><font id="Identity" name = "idnumber" >证件号码</font></th>
  <td><input type="text" name="Identity" class="frame7" value=""></td>
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
现居住地址：<input type = "text"  name = "Address" id = "Address" placeholder = "输入您现在的地址"></input>
</div>
<div>
电子邮箱: <input name = "Email" id = "Email" type = "text" placeholder = "电子邮箱"></input>
</div>
<div>
个人博客: <input name = "Blog" id = "Blog" type = "text" placeholder = "个人博客"></input>
</div>


<div>
紧急联系人: <input name = "EmergencyContacter" id = "EmergencyContacter" type = "text" placeholder = "紧急联系人"></input>
</div>
<div>
联系电话: <input name = "EmergencyTel" id = "EmergencyTel" type = "text" placeholder = "联系电话"></input>
</div>


<input type = "submit" name = "submit" value = "提交"></input>
  </form>

</div>
 <div class="col-xs-6">
 <h2>上传照片</h2>
<!-- 调用PHP 的一个方法-->
<iframe   frameborder="0" height="200px" width="300px" src="<?=base_url("/static/img/person.png")?>"  name="imgiframe" id="imgiframe" ></iframe>  
<?php echo form_open_multipart('resume/upload');?>
<input type="file" name="userfile" size="20" />
<br /><br />
<input type="submit" value="upload" />
</form>

<div class='case_list'>
<div id="show_img"></div><!--图片就在这个div里面显示-->

</div>

  </div>

</div>
