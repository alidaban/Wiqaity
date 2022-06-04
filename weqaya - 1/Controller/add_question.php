<?php
	include_once '../DB.php';

	$question = $_POST["question"];//the question

	//$sender_email = get_email();//the id of the user

	//$answerd = false;
	insert_user_question($question);
	//echo "Qustion : ".$question." sender email : ". $sender_email;
?>