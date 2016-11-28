<div class="login-form">
    <h1> Edit Report </h1>
  <div class="main-form">
        <div class="login">
            <div class="inset">

<form name="edit_report" action="<?php echo base_url();?>reports/update_report" method="post" onsubmit="return validareportandard(this)">
    <input type="hidden" name="report_id" value="<?php echo $result[0]->report_id;?>"  />
    <div>
                        <span><label>Patient:</label></span>
                        <span><label><?php echo $user[0]->first_name;?> <?php echo $user[0]->last_name;?></label></span>
                        <span><input type="hidden" value="<?php echo $user[0]->user_id;?>" name="user_id" placeholder="result Title" tabindex="1" maxlength="25" required="0"  err="Enter Your First Name" size="40" /></span>
                     </div>
                      <div>
                        <span><label>Report Title:</label></span>
                        <span><input type="text" name="report_title" placeholder="result Title" tabindex="1" maxlength="25" required="0"  err="Enter Your First Name" size="40" /></span>
                     </div>
                   
                     <div>
                        <span><label>Select Test:</label></span>
                        <p>Press CTRL to select more than one Option</p>
                        <span><td><select name="test_id[]" multiple="multiple" disable="disabled">

                <?php if (empty($all_test)){
                    ?>
                    <option>
                        All Tests Have a Result
                    </option>
                    <?php


                }
                else {?>
                    <?php

                }
                   
                     foreach ($all_test as $v_test) {
                        
                        ?><option value="<?php echo $v_test->test_id;?>"><?php echo $v_test->test_title;?></option>
                    <?php }?>
                
                </select></span>
                     </div>
                     <div>
                        <span><label>Select Result:</label></span>
                        <p>Press CTRL to select more than one Option</p>
                        <span><select name="result_id[]" multiple="multiple" disable="disabled">
                    <?php foreach ($all_result as $v_result) {
                        
                        ?><option value="<?php echo $v_result->result_id;?>"><?php echo $v_result->result_title;?></option>
                    <?php }?>
                
                </select></span>
                     </div>
                     <div>
                        <span><label>Report Description:</label></span>
                        <span><textarea name="report_desc" placeholder="result Description" id="ck_editor" tabindex="2" cols="31"></textarea>  <?php echo display_ckeditor($check_editor['ckeditor']); ?></span>
                     </div>

                <input type="hidden" name="status" value="0" tabindex="3" />
                <div class="log-bwn">
                 
                        <input type="submit" name="btn"  value="Edit Report"/>
                    
                            </div>
   
     <script type="text/javascript" language="javascript">
        document.forms['edit_report'].elements['report_id'].value='<?php echo $result->report_id;?>'
    </script>
</form>


</div>
</div>
</div>

