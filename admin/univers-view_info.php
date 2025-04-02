 header Start -->
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
              <h2>View University info</h2>
                <thead>
                    <tr>
                        <!-- <th>Code</th> -->
                        <th>Name</th>
                       <!--  <th>logo</th> -->     
                        <th>location</th>   
                        <!-- <th>approval</th> -->   
                        <th>type</th>     
                       <!--  <th>category</th> --> 
                        <th>Mail</th>
                        <th>Contact</th>
                        <th>Action</th>
                       
                    </tr>
                </thead>
                 <tbody>
                  <?php 
                      include "includes/db.php";
                      global $connection;
                      $query = "SELECT * FROM university_info ";
                      $select_university_info = mysqli_query($connection,$query);
                      while ($row=mysqli_fetch_assoc($select_university_info)) {
                        $university_code=$row['university_code'];
                        $university_name=$row['university_name'];
                        $university_logo=$row['university_logo'];
                        $university_image=$row['university_image'];
                        $university_location=$row['university_location'];
                        $university_approval=$row['university_approval'];
                        $university_type=$row['university_type'];
                        $university_category=$row['university_category'];
                        $university_details=$row['university_details'];
                        $university_email=$row['university_email'];
                        $university_contact=$row['university_contact'];
                       
                      
                          echo "<tr>";
                          // echo "<td>$university_code</td>";
                          echo "<td>$university_name</td>";
                          // echo "<td>$university_logo</td>";
                          echo "<td>$university_location</td>";
                          // echo "<td>$university_approval</td>";
                          echo "<td>$university_type</td>";
                          // echo "<td>$university_category</td>";
                          echo "<td>$university_email</td>";
                          echo "<td>$university_contact</td>";
                         

                          // echo "<td><a href='depts-edit_dept.php?p_id={$dept_code}'><button type='button' class='btn btn-warning'>Edit</button></a></td>";

                          echo "<td><a href='univers-view_info.php?delete={$university_code}'><button type='button' class='btn btn-danger'>Delete</button></a><p></p><a href='univers-edit_info.php?p_id={$university_code}'><button type='button' class='btn btn-warning'>Edit</button></a></td>";
                          
                          echo "</tr>";       
                          
                      }

                   ?>
                   <?php 

                        global $connection;
                         if(isset($_GET['delete'])) {
                          $the_dept_code = $_GET['delete'];
                         $query = "DELETE FROM university_info WHERE university_code = '{$the_uni_code}' ";
                         $delete_uni_info_query = mysqli_query($connection,$query);
                         header("Location: univers-view_info.php");
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
<!-- Footer end