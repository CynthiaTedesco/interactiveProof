﻿<?php 
require_once("connectDB.php");

//$q = intval($_GET);

$conn = connectDB();
$sql="SELECT * FROM producto";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
    $x[$row['pro_id']]=$row['nombre'];
}

$response[] = $x;

echo json_encode($response);
mysqli_close($conn);

?>