<?php

//herramienta de loggeo. BORRAR ESTA LINEA CUANDO ESTÉ LISTO
include("C:\Users\Cynthia\Documents\Utils\chromephp-master\ChromePhp.php");

require_once("connectDB.php");
$supermarketName = $_POST['supermarketName'];

$conn = connectDB();
$sql="INSERT INTO supermercado (nombre) VALUES ('". $supermarketName ."');";

mysqli_query($conn,$sql);

//echo mysqli_connect_errno();
if (mysqli_connect_errno()== 0){
	echo mysqli_insert_id($conn);
} else {
	echo mysqli_connect_errno();
};

mysqli_close($conn);

?>