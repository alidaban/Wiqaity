<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weqaya";
$domain = "weqaya/";

//set_domain()//to set the domain first time in the date base

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//mysql_set_charset('utf8', $conn);


function passwordEncryption($pass){
	$hash_code = "vsdsiu487fiBU^&KPOTYhj♪♀♂♫↕N-`↨↓$";
	$method ='aes128';

	$iv_size = openssl_cipher_iv_length($method);
 	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$encryptedMessage = openssl_encrypt ($pass, $method, $hash_code, 0, $iv);
    $a = array('password' => $encryptedMessage, 'iv' => $iv );
 	return $a;
}

function passwordDecryption($EncrytPass, $iv){
	$hash_code = "vsdsiu487fiBU^&KPOTYhj♪♀♂♫↕N-`↨↓$";
	$method ='aes128';

 	return openssl_decrypt($EncrytPass, $method, $hash_code, 0, $iv);
}
//$row = is_user_exist(44);
//echo passwordDecryption($row['encpassword'],$row['iv']);
function is_user_exist($id){
	$sql = "SELECT iv,encpassword FROM user WHERE id = '$id'";
    $expResult = $GLOBALS['conn']->query($sql);
    if($expResult->num_rows > 0){
    	return $expResult->fetch_assoc();
 	}
     //echo "my new".passwordDecryption($row['encpassword'],$row['iv']).'<br>';
}


function is_user_email_exist($email){
	$sql = "SELECT iv,encpassword FROM user WHERE email = '$email'";
    $expResult = $GLOBALS['conn']->query($sql);
    return ($expResult->num_rows > 0);
     //$row = $expResult->fetch_assoc();
     //echo "my new".passwordDecryption($row['encpassword'],$row['iv']).'<br>';
}

//get signed user id
function get_user_id(){
	$email = get_email();
	$sql = "SELECT id FROM user WHERE email = '$email'";
    $expResult = $GLOBALS['conn']->query($sql);
    $row = $expResult->fetch_assoc();
	$user_id= $row['id'];
	return $user_id;
	     //$row = $expResult->fetch_assoc();
     //echo "my new".passwordDecryption($row['encpassword'],$row['iv']).'<br>';
}

//get signed user name
function get_user_name(){
	$email = get_email();
	$sql = "SELECT fname, lname FROM user WHERE email = '$email'";
    $expResult = $GLOBALS['conn']->query($sql);
    $row = $expResult->fetch_assoc();
	$user_name= $row['fname']." ".$row['lname'];
	return $user_name;
	     //$row = $expResult->fetch_assoc();
     //echo "my new".passwordDecryption($row['encpassword'],$row['iv']).'<br>';
}

function get_user_image(){
	$email = get_email();
	$sql = "SELECT image FROM user WHERE email = '$email'";
    $expResult = $GLOBALS['conn']->query($sql);
    $row = $expResult->fetch_assoc();
	$image= $row['image'];
	return $image;
	     //$row = $expResult->fetch_assoc();
     //echo "my new".passwordDecryption($row['encpassword'],$row['iv']).'<br>';
}


function get_user_id_by_email($email){
	$sql = "SELECT iv FROM user WHERE email = '$email'";
    $expResult = $GLOBALS['conn']->query($sql);
    $row = $expResult->fetch_assoc();
	$user_id= $row['id'];
	return $user_id;
	     //$row = $expResult->fetch_assoc();
     //echo "my new".passwordDecryption($row['encpassword'],$row['iv']).'<br>';
}

function check_password($email,$password){//for login if it is corrcet
	$sql = "SELECT iv,encpassword FROM user WHERE email = '$email'";
    $expResult = $GLOBALS['conn']->query($sql);
    if($expResult->num_rows > 0){
    	$row = $expResult->fetch_assoc();
    	$decpass = passwordDecryption($row['encpassword'],$row['iv']);
    	echo "decrypted pass : ".$password."<br>";
    	echo "pass : ".$decpass."<br>";
    	if ( $decpass == $password ) {
    		return true;
    	}
	}
	return false;
}

function set_domain(){
	$domain = $GLOBALS['domain'];
	$sql = "UPDATE `website` SET `content`='".$domain."')  WHERE title = 'domain'";


	$sql = "SELECT content FROM website WHERE title = 'domain'";
    $expResult = $GLOBALS['conn']->query($sql);
    if( $expResult->num_rows > 0){
    	$row = $expResult->fetch_assoc();
    	return $row['content'];
    }
    return "";
}

function get_domain(){
	$sql = "SELECT content FROM website WHERE title = 'domain'";
    $expResult = $GLOBALS['conn']->query($sql);
    if( $expResult->num_rows > 0){
    	$row = $expResult->fetch_assoc();
    	return $row['content'];
    }
    return "";
}
	 
// Create connection
//mysql_set_charset('utf8', $conn);
//register_new_user('kjaskj','kjkdsk','sli@lkjn','ljnfsj');
//is_user_email_exist('ali@ali.com');
//
function register_new_user($fname,$lname,$email,$password){
	
		$Encpasswordiv = passwordEncryption($password);
		$iv = $Encpasswordiv['iv'];
		//echo "iv0: ".$iv."<br>";
		//$iv = mb_convert_encoding($iv, "UTF-8", "auto");
		$Encpassword = $Encpasswordiv['password'];
		 echo "name: ".$fname." ".$lname."<br>";
		 echo "email: ".$email."<br>";
		 echo "password: ".$password."<br>";
		 echo "Encpassword: ".$Encpassword."<br>";
		 echo "iv: ".$iv."<br>";
		 //echo mb_convert_encoding($iv, "binary", "auto").'<br>';
		 $iv = (string)$iv;
		 //echo "iv2: ".$iv."<br>";

		//echo "pass: ".passwordDecryption($Encpasswordiv['password'], $iv);
		//$sql = "INSERT INTO `user` (`fname`,`lname`,`email`,`Encpassword`,`regdate`,`iv`) VALUES ('".$fname."','".$lname."','".$email."','".$Encpassword."', CURRENT_TIMESTAMP,'".$iv."')";
		 //$sql = "INSERT INTO `user` (`fname`,`lname`,`email`,`Encpassword`,`regdate`,`iv`) VALUES ('test5','test5','test5@test5','2htg27J0H41bw4rMcRlq+A==', CURRENT_TIMESTAMP,'���TkΫ�CBʾ��')";
		 $sql = "INSERT INTO `user` (`fname`,`lname`,`email`,`Encpassword`,`regdate`,`iv`) VALUES ('".$fname."','".$lname."','".$email."','".$Encpassword."', CURRENT_TIMESTAMP,'".$iv."')";
		 echo $sql;
		$connection = $GLOBALS['conn'];
		$is_inserted = $connection->query($sql);
		var_dump($is_inserted);
		return $is_inserted;
		//var_dump($result);
		//echo var_dump($Encpassword).'<br>'.var_dump(passwordDecryption($Encpassword['password'], $Encpassword['iv']));
	
}
$conn = new mysqli($servername, $username, $password, $dbname);

function insert_report($report_message, $report_type, $report_object_id, $report_email){
	//$date_time = "CURRENT_TIMESTAMP";
	$timestamp = time()+date("Z");//this is work to insert GMT time
	$GMT = gmdate('Y-m-d H-i-s',$timestamp);
	$sql = ("INSERT INTO `reports` (`type`, `tid`, `message`, `email`, `time`) VALUES ('".$report_type."','".$report_object_id."','".$report_message."','".$report_email."','". $GMT ."')");
	return query($sql);
}

function insert_contact_us($name, $email, $subject, $message){
	//$date_time = "CURRENT_TIMESTAMP";
	$timestamp = time()+date("Z");//this is work to insert GMT time
	$GMT = gmdate('Y-m-d H-i-s',$timestamp);

	$sql = ("INSERT INTO `contact_us` (`sender_email`, `sender_name`, `subject`, `message`, `date`) VALUES ('".$email."','".$name."','".$subject."','".$message."','". $GMT ."')");
	return query($sql);
}

function insert_comment($text, $article_id, $article_type,$comment_reply){
	//$date_time = "CURRENT_TIMESTAMP";
	$timestamp = time()+date("Z");//this is work to insert GMT time
	$GMT = gmdate('Y-m-d H-i-s',$timestamp);
	$user_id = get_user_id();
	$sql = ("INSERT INTO `comments` (`text`, `user_id`, `article_id`, `article_type`, `reply_comment_id`, `date`, `update_date`) VALUES ('".$text."','".$user_id."','".$article_id."','".$article_type."', '".$comment_reply."' ,'". $GMT ."','". $GMT ."')");
	return query($sql);
}


function insert_user_question($question){
	//$date_time = "CURRENT_TIMESTAMP";
	//$created_user_email = get_email();

	$user_id = get_user_id();

	//get_user_id_by_email($created_user_email);
	$answerd = false;

	$timestamp = time()+date("Z");
	$GMT = gmdate('Y-m-d H-i-s',$timestamp);//this is to insert GMT time

	$sql = ("INSERT INTO `user_questions` (`question`, `user_id`, `date`) VALUES ('".$question."','".$user_id."','".$GMT."')");

	echo $user_id." : ".$question." : ".$GMT;
	return query($sql);

}

function update_user($fname, $lname, $email, $nationality, $dob){
	//$user_old_email= get_email();

	$timestamp = time()+date("Z");
	$GMT = gmdate('Y-m-d H-i-s',$timestamp);//this is to insert GMT time

	$sql = ("UPDATE `user` SET `fname`='".$fname."', `lname`='".$lname."', `email`='".$email."', `nationality`='".$nationality."', `dob`='".$dob."', `updated`='".$GMT."', `updated_user`=".get_user_id()." WHERE id=".get_user_id().";");
	echo 'fname : '.$fname." - nationality : ".$nationality." - dob : ".$dob;
	return query($sql);

}


function query($sql){
	return $GLOBALS['conn']->query($sql);
}

function get_result_row_numbers($result){
	return $result->num_rows;
}

function get_result_array($result){
	return $result->fetch_assoc();
}

//to get total of qeury result
function get_total_result_value($result){
	$var = $result->fetch_assoc();
	return $var['total'];
}

//to get total of query
function get_query_total($q){
	$result = $GLOBALS['conn']->query($q);
	$var = $result->fetch_assoc();
	return $var['total'];
}


function get_result_row($result){
	return $result->fetch_assoc();
}
function get_row_col($result,$col){
	$row = $result->fetch_assoc();
	return $row[$col];
}


function get_total($totalsql){
    $totalsql = "SELECT COUNT(id) as total FROM $totalsql where `deleted`=0";//non deleted
    $totalResult = $GLOBALS['conn']->query($totalsql);
    $total_array = $totalResult->fetch_assoc();
    $total = $total_array["total"];
    return $total;
}


function removeTAGS($data){
	return strip_tags($data);
}

function convert_to_UTF8($text){
	//mysqli_set_charset($GLOBALS['conn'], 'utf8');
	return mysqli_real_escape_string($GLOBALS['conn'],$text);
}

function Clear($data){
	//trim remove spaces arround text
	//strip_tags remove all tags
	//mysqli_real_escape_string  just replace any ' with \'
	//global $conn;
	//return mysqli_real_escape_string($conn,strip_tags(trim($x)));
	
	return htmlspecialchars(stripslashes(trim($data)));

}


function string_limit_words($string, $word_limit) {
   $words = explode(' ', $string);
   return implode(' ', array_slice($words, 0, $word_limit));
}

// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
} 
else if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}else{
//echo "Connected successfully";
}
/* change character set to utf8 */
if (!$conn->set_charset("utf8")) {
    //printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
} else {
    //printf("Current character set: %s\n", $conn->character_set_name());
}

///////*** sessions cookies functions ****///////
function is_loged(){
    if(!isset($_SESSION)){
        session_start();
    }
    return (isset($_SESSION['loged']) && $_SESSION['loged'] == true) || (isset($_COOKIE["loged"]) && $_COOKIE["loged"]==true );
}

function get_email(){
	if(!isset($_SESSION)){
        session_start();
    }
	if(isset($_SESSION['loged']) && $_SESSION['loged'] == true){
		return $_SESSION['email'];
	}
	else if(isset($_COOKIE["loged"]) && $_COOKIE["loged"]==true ){
		return $_COOKIE['email'];
	}
}

?>