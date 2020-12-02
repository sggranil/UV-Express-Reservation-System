<?php

session_start();

	if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) 
		{
			$_SESSION['status'] = 'invalid';
			unset($_SESSION['username']);	
			header('location: admin-login.php');
		}

?>