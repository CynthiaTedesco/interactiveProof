<?php 
require_once("../resources/config.php");
require_once(TEMPLATES_PATH."/header.php");
?>

<html>	
<head>
	<script src="../vendor/components/jquery/jquery.min.js"/>
	</script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			alert("uy uy uy");
		});
		
		function showSomething(){
			alert("uy uy uy");
		};
		
		function escribirBienvenida(){ 
			console.log("consoleando");
		   document.write("<H1>Hola a todos</H1>") 
		}
		
	</script>
</head>
<body>
	<div id="container">
		<div id="content" background-color=red>
		
			<!-- javascript desde evento -->
			<p>Página principal</p>
			<button id="products" type="button" onClick="escribirBienvenida()">Click me!</button>
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
