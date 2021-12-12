<?php 

class User extends common_methods{



protected static $DB_tableName = "users";
protected static $DB_tableName_fields = array ("id","username","password","first_name","last_name","filename");

public $id;
public $username;
public $password;
public $first_name;
public $last_name;
public $filename;
public $upload_directory = "images";
public $image_placeholder = "images/phi.png";



public static function conferm_user_info($username , $password){
	global $DB;
	$username =  $DB->real_escape_string($username);
	$password =	 $DB->real_escape_string($password);

	$sql = "SELECT * FROM " . self::$DB_tableName . " WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
	$out_put = self::passQuery($sql);
	return !empty($out_put) ? array_shift($out_put) : false;
}


public function img_placeholder(){
	return empty($this->filename)? $this->image_placeholder : $this->upload_directory.PS. $this->filename;
}

// public function image_and_placeholder(){
// 	return empty($this->image)? $this->image_placeholder : $this->upload_directory . PS . $this->image ;
// }




//End of the Class HERE //
}




 ?>