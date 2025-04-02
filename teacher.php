<?php include "includes/header1.php"; ?> 

	<!--  Teacher -->
	<div class="teacher-area">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-5">
					<div class="depart-title">
						<h2>Our <span>Teacher</span> List</h2>
					</div>
				</div>
			</div>
			<div class="single-page-body">
				<div class="row">
					<div class="col-md-12">
						<div class="page-containt-box nativeEditor">
							<div class="table-responsive">
								<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example" class="table table-striped table-hover dataTable no-footer" style="width:100%" role="grid">
									<thead>
										<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 129px;">ID</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Teacher name: activate to sort column ascending" style="width: 334px;">Teacher name</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Designation: activate to sort column ascending" style="width: 228px;">Designation</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mobile Number: activate to sort column ascending" style="width: 205px;">Mobile Number</th></tr>
									</thead>
									<tbody>

					<?php  $query = "SELECT * FROM teacher_info";
                      $query_result = $db->select($query);
                      if ($query_result) {
                        while ($rows = $query_result->fetch_assoc()) {
                        $tchr_id=$rows['id'];
                        $t_name=$rows['t_name'];
                        $t_designation=$rows['t_designation'];
                        $t_contact=$rows['t_contact'];
                        ?>

                        <tr role="row">
                          <td style="padding:10px" class="sorting_1"><?php echo $tchr_id; ?> </td>
                          <th><?php echo $t_name; ?> </th>
                          <td><?php echo $t_designation; ?> </td>
                          <td><?php echo $t_contact; ?></td>
                        </tr>




			                 <?php }
			               }
			                        
			                        ?>

									</tbody>
									</table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"></div></div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Footer area -->
		<?php include "includes/footer.php"; ?> 
