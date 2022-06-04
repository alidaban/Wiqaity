<?php 
include_once '../DB.php';
/*if(is_loged()){
	//get data
	$date_time = "CURRENT_TIMESTAMP";
	//$email = $_POST["email"];
	$type = $_POST["type"];//the type of the reported object [article, persont etc..]
	$tid = $_POST["tid"];//the id of the reported object [article, persont etc..]
	$message = $_POST["message"];
	//get file
	//save file



}//end is loged*/

	//$date_time = "CURRENT_TIMESTAMP";

	$fname = $_POST["fname"];

	$lname = $_POST["lname"];

	$email = $_POST["email"];

	$nationality = "me";
	if(isset($_POST["nationality"]))
	$nationality = $_POST["nationality"];

	$dob = $_POST["dbdatepicker"];

	$var = update_user($fname, $lname, $email, $nationality,$dob);
	echo $var;
?>