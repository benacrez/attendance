<?php 
include("controls/connect.php");
if(isset($_POST['cancelBtn'])){
        header("location:all-user.php");
        }elseif(isset($_POST['deleteBtn'])){
    $reg_num = mysqli_real_escape_string($con, $_GET['reg_num']); 
        $delete = ("DELETE FROM lg_tb WHERE reg_num ='$reg_num'");
        $query = mysqli_query($con, $delete);
        //die($delete);
        ?>
        <div class="alert alert-success">
            User deleted Successful!
        </div>
        <?php   
}else{
    
    }
mysqli_close($con);
?>
  <form method="post" enctype="multipart/form-data">
<table class="table table-striped">
    <tr>
        <td><input type="submit" name="cancelBtn" class = "btn btn-secondary btn-lg" value="Cancel"></td>
        <td><input type="submit" name = "deleteBtn" class = "btn btn-primary btn-lg" value="Delete-User"></td>
    </tr>
</form>
</table>