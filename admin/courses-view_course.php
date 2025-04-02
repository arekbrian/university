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
            <table class="table table-bordered table-hover">
              <h2>View All courses</h2>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Dept</th>
                        <th>Type</th>
                        <th>Credits</th>
                        <th>Prereq</th>
                        <th>Cost</th>
                        <th>Book</th>    
                        <th>Edit</th> 
                        <th>Delete</th>
                       
                    </tr>
                </thead>
                 <tbody>
                  <?php 
                      include "includes/db.php";
                      global $connection;
                      $query = "SELECT * FROM courses ";
                      $select_courses = mysqli_query($connection,$query);
                      while ($row=mysqli_fetch_assoc($select_courses)) {
                        $course_id=$row['course_id'];
                        $course_code=$row['course_code'];
                        $course_title=$row['course_title'];
                        $course_dept_id=$row['course_dept_id'];
                        $course_dept_name=$row['course_dept_name'];
                        $course_batch_type=$row['course_batch_type'];
                        $course_credits=$row['course_credits'];
                        
                        $course_prerequisites=$row['course_prerequisites'];
                        $cost_per_credit=$row['cost_per_credit'];
                      
                        $course_total_cost=$row['course_total_cost'];
                       
                        $course_pdf=$row['course_pdf'];
                        if (empty($course_pdf)) {
                          $course_pdf="../../index.php";
                        }
                          // $user_create_date = $row['user_date'];
                          echo "<tr>";
                          echo "<td>$course_code</td>";
                          echo "<td>$course_title</td>";
                          echo "<td>$course_dept_name</td>";
                          echo "<td>$course_batch_type</td>";
                          echo "<td>$course_credits</td>";
                          echo "<td>$course_prerequisites</td>";
                          echo "<td>$course_total_cost</td>";
                          
                         echo "<td><a href='assets/pdfFile/$course_pdf'  target='_blank'>View Book</a></td>";

                         

                          echo "<td><a href='courses-edit_course.php?p_id={$course_id}&d_id={$course_dept_id}'><button type='button' class='btn btn-warning'>Edit</button></a></td>";

                          echo "<td><a href='courses-view_course.php?delete={$course_id}&d_id={$course_dept_id}&c_cost={$course_total_cost}&c_credit={$course_credits}'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
                          
                          echo "</tr>";       
                          
                      }

                   ?>
                   <?php 

                         if(isset($_GET['delete'])) {
                          $the_course_code = $_GET['delete'];
                          $course_dept_id = $_GET['d_id'];
                          $course_total_cost = $_GET['c_cost'];
                          $course_credits = $_GET['c_credit'];


                          $query = "SELECT * FROM departments WHERE dept_id = '{$course_dept_id}' " ;
                        $result = mysqli_query($connection,$query);
                        if ($result) {
                            
                            $row = mysqli_fetch_array($result);
                            $dept_total_cost =$row['dept_total_cost'];
                            $dept_total_credits = $row['dept_total_credits'];

                            $updated_dept_total_cost = $dept_total_cost-$course_total_cost;
                            $updated_dept_total_credits = $dept_total_credits-$course_credits;

                            $query = "UPDATE departments SET ";
                            
                              $query .= "dept_total_cost = {$updated_dept_total_cost}, ";
                              $query .= "dept_total_credits = {$updated_dept_total_credits} ";
                               $query .= "WHERE dept_id = {$course_dept_id}";
                               $update_dept_two_clm = mysqli_query($connection,$query);
                               if (!$update_dept_two_clm) {
                                   die("dept updated failed".mysqli_error($connection));
                               }
                        }else{
                           die(" update dept query failed ".mysqli_error($connection));  
                        }



                         $query = "DELETE FROM courses WHERE course_id = {$the_course_code} ";
                         $delete_query = mysqli_query($connection,$query);
                         if (!$delete_query) {
                           die("delete course query ".mysqli_error($connection));
                         }else{

                           header("Location: courses-view_course.php");
                         }
                         
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