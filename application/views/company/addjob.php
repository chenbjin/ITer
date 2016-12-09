<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>ITers发布宣讲会</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <link rel="stylesheet" type="text/css" href="semantic/css/semantic.css">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="semantic/javascript/semantic.js"></script>
  <link rel="stylesheet" type="text/css" href="all.css">
  <script src="all.js"></script>
  <script src="city.js"></script>
</head>

<body>
  <div class="ui teal inverted menu">
    <a class="item" href="homepage.php"> <i class="home icon"></i>
      ITers
    </a>
    <a class="item" href="jobmsg-list.php"> <i class="mail icon"></i>
      已发职位
    </a>
    <a class="active item" href="#">
      <i class="mail icon"></i>
      发布职位
    </a>
    <a class=" item" href="meeting-com.php">
      <i class="bullhorn icon"></i>
      宣讲会
    </a>
    <div class="right menu">
      <div class="ui dropdown link item">
        用户名
        <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item">修改密码</a>
          <a class="item">退出</a>
        </div>
      </div>

    </div>

  </div>

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
          <form>
            <div class="ui form">
              <label>职位名称：</label>
              <div class=" field">
                <input type="text" ></div>
              <label>招聘人数：</label>
              <div class=" field">
                <input type="text" ></div>

              <div class="grouped inline fields">
                <label>职位类型：</label>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="jobtype">
                    <label></label>
                  </div>
                  <label>正职</label>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="jobtype">
                    <label></label>
                  </div>
                  <label>实习</label>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="jobtype">
                    <label></label>
                  </div>
                  <label>兼职</label>
                </div>
              </div>

              <div class="grouped inline fields">
                <label>职位状态：</label>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="jobstate">
                    <label></label>
                  </div>
                  <label>招聘中</label>
                </div>
                <div class="field">
                  <div class="ui radio checkbox">
                    <input type="radio" name="jobstate">
                    <label></label>
                  </div>
                  <label>结束招聘</label>
                </div>
              </div>
              <label>工作城市：</label>
              <div class=" field">
                <select  name="fromProvince" id="fromProvince" onchange="selectMoreCity1(this)"></select>
                <select name="fromCity" id="fromCity">
                  <option selected value="">城市</option>
                </select>
              </div>
              <script type="text/javascript" language ="javascript"><!--
                //BindProvince();//只初始化省份
                     BindCity1("广州");//初始化  
            // --></script>

              <label>职位描述：</label>
              <div class="inline field">

                <textarea></textarea>
              </div>
              <label>职位要求：</label>
              <div class="inline field">

                <textarea></textarea>
              </div>
            </div>
            <div class="ui teal submit button">发布</div>
            <div class="four wide column"></div>

          </form>
        </div>
      </div>

    </div>
    <div class="four wide column"></div>
  </div>

  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>

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
</body>
</html>