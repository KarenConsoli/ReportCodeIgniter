<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Metge a Medical Category Flat bootstrap Responsive website Template | Contact :: w3layouts</title>
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
<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  
<script src="<?php echo base_url();?>js/modernizr.custom.63321.js"></script>
<!-- //js -->	
<!-- start-smoth-scrolling-->
<!-- //Custom Theme files -->
 <link rel="stylesheet" href="<?php echo base_url();?>example/example.css">
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

  <!-- This is what you need -->
  <script src="<?php echo base_url();?>dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>dist/sweetalert.css">
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

</head>
	<div class="banner">
		<!--header-->
		<div class="container">
			<div class="header">			
				<div class="header-logo">
					<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo.png" alt="logo"/></a>
				</div>
				<div class="top-nav">
					<span class="menu"><img src="<?php echo base_url();?>images/menu-icon.png" alt=""/></span>		
					<ul class="nav1">
						<li><a href="<?php echo base_url();?>" class="active">Home</a></li>
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
					<!-- /script-for-menu -->
				</div>	
				
				<div class="clearfix"> </div>

	 <?php echo $maincontent;?>
	 
	