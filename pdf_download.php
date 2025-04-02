<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>


<?php 
$db = new Database();

if (isset($_GET['not_id'])) {
	$not_id = $_GET['not_id'];

	$query = "SELECT notice_pdf FROM notice WHERE notice_id = $not_id ";
	$query_result = $db->select($query);
	$row = $query_result->fetch_array();

	$notice_pdf=$row['notice_pdf'];

	$file_url = 'Admin/pdf_file/'.$notice_pdf;
	header('Content-Type: application/octet-stream');
	header("Content-Transfer-Encoding: Binary"); 
	header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
	echo readfile($file_url);
}


 ?>