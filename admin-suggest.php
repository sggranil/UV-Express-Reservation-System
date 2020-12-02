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
	<title>Suggestions</title>
	<meta lang="en" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="HandheldFriendly" content="true" />
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet" />
	<link rel="icon" href="assets/ico/ico_uv.png" type="image/gif" sizes="HeightxWidth|any" />
</head>


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

/* Content */

	.data
		{
			text-align: left;
			max-width: 1500px;
			display: block;
			margin: 0 auto;
		}

	table
		{
			padding-top: 50px;
		}

	th, td
		{
			padding: 10px 80px;

</style>


<body>

<header>
	<img class="logo-white" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">
	<ul>
		<li><a href="admin-transact.php">Manage Transactions</a></li>
		<li><a href="admin-manage.php">Manage Trips</a></li>
		<li><a href="admin-suggest.php"><u>Suggestions</a></u></li>
		<li><form action="admin-logout.php" method="post"><input type="submit" name="logout" value="Logout"></form></li>
	</ul>
</header>

<h2 style="padding-left: 90px;">Suggestion Menu</h2>
<hr>

<div class="data">
	<table>
		<tr>
			<th>Date</th>
			<th>Name of Costumer</th>
			<th>Company</th>
		</tr>

	<?php

		$server = "localhost";
		$mdbuser = "root";
		$mdbpass = "";
		$dbname = "uv_express";

		$connect = mysqli_connect($server, $mdbuser, $mdbpass, $dbname);
		$query = "SELECT * FROM contact";
		$search = mysqli_query($connect, $query);

	?>
	
	<?php while ($row = mysqli_fetch_array($search)) { ?>
		<tr>	
			<td><?php echo $row['com_date'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['company'];?></td>
			<td><a href="admin-sug-read.php?show=<?php echo $row['id']?>" style="text-decoration: none; color: white; background-color: #000080; padding: 5px 10px; border-radius: 5px;" alt="edit">Read</a></td>
			<td><?php echo"<a href=delete-sug.php?delete=".$row['id']." style='text-decoration: none; color: white; background-color: #000080; padding: 5px 10px; border-radius: 5px;'>Delete</a>" ?></td>
		</tr>
	<?php } ?>
	</table>
</div>

</body>
</html>