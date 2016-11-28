<div class="login-form">
    <h1> Edit Patient </h1>
  <div class="main">
        <div class="login">
            <div class="inset">

<form name="edit_profile" action="<?php echo base_url(); ?>blogger/update_user" method="post" onsubmit="return validateStandard(this)">
                    <input type="hidden" name="user_id" value="<?php echo $user; ?>" >
                     <div>
                        <span><label>Patient First Name</label></span>
                        <span><input type="text" name="first_name" placeholder="First Name" required="1" regexp="JSVAL_RX_ALPHA" err="Enter First Name..." /></span>
                     </div>
                     <div>
                        <span><label>Patient Last Name</label></span>
                        <span><input type="text" name="last_name" placeholder="Last Name" required="1" regexp="JSVAL_RX_ALPHA" err="Enter Last Name..."  /></span>
                     </div>
                     <div>
                        <span><label>Email</label></span>
                        <span><input type="text" name="email_address" placeholder="Email Address" required="1" regexp="JSVAL_RX_EMAIL" err="Enter Valid Email Address..."  /></span>
                     </div>
                    
                          <div class="log-bwn">
                 
                        <input type="submit" name="btn"  value="Add Patient"/>
                    
                            </div>
                            
                            <div class="clear"> </div>
    <script type="text/javascript" language="javascript">
        document.forms['edit_profile'].elements['country'].value='<?php echo $result->country;?>'
    </script>
</form>
</div>
</div>


