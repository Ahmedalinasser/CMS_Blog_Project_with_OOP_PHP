<?php 

class Comment extends common_methods{



protected static $DB_tableName = "comments";
protected static $DB_tableName_fields = array ("id","photo_id","author","body");

public $id;
public $photo_id;
public $author;
public $body;



public static function create_comment($pic_id , $author , $com_body){

if (!empty($pic_id) && !empty($author) && !empty($com_body)) {

$comment = new Comment();

$comment->photo_id = $pic_id;
$comment->author = $author;
$comment->body = $com_body;


return $comment ;

}else{
	return false;

}

}


public static function find_the_comments ($photo_id){


	global $DB;
	$sql="SELECT * FROM comments";//. self::$DB_tableName;
	$sql.=" WHERE photo_id = {$photo_id} ORDER BY photo_id ASC";



	return self::passQuery($sql);
}








//End of the Class HERE //
}




 ?>