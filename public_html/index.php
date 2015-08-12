<!DOCTYPE html>

<?php 
require_once("../resources/config.php");
?>

<html>	
<head lang="en">
	<meta charset="utf-8"> 
	<!-- Bootstrap 3 is designed to be responsive to mobile devices. Mobile-first styles are part of the core framework. 
	The width=device-width part sets the width of the page to follow the screen-width of the device (which will vary depending on the device).
	The initial-scale=1 part sets the initial zoom level when the page is first loaded by the browser.!-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="../vendor/components/jquery/jquery.min.js"></script>
	<script src="../vendor/components/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../vendor/components/bootstrap/css/bootstrap.min.css">
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
	<div class="container">
		<?php require_once(TEMPLATES_PATH."/header.php"); ?>
		<div id="content" background-color=red>
		
			<p>Productos</p>
			<select name="selectProducts" id="selectProducts"></select>
			<br /><br /><br />

		</div>
		<?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>
		<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
	</div>
</body>
</html>
