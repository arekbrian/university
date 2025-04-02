<?php ob_start(); ?>
<?php session_start(); ?>
 <?php include "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BUBT ANNEX</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php 
global $connection;
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];
    
    $password = md5($userpassword);


    $query = "SELECT * FROM students_basic WHERE std_id = '{$username}' AND std_password = '$password' ";
    $select_std_query = mysqli_query($connection,$query);
    if (!$select_std_query) {
        die("query failed " . mysqli_error($connection));
    }else{

        if (mysqli_num_rows($select_std_query)==1) {
             $row = mysqli_fetch_array($select_std_query);
          $std_id = $row['std_id'];
          $std_name = $row['std_name'];
          $std_image = $row['std_image'];
          $std_dept_id = $row['std_dept_id'];
          $std_dept = $row['std_dept'];
          $std_intake_id = $row['std_intake_id'];
          $std_intake = $row['std_intake'];
          $std_section_id = $row['std_section_id'];
          $std_section_no = $row['std_section_no'];
          $std_edu_year = $row['std_edu_year'];
          $std_sem = $row['std_sem'];
         

        $_SESSION['std_id'] = $std_id; 
        $_SESSION['std_name'] = $std_name; 
        $_SESSION['std_image'] = $std_image; 
        $_SESSION['std_dept_id'] = $std_dept_id; 
        $_SESSION['std_dept'] = $std_dept; 
        $_SESSION['std_intake_id'] = $std_intake_id; 
        $_SESSION['std_intake'] = $std_intake; 
        $_SESSION['std_section_id'] = $std_section_id; 
        $_SESSION['std_section_no'] = $std_section_no; 
        $_SESSION['std_edu_year'] = $std_edu_year; 
        $_SESSION['std_sem'] = $std_sem; 

         header("Location: index.php");
        }else{
            echo "<script>alert('Wrong info!!Try Again');</script>";
        }



       
    }

    }


 ?>

    <div class="login-form-wrapper">
        <div class="global-menu">
            <ul>
                <li>
                <a href="../index.php"><img src="assets/img/index.png" alt=""></a>
                </li>
                <li>
                <a href="std_annex_reg.php"><img src="assets/img/inx.png" alt=""></a>
                </li>
                <li>
                <a href=""><img src="assets/img/in.png" alt=""></a>
                </li>
            </ul>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">

                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">   
                    <div class="login-form">
                       <div class="logo text-center"><a href=""><img src="assets/img/index.png" alt=""></a></div>
                        <div class="left-slide left-side-gate"></div>
                        <div class="right-slide right-side-gate"></div>
                        <form action="std_login.php" method="post" id="login_name">
                            <input type="text" id="UserName" name="username" placeholder="Enter your ID">
                            <input type="password" id="UserPassword" name="userpassword" placeholder="Enter your password">
                            <a href="" id="frgt-pass"><img src="assets/img/password.png" alt=""></a>
                            <input type="submit" id="LogIn-btn" name="login" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php include "includes/std_footer.php"; ?>
