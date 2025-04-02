<?php include "includes/teacher_header.php"; ?>
<?php global $connection; ?>
<?php 

    $teach_id =$_SESSION['teach_id'];
    $teach_dept_id =$_SESSION['teach_dept_id'];

    $select_query = "SELECT * FROM current_semester";
    $select_query_rslt = mysqli_query($connection,$select_query);
    $row = mysqli_fetch_array($select_query_rslt);

    $current_sem = $row['semester_name']."-20".$row['semester_year'];

    if (isset($_GET['course_id']) && isset($_GET['intake_id'])) {
        $_SESSION['ssn_course_id']=$_GET['course_id'];
        $_SESSION['ssn_intake_id']=$_GET['intake_id'];
        $_SESSION['ssn_section_id']=$_GET['section_id'];
    }

    $ssn_course_id=$_SESSION['ssn_course_id'];
    $ssn_intake_id=$_SESSION['ssn_intake_id'];
    $ssn_section_id=$_SESSION['ssn_section_id'];


    if (isset($_POST['save'])) {
       
     $std_id =$_POST['std_id'];
     $std_dept_id =$teach_dept_id;
     $std_intake_id =$ssn_intake_id;
     $std_course_id =$ssn_course_id;
     $std_course_tchr_id =$teach_id;
     $std_courese_sem = $current_sem;
     $std_result_thirty =$_POST['out_of_trirty'];
     $std_result_mid =$_POST['mid'];
     $std_result_final =$_POST['fainal'];

       if ($std_result_thirty==NULL) {
           $std_result_thirty=0;
       }
       if ($std_result_mid==NULL) {
           $std_result_mid=0;
       }
        if ($std_result_final==NULL) {
           $std_result_final=0;
       }


           $std_result_total = $std_result_thirty+$std_result_mid+$std_result_final;

                if ($std_result_total>=80 && $std_result_total<=100) {

                    $std_result_grade_latter = 'A+';
                    $std_result_grade_point = 4.00;

                }elseif ($std_result_total>=75 && $std_result_total<=79) {
                    $std_result_grade_latter = 'A';
                    $std_result_grade_point = 3.75;

                }elseif ($std_result_total>=70 && $std_result_total<=74) {
                    $std_result_grade_latter = 'A-';
                    $std_result_grade_point = 3.50;

                }elseif ($std_result_total>=65 && $std_result_total<=69) {
                    $std_result_grade_latter = 'B+';
                    $std_result_grade_point = 3.25;

                }elseif ($std_result_total>=60 && $std_result_total<=64) {
                    $std_result_grade_latter = 'B';
                    $std_result_grade_point = 3.00;

                }elseif ($std_result_total>=55 && $std_result_total<=59) {
                    $std_result_grade_latter = 'B-';
                    $std_result_grade_point = 2.75;

                }elseif ($std_result_total>=50 && $std_result_total<=54) {
                    $std_result_grade_latter = 'C+';
                    $std_result_grade_point = 2.50;

                }elseif ($std_result_total>=45 && $std_result_total<=49) {
                    $std_result_grade_latter = 'C';
                    $std_result_grade_point = 2.25;

                }elseif ($std_result_total>=40 && $std_result_total<=44) {
                    $std_result_grade_latter = 'D';
                    $std_result_grade_point = 2.00;

                }else{
                   $std_result_grade_latter = 'F';
                $std_result_grade_point = 0.00;
                }


                if ($std_result_total>=40) {
                    $std_result_status="Passed";
                }else{
                  $std_result_status="Failed";  
                }


                $update_rslt_query = "UPDATE student_result SET std_course_tchr_id='$teach_id', std_result_thirty=$std_result_thirty,std_result_mid=$std_result_mid,std_result_final=$std_result_final,std_result_total=$std_result_total,std_result_grade_latter='$std_result_grade_latter',std_result_grade_point=$std_result_grade_point,std_result_status='$std_result_status' WHERE std_id='$std_id' AND std_dept_id=$std_dept_id AND std_intake_id=$std_intake_id AND std_course_id=$std_course_id  AND std_courese_sem='$std_courese_sem' ";

                $update_rslt_query_result = mysqli_query($connection,$update_rslt_query);

               if (!$update_rslt_query_result) {
                    die("update_rslt_query_result failed " . mysqli_error($connection));
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
                <div class="col-md-12">
                    <div class="info-area-wrapper">
                        <div class="info-area-innner">
                            <div class="namebar text-center">
                                <div class="anex-btns">
                                    <a href="teacher_logout.php" class="anex-btn log-out-btn">log out</a>
                                    <a href="" class="anex-btn settings-btn">settings</a>
                                </div>
                                <div class="student-name">
                                    <h3><?php echo $_SESSION['teach_name']; ?></h3>
                                </div>
                                <div class="student-pic">
                                    <img width="100" height="100" src="../admin/assets/tchrimages/<?php echo $_SESSION['teach_image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="notice-box">
                                <!-- <i class="fa fa-bell"></i> <a href="" class="new-notice-btn">new notices</a>
                                <h3>Final result will be published on 03/02/2019 at 5:00 pm </h3> -->
                            </div>
                            <div class="">
                                
                              <table class="table table-bordered table-hover">
                              <h2>marks</h2>
                                <thead>
                                    <tr>
                                        <th>Student id</th>
                                        <th>Student Name</th>
                                        <th>Out Of 30</th>
                                        <th>Mid</th>
                                        <th>Final</th>
                                        <th>Total</th>
                                        <th>Grade L</th>
                                        <th>Grade P</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                 <tbody>
                        <?php 

                        $select_student = "SELECT * FROM course_registration WHERE cr_course_id= $ssn_course_id AND cr_intake_id= $ssn_intake_id AND cr_section_id= $ssn_section_id AND cr_dept_id = $teach_dept_id AND cr_sem='$current_sem' ";

                        $select_student_query_rslt = mysqli_query($connection,$select_student);
                        if (mysqli_num_rows($select_student_query_rslt)>0) {
                            while($rows = mysqli_fetch_assoc($select_student_query_rslt)){

                        $cr_student_id= $rows['cr_student_id'];



                        $select_student_name = "SELECT * FROM students_basic WHERE std_id= '$cr_student_id' ";

                        $select_student_name_rslt = mysqli_query($connection,$select_student_name);
                        $row_name = mysqli_fetch_array($select_student_name_rslt);

                        $std_name=$row_name['std_name'];
                        $std_intake_id=$row_name['std_intake_id'];

                         $select_student_marks = "SELECT * FROM student_result WHERE std_id= '$cr_student_id' AND std_dept_id = $teach_dept_id AND std_intake_id = $std_intake_id AND std_course_id = $ssn_course_id AND std_course_tchr_id = '$teach_id' AND std_courese_sem = '$current_sem' ";

                        $select_student_marks_rslt = mysqli_query($connection,$select_student_marks);

                        if ($select_student_marks_rslt) {

                            if (mysqli_num_rows($select_student_marks_rslt)==1) {
                                $row = mysqli_fetch_array($select_student_marks_rslt);

                                $out_of_thirty = $row['std_result_thirty'];
                                $std_result_mid = $row['std_result_mid'];
                                $std_result_final = $row['std_result_final'];
                                $std_result_total = $row['std_result_total'];
                                $std_result_grade_latter = $row['std_result_grade_latter'];
                                $std_result_grade_point = $row['std_result_grade_point'];
                            }else{
                               $out_of_thirty=NULL; 
                               $std_result_mid=NULL; 
                               $std_result_final=NULL; 
                               $std_result_total=NULL; 
                               $std_result_grade_latter=NULL;
                               $std_result_grade_point=NULL;
                            }
                            
                        }else{
                             die("select_student_marks_rslt failed " . mysqli_error($connection));
                        }





                        ?>


                        <form action="input_marks.php" method="post">
                            
                            <input type="hidden" name="std_id" value="<?php echo $cr_student_id; ?>">
                            
                            <tr>
                                <td><?php echo $cr_student_id; ?></td>
                                <td><?php echo $std_name; ?></td>
                                <td><input type='text' name='out_of_trirty' value='<?php echo $out_of_thirty; ?>'></td>
                                <td><input type='text' name='mid' value='<?php echo $std_result_mid; ?>'></td>
                                <td><input type='text' name='fainal' value='<?php echo $std_result_final; ?>'></td>
                                <td><?php echo $std_result_total; ?></td>
                                <td><?php echo $std_result_grade_latter; ?></td>
                                <td><?php echo $std_result_grade_point; ?></td>
                                <td><input type="submit" name="save" value="Update" class="btn btn-success"></td>
                            </tr>
                        </form>

                                  <?php 
                            }
                        }else{
                            echo "No One Register yet!";
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
   <?php include "includes/teacher_footer.php"; ?>