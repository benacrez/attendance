<?php
// Query to Select for Update
include("controls/connect.php");
if(isset($_GET['reg_num'])){
$reg_num = mysqli_real_escape_string($con, $_GET['reg_num']);
$s = ("SELECT * FROM lg_tb WHERE reg_num = '$reg_num'");
$q = mysqli_query($con, $s);
$r = mysqli_fetch_assoc($q);
$n = mysqli_num_rows($q);
}
mysqli_close($con);
?>

<?php 
// Script for updating password.
include("controls/connect.php");
if(isset($_POST['updateBtn'])){
    $pwd = md5($_POST['pwd']);
    $cpwd = md5($_POST['cpwd']);
    $reg_num = mysqli_real_escape_string($con, $_GET['reg_num']);
    //Check if Password Match.
    if($pwd != $cpwd){?>
        <div class = "alert alert-danger">
            Password Don't Match!
        </div>
   <?php }else{
       $update = ("UPDATE lg_tb SET pwd = '$pwd' WHERE reg_num = '$reg_num'");
       //die($update);
       $query = mysqli_query($con, $update);
       ?>
       <div class ="alert alert-success">
            Password Update Successful!.
       </div>
    <?php }
}
mysqli_close($con);
?>