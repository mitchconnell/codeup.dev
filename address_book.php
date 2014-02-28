<?php
//var_dump($_POST);
$address_book = [];

$filename = 'address_book.csv';
function save_file($filename, $address_book){
	$handle = fopen($filename, "w" );
	foreach ($address_book as $rows) {
	fputcsv($handle, $rows);	
	}
    fclose($handle);
}
function readCSV($filename) {
	$contents = [];
	$handle = fopen($filename,"r");
	while (($data = fgetcsv($handle))!==FALSE) {
		$contents [] = $data;
	}
	fclose($handle);
	return $contents;
}
$address_book = readCSV($filename);

 if ((!empty($_POST['name'])) && (!empty($_POST['address'])) && (!empty($_POST['city'])) && (!empty($_POST['state'])) && (!empty($_POST['zip']))){
 	$new_contact = [];
  	foreach ($_POST as $info) {
  		$new_contact[] =  htmlspecialchars(strip_tags($info));
  	}
  	array_push ($address_book, $new_contact);
  	save_file ($filename, $address_book);
  }
if (isset($_GET['remove'])){
 	$key = $_GET['remove'];
	unset($address_book[$key]);	
	save_file($filename, $address_book);
	header("Location: address_book.php");
	exit;
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
		foreach ($address_book as $key => $contacts) {
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

