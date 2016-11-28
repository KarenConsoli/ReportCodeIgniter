<!DOCTYPE html>
<html>
<head>
<title>CodeIgniter</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Quickly Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url();?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body style="background:black;">
<!-- banner-body -->
		<div class="banner-body">
		<div class="container">
		
<!-- header -->
			<div class="header">
				<div class="header-nav" >
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						   <a class="navbar-brand" href="<?php echo base_url();?>"><span>C</span>odeIgniter Blog</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						 <ul class="nav navbar-nav">
                         
							 <li><a href="<?php echo base_url();?>welcome/index" accesskey="1" title="">Reports</a></li>
               
                <?php
                $user_id=$this->session->userdata('user_id');
                if ($user_id!=null) {
                    
                
                ?>
                
                
                <li><a href="<?php echo base_url();?>blogger/logout" accesskey="4" title="">Log Out</a></li>
                </ul>
				
				<div class="sign-in">
							<ul>
								<li><a href="<?php echo base_url();?>blogger/logout">Log Out</a></li>
								
							</ul>
							</div>
			
				<?php }
                     else {?>
                <li><a href="<?php echo base_url();?>admin_login/index" accesskey="5" title="">Operators</a></li>
                
                </ul>
				
				<div class="sign-in">
							<ul>
								<li><a href="<?php echo base_url();?>login/user_login">Patient Login</a></li>
								
							</ul>
							</div>
                     <?php }?>
				
							

					</nav>
				
	</div>
			<!-- search-scripts -->
			<script src="<?php echo base_url();?>js/classie.js"></script>
			<script src="<?php echo base_url();?>js/uisearch.js"></script>
				<script>
					new UISearch( document.getElementById( 'sb-search' ) );
				</script>
			<!-- //search-scripts -->
			
			
			
			

<!-- //header -->
<!-- header-bottom -->
	
		


	<div class="clearfix"> </div>
<!-- banner -->
		    <?php echo $maincontent;?>
<!-- footer -->
</div>

	
<!-- //footer -->
<!-- for bootstrap working -->
		<script src="<?php echo base_url();?>js/bootstrap.js"> </script>
	</div>
</div>
</div>
		<div class="footer-bottom">
		
			<p>© 2016 CodeIgniterBlog. All rights reserved | Design by <a href="http://kbcon.com.ar/" target="_blank"> Karen B. Consoli</a></p>
	
	</div>
	
<!-- //for bootstrap working -->
</body>
</html>

