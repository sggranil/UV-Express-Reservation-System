<?php

	$server = "localhost";
	$mdbuser = "root";
	$mdbpass = "";
	$dbname = "uv_express";

	$connect = mysqli_connect($server, $mdbuser, $mdbpass, $dbname);

	if (!$connect)
		{
			die("Connection Failed: ".mysqli_connect_error());
		}
?>