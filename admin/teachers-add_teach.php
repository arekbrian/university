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
      if (isset($_POST['create_teach'])) {

          $teach_name = ucwords(mysqli_real_escape_string($connection,$_POST['teach_name']));
         
          $teach_short_code = strtoupper(mysqli_real_escape_string($connection,$_POST['teach_short_code']));

///Passsword encrypting
          $teach_password_raw = mysqli_real_escape_string($connection,$_POST['teach_password']);
         //  $query = "SELECT randSalt FROM teachers ";
         //  $select_ranSalt_query = mysqli_query($connection,$query);
         //  if (!$select_ranSalt_query) {
         //     die("query filed " .mysqli_error($connection));
         // }  
         //  $row = mysqli_fetch_array($select_ranSalt_query);
         //  $salt = $row['randSalt']; 
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
 
 ///file query
          $teach_image = $_FILES['teach_image']['name'];
          $destination = "assets/tchrimages/" . $teach_image;  
          $file = $_FILES['teach_image']['tmp_name'];
          move_uploaded_file($file, $destination);
///ending file query

///create_teacher_id

          $query = "SELECT * FROM departments WHERE dept_id= $teach_dept_id ";
          $result = mysqli_query($connection,$query);
           if (!$result) {
            die("dept code query failed ".mysqli_error($connection));
          }
           while ($row=mysqli_fetch_assoc($result)) {
              $dept_code = $row['dept_code'];
    
          }
          $year = date('y');
          $join_year = $year . ($year + 1);
          
          $query = "SELECT * FROM teachers WHERE teach_dept_id = $teach_dept_id ORDER BY teach_id DESC LIMIT 1";

          $result = mysqli_query($connection, $query);
          if (!$result) {
            die("teacher id query failed ".mysqli_error($connection));
          }
          $result_exists = mysqli_num_rows($result);
          if($result_exists > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $teach_id = intval($row['teach_id']) + 1;
            }
          } else {
            $teach_id = $join_year . $dept_code . '001';
          }
///ending create teacher id


           if (empty($teach_name && $teach_password && $teach_dept && $teach_designation)) {
           echo " Please Fill All Information";
          }else{

          $query = "INSERT INTO teachers(teach_id,teach_name,teach_short_code,teach_password,teach_room_no,teach_dept_id,teach_dept,teach_email,teach_contact_no,teach_designation,teach_image,teach_current_address,teach_permanent_address,teach_university,teach_qualification) ";

          $query .="VALUES('{$teach_id}','{$teach_name}','{$teach_short_code}','{$teach_password}','{$teach_room_no}',{$teach_dept_id},'{$teach_dept}','{$teach_email}','{$teach_contact_no}','{$teach_designation}','{$teach_image}','{$teach_current_address}','{$teach_permanent_address}','{$teach_university}','{$teach_qualification}')";

          $create_teacher_query = mysqli_query($connection,$query);
          if (!$create_teacher_query) {
            die("create_teacher_query failed ".mysqli_error($connection));
          }
            header("Location: teachers-add_teach.php");

       }

      }

      ?>
            
        <h3 class="text-center">Add Teacher</h3><hr>
          <div class="row"> 
            <div class="col-md-6">      
              <form action="teachers-add_teach.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="teach-name">Add Name</label>
                    <input type="text" class="form-control" name="teach_name" placeholder="Arunavo Dey" >
                </div>
                <div class="form-group">
                    <label for="teach-short_code">Add Short Name</label>
                    <input type="text" class="form-control" name="teach_short_code" placeholder="AD" >
                </div>
                 <div class="form-group">
                    <label for="teach-password">Add Password</label>
                    <input type="text" class="form-control" name="teach_password" placeholder="******" >
                </div>
                <div class="form-group">
                    <label for="teach-room_no">Add Room No</label>
                    <input type="text" class="form-control" name="teach_room_no" placeholder="910" >
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
                    <input type="text" class="form-control" name="teach_email" placeholder="arko@gmail.com" >
                </div>
                 <div class="form-group">
                    <label for="teach-contact_no">Add Contact No</label>
                    <input type="text" class="form-control" name="teach_contact_no" placeholder="01700000000" >
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
                    <input type="text" class="form-control" name="teach_current_address" placeholder="Mirpur 2, Dhaka" >
                </div>
                <div class="form-group">
                    <label for="teach-permanent_address">Add Parmanent Address</label>
                    <input type="text" class="form-control" name="teach_permanent_address" placeholder="Dhanmondi, Dhaka" >
                </div>
                <div class="form-group">
                    <label for="teach-university">Add University</label>
                    <input type="text" class="form-control" name="teach_university" placeholder="Bangladesh University of Engineering and Technology" >
                </div>
                 <div class="form-group">
                    <label for="teach-qualification">Add Qualifications</label>
                    <textarea class="form-control" name="teach_qualification" id="" rows="5"></textarea>
                </div>
              </div>
               <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="create_teach" value="Create Teacher">
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