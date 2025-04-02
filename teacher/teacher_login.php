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


    $query = "SELECT * FROM teachers WHERE teach_id = '{$username}' AND teach_password = '$password' ";
    $select_tchr_query = mysqli_query($connection,$query);
    if (!$select_tchr_query) {
        die("query failed " . mysqli_error($connection));
    }else{

        if (mysqli_num_rows($select_tchr_query)==1) {
          $row = mysqli_fetch_array($select_tchr_query);
          $teach_id = $row['teach_id'];
          $teach_name = $row['teach_name'];
          $teach_image = $row['teach_image'];
          $teach_dept_id = $row['teach_dept_id'];
          $teach_dept = $row['teach_dept'];
          
         

            $_SESSION['teach_id'] = $teach_id; 
            $_SESSION['teach_name'] = $teach_name; 
            $_SESSION['teach_image'] = $teach_image; 
            $_SESSION['teach_dept_id'] = $teach_dept_id; 
            $_SESSION['teach_dept'] = $teach_dept; 
        

         header("Location: index.php");
        }else{
            echo "<script>alert('Wrong info!!Try Again');</script>";
        }



        
    }

    }


 ?>

    <div class="login-form-wrapper">
        <div class="global-menu">
           
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">

                    <h2 style="background-color: #53a1f152;padding: 10px;margin: 10px;">Teacher Login</h2> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">   
                    <div class="login-form">
                       <div class="logo text-center"><a href=""><img src="assets/img/index.png" alt=""></a></div>
                        <div class="left-slide left-side-gate"></div>
                        <div class="right-slide right-side-gate"></div>
                        <form action="teacher_login.php" method="post" id="login_name">
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

   <?php include "includes/teacher_footer.php"; ?>
