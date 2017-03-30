var open_menu = false;

function openCloseMenu() {
	
	var hamburguer = document.getElementById('admin_hamburguer');
	var menu = document.getElementById('admin_sidebar');
	
	if(!open_menu) {
		hamburguer.className += "selected";
		menu.className += "selected";
		
		open_menu = true;
	}
	else {
		hamburguer.className = "";
		menu.className = "";
		
		open_menu = false;
	}
}

function hightlight(id, cName) {
	
	var check = document.getElementById(id);
	var elements = document.getElementsByClassName(cName);
	
	if(check.checked == 1) {
		for(var i=0; i<elements.length; i++)
			elements[i].style.opacity = "0.5";
	}
	else {
		for(var i=0; i<elements.length; i++)
			elements[i].style.opacity = "1";
	}
}

function showInfo(id) {
	
	var element = document.getElementById(id);
	var all_elements = document.getElementsByClassName("info_name");
	var content = document.getElementById(id + "_content");
	var all_contents = document.getElementsByClassName("info_content");

	for(var i=0; i<all_elements.length; i++) {
		if(all_elements[i] != element) {
			all_elements[i].className = "info_name";
			all_contents[i].className = "info_content";
		}
		else {
			if(element.className.length < 10) {
				element.className += " selected";
				content.className += " selected";
			}
			else {
				element.className = "info_name";
				content.className = "info_content";
			}
		}
	}
}

function findBooking(str) {

	if (str.length == 0) {
		document.getElementById("live_search").innerHTML = "";
		
		return;
	}
	if (window.XMLHttpRequest) {		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {  							// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("live_search").innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open("GET", "funct/findBookings.php?search="+str, true);
	
	xmlhttp.send();
}

function detailBooking(bookingCode) {

	if (window.XMLHttpRequest) {		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {  							// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("booking_info").innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open("GET", "funct/detailsBooking.php?code="+bookingCode, true);
	
	xmlhttp.send();
}