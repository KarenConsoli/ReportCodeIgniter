
<div class="login-form">
    <h1> Add Result </h1>
  <div class="main-form">
        <div class="login">
            <div class="inset">
 <form action="<?php echo base_url();?>results/save_result" enctype="multipart/form-data" method="post" onsubmit="return validaresultandard(this)">
                        <div>
                        <span><label>Patient:</label></span>
                        <span><label><?php echo $user->first_name;?> <?php echo $user->last_name;?></label></span>
                        <span><input type="hidden" value="<?php echo $user->user_id;?>" name="user_id" placeholder="result Title" tabindex="1" maxlength="25" required="0"  err="Enter Your First Name" size="40" /></span>
                     </div>
                     
                        <div>
                        <span><label>Result Title:</label></span>
                        <span><input type="text" name="result_title" placeholder="result Title" tabindex="1" maxlength="25" required="0"  err="Enter Your First Name" size="40" /></span>
                     </div>
                     <div>
                        <span><label>Select Test:</label></span>
                        <span><td><select name="test_id">

                <?php if (empty($all_test)){
                    ?>
                    <option>
                        All Tests Have a Result
                    </option>
                    <?php


                }
                else {?>
                    <option>
                        select test.....
                    </option><?php

                }
                   
                     foreach ($all_test as $v_test) {
                        
                        ?><option value="<?php echo $v_test->test_id;?>"><?php echo $v_test->test_title;?></option>
                    <?php }?>
                
                </select></span>
                     </div>
                     <div>
                        <span><label>Result Description:</label></span>
                        <span><textarea name="result_desc" placeholder="result Description" id="ck_editor" tabindex="2" cols="31"></textarea>  <?php echo display_ckeditor($check_editor['ckeditor']); ?></span>
                     </div>
                    
                          <div class="log-bwn">
                 
                        <input type="submit" name="btn"  value="Add Result"/>
                    
                            </div>
                            
                            <div class="clear"> </div>


          
</form>
</div>
</div>
</div>


