<?php 
require_once("connectDB.php");

$conn = connectDB();
$sql="SELECT * FROM supermercado";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
    $x[$row['sup_id']]=$row['nombre'];
}

$response[] = $x;

echo json_encode($response);
mysqli_close($conn);

?>