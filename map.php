<!DOCTYPE html>
<html>
<head>
	<title>UV Express Service</title>
	<meta lang="en" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="HandheldFriendly" content="true" />
	<link media="all" rel="stylesheet" type="text/css" href="css/main.css" />
	<link media="all" rel="stylesheet" type="text/css" href="css/media.css" />
	<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet" />
	<link rel="icon" href="assets/ico/ico_uv.png" type="image/gif" sizes="HeightxWidth|any" />

</head>

<style type="text/css">
	
	body
		{
			font-family: 'Cabin';
		}

	.mapa
		{
			width: 800px;
		}

	footer
		{
			margin: -8px;
			padding: 30px;
			background-color: #000080;
			color: white;
			font-family: 'Cabin';
			text-align: center;
			position: absolute;
  			left: 0;
  			bottom: 0;
  			width: 100%;
		}

	#link
		{
			font-size: 20px;
			padding: 10px;
		}

		a
			{
				color: white;
				text-decoration: none;
				padding: 40px 10px;
			}

		a:hover
			{
				color: #FFD700;
			}

	@media screen and (min-width: 0px) and (max-width: 1920px)
		{
			footer
				{
					position: relative;
					bottom: 0;
					width: 100%;
					text-align: center;
				}
		}

	@media screen and (min-width: 0px) and (max-width: 767px)
		{

			.mapa
				{
					width: 400px
				}

			#origin
				{
					margin-bottom: 30px;
				}
		}

	#map
		{
			text-align: center;
			padding: 100px;
		}

	#fare
		{
			text-align: center;
			padding-bottom: 200px;
		}

	table
		{
			text-align: center;
			padding: 50px 0px;
		}

	th
		{
			padding: 10px 30px;
			color: white;
			background-color: #000080;
		}

	td
		{
			padding: 20px;
			background-color: #d9d9d9;
			border: 1px solid black	;
		}

</style>

<body>

<!-- Header -->

	<header>
		<a href="main.php"><img class="logo" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!"></a>
	</header>

	<div id="map">
		<h2>Route Map</h2>
			<img class="mapa" src="assets/banner/ZamMap.jpg">
	</div>

	<div id="fare">
		<h2>Fare and Schedule</h2>
			<form action="map.php" method="get">
				<div class="navico1">
						<select id="origin" name="ori">
							<option value="" disabled selected>Choose your Origin</option>
							<option value="Olongapo">Olongapo</option>
							<option value="Sta. Cruz">Sta. Cruz</option>
						</select>
				</div>

				<div class="navico2">
						<select id="destination" name="dest">
							<option value="" disabled selected>Choose your Destination</option>
							<option value="Olongapo">Olongapo</option>
							<option value="Iba">Iba</option>
							<option value="Sta. Cruz">Sta. Cruz</option>
						</select>
				</div>

				<div style="position: relative; top: 30px;">
					<input type="submit" name="sel" id="search-book" value="Find">
				</div>
			</form>

			<?php

			error_reporting(0);

			if (isset($_GET['sel'])) {
				
				$origint = $_GET['ori'];
				$destt = $_GET['dest'];

				$connect = mysqli_connect("localhost", "root", "", "uv_express");
				$query = "SELECT * FROM trip_info WHERE trip_or LIKE '{$origint}' AND trip_des LIKE '{$destt}'";
				$result = mysqli_query($connect, $query);

				if (!mysqli_num_rows($result)) {
					echo "<center style='position: relative; top: 150px; color: #000080; font-family: Cabin;'>No Results Found</center>";
				}
			}

			?>

			<table align="center">
				<tr>
					<th>Origin</th>
					<th>Destination</th>
					<th>Time</th>
					<th>Date</th>
					<th>Fare</th>
				</tr>

			<?php while ($row = mysqli_fetch_array($result)) { ?>
				<tr>
					<td><?php echo $row['trip_or'];?></td>
					<td><?php echo $row['trip_des'];?></td>
					<td><?php echo $row['trip_time'];?></td>
					<td><?php echo $row['trip_date'];?></td>
					<td><?php echo $row['trip_price'];?></td>
				</tr>
			<?php } ?>
			</table>
	</div>
		
<footer>

	<img width="170px" src="assets/logo/logo_uv_white.png" alt="Non-Stop Zambales Experience!">
	<hr color="white" width="500px">
	<div id="link">
		<a href="contact.php">Contact Us</a>
		<a href="admin-login.php">Administrator</a>
	</div> 

	© UV Express Service

</footer>


</body>
</html>