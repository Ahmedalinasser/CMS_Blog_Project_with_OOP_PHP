<?php 

class DB {

public $connection ;

public function DB_connection(){
$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($this->connection->connect_error) {
	die(" The Database Connection has FAILD ".$this->connection->connect_error);
}
}
public function __construct(){
	$this->DB_connection();
}

public function query($query){
	$result = $this->connection->query($query);
	self::error_check($result);
	return $result;
}

public function error_check($result){
	if (!$result) {
		die( " Query Has FAILD ! " . $this->connection->error);
	}
}
public function real_escape_string($string){
	$escaped = $this->connection->real_escape_string($string);
	return $escaped;
}



public function getting_id (){

	return mysqli_insert_id($this->connection);
}



}
 
$DB  = new DB();

























// Class Ends HERE //
 ?>