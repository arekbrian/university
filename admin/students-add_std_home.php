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
                    <h3 class="text-center">Add New Student</h3><hr>


                    <?php 

                        if (isset($_POST['select_intake'])) {
                           
                           $dept_id = $_POST['dept_id']; 
                           
                           ?>

                           <form action="students-add_std.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="dept_id">Select Department</label>
                            <select name="dept_id" id="">
                                 <?php 
                                global $connection;
                                $query = "SELECT * FROM departments WHERE dept_id = $dept_id";
                                $result = mysqli_query($connection,$query);
                                $row=mysqli_fetch_array($result);
                                    $dept_id = $row['dept_id'];
                                    $dept_name = $row['dept_name'];
                                    $dept_batch_type = $row['dept_batch_type'];
                                    $dept_prog_type = $row['dept_prog_type'];
                                    echo "<option value='$dept_id'>$dept_name [$dept_batch_type - $dept_prog_type]</option>";
                                ?>

                            </select>      
                        </div>
                        <div class="form-group">
                            <label for="intake_id">Select Intake</label>
                            <select name="intake_id" id="">
                                 <?php 
                                global $connection;


                                $query_intake = "SELECT intake_id,intake_no FROM intake WHERE intake_dept_id = $dept_id ORDER BY intake_no DESC LIMIT 1";

                                $query_intake_result = mysqli_query($connection,$query_intake);
                                if ($query_intake_result) {
                                   $row = mysqli_fetch_array($query_intake_result);
                                   $intake_id = $row['intake_id'];
                                   $intake_no = $row['intake_no'];

                                   echo "<option value='$intake_id'>$intake_no</option>";

                                }else{
                                    die("query_intake_result failed ".mysqli_error($connection));
                                }
                               
                                ?>

                            </select>      
                        </div>

                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="student_next_page_one" value="Next">
                        </div>
                    </form>

                        <?php }else{ ?>

                            <form action="students-add_std_home.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="dept_id">Select Department</label>
                            <select name="dept_id" id="">
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
                            <input type="submit" class="btn btn-primary" name="select_intake" value="Next">
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