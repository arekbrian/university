<!-- header Start -->
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
            $the_teach_id = $_GET['p_id'];
         
         $query = "SELECT * FROM teachers WHERE teach_id = '$the_teach_id' ";
         $select_teach_by_id = mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($select_teach_by_id)) {
              $teach_id=$row['teach_id'];
              $teach_name=$row['teach_name'];
              $teach_short_code=$row['teach_short_code'];
              $teach_password=$row['teach_password'];
              $teach_room_no=$row['teach_room_no'];
              $teach_dept=$row['teach_dept'];
              $teach_email=$row['teach_email'];
              $teach_contact_no=$row['teach_contact_no'];
              $teach_designation=$row['teach_designation'];
              $teach_image=$row['teach_image'];
              $teach_current_address=$row['teach_current_address'];
              $teach_permanent_address=$row['teach_permanent_address'];
              $teach_university=$row['teach_university'];
              $teach_qualification=$row['teach_qualification'];
             
            }
        }
      if (isset($_POST['update_teach'])) {

          $teach_name = ucwords(mysqli_real_escape_string($connection,$_POST['teach_name']));
         
          $teach_short_code = strtoupper(mysqli_real_escape_string($connection,$_POST['teach_short_code']));

///Passsword encrypting
          $teach_password_raw = mysqli_real_escape_string($connection,$_POST['teach_password']);
         
          $teach_password = md5($teach_password_raw);
/// ending Passsword encrypting


          $teach_room_no = mysqli_real_escape_string($connection,$_POST['teach_room_no']);
          $teach_dept_name_code = mysqli_real_escape_string($connection,$_POST['teach_dept']);

          $arr = explode("+",$teach_dept_name_code);
          $teach_dept = $arr[0];  
          $teach_dept_id = $arr[1];  

          $teach_email = mysqli_real_escape_string($connection,$_POST['teach_email']);
          $teach_contact_no = mysqli_real_escape_string($connection,$_POST['teach_contact_no']);
          $teach_designation = ucwords(mysqli_real_escape_string($connection,$_POST['teach_designation']));
          $teach_current_address = ucwords(mysqli_real_escape_string($connection,$_POST['teach_current_address']));
          $teach_permanent_address = ucwords(mysqli_real_escape_string($connection,$_POST['teach_permanent_address']));
          $teach_university = ucwords(mysqli_real_escape_string($connection,$_POST['teach_university']));
          $teach_qualification = mysqli_real_escape_string($connection,$_POST['teach_qualification']);
          $the_teach_id = mysqli_real_escape_string($connection,$_POST['the_teach_id']);
 
 ///file query
          $teach_image = $_FILES['teach_image']['name'];
          $destination = "assets/tchrimages/" . $teach_image;  
          $file = $_FILES['teach_image']['tmp_name'];
          move_uploaded_file($file, $destination);
           if (empty($teach_image)) {
            $query = "SELECT * FROM teachers WHERE teach_id = $the_teach_id ";
            $select_teach_image = mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_teach_image)) {
            $teach_image = $row['teach_image'];
            }
          }
///ending file query

           if (empty($teach_name && $teach_password && $teach_dept && $teach_designation)) {
           echo " Please Fill All Information";
          }else{
              $query = "UPDATE teachers SET ";
              $query .= "teach_id = '{$the_teach_id}', ";
              $query .= "teach_name = '{$teach_name}', ";
              $query .= "teach_short_code = '{$teach_short_code}', ";     
              $query .= "teach_password = '{$teach_password}', ";
              $query .= "teach_room_no = {$teach_room_no}, ";
              $query .= "teach_dept_id = {$teach_dept_id}, ";
              $query .= "teach_dept = '{$teach_dept}', ";
              $query .= "teach_email ='{$teach_email}', ";
              $query .= "teach_contact_no = '{$teach_contact_no}', ";
              $query .= "teach_designation ='{$teach_designation}', ";
              $query .= "teach_image = '{$teach_image}', ";
              $query .= "teach_current_address = '{$teach_current_address}', ";
              $query .= "teach_permanent_address = '{$teach_permanent_address}', ";
              $query .= "teach_university = '{$teach_university}', ";
              $query .= "teach_qualification = '{$teach_qualification}' ";
              $query .= "WHERE teach_id = '{$the_teach_id}' ";

              $update_teach = mysqli_query($connection,$query);
              if (!$update_teach) {
                  die("update failed".mysqli_error($connection) );
              }
            header("Location: teachers-view_teach.php");

       }

      }

      ?>
            
        <h3 class="text-center">Edit Teacher</h3><hr>
          <div class="row"> 
            <div class="col-md-6">      
              <form action="teachers-edit_teach.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="teach-name">Add Name</label>
                    <input type="text" class="form-control" name="teach_name" value="<?php echo $teach_name; ?>" >
                </div>
                <div class="form-group">
                    <label for="teach-short_code">Add Short Name</label>
                    <input type="text" class="form-control" name="teach_short_code" placeholder="AD" value="<?php echo $teach_short_code; ?>" >
                </div>
                 <div class="form-group">
                    <label for="teach-password">Add Password</label>
                    <input type="text" class="form-control" name="teach_password" placeholder="******" >
                </div>
                <div class="form-group">
                    <label for="teach-room_no">Add Room No</label>
                    <input type="text" class="form-control" name="teach_room_no" value="<?php echo $teach_room_no; ?>" >
                </div>
                
                 <div class="form-group">
                    <label for="teach-dept">Add Department Name</label>
                    <select name="teach_dept" id="">
                         <?php 
                        global $connection;
                        $query = "SELECT * FROM departments";
                        $result = mysqli_query($connection,$query);
                        while ($row=mysqli_fetch_assoc($result)) {
                            $dept_id = $row['dept_id'];
                            $dept_name = $row['dept_name'];
                             $dept_batch_type = $row['dept_batch_type'];
                             $dept_prog_type = $row['dept_prog_type'];
                            echo "<option value='$dept_name+$dept_id'>$dept_name [$dept_batch_type - $dept_prog_type]</option>";

                        }
                        ?>

                    </select>
                           
                </div>
                <div class="form-group">
                    <label for="teach-email">Add Email</label>
                    <input type="text" class="form-control" name="teach_email" value="<?php echo $teach_email; ?>" >
                </div>
                 <div class="form-group">
                    <label for="teach-contact_no">Add Contact No</label>
                    <input type="text" class="form-control" name="teach_contact_no" value="<?php echo $teach_contact_no; ?>" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="teach-designation">Add Designation</label></br>
                    <select name="teach_designation" id="">
                      <option value= 'Professor & Chairman'>Professor & Chairman</option>
                      <option value= 'Assistant Professor'>Assistant Professor</option>
                      <option value= 'Lecturer'>Lecturer</option>
                      
                    </select>
                </div>
                <div class="form-group">
                    <label for="teach-image">Upload Image</label></br>
                     <input type="file" name="teach_image">
                </div>
                <div class="form-group">
                    <label for="teach-current_address">Add Current Address</label>
                    <input type="text" class="form-control" name="teach_current_address" value="<?php echo $teach_current_address; ?>" >
                </div>
                <div class="form-group">
                    <label for="teach-permanent_address">Add Parmanent Address</label>
                    <input type="text" class="form-control" name="teach_permanent_address" value="<?php echo $teach_permanent_address; ?>" >
                </div>
                <div class="form-group">
                    <label for="teach-university">Add University</label>
                    <input type="text" class="form-control" name="teach_university" value="<?php echo $teach_university; ?>" >
                </div>
                 <div class="form-group">
                    <label for="teach-qualification">Add Qualifications</label>
                    <textarea class="form-control" name="teach_qualification" id="" rows="5"></textarea>
                </div>
                 <div class="form-group ">
                    <input type="hidden" class="form-control" name="the_teach_id" value="<?php echo isset($_GET['p_id']) ? $_GET['p_id'] : ''; ?>">
                  </div>
              </div>
               <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="update_teach" value="Update Teacher">
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
<!-- Footer end-->