<!DOCTYPE html>
<html>
<head>
	<title>Summary</title>
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

	.mainclass
		{
			max-width: 600px;
			display: block;
			margin-right: auto;
			margin-left: auto;
		}

	#summary
		{
			padding: 10px 170px;
			max-width: 300px;
		}

	.form-sub
		{
			position: relative;
			top: 10px;
		}

	input[type=text]
		{
			padding: 5px;
			border: 0;
  			border-bottom: 2px solid #d9d9d9;
			font-size: 20px;
			margin-bottom: 20px;
		}

	input[name=pax]
		{
			max-width: 175px;
			border: none;
			border: 0;
  			border-bottom: 2px solid #d9d9d9;
		}

	input[type=submit]
		{
			border: none;
			border-radius: 5px;
			padding: 10px 50px;
			cursor: pointer;
			background-color: #000080;
			color: white;
			font-family: 'Cabin';
			font-size: 15px;
			position: relative;
			left: 15px;
			top: 20px;
			transition: .2s;
		}

	input[type=submit]:hover
		{
			color: #000080;
			background-color: #FDD700;
			transition: .2s;
		}

	input[name=codex], input[name=padex]
		{
			width: 70px;
			border: none;
			font-family: 'Cabin';
		}

	input[name=total]
		{
			width: 250px;
			font-family: 'Cabin';
		}

	label
		{
			font-family: 'Cabin';
		}

</style>

<body>

<!-- Header -->

	<header>
			<img class="logo" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">
	</header>

<div class="mainclass">

			<?php

				if (isset($_GET['edit_id'])) {

					$edited = $_GET['edit_id'];

					$connect = mysqli_connect("localhost", "root", "", "uv_express");
					$query = "SELECT * FROM trip_info WHERE trip_code = '{$edited}'";
					$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error($connect));
				}

			?> <br><br>

	<div class="form-sub">
		<form action="getcode.php" method="post" id="summary">	
			<?php while ($row = mysqli_fetch_array($result)) { ?>
			<h2 style="font-family: 'Cabin';">Reservation Summary: <input readonly type="text" name="codex" value="<?php echo $row['trip_code'];?>">-<input  readonly type="text" name="padex" value="<?php echo $row['trip_pax'];?>"></p></h2> 
			<label for="pax">Origin: </label>
			<input type="text" name="ori" placeholder="Origin" value="<?php echo $row['trip_or']; ?>" readonly>
			<br><label for="pax">Destination: </label>
			<input type="text" name="des" placeholder="Destination" value="<?php echo $row['trip_des']; ?>"  readonly>
			<br><label for="pax">Departure Date: </label>
			<input type="text" name="date" placeholder="Departure Date" value="<?php echo $row['trip_date']; ?>"  readonly>
			<br><label for="pax">Departure Time: </label>
			<input type="text" name="time" placeholder="Departure Time" value="<?php echo $row['trip_time']; ?>"  readonly>
			<br><label for="pax">Passenger: </label>
			<input type="text" name="pax" value="1" readonly>
			<br><label for="total">Reservation Total:</label>
			<input type="text" name="total" placeholder="Total" value="<?php echo $row['trip_price']; ?>"  readonly>
			<input type="text" name="paxname" placeholder="Passenger Name" required autocomplete="off">
			<input type="submit" name="gencode" value="Complete Transaction"a>
			<?php } ?>
		</form>
	</div>
	<br><br><br><br><br>
</div>

</body>
</html>