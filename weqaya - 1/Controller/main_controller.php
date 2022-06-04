<?php
include_once '../DB.php'; 

$domain=get_domain();
echo $domain."";

function test(){
	echo $_SERVER['REQUEST_URI'];
}

function getPrev(){
	return $_SERVER['HTTP_REFERER'];
}
////////////////////////////////////////what about doctor signup

//echo getPrev();
if(getPrev() == $domain."login.php"){
	if(!isset($_SESSION)){
		session_start();
	}
	$message;//sent message to destination page
	$goto;//destination page
	//check if data entered
	if(isset($_POST["email"]) && isset($_POST["password"]) ){
		$email = Clear($_POST["email"]);
		$password = Clear($_POST["password"]);
	//check email if exist
		if(is_user_email_exist($email)){
	//check if the login user password is correct
			if(check_password($email,$password)){
				//the info are correct
	//check if the user want to be rememberd and save it
			//if cookies
			if( isset($_POST["accept"])){
				setcookie ("loged",true,time()+ (365 * 24 * 60 * 60),'/');
				setcookie ("email",$email,time()+ (365 * 24 * 60 * 60),'/');
				echo "user choosed cookies";
			}//if session
			else{
				$_SESSION['loged'] = true;
				$_SESSION['email'] = $email;
				echo "user choosed session";

			}

				//send a page success message
				$message['text'] = 'تم تسجيل الدخول بنجاح';
				$message['status'] = 'success';//warning,fail,success,info
				$message['isset'] = true;
				$goto = '../wall.php';

		//display messages if login fail
			}else{
				$message['text'] = 'كلمة المرور غير صحيحة';
				$message['status'] = 'warning';//warning,fail,success,info
				$message['isset'] = true;
				$goto = $_SERVER['HTTP_REFERER'];

			}	
		}
		else{//if the email is not exist
			$message['text'] = 'البريد الالكتروني غير موجود';
			$message['status'] = 'warning';//warning,fail,success,info
			$message['isset'] = true;
			$goto = $_SERVER['HTTP_REFERER'];

		}
	//send a message of successfull login to the wall page
	}else{
		$message['text'] = 'الرجاء ادخال بيانات صحيحة!';
		$message['status'] = 'fail';//warning,fail,success,info
		$message['isset'] = true;
		$goto = $_SERVER['HTTP_REFERER'];
	}
	$_SESSION['msg'] = $message;

	//go to the next page
	if(isset($_POST['link'])){{//if there was an article opened 
		header('Location: '.$_POST['link']);
		exit();

	}else{// else go to the main page
		header('Location: '.$goto);
		exit();
	}

//////////////////////////////////////////////////

}else if(getPrev() == $domain."SignUp-User.php"){
	if(!isset($_SESSION)){
		session_start();
	}
	$message;//sent message to destination page
	$goto;//destination page
	if(isset($_POST["normal"])){//if normal user
		//if(isset(var))
		$fname = Clear($_POST["fname"]);//get data
		$lname = Clear($_POST["lname"]);
		$email = Clear($_POST["email"]);
		$password = Clear($_POST["password"]);

		if( !isset($_SESSION['loged']) || $_SESSION['loged']== false ){
		if(!is_user_email_exist($email)){//make sure user not exist
			if(register_new_user($fname, $lname, $email, $password)){//make sure data entered to the database
				if(!isset($_SESSION)){
					session_start();
				}
				$_SESSION['loged'] = true;
				$_SESSION['email'] = $email;
				//send a page message
				$message['text'] = 'تم تسجيل حسابك بنجاح';
				$message['status'] = 'success';//warning,fail,success,info
				$message['isset'] = true;
				$goto = '../wall.php';
				//exit();
			}
			//when fail messages...
			else{
				$message['text'] = 'حدث خطأ أثناء عملية التسجيل!';
				$message['status'] = 'warning';//warning,fail,success,info
				$message['isset'] = true;
				$goto = $_SERVER['HTTP_REFERER'];

			}
		}else{
			$message['text'] = 'البريد الالكتروني بالفعل مسجل!';
			$message['status'] = 'fail';//warning,fail,success,info
			$message['isset'] = true;
			$goto = $_SERVER['HTTP_REFERER'];
				//exit();
		}
	}else{
			$message['text'] = 'انت مسجل الدخول';
			$message['status'] = 'success';//warning,fail,success,info
			$message['isset'] = true;
			$goto = '../';

	}
	
	}else{
			$message['text'] = 'الرجاء ادخال بيانات صحيحة!';
			$message['status'] = 'fail';//warning,fail,success,info
			$message['isset'] = true;
			$goto = $_SERVER['HTTP_REFERER'];
				//exit();
		}
		$_SESSION['msg'] = $message;
//		print_r($_SESSION);

		//to go to the next page
		if(isset($_POST['link'])){//if there was an article opened 
			header('Location: '.$_POST['link']);
			exit();

		}else{// else go to the main page
			header('Location: '.$goto);
			exit();
		}
		// logout order
}if(isset($_GET["logout"])){
	if(!isset($_SESSION)){
                        session_start();
       }
		$message['text'] = 'لم تسجل دخولك بعد';
		$message['status'] = 'warning';//warning,fail,success,info
		$message['isset'] = true;
		//empty session
	if(isset($_SESSION)){
		print_r($_SESSION);
		session_unset();
		$message['text'] = 'تم تسجيل الخروج من حسابك';
		$message['status'] = 'info';//warning,fail,success,info
		$message['isset'] = true;
	echo"logout completed <br>";

	}//empty cookies
	if(isset($_COOKIE["loged"]) && ($_COOKIE["loged"]==true)){
		echo "cookies".$_COOKIE["loged"]."<br>";

	    unset($_COOKIE['loged']);
		unset($_COOKIE['email']);

		setcookie ("loged",false,time()-3600,'/');
		setcookie ("email","",time()-3600,'/');
		$message['text'] = 'تم تسجيل الخروج من حسابك.';
		$message['status'] = 'info';//warning,fail,success,info
		$message['isset'] = true;
			echo"logout completed cookies <br>";

 
	}
	
	//send message;
	if(!isset($_SESSION)){
	session_start();
	}
	$_SESSION['msg'] = $message;
	echo"logout completed";
	header('Location: ../index');
return true;
	exit();
}else{
	header('Location: ../error404');
	exit();

}
