<div class="about" style="background:white;">
			
			<?php 
			if  (empty($result))
			{ ?>
				<div class="banner-bottom"> 
				<div class="container">

				<h3>There is NO Report</h3>
				</div>
				</div>
				<?php
			}
			else
			{


			foreach($result as $vresult){ ?>
			<br/>

<div class="banner-bottom"> 
		<div class="container">
			<a href="<?php echo base_url();?>reports/single_report/<?php echo $vresult->report_id;?>"><h3><?php echo $vresult->report_title;?></h3></a>
			<p><?php echo $vresult->report_desc;?><a href="<?php echo base_url();?>reports/single_report/<?php echo $vresult->report_id;?>" class="hvr-bounce-to-bottom quod">Read More</a></p>
			<p style="text-align: right"> <?php echo $vresult->created_date_time;?></p>
		</div>
	</div>
				<img  src="<?php echo base_url();?>images/separador-puntos-azul.jpg" alt=""/>
				<?php } ?>
				<div class="clearfix"> </div>

			 <p style="text-align: right"> <?php echo $blog; }?></p>
</div>

