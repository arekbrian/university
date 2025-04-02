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
            if (isset($_POST['crs_asign_three'])) { 

                 $ca_teacher_id = mysqli_real_escape_string($connection,$_POST['crs_asgn_teacher']);
                 $ca_course_id = mysqli_real_escape_string($connection,$_POST['crs_asign_crs']);
                 $ca_dept_id = mysqli_real_escape_string($connection,$_POST['ofr_crs_dept_id']);
                 $ca_intake_id = mysqli_real_escape_string($connection,$_POST['crs_ofr_intake']);
                 $ca_section_id = mysqli_real_escape_string($connection,$_POST['crs_ofr_section']);
                 
                 

                 $select_query = "SELECT * FROM current_semester";
                 $select_query_result = mysqli_query($connection,$select_query);
                 $row = mysqli_fetch_array($select_query_result);

                 $ca_semester= $row['semester_name']."-20".$row['semester_year'];

                 $course_assign_query = "INSERT INTO course_assign(ca_teacher_id,ca_course_id,ca_dept_id,ca_intake_id,ca_section_id,ca_semester) ";

                $course_assign_query .="VALUES('{$ca_teacher_id}',{$ca_course_id},{$ca_dept_id},{$ca_intake_id},{$ca_section_id},'{$ca_semester}')";

                  $course_assign_query_result = mysqli_query($connection,$course_assign_query);
                  if (!$course_assign_query_result) {
                    die("course_assign_query_result failed ".mysqli_error($connection));
                  }else{
                     echo "<script>alert('Course assign done!!');</script>";
                  }
                    header("Location: courses-assign_courses.php");

                
}
                ?>

            




            <!-- end row -->

            
                <!-- end col -->

        </div>
            <!--- end row -->

    </div> <!-- container -->

</div> <!-- content -->

<!-- Footer start-->
<?php include "includes/admin_footer.php"; ?>
<!-- Footer end-->