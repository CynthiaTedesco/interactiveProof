<html>
	<head>
		<meta charset="utf-8">
		<!-- Bootstrap 3 is designed to be responsive to mobile devices. Mobile-first styles are part of the core framework. 
		The width=device-width part sets the width of the page to follow the screen-width of the device (which will vary depending on the device).
		The initial-scale=1 part sets the initial zoom level when the page is first loaded by the browser.!-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../vendor/components/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/components/jqueryui/themes/smoothness/jquery-ui.min.css">
		<script src="../vendor/components/bootstrap/js/bootstrap.min.js"></script>
		<script src="../vendor/components/jquery/jquery.min.js"></script>
		<script src="../vendor/components/jqueryui/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="css/customStyles.css">
		<script src="js/utils.js"></script>
		<script type="text/javascript">
			
		$(document).ready(function(){
			getSupermarkets(function callback(response){
				chargeSelectSupermarkets(response);
			}); 
			
		});
		
		function chargeSelectSupermarkets(supermarkets){
			var ps = JSON.parse(supermarkets)[0]; //es un gran elemento, pedimos el primero 	
			
			$.each(ps, function (index, value) {
				$('#selectSupermarket').append($('<option/>', { 
					value: index,
					text : value 
				}));
			});
		};
	</script>
	<script>
	
		$(function() {
			$( "#selectSupermarket" ).combobox();		
		});
	</script>
	</head>
	<body>
		<label>Supermercado </label>
		<button id="addSupermarket" type="button" class="btn btn-info">
			<span class="glyphicon glyphicon-plus"></span>
		</button>
		<select id="selectSupermarket">
		</select>
	</body>
</html>
