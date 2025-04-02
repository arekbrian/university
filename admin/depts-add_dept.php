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

            <div class="row">  
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center">Add Department</h3><hr>
        <?php 
            include "includes/db.php";
            global $connection;
            if (isset($_POST['create_dept'])) {
                $dept_code = mysqli_real_escape_string($connection,$_POST['dept_code']);
                $dept_name = mysqli_real_escape_string($connection,$_POST['dept_name']);
                $dept_prog_type = mysqli_real_escape_string($connection,$_POST['dept_prog_type']);
                $dept_batch_type = mysqli_real_escape_string($connection,$_POST['dept_batch_type']);
                
               

                 if (empty($dept_code && $dept_name && $dept_prog_type)) {
                 echo " Please Fill All Information";
             }else{
                
              $query = "DELETE FROM courses WHERE course_dept_name = '$dept_name' AND course_batch_type = '$dept_batch_type' ";
              $result = mysqli_query($connection,$query);
                if (!$result) {
                  die("query failed". mysqli_error($connection));
                }

                 $query = "SELECT * FROM departments WHERE dept_name= '$dept_name' AND dept_prog_type= '$dept_prog_type' AND dept_batch_type= '$dept_batch_type' ";
                 $query_rslt = mysqli_query($connection,$query);
                 if (!$query_rslt) {
                     die("query failed". mysqli_error($connection));
                 }else{

                    if (mysqli_num_rows($query_rslt)<1) {
                      $query = "INSERT INTO departments(dept_code,dept_name,dept_prog_type,dept_batch_type) ";

                      $query .="VALUES('{$dept_code}','{$dept_name}','{$dept_prog_type}','{$dept_batch_type}') ";

                      $create_dept_query = mysqli_query($connection,$query);
                       if (!$create_dept_query) {
                  die("query failed". mysqli_error($connection));
                }
                      header("Location: depts-add_dept.php");  
                    }else{
                        echo "<script>alert('already exist!!');</script>";
                    }

                 }


                

                 

               

             }

            }

        ?>

                     <form action="depts-add_dept.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="dept-code">Add Dept. Code</label>
                            <input type="text" class="form-control" name="dept_code">
                        </div>
                         
                        <div class="form-group">
                            <label for="dept_prog_type">Add Program Type</label></br>
                            <select name="dept_prog_type" id="">
                              <option value= 'Under Graduate'>Under Graduate</option>
                              <option value= 'Graduate'>Graduate</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dept_batch_type">Batch Type</label></br>
                            <select name="dept_batch_type" id="">
                              <option value= 'Day'>Day</option>
                              <option value= 'Evening'>Evening</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dept_name">Add Program</label></br>
                            <select name="dept_name" id="">
                              <!-- undergraduate -->
                              <option value= 'BBA'>BBA</option>
                              <option value= 'B.Sc. in Computer Science & Information Technology (CSIT)'> B.Sc. in Computer Science & Information Technology (CSIT)</option>
                              <option value= 'B.Sc. in Computer Science & Engineering (CSE)'> B.Sc. in Computer Science & Engineering (CSE)</option>
                              <option value= 'B. Sc. in Electrical and Electronic Engineering (EEE)'>B. Sc. in Electrical and Electronic Engineering (EEE)</option>
                              <option value= 'B. Sc. in Textile Engineering'>B. Sc. in Textile Engineering</option>
                              <option value= 'B. Architechture (B.Arch.)'>B. Architechture (B.Arch.)</option>
                              <option value= 'BA (Hons.) in English '>BA (Hons.) in English </option>
                              <option value= 'B.Sc. (Hons.) in Economics'>B.Sc. (Hons.) in Economics</option>
                              <option value= 'B.Sc. (Hons.) in Environment and Development Economics'>B.Sc. (Hons.) in Environment and Development Economics</option>
                              <option value= 'LL.B (Hons.)'>LL.B (Hons.)</option>
                              <!-- graduate programm-->
                              <option value= 'LLMBA (Regular)'>LLMBA (Regular)</option>
                              <option value= 'MBA (Executive)'>MBA (Executive)</option>
                              <option value= 'MBM (Master of Bank Management)'>MBM (Master of Bank Management)</option>
                              <option value= 'M.Sc. in Mathematics (General/Thesis-One-Year)'>M.Sc. in Mathematics (General/Thesis-One-Year)</option>
                              <option value= 'M.Sc. in Mathematics (General/Thesis-Two-Year)'>M.Sc. in Mathematics (General/Thesis-Two-Year)</option>
                              <option value= 'MA in English'>MA in English</option>
                              <option value= 'MA in English Language Teaching (ELT)'>MA in English Language Teaching (ELT)</option>
                              <option value= 'M.Sc. in Economics'>M.Sc. in Economics</option>
                              <option value= 'LL.M'>LL.M</option>
                              
                            </select>
                         </div>
                          
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="create_dept" value="Create Dept">
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