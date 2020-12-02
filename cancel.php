<!DOCTYPE html>
<html>
<head>
	<title>Cancel Result</title>
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
	<script src="js/main.js"></script>

</head>

<style type="text/css">
	
	table
		{
			text-align: left;
			font-family: 'Cabin';
			font-size: 17px;
		}

		th, td
			{
				padding: 10px 10px;
				text-align: center;	
			}

	.mainclass
		{
			max-width: 600px;
			display: block;
			margin-right: auto;
			margin-left: auto;
		}

	.remind
		{
			font-family: 'Cabin';
			padding-left: 85px; 
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

	@media screen and (min-width: 0px) and (max-width: 1600px)
		{

			footer
				{
					position: relative;
					bottom: 0;
					width: 100%;
					text-align: center;
				}
		}

	@media screen and (min-width: 320px) and (max-width: 767px)
		{

			th, td
				{
					padding: 15px 5px;			
				}

			.remind
				{
					position: relative;
					top: 0px;
				}
		}

</style>

<body>

<!-- Header -->

	<header>
			<img class="logo" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">
	</header>

<div class="mainclass">
	
	<br><br><h2 style="font-family: 'Kaushan Script'; font-size: 40px; color: #000080;">Search Result</h2><hr color="#000080"><br>

	<div class="tripquery">
		<table>
			<tr>
				<th>Trip Code</th>
				<th>Code</th>
				<th>Origin</th>
				<th>Destination</th>
				<th>Name</th>
				<th>Pax</th>
				<th>Cancelation</th>
			</tr>

			<?php

				if (isset($_GET['cancel'])) {

					$code = $_GET['code'];
					$connect = mysqli_connect("localhost", "root", "", "uv_express");
					$query = "SELECT * FROM trip_info INNER JOIN pax_info ON trip_info.trip_code = pax_info.trip_code WHERE pax_unipass = {$code}";
					$result = mysqli_query($connect, $query);

					if (!mysqli_num_rows($result)) {
						echo "<center style='position: relative; top: 80px; color: #000080; font-family: Cabin;'>No Results Found</center>";
					}


				}

			?>

			<?php while ($row = mysqli_fetch_array($result)) { ?>
			<tr>
				<td><?php echo $row['trip_code'];?></td>
				<td><?php echo $row['pax_unipass'];?></td>
				<td><?php echo $row['pax_or'];?></td>
				<td><?php echo $row['pax_des'];?></td>
				<td><?php echo $row['pax_name'];?></td>
				<td><?php echo $row['trip_pax'];?></td>
				<td><a href="cancelsummary.php?cancel_id=<?php echo $row['pax_unipass']?>" style="text-decoration: none; color: white; background-color: #000080; padding: 5px 10px; border-radius: 5px;" alt="edit">Confirm</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	<br><br><br><hr color="#000080"><br>

			<div class="remind">
					<h3>Reminders:</h3>
						<p>1. Availability of trips are limited at this moment.</p>
						<p>2. After choosing the desire destination, date and time, click Avail.</p>
				</div>
			</div>

	<br><br><br><br>

<footer>

	<img width="170px" src="assets/logo/logo_uv_white.png" alt="Non-Stop Zambales Experience!">
	<hr color="white" width="500px">
	<div id="link">
		<a href="">Contact Us</a>
		<a href="admin-login.php">Administrator</a>
	</div> 

	© UV Express Service

</footer>

</body>
</html>