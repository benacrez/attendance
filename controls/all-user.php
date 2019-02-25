<?php
include("controls/connect.php");
$s = ("SELECT * FROM lg_tb ORDER BY timestamp DESC");
$q = mysqli_query($con, $s);
$r = mysqli_fetch_assoc($q);
$n = mysqli_num_rows($q);
$count = 0;
if($n == 0):?>
<div class="alert alert-danger">
    No Record Found!
</div>
<?php else:?>
<?php if($n > 0):?>
<table class="table table-hover table-bordered table-striped table-condensed">
<tr>
<td><strong>S/N<strong></td>
<td><strong>Name</strong></td>
<td><strong>Phone Number</strong></td>
<td><strong>Username</strong></td>
<td><strong>Date Created and Time</strong></td>
<td></td>
<td></td>
</tr>
<?php do{?>
<tr>
<td><?php echo ++$count;?></td>
<td><?php echo $r['name'];?></td>
<td><?php echo $r['phone_num'];?></td>
<td><?php echo $r['uname'];?></td>
<td><?php echo $r['timestamp'];?></td>
<td><a href="update-user.php?reg_num=<?php echo $r['reg_num'] ?>"><i class="fa fa-edit"></i></a></td>
<td><a onclick="" href="delete-user.php?reg_num=<?php echo $r['reg_num'] ?>"><i class="fa fa-trash-o"></i></a></td>
</tr>
<?php }while($r = mysqli_fetch_assoc($q));?>
</table>
<?php endif;?>
<?php endif;?>
