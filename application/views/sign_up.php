<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
</style>


<p>
    <?php
    $message=$this->session->userdata('message');
    if(isset($message)){
        echo $message;
        $this->session->unset_userdata('message');
    }
    ?>
</p>
<div class="login-form">
    <h1> Add Patient </h1>
  <div class="main">
        <div class="login">
            <div class="inset">
                <!-----start-main---->
                <form action="<?php echo base_url(); ?>index.php/login/save_user" method="post" onsubmit="return validateStandard(this)">
  
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
                    
                    </form>
                </div>
            </div>
        <!-----//end-main---->
        </div>
</div>
</div>
</div>

