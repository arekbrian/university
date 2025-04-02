<?php include "includes/teacher_header.php"; ?>
<?php global $connection; ?>
<?php 

    if (isset($_SESSION['ssn_course_id']) && isset($_SESSION['ssn_intake_id'])) {
        unset($_SESSION['ssn_course_id']);
        unset($_SESSION['ssn_intake_id']);
        unset($_SESSION['ssn_section_id']);
    }

    $teach_id =$_SESSION['teach_id'];
    $teach_dept_id =$_SESSION['teach_dept_id'];

    $select_query = "SELECT * FROM current_semester";
    $select_query_rslt = mysqli_query($connection,$select_query);
    $row = mysqli_fetch_array($select_query_rslt);

    $current_sem = $row['semester_name']."-20".$row['semester_year'];

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
                                    <a href="std_logout.php" class="anex-btn log-out-btn">log out</a>
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
                            <div class="info-menu">
                               <?php 
                               global $connection;

                                $query = "SELECT * FROM course_assign WHERE ca_teacher_id= '$teach_id' AND ca_dept_id=$teach_dept_id AND ca_semester='$current_sem' ";
                                $query_rslt = mysqli_query($connection,$query);
                                if ($query_rslt) {
                                    while($rows = mysqli_fetch_assoc($query_rslt)){

                                        $ca_course_id = $rows['ca_course_id'];
                                        $ca_intake_id = $rows['ca_intake_id'];
                                        $ca_section_id = $rows['ca_section_id'];

                                        
                                        $query_course = "SELECT * FROM courses WHERE course_id=$ca_course_id";

                                        $query_course_rslt = mysqli_query($connection,$query_course);

                                        $course_row = mysqli_fetch_array($query_course_rslt);
                                        $course_id = $course_row['course_id'];
                                        $course_code = $course_row['course_code'];
                                        $course_title = $course_row['course_title'];


                                        $query_intake = "SELECT * FROM intake WHERE intake_id= $ca_intake_id";
                                        $query_intake_rslt = mysqli_query($connection,$query_intake);
                                        $row = mysqli_fetch_array($query_intake_rslt);
                                        $intake_id = $row['intake_id'];
                                        $intake_no = $row['intake_no'];



                                         $query_section = "SELECT * FROM section WHERE section_intake_id= $intake_id AND section_id=$ca_section_id ";
                                        $query_section_rslt = mysqli_query($connection,$query_section);
                                       $row = mysqli_fetch_array($query_section_rslt);

                                        $section_id = $row['section_id'];
                                        $section_no = $row['section_no'];

                                        echo "<a href='input_marks.php?course_id={$course_id}&intake_id={$intake_id}&section_id={$section_id}'><button type='button' class='btn btn-warning mb-4'>Intake- $intake_no   Section- $section_no   $course_title [$course_code] </button></a>"; 
                                       echo "<p></p>";


                                    }


                                }



                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php include "includes/teacher_footer.php"; ?>