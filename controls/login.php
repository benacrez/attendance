<?php
session_start();   
  include("controls/connect.php");
$_SESSION['uname'] = mysqli_real_escape_string($con,$_POST['uname']);
$_SESSION['pwd'] = md5($_POST['pwd']);
 if(isset($_POST['loginBtn'])){     
     $sel = ("SELECT * FROM lg_tb WHERE uname = '".$_SESSION['uname']."'");
    $query = mysqli_query($con, $sel);
    $num = mysqli_num_rows($query);
    do{
        $uname = $result['uname'];
        $pwd = $result['pwd'];
        $access_level = $result['access_level'];
    }while($result = mysqli_fetch_assoc($query));
    if($uname == $_SESSION['uname'] && $pwd == $_SESSION['pwd'] && $access_level == 1){
        header("location:panel.php");
    }else{
        ?>
        <div class="alert alert-danger">
            Invalid Login Credentials.<?php echo $_SESSION['pwd'];?>
        </div>

        <?php
    }
 }
?>