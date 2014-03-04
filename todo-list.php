<?php
//var_dump($_FILES);
$filename = "todo_list.txt";
//save an array to a file
function save_file($filename, $todos){
	$handle = fopen($filename, "w" );
	$todo_string = implode("\n", $todos);
    fwrite($handle, $todo_string);
    fclose($handle);
}
//read from text file and return an array
function read_file($filename){
	$handle = fopen($filename, "r");
	$filesize = filesize($filename);
	if ($filesize > 0){
    	$contents = fread($handle, $filesize);
    	$contents = explode ("\n", $contents);
	}
	else {
		$contents = [];
	}
    fclose($handle);
    return $contents; 
}
$todos = read_file($filename);


//$items = read_from_file($filename);
 if (isset($_GET['remove'])){
 	$key = $_GET['remove'];
	unset($todos[$key]);	
	save_file($filename, $todos);
	header("Location: todo-list.php");
	exit;
}
 //load file
 if(!empty($_POST['new_item'])){
 	$new_item =  htmlspecialchars(strip_tags($_POST['new_item']));
 	array_push($todos, $new_item);
 	save_file($filename, $todos); 
 }
 // Check if we saved a file
 if (isset($saved_filename)) {
    echo "<p>You can download your file <a href='/uploads/{$filename}'>here</a>.</p>";
}
// Verify there were uploaded files and no errors
 	if (count($_FILES) > 0 && $_FILES['file1']['type'] == 'text/plain') {
    // Set the destination directory for uploads
    $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
    // Grab the filename from the uploaded file by using basename
    $filename = basename($_FILES['file1']['name']);
    // Create the saved filename using the file's original name and our upload directory
    $saved_filename = $upload_dir . $filename;
    // Move the file from the temp location to our uploads directory
    move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);

    $uploadedItems = read_file($saved_filename);
    $todos = array_merge($todos, $uploadedItems);
    save_file($filename, $todos);
} 
?>
<html>
<head>
	<title>TODO List</title>	
</head>
<body>
	<h1>Items List</h1>
<ul>
<?php
foreach ($todos as $key => $item) {
        echo "<li>$item<a href='?remove=$key'>remove</a></li>";
}
?>
</ul>
<h2>Add to list</h2>
<form method="POST" action="">
	<input type="text" id="todos" name="new_item">
	<input type="submit" value="add item"> 
</form>
<form method="POST" enctype="multipart/form-data" action="/todo-list.php">
<? if (!empty($errorMessage)) : ?>
 <p>?= echo $errorMessage; ?></p>
 <?endif; ?>
	
<h2>Upload File</h2>	
    <p>
        <label for="file1">File to upload: </label>
        <input type="file" id="file1" name="file1">
    </p>
    <p>
        <input type="submit" value="Upload">
    </p>
</form>
</body>
</html>	
