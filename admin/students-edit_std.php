
<?php include "includes/admin_header.php"; ?>
<!-- header end -->

 <!-- Top Bar Start -->
<?php include "includes/admin_topbar.php"; ?>
 <!-- Top Bar End -->

<!-- ========== Left Sidebar Start ========== -->
<?php include "includes/admin_left_sidebar.php"; ?>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!--admin welcome star -->
            <?php include "includes/admin_welcome.php"; ?>
            <!--admin welcome end -->
            
      <?php 
      include "includes/db.php";
      global $connection;
       if (isset($_GET['p_id'])) {
            $the_std_id = $_GET['p_id'];
            
        
           $query = "SELECT * FROM students_basic WHERE std_id = '$the_std_id' ";
         $select_std_by_id = mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($select_std_by_id)) {
            $std_id=$row['std_id'];
            $std_edu_year=$row['std_edu_year'];
            $std_name=$row['std_name'];
            $std_dept_id=$row['std_dept_id'];
            $std_dept=$row['std_dept'];
            $std_sem=$row['std_sem'];
            $std_prog_type=$row['std_prog_type'];
            $std_shift=$row['std_shift'];
            $std_email=$row['std_email'];
            $std_contact_no=$row['std_contact_no'];
            $std_gender=$row['std_gender'];
            $std_blood_grp=$row['std_blood_grp'];
            $std_ability_type=$row['std_ability_type'];
            $std_image=$row['std_image'];
            $std_current_address=$row['std_current_address'];
            $std_permanent_address=$row['std_permanent_address'];
            $std_birth_id=$row['std_birth_id'];
            $std_password=$row['std_password'];
            $std_details=$row['std_details'];
            
            }
         
         
        }
if (isset($_POST['update_std'])) {
          $std_name = mysqli_real_escape_string($connection,$_POST['std_name']);
          
          $std_email = mysqli_real_escape_string($connection,$_POST['std_email']);
          $std_contact_no = mysqli_real_escape_string($connection,$_POST['std_contact_no']);
          $std_gender = mysqli_real_escape_string($connection,$_POST['std_gender']);
          $std_blood_grp = mysqli_real_escape_string($connection,$_POST['std_blood_grp']);
          $std_ability_type = mysqli_real_escape_string($connection,$_POST['std_ability_type']);
          $std_current_address = mysqli_real_escape_string($connection,$_POST['std_current_address']);
          $std_permanent_address = mysqli_real_escape_string($connection,$_POST['std_permanent_address']);
          $std_birth_id = mysqli_real_escape_string($connection,$_POST['std_birth_id']); 
          $std_details = mysqli_real_escape_string($connection,$_POST['std_details']);
          $the_std_id = mysqli_real_escape_string($connection,$_POST['the_std_id']);
          
 
///Passsword encrypting
          $std_password = "BUBT";
         //  mysqli_real_escape_string($connection,$_POST['std_password']);
         //  $query = "SELECT randSalt FROM students_basic ";
         //  $select_ranSalt_query = mysqli_query($connection,$query);
         //  if (!$select_ranSalt_query) {
         //     die("query filed " .mysqli_error($connection));
         // }  
         //  $row = mysqli_fetch_array($select_ranSalt_query);
         //  $salt = $row['randSalt']; 
           $std_password = md5($std_password);
/// ending Passsword encrypting


         
 
 ///file query
          $std_image = $_FILES['std_image']['name'];
          $destination = "assets/tchrimages/" . $std_image;  
          $file = $_FILES['std_image']['tmp_name'];
          move_uploaded_file($file, $destination);


            if (empty($std_image)) {
            $query = "SELECT * FROM students_basic WHERE std_id = '$the_std_id' ";
            $select_std_image = mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_std_image)) {
            $std_image = $row['std_image'];
            }
          }
          
           
///ending file query

         if (empty($std_name)) {
           echo " Please Fill All Information";
          }else{
                 $query = "UPDATE students_basic SET ";
                $query .= "std_name = '{$std_name}', ";
                $query .= "std_email = '{$std_email}', ";
                $query .= "std_contact_no = '{$std_contact_no}', ";
                $query .= "std_gender = '{$std_gender}', ";
                $query .= "std_blood_grp = '{$std_blood_grp}', ";
                $query .= "std_ability_type = '{$std_ability_type}', ";
                $query .= "std_image = '{$std_image}', ";
                $query .= "std_current_address = '{$std_current_address}', ";
                $query .= "std_permanent_address = '{$std_permanent_address}', ";
                $query .= "std_birth_id = '{$std_birth_id}', ";
                
                $query .= "std_details = '{$std_details}' ";         
                $query .= "WHERE std_id = '{$the_std_id}' ";

                $update_std = mysqli_query($connection,$query);
                if (!$update_std) {
                    die("update std failed".mysqli_error($connection) );
                }else{
                  echo "student update successfully";
                }

              }

           
       }
       

      ?>
            
        <h3 class="text-center">Edit Students</h3><hr>
          <div class="row"> 
            <div class="col-md-6">      
              <form action="students-edit_std.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="std_name">Add Name</label>
                    <input type="text" class="form-control" name="std_name" value="<?php echo $std_name; ?>" >
                </div>
               
                <div class="form-group">
                    <label for="std_email">Add Email</label>
                    <input type="text" class="form-control" name="std_email" value="<?php echo $std_email; ?>" >
                </div>
                
                
                <div class="form-group">
                    <label for="std_contact_no">Add Contact No</label>
                    <input type="text" class="form-control" name="std_contact_no" value="<?php echo $std_contact_no; ?>" >
                </div>
                 <div class="form-group">
                    <label for="std_gender">Add Gender</label>
                    <select name="std_gender" id="">
                      <option value= '<?php echo ucwords($std_gender); ?>'><?php echo ucwords($std_gender); ?></option>
                      <option value= 'male'>Male</option>
                      <option value= 'Female'>Female</option>
                      <option value= 'Other'>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="std_blood_grp">Add Blood Group</label>
                    <select name="std_blood_grp" id="">
                       <option value= '<?php echo $std_blood_grp; ?>'><?php echo $std_blood_grp; ?></option>
                      <option value= 'A+'>A+</option>
                      <option value= 'A-'>A-</option>
                      <option value= 'B+'>B+</option>
                      <option value= 'B-'>B-</option>
                      <option value= 'AB+'>AB+</option>
                      <option value= 'AB-'>AB-</option>
                      <option value= 'O+'>O+</option>
                      <option value= 'O-'>O-</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="std_ability_type">Student Ability Type</label>
                    <select name="std_ability_type" id="">
                      <option value= '<?php echo $std_ability_type; ?>'><?php echo $std_ability_type; ?></option>
                      <option value= 'Normal'>Normal</option>
                      <option value= 'Abnormal'>Abnormal</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="std_image">Upload Image</label>
                     <input type="file" name="std_image">
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="std_current_address">Add Current Address</label>
                    <input type="text" class="form-control" name="std_current_address" value="<?php echo $std_current_address; ?>" >
                </div>
                <div class="form-group">
                    <label for="std_permanent_address">Add Parmanent Address</label>
                    <input type="text" class="form-control" name="std_permanent_address" value="<?php echo $std_permanent_address; ?>" >
                </div>
                <div class="form-group">
                    <label for="std_birth_id">Add Birth Id</label>
                    <input type="text" class="form-control" name="std_birth_id" value="<?php echo $std_birth_id; ?>" >
                </div>
               
                 <div class="form-group">
                    <label for="std_details">Add Details about past all institute and result</label>
                    <textarea class="form-control" name="std_details" id="" rows="6"></textarea>
                </div>
                <div class="form-group ">
                    <input type="hidden" class="form-control" name="the_std_id" value="<?php echo isset($_GET['p_id']) ? $_GET['p_id'] : ''; ?>">
                </div>
                 
                  
              </div>
               <div class="form-group btn_input">
                  <input type="submit" class="btn btn-primary text-center" name="update_std" value="Update Student">
              </div>
            </form>
          </div>
          </div>
            
                <!-- end col -->

        </div>
            <!--- end row -->

    </div> <!-- container -->

</div> <!-- content -->
<!-- Footer start-->
<?php include "includes/admin_footer.php"; ?>
<!-- Footer end