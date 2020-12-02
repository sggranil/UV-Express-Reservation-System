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

		/* Manage Transaction */

			.form-transact
				{
					position: relative;
					top: 25px;
					float: right;
					padding-right: 50px;
					cursor: pointer;
				}

				input[type=text]
					{
						width: 190px;
						padding: 5px;
						border: 1px solid #d9d9d9;
						border-radius: 5px;
						font-size: 15px;
						font-family: 'Cabin', normal;
					}

				input[value=Search]
					{
						text-decoration: none;
						padding: 6px 20px;
						font-size: 15px;
						font-family: 'Cabin', normal;
						border: none;
						border-radius: 5px;
						background-color: #000080;
						color: white;
						cursor: pointer;
					}

				input[value=Search]:hover
					{
						color: #000080;
						background-color: #ffd700;
					}

			table, th
				{
					position: relative;
					top: 20px;
					padding: 5px 40px;
					font-family: 'Cabin';
				}

				#confirm
					{
						text-decoration: none;
						border: none;
						border-radius: 5px;
						font-size: 12px;
						font-family: 'Cabin', normal;
						padding: 5px 10px;
						background-color: #000080;
						color: white;
						cursor: pointer;
					}

				#confirm:hover
					{
						color: #000080;
						background-color: #fdd700;
					}

			/* Manage Trips */

	</style>

<body>
	
<header>
	<img class="logo-white" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">

	<ul>
		<li><a href="admin-transact.php"><u>Manage Transactions</a></u></li>
		<li><a href="admin-manage.php">Manage Trips</a></li>
		<li><a href="admin-suggest.php">Suggestions</a></li>
		<li><form action="admin-logout.php" method="post"><input type="submit" name="logout" value="Logout"></form></li>
	</ul>

</header>

<!-- Transaction -->

<div id='transact'>
	<div class="form-transact">
		<form id="queryForm" action="admin-transact.php" method="post">
			<input type="text" name="unipass" placeholder="Unique Password" autocomplete="off">
			<input type="submit" name="searchquery" value="Search">
		</form>
	</div>

		<table>
			<tr>
				<th>Trip Code</th>
				<th>Unique ID</th>
				<th>Origin</th>
				<th>Destination</th>
				<th>Departure Date</th>
				<th>Departure Time</th>
				<th>Passenger Count</th>
				<th>Total</th>
				<th>Passenger Name</th>
				<th>Transaction</th>
			</tr>

			<?php

				if (isset($_POST['searchquery'])) {


					$unipassSearch = $_POST['unipass'];
					$queryPass = "SELECT * FROM `pax_info` WHERE `pax_unipass` LIKE '%".$unipassSearch."%'";
					$search_result = filterTable($queryPass);

				} 
					else {
						$query = "SELECT * FROM `pax_info`";
						$search_result = filterTable($query);
				}


				function filterTable($query)
					{
						$server = "localhost";
						$mdbuser = "root";
						$mdbpass = "";
						$dbname = "uv_express";

						$connect = mysqli_connect($server, $mdbuser, $mdbpass, $dbname);
						$filter_Result = mysqli_query($connect, $query) or die("Error: ".mysqli_error($connect));
						return $filter_Result;
					}

			?>

			<?php while ($row = mysqli_fetch_array($search_result)):?>
				<tr>
					<th><?php echo $row['trip_code'];?></th>
					<th style="color: #000080;"><?php echo $row['pax_unipass'];?></th>
					<th><?php echo $row['pax_or'];?></th>
					<th><?php echo $row['pax_des'];?></th>
					<th><?php echo $row['pax_date'];?></th>
					<th><?php echo $row['pax_time'];?></th>
					<th><?php echo $row['pax_count'];?></th>
					<th>P<?php echo $row['pax_total'];?></th>
					<th><?php echo $row['pax_name'];?></th>
		<td><?php echo"<a href=delete-pax.php?confirm=".$row['pax_unipass']." style='text-decoration: none; color: white; background-color: #000080; position: relative; top: 20px; left: 40px; padding: 5px 10px; border-radius: 5px;'>Confirm</a>" ?></td>
				</tr>
			<?php endwhile;?>
		</table>
</div>

</body>
</html>