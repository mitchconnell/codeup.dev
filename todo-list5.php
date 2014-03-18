<?php

// $limit = 2;   

  $mysqli = new mysqli('127.0.0.1', 'mitchell', 'F00die88', 'Todos');

// $result = $mysqli->query('SELECT * FROM Todos');

// $num_rows = $result->num_rows;

// $num_pages = ceil($num_rows / $limit);

// $result->close();

if (!empty($_POST)) {

	$stmt = $mysqli->prepare("INSERT INTO list (name) VALUES (?)");

	$stmt->bind_param("s",$_POST['newitem']);

	$stmt->execute();
}

if (isset($_POST['remove'])) {

	$stmt = $mysqli->prepare("DELETE FROM list WHERE id = ?");

 	$stmt = bind_param("i",$_GET['remove']);

	$stmt->execute();
}

// if(!empty($_GET['page'])) {
// 	$page = $_GET['page'];
// } else {
// 	$page = 1;
// }

// if ($page > 1);

// if (!empty($_GET)) { 
// 	$sortCol = $_GET['sort_column'];
// 	$sortOr = $_GET['sort_order']; 
// 	 }

$query = "SELECT * FROM list WHERE status = 0";

// $list = $mysqli->query($query);

// $stmt->bind_param("ii, $limit")

$list = $mysqli->query($query);

if (!$list) {
	throw new Exception('Oh No! ' . $mysqli->error);
}

$rows = array();
while ($row = $list->fetch_assoc()) {

	$rows[] = $row;
}

$mysqli->close();

?>
<!DOCTYPE html>

<html>
<head>
	<title>Todo List</title>
</head>
  <body>
	<h1>Things I Need To Do</h1>
	
		<iframe width="560" height="315" src="//www.youtube.com/embed/Y9DA8gCj9pA?list=UUdQp3ijXQOVXsF3AsdAgq1A" frameborder="0" allowfullscreen></iframe>
	<h1 class="fancy-header">ToDo List</h1>
	<? if (count($list) > 0 ): ?>
		<table class="style" >
			<? foreach ($rows as $key => $row) {
			echo "<tr>";
			echo "<td>". $row['name'] . "</td>";
			echo "</tr>";
	 } ?>			
		</table>
	<? else: ?>
		<p>You have 0 todo items.</p>
	<? endif; ?>
	<h2 class="fancy-header">Add ToDos to List</h2>
	<form method="POST" action="">
		<p>
			<label for="newitem">Item to add:</label>
			<input id="newitem" name="newitem" type="text" autofocus='autofocus' placeholder="Enter new ToDo item">
		</p>
		<p>
			<input type="submit" value="Add Item">
		</p>
	</form>
	</body>
</html>

