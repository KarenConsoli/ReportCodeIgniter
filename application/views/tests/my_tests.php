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
    <div class="login-form">
<h1>All Tests</h1>
<table border="1" id="t01"  align="center">
     
    <tr>
        <th> Test Title</th>
        <th>Test Status</th>
        <th> Action</th>
    </tr>
    <?php
    foreach ($result as $vresult) {
        
    
    ?>
    <tr>
        <td><?php echo $vresult->test_title;?></td>
        <td><?php if ($vresult->status==0){
     echo "Published";
        }
        else{
            echo "Unpublished";
        }?></td>
        <td>
           <a href="<?php echo base_url();?>tests/edit_test/<?php echo $vresult->test_id;?>">Edit</a> |
            <a href="<?php echo base_url();?>tests/delete_test/<?php echo $vresult->test_id;?>" onclick="return checkDelete();">Delete</a>
        </td>
    </tr>
    <?php }?>
</table>
</div>