<div style="background:white;">
<form action="<?php echo base_url(); ?>reports/export_pdf" method="post" onsubmit="return validateStandard(this)">
                  <input type="hidden" name="report_id" value= '<?php echo  $result->report_id;?>'/>

                            <input type="hidden" name="report_date" value= '<?php echo  $result->created_date_time;?>'/>
                            <input type="hidden" name="report_title" value= '<?php echo  $result->report_title;?>'/>
    <div class="banner-bottom"> 
        <div class="container">
             <a href="<?php echo base_url();?>reports/single_report/<?php echo $result->report_id;?>"><h3><?php echo $result->report_title;?></h3></a>
            <p><?php echo $result->report_desc;?></p>
             <input type="hidden" name="report_desc" value= '<?php echo  $result->report_desc;?>'/>
            
        </div>
    </div>
    
<div class="banner-bottom"> 
        <div class="container">
            <img  src="<?php echo base_url();?>images/separador-puntos-azul.jpg" alt=""/>
                                  <?php 
            foreach ($tests as $atests) {
                $val=0;
                
            ?>
                    <h3><?php echo $atests->test_title;?></h3>
          
                    <div class="carr-text">
                        
                        <p><?php echo $atests->test_desc;?></p>
                    </div>
                  

                
                    
                    <?php
                     foreach ($results as $aresult) {
             
                    if (empty($aresult)===true){
                              
                        if ($val==0){
                            ?>
                        
                             <h3>Without Result</h3>
                              <?php


                        }
                        $val++;
                        ?>

                 
                <?php
            }
                else{
                if ($atests->test_id==$aresult->test_id){

                    ?>
                     <div class="carr-text">
                        <h3><?php echo $aresult->result_title;?></h3>
                        <p><?php echo $aresult->result_desc;?></p>
                    </div>
                    <?php
                    break;
                }


                }


                    }
                
?>
<img  src="<?php echo base_url();?>images/separador-puntos-azul.jpg" alt=""/>
<?php
                 }

                
                ?>
                <p style="text-align: right"> <?php echo $result->created_date_time;?></p>
               
            </div>
            
            <p >Email PDF to 
                <input type="text" name="mail" style="width:21%;"  value="Write the Email.."> <input type="submit" name="btn"  value="Send"/></p>
           <p ><input type="submit" name="btn"  value="Download PDF"/></p>
           </div>               
                 
                <div class="clearfix"> </div>

            </div>


</form>
				<div class="clearfix"> </div>

              
			
			</div>
            </div>
          
            </div>
    
