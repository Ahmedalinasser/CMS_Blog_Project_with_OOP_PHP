<?php 


class Session{
	public  $user_id ;
	private $logged_in = false ;
	public  $message ;

	public function __construct (){
		session_start();
		$this->login_checker();

	}

public function login($user){
	if ($user) {
	$this->user_id = $_SESSION["user_id"] = $user->id;
	$this->logged_in = true;
	}
}

public function logout(){
	unset($this->user_id);
	unset($_SESSION["user_id"]);
	$this->logged_in = false ;	
}

public function isLoggedIn(){
	return $this->logged_in ;
}

private function login_checker(){
	if (isset($_SESSION["user_id"])) {
		$this->user_id = $_SESSION["user_id"];
		$this->logged_in = false ;
	}else{
		unset($_SESSION["user_id"]);
		$this->logged_in = false;
	}
}



}




/////////// END OF CLASS /////////////
}




class Session {

public $uid ;
private $logged_in = false;

public function __construct( ){
	session_start();

}


public function login($user){
	if ($user) {
		$this->uid = $_SESSION["user_id"] = $user->id;
		$this->logged_in = true; 
	}
	
}

public function logout (){

	unset($this->uid);
	unset($_SESSION["user_id"]);
	$this->logged_in = false ;
}

public function logedin(){
	return $this->logged_in;
}
 private function login_checker (){
 	if ($_SESSION["user_id"]) {
 		$this->uid = $_SESSION["user_id"];
 		$this->logged_in = true;
 	}else{
 		unset($_SESSION["user_id"]);
 		$this->logged_in = false ;
 	}

 }










////////////////// END OF THE CALSS  ////////////////
}





















class Session {

public 	$user_id ;
private $loged_in;


public function __construct(){
	session_start();

}

public function login ($user){

	if ($user) {
		$this->user_id = $_SESSEION["userID"] = $user->id ;
		$this->loged_in = true ;	
	}
}

public function logout(){

	unset($_SESSION["userID"]);
	unset($this->user_id);
	$this->loged_in = false;
}


public function loged_in (){
	return $this->loged_in;
}

private function login_checker (){

	if ($_SESSION["userID"]) {
		$this->user_id = $_SESSION["userID"];
		$this->loged_in = true;
	}else{

		unset($_SESSION["userID"]);
		$this->loged_in = false;
	}



}

//////////////////////// END OF CLASS /////////////////////////////
}





require_once("header.php");

if ($session->loged_in()) {
	redirect("index.php");
}

if (iseet($_SESSION["submite"])) {
	$username = trim($_SESSION["username"]);
	$password = trim($_SESSION["password"]);
}

$the_user = User::confirm_usre_info( $username, $password);

if ($the_user) {
	$session->login($the_user) ;
	redirect("index.php");
}else{

	$message = "please enter user and password "
}

$username = "";
$password = "";
$message  = "";



	require_once("header.php");
	if ($session->loged_in()) {
		redirect("index.php");
	}


	if (iseet($_SESSION["submite"])) {
		$username = tirm($_SESSION["username"]);
		$password = tirm($_SESSION["password"]);

		$the_user = User::confirm_usre_info($username , $password);

		if ($the_user) {
			$session->login($the_user);
			$
			redirect("index.php");
		}else{
			$message = "please Enter correct user or password";
		}
	}



public static function confirm_user_info ($username, $password){
	global $DB;
	$username = $DB->escaped($username);
	$password = $DB->escaped($password);

	$sql = "SELECT * FROM " . static::$DB_tableName . " WHERE username = '{$username}' AND password = '{$password}'";
	$out_put = self::valid_query($sql);
	return !empty($out_put)? array_shift($out_put):flase;


}



public static function confirm_user_info ($username ,$password){
	global $DB ;
	$username = $DB->escaped($username);
	$password = $DB->escaped($password);

	$sql = "SELECT * FROM " . static::$DB_tableName . " WHERE username = '{$username}' password = '{$password}'";
	$out_put = self::valid_query($sql);
	return !empty($out_put)? array_shift($out_put): flase;

}

///in the index page ////
if (!$session->loged_in()) {
	redirect("login.php");
}



$session->logout();
redirect("login.php");








?>

<?php 


class Session {

	public $user_id ;
	private $loged_in = false ;


	public function __construct (){
		session_start();
	}


	public function login($user){
		if ($user) {
			$this->user_id = $_SESSEION["userID"] = $usre->id ;
			$this->loged_in= true;
		}
		
	}

	public function logout(){
		unset($_SESSEION["userID"]);
		unset($this->user_id);
		$this->loged_in = false ;
	}

	public function is_loged_in(){
		return $this->loged_in ;
	}

	private function login_checker(){
		if (isset($_SESSEION["userID"])) {
			$this->user_id = $_SESSEION["userID"];
			$this->loged_in = true ;
		}
	}


/////// END ///////
}


require_once("header.php");

if ($session->is_loged_in()) {
	redirect("index.php");
}

if (isset($_SESSEION["submite"])) {
	$username = tirm($_SESSEION['username']);
	$password = tirm($_SESSEION["password"]);

	$the_user = User::confirm_user_info($username , $password);

	if ($the_user) {
		$session->login($the_user);
		redirect("index");
	}else{
		$message = "please encter passe or usernawm right";
	}

	$username = "";
	$password = "";
	$massge = "";
}

public static function confirm_user_info ($username,$password){
global$DB; 
$username = $DB->escpaed($username);
$password = $DB->escpaed($password);

$sql = "SELECT * FROM " . static::$DB_tableName ." WHERE username = '{$username}' password = '{$password}'";
$out_put = self::valid_query($sql);
return !empty($out_put)?array_shift($out_put):flase;

}

require_once ("header.php");
$session->logout();
redirect("login.php");

if (!$session->is_loged_in()) {
	redirect("login.php");
}


 ?>


 <?php 


class C_methods {


public static function valid_query ($sql){

	global $DB;
	$out_put = $DB->query($sql);
	$array_of_objects = array();
	while ($row = mysqli_fetch_array($out_put)) {
		$array_of_objects [] = $this->instantiation($row);
	}
	return $array_of_objects ;
}


public static function select_all (){
	global $DB; 
	return static::valid_query("SELECT * FROM " . static::$table_name . "");
} 


public static function select_by_id($id){
	global $DB;
	$sql = static::valid_query("SELECT * FROM " . static::$table_name . " WHERE id = '{$id}'");
	return !empty($sql)? array_shift($sql) : false; 

}


public static function instantiation($record){
	$called_class = get_called_class($this);
	$instance = new $called_class;
	foreach ($record as $obj_key => $obj_value) {
		if ($instance->has_obj_key()) {
			$instance->$obj_key = $obj_value;
		}
	}
	return $instance;
}


public function has_obj_key($keys){
	$class_properties = get_object_vars($this);
	return array_key_exists($keys, $class_properties);
}

public function class_properties(){
	$class_prop = array() ;
	foreach ( static::$table_props as $table_prop) {
		if (property_exists($this,$table_prop)) {
			$class_prop [$table_prop] = $this->$table_prop;
		}
			
	}
	return $class_prop ;
}


public function clean_properties(){
	global $DB;
	$clean_prop = array();
	foreach ($this->class_properties() as $obj_keys => $obj_values ) {
		$clean_prop [$obj_keys] = $DB->escaped($obj_values);
	}
	return $clean_prop;
}


public function create (){
	global $DB;
	$class_properties = $this->clean_properties();
	$sql  = "INSERT INTO " . static::$table_name . " ( " . implode(",", $class_properties) . " ) ";
	$sql .= " VALUES (' " . implode("','", $class_properties) . "')";
	
	if ($DB->query($sql)) {
		$this->id = $DB->getting_id();
		return true;
	}else{
		return false;
	}
}


public function update (){
	global$DB;
	$class_properties = $this->clean_properties();
	$separeted_porp = array();
	foreach ($class_properties as $key => $value) {
		$separeted_porp [] = " {$key} = '{$value}'";
	}

	$sql  = "UPDATE " . static::$table_name . " SET";
	$sql .= implode(",", $separeted_porp) . " LIMIT 1";
	$DB->query($sql);
	return (mysqli_affected_rows($DB->connection) == 1)?true:flase;
}


public function delete($id){
	global$DB;
	$sql = " DELETE FROM " . static::$table_name . " WHERE id = " . $DB->escaped($id);
	$DB->query($sql);
	return (mysqli_affected_rows($DB->connection) ==1)? true : false;
}

public function save (){
	return isset($this->id)? $this->update() : $this->create();
}


}
///////// END //////////

///////// Start difine /////////////

define("DB_HOST",	 "localhost");
define("DB_USER", 	 "root");
define("PASSWORD",	 "");
define("DB_NAME", 	 "DB_photo");

/////////END of difine ////////////
class DB{
public $connection ;

public function DB_connection(){
	$this->connection = new mysql(DB_HOST , DB_USER , PASSWORD , DB_NAME );
	if ($this->connection->connect_error) {
		die("this connection has faild " . $this->connection->connect_error)
	}
}

public function query($sql){
	$result = $this->connection->query($sql);
	$this->query_check($result);
	return $result;
}

private function query_check($result){
	if (!$result) {
		die("this query has faild " . $this->connection->error);
	}
}


public function escaped($string){
	return $this->connection->real_escape_string($string);
}

public function getting_id(){
	return mysql_insert_id($this->connection);
}

////////////// END of calss	///////////////
}

$DB = new class DB();



class Session {

public $user_id ;
public $loged_in = false ;

public function __construct(){
	session_start();
}

public function login($user){
	if ($user) {
		$this->user_id = $_SESSEION["userid"] = $user->id;
		$this->loged_in = true;
	}
}

public function logout(){
	unset($this->$_SESSEION["userid"]);
	unset($this->user_id);
	$this->loged_in = false;
}

public function is_loged_in (){
	return $this->loged_in;
}

private function login_checker(){
	if (isset($_SESSEION["userid"])) {
		$this->user_id = $_SESSEION["userid"];
		$this->loged_in = true;
	}else{
		unset($_SESSEION["userid"]);
		$this->loged_in = false;
	}
}


////////////END OF classs
}
 $session = new Session();


// login page

require_once("header.php");
if ($session->is_loged_in()) { redirect("index.php"); }


if ($_SESSEION["submite"]) {
	$username = trim($_SESSEION["username"]);
	$password = trim($_SESSEION["password"]);

	$the_user = User::confirm_user_info($username , $password);

	if ($the_user) {
		$session->login($the_user);
		redirect("index.php");
	}else{
		$message = " Please enter the correct username OR password ";
	}else{

	 $username	= "";	
	 $password 	= "";
	 $message	= "";

	}
 }	
// login page

// User class 
class User {

public static $table_name = "users";
public static $table_props = array ("id","username","password","first_name","last_name");

public $id;
public $username;
public $password;
public $first_name;
public $last_name;



public static function confirm_user_info($username , $password){
	global $DB;
	$username = $DB->escaped($username);
	$password = $DB->escaped($password);
	$sql = "SELECT * FROM " . self::$table_name . " WHERE $username = '{$username}' AND password = '{$password}'";
	$out_put = $DB->query($sql);
	return !empty($out_put)? array_shift($out_put) : false;

}



}
// User class

//logout page

require_once("header.php");

$session->logout();
redirect("login.php");

//logout page

// index.php

if (!$session->is_loged_in()) {
	redirect("login.php");
}
// index.php

  ?>

<?php 

class Photo extends Common_methods {

	public static $DB_tableName = "photo";
	public static $DB_tableName_field = array("id","title","describtion","caption","alternate_taxt","filename","size","type"); 


	public $id; 
	public $title; 
	public $describtion; 
	public $caption; 
	public $alternate_taxt; 
	public $filename; 
	public $size; 
	public $type; 

	public $tmp_path;
	public $upload_directory = "images";

	public $errors = array();
	public $upload_error_array= array(
    UPLOAD_ERR_OK           =>  "there is no error.",
    UPLOAD_ERR_INI_SIZE     =>  "the uploaded file exceeds the upload_max_filesize directive.",
    UPLOAD_ERR_FORM_SIZE    =>  "the uploaded file exceeds the UPLOAD_ERR_FORM_SIZE directive that.",
    UPLOAD_ERR_PARTIAL      =>  "the uploaded file was only partially uploaded. ",
    UPLOAD_ERR_NO_FILE      =>  "no file was uploaded .",
    UPLOAD_ERR_NO_TMP_DIR   =>  "missing a temporary folder.",
    UPLOAD_ERR_CANT_WRITE   =>  "failed to write file to disk.",
    UPLOAD_ERR_EXTENSION    =>  "A PHP extension stopped  the file upload.",);
 



	public function set_file($file){

		if (empty($file) || ! $file || ! is_array($file)) {
			$this->errors[] = "you have uploaded empty file....";
			return false;
		}elseif ($file["error"] !=0 ) {
			$this->errors [] = $this->upload_error_array[$file["error"]];
			return false; 
		}else{
			$this->filename =  basename($file["name"]) ;
			$this->tmp_path = $file["tmp_path"];
			$this->type = $file["type"];
			$this->size = $file["size"];
		}
	}


	public function save(){

		if ($this->id) {
			
			$traget_path = SITE_ROOT . PS . $this->upload_directory .PS.$this->filename;
			
			if (file_exists($this->filename)) {
				$this->errors [] = " this file is exists...";
				return false;
			}

			if (move_uploaded_file($this->filename, $traget_path )) {
				$this->update();
			}

		}else{

			if (!empty($this->errors)) {
				$this->errors[] = "An error hapened....";
				return false;
			}
			if (empty($this->filename) || empty($this->tmp_path)) {
				$this->errors [] = "Please enter the required filds....";
				return flase;
			}

			$taregt_path = SITE_ROOT .PS. $this->upload_directory .PS. $this->filename; 

			if (file_exists($this->filename)) {
				$this->errors [] = " this file is exists...";
				return fals
			}

			if (move_uploaded_file($this->filename, $taregt_path)) {
				if ($this->update()) {
					unset($this->tmp_path);
					return true;
				}
			}

		}

	}


	public function delete_photo(){

		if ($this->delete()) {
			$taregt_path = SITE_ROOT .PS. $this->upload_directory .PS. $this->filename; 
			return unlink($traget_path)? true: flase;
		}else{
			return false;
		}
	}



	if (empty($_GET["id"])) {
			redirect("photo.php");
	}else{

		$photo = Photo::select_by_id($_GET["id"])
	if (iseet($_POST["update/create"])) {
			if ($phototo) {
				$photo->X = $_POST["X"];
			}

		}
	}


	if (empty($_GET["id"])) {
		redirect("photo.php")
	}else{

	$photo = Photo::selectById($_GET["id"]);	
	if (isset($_POST["update"])) {
		if ($photo) {
			$photo->x = $_POST["X"]
			
		}
	}

	}









	///////// ENF of Class 
}


 ?>



<?php 

class Comment extends Common_methods{

static public $DB_tableName = "comment"; 
static public $DB_tableName_field = array("id","photo_id","author","body");

public  $id;
public 	$photo_id;
public 	$author;
public 	$body;


public static function  create_comment ($photo_id , $author , $body ){

$comment = new Comment();
if (!empty($this->photo_id) && !empty($author) && !empty($body)) {
	$this->photo_id = $photo_id;
	$this->author = $author;
	$this->body = $body;

	return $comment;
}else{

	return false;
}


}






}
?>

<?php 

class Comment {

public static $DB_tableName = "comments";
public static $DB_tableName_field = array( "photo_id","author","body" );		

public $photo_id;
public $author;
public $body;


public static function create_comment( $pic_id , $author, $body){

	$comment = new Comment();

	if (empty($pic_id) && empty($author) && empty($body)) {

	$comment->pic_id = $photo_id;
	$comment->author = $author;
	$comment->body = $body;
}

return $comment ;
}
public static function allComments (){
	global $DB;
	$sql  = "SELECT * FROM " .self::$DB_tableName ;
	$sql .= " WHERE photo_id = {$pic_id} ORDER BY photo_id ASC";
	return self::passQuery($sql);

}



/////// END of the class 
}

///// we need to include INIT.PHP page in order to get and use our calss in photo.php

require_once("admin/include/init.php");



if (empty($_GET["id"])) {
	redirect("index.php");
}


$photo = Photo::selectById($_GET["id"]);

if (isset($_POST["submit"]))	 {
	
	$author= trim($_POST["author"]);
	$body= trim($_POST["body"]);
	$new_comment = Comment::create_comment($photo->id , $author, $body);
	if ($new_comment && $new_comment->save_general()) {
		
		redirect("photo.php?id={$photo->id}");		
	}else {
		$message = "saving the docu has faild";
	}else{
		$author="";
		$body="";
	}
}


$comments = Comment::allComments();


foreach ($comments as $comment):


echo $comment->author;
echo $comment->body;

endforeach;


 ?>


<?php 


define("DB_HOST", "localhost");
define("DB_USER" , "root");
define("DB_PASSWORD","");
define("DB_NAME","gallery");


class DB{
public $connection ;


public function DB_connection (){
	$this->connection = new mysqli (DB_HOST , DB_USER , DB_PASSWORD , DB_NAME);
	if ($this->connection_connect_error) {
		die ("The DataBase has faild to connect...... please check for the connection .....".$this->connection->connect_error);
	}
}


public function __construct{
	$this->DB_connection();
}


public function queryConnect($sql){

	$out_put = $this->connection->query($sql);
	$this->checkError($out_put);
	return $out_put;
}

private function checkError($out_put){
	if (!$out_put) {
		die ("The query has FAILD Please check the syntax ....." . $this->connection->error);
	}
}

public function escaped($string){

	$out_put = $this->connection->real_escape_string($string);
	return $out_put ;	
}


public function getting_id(){

	return mysqli_insert_id($this->connection);
}


/////////////// END OF CLASS.........
}

$DB = new DB();


class CommonMethods{


public static function passQuery($sql){
	global $DB ;
	$out_put = $DB->queryConnect($sql);
	$arrayOfObjects = array();
	while ($row = mysqli_fetch_array($out_put)) {
		$arrayOfObjects [] = static::instantiation($row);
	}
	return $arrayOfObjects;
}


public static function selectAlll(){
	global $DB;
	$sql = "SELECT * FROM ". static::$classFeilds ;
	return = static::passQuery($sql);

}

public static function selectById($id){
	global $DB;
	$out_put = static::passQuery("SELECT * FROM ". static::$classFeilds ." WHERE id = {$id} ");
	return !empty($out_put)? array_shift($out_put) : false; 
}


public function instantiation ($record){

	$callingClass = get_called_class();
	$newObject = $callingClass;
	foreach ($record as $ob_porp => $values) {
		if ($newObject->propCheck($ob_prop)) {
			$newObject->$ob_prop = $values;
		}
	}
	return $newObject;

}

private function propCheck($prop){
	$objectProparties = get_object_vars($this);
	return array_key_exists($prop, $objectProparties);
}




public static function passQuery($sql)){
	global $DB;
	$out_put = $DB->query($sql);
	$array_of_objects = array();
	while ($row = mysqli_fetsh_array($out_put)) {
		$array_of_objects [] = static::instantiation($row);
	}
	return $array_of_objects;
}


public static function selectAlll(){
	global $DB;
	return static::passQuery("SELECT * FROM " .static::$DB_tableName." ");
}


public static function selectById($id){
	global$DB;
	$out_put = static::query("SELECT * FROM ". static::$DB_tableName . " WHERE id = {$id} ");
	return !empty($out_put)? array_shift($out_put):flase;
}

public static function instantiation($record){
	$calledClass = get_called_class($this);
	$newObject = $calledClass;
	foreach ($record as $classProp => $DB_values) {
		if ($newObject->has_prop($classProp)) {
			$newObject->$classProp = $DB_values;
		}
	}
	return $newObject;
}

private function has_prop ($calssProp){

	$class_properties = get_object_vars($this);
	return array_key_exists($classProp, $class_properties);
}

public function class_properties(){
	$propertie = array();
	foreach (static::$DB_tableName_fields as $tableName_fields) {
		if (property_exists($this, $tableName)) {
			$propertie[$tableName] = $this->tableName;
		}
	}
	return $propertie;
}

protected function clean_properties(){
	global$DB;
	$clean_properties = array(); 
	foreach ($DB_tableName_fields as $key => $value) {
		$clean_properties[$key] = $DB->escaped($value);
	}
	return $clean_properties;
}

public function create(){

	global $DB;
	$prop = $this->clean_properties()
	$sql = "INSERT INTO " . static::$DB_tableName ." (". implode(",", array_keys($prop)) ") ";
	$sql.= "VALUES ('" . implode("', '", array_values($prop)) . "') ";
	
	return$DB->query($sql)? true ; false; 
}

public function update(){

	global$DB;
	$prop = $this->clean_properties();
	$separ_prop = array();
	foreach ($prop as $key => $value) {	$separ_prop [] = " {$key} = {$value}";	}

	$sql  = "UPDATE " .static::$DB_tableName. " SET ";
	$sql .= implode(",", $separ_prop);
	$sql .= " WHERE id = " . $DB->escaped($this->id). " LIMIT 1";
	$DB->query($sql);
	$this->id = $DB->getting_id();
	return (mysqli_affected_rows($DB->connection)==1)? true : false ;

}

public function delete(){

	global$DB;

	$sql  = "DELETE FROM " .static::$DB_tableName. "WHERE id= ".$DB->escaped($id)." LIMIT 1";
	$DB->query($sql);
	return (mysqli_affected_rows($DB->connection) == 1 )? true : false;

}



public function delete_photo(){

	if ($this->delete()) {
		$traget_path = SITE_ROOT .SP."admin".SP.$this->photo_path();
		return unlink($traget_path)? true:false;
	}else{
		return false;
	}
}

public function save(){
	return isset($id)? $this->update() : $this->create();
}

public function photo_path(){
	return $this->upload_directory.SP. $this->filename;
}

public function save_photo(){

	if ($this->id) {
			
			$traget_path = SITE_ROOT . SP. "admin".SP. $this->upload_directory .SP.$this->filename;

			if (file_exists($traget_path)) {
				$this->errors[]= " this file is already exists....... ";
				return false;
			}
			if (move_uploaded_file($tmp_path, $taregt_path)	) {
				if ($this->update()) {
					unset($this->tmp_path);
					return true;
				}
			}
	}else{

		if (empty($this->filename) || empty($tmp_path)) {
			$this->errors[] = "the fields is empty ..............";
			return false;
		}
		if (!empty($this->errors[])) {
			return false;
		}

		if (file_exists($traget_path)) {
			$this->errors[]= "this file is already exists ";
		}

		$traget_path = SITE_ROOT .SP."admin".SP. $this->upload_directory .SP. $this->filename;

		if (move_uploaded_file($this->tmp_path, $traget_path)) {
				if ($this->create()) {
					unset($this->tmp_path);
					return true;
				}
		}
	}
}

public $errors = array(); // custome error we make 
public $upload_errors_array = array(
    UPLOAD_ERR_OK           =>  "there is no error.",
    UPLOAD_ERR_INI_SIZE     =>  "the uploaded file exceeds the upload_max_filesize directive.",
    UPLOAD_ERR_FORM_SIZE    =>  "the uploaded file exceeds the UPLOAD_ERR_FORM_SIZE directive that.",
    UPLOAD_ERR_PARTIAL      =>  "the uploaded file was only partially uploaded. ",
    UPLOAD_ERR_NO_FILE      =>  "no file was uploaded .",
    UPLOAD_ERR_NO_TMP_DIR   =>  "missing a temporary folder.",
    UPLOAD_ERR_CANT_WRITE   =>  "failed to write file to disk.",
    UPLOAD_ERR_EXTENSION    =>  "A PHP extension stopped  the file upload.",);

public function set_file($file){
	if (empty($file) || !$file || !is_array($file)) {
		
		$this->errors[]=" faild in uploading the file............ ";
		return false;
	}elseif ($file['error'] !=0) {
		$this->errors[]= $this->upload_errors_array[$file['errors']];
	}else{
		$this->filename= basename($file['filenmae']);
		$this->tmp_path = $file['tmp_path'];
		$this->size = $file['size'];
		$this->type = $file['type'];
	}

}


public function count_all(){}






public function class_properties(){
	$class_prop = array();
	foreach (static::$DB_tableName_fields as $tableName_fields) {
		$class_prop[$tableName_fields] = $this->$tableName_fields;
	}
	return $calssProp;
}

protected function clean_properties(){
	global $DB;
	$clean_prop = array();
	foreach ($DB_tableName_fields as $key => $value) {
		$clean_prop[$key] = $DB->escaped($value);
	}
	return $clean_prop;
}


public function update (){

	global$DB;
	$clean_prop = $this->clean_properties();
	$separ_prop = array();
	foreach ($clean_prop as $key => $value) {
		$separ_prop [] = " {$key} = {$value} "; 
	}
	$sql  = "UPDATE " .static::$DB_tableName. " SET";
	$sql .= implode(",", $separ_prop) . " WHERE id = ".$DB->escaped($id)." LIMIT 1";
	$DB->query($sql);
	$this->id = $DB->getting_id();
	return (mysqli_affected_rows($DB->connetion) ==1 )? true : false ;
}

//////////////////// END OF THE CLASS ********************
}

public static function passQuery($sql){
	global$DB;
	$out_put = static::query($sql)
	$newObject= array();
	while ($row = mysqli_fetsh_array($out_put)) {
		$newObject[]= static::instantiation($row);
	}
	return $newObject;
}
////////////
public static function select_all(){
	global$DB;
	return static::passQuery("SELECT * FROM tablename");
}
////////////
public static function selectById($id){
	global$DB;
	$sql = "SELECT * FROM tablename WHERE id = {$id} ";
	$out_put = static::passQuery($sql);
	return !empty($out_put)? array_shift($out_put): false;
}
////////////
public static function instantiation($record){
	$calledClass = get_called_class($this);
	$newObject = $calledClass;
	foreach ($record as $key => $value) {
		if ($newObject->has_prop()) {
			$newObject->$key = $value;
		}
	}
	return $newObject;
}
////////////
private function has_prop($prop_key){
	$properties= get_class_vars($this);
	return array_key_exists( $prop_key, $properties)()	
}
///////////
public function class_prop(){
	$class_properties = array() 
	foreach (static::$DB_tableName_fields as $tableName_fields) {
		if (property_exists($this, $tableName_fields)) {
			$class_properties [$tableName_fields] = $tableName_fields;
		}
	}
	return $class_properties;
}
//////////
public function clean_prop(){
	global$DB;
	$properties= $this->class_prop();
	$clean_prop = array();
	foreach ($properties as $key => $value) {
		$clean_prop[$key] = $DB->escaped($value);
	}
	return $class_prop;
}
//////////
public function create(){
	global$DB;
	$properties = $this->clean_prop();
	$sql  = "INSERT INTO ". static::$DB_tableName ;
	$sql .= " (". implode(",", array_keys($properties)).") ";
	$sql .= "VALUES ('".implode("', '", array_values($properties)).")"
	return $DB->query($sql)? true : false;
}
//////////
public function update(){
	global$DB;
	$properties = $this->clean_prop();
	$separeted_porps = array();
	foreach ($properties as $key => $value) {
		$separeted_porps[] = "{$key} = {$value}";
	}
	$sql  = "UPDATE " .static::$DB_tableName." SET ";
	$sql .= "('" .implode("', '", $separeted_porps)."')";
	$DB->query($sql);
	$this->id = $DB->getting_id();
	return (mysqli_affected_rows($DB->connection) == 1)? true:false;
}
//////////
public function delete(){
	global$DB;
	$sql = "DELETE FROM ".static::$DB_tableName. " WHERE id = ".$DB->escpaed($id)." LIMIT 1";
	static::query($sql);
	return (mysqli_affected_rows($DB->connection) == 1)? true; flase;
}
//////////


public function passQuery(){}
public function passQuery(){}
public function passQuery(){}
public function passQuery(){}
public function passQuery(){}


defined("SP")? nunll : define("SP", DIRECTORY_SEPARATOR);
define("SITE_ROOT", 'D:'.SP.'Ahmed'.SP.'1-Web folder'.SP.'xammp_files'.SP.'htdocs'.SP.'Oops'.SP.'OOP CMS PROJECT'.SP.'photos');
defined("INCLUDES")?null : define("INCLUDES", SITE_ROOT.SP."admin"."includes");


?>


<?php 

class CM{


public static function passQuery ($sql) {

	global$DB;
	$arrayOfObjects = array();
	$out_put = $DB->query($sql);
	while ($row = mysqli_fetch_array($out_put)) {
		$arrayOfObjects[] = $this->instantiation($row);
	}
return $arrayOfObjects;
}


public static function selectAll (){

	global$DB;
	return static::passQuery("SELECT * FROM " . static::$DB_tableName );
}

public static function ($id){

	global$DB;
	$out_put = $DB->query("SELECT * FROM " . static::$DB_tableName . " WHERE id = ". $DB->escaped($id));
	return !empty($out_put)? array_shift($out_put): false;	
}

public  function  instantiation ($record){

	$calledClass = get_called_class($this);
	$newObject = $calledClass;
	foreach ($record as $key => $value) {
		if ($newObject->has_prop()) {
			$newObject->$key = $value
		}
	}
	return $newObject;
}

private  function  has_prop ($key){
	$objectProparties = get_object_vars($this);
	return array_key_exists($key , $objectProparties);
}

public  function class_properties (){

	$prop = array();
	foreach (static::$DB_tableName_fields as $tableName_fields) {
		if (property_exists($this, $tableName_fields)) {
			$prop [$tableName_fields] = $this->tableName_fields; 
		}
	}
	return $prop;

}

public  function clean_properties(){
	global$DB;
	$clean_prop = array();
	foreach (static::$DB_tableName_fields as $key => $value) {
		$clean_prop[$key] = $DB->escaped($value);
	}
	return $clean_prop;
}

public  function create (){
	global$DB;
	$properties = $this->clean_properties()
	$sql  = "INSERT INTO " . static::$DB_tableName . implode(",", array_keys($properties));
	$sql .= " VALUES ('" . implode("', '", array_values($properties))."')";
	return $DB->query($sql)? true: flase;
}

public  function update (){
	global$DB;
	$properties = $this->class_properties()
	$separeted_porps = array();
	foreach ($properties as $key => $value) {
		$separeted_porps [] = "{$key} = {$value}";
	}

	$sql  = "UPDATE " . static::$DB_tableName . " SET ";
	$sql .= implode(",", $separeted_porps) ." WHERE id= " .$DB->escaped($this->id). " LIMIT 1" ;
	$DB->query($sql);
	$this->id = $DB->getting_id();
	return (mysqli_affected_rows($DB->connection) == 1)?true: false;

}

public  function delete (){
	global$DB;
	$sql = "DELETE FROM " . static::$DB_tableName . " WHERE id = " .$DB->escaped($this->id). " LIMIT 1";
	$DB->query($sql);
	return (mysqli_affected_rows($DB->connection) ==1 )? true: flase;
}

public  function save(){
	return $this->id ? $this->update() : $this->create();
}

public $errors = array(); // custome error we make 
public $upload_errors_array = array(
    UPLOAD_ERR_OK           =>  "there is no error.",
    UPLOAD_ERR_INI_SIZE     =>  "the uploaded file exceeds the upload_max_filesize directive.",
    UPLOAD_ERR_FORM_SIZE    =>  "the uploaded file exceeds the UPLOAD_ERR_FORM_SIZE directive that.",
    UPLOAD_ERR_PARTIAL      =>  "the uploaded file was only partially uploaded. ",
    UPLOAD_ERR_NO_FILE      =>  "no file was uploaded .",
    UPLOAD_ERR_NO_TMP_DIR   =>  "missing a temporary folder.",
    UPLOAD_ERR_CANT_WRITE   =>  "failed to write file to disk.",
    UPLOAD_ERR_EXTENSION    =>  "A PHP extension stopped  the file upload.",);


public  function set_file ($file){

	if (empty($file) || !$file || !is_array($file)) {
		
		$this->errors[] = " error in uploaded file............... ";
		return false;		
	}elseif ($file('error') !=0 ) {
		$this->errors[]=$this->upload_error_array[$file['error']];
		return false;
	}else{
		$this->filename = basename($file["filename"]);
		$this->tmp_path = $file["tmp_path"];
		$this->type = $file["type"];
		$this->size = $file["size"];
	}

}


public  function save_photo(){

		
	if ($this->id) {
		$traget_path = SITE_ROOT . $this->photo_path();
		if (file_exists($this->filename)) {
				$this->errors[]= " this photo id already exists ........";
				return false;
			}	
		if (move_uploaded_file($this->tmp_path, $taregt_path)) {
				if ($this->upload()) {
					unset($this->tmp_path);
					return true;
				}
			}else{

				$traget_path = SITE_ROOT . $this->photo_path();

				if (empty($this->filename) || empty($this->tmp_path)) {
					$this->errors[]=" please enter the required filed .........";
					return false;
				}

				if (!empty($this->errors)) {
					return false;
				}

				if (file_exists($this->filename)) {
					$this->errors[]= " this photo id already exists ........";
					return false;
				}
				if (move_uploaded_file($this->tmp_path, $taregt_path)) {
					if ($this->create()) {
						unset($this->tmp_path);
						return true;	
					}
	}

}
// public  function delete_photo(){

// 	if ($this->delete()) {
// 			$traget_path = SITE_ROOT . $this->photo_path();
// 			return unlink($traget_path)? true: false;
// 		}else{
// 			return false 
// 		}
// }

public  function (){}
public  function photo_path(){
	return SITE_ROOT .SP. "admin" .SP. $this->upload_directory .SP. $this->filename ;

}
// public  function count_all(){ 
// global$DB;
// 	$sql = "SELECT COUNT(*) FROM " .static::$DB_tableName ;
// 	}

// }

public  function delete_photo(){

	if ($this->delete()) {
		$traget_path = SITE_ROOT .SP. $this->photo_path();
		return unlink($traget_path)? true: false?
	}
}

public  function count_all(){
		global$DB;
		$sql = "SELECT COUNT(*) FROM " . static::$DB_tableName ;
		$out_put = $DB->query($sql);
		$row = mysqli_fetch_array($out_put);
		return array_shift($row);

}
public  function class_properties (){
	
	$properties = array();
	foreach (static::$DB_tableName_fields as $tableName_fields) {
		if (property_exists($this, $tableName_fields)) {
			$properties[$tableName_fields] = $this->$tableName_fields;
		}
	}
	return $properties;
}
public  function clean_properties (){

	global$DB;
	$separeted_porps = array();
	foreach (static::$DB_tableName_fields as $key => $value) {
		$separeted_porps[$key] = $DB->escpaed($value);
	}
	return $separeted_porps;
}

//review them 

defined("SP")? null : define("SP",DIRECTORY_SEPARATOR);
define("SITE_ROOT", 'D:'.PS.'Ahmed'.PS.'1-Web folder'.PS.'xammp_files'.PS.'htdocs'.PS.'Oops'.PS.'OOP CMS PROJECT'.PS.'photos')
// defined("INCLUDES")? null : define("INCLUDES", );
 ?>

<?php 

class Session{


	public $user_id;
	public $loged_in = false;
	public $message;
	public $count;

	public __construct(){

		session_start();
			
	}

	public function login($user){
		if ($user_id) {
			
			$this->user_id = $_SESSEION["id"] = $user->id;
			$this->loged_in = true;
		}
	}
	public function logout(){

		unset($this->user_id);
		unset($_SESSEION["id"]);
		$this->loged_in = false;	
	}

	public function is_loged_in(){
		return $this->loged_in;
	}


	private function login_checker(){

		if (isset($_SESSEION["id"])) {
			$this->user_id = $_SESSEION["id"];
			$this->loged_in= true;
		}else{
			unset($this->user_id);
			$this->loged_in= false;
		}
	}
	public function message($smg=""){

		if (isset($_SESSEION["message"])) {
			$this->message = $smg;
		}else{

			return $this->message;	
		}

	}

	public function message_checker(){

		if (isset($_SESSEION["message"])) {

			$this->message = $_SESSEION["message"];
			unset($_SESSEION["message"]);
		}else{
			$this->message="";
		}
	}

	public function view_count(){}




	public function login($user){

		if ($user) {
			$this->user_id = $_SESSEION["id"] = $user->id;
			$this->loged_in= true;
		}
	}

	public $user_id;
	public $loged_in = false;
	public $message ;
	public $count;
	

public function __construct (){

	session_start();
}
public function  login ($user){
	if ($user) {
		$this->user_id = $_SESSEION["id"] = $user->id;
		$this->logedin = true;
	}
}

private function login_checker(){
	if (isset($_SESSEION["id"])) {
		$this->user_id = $_SESSEION["id"];
		$this->loged_in = true;
	}else{
		unset($_SESSEION["id"]);
		$this->loged_in = false;
	}
}

public function is_loged_in (){

	return $this->loged_in ;
}

public function logout(){

	unset($_SESSEION["id"]);
	unset($this->user_id);
	$this->loged_in = false;
}


///////// look at the message and message_checker () ....................
public function massage ($smg=""){

	if (!empty($message)) {
		$_SESSEION["message"] = $smg;
	}else{
		return $this->message;
	}
}



public function message_checker(){

	if (isset($_SESSEION["message"])) {
		
		$this->message = $_SESSEION["message"];
		unset($_SESSEION["message"]);
	}else{

		return $this->message = "";
	}
}

public function message($smg){

	if (!empty($smg)) {
		
		$_SESSEION["message"] = $smg;
	}else{
		return $this->message;
	}
}

public function message_checker(){

	if (isset($_SESSEION["message"])) {
		$this->message = $_SESSEION["message"];
		unset($_SESSEION["message"]);

	}else{
		$this->message = "";
	}
}



///////////// END CLASS OF SESSION ............
}

$se = new Session();


 ?>