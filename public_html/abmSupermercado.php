<html>
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
		$(function(){
			$("#spanNew").hide();
		});
		$(function() {
			$( "#selectSupermarket" ).combobox();
		});
		
		$(function() {
			$("#addSupermarket").click(function(){
				$('#spanNew').show();
				$("#supermarketName").focus();
			});
		});
		
		$(function(){
			$("#saveSupermarket").click(function(){
				setSupermarket(function callback(response){
					alert(response);
					if (response){
						alert("Se ha guardado con éxito el Supermercado");
					} else {
						alert("Ha ocurrido un error durante la creación de Supermercado");
					}
				}, $("#supermarketName").val());
			});
		});
	</script>
	</head>
	<body>
		<div class="ui-widget">
			<label>Supermercado </label>
			<button id="addSupermarket" type="button" class="btn btn-info">
				<span class="glyphicon glyphicon-plus"></span>
			</button>
			<select id="selectSupermarket">
			</select>
			
			<span id="spanNew">
				<div>
					<label>Nombre</label>
					<input id="supermarketName" type="text"></input>
				</div>
				<div>
					<div>
						<label>Sucursal</label>
					</div>
					<div>
						<label>Nombre de la sucursal</label>
						<input id="supermarketBranchName" type="text"></input>	
					</div>
					<div>
						<label>Dirección</label>
						<div>
							<label>Calle</label>
							<input id="supermarketBranchStreet" type="text"></input>
						</div>
						<div>
							<label>Número</label>
							<input id="supermarketBranchNumber" type="text"></input>
						</div>
						<div>
							<label>Código Postal</label>
							<input id="supermarketBranchPostalCode" type="text"></input>
						</div>
						<div>
							<label>Ciudad</label>
							<input id="supermarketBranchCity" type="text"></input>
						</div>
					</div>
					<div>
						<label>Horarios</label>
						<input id="supermarketBranchSchedule" type="text"></input>	
					</div>
				</div>
				<button id="saveSupermarket" type="button" class="btn btn-info">
				Agregar
				</button>
			</span>
		</div>
	</body>
</html>
