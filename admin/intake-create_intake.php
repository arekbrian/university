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
                    <h3 class="text-center">Add New Intake</h3><hr>

           
                     <form action="intake-create_intake_next_page_one.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="intake_dept">Select Department</label>
                            <select name="intake_dept" id="">
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
                            <input type="submit" class="btn btn-primary" name="intake_next_page_one" value="Next">
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