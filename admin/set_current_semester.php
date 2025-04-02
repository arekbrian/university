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
                    <h3 class="text-center">Add Current Semester</h3><hr>
        <?php 
            include "includes/db.php";
            global $connection;
            if (isset($_POST['set_current_sem'])) {

                $crnt_sem = mysqli_real_escape_string($connection,$_POST['crnt_sem']);
                $crnt_sem_year  = date('y');
               
               
                 if (empty($crnt_sem && $crnt_sem_year)) {
                 echo " Please Fill All Information";
             }else{

                $query= "SELECT * FROM current_semester";
                 $result = mysqli_query($connection,$query);
                 if ($result) {

                    $count = mysqli_num_rows($result);
                    if (mysqli_num_rows($result)<1) {

                        $query = "INSERT INTO current_semester(semester_name,semester_year) ";

                      $query .="VALUES('{$crnt_sem}',{$crnt_sem_year}) ";

                      $query_result = mysqli_query($connection,$query);
                       if (!$query_result) {
                          die("query failed". mysqli_error($connection));
                        }
                              header("Location: set_current_semester.php");



                        
                    }else{

                        $query = "UPDATE current_semester SET semester_name = '{$crnt_sem}',semester_year = {$crnt_sem_year} ";
                        $query_result = mysqli_query($connection,$query);
                       if (!$query_result) {
                          die("query failed". mysqli_error($connection));
                        }
                              header("Location: set_current_semester.php");

                    }
                     
                 }else{
                   die("query failed". mysqli_error($connection)); 
                 }
              
            
     
             }

            }

        ?>

                     <form action="set_current_semester.php" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <?php 

                            $query= "SELECT * FROM current_semester";
                             $result = mysqli_query($connection,$query);
                             if ($result) {

                                $count = mysqli_num_rows($result);
                                if ($count>0) {
                                    $rs = mysqli_fetch_array($result);
                                    echo "On Going: ". $rs['semester_name']. ", 20".$rs['semester_year']."<br>";
                                }
                            }

                             ?>
                            <label for="crnt_sem">Set Current Semester</label></br>
                            <select name="crnt_sem" id="">
                              <option value= 'Spring'>Spring</option>
                              <option value= 'Fall'>Fall</option>
                              <option value= 'Summer'>Summer</option>
                            </select>
                        </div>
                        
                          
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="set_current_sem" value="Set Current Semester">
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