<?php 

// class paginate{


// public $current_page;
// public $items_per_page;
// public $items_total_count;

// public function __construct( $page=1 , $item_per_page= 6, $item_total_count=10){

// 	$this->current_page = (int)$page;
// 	$this->items_per_page = (int)$item_per_page;
// 	$this->items_total_count = (int)$item_total_count;
// }



// public function next(){
// 	return $this->current_page +1;
// }


// public function previous(){
// 	return $this->current_page -1;
// }


// public function page_total (){
// 	return ceil($this->items_total_count/$this->items_per_page);
// }

// public function has_next(){

// 		return $this->next() <= $this->page_total()? true: false;
// }



// public function has_previous(){

// 	return $this->previous() >= 1 ? true: false;
// }

// public function off_set(){

// 	return($this->current_page -1 ) * $this->items_per_page ;
// }



// ///////////////////// END OF CLASS /////////////////////	
// }

class Paginate{

	public $page;
	public $itemsPerPage;
	public $totalItems;

	public function __construct($page, $itemsPerPage , $totalItems ){

	$this->page = 			(int)$page;		
	$this->itemsPerPage = 	(int)$itemsPerPage;		
	$this->totalItems =	 	(int)$totalItems;		

	}

public function next(){

	return $this->page +1;
}


public function back(){
	return $this->page -1;
}

public function totalPages(){
	return ceil( $this->totalItems / $this->itemsPerPage );
}

public function has_next(){
	return $this->next() <= $this->totalPages() ? true : false ;
}

public function has_back(){
	return $this->back() >= 1 ? true : false ;
}

public function offSet (){

	return ($this->page -1) * $this->itemsPerPage ;
}


/////////////////////////END OF CLASS /////////////////////////////
}




 ?>