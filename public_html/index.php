<!doctype html>
<html lang="en">

<?php 
require_once("../resources/config.php");

?>

<head>
	<meta charset="utf-8">
	<!-- Bootstrap 3 is designed to be responsive to mobile devices. Mobile-first styles are part of the core framework. 
	The width=device-width part sets the width of the page to follow the screen-width of the device (which will vary depending on the device).
	The initial-scale=1 part sets the initial zoom level when the page is first loaded by the browser.!-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../vendor/components/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../vendor/components/jqueryui/themes/smoothness/jquery-ui.min.css">
	<script src="../vendor/components/jquery/jquery.min.js"></script>
	<script src="../vendor/components/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/components/jqueryui/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="css/customStyles.css">
	<script src="js/getters.js"></script>
	<script src="js/setters.js"></script>
	<script src="js/utils.js"></script>
	<script type="text/javascript">
			
		$(document).ready(function(){
			getProducts(function callback(response){
				chargeSelectProducts(response);
			}); 
			
			//getBrands(function callback(response){}

		});
		
		function chargeSelectProducts(products){
			var ps = JSON.parse(products)[0]; //es un gran elemento, pedimos el primero 	
			
			$.each(ps, function (index, value) {
				$('#selectProductos').append($('<option/>', { 
					value: index,
					text : value 
				}));
			});
		};
	</script>
	<script>
	
	$(function() {
		$( "#selectProductos" ).combobox();		
	});
	
</script>
<script>

	$(function(){
		$("#includedSupermarket").load("abmSupermercado.php");
	});
	
	$(function(){
		$("#includedProduct").hide();
	});
	
	$(function() {
		$("#addProduct").click(function() {
			$("#spanNewProduct").show();
	})});
</script>
</head>
<body>

<div class="container">
	<?php require_once(TEMPLATES_PATH."/header.php"); ?>
	<br/>
	<div class="ui-widget">
		
		<div id="includedSupermarket"></div>
		<div id="includedProduct">
			<span>
				<label>Producto </label>
				<button id="addProduct" type="button" class="btn btn-info">
					<span class="glyphicon glyphicon-plus"></span>
				</button>
				<select id="selectProductos">
				</select>
			</span>
			<span id="spanNewProduct">
				<div id="addProductDiv" >
					<label>Nombre </label>
					<input id="productName"></input>
				</div>
				<div>
					<label>Marca </label>
					<select id="selectMarcas">
					</select>
				</div>	
				<div>
					<label>Categoría </label>
					<select id="selectCategorias">
					</select>
				</div>	
				<div>
					<label>Palabra Clave </label>
					<select id="selectPalabrasClave">
					</select>
				</div>	
			</span>
		</div>
	</div>
	<br/>
	<?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>
	<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</div>


</body>
</html>
