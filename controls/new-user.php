<?php 
    // New User Creation Query.
    //Check to make sure the userBtn is Clicked
    if(isset($_POST['userBtn'])){
    include("controls/connect.php");
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone_num = mysqli_real_escape_string($con, $_POST['phone_num']);
    $uname = mysqli_real_escape_string($con, $_POST['uname']);
    $pwd = md5($_POST['pwd']);
    $cpwd = md5($_POST['cpwd']);
    $access_level = mysqli_real_escape_string($con, "1");  
    $reg_id = rand(123234,999999);
      // Password and Confirm Passwsord Match Check.
        if($pwd != $cpwd){
            ?>
        <div class = "alert alert-danger">
                Password Don't Match!
        </div>
            <?php
        }else{
            //Query to check if Username or Phone Number Exist.
            include("controls/connect.php");
            $s = ("SELECT * FROM lg_tb WHERE uname ='$uname'");
            $q = mysqli_query($con, $s);
            $r = mysqli_fetch_assoc($q);
            $n = mysqli_num_rows($q);
            if($n > 0){
                ?>
                <div class = "alert alert-danger">
                    Username; Please Choose A New Username!
            </div>
                <?php
            }else{
                $insert = ("INSERT INTO lg_tb(`name`, phone_num, uname, pwd, access_level, reg_num) VALUES('$name', '$phone_num', '$uname', '$pwd', '$access_level', '$reg_num')");
               $query = mysqli_query($con, $insert);
               ?>
                    <div class = "alert alert-success">
                        New User Created Successful!.
            </div>
               <?php
            }
          
        }
        
    }
?>