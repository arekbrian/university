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
            ?>

            <div class="row">  
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center">Course Offer</h3><hr>

                    <?php 

                        if (isset($_POST['crs_ofr'])) { 

                             $course_ofr_dept_id = mysqli_real_escape_string($connection,$_POST['course_ofr_dept_id']);

                            ?>



                        <form action="courses-offer_courses_next_page_one.php" method="get" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="ofr_crs_dept_id">Department</label>
                            <select name="ofr_crs_dept_id" id="">
                                 <?php 
                                global $connection;
                                $query = "SELECT * FROM departments WHERE dept_id = $course_ofr_dept_id";
                                $result = mysqli_query($connection,$query);
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $dept_id = $row['dept_id'];
                                    $dept_name = $row['dept_name'];
                                    $dept_batch_type = $row['dept_batch_type'];
                                    $dept_prog_type = $row['dept_prog_type'];
                                    echo "<option value='$dept_id'>$dept_name [$dept_batch_type - $dept_prog_type]</option>";

                                }
                                ?>

                            </select>
                                   
                        </div>

                        <div class="form-group">
                            <label for="crs_ofr_intake">Intake</label>
                            <select name="crs_ofr_intake" id="">

                                <?php 

                                global $connection;
                                $query = "SELECT * FROM intake WHERE intake_dept_id = $course_ofr_dept_id AND intake_status = 'Running' "; 
                                $result = mysqli_query($connection,$query);
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $intake_id = $row['intake_id'];
                                    $intake_no = $row['intake_no'];
                                    echo "<option value='$intake_id'>$intake_no</option>";

                                } 

                                 ?>

                            </select>
                        </div>

                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="crs_ofr_next_page_one" value="Next">
                        </div>
                    </form>



                            
                       <?php }else{ ?>

                     <form action="courses-offer_courses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="course_ofr_dept_id">Select Department</label>
                            <select name="course_ofr_dept_id" id="">
                                 <?php 
                                global $connection;
                                $query = "SELECT * FROM departments";
                                $result = mysqli_query($connection,$query);
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $dept_id = $row['dept_id'];
                                    $dept_name = $row['dept_name'];
                                    $dept_batch_type = $row['dept_batch_type'];
                                    $dept_prog_type = $row['dept_prog_type'];
                                    echo "<option value='$dept_id'>$dept_name [$dept_batch_type - $dept_prog_type]</option>";

                                }
                                ?>

                            </select>
                                   
                        </div>
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="crs_ofr" value="Next">
                        </div>
                    </form>

                     <?php }


                     ?>

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