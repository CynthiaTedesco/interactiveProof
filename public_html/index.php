<?php 
require_once("../resources/config.php");
require_once(TEMPLATES_PATH."/header.php");
?>

<html>	
<head>
	<script>
	
		/*$(document).ready(function(){
		jAlert('This is a custom alert box', 'Alert Dialog');
			$('#products').click(function(){
				var clickBtnValue = $(this).val();
				var ajaxurl = 'getProducts.php',
				data =  {'action': clickBtnValue};
				$.post(ajaxurl, data, function (response) {
					// Response div goes here.
					alert("action performed successfully");
				});
			});
		});*/

		/*function showSomething(){
			if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("txtProducts").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","getProducts.php",true);
			xmlhttp.send();
			}*/
		
		/*$document.ready($.ajax({
			type: "POST",
			url: 'connection.php',
			dataType: 'json',
			data: {functionname: 'connect', arguments: ''},

			success: function (obj, textstatus) {
						  if( !('error' in obj) ) {
							  yourVariable = obj.result;
						  }
						  else {
							  console.log(obj.error);
						  }
					}
		}));*/
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