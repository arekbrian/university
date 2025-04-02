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
                    <h3 class="text-center">Add New Section</h3><hr>
        <?php 
            include "includes/db.php";
            global $connection;
            
            if (isset($_POST['section_next_page_one'])) {

                $intake_dept_id = mysqli_real_escape_string($connection,$_POST['intake_dept']);

                ?>

                <form action="section-create_section_next_page_one.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" class="form-control" name="intake_dept_id" value="<?php echo $intake_dept_id; ?>" >

                        <div class="form-group">
                            <label for="intake_dept_id">Department Name</label>
                            <select name="intake_dept_id" id="">
                                 <?php 
                                global $connection;
                                $query = "SELECT * FROM departments WHERE dept_id = $intake_dept_id ";
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
                            <label for="intake_id">Intake No</label>
                            <select name="intake_id" id="">
                                 <?php 
                                global $connection;
                               $query_intake_table = "SELECT * FROM intake WHERE intake_dept_id =$intake_dept_id AND intake_status = 'Running' ORDER BY intake_no DESC";

                               $query_intake_table_result = mysqli_query($connection,$query_intake_table);

                               if ($query_intake_table_result) { 

                                if (mysqli_num_rows($query_intake_table_result)>0) {
                                    $dsbl =0;

                                    while ($row=mysqli_fetch_assoc($query_intake_table_result)) {
                                    $intake_id = $row['intake_id'];
                                    $intake_no = $row['intake_no'];
                                    
                                    echo "<option value='$intake_id'>$intake_no</option>";

                                }

                                        
                                    }else{
                                        $dsbl =1;
                                       echo "<option value=''>No Intake. Create intake First</option>";
                                    } 
                                }else{
                                    die("query_dept_table_result failed ".mysqli_error($connection));
                                } 
                                 
                                ?>

                            </select>           
                        </div>

                        <div class="form-group">
                            <input <?php if($dsbl){echo "disabled";} ?> type="submit" class="btn btn-primary" name="next_section" value="Next">
                        </div>
                </form>

            <?php }elseif(isset($_POST['next_section'])){ 
                
                    
                    $intake_dept_id = mysqli_real_escape_string($connection,$_POST['intake_dept_id']);

                    $intake_id = mysqli_real_escape_string($connection,$_POST['intake_id']);

                ?>



                <form action="section-create_section_next_page_one.php" method="post" enctype="multipart/form-data">

                        <input type="hidden" class="form-control" name="intake_dept_id" value="<?php echo $intake_dept_id; ?>" >

                        <div class="form-group">
                            <label for="intake_dept_id">Department Name</label>
                            <select name="intake_dept_id" id="">
                                 <?php 
                                global $connection;
                                $query = "SELECT * FROM departments WHERE dept_id = $intake_dept_id ";
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
                            <label for="intake_id">Intake No</label>
                            <select name="intake_id" id="">
                                 <?php 
                                global $connection;
                               $query_intake_table = "SELECT * FROM intake WHERE intake_dept_id =$intake_dept_id AND intake_status = 'Running' AND intake_id = $intake_id";

                               $query_intake_table_result = mysqli_query($connection,$query_intake_table);

                               if ($query_intake_table_result) { 

                                    $row=mysqli_fetch_array($query_intake_table_result); 
                                    $intake_id = $row['intake_id'];
                                    $intake_no = $row['intake_no'];
                                    
                                    echo "<option value='$intake_id'>$intake_no</option>";

                                }else{
                                    die("query_dept_table_result failed ".mysqli_error($connection));
                                } 
                                 
                                ?>

                            </select>           
                        </div>

                        <div class="form-group">
                            <label for="section_no">Section No [Showing new Section. so keep it]</label>

                            <?php 
                                global $connection;
                               $query_section_table = "SELECT * FROM section WHERE section_dept_id =$intake_dept_id AND section_intake_id = $intake_id ORDER BY section_no DESC LIMIT 1 ";

                               $query_section_table_result = mysqli_query($connection,$query_section_table);

                               if ($query_section_table_result) {

                          

                                if (mysqli_num_rows($query_section_table_result)==1) {
                                    $row=mysqli_fetch_array($query_section_table_result); 
                                    $section_no = $row['section_no'];
                                    $section_no = $section_no+1;
                                    ?>

                                    <input type="text" class="form-control" name="section_no" value="<?php echo $section_no; ?>" >
                                    
                               <?php }else{ ?>

                                    <input type="text" class="form-control" name="section_no" value="1" >

                               <?php }


                                }else{
                                    die("query_section_table_result failed ".mysqli_error($connection));
                                } 
                                 
                                ?>
                        </div>


                        <div class="form-group">
                            <input  type="submit" class="btn btn-primary" name="create_section" value="Create section">
                        </div>
                </form>



            <?php }elseif(isset($_POST['create_section'])){

                $intake_dept_id = mysqli_real_escape_string($connection,$_POST['intake_dept_id']);

                $intake_id = mysqli_real_escape_string($connection,$_POST['intake_id']);
                
                $section_no = mysqli_real_escape_string($connection,$_POST['section_no']);

                $insert_sec_query = "INSERT INTO section(section_intake_id,section_dept_id,section_no) VALUES($intake_id,$intake_dept_id,$section_no)";
                $insert_sec_query_result = mysqli_query($connection,$insert_sec_query);

                if ($insert_sec_query_result) {
                    header("Location: section-create_section.php");
                }else{
                    die("insert_sec_query_result failed ".mysqli_error($connection));
                }

            }else{ ?>
               <p>Something went worng. <a href="section-create_section.php">try again!</a></p>
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