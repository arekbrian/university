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
                    <h3 class="text-center">Add New Intake</h3><hr>
        <?php 
            include "includes/db.php";
            global $connection;
            
            $intake_crs_ids=array();
            $course_credits=0;
            $course_total_cost=0;
            
        

            if (isset($_POST['intake_next_page_one'])) {

                $intake_dept_id = mysqli_real_escape_string($connection,$_POST['intake_dept']);
                // $crnt_sem_year  = date('y'); 
                $query_course_table = "SELECT * From courses WHERE course_dept_id =$intake_dept_id AND course_status = 'Running' ";

                $query_course_table_result = mysqli_query($connection,$query_course_table);
                      
                      if ($query_course_table_result) {
                         while ($row=mysqli_fetch_assoc($query_course_table_result)) {
                        $intake_crs_id = array($row['course_id']);  
                        $intake_crs_ids = array_merge($intake_crs_ids,$intake_crs_id);;
                        $course_dept_id=$row['course_dept_id'];

                        $course_credits +=$row['course_credits'];
     
                        $course_total_cost +=$row['course_total_cost'];

                    }

                    $decde_intake_crs_ids_mrg = json_encode($intake_crs_ids);
                      
                    }else{
                        die("query_course_table_result failed ".mysqli_error($connection));
                      }


                $query_dept_table = "SELECT * FROM intake WHERE intake_dept_id =$intake_dept_id AND intake_status = 'Running' ORDER BY intake_no DESC LIMIT 1";

                $query_dept_table_result = mysqli_query($connection,$query_dept_table);

                if ($query_dept_table_result) {
                    
                    if (mysqli_num_rows($query_dept_table_result)>0) {
                        $row = mysqli_fetch_array($query_dept_table_result);
                         $intake_no = $row['intake_no'];
                         $intake_no +=1;
                    }else{
                       $intake_no = 1; 
                    }
                }else{
                    die("query_dept_table_result failed ".mysqli_error($connection));
                }
            }


            if (isset($_POST['create_semester'])) {

                $intake_dept_id = mysqli_real_escape_string($connection,$_POST['intake_dept_id']);
                $intake_no = mysqli_real_escape_string($connection,$_POST['intake_no']);
                $intake_start_date = mysqli_real_escape_string($connection,$_POST['intake_start_date']);
                $intake_end_date = mysqli_real_escape_string($connection,$_POST['intake_end_date']);

            $query_course_table = "SELECT * From courses WHERE course_dept_id =$intake_dept_id AND course_status = 'Running' ";

                $query_course_table_result = mysqli_query($connection,$query_course_table);
                      
                      if ($query_course_table_result) {
                         while ($row=mysqli_fetch_assoc($query_course_table_result)) {
                        $intake_crs_id = array($row['course_id']);  
                        $intake_crs_ids = array_merge($intake_crs_ids,$intake_crs_id);;
                        $course_dept_id=$row['course_dept_id'];

                        $course_credits +=$row['course_credits'];
     
                        $course_total_cost +=$row['course_total_cost'];

                    }

                    $decde_intake_crs_ids_mrg = json_encode($intake_crs_ids);
                      
                    }else{
                        die("query_course_table_result failed ".mysqli_error($connection));
                      }


                $query_dept_table = "SELECT * FROM intake WHERE intake_dept_id =$intake_dept_id AND intake_status = 'Running' ORDER BY intake_no DESC LIMIT 1";

                $query_dept_table_result = mysqli_query($connection,$query_dept_table);

                if ($query_dept_table_result) {
                    
                    if (mysqli_num_rows($query_dept_table_result)>0) {
                        $row = mysqli_fetch_array($query_dept_table_result);
                         $intake_no = $row['intake_no'];
                         $intake_no +=1;
                    }else{
                       $intake_no = 1; 
                    }
                }else{
                    die("query_dept_table_result failed ".mysqli_error($connection));
                }


                $insert_intake_query = "INSERT INTO intake(intake_dept_id,intake_no,intake_all_course_id,inkate_total_credits,intake_total_cost,intake_starting_date,intake_ending_date) VALUES($intake_dept_id,$intake_no,'$decde_intake_crs_ids_mrg',$course_credits,$course_total_cost,'$intake_start_date','$intake_end_date')";

                $insert_intake_query_result = mysqli_query($connection,$insert_intake_query);
                if (!$insert_intake_query_result) {
                    die("insert_intake_query_result failed ".mysqli_error($connection));
                }else{
                    header("intake-create_intake_next_page_one.php");
                }

                
            }
               
               
               

        ?>

                     <form action="intake-create_intake_next_page_one.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                             <input type="hidden" class="form-control" name="intake_dept_id" value="<?php echo $intake_dept_id; ?>" >

                            <label for="intake_dept_id">Department Name</label>
                            <select name="intake_dept_id" id="">
                                 <?php 
                                global $connection;
                                $query = "SELECT * FROM departments WHERE dept_id = $course_dept_id ";
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
                            <label for="intake_no">Intake No [Showing new intake. so keep it]</label>
                            <input type="text" class="form-control" name="intake_no" value="<?php echo $intake_no; ?>" >
                        </div>
                         <div class="form-group">
                            <label for="intake_start_date">Intake Starting Date</label>
                            <input type="date" class="form-control" name="intake_start_date" >
                        </div>
                         <div class="form-group">
                            <label for="intake_end_date">Intake End Date</label>
                            <input type="date" class="form-control" name="intake_end_date">
                        </div>
                        
                          
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="create_semester" value="Create New Intake">
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