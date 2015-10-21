<?php

//herramienta de loggeo. BORRAR ESTA LINEA CUANDO ESTÉ LISTO
include("C:\Users\Cynthia\Documents\Utils\chromephp-master\ChromePhp.php");

require_once("connectDB.php");
$supermarketBranchStreet = $_POST['supermarketBranchStreet'];
$supermarketBranchNumber = $_POST['supermarketBranchNumber'];
$supermarketBranchPostalCode = $_POST['supermarketBranchPostalCode'];
$supermarketBranchCity = $_POST['supermarketBranchCity'];

$conn = connectDB();
$sql="INSERT INTO direccion (calle, numero, codigo_postal, villa) VALUES ('". $supermarketBranchStreet ."', '".$supermarketBranchNumber ."', '".$supermarketBranchPostalCode."', '".$supermarketBranchCity."');";

mysqli_query($conn,$sql);

if (mysqli_connect_errno()== 0){
	echo mysqli_insert_id($conn);
} else {
	echo mysqli_connect_errno();
}

mysqli_close($conn);

?>