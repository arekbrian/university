if ($std_crnt_coursesss==null) {
$std_crs_query = "INSERT into students_basic(std_crnt_course) ";
$std_crs_query .= "VALUES('{$std_crnt_course_insrte_mrg}') ";


$create_crnt_course_query_jssn = mysqli_query($connection,$std_crs_query);
if (!$create_crnt_course_query_jssn) {
  die("create_crnt_course_query_jssn failed ".mysqli_error($connection));
}
//header("Location: std_crs_reg.php");
echo "regester succesfull"."<br>";

}else{
$std_crs_query = "UPDATE students_basic SET ";
$std_crs_query .= " std_crnt_course = '{$std_crnt_course_insrte_mrg}' ";
$std_crs_query .= "WHERE std_dept = '{$std_dept}' ";

$create_crnt_course_query_jssn = mysqli_query($connection,$std_crs_query);
if (!$create_crnt_course_query_jssn) {
die("create_crnt_course_query_jssn failed ".mysqli_error($connection));
}
//header("Location: std_crs_reg.php");
echo "regester succesfull"."<br>";
}          