<?php

	function single_course_details($crs_id){
		global $connection;
		
 			$course_query = "SELECT * FROM courses WHERE course_id=$crs_id";
            $course_query_rslt = mysqli_query($connection,$course_query);
                                                      
          	if ($course_query_rslt) {

            	$row = mysqli_fetch_array($course_query_rslt);
                $course_code = $row['course_code'];
                $course_title = $row['course_title'];
                $course_credits = $row['course_credits'];

            }
                                                         
            $course_details = $course_code."+".$course_title."+".$course_credits;
        
		return $course_details;		

	}



	function course_details($crs_id_arr){
		global $connection;
		$crs_details_arr = array();

 		foreach($crs_id_arr as $value){

 			$course_query = "SELECT * FROM courses WHERE course_id=$value";
            $course_query_rslt = mysqli_query($connection,$course_query);
                                                      
          	if ($course_query_rslt) {

            	$row = mysqli_fetch_array($course_query_rslt);
                $course_code = $row['course_code'];
                $course_title = $row['course_title'];

            }
                                                         

        array_push($crs_details_arr,$course_code,$course_title);
		}
		return $crs_details_arr;		

	}


	function grade_point_letter($std_result_total){

		if ($std_result_total>=80 && $std_result_total<=100) {

                $std_result_grade_latter = 'A+';
                $std_result_grade_point = 4.00;

            }elseif ($std_result_total>=75 && $std_result_total<=79) {
                $std_result_grade_latter = 'A';
                $std_result_grade_point = 3.75;

            }elseif ($std_result_total>=70 && $std_result_total<=74) {
                $std_result_grade_latter = 'A-';
                $std_result_grade_point = 3.50;

            }elseif ($std_result_total>=65 && $std_result_total<=69) {
                $std_result_grade_latter = 'B+';
                $std_result_grade_point = 3.25;

            }elseif ($std_result_total>=60 && $std_result_total<=64) {
                $std_result_grade_latter = 'B';
                $std_result_grade_point = 3.00;

            }elseif ($std_result_total>=55 && $std_result_total<=59) {
                $std_result_grade_latter = 'B-';
                $std_result_grade_point = 2.75;

            }elseif ($std_result_total>=50 && $std_result_total<=54) {
                $std_result_grade_latter = 'C+';
                $std_result_grade_point = 2.50;

            }elseif ($std_result_total>=45 && $std_result_total<=49) {
                $std_result_grade_latter = 'C';
                $std_result_grade_point = 2.25;

            }elseif ($std_result_total>=40 && $std_result_total<=44) {
                $std_result_grade_latter = 'D';
                $std_result_grade_point = 2.00;

            }else{
               $std_result_grade_latter = 'F';
            $std_result_grade_point = 0.00;
            }
            $point_ltr = $std_result_grade_point."+".$std_result_grade_latter;

            return $point_ltr;
	}


	function out_of_thirty($crs_id_arr){
		global $connection;

		$avg_marks_arr = array();
 		foreach($crs_id_arr as $value){
        $crs_id=0;
        $avg_marks=0;
        $max_count=0;

        $select_csr_rslt = "SELECT std_result_thirty FROM student_result WHERE std_course_id = $value ORDER BY std_id DESC  LIMIT 1000";
        $select_csr_rslt_rs = mysqli_query($connection,$select_csr_rslt);
            if ($select_csr_rslt_rs) {

	            while($row = mysqli_fetch_assoc($select_csr_rslt_rs)){

	                $std_result_thirty= $row['std_result_thirty'];

	                $count_query = "SELECT COUNT(std_result_thirty) FROM student_result WHERE std_course_id=$value AND std_result_thirty='$std_result_thirty'";

		                $count_query_result = mysqli_query($connection,$count_query);
		                if ($count_query_result) {

		                  	$count_rslt =  mysqli_fetch_array($count_query_result);

			                if ($count_rslt[0]>$max_count) {
			                   $max_count = $count_rslt[0];
			                   $avg_marks = $std_result_thirty; 
			                }
		               }
	            }

	        }
            array_push($avg_marks_arr,$avg_marks);  
           
        }

        return $avg_marks_arr;
	}




	function std_result_mid($crs_id_arr){
		global $connection;

		$avg_marks_arr = array();
 		foreach($crs_id_arr as $value){
        $crs_id=0;
        $avg_marks=0;
        $max_count=0;

        $select_csr_rslt = "SELECT std_result_mid FROM student_result WHERE std_course_id = $value ORDER BY std_id DESC  LIMIT 1000";
        $select_csr_rslt_rs = mysqli_query($connection,$select_csr_rslt);
            if ($select_csr_rslt_rs) {

	            while($row = mysqli_fetch_assoc($select_csr_rslt_rs)){

	                $std_result_mid= $row['std_result_mid'];

	                $count_query = "SELECT COUNT(std_result_mid) FROM student_result WHERE std_course_id=$value AND std_result_mid='$std_result_mid'";

		                $count_query_result = mysqli_query($connection,$count_query);
		                if ($count_query_result) {

		                  	$count_rslt =  mysqli_fetch_array($count_query_result);

			                if ($count_rslt[0]>$max_count) {
			                   $max_count = $count_rslt[0];
			                   $avg_marks = $std_result_mid; 
			                }
		               }
	            }

	        }
            array_push($avg_marks_arr,$avg_marks);  
           
        }

        return $avg_marks_arr;
	}

	function std_result_final($crs_id_arr){
		global $connection;

		$avg_marks_arr = array();
 		foreach($crs_id_arr as $value){
        $crs_id=0;
        $avg_marks=0;
        $max_count=0;

        $select_csr_rslt = "SELECT std_result_final FROM student_result WHERE std_course_id = $value ORDER BY std_id DESC  LIMIT 1000";
        $select_csr_rslt_rs = mysqli_query($connection,$select_csr_rslt);
            if ($select_csr_rslt_rs) {

	            while($row = mysqli_fetch_assoc($select_csr_rslt_rs)){

	                $std_result_final= $row['std_result_final'];

	                $count_query = "SELECT COUNT(std_result_final) FROM student_result WHERE std_course_id=$value AND std_result_final='$std_result_final'";

		                $count_query_result = mysqli_query($connection,$count_query);
		                if ($count_query_result) {

		                  	$count_rslt =  mysqli_fetch_array($count_query_result);

			                if ($count_rslt[0]>$max_count) {
			                   $max_count = $count_rslt[0];
			                   $avg_marks = $std_result_final; 
			                }
		               }
	            }

	        }
            array_push($avg_marks_arr,$avg_marks);  
           
        }

        return $avg_marks_arr;
	}





	function result_prediction($cr_sem,$ls_sem,$crs_id_arr){
		global $connection;
		$std_id=$_SESSION['std_id'];
		$std_dept_id=$_SESSION['std_dept_id'];
		$std_intake_id=$_SESSION['std_intake_id'];
		$std_section_id=$_SESSION['std_section_id'];

		 $prev_crs_id_arr= array();
		$prev_crs_grade_point_arr = array();

		

		$previous_sem_result_query = "SELECT std_course_id,std_result_grade_point FROM student_result WHERE std_id='$std_id' AND std_dept_id=$std_dept_id AND std_intake_id=$std_intake_id AND std_section_id=$std_section_id AND std_courese_sem='$ls_sem' ";

		$previous_sem_result_query_result = mysqli_query($connection,$previous_sem_result_query);
		if ($previous_sem_result_query_result) {
			if (mysqli_num_rows($previous_sem_result_query_result)>0) {
				while($rows = mysqli_fetch_assoc($previous_sem_result_query_result)){
					$std_course_id=$rows['std_course_id'];
					$std_result_grade_point=$rows['std_result_grade_point'];

					array_push($prev_crs_id_arr,$std_course_id);
					array_push($prev_crs_grade_point_arr,$std_result_grade_point);

				}
				
			}
		}else{
			 die("previous_sem_result_query_result failed ".mysqli_error($connection));
		}


		$student_ids_arr = array();

		for ($i=0; $i <count($prev_crs_id_arr) ; $i++) { 
			$single_crs_id = $prev_crs_id_arr[$i];
			$single_grade_point = $prev_crs_grade_point_arr[$i];

			
			

			$same_grade_student_id_query = "SELECT std_id FROM student_result WHERE std_course_id=$single_crs_id AND std_result_grade_point=$single_grade_point AND std_courese_sem !='$ls_sem' ORDER BY std_id DESC  LIMIT 1000";
			$same_grade_student_id_query_result = mysqli_query($connection,$same_grade_student_id_query);
			if ($same_grade_student_id_query_result) {

				if (mysqli_num_rows($same_grade_student_id_query_result)>0) {
					
					while($row_std_id = mysqli_fetch_assoc($same_grade_student_id_query_result)){
						$std_id=$row_std_id['std_id'];


						if (!in_array($std_id, $student_ids_arr)){
						  array_push($student_ids_arr,$std_id);
						}

						
					}


				}
				
			}else{
				die("same_grade_student_id_query_result failed ".mysqli_error($connection));
			}

			}

			

			$thirty_mrks_arr = array();
			$mid_mrks_arr = array();
			$final_mrks_arr = array();

			for ($j=0; $j <count($crs_id_arr) ; $j++) { 

				$std_result_thirty_array = array();
				$std_result_mid_array = array();
				$std_result_final_array = array();
				
				$cr_crs_id = $crs_id_arr[$j];
			
					
				for ($k=0; $k <count($student_ids_arr) ; $k++) { 
						$student_id = $student_ids_arr[$k];

					 $select_csr_rslt = "SELECT std_result_thirty,std_result_mid,std_result_final FROM student_result WHERE std_course_id = $cr_crs_id AND std_id='$student_id' ";
        			$select_csr_rslt_rs = mysqli_query($connection,$select_csr_rslt);

        			if ($select_csr_rslt_rs) {
        				
        				if (mysqli_num_rows($select_csr_rslt_rs)>0) {
        					$std_marks = mysqli_fetch_array($select_csr_rslt_rs);
        				
        				$std_result_thirty = $std_marks['std_result_thirty'];
        				
        				$std_result_mid = $std_marks['std_result_mid'];
        				$std_result_final = $std_marks['std_result_final'];


        				array_push($std_result_thirty_array,$std_result_thirty);
        				array_push($std_result_mid_array,$std_result_mid);
        				array_push($std_result_final_array,$std_result_final);


        				}



        				
        			}
					
				}

				
				$thirty_array = array_count_values($std_result_thirty_array);
				$thirty_max =max($thirty_array);
				$thirty_key = array_search($thirty_max, $thirty_array);
				array_push($thirty_mrks_arr,$thirty_key);

				$mid_array = array_count_values($std_result_mid_array);
				$mid_max =max($mid_array);
				$mid_key = array_search($mid_max, $mid_array);
				array_push($mid_mrks_arr,$mid_key);

				$final_array = array_count_values($std_result_mid_array);
				$final_max =max($final_array);
				$final_key = array_search($final_max, $final_array);
				array_push($final_mrks_arr,$final_key);
			


			}

			$test_arr = array($thirty_mrks_arr,$mid_mrks_arr,$final_mrks_arr);

				// print_r($test_arr);
				// echo "<br>";

			 return $test_arr;
	
		}



 ?>