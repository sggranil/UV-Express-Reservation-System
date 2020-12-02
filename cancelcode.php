<?php

	if (isset($_POST['cancode'])) {

		$or = $_POST['ori'];
		$des = $_POST['des'];
		$name = $_POST['paxname'];
		$trip = $_POST['codex'];
		$orpax = $_POST['padex'];
		$pax = 1;

		$add = $orpax + $pax;

			$connect = mysqli_connect("localhost", "root", "", "uv_express");
			$query = "DELETE FROM pax_info WHERE pax_name = '{$name}'";
			$sql = "UPDATE trip_info SET trip_pax = '$add' WHERE trip_code = '$trip'";

			if (mysqli_query($connect, $query) && mysqli_query($connect, $sql)) {
				echo "<script>alert('Cancelled Successfully! I hope we will se each other again :)');</script>";
				echo "<script>window.location.href = 'main.php'</script>";
			} else {
				die("Error! ".msqli_error($connect));
				echo "<script>alert('Error! Please Try Again!');</script>";
				echo "<script>window.location.href = 'cancelsummary.php'</script>";
			}
	}

?>