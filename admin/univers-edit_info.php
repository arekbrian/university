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
if (isset($_GET['p_id'])) {
      $the_uni_code = $_GET['p_id'];
   
   $query = "SELECT * FROM university_info WHERE university_code = '$the_uni_code' ";
   $select_uni_by_code = mysqli_query($connection,$query);
   while($row=mysqli_fetch_assoc($select_uni_by_code)) {
      $university_code=$row['university_code'];
      $university_name=$row['university_name'];
      $university_logo=$row['university_logo'];
      $university_image=$row['university_image'];
      $university_location=$row['university_location'];
      $university_approval=$row['university_approval'];
      $university_type=$row['university_type'];
      $university_category=$row['university_category'];
      $university_details=$row['university_details'];
      $university_email=$row['university_email'];
      $university_contact=$row['university_contact'];
        
      }
  }
$the_uni_code;
if (isset($_POST['update_uni'])) {
    $university_code= mysqli_real_escape_string($connection,$_POST['university_code']);
    $university_name= strtoupper(mysqli_real_escape_string($connection,$_POST['university_name']));
    $university_location= mysqli_real_escape_string($connection,$_POST['university_location']);
    $university_approval= strtoupper(mysqli_real_escape_string($connection,$_POST['university_approval']));
    $university_type= strtoupper(mysqli_real_escape_string($connection,$_POST['university_type']));
    $university_category= strtoupper(mysqli_real_escape_string($connection,$_POST['university_category']));
    $university_details= mysqli_real_escape_string($connection,$_POST['university_details']);
    $university_email= mysqli_real_escape_string($connection,$_POST['university_email']);
    $university_contact= mysqli_real_escape_string($connection,$_POST['university_contact']);
    $the_uni_code= mysqli_real_escape_string($connection,$_POST['the_uni_code']);

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
        if (1<$num_rows) {
           echo "<script>alert('You can not create more than one')</script>";
        }else{

        $query = "UPDATE university_info SET ";
        $query .= "university_code = '{$university_code}', ";
        $query .= "university_name = '{$university_name}', ";
        $query .= "university_logo = '{$university_logo}', ";
        $query .= "university_image = '{$university_image}', ";
        $query .= "university_location = '{$university_location}', ";
        $query .= "university_approval = '{$university_approval}', ";
        $query .= "university_type = '{$university_type}', ";
        $query .= "university_category = '{$university_category}', ";
        $query .= "university_details = '{$university_details}', ";
        $query .= "university_email = '{$university_email}', ";
        $query .= "university_contact = '{$university_contact}' ";
        $query .= "WHERE university_code = '{$the_uni_code}' ";
        

        $update_iniversity_query = mysqli_query($connection,$query);
        header("Location: univers-view_info.php");
        
        }
       }
}


 ?>

            <div class="row">  
                <div class="col-md-6 offset-md-2">
                    <h3 class="text-center">Add University Information</h3><hr>
                     <form action="univers-edit_info.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="university-code">Add University Code</label>
                            <input type="text" class="form-control" name="university_code" value="<?php echo $university_code;?>">
                        </div>
                         <div class="form-group">
                            <label for="university-name">Add University Name</label>
                            <input type="text" class="form-control" name="university_name"value="<?php echo $university_name;?>">
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
                            <input type="text" class="form-control" name="university_location"value="<?php echo $university_location;?>">
                        </div>
                         <div class="form-group">
                            <label for="university-approval">Add Approval status</label>
                            <select name="university_approval" id="">
                              <option value='approved'>Approved</option>
                              <option value='unapproved'>Unapproved</option>
                              <option value='processing'>Processing</option>
                            </select>
                        </div>
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
                            <input type="text" class="form-control" name="university_email" value="<?php echo $university_email;?>">
                        </div>
                        <div class="form-group">
                            <label for="university-contac">Add University Contact No</label>
                            <input type="text" class="form-control" name="university_contact" value="<?php echo $university_contact;?>">
                        </div>
                         <div class="form-group ">
                            <input type="hidden" class="form-control" name="the_uni_code" value="<?php echo isset($_GET['p_id']) ? $_GET['p_id'] : ''; ?>">

                        </div>
                         <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update_uni" value="Update Info">
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