		<div class="four column row">
			<div class="two wide column"></div>
			<div class="seven wide column">
				<div class="ui piled segment">
					<a href="<?php echo base_url("/career/getCareer/1");?>">
						<div class="ui teal ribbon label">
							正职招聘 <i class="hand up icon"></i>
						</div>
					</a>
					<div class="ui list">
						 <?php foreach ($fulljob as $job ) { ?>
						 
                        <div class="col-sm-5"><a class = "item" href = "<?php echo base_url('/career/jobMsg/').'/'.$job['CareerID']?>">
						<i class="right mail outline icon"></i>
						<?php  echo $job['CareerName']; ?>
						  -----【<?php echo $job['CompanyName'].", ".$job['WorkPlace']." 】";?> </a></div>   
						<?php } ?>  
                   </div>
					<br/>
					<a href="<?php echo base_url("/career/getCareer/2");?>">
						<div class="ui purple ribbon label">
							实习招聘
							<i class="hand up icon"></i>
						</div>
					</a>
					<div class="ui list">
						
						 <?php foreach ($intership  as $job ) { ?>
                        <div class="col-sm-5"><a class = "item"  href = "<?php echo base_url('/career/jobMsg/').'/'.$job['CareerID']?>">
						
						<i class="right mail outline icon"></i>
						<?php  echo $job['CareerName']; ?>
						-----【<?php echo $job['CompanyName'].", ".$job['WorkPlace']."】 ";?></a>
                       </div> 
                       
                    <?php } ?>  
                    
					</div>
						<a href="<?php echo base_url("/career/getCareer/3");?>">
						<div class="ui red ribbon label">
							兼职招聘
							<i class="hand up icon"></i>
						</div>
					</a>
					<div class="ui list">
					<?php foreach ($parttimejob  as $job ) { ?>
                        <div class="col-sm-5"><a class = "item" href = "<?php echo base_url('/career/jobMsg/').'/'.$job['CareerID']?>">
						
						<i class="right mail outline icon"></i>
						<?php  echo $job['CareerName']; ?>
                       -----【<?php echo $job['CompanyName'].", ".$job['WorkPlace']."】 ";?></a>
                       </div> 
                    <?php } ?>  
					</div>

				</div>
			</div>
			