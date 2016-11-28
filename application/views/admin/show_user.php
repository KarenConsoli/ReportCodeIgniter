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
    <h1>All Patients</h1>
<table id="t01" border="4" align="center">
     
    <tr border="4" >
        <th>Patient Name</th>
        <th>Status </th>
        <th>Edit </th>
        <th>Delete </th>
    </tr>
    <?php
    foreach ($user as $auser) {
        
    
    ?>
    <tr>
        <td><?php echo $auser->first_name.' '.$auser->last_name; ?></td>
        <td><?php  if($auser->admin_status==1){
        echo "activate" ;}
            else     {           echo "block ";
            }?></td>
        <td>
            <a href="<?php echo base_url();?>blogger/edit_profile/<?php echo $auser->user_id;?>" onclick="return checkDelete();">Edit</a>
        </td>
        <td>
            <a href="<?php echo base_url();?>super_admin/block_user/<?php echo $auser->user_id;?>" onclick="return checkDelete();">Delete</a>
        </td>
    </tr>
    <?php }?>
</table>
</div>

