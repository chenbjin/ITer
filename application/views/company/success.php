<div class="ui grid">

 <div class="three column row">
    <div class="four wide column"></div>
     <div class="eight wide column">
<?php   if($success):	?>
 
<div class="ui success message">
  <i class="close icon"></i>
  <div class="header">
      <strong>Congraduation: </strong>公司注册成功，
      <a href="<?php echo base_url('/company/login');?>">请点这里返回登陆！</a>
  </div>
</div>
</div>
</div>
</div>
<?php endif; ?>

<?php   if($push):	?>
<div class="ui success message">
  <i class="close icon"></i>
  <div class="header">
      <strong>Congraduation: </strong>职位发布成功，
      <a href="<?php echo base_url('/company');?>">请点这里返回查看！</a>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php endif; ?>