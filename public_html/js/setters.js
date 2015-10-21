function setSupermarket(callback, supermarketName) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	var params = "supermarketName=" + supermarketName;
	xmlhttp.open("POST","setSupermarket.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			callback(xmlhttp.responseText);
		}
	}
	
	xmlhttp.send(params);
};

function setAddress(callback, supermarketBranchStreet, supermarketBranchNumber, supermarketBranchPostalCode, supermarketBranchCity){
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	var params = 'supermarketBranchStreet=' + supermarketBranchStreet
	+ '&supermarketBranchNumber=' + supermarketBranchNumber+'&supermarketBranchPostalCode=' + supermarketBranchPostalCode+'&supermarketBranchCity=' + supermarketBranchCity;
	
	xmlhttp.open("POST","setAddress.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			callback(xmlhttp.responseText);
		}
	}
	
	xmlhttp.send(params);
};