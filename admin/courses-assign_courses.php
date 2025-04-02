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
                $select_query = "SELECT * FROM current_semester";
                $select_query_rslt = mysqli_query($connection,$select_query);
                $row = mysqli_fetch_array($select_query_rslt);

                $current_sem = $row['semester_name']."-20".$row['semester_year'];
            ?>

            <div class="row">  
                <div class="col-md-6 offset-md-3">
                    <h3 class="text-center">Course Assign</h3><hr>

                    <?php 

                        if (isset($_POST['crs_ofr'])) { 

                             $course_ofr_dept_id = mysqli_real_escape_string($connection,$_POST['course_ofr_dept_id']);

                            ?>



                        <form action="courses-assign_courses.php" method="post" enctype="multipart/form-data">

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
                            <input type="submit" class="btn btn-primary" name="crs_asign_one" value="Next">
                        </div>
                    </form>



                            
                       <?php }elseif(isset($_POST['crs_asign_one'])){


                        global $connection;

                         $ofr_crs_dept_id = mysqli_real_escape_string($connection,$_POST['ofr_crs_dept_id']);
                         $crs_ofr_intake = mysqli_real_escape_string($connection,$_POST['crs_ofr_intake']);
                         ?>

                         <form action="courses-assign_courses.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="ofr_crs_dept_id">Department</label>
                            <select name="ofr_crs_dept_id" id="">
                                 <?php 
                                global $connection;
                                $query = "SELECT * FROM departments WHERE dept_id = $ofr_crs_dept_id";
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
                                $query = "SELECT * FROM intake WHERE intake_id = $crs_ofr_intake ";
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
                            <label for="crs_ofr_section">Seclect Section</label>
                            <select name="crs_ofr_section" id="">

                                <?php 

                                global $connection;
                                $query = "SELECT * FROM section WHERE section_intake_id = $crs_ofr_intake AND section_dept_id = $ofr_crs_dept_id";
                                $result = mysqli_query($connection,$query);
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $section_id = $row['section_id'];
                                    $section_no = $row['section_no'];
                                    echo "<option value='$section_id'>$section_no</option>";

                                } 

                                 ?>

                            </select>
                        </div>
                        

                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="crs_asign_two" value="Next">
                        </div>
                        
                    </form>




                     <?php  }elseif(isset($_POST['crs_asign_two'])){

                       global $connection;

                         $ofr_crs_dept_id = mysqli_real_escape_string($connection,$_POST['ofr_crs_dept_id']);
                         $crs_ofr_intake = mysqli_real_escape_string($connection,$_POST['crs_ofr_intake']);
                         $crs_ofr_section = mysqli_real_escape_string($connection,$_POST['crs_ofr_section']);
                         ?>

                         <form action="courses-assign_courses_next_page_one.php" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="ofr_crs_dept_id">Department</label>
                            <select name="ofr_crs_dept_id" id="">
                                 <?php 
                                global $connection;
                                $query = "SELECT * FROM departments WHERE dept_id = $ofr_crs_dept_id";
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
                                $query = "SELECT * FROM intake WHERE intake_id = $crs_ofr_intake ";
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
                            <label for="crs_ofr_section">Seclect Section</label>
                            <select name="crs_ofr_section" id="">

                                <?php 

                                global $connection;
                                $query = "SELECT * FROM section WHERE section_intake_id = $crs_ofr_intake AND section_dept_id = $ofr_crs_dept_id AND section_id = $crs_ofr_section";
                                $result = mysqli_query($connection,$query);
                                $row=mysqli_fetch_array($result);
                                    $section_id = $row['section_id'];
                                    $section_no = $row['section_no'];
                                    echo "<option value='$section_id'>$section_no</option>";

                                 

                                 ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="crs_asign_crs">Select Course</label>
                            <select name="crs_asign_crs" id="">

                                <?php 

                                global $connection;
                                $query = "SELECT * FROM intake WHERE intake_id = $crs_ofr_intake";
                                $select_intake = mysqli_query($connection,$query);

                                if ($select_intake) {
                                  $row = mysqli_fetch_array($select_intake);
                                  
                                  $intake_offered_course_id = $row['intake_offered_course_id'];
                                  $arr_ofrd = json_decode($intake_offered_course_id, true);

                                    if (empty($arr_ofrd)) {
                                        $chk = 1;
                                        $arr_ofrd=array();
                                    }else{
                                      $chk = 0;  
                                    }

                                    foreach ($arr_ofrd as $value) { 
                              // echo $result[$i];
                              // echo "<br>";

                              $course_query = "SELECT * FROM courses WHERE course_id=$value";
                              $course_query_rslt = mysqli_query($connection,$course_query);

                              if ($course_query_rslt) {
                                $row = mysqli_fetch_array($course_query_rslt);
                                    $course_id = $row['course_id'];
                                    $course_dept_id = $row['course_dept_id'];
                                    $course_code = $row['course_code'];
                                    $course_title = $row['course_title'];

                                    $course_assign_query = "SELECT * FROM course_assign WHERE ca_course_id=$course_id AND ca_dept_id=$ofr_crs_dept_id AND ca_intake_id = $crs_ofr_intake AND ca_section_id= $crs_ofr_section AND ca_semester='$current_sem' ";
                                    $course_assign_query_rslt = mysqli_query($connection,$course_assign_query);
                                    if ($course_assign_query_rslt) {

                                        if (mysqli_num_rows($course_assign_query_rslt)<1) {
                                            echo "<option value='$course_id'>$course_code  -  $course_title</option>";
                                        }
                                    }else{
                                       die("course_assign_query_rslt ".mysqli_error($connection)); 
                                    }

                              }
                          }
                      }else{
                        die("select_intake failed ".mysqli_error($connection));
                      }
                                

                                 ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="crs_asgn_teacher">Select Teacher</label>
                            <select name="crs_asgn_teacher" id="">

                                <?php 

                                global $connection;
                                $query = "SELECT * FROM teachers WHERE teach_dept_id = $ofr_crs_dept_id ";
                                $result = mysqli_query($connection,$query);
                                while ($row=mysqli_fetch_assoc($result)) {
                                    $teach_id = $row['teach_id'];
                                    $teach_short_code = $row['teach_short_code'];
                                    $teach_name = $row['teach_name'];
                                    echo "<option value='$teach_id'>$teach_name ($teach_short_code)</option>";

                                } 

                                 ?>

                            </select>
                        </div>

                         <div class="form-group">
                            <input type="submit" <?php if($chk){echo "disabled";} ?> class="btn btn-primary" name="crs_asign_three" value="Assign Now!">
                        </div>
                        <?php if($chk){echo "Course is not offered!! Please offer first.";}?>
                    </form>



                       <?php }else{ ?>

                     <form action="courses-assign_courses.php" method="post" enctype="multipart/form-data">
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