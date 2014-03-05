<?php

class AddressDataStore {

	// Set default file name and location
    public $filename = 'address_book.csv';

    // Set the defaults items array
    public $address_book = array();

    // Set list items and optional filename
    public function __construct($filename = '') {
    	if (!empty($filename)) {
    		$this->filename = $filename;
    	}
    	$this->address_book = $this->get_list();
    }
    // Read a txt file, return an array
    public function read_address_book() {
    	// Code to read file $this->filename
    	$handle = fopen($this->filename, "r");
    	$contents = fread($handle, filesize($this->filename));
    	fclose($handle);
    	return explode("\n", $contents);
    }	          
    public function write_address_book() { 
    	// Code to write $addresses_array to file $this->filename
    	$save_list = implode("\n", $this->filename);
    	$handle = fopen($this->filename, "w");
    	fwrite($handle, $save_list);
    	fclose($handle);        
    }
	// Returns an array of todo items
	public function get_list() {
		if (filesize($this->filename) > 0 {
			return $this ->read_address_book($this->filename);
		} else {
		
			return array();
	
	}	

	public function add_item($address_book) {
		$new_item = htmlspecialchars(strip_tags($info));
		array_push ($this->address_book);
		$this->save_file();
	}

	public function remove_item ($key, $redirect = FALSE) {
		unset ($this->address_book[$key]);
		$this->save_file();
			if (is_string($redirect)) {
	}
}
if(count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {
	if($_FILES['file1']['type'] == 'text/csv') {
		$upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
		$filename = basename($_FILES['file1']['name']);
		$saved_filename = $upload_dir . $filename;
		move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);
		$uploaded_file = new AddressDataStore($saved_filename);
		$new_array = $uploaded_file->read();
		$address_book = array_merge($address_book, $new_array);
		$run->write($address_book);
		header("Location:address_book.php");
		exit(0);

	}

 if(!empty($_POST)) {
	try {
		$run->validate('name', $_POST['name']);
		$run->validate('address', $_POST['address']);
		$run->validate('city', $_POST['city']);
		$run->validate('state', $_POST['state']);
		$run->validate('zip', $_POST['zip']);
	    array_push($address_book, array_values($_POST));
	    $run->write($address_book);
	} catch (Exception $e) {
		//$errorMessage = "You must enter between 1 and 125 characters.";
		echo 'Error: ' . $e->getMessage();
	}

if (isset($_GET['remove'])) {
	$remove = $_GET['remove'];
	unset($address_book[$remove]);
	$run->write($address_book);
	header("Location:address_book.php");
	exit(0);
} 	
?>
<html>
<head>
	<title>Address Book</title>	
</head>
<body>
	<h1>Address Book Entries</h1>
	<table>
		<?php	
		foreach ($this->filename as $key => $contacts) {
			echo "<tr>";
		foreach ($contacts as $info) {
			echo "<td> $info </td>";				
			}
			echo "<td><a href='?remove=$key'>delete</a></td>";
			echo "</tr>";       	      
		}
		?>		
	</table>

<h2>Add New</h2>
<form method="POST" action="">

	<p>
	<label for="name">Name:</label>
	<input type="text" id="name" name="name" autofocus = "autofocus" placeholder = "Enter name">
    </p>

    <p>
	<label for="address">Address:</label>
	<input type="text" id="address" name="address" autofocus = "autofocus" placeholder = "Enter street address">
    </p>

    <p>
	<label for="city">City:</label>
	<input type="text" id="city" name="city" autofocus = "autofocus" placeholder = "Enter city">
    </p>

    <p>
	<label for="state">State:</label>
	<input type="text" id="state" name="state" autofocus = "autofocus" placeholder = "Enter state">
    </p>

    <p>
	<label for="zip">Zip:</label>
	<input type="text" id="zip" name="zip" autofocus = "autofocus" placeholder = "Enter zip"></p>
	<p><input type="submit" value="add item"></p>
    
</form>
</body>
</html>	

