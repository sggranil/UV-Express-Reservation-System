<?php

	$connect = mysqli_connect("localhost", "root", "", "uv_express");

	$sql = "DELETE FROM `trip_info` WHERE `trip_code` = '$_GET[confirm]' ";

	if (mysqli_query($connect, $sql)) {

		echo "<script>alert('Trip successfuly cancelled');</script>";
		header("refresh:1; url=admin-manage.php");
	
	} else {
		echo "<script>alert('Trip cannot deleted!');</script>";
		header("refresh:1; url=admin-manage.php");
	}

?>