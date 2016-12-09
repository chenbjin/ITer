<div class="three column row">
	<div class="four wide column"></div>
		<div class="eight wide column">
			<div class="ui teal  segment">
				<a href="<?php echo base_url("/moments/getTopic")?>"><div class="ui teal ribbon label">经验交流<i class="hand up icon"></i></div></a>
				<h3><?php echo $topic['TopicTitle']; ?></h3>
				<a href="#">作者：<?php echo $topic['UserName'];?></a>

				<div class="ui divider"></div>
					<p> <?php echo $topic['TopicContent'];?> </p>
				<div class="ui divider"></div>
          		<h4 class="ui header">
                     本文评论<div class="ui teal circular label"><?php echo $topic['ReplyNum']; ?> </div>
          		</h4>
 			<div class="ui comments">
 				<?php if($reply != 0) {
	  				foreach ($reply as $item): ?>
                <div class="comment">
                  <div class="avatar">
                          <i class="user icon large blue inverted  circular"></i>
                  </div>
                  <div class="content">
                      <a class="author"><?php echo $item['UserName'];?></a>
                      <div class="metadata">
                          <span class="date"><?php echo $item['ReplyTime'];?></span>
                      </div>
                      <div class="text">
                          <?php echo $item['ReplyContent'];?>
                      </div>                   
                </div>
                <div class="ui divider"></div>
                <?php endforeach; } ?>
            	</div> 
            	<input type="text" style="display:none" id="username" value="<?php 
            		$iter = $this->session->userdata('iter');
            		echo $iter['name'];
            	?>">
            
            	<input type="text" id="topicid" style="display:none" value="<?php 
            	 echo $topic['TopicID'];
            	?>">            
	      
	              <form class="ui reply form" name="topicform" id="topicform">
	                  <div class="field">
	                      <textarea  name="reply" id="reply" placeholder="写下你的评论..." required></textarea>
	                  </div>
	                  <input type="hidden" name="submitted" value="true">
	                  <input type="button" name="submits"  onclick="loginandpost()" value="true" style="display: none" id="commit" >
					  <label class="ui  blue submit teal button" for="commit"><i class="icon edit"></i> 提交评论</label>
	              </form>
	        </div>        
            </div>
		</div>
		<div class="four wide column"></div>
</div>

	  <script type="text/javascript">
	        function loginandpost()
	        {
	        	var username = document.getElementById("username").getAttribute("value");
	       		var topicid = document.getElementById("topicid").getAttribute("value");
	       		var reply = $("#reply").val();
	       		//var reply = document.getElementById("reply").innerHTML;
	       		//alert(reply);
	        	if(username != "")
	        	{
	        		//alert(reply);
	        		if(reply!="")
	        		{
	        		var url = "http://chenbingjin.cn/iter/moments/reply/"+topicid;
	        		//alert(url);
	        		document.all("topicform").setAttribute("action",url);
	        		document.all("topicform").setAttribute("method","post");
    				document.all("topicform").submit();	
    				}
    				else
    				{
    					alert("您好，请写下您的评论");
    				}
    			}
    			else
    			{
    				alert("您好，请先登录");
    			}
	        }
	        </script>	