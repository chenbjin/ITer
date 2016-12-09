 <div class="four column row stackable ui grid">
  <div class="one wide column"></div>
  <div class="three wide column">
   
    <div class="ui vertical green  menu">
      <div class="header item">
        <i class="user icon"></i>
        我的简历
      </div>
      
      <?php
      
      $CurrentResumeID= -1;
          //先假设现在最近的一个简历ID是-1，在循环中控制，得到最近使用的简历,这里有作用域的问题，在下面的页面中获取不到...,用data吧.
      
      if($resumeid_list !="false")
      {
        foreach($resumeid_list as $row)
        {
          ?>
          <a  class="item"  href= "<?php echo site_url("/iter/mysetting/".$row['ResumeID'])?>" class="list-group-item"><?php 
            if($row['resumename'])
              echo $row['resumename'];
            else
              
              echo "简历".$row['ResumeID']?></a>
            <?php
            $CurrentResumeID = $row['ResumeID'];
          }
        } 
        ?>
        
        
        
        <a class="item"  href="<?php echo base_url("/index.php/resume/createresume/".$userid)?>">新建简历</a>
      </div>
    </div>
	<div class="ten wide column">

