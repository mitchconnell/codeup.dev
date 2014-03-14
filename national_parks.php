<?php

$mysqli = new mysqli('127.0.0.1', 'mitchell', 'F00die88', 'national_parks');

if ($mysqli->connect_errno) {
    echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}

$sortCol = "name";
$sortOr = "asc";

 if (!empty($_GET)) { 
	$sortCol = $_GET['sort_column'];
	$sortOr = $_GET['sort_order']; 
	 } 

$query = "SELECT * FROM parks ORDER BY " . $sortCol . " " . $sortOr;

echo $query;

if(!($result = $mysqli->query($query))) {
	throw new Exception('OH NOES! ' . $mysqli->error);
}

//var_dump($result);

?>
<!DOCTYPE html>

<html>
<head>
	<title>National Parks</title>
</head>
  <body>
	<h1>My Favorite Parks</h1>
	<table>
		<tr>
			<td>Name <a href="?sort_column=name&amp;sort_order=asc">up</a>
				<a href="?sort_column=name&amp;sort_order=desc">down</a>
			<td>Location <a href="?sort_column=location&amp;sort_order=asc">up</a>
				<a href="?sort_column=location&amp;sort_order=desc">down</a></td>
			<td>Description</td>
			<td>Date Established <a href="?sort_column=date_established&amp;sort_order=asc">up</a>
				<a href="?sort_column=date_established&amp;sort_order=desc">down</a></td>
			<td>Acres <a href="?sort_column=area_in_acres&amp;sort_order=asc">up</a>
				<a href="?sort_column=area_in_acres&amp;sort_order=desc">down</a></td>
		</tr>
<?php

	while ($row = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>". $row['name'] . "</td>";
	echo "<td>". $row['location'] . "</td>";
	echo "<td>". $row['description'] . "</td>";
	echo "<td>". $row['date_established'] . "</td>";
	echo "<td>". $row['area_in_acres'] . "</td>";
	echo "</tr>";   
    }	
?>		
	 </table>
	</body>
</html>
