 <div class="login-form">
    <h1> Add Test </h1>
  <div class="main-form">
        <div class="login">
            <div class="inset">
 <form action="<?php echo base_url();?>tests/save_test" enctype="multipart/form-data" method="post" onsubmit="return validateStandard(this)">
        <div>
                        <span><label>Test Title:</label></span>
                        <span><input type="text" name="test_title" placeholder="result Title" tabindex="1" maxlength="25" required="0"  err="Enter Your First Name" size="40" /></span>
                     </div>
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
                     
                     <div>
                        <span><label>Test Description:</label></span>
                        <span><textarea name="test_desc" placeholder="result Description" id="ck_editor" tabindex="2" cols="31"></textarea>  <?php echo display_ckeditor($check_editor['ckeditor']); ?></span>
                     </div>
                    
                          <div class="log-bwn">
                 
                        <input type="submit" name="btn"  value="Add Test"/>
                    
                            </div>
                            
                            <div class="clear"> </div>

          
</form>
</div>
</div>
</div>

