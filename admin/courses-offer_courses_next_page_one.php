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

            if (isset($_GET['crs_id'])) {

                $GLOBALS['ofr_crs_dept_id'] = mysqli_real_escape_string($connection,$_GET['ofr_crs_dept_id']);
             $GLOBALS['crs_ofr_intake'] = mysqli_real_escape_string($connection,$_GET['crs_ofr_intake']);
             $crs_id = mysqli_real_escape_string($connection,$_GET['crs_id']);
             $crs_id_arr = array($crs_id);

             $query = "SELECT * FROM intake WHERE intake_dept_id=$ofr_crs_dept_id AND intake_id = $crs_ofr_intake ";

            $select_intake = mysqli_query($connection,$query);

            if ($select_intake) {
                  $row = mysqli_fetch_array($select_intake);
                  $intake_id = $row['intake_id'];
                  $intake_dept_id = $row['intake_dept_id'];
                  $intake_offered_course_id = $row['intake_offered_course_id'];
                 

                $arr_ofrd = json_decode($intake_offered_course_id, true);

                 if (empty($arr_ofrd)) {
                            $arr_ofrd=array();
                        }
                    $arr_ofrd = array_merge($arr_ofrd,$crs_id_arr);

                    $arr_ofrd = json_encode($arr_ofrd);

                    $update_query = "UPDATE intake SET intake_offered_course_id='$arr_ofrd' WHERE intake_id = $crs_ofr_intake ";
                    $update_query_result = mysqli_query($connection,$update_query);
                    if (!$update_query_result) {
                        die("update_query_result failed ".mysqli_error($connection));
                    }else{
                        echo "<script>alert('Course Offered done!!');</script>";
                    }

                    }else{
                       die("select_intake failed ".mysqli_error($connection)); 
                    }
 
            }



            if (isset($_GET['crs_ofr_next_page_one'])) { 

             $GLOBALS['ofr_crs_dept_id'] = mysqli_real_escape_string($connection,$_GET['ofr_crs_dept_id']);
             $GLOBALS['crs_ofr_intake'] = mysqli_real_escape_string($connection,$_GET['crs_ofr_intake']);
         }
             

                $query = "SELECT * FROM departments WHERE dept_id = $ofr_crs_dept_id";
                $result = mysqli_query($connection,$query);
                while ($row=mysqli_fetch_assoc($result)) {
                    $dept_id = $row['dept_id'];
                    $dept_name = $row['dept_name'];
                    $dept_batch_type = $row['dept_batch_type'];
                    $dept_prog_type = $row['dept_prog_type'];
                    

                }

            ?>

            <?php 
            if (isset($_GET['clealr_dept_id'])) { 

             $clealr_dept_id = mysqli_real_escape_string($connection,$_GET['clealr_dept_id']);
             $crs_ofr_intake = mysqli_real_escape_string($connection,$_GET['clealr_intake']);


             $query = "SELECT * FROM intake WHERE intake_dept_id=$clealr_dept_id AND intake_id = $crs_ofr_intake ";
                      $select_intake = mysqli_query($connection,$query);
                      if ($select_intake) {
                          $row = mysqli_fetch_array($select_intake);

                          $intake_previous_offered_course_id = $row['intake_previous_offered_course_id'];
                          $intake_offered_course_id = $row['intake_offered_course_id'];
                         

                        
                        
                        $arr_prev_ofrd = json_decode($intake_previous_offered_course_id, true);
                        $arr_ofrd = json_decode($intake_offered_course_id, true);

                        if (empty($arr_ofrd)) {
                            $arr_ofrd=array();
                        }
                        
                         if (empty($arr_prev_ofrd)) {
                            $arr_prev_ofrd = array();
                        }

                          
                    $arr_prev_ofrd = array_merge($arr_prev_ofrd,$arr_ofrd);

                    $arr_prev_ofrd = json_encode($arr_prev_ofrd);

                    $update_query = "UPDATE intake SET intake_offered_course_id=NULL,intake_previous_offered_course_id='$arr_prev_ofrd' WHERE intake_id = $crs_ofr_intake ";
                    $update_query_result = mysqli_query($connection,$update_query);
                    if (!$update_query_result) {
                        die("update_query_result failed ".mysqli_error($connection));
                    }else{
                        header("Location: courses-offer_courses.php");
                    }


                      }


         }

            ?>

            <?php 

            echo "<a href='courses-offer_courses_next_page_one.php?clealr_dept_id={$ofr_crs_dept_id}&clealr_intake={$crs_ofr_intake}'><button type='button' class='btn btn-warning'>Clear Present Course</button></a>";

             ?>



            <table class="table table-bordered table-hover">
              <h2><?php echo "Department: ".$dept_name." || "."Batch: ".$dept_batch_type. " || "."Program: ".$dept_prog_type;  ?></h2>
                <thead>
                    <tr>
                        <th>Course id</th>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Course Credit</th>
                        <th>Course Cost</th>
                        <th>Course Prerequisite</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody>
                  <?php 
                      
                      $query = "SELECT * FROM intake WHERE intake_dept_id=$ofr_crs_dept_id AND intake_id = $crs_ofr_intake ";
                      $select_intake = mysqli_query($connection,$query);
                      if ($select_intake) {
                          $row = mysqli_fetch_array($select_intake);
                          $intake_id = $row['intake_id'];
                          $intake_dept_id = $row['intake_dept_id'];
                          $intake_all_course_id = $row['intake_all_course_id'];
                          $intake_previous_offered_course_id = $row['intake_previous_offered_course_id'];
                          $intake_offered_course_id = $row['intake_offered_course_id'];
                         

                        
                        $arr_all = json_decode($intake_all_course_id, true);
                        $arr_prev_ofrd = json_decode($intake_previous_offered_course_id, true);
                        $arr_ofrd = json_decode($intake_offered_course_id, true);

                        if (empty($arr_ofrd)) {
                            $arr_ofrd=array();
                        }
                        if (empty($arr_all)) {
                            $arr_all = array();
                        }
                         if (empty($arr_prev_ofrd)) {
                            $arr_prev_ofrd = array();
                        }

                          
                          $result=array_diff($arr_all,$arr_ofrd,$arr_prev_ofrd);

                          // var_dump($result);

                          foreach ($result as $value) { 
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
                                    $course_credits = $row['course_credits'];
                                    $course_total_cost = $row['course_total_cost'];
                                    $course_prerequisites = $row['course_prerequisites'];
                                  


                                  echo "<tr>";
                                  echo "<td>$course_id</td>";
                                  echo "<td>$course_code</td>";
                                  echo "<td>$course_title</td>";
                                  echo "<td>$course_credits</td>";
                                  echo "<td>$course_total_cost</td>";
                                  echo "<td>$course_prerequisites</td>";

    echo "<td><a href='courses-offer_courses_next_page_one.php?ofr_crs_dept_id={$course_dept_id}&crs_ofr_intake={$crs_ofr_intake}&crs_id={$course_id}'><button type='button' class='btn btn-warning'>Offer</button></a></td>";
                                  
                                  echo "</tr>"; 
                                  
                              }else{
                                die("course_query_rslt failed ".mysqli_error($connection));
                              }


                          }



                      }else{
                        die(" select_intake failed ".mysqli_error($connection));  
                      }


                   ?>
                  
                 
              </tbody>
            </table> 
           
            <!-- end row -->

            
                <!-- end col -->

        </div>
            <!--- end row -->

    </div> <!-- container -->

</div> <!-- content -->

<!-- Footer start-->
<?php include "includes/admin_footer.php"; ?>
<!-- Footer end-->