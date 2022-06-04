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

	$name = $_POST["name"];//the type of the reported object [expereince, question, article, person ]

	$email = $_POST["email"];//the id of the reported object [expereince, question, article, person ]

	$subject = $_POST["subject"];

	$message = $_POST["message"];

	$var = insert_contact_us($name, $email, $subject, $message);
	//echo $type." : ".$tid." : ".$message." : ".$var;
?>