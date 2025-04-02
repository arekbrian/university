 <?php include "includes/db.php"; ?>
 <?php include "includes/std_header.php"; ?>
 
<?php 
if (isset($_SESSION['reg_alret'])) {
    $reg_alret = ucwords($_SESSION['reg_alret']);
    }
 ?>

    <div class="login-form-wrapper">
        <div class="global-menu">
            <ul>
                <li>
                <a href=""><img src="assets/img/index.png" alt=""></a>
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
                      <?php echo $reg_alret; ?>  
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 offset-md-4">
                     "<button type="button" class="btn btn-danger btn-block"><a href="std_login.php">Click Here To Login</a></button>;
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">   
                 <a href="std_login.php"><img  src="assets/img/login.png" class="mx-auto d-block"></a>

                </div>
            </div>
        </div>
    </div>

   <?php include "includes/std_footer.php"; ?>
