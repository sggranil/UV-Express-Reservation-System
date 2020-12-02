<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<meta lang="en" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="HandheldFriendly" content="true" />
	<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet" />
	<link rel="icon" href="assets/ico/ico_uv.png" type="image/gif" sizes="HeightxWidth|any" />
</head>

<style type="text/css">

/* Header */

    header
    	{
	        margin: -8px;
	        padding: 1vw;
	        box-shadow: 0px 0px 5px 0px #808080;
    	}

    .logo
    	{
	        display: block;
	        margin-left: auto;
	        margin-right: auto;
	        max-width: 250px;
    	}

/* Form */

	.contact
		{
			text-align: center;
			line-height: 30px;
			font-family: 'Cabin';
		}

	input[type="text"]
		{
			font-size: 17px;
			width: 405px;
			padding: 10px;
			font-family: 'Cabin';
			border: 0;
			border-bottom: 1px solid #000080;
		}

	input[type="submit"]
		{
			font-size: 15px;
			font-family: 'Cabin';
			padding: 10px 40px;
			border: none;
			border-radius: 5px;
			background-color: #000080;
			color: white;
			cursor: pointer;
			transition: .2s;
		}

	input[type="submit"]:hover
		{
			background-color: #ffd700;
			color: #000080;
			transition: .2s;
		}

	textarea
		{
			font-size: 17px;
			font-family: 'Cabin';
			width: 420px;
			border: 0;
			border-bottom: 1px solid #000080;
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
					bottom: -80px;
					width: 97%;
					text-align: center;
				}
		}

	@media screen and (min-width: 481px) and (max-width: 1024px)	
		{
			header
		    	{
			        margin: -8px;
			        padding: 3vw;
			        box-shadow: 0px 0px 5px 0px #808080;
			        max-width: 100%
		      	}

		   	.logo
		      	{
		        	width: 150px;
		      	}

		    .contact
		    	{
		    		margin-bottom: 100px;
		    	}
		}

</style>

<body>
<!-- Header -->

	<header>
		<img class="logo" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">
	</header>

<div class="contact">

	<br><h1 style="font-family: 'Kaushan Script', cursive; font-size: 30px; text-align: center; color: #ffd700; text-shadow: 2px 2px #000080;">CONTACT US</h1>
	<p style="color: #000080;">We are happy to hear your questions, comments and suggestion!<br>Please fill out the form below.</p>
	<form action="contact.php" method="post">
		<input type="text" name="name" placeholder="Name" autocomplete="off" required><br><br>
		<input type="text" name="company" placeholder="Company/Title of Message" autocomplete="off" required><br><br>
		<input type="text" name="contact" placeholder="Contact Number/Email Address" autocomplete="off" required><br><br>
		<textarea rows="4" cols="50" name="message" placeholder="Message or Suggestion" autocomplete="off" required></textarea>
		<br><br><input type="checkbox" name="checkmate" required> By clicking this, you agree to the Terms and Conditions.
		<br><br><input type="submit" name="submit" value="Submit">
	</form>

	<?php

	$connect = mysqli_connect("localhost", "root", "", "uv_express");

	if (isset($_POST['submit'])) {
		
		$name = $_POST['name'];
		$comp = $_POST['company'];
		$cont = $_POST['contact'];
		$mes = $_POST['message'];
		$check = $_POST['checkmate'];
		$date = date("Y-m-d");
		$_POST['date'] = $date;

		$query = "INSERT INTO contact (com_date, name, company, com_number, com_inquiry) VALUES ('".$date."','".$name."','".$comp."','".$cont."','".$mes."')";

		if (mysqli_query($connect, $query)) {
			echo "<script>alert('Thank you for giving us your suggestion!');</script>";
			echo "<script>window.location.href = 'main.php'</script>";
		} else {
			echo "<script>alert('Contact your Administrator');</script>";
			echo "<script>window.location.href = 'contact.php'</script>";
		}

	}

	?>

</div>

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