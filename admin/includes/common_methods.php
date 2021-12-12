<?php 

class Common_methods{



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




public static function passQuery ($query){
	global $DB ; 
	$out_put = $DB->query($query);
	$objectArray = array();
	while ($row = mysqli_fetch_array($out_put)) {
		$objectArray[] = static::instantiation($row);
	}
	return $objectArray;
}

public static function selectAll (){
	global $DB ;
	return static::passQuery("SELECT * FROM " . static::$DB_tableName . ""); 
}

public static function selectById ($id){
	global $DB ; 
	$out_put = static::passQuery("SELECT * FROM ". static::$DB_tableName . " WHERE id = {$id} ");
	return !empty($out_put) ? array_shift($out_put) : false ;
}

public function instantiation ($the_record){
	$called_class = get_called_class();
	$newObject = new $called_class;
	foreach ($the_record as $ob_prop => $value) {
		if ($newObject->has_ob_prop($ob_prop)) {
				$newObject->$ob_prop = $value ;  		
		}	
	}
	return $newObject;
}

private function has_ob_prop ($ob_prop){
	$objectProperities = get_object_vars($this);
	return array_key_exists($ob_prop, $objectProperities);
}




public function class_prop (){
	$properties= array();
	foreach (static::$DB_tableName_fields as $tableNameFields) {
		
		if(property_exists($this, $tableNameFields)){
			$properties [$tableNameFields] = $this->$tableNameFields;
			
		}
	}
	return $properties;
}


protected function clean_properties(){
	global $DB;
$clean_prop = array();
foreach ($this->class_prop() as $key => $value) {
	$clean_prop[$key] = $DB->real_escape_string($value);
}
return $clean_prop;
}

public function create (){
	global$DB;

	$property = $this->clean_properties();

	$sql = "INSERT INTO " . static::$DB_tableName . " (" .implode(",", array_keys($property)). ") ";
	$sql .="VALUES ('".implode("', '", array_values($property))."') "; 

	if ($DB->query($sql)) {
		
		return true;
	}else{
		return false;
	}
}


public function update(){
global$DB;
	$properties = $this->clean_properties();
	$properties_sepated = array();
	foreach ($properties as $key => $value) {
		$properties_sepated [] = "{$key} = '{$value}'";
	}

	$sql  = "UPDATE " . static::$DB_tableName . " SET ";
	$sql .= implode(",",$properties_sepated);
	$sql .= "WHERE id=".$DB->real_escape_string($this->id)." LIMIT 1";
	$DB->query($sql);
	$this->id = $DB->getting_id();

	return (mysqli_affected_rows($DB->connection)==1)? true : false ;

}


public function delete (){
	global$DB;

	$sql = "DELETE FROM " . static::$DB_tableName . " WHERE id =". $DB->real_escape_string($this->id)." LIMIT 1" ;
	$DB->query($sql);
	return (mysqli_affected_rows($DB->connection)==1)? true : false ;

}

public function delete_photo(){

	if ($this->delete()) {
		$target_path = SITE_ROOT .PS. "admin" .PS. $this->photo_path();
		return unlink($target_path)? true:false;
	}else{
		return false;
	}

}


public function save_general (){

	return isset($this->id) ? $this->update() : $this->create();
}




public function  save(){

 	if ($this->id) {
 		
 		 $target_path = SITE_ROOT . PS .'admin'.PS. $this->upload_directory . PS . $this->filename;
 		 if (file_exists($target_path)) {
 			$this->errors[] = "This image {$this->filename}is alredy Exsit ";
 			return false;
 	 		}

 		 if (move_uploaded_file($this->tmp_path, $target_path)) {
 			if ( $this->update()) {
 				unset($this->tmp_path);
 				return true;
 			}
 		}
 	}else{
  		if (!empty($this->errors)) {
 			return false;
 		}

 		if (empty($this->filename) || empty($this->tmp_path)) {
 			$this->errors[]="the file was empty";
 			return false;
 		}

 		$target_path = SITE_ROOT . PS .'admin'.PS. $this->upload_directory . PS . $this->filename;

 		if (file_exists($target_path)) {
 			$this->errors[] = "This image {$this->filename}is alredy Exsit ";
 			return false;
 	 		}

 		if (move_uploaded_file($this->tmp_path, $target_path)) {
 				
 			if ($this->create()) {
 				unset($this->tmp_path);
 				return true;
 			}
 		}
 	}
 }





public function set_file ($file/*$_FILE['upload_file']*/){
	if (empty($file) || !$file || !is_array($file)) {
		
		$this->errors[]=" There was no file uploaded.....  ";
		return false;
	}elseif($file['error']!=0){
		$this->errors[]= $this->upload_errors_array[$file['error']];
		return false;
	}else{
		$this->filename = basename($file['name']);
		$this->tmp_path = $file['tmp_name'];
		$this->type = $file['type'];
		$this->size = $file['size'];
	}
}

public function photo_path(){

	return $this->upload_directory .PS. $this->filename;
}


public static function countAll(){
	global $DB;
	$sql = "SELECT count(*) FROM " . static::$DB_tableName;
	$out_put = $DB->query($sql);
	$row = mysqli_fetch_array($out_put);
	return array_shift($row);
}

























}





 ?>