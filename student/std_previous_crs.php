<?php include "includes/std_header.php"; ?>

<?php 
global $connection;

$std_id=$_SESSION['std_id'];
$std_dept_id=$_SESSION['std_dept_id'];
$std_intake_id=$_SESSION['std_intake_id'];
$std_section_id=$_SESSION['std_section_id'];
$std_edu_year=$_SESSION['std_edu_year'];

$std_starting_sem_name=$_SESSION['std_sem'];
$starting_year = str_split("$std_edu_year",2);


$select_query = "SELECT * FROM current_semester";
$select_query_rslt = mysqli_query($connection,$select_query);
$row = mysqli_fetch_array($select_query_rslt);
$cr_sem = $row['semester_name']."-20".$row['semester_year'];


$select_last_sem ="SELECT cr_sem FROM course_registration WHERE cr_student_id = '$std_id' AND cr_dept_id=$std_dept_id AND cr_intake_id=$std_intake_id AND cr_section_id=$std_section_id AND cr_sem != '$cr_sem' ORDER BY course_reg_id DESC LIMIT 1";
$select_last_sem_rslt = mysqli_query($connection,$select_last_sem);
$row = mysqli_fetch_array($select_last_sem_rslt);
$ls_sem = $row['cr_sem'];


$starting_semester = $std_starting_sem_name."-20".$starting_year[0];


$sem1 = "Spring";
$sem2 = "Fall";
$sem3 = "Summer";

$a = array($starting_semester);


$i = 0;
while(1){
    $crnt = $a[$i];
    $arr = explode("-",$crnt);
    $sem_name = $arr[0]; 
    $sem_yr = $arr[1]; 

  if ($sem1==$sem_name) {
        if ($a[$i] != $ls_sem) {
            $next_sem =  $sem2;
            $full_next_sem=$next_sem."-".$sem_yr;
            array_push($a, $full_next_sem);
        }
      
    }elseif ($sem2==$sem_name) {
        if ($a[$i] != $ls_sem) {
            $next_sem =  $sem3;
            $full_next_sem=$next_sem."-".$sem_yr;
            array_push($a, $full_next_sem); 
        }
     

    }else{

        if ($a[$i] != $ls_sem) {
          $next_sem = $sem1;
          $sem_yr=$sem_yr+1;
          $full_next_sem=$next_sem."-".$sem_yr;
           array_push($a, $full_next_sem); 
        }
        
    }

    if ($a[$i]==$ls_sem) {
        break;
    }
    
    $i++;
 
    if ($a[$i]==$ls_sem) {
        break;
    }
   
}

// for ($j=0; $j <count($a); $j++) { 
//     echo $a[$j];
//     echo "<br>";
// }



$total_credits_cgpa=0;
$grade_into_credit_total_cgpa=0;

 ?>


    <div class="section-padding anex-bg">
        <div class="header-area">
            <div class="logo-area text-center">
                <a href=""><img src="assets/img/osis_logo.png" alt=""></a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="info-area-wrapper">
                        <div class="info-area-innner">
                            <div class="namebar text-center">
                                <div class="anex-btns">
                                    <a href="std_logout.php" class="anex-btn log-out-btn">log out</a>
                                    <a href="std_chang_password.php" class="anex-btn settings-btn">settings</a>
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
                                    <li><a href="std_eca_info.php">Accademic Info</a></li>
                                    <li><a href="std_rtn.php">Routine</a></li>
                                     <li><a href="#">Application</a></li>
                                    <li><a href="#">Due Documents</a></li>
                                    <li><a href="std_crs_reg.php">Course Reg</a></li>
                                </ul>
                            </div>

                            <div class="container">
                                 <div class="row">
                                     <div class="col-md-12">

                                        <?php 

                                        foreach($a as $values){ ?>

                                             <table class="table table-bordered table-hover">

                                        <div class="sgpa text-center" style="padding: 7px;background-color: blue;color: #ffff;font-weight: bold;">
                                            <?php echo $values;?> 
                                        </div>
             
                                            <thead>
                                                <tr>
                                                    <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Course Credit</th>
                                                    <th>Out Of 30</th>
                                                    <th>Mid</th>
                                                    <th>Final</th>
                                                    <th>Total</th>
                                                    <th>Grade L</th>
                                                    <th>Grade P</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                             <tbody>



                                           <?php $total_credits_sgpa=0;
                                            $grade_into_credit_total_sgpa=0;
                                        
                                        $selest_crs_rslt_query = "SELECT * FROM student_result WHERE std_id='$std_id' AND std_dept_id=$std_dept_id AND std_intake_id=$std_intake_id AND std_section_id=$std_section_id AND std_courese_sem='$values' ";

                                        $selest_crs_rslt_query_rslt = mysqli_query($connection,$selest_crs_rslt_query);

                                            if ($selest_crs_rslt_query_rslt) {
                                               while($rows = mysqli_fetch_assoc($selest_crs_rslt_query_rslt)){

                                            $std_course_id =$rows['std_course_id'];
                                            $std_course_tchr_id =$rows['std_course_tchr_id'];
                                            $std_result_thirty =$rows['std_result_thirty'];
                                            $std_result_mid =$rows['std_result_mid'];
                                            $std_result_final =$rows['std_result_final'];
                                            $std_result_total =$rows['std_result_total'];
                                            $std_result_grade_latter =$rows['std_result_grade_latter'];
                                            $std_result_grade_point =$rows['std_result_grade_point'];
                                            $std_result_status =$rows['std_result_status'];


                $course_query = "SELECT * FROM courses WHERE course_id=$std_course_id";
                $course_query_rslt = mysqli_query($connection,$course_query);
 
                    if ($course_query_rslt) {
                    $row = mysqli_fetch_array($course_query_rslt);
                        $course_code = $row['course_code'];
                        $course_title = $row['course_title'];
                        $course_credits = $row['course_credits'];

                    if ($std_result_status=="Passed") {

                        $grade_into_credit_sgpa = $course_credits*$std_result_grade_point;
                        $grade_into_credit_total_sgpa += $grade_into_credit_sgpa;
                        $total_credits_sgpa +=$course_credits; 


                        $grade_into_credit_cgpa = $course_credits*$std_result_grade_point;
                        $grade_into_credit_total_cgpa += $grade_into_credit_cgpa;
                        $total_credits_cgpa +=$course_credits;
 
                    }
                     }else{
                       die("course_query_rslt failed ".mysqli_error($connection)); 
                    } ?>


                    <?php 

                                             echo "<tr>";
                                  
                                          echo "<td>$course_code</td>";
                                          echo "<td>$course_title</td>";
                                          echo "<td>$course_credits</td>";
                                          echo "<td>$std_result_thirty</td>";
                                          echo "<td>$std_result_mid</td>";
                                          echo "<td>$std_result_final</td>";
                                          echo "<td>$std_result_total</td>";
                                          echo "<td>$std_result_grade_latter</td>";
                                          echo "<td>$std_result_grade_point</td>";
                                          echo "<td>$std_result_status</td>";
                                          
                                          echo "</tr>"; 


                                          ?>


                                            <?php   } 

                                                 }else{
                                              die("selest_crs_rslt_query_rslt failed ".mysqli_error($connection));  
                                            } ?>


                                             </tbody>
            </table> 
            <div class="sgpa text-center" style="padding: 7px;background-color: green;color: #ffff;font-weight: bold;">

                <?php
                if ($total_credits_sgpa==0 OR $total_credits_cgpa==0) {
                    echo "SGPA: "."    ||   ". " CGPA: "; 
                }else{
                  echo "SGPA: ". number_format($grade_into_credit_total_sgpa/$total_credits_sgpa,2)."    ||   ". " CGPA: ".number_format($grade_into_credit_total_cgpa/$total_credits_cgpa,2);  
                }

                ?>
                
            </div>
            <div class="br mb-4"></div>


                                       <?php  }



                                         ?>


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
   
