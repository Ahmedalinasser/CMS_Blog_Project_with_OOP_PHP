
<?php 


// class Session{

// private $loged_in = false;
// public  $user_id;
// public  $message;



// public function __construct(){
// 	session_start();
// 	$this->check_logedIn();
// 	$this->check_message();
// }

// public function logout(){
// 	unset($this->user_id);
// 	unset($_SESSION["user_id"]);
// 	$this->loged_in = false;
// }

// public function is_loged_in(){
// 	return $this->loged_in;
// }
// public function login($user){
// 	if ($user) {
// 		$this->user_id = $_SESSION["user_id"] = $user->id;
// 		$this->loged_in = true; 
// 	}
// }

// private function check_logedIn(){
// 	if (isset($_SESSION["user_id"])) {
// 		$this->user_id = $_SESSION["user_id"];
// 		$this->loged_in =true;
// 	}else{
// 		unset($this->user_id);
// 		$this->loged_in = false;
// 	}

// }

// public function message ($msg=""){
// 	if (!empty($msg)) {
// 		$_SESSION["message"] = $msg;
// 	}else{
// 		return $this->message;
// 	}
// }
 
//  private function check_message (){
//  	if (isset($_SESSION["message"])) {
//  		$this->message = $_SESSION["message"];
//  		unset($_SESSION["message"]);
//  	}else{
//  		$this->message = "";
//  	}
//  }



///////////////////////////////////////////////////////////////////////////////////////////////////





class Session{


public  $user_id;
private $loged_in = false;
public  $message;
public  $count ;

public function __construct(){
	session_start();
	$this->loginChecker();
	$this->message();
	$this->view_count();
}

public function view_count(){
	if (isset($_SESSION["count"])) {
		return $this->count = $_SESSION["count"]++;
	}else{
		return $_SESSION["count"] = 0;
	}
}
public function login($user){
	if ($user) {
	$this->user_id = $_SESSION["user_id"] = $user->id;
	$this->loged_in = true;
	}
}
public function logout(){
	unset($this->user_id);
	unset($_SESSION["user_id"]);
	$this->loged_in = false;
}
public function is_logedIn(){
	return $this->loged_in;
}
private function loginChecker(){
if (isset($_SESSION["user_id"])) {
	$this->user_id = $_SESSION["user_id"];
	$this->loged_in = true;
	}else{
		unset($this->user_id);
		$this->loged_in = false ;
	}
}
public function message ($msg=""){
	if (!empty($msg)) {
		$_SESSION["message"] = $msg;
	}else{
		return $this->message;
	}
}
 private function check_message (){
 	if (isset($_SESSION["message"])) {
 		$this->message = $_SESSION["message"];
 		unset($_SESSION["message"]);
 	}else{
 		$this->message = "";
 	}
 }
















}
// }
$session = new Session();


 ?>