<!-- header Start -->
<?php include "includes/admin_header.php"; ?>
<!-- header end -->

 <!-- Top Bar Start -->
<?php include "includes/admin_topbar.php"; ?>
 <!-- Top Bar End -->

<!-- ========== Left Sidebar Start ========== -->
<?php include "includes/admin_left_sidebar.php"; ?>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!--admin welcome star -->
            <?php include "includes/admin_welcome.php"; ?>
            <!--admin welcome end -->

           
            <!-- end row -->

<?php 
include "includes/db.php";
global $connection;
if (isset($_POST['create_uni'])) {
    $university_code= mysqli_real_escape_string($connection,$_POST['university_code']);
    $university_name= strtoupper(mysqli_real_escape_string($connection,$_POST['university_name']));
    $university_location= mysqli_real_escape_string($connection,$_POST['university_location']);
    $university_approval= strtoupper(mysqli_real_escape_string($connection,$_POST['university_approval']));
    $university_type= strtoupper(mysqli_real_escape_string($connection,$_POST['university_type']));
    $university_category= strtoupper(mysqli_real_escape_string($connection,$_POST['university_category']));
    $university_details= mysqli_real_escape_string($connection,$_POST['university_details']);
    $university_email= mysqli_real_escape_string($connection,$_POST['university_email']);
    $university_contact= mysqli_real_escape_string($connection,$_POST['university_contact']);

     $university_logo = $_FILES['university_logo']['name'];
     $destination = "assets/photo/" . $university_logo;
     $university_logo_tmp = $_FILES['university_logo']['tmp_name'];
     move_uploaded_file($university_logo_tmp, $destination);

     $university_image = $_FILES['university_image']['name'];
     $destination_two = "assets/photo/" . $university_image;
     $university_image_tmp = $_FILES['university_image']['tmp_name'];
     move_uploaded_file($university_image_tmp, $destination_two);

     if (empty($university_code && $university_name && $university_location && $university_logo && $university_image )) {
           echo " Please Fill All Information";
       }else{
        $query = "SELECT university_code FROM university_info";
        $result = mysqli_query($connection, $query);
        $num_rows = mysqli_num_rows($result);
        if (1<=$num_rows) {
           echo "<script>alert('You can not create more than one')</script>";
        }else{

        $query = "INSERT INTO university_info(university_code,university_name,university_logo,university_image,university_location,university_approval,university_type,university_category,university_details,university_email,university_contact) ";

        $query .="VALUES('{$university_code}','{$university_name}','{$university_logo}','{$university_image}','{$university_location}','{$university_approval}','{$university_type}','{$university_category}','{$university_details}','{$university_email}','{$university_contact}')";

        $create_iniversity_query = mysqli_query($connection,$query);
        if ($create_iniversity_query) {
           header("Location: univers-add_info.php");
        }else{
            echo "<script>alert('error');</script>";
        }
        
        
        }
       }
}


 ?>




            <div class="row">  
                <div class="col-md-6">
                    <h3 class="text-center">Add University Information</h3><hr>
                     <form action="univers-add_info.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="university-code">Add University Code</label>
                            <input type="text" class="form-control" name="university_code">
                        </div>
                         <div class="form-group">
                            <label for="university-name">Add University Name</label>
                            <input type="text" class="form-control" name="university_name">
                        </div>
                        <div class="form-group">
                            <label for="university-logo">Add University logo</label>
                            <input type="file" class="" name="university_logo">
                        </div>
                         <div class="form-group">
                            <label for="university_image">Add University Image</label>
                            <input type="file" class="" name="university_image">
                        </div>
                        <div class="form-group">
                            <label for="university-location">Add University Location</label>
                            <input type="text" class="form-control" name="university_location">
                        </div>
                         <div class="form-group">
                            <label for="university-approval">Add Approval status</label>
                            <select name="university_approval" id="">
                              <option value='approved'>Approved</option>
                              <option value='unapproved'>Unapproved</option>
                              <option value='processing'>Processing</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="university-type">Add university Type</label>
                            <select name="university_type" id="">
                              <option value='public'>Public</option>
                              <option value='national'>National</option>
                              <option value='private'>Private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="university-category">Add University Category</label>
                            <select name="university_category" id="">
                              <option value='engineering & bba'>Engineering & BBA</option>
                              <option value='engineering'>Engineering</option>
                              <option value='bba'>BBA</option>
                              <option value='others'>Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="university-details">Add Details</label>
                            <textarea name="university_details" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="university-email">Add University Email</label>
                            <input type="text" class="form-control" name="university_email" placeholder="info@bubt.edu.bd">
                        </div>
                        <div class="form-group">
                            <label for="university-contac">Add University Contact No</label>
                            <input type="text" class="form-control" name="university_contact" placeholder="01700000000, 0789654258">
                        </div>
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="create_uni" value="Set Info">
                        </div>
                </div>
            </div>
            
                <!-- end col -->

        </div>
            <!--- end row -->

    </div> <!-- container -->

</div> <!-- content -->

<!-- Footer start-->
<?php include "includes/admin_footer.php"; ?>
<!-- Footer end-->