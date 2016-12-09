
		  <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#language-edit">
			<span class="glyphicon glyphicon-pencil"></span>
			增加
		  </button>
	
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
		  <form class="form-horizontal" role="form"  nam= "langform" id = "langform" method="post">
          <div class="form-group">
            <label for="language-type" class="col-sm-2 control-label">语言类别</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forcategorys" name="forcategorys"></div>
          </div>
          <div class="form-group">
            <label for="lan-level" class="col-sm-2 control-label">等级</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forranks" name="forranks" ></div>
          </div>
          <div class="form-group">
            <label for="point" class="col-sm-2 control-label">分数</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="forscores" name="forscores" ></div>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="functioneditlang()">保存</button>
      </div>
	   </form>
    </div>
    <!-- /.modal-content --> </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
          
            function functioneditlang(){
              var forcategory           =document.getElementById("forcategorys");
              var forrank           =document.getElementById("forranks");
              var forscore           =document.getElementById("forscores");

              var category           =document.getElementById("category");
              var rank           =document.getElementById("rank");
              var score           =document.getElementById("score");

              category.innerHTML = forcategory.value;
              rank.innerHTML = forrank.value;
              score.innerHTML = forscore.value;
      			
      			  document.all("langform").setAttribute("action","<?php echo base_url('/index.php/resume/addlang')?>/<?php echo $CurrentResumeID;?>/<?php echo $userid;?>");
      			  document.all("langform").submit();
              return false;
            }
          </script>