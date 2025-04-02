<!-- header Start -->
<?php include "includes/admin_header.php"; ?>
<!-- header end -->

 <!-- Top Bar Start -->
<?php include "includes/admin_topbar.php"; ?>
 <!-- Top Bar End -->

<!-- ========== Left Sidebar Start ========== -->
<?php include "includes/admin_left_sidebar.php"; ?>
<!-- Left Sidebar End -->
<?php 
    include "includes/db.php";
    global $connection;

    $query_department = "SELECT COUNT(dept_id) FROM departments";
    $query_department_result = mysqli_query($connection,$query_department);
    $department_row = mysqli_fetch_array($query_department_result);

    $query_intake = "SELECT COUNT(intake_id) FROM intake";
    $query_intake_result = mysqli_query($connection,$query_intake );
    $intake_row = mysqli_fetch_array($query_intake_result);

    $query_section = "SELECT COUNT(section_id) FROM section";
    $query_section_result = mysqli_query($connection,$query_section );
    $section_row = mysqli_fetch_array($query_section_result);

    $query_course = "SELECT COUNT(course_id) FROM courses";
    $query_course_result = mysqli_query($connection,$query_course );
    $course_row = mysqli_fetch_array($query_course_result);

    $query_student = "SELECT COUNT(std_id) FROM students_basic";
    $query_student_result = mysqli_query($connection,$query_student);
    $student_row = mysqli_fetch_array($query_student_result);

    $query_teacher = "SELECT COUNT(teach_id) FROM teachers";
    $query_teacher_result = mysqli_query($connection,$query_teacher);
    $teacher_row = mysqli_fetch_array($query_teacher_result);




?>

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
                <div class="col-md-4">
                    <div class="card-box widget-box-two widget-two-custom">
                        <i class="mdi fa fa-building widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Department</p>
                            <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $department_row[0]; ?></span></h2>
                            <p class="m-0"><?php echo date('d-m-y'); ?></p>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="card-box widget-box-two widget-two-custom">
                        <i class="mdi fa fa-user widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Batch</p>
                            <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $intake_row[0]; ?></span></h2>
                            <p class="m-0"><?php echo date('d-m-y'); ?></p>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="card-box widget-box-two widget-two-custom">
                        <i class="mdi fa fa-user widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Sections</p>
                            <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $section_row[0]; ?></span></h2>
                            <p class="m-0"><?php echo date('d-m-y'); ?></p>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="card-box widget-box-two widget-two-custom">
                        <i class="mdi fa fa-book widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Course</p>
                            <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $course_row[0]; ?></span></h2>
                            <p class="m-0"><?php echo date('d-m-y'); ?></p>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="card-box widget-box-two widget-two-custom">
                        <i class="mdi fa fa-user widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Student</p>
                            <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $student_row[0]; ?></span></h2>
                            <p class="m-0"><?php echo date('d-m-y'); ?></p>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-md-4">
                    <div class="card-box widget-box-two widget-two-custom">
                        <i class="mdi fa fa-user widget-two-icon"></i>
                        <div class="wigdet-two-content">
                            <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Teacher</p>
                            <h2 class="font-600"><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup"><?php echo $teacher_row[0]; ?></span></h2>
                            <p class="m-0"><?php echo date('d-m-y'); ?></p>
                        </div>
                    </div>
                </div><!-- end col -->
   
            </div>
            <!-- end row -->

                <!-- end col -->

        </div>
            <!--- end row -->

    </div> <!-- container -->

</div> <!-- content -->

<!-- Footer start-->
<?php include "includes/admin_footer.php"; ?>
<!-- Footer end-->