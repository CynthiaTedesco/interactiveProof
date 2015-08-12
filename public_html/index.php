<?php 
require_once("../resources/config.php");
require_once(TEMPLATES_PATH."/header.php");
//require_once("../resources/connection.php");

try {	
		$conn = mysqli_connect('localhost','root', '', 'le-moins-cher');
		if (!$conn) {
			die('Could not connect: ' . mysqli_error($conn));
		}

		mysqli_select_db($conn,"le-moins-cher");
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	
$sql="SELECT * FROM producto";
mysqli_set_charset($conn, 'utf8');
$result = mysqli_query($conn,$sql);
var_dump($result);

?>

<html>	
<head>
	<script src="../vendor/components/jquery/jquery.min.js"></script>
	<script type="text/javascript">
			
		function showProducts() {
			console.log("buscando productos");
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					try {
						console.log(JSON.parse(xmlhttp.responseText));
					} catch (e) {
						console.log(e);
					}
					
				}
				
			}
			xmlhttp.open("GET","getProducts.php",true);
			xmlhttp.send();
		}
</script>
</head>
<body>
	<div id="container">
		<div id="content" background-color=red>
		
			<p>Productos</p>
			<button id="products" type="button" onClick="showProducts()">Cargar productos!</button>
			<br>
			<select name="selectProducts"> <?
				while($row = mysqli_fetch_array($result)) {
					echo "<option value=\"" . $row['pro_id'] . "\">" . $row['nombre'] . "</option>";
			?>
			</select>
			<div id="txtHint"><b>Product info will be listed here...</b></div>
			<br /><br /><br />
			
			<!-- jquery in line -->
			<div id="capa1" style="padding: 10px; background-color: #ff8800">Haz clic en un botón</div>
			<br />
			<input type="button" value="Botón A" onclick="$('#capa1').html('Has hecho clic en el botón <b>A</b>')">
			<input type="button" value="Botón B" onclick="$('#capa1').html('Recibido un clic en el botón <b>B</b>')">
		</div>
		<?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>
	</div>
	<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</body>
</html>
