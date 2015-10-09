<?php 

function connectDB(){
	$conn = mysqli_connect('localhost','root', '', 'le-moins-cher');
	if (!$conn) {
		die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($conn,"le-moins-cher");
	mysqli_set_charset($conn, 'utf8');

	return $conn;
};
?>