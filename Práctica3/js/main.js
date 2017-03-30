var scroll_pos = 0;

document.onscroll = function() {
	
	var header = document.querySelector("header");
	
	if(window.innerWidth <= 836) {
		var current_scroll = window.scrollY;
		
		if(window.scrollY == 0)
			header.className = "";
		else if(window.scrollY >= header.clientHeight) {
			if(current_scroll >= scroll_pos)
				header.className = "scrolled";
			else
				header.className = "";
				
			scroll_pos = current_scroll;
		}
	}
	else
		header.className = "";
		
	return;
};

function stylize() {
	
	var content_height = document.getElementsByClassName('content')[0].clientHeight;

	if(window.innerWidth > 836) {		
		document.getElementById('sidebar').style.height = (content_height) + "px";
	}
	else {
		//document.getElementById('sidebar').style.height = "-webkit-fit-content";
		document.getElementById('sidebar').style.height = "fit-content";
	}

	var sec = location.search.substr(location.search.indexOf("=") + 1);
	
	if(sec.indexOf("&") != -1)
		sec = sec.substring(0, sec.indexOf("&"));
		
	if(sec == 'promotions' && window.innerWidth <= 836) {
		var prom_menu = document.getElementById('prom_menu');
		
		prom_menu.style.top = "-" + (content_height-150) + "px";
	}
	
	if(sec == 'rooms' && window.innerWidth <= 836) {
		var prom_menu = document.getElementById('prom_menu');
		var rooms_tile = document.getElementById('rooms_title');
		
		prom_menu.style.top = "-" + (content_height-rooms_title.scrollHeight-80) + "px";
	}
	
	return true;
}

window.onload = stylize;

window.onresize = stylize;