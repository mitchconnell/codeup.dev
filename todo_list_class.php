<?php
 
 require_once 'filestore.php';

 //class UnexpectedTypeException extends Exception {}

class TodoList extends Filestore {
 
	
	// Set list items and optional filename
	public function __construct($filename = '') {
		$filename = strtolower($filename);
		parent::__construct($filename);
	}

	// Add item to list, return new list
	//public function add_item($item) {
		//$new_item = htmlspecialchars(strip_tags($item));
		//array_push($this->, $item);
		//$this->save_file();
	//} 
	// Remove item from list, redirect optional
	public function remove_item($key, $redirect = FALSE) {
		unset($this->items[$key]);
		$this->save_file();
		if (is_string($redirect)) {
			header("Location: $redirect");
			exit(0);	
		}	
	}
 
}

//try {
    // try as a float (double)
    //$chat = new Conversation(323.32);
//} catch (UnexpectedTypeException $e) {
    // Try again as a string if double failed
    //$chat = new Conversation("323.32");
//}

//echo $chat->say_hello(TRUE); 


 
?>
