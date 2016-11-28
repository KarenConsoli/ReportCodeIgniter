             
        </div>
    </div>          
<p>
    <?php
    $exception = $this->session->userdata('exception');
    if (isset($exception)) {
        echo $exception;
        $this->session->unset_userdata('exception');
    }
    ?>
</p>

<div class="login-form">
    <?php
    $exception=$this->session->userdata('exception');
    if(isset($exception)){
        echo $exception;
        $this->session->unset_userdata('exception');
    }
    ?>
            
            <h1>Patient´s LogIn</h1>
            <div class="login-top">
            <form  action="<?php echo base_url();?>login/check_login" method="post" onsubmit="return validateStandard(this)">
                <div class="login-ic">
                    <i ></i>
                    <input type="text" name="first_name" placeholder="first_name"method="post" onsubmit="return validateStandard(this)"/><span class="required">*</span>
                    <div class="clear"> </div>
                </div>
                <div class="login-ic">
                    <i ></i>
                    <input type="text" name="last_name" placeholder="last_name" required="1" regexp="JSVAL_RX_EMAIL" err="Enter Valid Last Name..."/><span class="required">*</span>
                    <div class="clear"> </div>
                </div>
                <div class="login-ic">
                    <i class="icon"></i>
                    <input type="password" name="password" placeholder="Your Password" required="1" regexp="JSVAL_RX_ALPHA_NUMERIC_WITHOUT_HIFANE" err="Enter Password.."/><span class="required">*</span>
                    <div class="clear"> </div>
                </div>
            
                <div class="log-bwn">
                    <input type="submit"  value="Login" >
                </div>
                </form>
            </div>
            
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
