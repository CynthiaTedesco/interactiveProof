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
	<script src="../vendor/components/jqueryui/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="css/customStyles.css">
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
				$('#selectProductos').append($('<option/>', { 
					value: index,
					text : value 
				}));
			});
		};
	</script>
	<script>
	(function( $ ) {
		$.widget( "custom.combobox", {
			_create: function() {
				this.wrapper = $( "<span>" )
					.addClass( "custom-combobox" )
					.insertAfter( this.element );

				this.element.hide();
				this._createAutocomplete();
				this._createShowAllButton();
			},

			_createAutocomplete: function() {
				var selected = this.element.children( ":selected" ),
					value = selected.val() ? selected.text() : "";

				this.input = $( "<input>" )
					.appendTo( this.wrapper )
					.val( value )
					.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: $.proxy( this, "_source" )
					});

				this._on( this.input, {
					autocompleteselect: function( event, ui ) {
						ui.item.option.selected = true;
						this._trigger( "select", event, {
							item: ui.item.option
						});
					},

					autocompletechange: "_removeIfInvalid"
				});
			},

			_createShowAllButton: function() {
				var input = this.input,
					wasOpen = false;

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.appendTo( this.wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "custom-combobox-toggle ui-corner-right" )
					.mousedown(function() {
						wasOpen = input.autocomplete( "widget" ).is( ":visible" );
					})
					.click(function() {
						input.focus();

						// Close if already visible
						if ( wasOpen ) {
							return;
						}

						// Pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
					});
			},

			_source: function( request, response ) {
				var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
				response( this.element.children( "option" ).map(function() {
					var text = $( this ).text();
					if ( this.value && ( !request.term || matcher.test(text) ) )
						return {
							label: text,
							value: text,
							option: this
						};
				}) );
			},

			_removeIfInvalid: function( event, ui ) {

				// Selected an item, nothing to do
				if ( ui.item ) {
					return;
				}

				// Search for a match (case-insensitive)
				var value = this.input.val(),
					valueLowerCase = value.toLowerCase(),
					valid = false;
				this.element.children( "option" ).each(function() {
					if ( $( this ).text().toLowerCase() === valueLowerCase ) {
						this.selected = valid = true;
						return false;
					}
				});

				// Found a match, nothing to do
				if ( valid ) {
					return;
				}

				// Remove invalid value
				this.input
					.val( "" )
					.attr( "title", value + " didn't match any item" )
					.tooltip( "open" );
				this.element.val( "" );
				this._delay(function() {
					this.input.tooltip( "close" ).attr( "title", "" );
				}, 2500 );
				this.input.autocomplete( "instance" ).term = "";
			},

			_destroy: function() {
				this.wrapper.remove();
				this.element.show();
			}
		});
	})( jQuery );

	$(function() {
		$( "#selectProductos" ).combobox();		
	});
</script>
</head>
<body>

<div class="container">
	<?php require_once(TEMPLATES_PATH."/header.php"); ?>
	<br/>
	<div class="ui-widget">
		<label>Producto </label>
		<select id="selectProductos">
		</select>
	</div>
	<br/>
	<?php require_once(TEMPLATES_PATH . "/rightPanel.php"); ?>
	<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>
</div>


</body>
</html>
