<?php

	$connect = mysqli_connect("localhost", "root", "", "uv_express");

	$sql = "DELETE FROM `pax_info` WHERE `pax_unipass` = '$_GET[confirm]' ";

	if (mysqli_query($connect, $sql)) {

		echo "<script>alert('Your transaction has been confirmed');</script>";
		header("refresh:1; url=admin-transact.php");
	
	} else {
		echo "<script>alert('Transaction denied!');</script>";
		header("refresh:1; url=admin-transact.php");
	}

?>