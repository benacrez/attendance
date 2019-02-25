<?php 
include("controls/connect.php");
if(isset($_POST['addBtn'])){
    $mypic = $_FILE['pst']['name'];
    $type = $_FILE['pst']['type'];    
    $tmp = $_FILE['pst']['tmp_name'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $cpy = mysqli_real_escape_string($con, $_POST['cpy']);
    $dpt = mysqli_real_escape_string($con, $_POST['dpt']);
    $task = mysqli_real_escape_string($con, $_POST['task']);
    $staff_id = mysqli_real_escape_string($con, $_POST['staff_id']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $bs = mysqli_real_escape_string($con, $_POST['bs']);
    $hll = mysqli_real_escape_string($con, $_POST['hll']);
    $tll = mysqli_real_escape_string($con, $_POST['tll']);
    $oll = mysqli_real_escape_string($con, $_POST['oll']);
    $doe = mysqli_real_escape_string($con, $_POST['doe']);
    $doc = mysqli_real_escape_string($con, $_POST['doc']);
    $date = mysqli_real_escape_string($con, date("d-m-Y"));
    $pst = mysqli_real_escape_string($con, $mypic);
    $reg_id = mysqli_real_escape_string($con, rand(232454,999999));
    $select = ("SELECT * FROM staff_tb WHERE staff_id = '$staff_id'");
    $query = mysqli_query($con, $select);
    $result = mysqli_fetch_assoc($query);
    $num = mysqli_num_rows($query);
    if($num > 0):?>
        <div class="alert alert-danger">
            Staff Record already Exist!
        </div>
    <?php else:?>
    <?php if($num == 0):?>
    <?php  
        move_uploaded_file($tmp, "passport/$mypic");
         $insert = ("INSERT INTO staff_tb(`name`, gender, dob, cpy, dpt, task, staff_id, salary, bs, hll, tll, oll, doa, doc, `date`, reg_id, pst) VALUES('$name', '$gender', '$dob', '$cpy', '$dpt', '$task', '$staff_id', '$salary', '$bs', '$hll', '$tll', '$oll', '$doe', '$doc', '$date','$reg_id', '$mypic')");
        die($insert);
         $q = mysqli_query($con, $insert);
         ?>
         <div class="alert alert-success">
            Staff record added Successful!.
         </div>
<?php endif;
        endif;
}
?>

<table class="table table-striped table-hover">
<tr>
<td>Name<input name="name" type="text" class="form-control" required> </td>
<td>Gender
<select name="gender" class="form-control" id="sel1" required>    
    <option></option>
    <option>Male</option>
    <option>Female</option>
    <option>Others</option>
</select>
</td>
<td>Date of Birth
<input name="dob" type="date" class="form-control" required></td>
<td>Company
<select name="cpy" class="form-control" id="sel1" required>    
    <option></option>
    <option>CMF</option>
    <option>Unicane</option>
    <option>George Calil</option>
</select>
</td>
</tr>
<tr>
<td>Department
<select name="dpt" class="form-control" id="sel1" required>    
    <option></option>
    <option>Fabrication</option>
    <option>Electrical</option>
    <option>Accounting</option>
    <option>Procurement</option>
    <option>Logistics</option>
    <option>IT </option>
    <option>Administration</option>
    <option>Cleaning</option>
    <option>Process Control</option>
    <option>Production</option>
    <option>Transport</option>
    <option>Security</option>
    <option>Auditing</option>
</select>
</td>
<td>Task/Rank
<select name="task" class="form-control" id="sel1" required>    
    <option></option>
    <option>HOD</option>
    <option>Asst. HOD</option>
    <option>Officer</option>
</select>
</td>
<td>Staff ID<input name="staff_id" type="text" step="any" class="form-control" value="<?php echo rand(1234,9999);?>" readonly></td>
<td>Salary<input name="salary" type="text" step="any" class="form-control" required></td>
</tr>
<tr>
    <td>Basic Salary<input name="bs" type="text" step="any" class="form-control" required></td>
    <td>Housing Allowance<input name="hll" type="text" step="any" class="form-control" required></td>
    <td>Transport Allowance<input name="tll" type="text" step="any" class="form-control" required></td>
    <td>Other Allowance<input name="oll" type="text" step="any" class="form-control" reuired></td>
</tr>
<tr>
<td>Date of First Apointment<input name="doe" type="date"  class="form-control" required></td>
<td>Date of Confirmation<input name="doc" type="date" step="any" class="form-control" required></td>
<td>Passport<input name="pst" class="fomr-control" type="file" required></td>
<td><input name="addBtn" type="submit" class="btn btn-secondary form-control" value="Add Staff"></td>
</tr>
</table>