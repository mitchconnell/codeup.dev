<?php

$mysqli = new mysqli('127.0.0.1', 'mitchell', 'F00die88', 'Todos');

if (!empty($_POST)) {

	$stmt = $mysqli->prepare("INSERT INTO list (,) VALUES (?)");

	$stmt->bind_param("s", $_POST['']);

	$stmt->execute();
}

$query = "SELECT * FROM list";




require_once 'todo_list_class.php';

$todo_list = new TodoList('todo_list.txt');

$items = $todo_list->read();
  
if (isset($_GET['remove'])) {
	$todo_list->remove_item($_GET['remove'], 'todo-list4.php',$items);
} 
 
if (!empty($_POST['newitem'])) {
	$item = htmlspecialchars(strip_tags($_POST['newitem']));
	array_push($items, $item);
	$todo_list->write($items);
	if (strlen($_POST['newitem']) > 240) {
		throw new Exception('Must be less than 240 chars');
	}
} 
?>
<!DOCTYPE HTML!>
<html>
<head>
	<title>ToDo List</title>
	<link rel="stylesheet" href="/css/stylesheet.css">
</head>
<body><h1></h1>
	<table>
		<tr>
			<td>Name <a href="?sort_column=name&amp;sort_order=asc">up</a>
				<a href="?sort_column=name&amp;sort_order=desc">down</a>
		</tr>
<?php

	while ($row = $parks->fetch_assoc()) {
	echo "<tr>";
	echo "<td>". $row['name'] . "</td>";
	echo "</tr>";   
    }	
?>		
	 </table>


	<iframe width="560" height="315" src="//www.youtube.com/embed/Y9DA8gCj9pA?list=UUdQp3ijXQOVXsF3AsdAgq1A" frameborder="0" allowfullscreen></iframe>
	<h1 class="fancy-header">ToDo List</h1>
	<? if (count($items) > 0 ): ?>
		<ul class="style" >
			<? foreach ($items as $key => $item): ?>
				<li><?= $item; ?> | <a href='todo-list4.php?remove=<?= $key; ?>' name='remove' id='remove'>remove</a></li>
			<? endforeach; ?>
		</ul>
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

