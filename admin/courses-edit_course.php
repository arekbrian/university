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

          
            <!-- end row -->

            
      <?php 
        include 'includes/db.php';
        global $connection;
         if (isset($_GET['p_id'])) {
            $the_course_id = $_GET['p_id'];
            $the_course_dept_id = $_GET['d_id'];
         
         $query = "SELECT * FROM courses WHERE course_id = $the_course_id AND course_dept_id = $the_course_dept_id ";
         $select_course_by_id = mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($select_course_by_id)) {
              $course_id=$row['course_id'];
              $course_title=$row['course_title'];
              $course_prerequisites=$row['course_prerequisites'];
              $course_pdf=$row['course_pdf'];
              $course_guiding=$row['course_guiding'];

            }
        }
        
        if(isset($_POST['update_course'])) {

          $course_title = mysqli_real_escape_string($connection,$_POST['course_title']);
          
          $course_guiding = mysqli_real_escape_string($connection,$_POST['crs_sgsn']);

          $course_prerequisites = strtoupper(mysqli_real_escape_string($connection,$_POST['course_prerequisites']));
          

          $the_course_id_new = mysqli_real_escape_string($connection,$_POST['the_course_id_new']);

            // name of the uploaded file
          $course_pdf = $_FILES['course_pdf']['name'];

          // destination of the file on the server
          $destination = "assets/pdfFile/" . $course_pdf;

          // the physical file on a temporary uploads directory on the server
          $file = $_FILES['course_pdf']['tmp_name'];

          // move the uploaded (temporary) file to the specified destination
          move_uploaded_file($file, $destination);

            if (empty($course_pdf)) {
              $query = "SELECT * FROM courses WHERE course_id = $the_course_id_new ";
              $select_course_pdf = mysqli_query($connection,$query);
              while($row=mysqli_fetch_assoc($select_course_pdf)) {
              $course_pdf = $row['course_pdf'];
              }
            }
          
            if (empty( $course_title)) {

               echo " Please Fill All Information";

             }else{

           

                $query = "UPDATE courses SET ";
                $query .= "course_title = '{$course_title}', ";     
                
                $query .= "course_prerequisites ='{$course_prerequisites}', ";
                
                $query .= "course_pdf = '{$course_pdf}', ";
                $query .= "course_guiding = '{$course_guiding}' ";
                $query .= "WHERE course_id = {$the_course_id_new} ";

                $update_course = mysqli_query($connection,$query);
                if (!$update_course) {
                    die("update failed".mysqli_error($connection) );
                }
               
              }

          }
      ?>


      <div class="row">  
                <div class="col-md-6 offset-md-3">
                   <h3 class="text-center">Update Course Details</h3><hr>
                     <form action="courses-edit_course.php" method="post" enctype="multipart/form-data">

                        
                        
                         <div class="form-group">
                            <label for="course-title">Edit Course Title</label>
                            <input type="text" class="form-control" name="course_title" value="<?php echo $course_title; ?>">
                        </div>
                         
                        
                         <div class="form-group">
                            <label for="prereq-course-code">Add Prereqisites Course</label>
                            <input type="text" class="form-control" name="course_prerequisites" value="<?php echo $course_prerequisites; ?>">
                        </div>
                      
                         
                        <div class="form-group">
                            <label for="course-pdf">Upload Course pdf Book</label>
                             <input type="file" name="course_pdf">
                        </div>
                        <div class="form-group">
                            <label for="std_details">Edit Suggestion For this course for student </label>
                            <textarea class="form-control" name="crs_sgsn" id="" rows="6"><?php echo $course_guiding; ?></textarea>
                        </div>
                        <div class="form-group ">
                            <input type="hidden" class="form-control" name="the_course_id_new" value="<?php echo isset($_GET['p_id']) ? $_GET['p_id'] : ''; ?>">

                        </div>

                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update_course" value="Update Course">
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