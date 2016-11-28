</div>
</div>

<div class="login-form">
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<h1 align="center">
    <?php
    $full_name=$this->session->userdata('full_name');
            ?>
    Welcome &nbsp;<?php echo $full_name;?>
</h1>
</div>
</div>
	<div class="footer"> 
		
		<div class="copy-right">
			<div class="container">
				
				<p>Copyright © 2016 Metge: Pathology Lab Reporting System. All rights reserved | Design by <a href="http://www.kbcon.com.ar" target="_blank" >Karen B. Consoli</a></p>
			</div>
		</div>
	</div>	
	<!--smooth-scrolling-of-move-up-->
		<script type="text/javascript">
			$(document).ready(function() {
				/*
				var defaults = {
					containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
				};
				*/
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>js/bootstrap.js"></script>
</body>
</html>	