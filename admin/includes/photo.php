<?php 


							if (! class_exists('Common_methods')) {
									echo "check";
							    die('There is no hope!');}else{
							    	echo "It works...";
								    }

class Photo extends Common_methods {

public static $DB_tableName = "photos" ;
public static $DB_tableName_fields = array("id","title","caption","description","alternate_text","filename","type","size");


public $id;
public $title;
public $caption;
public $description;
public $alternate_text;
public $filename;
public $type;
public $size;

public $tmp_path;
public $upload_directory = "images";

// public $errors = array(); // custome error we make 
// public $upload_errors_array = array(
//     UPLOAD_ERR_OK           =>  "there is no error.",
//     UPLOAD_ERR_INI_SIZE     =>  "the uploaded file exceeds the upload_max_filesize directive.",
//     UPLOAD_ERR_FORM_SIZE    =>  "the uploaded file exceeds the UPLOAD_ERR_FORM_SIZE directive that.",
//     UPLOAD_ERR_PARTIAL      =>  "the uploaded file was only partially uploaded. ",
//     UPLOAD_ERR_NO_FILE      =>  "no file was uploaded .",
//     UPLOAD_ERR_NO_TMP_DIR   =>  "missing a temporary folder.",
//     UPLOAD_ERR_CANT_WRITE   =>  "failed to write file to disk.",
//     UPLOAD_ERR_EXTENSION    =>  "A PHP extension stopped  the file upload.",);


// public function photo_path(){

// 	return $this->upload_directory .PS. $this->filename;
// }

 //  // // // $_FILE['upload_file']
// public function set_file ($file/*$_FILE['upload_file']*/){
// 	if (empty($file) || !$file || !is_array($file)) {
		
// 		$this->errors[]=" There was no file uploaded.....  ";
// 		return false;
// 	}elseif($file['error']!=0){
// 		$this->errors[]= $this->upload_errors_array[$file['error']];
// 		return false;
// 	}else{
// 		$this->filename = basename($file['name']);
// 		$this->tmp_path = $file['tmp_name'];
// 		$this->type = $file['type'];
// 		$this->size = $file['size'];
// 	}
// }





// public function  save_photo(){

//  	if ($this->id) {
//  		 $this->update();
//  		 $target_path = SITE_ROOT . PS .'admin'.PS. $this->upload_directory . PS . $this->filename;
//  		 if (file_exists($target_path)) {
//  			$this->errors[] = "This image {$this->filename}is alredy Exsit ";
//  			return false;
//  	 		}

//  		 if (move_uploaded_file($this->tmp_path, $target_path)) {
//  			if ($this->create()) {
//  				unset($this->tmp_path);
//  				return true;
//  			}
//  		}
//  	}else{
//   		if (!empty($this->errors)) {
//  			return false;
//  		}

//  		if (empty($this->filename) || empty($this->tmp_path)) {
//  			$this->errors[]="the file was empty";
//  			return false;
//  		}

//  		$target_path = SITE_ROOT . PS .'admin'.PS. $this->upload_directory . PS . $this->filename;

//  		if (file_exists($target_path)) {
//  			$this->errors[] = "This image {$this->filename}is alredy Exsit ";
//  			return false;
//  	 		}

//  		if (move_uploaded_file($this->tmp_path, $target_path)) {
 				
//  			if ($this->create()) {
//  				unset($this->tmp_path);
//  				return true;
//  			}
//  		}
//  	}
//  }


public function delete_photo(){

	if ($this->delete()) {
		$target_path = SITE_ROOT .PS. "admin" .PS. $this->photo_path();
		return unlink($target_path)? true:false;
	}else{
		return false;
	}

}



















///////////// END OF THE CLASS //////////////
}
 ?>

 <?php 
 
// class Photo extends Common_methods
// {
	
// 	public static $DB_tableName = "images";
// 	public static $DB_tableName_fields = array("id","title","description","filename","type","size")


// 	public $id;
// 	public $title;
// 	public $description;
// 	public $filename;
// 	public $type;
// 	public $size;
// 	public $tmp_path ;
// 	public $upload_directory = "images";

// 	public $errors = array();
// 	public $upload_errors_array = array(
//     UPLOAD_ERR_OK           =>  "there is no error.",
//     UPLOAD_ERR_INI_SIZE     =>  "the uploaded file exceeds the upload_max_filesize directive.",
//     UPLOAD_ERR_FORM_SIZE    =>  "the uploaded file exceeds the UPLOAD_ERR_FORM_SIZE directive that.",
//     UPLOAD_ERR_PARTIAL      =>  "the uploaded file was only partially uploaded. ",
//     UPLOAD_ERR_NO_FILE      =>  "no file was uploaded .",
//     UPLOAD_ERR_NO_TMP_DIR   =>  "missing a temporary folder.",
//     UPLOAD_ERR_CANT_WRITE   =>  "failed to write file to disk.",
//     UPLOAD_ERR_EXTENSION    =>  "A PHP extension stopped  the file upload.",);


// 	public function set_file($file){

// 		if (empty($file) || !$file || !is_array($file)) {
// 			$this->errors [] = " The uploaded file is empty";
// 			return false;
// 		}elseif ($file['error'] !=0) {
// 			$this->errors[] = $this->upload_errors_array[$file["error"]];
// 			return false;
// 		}else{
// 			$this->filename = basename($file["name"])
// 			$this->tmp_path = $file["tmp_path"];
// 			$this->type = $file["type"];
// 			$this->size = $file["size"];
// 		}
// 	}


// 	public function save_photo(){

// 		if ($this->id) {
// 			$this->update();

// 		}else{

// 			if (!empty($file["error"])) {
// 				$this->errors [] = " error please try again";
// 				return false ;
// 			}
// 			if (empty($this->filename)) || empty($this->tmp_path)) {
// 				$this->errors [] = " this is empty file ";
// 			}
// 			$target_path = SITE_ROOT . PS . "admin" . $this->upload_directory . $this->filename;
// 			if (file_exists($this->filename)) {
// 				$this->errors [] = "This file is alredy exists....";
// 				return false ;
// 			}

// 			if (move_uploaded_file($this->tmp_path, $target_path)) {
// 				if ($this->create()) {
// 					unset($this->tmp_path);
// 					return true;
// 				}
// 			}
// 		}

// 	}


// ////////////// END OF CLASS ////////////
// }



  ?>


  <?php 


// class Photo extends Common_methods
// {



// public static $DB_tableName = "photos" ;
// public static $DB_tableName_fields = array("id", "title", "description", "filename", "type", "size");

// public $id;
// public $title;
// public $description;
// public $filename;
// public $type;
// public $size;

// public $tmp_path;
// public $upload_directory = "images";
// public $errors = array();
// public $upload_errors_array = array(
//     UPLOAD_ERR_OK           =>  "there is no error.",
//     UPLOAD_ERR_INI_SIZE     =>  "the uploaded file exceeds the upload_max_filesize directive.",
//     UPLOAD_ERR_FORM_SIZE    =>  "the uploaded file exceeds the UPLOAD_ERR_FORM_SIZE directive that.",
//     UPLOAD_ERR_PARTIAL      =>  "the uploaded file was only partially uploaded. ",
//     UPLOAD_ERR_NO_FILE      =>  "no file was uploaded .",
//     UPLOAD_ERR_NO_TMP_DIR   =>  "missing a temporary folder.",
//     UPLOAD_ERR_CANT_WRITE   =>  "failed to write file to disk.",
//     UPLOAD_ERR_EXTENSION    =>  "A PHP extension stopped  the file upload.");



// /* takes $_FILES["upload_file"]*/
// public function set_file ($file) {

// 	if (empty($file) || !$file || !is_array($file)) {
// 		$this->errors[] = " This file is not exists .....";
// 		return false;
// 	}elseif ($file["error"] !=0 ) {
// 		 $this->errors[] = $this->upload_errors_array[$file["error"]];
// 		 return false;
// 	}else{
// 		$this->filename = basename($file["name"]);
// 		$this->type = $file["type"];
// 		$this->size = $file["size"];
// 		$this->tmp_path = $file["tmp_path"];
// 	}

// } 


// public function save_photo (){
// 	if ($this->id) {
// 		$this->create();
// 	}else{

// 		if (empty($this->title) || empty($this->filename)) {
// 			$this->errors[] = " Please Enter the required Fields.....";
// 			return false ;
// 		}

// 		if (!empty($file["error"])) {
// 			$this->errors[] = " error uocered to the uploaded file .....";
// 			return false;
// 		}

// 		$target_path = SITE_ROOT . PS . "admin" . PS . $this->upload_directory . PS . $this->filename ;

// 		if (file_exists($this->filename)) {
// 			 $this->errors[] = "This file {$this->filename} is alredy exists ......";
// 			 return false;
// 		}

// 		if (move_uploaded_file($this->tmp_path , $target_path)) {
// 			if ($this->create()) {
// 				unset($this->tmp_path);
// 				return true;
// 			}
// 		}

// 	}
// }
// /////////////////// END OF CLASS //////////////////////////////
// }


// class Photo {

// public static $DB_tableName = "photo"; 
// public static $DB_tableName_fields = array("",);

// public $id; 
// public $title; 
// public $description; 
// public $filename; 
// public $type; 
// public $size; 
// public $tmp_path; 
// public $upload_directory = "images"; 
// public $errors = array(); 
// public $upload_errors_array = array(
//     UPLOAD_ERR_OK           =>  "there is no error.",
//     UPLOAD_ERR_INI_SIZE     =>  "the uploaded file exceeds the upload_max_filesize directive.",
//     UPLOAD_ERR_FORM_SIZE    =>  "the uploaded file exceeds the UPLOAD_ERR_FORM_SIZE directive that.",
//     UPLOAD_ERR_PARTIAL      =>  "the uploaded file was only partially uploaded. ",
//     UPLOAD_ERR_NO_FILE      =>  "no file was uploaded .",
//     UPLOAD_ERR_NO_TMP_DIR   =>  "missing a temporary folder.",
//     UPLOAD_ERR_CANT_WRITE   =>  "failed to write file to disk.",
//     UPLOAD_ERR_EXTENSION    =>  "A PHP extension stopped  the file upload."); 


// public function set_file (){

// 	if (empty($file) || !$file || is_array($file)) {
// 		$this->errors [] = " This file has not uploaded ......";
// 		return false ;
// 	}elseif ($file["error"] !=0) {
// 		$this->errors [] = $this->upload_errors_array [$file["error"]];
// 		return false;
// 	}else{
// 		$this->filname = basename($file["name"]);
// 		$this->tmp_file = $file["tmp_file"] ;
// 		$this->type = $file["type"];
// 		$this->size = $file["size"];
// 	}
// }

// public function save_photo(){

// 	if ($this->id) {
// 		$this->update();
// 	}else{
// 		if (empty($filename) || empty($title) ) {
// 			$this->errors[] = " Please enter the required fields ......";
// 			return false ;
// 		}
// 		if (!empty($file["error"])) {
// 			$this->errors[] = " The uploaded file has falid ......";
// 			return false;
// 		}

// 		$target_path = SITE_ROOT .PS. "admin" .PS. $this->upload_directory .PS. $this->filename ;

// 		 if (file_exists($filename)) {
// 		 	$this->errors[] = " This file {$this->filename} is alredy exists ........";
// 		 	return false ;
// 		 }
// 		 if (move_uploaded_file($this->tmp_path, $target_path)) {
// 		 	if ($this->create()) {
// 		 		unset($tmp_path);
// 		 		return true;
// 		 	}
// 		 }
// 	}

// }




// ////////////////// END OF CLASS ////////////////////////
 // }
  ?>
 