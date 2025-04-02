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
              <h2>View All Teachers</h2>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>S.Code</th>
                        <th>Dept</th>
                        <th>Desig.</th>   
                        <th>Edit</th> 
                        <th>Delete</th>
                       
                    </tr>
                </thead>
                 <tbody>
                  <?php 
                      include "includes/db.php";
                      global $connection;
                      $query = "SELECT * FROM teachers ";
                      $select_departments = mysqli_query($connection,$query);
                      while ($row=mysqli_fetch_assoc($select_departments)) {
                        $teach_id=$row['teach_id'];
                        $teach_name=$row['teach_name'];
                        $teach_short_code=$row['teach_short_code'];
                        $teach_password=$row['teach_password'];
                        $teach_room_no=$row['teach_room_no'];
                        $teach_dept=$row['teach_dept'];
                        $teach_email=$row['teach_email'];
                        $teach_contact_no=$row['teach_contact_no'];
                        $teach_designation=$row['teach_designation'];
                        $teach_image=$row['teach_image'];
                        $teach_current_address=$row['teach_current_address'];
                        $teach_permanent_address=$row['teach_permanent_address'];
                        $teach_university=$row['teach_university'];
                        $teach_qualification=$row['teach_qualification'];
                       
                      
                          echo "<tr>";
                          echo "<td>$teach_id</td>";
                          echo "<td>$teach_name</td>";
                          echo "<td>$teach_short_code</td>";
                          echo "<td>$teach_dept</td>";
                          echo "<td>$teach_designation</td>";

                          echo "<td><a href='teachers-edit_teach.php?p_id={$teach_id}'><button type='button' class='btn btn-warning'>Edit</button></a></td>";

                          echo "<td><a href='teachers-view_teach.php?delete={$teach_id}'><button type='button' class='btn btn-danger'>Delete</button></a></td>";
                          
                          echo "</tr>";       
                          
                      }

                   ?>
                   <?php 

                        global $connection;
                         if(isset($_GET['delete'])) {
                          $the_teach_code = $_GET['delete'];
                         $query = "DELETE FROM teachers WHERE teach_id = '{$teach_id}' ";
                         $delete_teach_query = mysqli_query($connection,$query);
                         header("Location: teachers-view_teach.php");
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