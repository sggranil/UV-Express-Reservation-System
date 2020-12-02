<?php

	$connect = mysqli_connect("localhost", "root", "", "uv_express");

	$sql = "DELETE FROM `contact` WHERE `id` = '$_GET[delete]' ";

	if (mysqli_query($connect, $sql)) {

		echo "<script>alert('Message has been deleted');</script>";
		header("refresh:1; url=admin-suggest.php");
	
	} else {
		echo "<script>alert('Deletion denied!');</script>";
		header("refresh:1; url=admin-suggest.php");
	}

?>