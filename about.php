<!-- HEADER -->
<?php include "includes/header1.php"; ?>

<!-- Banner area -->

<div class="hero-area hero-bg">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-5">
				<div class="hero-title">
					<h2>ABOUT OF HARIMOHAN</h2>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="about-area">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="history-content1">
					<p> <strong> Welcome to Harimohan Govt. High School</strong> <br>
						”Harimohan Govt. High School, Chapainawabganj is one of the most famous and biggest schools in Bangladesh.

						It aims at quality education of the students. It creates a favorable environment for the development of the potentials of the students. This school is not only famous at Chapainawabganj but also all over the country for its own identity. The students have been able to play important role in building the nation for their creativity. The students of this school have a well developed sense of life and moral values. It got the recognition for maintaining a steady and better environment for the flourishing of the students and for strict discipline. The classes are regularly held from the very beginning of the academic year.

						We try to use ICT in education. There are computer lab, Social Science lab, Biology lab, Chemistry lab, Physics lab and students’ common room. I hope that the school will gradually develop and become a symbol that other educational institutions should follow.”<br>

						<strong>Md. Abdul Latif</strong> <br>
					Head Master</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="history-img">
					<img src="asset/image/history.jpg" alt="">
				</div>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-5">
				<div class="depart-title">
					<h2>Our <span>Notice</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="it-content">
					<ul>

						<?php 
							$i=1;
							$query = "SELECT * FROM notice ";
							$query_result = $db->select($query);
							if ($query_result) {
								while ($rows = $query_result->fetch_assoc()) {
								$notice_id=$rows['notice_id'];
								$notice_title=$rows['notice_title'];
								$notice_date=$rows['notice_date'];
								$notice_pdf=$rows['notice_pdf'];

								//$notice_date=$fm->formateDate($notice_date);
								?>

						<li><a href="pdf_download.php?not_id=<?php echo $notice_id; ?>"><?php echo $notice_title ?></a></li>
						<li class="date"><?php echo $notice_date; ?></li>

								<?php

							}
							}else{
								echo "<p style='color:red;text-align:center;font-size:25px;'>No Notice</p>";
							}


							

						 ?>






						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- FOOTER -->
<?php include "includes/footer.php"; ?> 