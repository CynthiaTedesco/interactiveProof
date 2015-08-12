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
	<script src="js/getters.js"></script>
	<script type="text/javascript">
			
		$(document).ready(function(){
			getProducts(function callback(response){
				chargeSelectProducts(response);
			}); 
		});
		
		function chargeSelectProducts(products){
			var ps = JSON.parse(products)[0]; //es un gran elemento, pedimos el primero 	
			
			$.each(ps, function (index, value) {
				$('#selectProducts').append($('<option/>', { 
					value: index,
					text : value 
				}));
			});
		};
</script>
</head>
<body>
	<div id="container">
		<div id="content" background-color=red>
		
			<p>Productos</p>
			<select name="selectProducts" id="selectProducts"></select>
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
