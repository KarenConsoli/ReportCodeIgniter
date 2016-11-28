<div class="login-form">
    <h1> Select Patient for the Report </h1>
  <div class="main-form">
        <div class="login">
            <div class="inset">

 <form action="<?php echo base_url();?>reports/add_report" enctype="multipart/form-data" method="post" onsubmit="return validareportandard(this)">
                     <div>
                        <span><label>Select Patient:</label></span>
                        <span><select name="user_id">
                    <option>
                        Select patient.....
                    </option>
                    <?php foreach ($all_user as $v_user) {
                        
                        ?><option value="<?php echo $v_user->user_id;?>"><?php echo $v_user->first_name;?> <?php echo $v_user->last_name;?></option>
                    <?php }?>
                
                </select></span>
                     </div>
                     <br/>
                <div class="log-bwn">
                 
                        <input type="submit" name="btn"  value="Select User"/>
                    
                            </div>
   
          
</form>
</div>
</div>
</div>

