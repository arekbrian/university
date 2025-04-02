<?php 

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "university";

// $db['db_host'] = "localhost";
// $db['db_user'] = "landuzaa_university";
// $db['db_pass'] = "uS0CgFzSFYF2s";
// $db['db_name'] = "landuzaa_university";


foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}


$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (!$connection) {
	die("DAtabase Connection Failed: ".mysql_error($connection));
}



?>