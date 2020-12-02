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
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet" />
	<link rel="icon" href="assets/ico/ico_uv.png" type="image/gif" sizes="HeightxWidth|any" />
	<script src="https://kit.fontawesome.com/831aa9393c.js" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>

</head>

<style type="text/css">
	
	footer
		{
			margin: -8px;
			padding: 30px;
			background-color: #000080;
			color: white;
			font-family: 'Cabin';
			text-align: center
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

	#form
		{
			display: block;
		}

	.cancel
		{
			text-align: center;
			padding-top: 20px;
			padding-bottom: 100px;
		}

	#codexi
		{
			border: 1px solid #d9d9d9;
			border-radius: 5px;
			font-size: 20px;
			font-family: 'Cabin';
			padding: 8px 15px;
		}
	
	#submiti
		{
			background-color: #000080;	 
			color: white;
			border: none;
			border-radius: 5px;
			font-size: 20px;
			font-family: 'Cabin';
			padding: 8px 20px;
			cursor: pointer;
		}

	input[type=number]
		{
			border: none;
			width: 45px;
			font-size: 20px;
		}

	@media screen and (min-width: 481px) and (max-width: 767px)
		{
			.cancel
				{
					text-align: center;
					padding-top: 100px;
					padding-bottom: 100px;
				}

			#codexi
				{
					margin-bottom: 20px;
				}
		}

</style>

<body>

<!-- Header -->

	<header>
		<img class="logo" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">
	</header>


<!-- Body -->

<div class="main">
	
	<h1 style="font-family: 'Kaushan Script', cursive; font-size: 70px; text-align: center; line-height: 70px; color: #ffd700; text-shadow: 2px 2px #000080;">Explore Zambales!</h1>
		<center class="center">
			<p class="desu">A New Way of Web Navigating</p>
			<p class="mobu"><i class="fas fa-desktop"></i> Hover the images below<br><i class="fas fa-mobile-alt"></i> Tap the images below</p>
		</center>
			
			<hr color="#ffd700">

	<!-- Navigation Banners -->

		<div class="banner">	
			<div class="content">	
				<div class="pinatubo">
					<img src="assets/banner/pin_320.jpg" alt="Photo by JC Gellidon">
						<div class="pinatubo-hov">
	    					<div class="headline-pin">Hike<br>Mount Pinatubo</div>
	    						<a class="btn-book-pin" href="#resform">Book Now</a>
	  					</div>
				</div>
			</div>
				
			<div class="content">	
				<div class="magsaysay">
					<img src="assets/banner/mag_320.jpg" alt="Photo by Magsaysay Ancestoral House">
						<div class="magsaysay-hov">
	    					<div class="headline-mag">Learn<br>Magsaysay's<br>History</div>
	  							<a href="map.php" class="btn-book-mag">Route Map</a>
	  					</div>
				</div>
			</div>

			<div class="content">	
				<div class="poon">
					<img src="assets/banner/poo_320.jpg" alt="Photo by Office of the Shrine of Ina Poon Bato">
						<div class="poon-hov">
	    					<div class="headline-poo">Discover<br>Little<br>Manaoag</div>
	    						<a href="map.php" class="btn-book-poo">Fare and Schedule</a>
	  					</div>
				</div>
			</div>

			<div class="content">	
				<div class="mango">
					<img src="assets/banner/man_320.jpg" alt="Photo from Byahe ni Drew on GMA">
						<div class="mango-hov">
	    					<div class="headline-man">Taste our<br>Delicious<br>Mango</div>
	    						<a class="btn-book-man" href="contact.php">Contact Us</a>
	  					</div>
				</div>
			</div>		
		</div>
	<hr color="#000080"><br><br>

	<!-- Form -->

	<div id="resform" class="resform">
		<form action="transaction.php" method="get">
			<div class="form-ori">
				<div class="navico1">
					<select id="origin" name="origin" onchange="pickOr()" required />
						<option value="" disabled selected>Choose your Origin</option>
						<option value="Olongapo">Olongapo</option>
						<option value="Sta. Cruz">Sta. Cruz</option>
					</select>
				</div>
			</div>

			<div class="form-desi">	
				<div class="navico2">
					<select id="destination" name="destination" onchange="pickDes()" disabled="true" required />
						<option value="" disabled selected>Choose your Destination</option>
						<option value="Olongapo">Olongapo</option>
						<option value="Iba">Iba</option>
						<option value="Sta. Cruz">Sta. Cruz</option>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-date">
					<input type="text" name="reservedate" id="form-date-pic" placeholder="Departure Date" min="2020-01-01" max="2020-12-31" onfocus="(this.type='date')" onblur="(this.type='text')" required />
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-pas">
					<label for="passenger" style="font-size: 20px;">Passenger: </label>
					<input type="number" name="num" max="1" min="1" value="1">
				</div>
			</div>

			<div class="form-row">
				<div class="search-btn">
					<input type="submit" name="tripsearch" id="search-book" value="Search">
				</div>
			</div>
		</form>

			<div class="form-row">
				<div class="remind">
					<h3>Reminders:</h3>
						<p>1. Availability of trips are limited.</p>
						<p>2. Multiple reservation per transaction is not available at this time.</p>
						<p>3. Double check the form before submitting.</p>
						<p>4. We do not accept any mode of online cash transaction, proceed to our reservation booth.</p>
						<p>5. Failure to arrive to the terminal 15 minutes prior to your reserved slot will be awarded to other chance passenger.</p>
				</div>
			</div>


	</div>

	<div class="cancel">
		
		<h2 style="font-family: 'Kaushan Script', cursive; font-size: 30px; text-align: center; line-height: 70px; color: #ffd700; text-shadow: 2px 2px #000080;">Cancel A Trip!</h2>

		<form action="cancel.php" method="get">
			<input type="text" id="codexi" name="code" maxlength="6" placeholder="Enter your Unique Code" required autocomplete="off">
			<input type="submit" id="submiti" name="cancel" value="Search">
		</form>

	</div>

</div>

<!-- Footer -->

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