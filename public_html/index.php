<?php 
require_once("../resources/config.php");
require_once(TEMPLATES_PATH."/header.php");
?>

<html>	
<head>
	<script type="text/javascript">
		
		function showSomething(){
			alert("lala");
		};
		
		
	</script>
</head>
<body>
	<div id="container">
		<div id="content" background-color=red>
			<p>Página principal</p>
			<button id="products" type="button" onClick="showSomething()">Click me!</button>
		</div>
		<?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>
	</div>
	<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</body>
</html>
