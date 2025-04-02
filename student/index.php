<?php include "includes/std_header.php"; ?>

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
                                    <a href="std_chang_password.php" class="anex-btn settings-btn">settings</a>
                                </div>
                                <div class="student-name">
                                    <h3><?php echo $_SESSION['std_name']; ?></h3>
                                </div>
                                <div class="student-pic">
                                    <img width="100" height="100" src="../admin/assets/tchrimages/<?php echo $_SESSION['std_image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="notice-box">
                                <i class="fa fa-bell"></i> <a href="" class="new-notice-btn">new notices</a>
                                <h3>Final result will be published on 03/02/2019 at 5:00 pm </h3>
                            </div>
                            <div class="info-menu">
                                <a href="std_rtn.php" class="single-info-item">
                                    <div class="single-info-inner">
                                        <img src="assets/img/rtn.png" alt="">
                                    </div>
                                    <h3 class="info-title">Routine</h3>
                                </a>
                                <a href="std_eca_info.php" class="single-info-item">
                                    <div class="single-info-inner">
                                        <img src="assets/img/aca.PNG" alt="">
                                    </div>
                                    <h3 class="info-title">Academic Info</h3>
                                </a>
                                <a href="" class="single-info-item">
                                    <div class="single-info-inner">
                                        <img src="assets/img/fees.PNG" alt="">
                                    </div>
                                    <h3 class="info-title">Fees & Waiver</h3>
                                </a>
                                <a href="" class="single-info-item">
                                    <div class="single-info-inner">
                                        <img src="assets/img/sup.PNG" alt="">
                                    </div>
                                    <h3 class="info-title">Supply Aplication</h3>
                                </a>
                                <a href="" class="single-info-item">
                                    <div class="single-info-inner">
                                        <img src="assets/img/help.PNG" alt="">
                                    </div>
                                    <h3 class="info-title">Help & Support</h3>
                                </a>
                                <a href="" class="single-info-item">
                                    <div class="single-info-inner">
                                        <img src="assets/img/lib.PNG" alt="">
                                    </div>
                                    <h3 class="info-title">Library</h3>
                                </a>
                                <a href="" class="single-info-item">
                                    <div class="single-info-inner">
                                        <img src="assets/img/uti.PNG" alt="">
                                    </div>
                                    <h3 class="info-title">Utilities</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php include "includes/std_footer.php"; ?>