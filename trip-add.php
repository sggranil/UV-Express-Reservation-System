<?php

	$connect = mysqli_connect("localhost","root", "", "uv_express");
	
	if(isset($_POST['add']))
		{
			$or = mysqli_real_escape_string($connect, $_REQUEST['origin']);
			$des = mysqli_real_escape_string($connect, $_REQUEST['destination']);
			$date = mysqli_real_escape_string($connect, $_REQUEST['reservedate']);
			$time = mysqli_real_escape_string($connect, $_REQUEST['time']);
			$price = mysqli_real_escape_string($connect, $_REQUEST['price']);
			$pax = mysqli_real_escape_string($connect, $_REQUEST['pax']);

			$sql = "INSERT INTO trip_info (trip_or, trip_des, trip_date, trip_time, trip_price, trip_pax) VALUES ('$or', '$des', '$date', '$time', '$price', '$pax')";

			if(mysqli_query($connect, $sql))
				{
    				echo "<script>alert('Trip added!');</script>";
    				echo "<script>window.location.href = 'admin-manage.php'</script>";
				} else {
    				echo "<script>alert('ERROR! Try again');</script>". mysqli_error($connect);
    				echo "<script>window.location.href = 'admin-manage.php'</script>";
				}
		}
?>