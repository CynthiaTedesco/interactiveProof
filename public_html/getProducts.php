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
    $response[] = $x;
}
$out = array_values($response);
echo json_encode($out);
mysqli_close($conn);

/*
include "connection.php";

/*if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'insert':
            insert();
            break;
        case 'select':
            select();
            break;
    }
}

function select() {
    echo "The select function is called.";
    exit;
}

function insert() {
    echo "The insert function is called.";
    exit;
}

function getProducts(){
	$conn = connect();
	
	$sql="SELECT * FROM table1";
    foreach ($conn->query($sql) as $row) {
        print $row['name'] . "\t";
        print $row['color'] . "\t";
        print $row['calories'] . "\n";
    }
	
	disconnect($conn);
} 
*/

?>