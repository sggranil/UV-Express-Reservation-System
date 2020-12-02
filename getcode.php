<?php

	if (isset($_POST['gencode'])) {

		$or = $_POST['ori'];
		$des = $_POST['des'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$pax = $_POST['pax'];
		$total = $_POST['total'];
		$name = $_POST['paxname'];
		$trip = $_POST['codex'];
		$orpax = $_POST['padex'];

		$minus = $orpax - $pax;

			$connect = mysqli_connect("localhost", "root", "", "uv_express");
			$query = "INSERT INTO pax_info (trip_code, pax_or, pax_des, pax_date, pax_time, pax_count, pax_total, pax_name) VALUES ('".$trip."','".$or."','".$des."','".$date."','".$time."','".$pax."','".$total."','".$name."')";
			$sql = "UPDATE trip_info SET trip_pax = '$minus' WHERE trip_code = '$trip'";

			if (mysqli_query($connect, $query) && mysqli_query($connect, $sql)) {
				echo "<script>window.location.href = 'final.php'</script>";
			} else {
				die("Error! ".msqli_error($connect));
				echo "<script>window.location.href = 'summary.php'</script>";
			}
	}

?>