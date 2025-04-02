<!--  header Start -->
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
      if (isset($_POST['create_course'])) {
          $course_code = strtoupper(mysqli_real_escape_string($connection,$_POST['course_code']));
          $course_title = mysqli_real_escape_string($connection,$_POST['course_title']);
          $course_dept_name_code = mysqli_real_escape_string($connection,$_POST['course_dept_name']);
          $crs_sgsn = mysqli_real_escape_string($connection,$_POST['crs_sgsn']);

          $arr = explode("+",$course_dept_name_code);
          $course_dept_name = $arr[0];  
          $course_dept_id = $arr[1];

          $query_dept = "SELECT * FROM departments WHERE dept_id = $course_dept_id";
          $query_dept_result = mysqli_query($connection,$query_dept); 
          $row = mysqli_fetch_array($query_dept_result);
          $course_batch_type =$row['dept_batch_type'];  

         

          // $course_batch_type = mysqli_real_escape_string($connection,$_POST['course_batch_type']);
          $course_credits = mysqli_real_escape_string($connection,$_POST['course_credits']);
          $prereq_course_code = strtoupper(mysqli_real_escape_string($connection,$_POST['prereq_course_code']));
          $cost_per_credit = mysqli_real_escape_string($connection,$_POST['cost_per_credit']);
          

          // name of the uploaded file
          $course_pdf = $_FILES['course_pdf']['name'];

          // destination of the file on the server
          $destination = "assets/pdfFile/" . $course_pdf;

          // the physical file on a temporary uploads directory on the server
          $file = $_FILES['course_pdf']['tmp_name'];

          // move the uploaded (temporary) file to the specified destination
          move_uploaded_file($file, $destination);

           if (empty($course_code && $course_title && $course_dept_name && $course_credits && $cost_per_credit)) {
           echo " Please Fill All Information";
       }else{

        $query = "SELECT * FROM courses WHERE course_dept_id = {$course_dept_id} AND course_code = '{$course_code}' " ;
            $result = mysqli_query($connection,$query);

            if (!$result) {
                die("course query failed".mysqli_error($connection));
            }else{

                if (mysqli_num_rows($result)>0) {
                    echo "<script>alert('course already exist!');</script>";
                }else{
                    //starting query for updating Department table
            $course_total_cost = $course_credits*$cost_per_credit;
           
             $query = "SELECT course_credits,course_total_cost FROM courses WHERE course_dept_name = '{$course_dept_name}' AND course_batch_type = '{$course_batch_type}' " ;
            $result = mysqli_query($connection,$query);
             if (!$result) {
               die("course query failed".mysqli_error($connection));
           }
           $dept_total_cost=0;
           $course_total_credits=0;
           while($row = mysqli_fetch_assoc($result)){
           $course_total_credits += $row['course_credits'];
           $dept_total_cost += $row['course_total_cost'];
          
         }
            $dept_total_cost=$dept_total_cost+ $course_total_cost;
            $course_total_credits=$course_total_credits+$course_credits;
            $query = "UPDATE departments SET ";
          $query .= "dept_total_cost = {$dept_total_cost}, ";
          $query .= "dept_total_credits = {$course_total_credits} ";
           $query .= "WHERE dept_name = '{$course_dept_name}' AND dept_batch_type = '{$course_batch_type}' ";
           $update_dept_two_clm = mysqli_query($connection,$query);
           if (!$update_dept_two_clm) {
               die("dept updated failed".mysqli_error($connection));
           }
          //end  query for updating Department table

          $query = "INSERT INTO courses(course_code,course_title,course_dept_id,course_dept_name,course_batch_type,course_credits,course_prerequisites,cost_per_credit,course_total_cost,course_pdf,course_guiding)";

          $query .="VALUES('{$course_code}','{$course_title}',{$course_dept_id},'{$course_dept_name}','{$course_batch_type}',{$course_credits},'{$prereq_course_code}',{$cost_per_credit},{$course_total_cost},'{$course_pdf}','{$crs_sgsn}')";

          $create_course_query = mysqli_query($connection,$query);
          if (!$create_course_query) {
              die("create_course_query failed".mysqli_error($connection));
          }else{
            header("Location: courses-add_course.php");
          }
                }

            }


       }

      }

      ?>
      <div class="row">  
                <div class="col-md-6">
                    <h3 class="text-center">Add Course Details</h3><hr>

            <form action="courses-add_course.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="course-code">Add Course Code</label>
                            <input type="text" class="form-control" name="course_code" placeholder="CSE 101" >
                        </div>
                         <div class="form-group">
                            <label for="course-title">Add Course Title</label>
                            <input type="text" class="form-control" name="course_title"  placeholder="Computer Fundamentals">
                        </div>
                         <div class="form-group">
                            <label for="course-dept-name">Add Course Department Name</label>
                            <select name="course_dept_name" id="">
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
                       <!--  <div class="form-group">
                        <label for="course_batch_type">Course Batch Type</label>
                            <select name="course_batch_type" id="">
                              <option value= 'Day'>Day</option>
                              <option value= 'Evening'>Evening</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="course-credits">Add Course Credits</label>
                            <select name="course_credits" id="">
                              <option value= '0'>Credits</option>
                              <option value= '0.25'>0.25</option>
                              <option value= '0.50'>0.50</option> 
                              <option value= '0.75'>0.75</option> 
                              <option value= '1.00'>1.00</option> 
                              <option value= '1.25'>1.25</option> 
                              <option value= '1.50'>1.50</option> 
                              <option value= '1.75'>1.75</option> 
                              <option value= '2.00'>2.00</option>
                              <option value= '2.25'>2.25</option>
                              <option value= '2.50'>2.50</option> 
                              <option value= '2.75'>2.75</option> 
                              <option value= '3.00'>3.00</option>
                              <option value= '3.25'>3.25</option>
                              <option value= '3.50'>3.50</option> 
                              <option value= '3.75'>3.75</option> 
                              <option value= '4.00'>4.00</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                         <div class="form-group">
                            <label for="prereq-course-code">Add Prereqisites Course</label>
                            <input type="text" class="form-control" name="prereq_course_code"  placeholder="CSE 100">
                        </div>
                    
                        <div class="form-group">
                            <label for="course-per-credit">Add Cost Per Credits</label>
                            <input type="text" class="form-control" name="cost_per_credit" placeholder="1650">
                        </div>
                        
                        <div class="form-group">
                            <label for="course-pdf">Upload Course pdf Book</label>
                             <input type="file" name="course_pdf">
                        </div>
                        <div class="form-group">
                            <label for="std_details">Add Suggestion For this course for student </label>
                            <textarea class="form-control" name="crs_sgsn" id="" rows="6"></textarea>
                        </div>
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="create_course" value="Create Course">
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