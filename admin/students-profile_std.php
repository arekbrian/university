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
       if (isset($_GET['s_id'])) {
            $the_std_id = $_GET['s_id'];
            
        
           $query = "SELECT * FROM students_basic WHERE std_id = '$the_std_id' ";
         $select_std_by_id = mysqli_query($connection,$query);
         while($row=mysqli_fetch_assoc($select_std_by_id)) {
            $std_id=$row['std_id'];
            $std_edu_year=$row['std_edu_year'];
            $std_name=$row['std_name'];
            $std_dept_id=$row['std_dept_id'];
            $std_dept=$row['std_dept'];
            $std_sem=$row['std_sem'];
            $std_intake=$row['std_intake'];
            $std_section=$row['std_section_no'];
            $std_prog_type=$row['std_prog_type'];
            $std_shift=$row['std_shift'];
            $std_email=$row['std_email'];
            $std_contact_no=$row['std_contact_no'];
            $std_gender=$row['std_gender'];
            $std_blood_grp=$row['std_blood_grp'];
            $std_ability_type=$row['std_ability_type'];
            $std_image=$row['std_image'];
            $std_current_address=$row['std_current_address'];
            $std_permanent_address=$row['std_permanent_address'];
            $std_birth_id=$row['std_birth_id'];
            $std_password=$row['std_password'];
            $std_details=$row['std_details'];
            }
         
         
        }

   ?>
           
            <!-- end row -->

            <div class="row">  
                <div class="col-md-4 offset-md-4">
                   <div class="std_img">
                        <img  src="assets/tchrimages/<?php echo $std_image; ?>" alt="image">
                   </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-6">
                   <div class="std_part_one">
                        <table>
                              <tr>
                                <td>ID</td>
                                <td><?php echo $std_id; ?></td>
                              </tr>
                              <tr>
                                <td>Name</td>
                                <td><?php echo $std_name; ?></td>
                              </tr>
                              <tr>
                                <td>Department</td>
                                <td><?php echo $std_dept; ?></td>
                              </tr>
                              <tr>
                                <td>Semester</td>
                                <td><?php echo $std_sem; ?></td>
                              </tr>
                              <tr>
                                <td>Intake</td>
                                <td><?php echo $std_intake; ?></td>
                              </tr>
                              <tr>
                                <td>Section</td>
                                <td><?php echo $std_section; ?></td>
                              </tr>
                               <tr>
                                <td>Program Type</td>
                                <td><?php echo $std_prog_type; ?></td>
                              </tr>
                             
                              <tr>
                                <td>Shift</td>
                                <td><?php echo $std_shift; ?></td>
                              </tr>
                               <tr>
                                <td>Email</td>
                                <td><?php echo $std_email; ?></td>
                              </tr>
                        </table>
                   </div>
                </div>
                 <div class="col-md-6">
                   <div class="std_part_one">
                        <table>
                              <tr>
                                <td>Contact No</td>
                                <td><?php echo $std_contact_no; ?></td>
                              </tr>
                              <tr>
                                <td>Gender</td>
                                <td><?php echo $std_gender; ?></td>
                              </tr>
                              <tr>
                                <td>Blood Group</td>
                                <td><?php echo $std_blood_grp; ?></td>
                              </tr>
                              <tr>
                                <td>Ability Type</td>
                                <td><?php echo $std_ability_type; ?></td>
                              </tr>
                              <tr>
                                <td>Current Addr</td>
                                <td><?php echo $std_current_address; ?></td>
                              </tr>
                              <tr>
                                <td>Permanent Addr</td>
                                <td><?php echo $std_permanent_address; ?></td>
                              </tr>
                               <tr>
                                <td>Birth Id</td>
                                <td><?php echo $std_birth_id; ?></td>
                              </tr>
                              <tr>
                                <td>Details</td>
                                <td><?php echo $std_details; ?></td>
                              </tr>   
                        </table></br>
                        <?php echo "<td><a href='students-edit_std.php?p_id={$std_id}'><button type='button' class='btn btn-warning btn-block'>Edit</button></a></td>"; ?></br>
                              
                              
                         <?php echo "<td><a href='students-view_std.php?delete={$std_id}'><button type='button' class='btn btn-danger btn-block'>Delete</button></a></td>"; ?>
                   </div>
                </div>
            </div>
                
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