<!DOCTYPE html>
<html>
<head>
	<title>Sample</title>
</head>
<body>


	<style type="text/css">
		
		table
			{
				padding: 30px;
			}

	</style>

<table>
<?php

	$connect = mysqli_connect("localhost", "root", "", "uv_express");
	$query = "SELECT * FROM `pax_info`";
	$record = mysqli_query($connect, $query);

	while ($row = mysqli_fetch_array($record)) {
		echo "<tr>";
		echo "<td>".$row['trip_code']."</td>";
		echo "<td>".$row['pax_unipass']."</td>";
		echo "<td><a href=delete.php?confirm=".$row['pax_unipass'].">Delete</a></td>";
	}

?>
</table>

</body>
</html>