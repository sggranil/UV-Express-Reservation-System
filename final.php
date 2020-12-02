<!DOCTYPE html>
<html>
<head>
	<title>Completed!</title>
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
			max-width: 875px;
			display: block;
			margin-right: auto;
			margin-left: auto;
			text-align: center;
		}

	.final
		{
			text-align: center;
			font-family: 'Cabin';
		}

	input[type=text]
		{
			border: 0;
			border-bottom: 2px solid #d9d9d9;
			font-size: 50px;
			text-align: center;
		}

	#gencode
		{
			border: none;
			border-radius: 5px;
			padding: 10px 50px;
			cursor: pointer;
			background-color: #000080;
			color: white;
			font-family: 'Cabin';
			font-size: 15px;
			transition: .2s;
			text-decoration: none;
			position: relative;
			left: 630px;
			top: 60px;
		}

	#gencode:hover
		{
			color: #000080;
			background-color: #FDD700;
			transition: .2s;
		}

	.remind
		{
			font-family: 'Cabin';
			text-align: center;
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

	@media screen and (min-width: 768px) and (max-width: 1024px)
		{
			#gencode
				{
					position: relative;
					left: 395px;
					top: 60px;
				}
		}

	@media screen and (min-width: 0px) and (max-width: 767px)
		{
			#gencode
				{
					position: relative;
					left: 190px;
					top: 130px;
				}
		}

</style>

<?php

	$connect = mysqli_connect("localhost", "root", "", "uv_express");
	$query = "SELECT * FROM pax_info ORDER BY pax_unipass DESC LIMIT 1";
	$sql = mysqli_query($connect, $query);

?>

<body>

<!-- Header -->

	<header>
			<img class="logo" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">
	</header>

<div class="mainclass">

	<div class="final">

		<h1 style="font-family: 'Kaushan Script', cursive; font-size: 70px; text-align: center; line-height: 70px; color: #ffd700; text-shadow: 2px 2px #000080;">Enjoy Zambales!</h1>
		<h4>Your Unique ID</h4>
		<?php while ($row = mysqli_fetch_row($sql)) { ?>
		<input type="text" name="code" value="<?php echo $row[0]?>" readonly>
		<?php } ?>
	</div>

	<div class="remind">
		<h3>Reminders:</h3>
			<p>• Copy the Unique ID before proceeding to the terminal prior to your trip schedule.</p>
			<p>• Do not forget to bring any valid ID's before trip schedule.</p>
			<p>• We do not accept any mode of online cash transaction, proceed to our reservation booth.</p>
			<p>• Failure to arrive to the terminal 15 minutes prior to your reserved slot will be awarded to other chance passenger.</p>
		</div>
	</div>

	<div class="btn">
		<a href="main.php" id="gencode">Go Back to Main Page</a>
	</div>

</div>

<br><br><br><br><br><br><br><br><br><br><br><br>

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