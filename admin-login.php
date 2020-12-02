<?php

	$connect = mysqli_connect("localhost", "root", "", "uv_express");

	session_start();

if(isset($_SESSION['status']))
{
	if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) 
		{	
			$_SESSION['status'] = 'invalid';
		}

	if ($_SESSION['status'] == 'valid') 
		{	
			session_unset();
			echo "<script>window.location.href = 'admin-transact.php'</script>";
		}
}

	if (isset($_POST['login'])) 
		{
			$username = trim($_POST['user']);
			$password = trim($_POST['pass']);

			if (empty($username) || empty($password))
				{
					echo "<center style='position: relative; top: 385px; color: #000080; font-family: Cabin;'>Fill out the form!</center>";
				} else {

					$queryVal = "SELECT * FROM admin_info WHERE username = '$username' AND password = '$password'";
					$sqlVal = mysqli_query($connect, $queryVal);
					$rowVal = mysqli_fetch_array($sqlVal);

					if (mysqli_num_rows($sqlVal) > 0) 
						{

							$_SESSION['status'] = 'valid';
							$_SESSION['username'] = $rowVal['username'];

							echo "<script>window.location.href = 'admin-transact.php'</script>";

						} else {

							$_SESSION['status'] = 'invalid';
							echo "<center style='position: relative; top: 385px; color: #000080; font-family: Cabin;'>Invalid!</center>";
							
						}
				}
		}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta lang="en" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	<meta name="HandheldFriendly" content="true" />
	<link rel="stylesheet" type="text/css" href="css/admin.css" />
	<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet" />
	<link rel="icon" href="assets/ico/ico_uv.png" type="image/gif" sizes="HeightxWidth|any" />

</head>

<body>
	

<div class="admin">
	<img class="logo" src="assets/logo/logo_uv.png" alt="Non-Stop Zambales Experience!">

	<div class="login-php">
		<form action="admin-login.php" method="post">
			<input type="text" name="user" placeholder="Username" autocomplete="off" />
			<input type="password" name="pass" placeholder="Password" />
			<input type="submit" id="loginbtn" name="login" value="Login" />
		</form>
	</div>
</div>


</body>