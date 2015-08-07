<?php 

$q = intval($_GET);

$con = mysqli_connect('localhost','root', '', 'le-moins-cher');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"le-moins-cher");
$sql="SELECT * FROM producto";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo "- " . $row['nombre'];
    echo "</br>";
}

mysqli_close($con);

?>

<!--include "connection.php";

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
?>/*
!-->