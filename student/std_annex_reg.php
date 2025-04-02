<?php include "includes/db.php"; ?>
<?php include "includes/std_header.php"; ?>
<?php 
global $connection;
if (isset($_POST['submit'])) {

   $std_id =  mysqli_real_escape_string($connection,$_POST['std_id']);
   $std_pass =  mysqli_real_escape_string($connection,$_POST['std_pass']);
    $std_pass_rpt =  mysqli_real_escape_string($connection,$_POST['std_pass_rpt']);
   $std_dept = mysqli_real_escape_string($connection,$_POST['std_dept']);
    $std_shift = mysqli_real_escape_string($connection,$_POST['std_shift']);

    $lenth = 5;
    if (strlen($std_pass)<=$lenth && strlen($std_pass_rpt)<=$lenth) {
        echo "<script>alert('Please Enter at least 6 digit Password');</script>";
    }else{


        if ($std_pass==$std_pass_rpt) {
        ///Passsword encrypting
          $query = "SELECT randSalt FROM students_basic ";
          $select_ranSalt_query = mysqli_query($connection,$query);
          if (!$select_ranSalt_query) {
             die("query filed " .mysqli_error($connection));
         }  
          $row = mysqli_fetch_array($select_ranSalt_query);
          $std_data_pass = $row['randSalt']; 
          $std_pass = password_hash($std_pass, PASSWORD_BCRYPT,  array('cost' => 12 ));
/// ending Passsword encrypting
          
          if ($std_shift=="Day" && $std_data_pass=="BUBT") {
                $query = "SELECT * FROM students_basic WHERE std_dept = '$std_dept' AND std_id = '$std_id' ";
                $result = mysqli_query($connection,$query);
                if (!$result) {
                    die("select std query failed ".mysqli_error($connection));
                }
                $the_std_id=null;
                $the_std_dept=null;
                while ($row = mysqli_fetch_assoc($result)) {

                    $the_std_id=$row['std_id'];
                    $the_std_dept=$row['std_dept'];
                }

                if ($the_std_id !== null) {
                    $query = "UPDATE students_basic SET ";
                $query .= "std_password = '{$std_pass}' ";       
                $query .= "WHERE std_id = '{$the_std_id}' ";

                $update_std_pass = mysqli_query($connection,$query);
                if (!$update_std_pass) {
                    die("update std pass failed".mysqli_error($connection) );
                }else{
                 $_SESSION['reg_alret'] =  "<div class='alert alert-success'><strong>Success!</strong> Now You Can Login Your Account.</div>";
                  header("Location: ../student/std_strt_login.php" );
                }
                }else{
                    echo "Id Regestration Failed";
                }
                
             }elseif ($std_shift=="Eveening" && $std_data_pass=="BUBT") {
                $query = "SELECT * FROM students_basic_evening WHERE std_dept = '$std_dept' AND std_id = '$std_id' ";
                $result = mysqli_query($connection,$query);
                if (!$result) {
                    die("select std query failed ".mysqli_error($connection));
                }
                $the_std_id=null;
                $the_std_dept=null;
                while ($row = mysqli_fetch_assoc($result)) {

                    $the_std_id=$row['std_id'];
                    $the_std_dept=$row['std_dept'];
                }

                if ($the_std_id !== null) {
                 $query = "UPDATE students_basic_evening SET ";
                $query .= "std_password = '{$std_pass}' ";       
                $query .= "WHERE std_id = '{$the_std_id}' ";

                $update_std_pass = mysqli_query($connection,$query);
                if (!$update_std_pass) {
                    die("update std pass failed".mysqli_error($connection) );
                }else{
                 $_SESSION['reg_alret'] =  "<div class='alert alert-success'><strong>Success!</strong> Now You Can Login Your Account.</div>";
                  header("Location: ../student/std_strt_login.php" );
                }
                }else{
                    echo "Id Regestration Failed";
                }

             }elseif ($std_shift=="NULL" && $std_data_pass=="BUBT") {
                $query = "SELECT * FROM students_basic WHERE std_dept = '$std_dept' AND std_id = '$std_id' ";
                $result = mysqli_query($connection,$query);
                if (!$result) {
                    die("select std query failed ".mysqli_error($connection));
                }
                $the_std_id=null;
                $the_std_dept=null;
                while ($row = mysqli_fetch_assoc($result)) {

                    $the_std_id=$row['std_id'];
                    $the_std_dept=$row['std_dept'];
                }

                if ($the_std_id !== null) {
                $query = "UPDATE students_basic SET ";
                $query .= "std_password = '{$std_pass}' ";       
                $query .= "WHERE std_id = '{$the_std_id}' ";

                $update_std_pass = mysqli_query($connection,$query);
                if (!$update_std_pass) {
                    die("update std pass failed".mysqli_error($connection) );
                }else{
                 $_SESSION['reg_alret'] =  "<div class='alert alert-success'><strong>Success!</strong> Now You Can Login Your Account.</div>";
                  header("Location: ../student/std_strt_login.php" );
                }
                }else{
                    echo "Id Regestration Failed";
                }

             }else{
                echo "Shift And Defult Pass doesnot Matched.ID Regestration Failed";
             }

    }else{
        echo "<script>alert('your given Two Password does not match. Please Give Same Pass word');</script>";
    }

    }
    
    
    
}


 ?>




    <div class="login-form-wrapper">
        <div class="global-menu">
            <ul>
                <li>
                    <a href=""><img src="assets/img/index.png" alt=""></a>
                </li>
                <li>
                    <a href=""><img src="assets/img/inx.png" alt=""></a>
                </li>
                <li>
                    <a href=""><img src="assets/img/in.png" alt=""></a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="std_annex_reg.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="course_reg_four">Enter Your ID:</label>
                            <input type="text" class="form-control" name="std_id" placeholder="192010331001" >
                        </div>
                        <div class="form-group">
                            <label for="course_reg_four">Enter New Password:</label>
                            <input type="text" class="form-control" name="std_pass" placeholder="123456" >
                        </div>
                        <div class="form-group">
                            <label for="course_reg_four">Repeat Your Given Password:</label>
                            <input type="text" class="form-control" name="std_pass_rpt" placeholder="123456" >
                        </div>
                        <div class="form-group">
                             <label for="std_dept">Select your Dept:</label>
                             <select name="std_dept" id="" class="custom-select mb-3">
                               <?php 
                                global $connection;
                                $query = "SELECT * FROM departments";
                                $result = mysqli_query($connection,$query);
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $dept_code = $row['dept_code'];
                                    $dept_name = $row['dept_name'];
                                    echo "<option value='$dept_name'>$dept_name</option>";

                                }
                                ?>
                            </select>
                        </div>

                         <div class="form-group">
                            <label for="std_shift">Select Your Shift:</label></br>
                             <select name="std_shift" id="" class="custom-select mb-3">
                              <option value="NULL">None</option>
                              <option value="Day">Day</option>
                              <option value="Eveening">Eveening</option>
                            </select>
                        </div>

                         <div class="form-group btn_input">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <?php include "includes/std_footer.php"; ?>
