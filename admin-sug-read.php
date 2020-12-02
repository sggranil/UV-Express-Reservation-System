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
	<title>Read Suggestions</title>
	<meta lang="en" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="HandheldFriendly" content="true" />
	<link media="all" rel="stylesheet" type="text/css" href="css/main.css" />
	<link media="all" rel="stylesheet" type="text/css" href="css/media.css" />
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

/* Main */

	.mainclass
		{
			max-width: 700px;
			display: block;
			margin-right: auto;
			margin-left: auto;
		}

	.form-sub
		{
			position: relative;
			top: 100px;
		}

</style>

<body>

<!-- Header -->

	<header>
			<img class="logo" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">
	</header>

<div class="mainclass">

	<?php

		if (isset($_GET['show'])) {

			$edited = $_GET['show'];

			$connect = mysqli_connect("localhost", "root", "", "uv_express");
			$query = "SELECT * FROM contact WHERE id = '{$edited}'";
			$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error($connect));
		}

	?>
	<a href="admin-suggest.php" style="position: relative; top: 50px; ti"><< Go Back to Suggestion Panel</a>
	<div class="form-sub">	
			<?php while ($row = mysqli_fetch_array($result)) { ?>

				<b><?php echo $row['name'];?></b>
				<br><?php echo $row['company'];?>
				<br><?php echo $row['com_date'];?>
				<br><?php echo $row['com_number'];?>

				<br><br><br><br><?php echo $row['com_inquiry'];?>


			<?php } ?>
	</div>

</div>

</body>
</html>