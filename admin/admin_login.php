<?php ob_start(); ?>
<?php session_start(); ?>
 <?php include "includes/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BUBT ANNEX</title>
    <link rel="stylesheet" href="../student/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../student/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../student/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../student/style.css">
</head>

<body>
<?php 
global $connection;
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];
    
    $password = md5($userpassword);


    $query = "SELECT * FROM admin WHERE admin_username = '{$username}' AND admin_password = '$password' ";
    $select_tchr_query = mysqli_query($connection,$query);
    if (!$select_tchr_query) {
        die("query failed " . mysqli_error($connection));
    }else{

        if (mysqli_num_rows($select_tchr_query)==1) {
          $row = mysqli_fetch_array($select_tchr_query);
          $admin_id = $row['admin_id'];
          $admin_username = $row['admin_username'];
          $admin_name = $row['admin_name'];
          $admin_img = $row['admin_img'];
          $admin_email = $row['admin_email'];
          $admin_type = $row['admin_type'];
          $admin_contact = $row['admin_contact'];
          
         

            $_SESSION['admin_id'] = $admin_id; 
            $_SESSION['admin_username'] = $admin_username; 
            $_SESSION['admin_name'] = $admin_name; 
            $_SESSION['admin_img'] = $admin_img; 
            $_SESSION['admin_email'] = $admin_email; 
            $_SESSION['admin_type'] = $admin_type; 
            $_SESSION['admin_contact'] = $admin_contact; 
        

         header("Location: index.php");
        }else{
            echo "<script>alert('Wrong info!!Try Again');</script>";
        }



        
    }

    }


 ?>

    <div class="login-form-wrapper">
        <div  class="global-menu ">
           
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">

                    <h2 style="background-color: #53a1f152;padding: 10px;margin: 10px;">Admin Login</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">   
                    <div class="login-form">
                       <div class="logo text-center"><a href=""><img src="assets/img/index.png" alt=""></a></div>
                        <div class="left-slide left-side-gate"></div>
                        <div class="right-slide right-side-gate"></div>
                        <form action="admin_login.php" method="post" id="login_name">
                            <input type="text" id="UserName" name="username" placeholder="Enter your username">
                            <input type="password" id="UserPassword" name="userpassword" placeholder="Enter your password">
                            <a href="" id="frgt-pass"><img src="../student/assets/img/password.png" alt=""></a>
                            <input type="submit" id="LogIn-btn" name="login" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php include "../teacher/includes/teacher_footer.php"; ?>
