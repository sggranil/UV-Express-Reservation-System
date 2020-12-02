<?php

		if (isset($_POST['logout'])) 
			{
				$_SESSION['status'] = 'invalid';
				unset($_SESSION['username']);
				echo "<script>window.location.href = 'admin-login.php'</script>";
			}
	?>