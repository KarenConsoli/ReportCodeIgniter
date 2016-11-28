<!DOCTYPE html>
<html>
<head>
<title>Metge </title>
<link href="<?php echo base_url();?>css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>css/style.css" type="text/css" rel="stylesheet" media="all">
<!--web-font-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<!--//web-font-->
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Metge Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
 <link rel="stylesheet" href="<?php echo base_url();?>example/example.css">
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

  <!-- This is what you need -->
  <script src="<?php echo base_url();?>dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>dist/sweetalert.css">
<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  
<script src="<?php echo base_url();?>js/modernizr.custom.63321.js"></script>
<!-- //js -->	
<!-- start-smoth-scrolling-->
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

<link href="<?php echo base_url();?>css/style_form.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script>
	function myFunction()
		{
			alert("Thanks for login");
		}
</script>
<!--//end-smoth-scrolling-->
<!--//end-smoth-scrolling-->
<link href="<?php echo base_url();?>css/style_login.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Square login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
<link href="<?php echo base_url();?>css/drop.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Square login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--Google Fonts-->

</head>
<body>
	
	<div class="banner bnr-text">
		<!--header-->
		<div class="container">
			<div class="header">			
				<div class="header-logo">
					<a  href="<?php echo base_url();?>admin_login/index"><img src="<?php echo base_url();?>images/logo.png" alt="logo"/></a>
				</div>
				<div class="top-nav">
						<span class="menu"><img src="<?php echo base_url();?>images/menu-icon.png" alt=""/></span>		
					<ul class="nav1">
						<li><a href="<?php echo base_url();?>">Home</a></li>
						<li><a  href="<?php echo base_url();?>admin_login/index">Operators</a></li>
						 <?php
                $user_id=$this->session->userdata('user_id');
                if ($user_id!=null) {
                    
                
                ?>
                <li><a href="<?php echo base_url();?>blogger/logout">Log Out</a></li>
                
						
						
						<?php }
                     else {?>
						<li><a href="<?php echo base_url();?>login/user_login">Patient LogIn</a></li>
					
					  <?php }?>
					  <li><a href="<?php echo base_url();?>welcome/contact">Contact</a></li>
				</ul>
					<!-- script-for-menu -->
					 <script>
					   $( "span.menu" ).click(function() {
						 $( "ul.nav1" ).slideToggle( 300, function() {
						 // Animation complete.
						  });
						 });
					</script>
				</div>	
				
				
				
			</div>	
			<!--//header-->								
		</div>



	</div>	
	<div id="main_content">

				<?php
                       
                        echo $maincontent;?>
	</div>






	<!--footer-->
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