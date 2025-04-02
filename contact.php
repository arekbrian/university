<!-- HEADER -->
<?php include "includes/header1.php"; ?> 
<?php 
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($db->link,$_POST['name']);
        $email = mysqli_real_escape_string($db->link,$_POST['email']);
        $subject = mysqli_real_escape_string($db->link,$_POST['subject']);

       
       $date = date('y-m-d');


        if (!empty($name) && !empty($email) && !empty($subject) ) {
           $query = "INSERT INTO contact(name,email,subject,mailing_date) VALUES('{$name}','{$email}','{$subject}','{$date}') ";
            $insert_query_rslt = $db->insert($query);
            if ($insert_query_rslt) {
                echo "<script>alert('Email sent successfully');</script";
            }else{
                 echo "<script>alert('opps!! something went wrong');</script";
            }

        }else{
            echo "<script>alert('Field must not be empty');</script";
        }

}

?>





<!-- Banner area -->
<div class="hero-area hero-bg">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-6">
				<div class="hero-title">
					<h2>CONTACT OF HARIMOHAN</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Section: Contact v.2-->
<div class="contacttext">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-5">
				<div class="depart-title">
					<h2>Our <span>Contact </span>Form</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem
					voluptatem obcaecati!</p>
				</div>
			</div>
		</div>
	</div>
	<div class="contact-area contact-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="contact-form">
						<form action="contact.php" method="post">
							<label for="fname">Name</label>
							<input type="text" id="fname" name="name" placeholder="Your name..">
							<label for="lname">Email</label>
							<input type="email" id="lname" name="email" placeholder="Your Email..">
							<label for="subject">Subject</label>
							<textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
							<input type="submit" name="submit" value="Submit">
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contact-info">
						<h2>Postal Address:</h2>
						<div class="web-address">
							<p><strong>HGHS</strong><br>
								Harimohan Govt High School.<br>
							Kathal Bagicha, Chapainawabganj sadar.Chapainawabganj, Bangladesh.</p>
						</div>
						<h2>Our Contact Info:</h2>
						<div class="web-address">
							<div class="single-address">
								<span><i class="fa fa-phone" aria-hidden="true"></i></span>
								<span>Phone:</span>
								<span> +88 0781 52435</span>
							</div>

							<div class="single-address">
								<span><i class="fa fa-mobile" aria-hidden="true"></i></span>
								<span>Mobile:</span>
								<span>  01792072872</span>
							</div>

							<div class="single-address">
								<span><i class="fa fa-fax" aria-hidden="true"></i></span>
								<span>Fax:</span>
								<span>88-02-9023399</span>
							</div>

							<div class="single-address">
								<span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
								<span>Email:</span>
								<span>harimohan@harimohan.edu.bd</span>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Section: Contact v.2-->
<!--Google map-->
<div class="map-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3627.8113416885462!2d88.2705261143144!3d24.595706261876323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fbb6c50b853ac3%3A0x36e8ff61d3068bf6!2sHarimohan%20Govt.%20High%20School!5e0!3m2!1sen!2sbd!4v1583090419674!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
		</div>
	</div>
</div>

<!--Google Maps-->

<!-- FOOTER -->
<?php include "includes/footer.php"; ?> 