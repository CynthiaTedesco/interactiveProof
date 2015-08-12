<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "le-moins-cher";

function connect() {
	try {	
		$conn = mysqli_connect('localhost','root', '', 'le-moins-cher');
		if (!$conn) {
			die('Could not connect: ' . mysqli_error($conn));
		}

		mysqli_select_db($conn,"le-moins-cher");

		return $conn;
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
}

function disconnect($conn){
	mysqli_close($conn);
}
?>