<?php include "includes/std_header.php"; ?>

<?php 
global $connection;

$std_id=$_SESSION['std_id'];
$std_dept_id=$_SESSION['std_dept_id'];
$std_intake_id=$_SESSION['std_intake_id'];
$std_section_id=$_SESSION['std_section_id'];

$select_query = "SELECT * FROM current_semester";
$select_query_rslt = mysqli_query($connection,$select_query);
$row = mysqli_fetch_array($select_query_rslt);
$cr_sem = $row['semester_name']."-20".$row['semester_year'];


$total_credits_sgpa=0;
$grade_into_credit_total_sgpa=0;

$total_credits_cgpa=0;
$grade_into_credit_total_cgpa=0;


$total_credits_sgpa_psbl=0;
$grade_into_credit_total_sgpa_psbl=0;
$crs_id_arr = array();
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
                                        <div class="sgpa text-center" style="padding: 7px;background-color: blue;color: #ffff;font-weight: bold;"><?php echo "Present Coures, "." ".$cr_sem;?>
                                            
                                        </div>
                                        <table class="table table-bordered table-hover">
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
                                            <?php 

                                              $reg_query = "SELECT * FROM course_registration WHERE cr_student_id='$std_id' AND cr_dept_id = $std_dept_id AND cr_intake_id=$std_intake_id AND cr_sem='$cr_sem' ";
                                              
                                              $reg_query_rslt = mysqli_query($connection,$reg_query);

                                              if ($reg_query_rslt) {

                                                // $crs_id_arr = array();
                                                
                                                while($rows = mysqli_fetch_assoc($reg_query_rslt)){

                                                    $cr_course_id=$rows['cr_course_id'];

                        $find_id_std_rslt_query = "SELECT std_course_id FROM student_result WHERE std_course_id = $cr_course_id AND std_courese_sem != '$cr_sem' ";
                        $find_id_std_rslt_query_rs = mysqli_query($connection,$find_id_std_rslt_query);
                        if ($find_id_std_rslt_query_rs) {
                            if (mysqli_num_rows($find_id_std_rslt_query_rs)>0) {
                               array_push($crs_id_arr,$cr_course_id); 
                            }
                        }



                                                    

                                                      $course_query = "SELECT * FROM courses WHERE course_id=$cr_course_id";
                                                      $course_query_rslt = mysqli_query($connection,$course_query);
                                                      

                                                      if ($course_query_rslt) {
                                                        $row = mysqli_fetch_array($course_query_rslt);
                                                            $course_id = $row['course_id'];
                                                            $course_dept_id = $row['course_dept_id'];
                                                            $course_code = $row['course_code'];
                                                            $course_title = $row['course_title'];
                                                            $course_credits = $row['course_credits'];
                                                         

                                                            $std_result_query = "SELECT * FROM student_result WHERE std_id='$std_id'AND std_dept_id= $std_dept_id AND std_intake_id=$std_intake_id AND std_course_id=$cr_course_id AND std_courese_sem= '$cr_sem' ";

                                                            $std_result_query_rslt = mysqli_query($connection,$std_result_query);

                                                            if ($std_result_query_rslt) {


                                                                $result_row = mysqli_fetch_array($std_result_query_rslt);

                                                                $std_result_thirty=$result_row['std_result_thirty'];
                                                                $std_result_mid=$result_row['std_result_mid'];
                                                                $std_result_final=$result_row['std_result_final'];
                                                                $std_result_total=$result_row['std_result_total'];
                                                                $std_result_grade_latter=$result_row['std_result_grade_latter'];
                                                                $std_result_grade_point=$result_row['std_result_grade_point'];
                                                                $std_result_status=$result_row['std_result_status'];

                                                                

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
                                                                
                                                            }else{
                                                                die("std_result_query_rslt failed ".mysqli_error($connection)); 
                                                            }

                                                      }else{
                                                        die("course_query_rslt failed ".mysqli_error($connection));
                                                      }

                                                }
                                                 
                                              }else{
                                                 die("reg_query_rslt failed ".mysqli_error($connection));
                                              }
                                              

                                            ?>


                  
                         
                                                </tbody>
                                            </table> 
                                            <div class="sgpa text-center" style="padding: 7px;background-color: green;color: #ffff;font-weight: bold;">

                                            <?php  


                                            // SGPA COUNTING START

                                            $select_for_sgpa_query = "SELECT * FROM course_registration WHERE cr_student_id='$std_id' AND cr_dept_id=$std_dept_id AND cr_intake_id=$std_intake_id AND cr_sem='$cr_sem' ";
                                            $select_for_sgpa_query_result = mysqli_query($connection,$select_for_sgpa_query);

                                            if ($select_for_sgpa_query_result) {
                                                if (mysqli_num_rows($select_for_sgpa_query_result)>0) {
                                                    while($rows=mysqli_fetch_assoc($select_for_sgpa_query_result)){

                                                        $cr_course_id=$rows['cr_course_id'];

                                                        $select_result_query = "SELECT * FROM student_result WHERE std_id='$std_id' AND std_dept_id=$std_dept_id AND std_intake_id=$std_intake_id AND std_courese_sem='$cr_sem' AND std_result_status='Passed' AND std_course_id= $cr_course_id ";

                                                        $select_result_query_result = mysqli_query($connection,$select_result_query);
                                                        if ($select_result_query_result) {
                                                            if (mysqli_num_rows($select_result_query_result)>0) {
                                                                
                                                                $course_row = mysqli_fetch_array($select_result_query_result);

                                                               $std_result_grade_point=$course_row['std_result_grade_point'];
                                                              

                                                                

                                                                $select_courses_query = "SELECT * FROM courses WHERE course_id=$cr_course_id";

                                                                $select_courses_query_result = mysqli_query($connection,$select_courses_query);
                                                                if ($select_courses_query_result) {
                                                                    if (mysqli_num_rows($select_courses_query_result)==1) {
                                                                        
                                                                        $course_row = mysqli_fetch_array($select_courses_query_result);

                                                                        
                                                                        $course_credits=$course_row['course_credits'];


                                                                        $grade_into_credit_sgpa = $course_credits*$std_result_grade_point;
                                                                        $grade_into_credit_total_sgpa += $grade_into_credit_sgpa;
                                                                        $total_credits_sgpa +=$course_credits;
                                        
                                                                       

                                                                    }else{
                                                                        echo "course does not exist.";
                                                                    }
                                                                    
                                                                }else{
                                                                    die("select_courses_query_result failed ".mysqli_error($connection)); 
                                                                }
                                                                                                   

                                                            }
                                                            
                                                        }else{
                                                            die("select_result_query_result failed ".mysqli_error($connection)); 
                                                        }

                                                    }
                                                }
                                            }else{
                                              die("select_for_sgpa_query_result failed ".mysqli_error($connection));  
                                            }

                                            // SGPA COUNTING END

                                            // CGPA COUNTING START


                                             $select_for_sgpa_query = "SELECT * FROM course_registration WHERE cr_student_id='$std_id' AND cr_dept_id=$std_dept_id AND cr_intake_id=$std_intake_id";
                                            $select_for_sgpa_query_result = mysqli_query($connection,$select_for_sgpa_query);

                                            if ($select_for_sgpa_query_result) {
                                                if (mysqli_num_rows($select_for_sgpa_query_result)>0) {
                                                    while($rows=mysqli_fetch_assoc($select_for_sgpa_query_result)){

                                                        $cr_course_id=$rows['cr_course_id'];

                                                        $select_result_query = "SELECT * FROM student_result WHERE std_id='$std_id' AND std_dept_id=$std_dept_id AND std_intake_id=$std_intake_id AND std_result_status='Passed' AND std_course_id= $cr_course_id ";

                                                        $select_result_query_result = mysqli_query($connection,$select_result_query);
                                                        if ($select_result_query_result) {
                                                            if (mysqli_num_rows($select_result_query_result)>0) {
                                                                
                                                                $course_row = mysqli_fetch_array($select_result_query_result);

                                                               $std_result_grade_point_cgpa=$course_row['std_result_grade_point'];
                                                              

                                                                

                                                                $select_courses_query = "SELECT * FROM courses WHERE course_id=$cr_course_id";

                                                                $select_courses_query_result = mysqli_query($connection,$select_courses_query);
                                                                if ($select_courses_query_result) {
                                                                    if (mysqli_num_rows($select_courses_query_result)==1) {
                                                                        
                                                                        $course_row = mysqli_fetch_array($select_courses_query_result);

                                                                        
                                                                        $course_credits=$course_row['course_credits'];

                                                                       $grade_into_credit_cgpa = $course_credits*$std_result_grade_point_cgpa;
                                                                       $grade_into_credit_total_cgpa += $grade_into_credit_cgpa;
                                                                       $total_credits_cgpa +=$course_credits;
                                        
                                                                       

                                                                    }else{
                                                                        echo "course does not exist.";
                                                                    }
                                                                    
                                                                }else{
                                                                    die("select_courses_query_result failed ".mysqli_error($connection)); 
                                                                }
                                                                                                   

                                                            }
                                                            
                                                        }else{
                                                            die("select_result_query_result failed ".mysqli_error($connection)); 
                                                        }

                                                    }
                                                }
                                            }else{
                                              die("select_for_sgpa_query_result failed ".mysqli_error($connection));  
                                            }

                                            // CGPA COUNTING END

                                            if ($total_credits_sgpa==0 OR $total_credits_cgpa==0) {
                                                echo "SGPA: "."    ||   ". " CGPA: "; 
                                            }else{
                                              echo "SGPA: ". number_format($grade_into_credit_total_sgpa/$total_credits_sgpa,2)."    ||   ". " CGPA: ".number_format($grade_into_credit_total_cgpa/$total_credits_cgpa,2);  
                                            }

                                            ?>
                                            
                                            </div>
                                    </div>            
                                </div>
                                <?php 
                                if (!empty($crs_id_arr)) {
                                    
                                

                                 ?>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="sgpa text-center" style="padding: 7px;background-color: blue;color: #ffff;font-weight: bold;">Marks Prediction based on Previous student result for these courses
                                            
                                        </div>

                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Out Of 30</th>
                                                    <th>Mid (30)</th>
                                                    <th>Final(40)</th>
                                                    <th>Total(100)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            <?php

                                            $crs_details_arr=  course_details($crs_id_arr);
                                            $out_of_thirty= out_of_thirty($crs_id_arr);
                                            $std_result_mid= std_result_mid($crs_id_arr);
                                            $std_result_final= std_result_final($crs_id_arr);
                                           
                                            $k=0;
                                            for ($i=0; $i <count($crs_details_arr) ; $i=$i+2) { 
                                                echo "<tr>";
                                                if ($i%2==0) {
                                                  echo "<td>$crs_details_arr[$i]</td>";  
                                                }
                                                $j=$i+1;
                                                echo "<td>$crs_details_arr[$j]</td>";


                                                $out_of_thirty_prsnt = round(($out_of_thirty[$k]/30)*100);
                                                echo "<td>$out_of_thirty[$k]  ($out_of_thirty_prsnt%)</td>";

                                                $std_result_mid_prsnt = round(($std_result_mid[$k]/30)*100);

                                                echo "<td>$std_result_mid[$k]  ($std_result_mid_prsnt%)</td>";

                                                $std_result_final_prsnt = round(($std_result_final[$k]/40)*100);

                                                echo "<td>$std_result_final[$k]  ($std_result_final_prsnt%)</td>";

                                                $std_result_total=$out_of_thirty[$k]+$std_result_mid[$k]+$std_result_final[$k];

                                                $std_result_total_prsnt = round(($std_result_total/100)*100);

                                                echo "<td>$std_result_total  ($std_result_total_prsnt%)</td>";
                                                
                                                $k++;
                                                echo "</tr>"; 
                                               

                                            }

                                            ?> 
                                                
                                            </tbody>
                                        </table> 
                                        <div class="sgpa text-center">
                                        </div>
                                     </div>
                                               
                                </div>


                                <?php 
                                $first_query = "SELECT std_courese_sem FROM student_result WHERE std_id ='$std_id' ORDER BY std_result_id ASC LIMIT 1 ";

                                $first_query_result = mysqli_query($connection,$first_query);
                                if ($first_query_result && mysqli_num_rows($first_query_result)==1) {

                                    $row = mysqli_fetch_array($first_query_result);
                                    $std_courese_sem=$row['std_courese_sem'];
                                    if ($cr_sem != $std_courese_sem) {

                                    $select_last_sem ="SELECT cr_sem FROM course_registration WHERE cr_student_id = '$std_id' AND cr_dept_id=$std_dept_id AND cr_intake_id=$std_intake_id AND cr_section_id=$std_section_id AND cr_sem != '$cr_sem' ORDER BY course_reg_id DESC LIMIT 1";
                                        $select_last_sem_rslt = mysqli_query($connection,$select_last_sem);
                                        $row = mysqli_fetch_array($select_last_sem_rslt);
                                        $ls_sem = $row['cr_sem'];
                                        $ls_sem_nm = explode("-", $ls_sem );

                                        $sem1 = "Spring";
                                        $sem2 = "Fall";
                                        $sem3 = "Summer";

                                        if ($ls_sem_nm[0]==$sem1) {
                                            $prev_yr = $ls_sem_nm[1]-1;
                                            $pre_ls_sem = $sem3."-".$prev_yr;
                                        }
                                        if ($ls_sem_nm[0]==$sem2) {
                                            
                                           $pre_ls_sem = $sem1."-".$ls_sem_nm[1];
                                        }

                                        if ($ls_sem_nm[0]==$sem3) {
                                            
                                           $pre_ls_sem = $sem2."-".$ls_sem_nm[1];
                                        }



                                    $thirty_mid_final_array = result_prediction($pre_ls_sem,$ls_sem,$crs_id_arr);

                                       //echo count($thirty_mid_final_array);
                                    // print_r($thirty_mid_final_array);                                        
                                    
                                    $thirty_marks=array();
                                    $mid_marks=array();
                                    $final_marks=array();

                                    for($i=0;$i<3;$i++){
                                         $crs = $thirty_mid_final_array[$i];

                                        foreach($crs as $marks){

                                           if ($i==0) {
                                             array_push($thirty_marks,$marks);
                                           }
                                           if ($i==1) {
                                             array_push($mid_marks,$marks);  
                                           }
                                           if ($i==2) {
                                               array_push($final_marks,$marks); 
                                           }
                                             

                                        }
                                        
                                    }

                                    ?>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="sgpa text-center" style="padding: 7px;background-color: blue;color: #ffff;font-weight: bold;">Marks Prediction based on Previous semester Performance
                                            </div>

                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Course Code</th>
                                                        <th>Course Title</th>
                                                        <th>Course Credit</th>
                                                        <th>Out Of 30</th>
                                                        <th>Mid (30)</th>
                                                        <th>Final(40)</th>
                                                        <!-- <th>Total(100)</th> -->
                                                        <th>Grade L</th>
                                                        <th>Grade P</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                <?php
                                                $all_total = array();
                                                $psbl_sgpa=0;
                                                
                                                for ($i=0; $i <count($crs_id_arr) ; $i++) { 

                                                    $crs_id=$crs_id_arr[$i];
                                                    $course_details=single_course_details($crs_id);
                                                   $course_code_name = explode("+", $course_details);

                                                   $course_credits = $course_code_name[2];
                                                    
                                                    echo "<tr>";
                                                    
                                                      echo "<td>$course_code_name[0]</td>";  
                                                    
                                                   
                                                    echo "<td>$course_code_name[1]</td>";

                                                    echo "<td>$course_credits</td>";


                                                    $out_of_thirty_prsnt = round(((double)$thirty_marks[$i]/30)*100);
                                                    echo "<td>$thirty_marks[$i]  ($out_of_thirty_prsnt%)</td>";

                                                    $std_result_mid_prsnt = round(($mid_marks[$i]/30)*100);

                                                    echo "<td>$mid_marks[$i]  ($std_result_mid_prsnt%)</td>";

                                                    $std_result_final_prsnt = round(($final_marks[$i]/40)*100);

                                                    echo "<td>$final_marks[$i]  ($std_result_final_prsnt%)</td>";

                                                    $std_result_total=$thirty_marks[$i]+$mid_marks[$i]+$final_marks[$i];
                                                    array_push($all_total,$std_result_total);


                                                    $std_result_total_prsnt = round(($std_result_total/100)*100);

                                                    // echo "<td>$std_result_total  ($std_result_total_prsnt%)</td>";
                                                    $grade_point_ltr =  grade_point_letter($std_result_total);
                                                    $point_ltr = explode("+", $grade_point_ltr);
                                                     echo "<td>$point_ltr[1]</td>";
                                                     echo "<td>$point_ltr[0]</td>";
                                                    
                                                    
                                                    echo "</tr>";

                                                  

                                                $grade_into_credit_sgpa_psbl = $course_credits*$point_ltr[0];
                                                $grade_into_credit_total_sgpa_psbl += $grade_into_credit_sgpa_psbl;
                                                $total_credits_sgpa_psbl +=$course_credits;
                                                   

                                                }




                                                ?> 
                                                    
                                                </tbody>
                                            </table> 
                                            <div class="sgpa text-center mb-4" style="padding: 7px;background-color: green;color: #ffff;font-weight: bold;">
                                                <?php 
                                               if ($total_credits_sgpa_psbl !=0) {
                                                    echo "Possible SGPA Based On Previous Semester Performance: ".$grade_into_credit_total_sgpa_psbl/$total_credits_sgpa_psbl;
                                               }

                                                 ?>
                                            </div>

                                            <div class="des text-center mt-4"><h2>Performance Progress And Guideline</h2></div>

                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Course Code</th>
                                                        <th>Course Title</th>
                                                        <th>Course Progress Prediction</th>
                                                        <th>Guideline</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                <?php

                                                for ($i=0; $i <count($crs_id_arr) ; $i++) {

                                                    

                                            $crs_id=$crs_id_arr[$i];
                                            $course_details=single_course_details($crs_id);
                                            $course_code_name = explode("+", $course_details);
                                            $course_code = $course_code_name[0]; 
                                            $course_title = $course_code_name[1];
                                            $course_mark = $all_total[$i];
                                            $course_marks = (int)$course_mark;

                                            if ($course_marks<60) {
                                                
$prereuisite_course_query = "SELECT course_prerequisites FROM courses WHERE course_id = $crs_id";
$prereuisite_course_query_result = mysqli_query($connection,$prereuisite_course_query);
if ($prereuisite_course_query_result) {
    if (mysqli_num_rows($prereuisite_course_query_result)==1) {
        $pre_req = mysqli_fetch_array($prereuisite_course_query_result);
        $pre_req_course_code= $pre_req['course_prerequisites'];
        // echo "$pre_req_course_code";
        // echo "<br>";
        if (!empty($pre_req_course_code)) {
            
            $prereuisite_course_guiding_query = "SELECT course_guiding FROM courses WHERE course_code = '$pre_req_course_code'";
            $prereuisite_course_guiding_query_result = mysqli_query($connection,$prereuisite_course_guiding_query);

            if ($prereuisite_course_guiding_query_result) {
                $pre_req_sgsn_arr = mysqli_fetch_array($prereuisite_course_guiding_query_result);

                $course_guiding_pre= $pre_req_sgsn_arr['course_guiding'];

            }

            $current_course_guiding_query = "SELECT course_guiding FROM courses WHERE course_id = $crs_id ";
            $current_course_guiding_query_result = mysqli_query($connection,$current_course_guiding_query);

            if ($current_course_guiding_query_result) {
                $crnt_crssgsn_arr = mysqli_fetch_array($current_course_guiding_query_result);

                $course_guiding_current= $crnt_crssgsn_arr['course_guiding'];

            }

            $course_guiding = "<h2>First learn this topics:</h2><p>".$course_guiding_pre."</p><br><h2>Then Learn this Topics:</h2><p>".$course_guiding_current."</p>";

        }else{

           $current_course_guiding_query = "SELECT course_guiding FROM courses WHERE course_id = $crs_id ";
            $current_course_guiding_query_result = mysqli_query($connection,$current_course_guiding_query);

            if ($current_course_guiding_query_result) {
                $crnt_crssgsn_arr = mysqli_fetch_array($current_course_guiding_query_result);

                $course_guiding= $crnt_crssgsn_arr['course_guiding'];

            } 
        }

    }else{
      $course_guiding = "no course id";  
    }
}

                                            }elseif($course_marks>59 && $course_marks<80){

            $current_course_guiding_query = "SELECT course_guiding FROM courses WHERE course_id = $crs_id ";
            $current_course_guiding_query_result = mysqli_query($connection,$current_course_guiding_query);

            if ($current_course_guiding_query_result) {
                $crnt_crssgsn_arr = mysqli_fetch_array($current_course_guiding_query_result);

                $course_guiding= $crnt_crssgsn_arr['course_guiding'];

            }



                                            }else{
                                              $course_guiding="Follow The Regular Course Instruction"; 
                                            }



                                            echo "<tr>";
                                                          
                                        echo "<td>$course_code</td>";
                                        echo "<td>$course_title</td>";

                                            if ($course_marks<50) { ?>
<td>
<div class="progress">
    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width:<?php echo $course_marks; ?>%"><?php echo $course_marks; ?>%</div>
</div>
 </td>
                                                
                                           
                                           <?php }

                                            if ($course_marks>49 && $course_marks<60) { ?>
<td>
<div class="progress">
    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width:<?php echo $course_marks; ?>%"><?php echo $course_marks; ?>%</div>
</div>
  </td>                                             
                                           
                                           <?php }

                                           if ($course_marks>59 && $course_marks<70) { ?>
<td>
<div class="progress">
    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width:<?php echo $course_marks; ?>%"><?php echo $course_marks; ?>%</div>
</div>
 </td>                                               
                                           
                                           <?php }

                                           if ($course_marks>69 && $course_marks<80) { ?>
<td>
<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:<?php echo $course_marks; ?>%"><?php echo $course_marks; ?>%</div>
</div>
  </td>                                               
                                           
                                           <?php }

                                            if ($course_marks>79 && $course_marks<101) { ?>
<td>
<div class="progress">
    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php echo $course_marks; ?>%"><?php echo $course_marks; ?>%</div>
</div>
  </td>                                               
                                           
                                           <?php }
                                           ?>
                                           <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $i; ?>">See guideline</button>
                                            </td>
                                            <!-- The Modal -->
  <div class="modal" id="myModal<?php echo $i; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Learn this topics carefully for better performance</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php echo $course_guiding; ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

                                           </tr>

                                                
                                           <?php }

                                               

                                                ?> 
                                                    
                                                </tbody>
                                            </table>

                                            <div class="des text-center mt-4"><h2>Progress Bar Description</h2></div>

                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Percentage</th>
                                                        <th>Progress Bar</th>
                                                        <th>Progress Bar Status</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>
                                                            80%-100%
                                                        </td>
                                                        <td>
                                                            <div class="progress">
    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width:90%"></div>
  </div>
                                                        </td>
                                                        <td>
                                                            Best Perrformance
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td>
                                                            70%-79%
                                                        </td>
                                                        <td>
                                                           <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:75%"></div>
</div>
                                                        </td>
                                                        <td>
                                                            Good Perrformance
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            60%-69%
                                                        </td>
                                                        
                                                          <td>
<div class="progress">
    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width:75%"></div>
</div>
 
                                                        </td>
                                                        <td>
                                                           Average Perrformance.

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            50%-59%
                                                        </td>
                                                        
                                                          <td>
<div class="progress">
    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" style="width:55%"></div>
</div>
  
                                                        </td>
                                                        <td>
                                                          This is Warning
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            40%-49%
                                                        </td>
                                                        
                                                          <td>
<div class="progress">
    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width:45%"></div>
</div>
  
                                                        </td>
                                                        <td>
                                                          In Danger
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                

                                           
                                                    
                                                </tbody>
                                            </table>



                                        </div>        
                                    </div>

                                    <?php 
                                    }
                                 ?>


                              <?php    }

                                   
                            }


                                 ?>

                            </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/std_footer.php"; ?>
   
