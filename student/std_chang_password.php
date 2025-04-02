<?php include "includes/std_header.php"; ?>

<?php 
global $connection;

if (isset($_GET['reg_course_id'])) {

    $reg_course_id = $_GET['reg_course_id'];
    $std_id = $_SESSION['std_id'];
    $std_dept_id=$_SESSION['std_dept_id'];
    $std_intake_id=$_SESSION['std_intake_id'];


    $select_query = "SELECT * FROM current_semester";
    $select_query_rslt = mysqli_query($connection,$select_query);
    $row = mysqli_fetch_array($select_query_rslt);

    $cr_sem = $row['semester_name']."-20".$row['semester_year'];


    $query = "INSERT INTO course_registration(cr_student_id,cr_course_id,cr_dept_id,cr_intake_id,cr_sem) VALUES('$std_id',$reg_course_id,$std_dept_id,$std_intake_id,'$cr_sem')";
    $insert_query_rslt = mysqli_query($connection,$query);
    if ($insert_query_rslt) {
        header("Location: std_crs_reg.php");
    }else{
         die("insert_query_rslt failed".mysqli_error($connection));
    }


}



 ?>

    <div class="section-padding anex-bg">
        <div class="header-area">
            <div class="logo-area text-center">
                <a href=""><img src="assets/img/osis_logo.png" alt=""></a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="info-area-wrapper">
                        <div class="info-area-innner">
                            <div class="namebar text-center">
                                <div class="anex-btns">
                                    <a href="" class="anex-btn log-out-btn">log out</a>
                                    <a href="" class="anex-btn settings-btn">settings</a>
                                </div>
                                <div class="student-name">
                                    <h3><?php echo $_SESSION['std_name']; ?></h3>
                                </div>
                                <div class="student-pic">
                                    <img width="100" height="100" src="../admin/assets/tchrimages/<?php echo $_SESSION['std_image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="stident-info-menu">
                                <ul class="menu-list">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="std_rtn.php">Routine</a></li>
                                    <li><a href="">Fess & waiver</a></li>
                                     <li><a href="">Application</a></li>
                                    <li><a href="">Due Documents</a></li>
                                    <li><a href="std_crs_reg.php">Course Reg</a></li>
                                </ul>
                            </div>

                            <div class="container">
                                 <div class="row">
                                     <div class="col-md-12">
                                        <h3 class="text-center">Regulare Course Registration</h3>

                                        <table class="table table-bordered table-hover">
             
                                            <thead>
                                                <tr>
                                                    <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Course Credit</th>
                                                    <th>Course Prerequisite</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                             <tbody>
                  <?php 
                    $std_id=$_SESSION['std_id'];
                    $std_dept_id=$_SESSION['std_dept_id'];
                    $std_intake_id=$_SESSION['std_intake_id'];
                      
                      $query = "SELECT * FROM intake WHERE intake_dept_id=$std_dept_id AND intake_id = $std_intake_id";
                      $select_intake = mysqli_query($connection,$query);
                      if ($select_intake) {
                          $row = mysqli_fetch_array($select_intake);
                          $intake_offered_course_id = $row['intake_offered_course_id'];
                         
                        $arr_ofrd = json_decode($intake_offered_course_id, true);

                        if (empty($arr_ofrd)) {
                            $arr_ofrd=array();
                        }
                       
                          foreach ($arr_ofrd as $value) { 
                              // echo $result[$i];
                              // echo "<br>";

                              
                              $course_query = "SELECT * FROM course_registration WHERE cr_course_id=$value AND cr_student_id='$std_id' ";
                              $course_query_rslt = mysqli_query($connection,$course_query);
                              if (mysqli_num_rows($course_query_rslt)<1) {

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
                                  
                                  echo "<td>$course_code</td>";
                                  echo "<td>$course_title</td>";
                                  echo "<td>$course_credits</td>";
                                  echo "<td>$course_prerequisites</td>";

    echo "<td><a href='std_crs_reg.php?reg_course_id={$course_id}'><button type='button' class='btn btn-warning'>Register</button></a></td>";
                                  
                                  echo "</tr>"; 
                                  
                              }else{
                                die("course_query_rslt failed ".mysqli_error($connection));
                              }

                                 
                              }else{
                                continue;
                              }

                              


                          }



                      }else{
                        die(" select_intake failed ".mysqli_error($connection));  
                      }


                   ?>
                  
                 
              </tbody>
            </table> 
                                     </div>
                                               
                                 </div>
                             </div> 


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/std_footer.php"; ?>
   
