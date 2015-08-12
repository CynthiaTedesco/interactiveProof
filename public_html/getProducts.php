<?php 

$q = intval($_GET);

$conn = mysqli_connect('localhost','root', '', 'le-moins-cher');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($conn,"le-moins-cher");
$sql="SELECT * FROM producto";

mysqli_set_charset($conn, 'utf8');
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
    $x[$row['pro_id']]=$row['nombre'];
}

$response[] = $x;

echo json_encode($response);
mysqli_close($conn);

?>