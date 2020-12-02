<?php

session_start();

	if (isset($_SESSION['status']) && $_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) 
		{
			$_SESSION['status'] = 'invalid';
			unset($_SESSION['username']);
			echo "<script>window.location.href = 'admin-login.php'</script>";
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<meta lang="en" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="HandheldFriendly" content="true" />
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet" />
	<link rel="icon" href="assets/ico/ico_uv.png" type="image/gif" sizes="HeightxWidth|any" />

</head>

<!-- Style -->

	<style type="text/css">	

			header
				{
					box-shadow: 0px 2px #d9d9d9;
					height: 40px;
				}

				.logo-white
					{
						position: relative;
						top: 5px;
						left: 70px;
						max-width: 150px;
					}

				ul
					{
						position: absolute;
						left: 250px;
						top: 20px;
						list-style-type: none;
						overflow: hidden;
						padding: 0;
						margin: 0;
					}

				li
					{
						float: left;
					}

				li a
					{
						text-decoration: none;
						padding: 5px; 
						color: #000080;
					}

				input[value=Logout]
					{
						border: none;
						font-family: 'Cabin', normal;
						font-size: 15px;
						background-color: white;
						color: #000080;
						cursor: pointer;
					}

			body
				{
					font-family: 'Cabin', normal;
				}

			/* Manage */

			table
				{
					position: absolute;
					top: 170px;
				}	

				td,th
					{
						text-align: center;
						padding: 10px 50px;
					}

			.createTrip
				{
					position: relative;
					top: 20px;
					left: 250px;
					border-radius: 15px;
					border: 1px solid #d9d9d9;
					float: left;
					padding: 30px;
				}

			select, input[value=Add], input[type=text], input[type=number], input[type=date]
				{
					padding: 5px 10px;
					font-family: 'Cabin', normal;
					font-size: 15px;
					border-radius: 5px;
					border: 1px solid #d9d9d9;
				}

			input[value=Add]
				{
					border: none;
					background: #000080;
					color: white;
					cursor: pointer;
				}

			input[value=Add]:hover
				{
					color: #000080;
					background-color: #ffd700;
				}

	</style>

<body>
	
<header>
	<img class="logo-white" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">

	<ul>
		<li><a href="admin-transact.php">Manage Transactions</a></li>
		<li><a href="admin-manage.php"><u>Manage Trips</a></u></li>
		<li><a href="admin-suggest.php">Suggestions</a></li>	
		<li><form action="admin-logout.php" method="post"><input type="submit" name="logout" value="Logout"></form></li>
	</ul>
</header>

<div id="manage">
	<div class="createTrip">
		<form action="trip-add.php" method="post">
			<label>Origin</label>
				<select name="origin" required />
					<option>Olongapo</option>
					<option>Sta. Cruz</option>
				</select>
			
			<label>Destination</label>
				<select name="destination" required />
					<option>Iba</option>
					<option>Sta. Cruz</option>
					<option>Olongapo</option>
				</select>
				
			<label>Date</label>
				<input type="text" name="reservedate" placeholder="Departure Date" min="2020-01-01" max="2020-12-31" onfocus="(this.type='date')" onblur="(this.type='text')" required />
				
			
			<label>Time</label>
				<select name="time" required />
					<option>8:00</option>
					<option>12:00</option>
					<option>16:00</option>
					<option>20:00</option>
				</select>	

			<label>Price P</label>
				<select name="price" required />
					<option>265</option>
					<option>235</option>
				</select>	

			<label>Passenger</label>
				<input type="number" name="pax" min="0" max="15">

				<input type="submit" name="add" value="Add">
		</form>
	</div>


	<div class="queryTrip">

		<table>
			<tr>
				<th>Trip Code</th>
				<th>Origin</th>
				<th>Destination</th>
				<th>Departure Date</th>
				<th>Departure Time</th>
				<th>Price</th>
				<th>Passenger Available</th>
				<th>Cancelation</th>
			</tr>
<?php

	$connect = mysqli_connect("localhost","root", "", "uv_express");
	$query = "SELECT * FROM trip_info";
	$filterResult = mysqli_query($connect, $query) or die("Error: ".mysqli_error($connect));

?>
			<tr>
			<?php while ($row = mysqli_fetch_array($filterResult)):?>
				<td><?php echo $row['trip_code'];?></td>
				<td><?php echo $row['trip_or'];?></td>
				<td><?php echo $row['trip_des'];?></td>
				<td><?php echo $row['trip_date'];?></td>
				<td><?php echo $row['trip_time'];?></td>
				<td><?php echo $row['trip_price'];?></td>
				<td><?php echo $row['trip_pax'];?>/15</td>
				<td><?php echo"<a href=trip-delete.php?confirm=".$row['trip_code']." style='text-decoration: none; color: white; background-color: #000080; position: relative; top: 0px; padding: 5px 10px; border-radius: 5px;'>Confirm</a>" ?></td>
			</tr>
		<?php endwhile;?>
		</table>


		<div>
			
		</div>



	</div>




</div>




</body>
</html>