<?php

function Connect()
{
	// $dbhost = "localhost";
	// $dbuser = "root";
	// $dbpass = "";
	// $dbname = "carrental";

	$dbhost = "localhost";
	$dbuser = "dnguyen106";
	$dbpass = "dnguyen106";
	$dbname = "dnguyen106";
	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

	return $conn;
}
?>