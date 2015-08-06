<?php 
require_once("../resources/config.php");
require_once(TEMPLATES_PATH."/header.php");
?>

<html>	
<head>
	<script type="text/javascript" src="../vendor/components/jquery/jquery.min.js"/>
	<script type="text/javascript">
		
		function showSomething(){
			alert("lala");
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
			<p>Página principal</p>
			<button id="products" type="button" onClick="escribirBienvenida()">Click me!</button>
			<div id="capa" style="padding: 10px; background-color: #ff8800">Haz clic en un botón</div>
			<input type="button" value="Botón A" onclick="$('#capa').html('Has hecho clic en el botón <b>A</b>')">
			<input type="button" value="Botón B" onclick="$('#capa').html('Recibido un clic en el botón <b>B</b>')">
		</div>
		<?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>
	</div>
	<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</body>
</html>
