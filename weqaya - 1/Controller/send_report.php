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

	$type = $_POST["type"];//the type of the reported object [expereince, question, article, person ]

	$tid = $_POST["tid"];//the id of the reported object [expereince, question, article, person ]

	$message = $_POST["message"];

	$email = $_POST["email"];

	$var = insert_report($message, $type, $tid, $email);
	//echo $type." : ".$tid." : ".$message." : ".$var;
?>