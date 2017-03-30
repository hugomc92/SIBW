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