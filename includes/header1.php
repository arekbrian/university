<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>
<?php 
$db = new Database();
$fm = new formate();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Harimohan Gov. High School</title>
	<link rel="shortcut icon" href="asset/image/fabicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="asset/css/animate.css">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="asset/css/responsive.css">
</head>
<body>
	<!-- header-area -->
	<div class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="main-contact">
						<a href="#"><i class="fas fa-address-book"></i> +8801703695392</a>
						<a class="email" href="#"><i class="fas fa-address-book"></i>kanakchandra143@gmail.com</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="teacher-student">
						<a href="Admission/admission_login.php"><i class="fas fa-address-book"></i> ADMISSION</a>
						<a class="padding" href="Teacher/teacher_login.php"><i class="fas fa-address-book"></i> TEACHER</a>
						<a class="padding" href="Student/student_login.php"><i class="fas fa-address-book"></i>STUDENT</a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="search">
						<input class="search-content" type="text" placeholder="Search Here..">
						<i class="fas fa-check-square"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- MENU -->
	<nav class="navbar navbar-expand-lg navbar-light sticky-top nav-bg">
		<a class="navbar-brand" href="#"><img src="asset/image/logo.jpg" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">HOME</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php">ABOUT US</a>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" href="faculty.php">FACULTY</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link" href="teacher.php">TEACHER</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="department.php">DEPARTMENT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="club.php">CLUB</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="gallery.php">GALLERY</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">CONTACT US</a>
				</li>
			</ul>
		</div>
	</nav>