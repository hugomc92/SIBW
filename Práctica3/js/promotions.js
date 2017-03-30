var continue_sliders = true;
var left_slide = 0;
var timeout = 7000;
var change_timeout = 10;
var ratio = 1;
var progress_interval = timeout / 200;


// Slide de promociones
function Slider() {
	
	if(continue_sliders) {
		left_slide += ratio;
		
		document.getElementById('cont_principals').style.left = "-" + left_slide + "%";
		document.getElementById('on').style.left = Math.round(left_slide/4.8) + "%";
		
		if(left_slide == 200) {
			progress();
			setTimeout(SliderBack, timeout);
			
			return;
		}
		
		if(!(left_slide % 100)) {
			progress();
			setTimeout(Slider, timeout);
			
			return;
		}
		
		setTimeout(Slider, change_timeout);
	}
}

// Slide hacia atrás de promociones
function SliderBack() {
	
	if(continue_sliders) {
		left_slide -= ratio;
		
		document.getElementById('cont_principals').style.left = "-" + left_slide + "%";
		document.getElementById('on').style.left = Math.round(left_slide/4.8) + "%";
		
		if(left_slide == 100) {
			progress();
			setTimeout(SliderBack, timeout);
			
			return;
		}
		
		if(left_slide == 0) {
			progress();
			setTimeout(Slider, timeout);
			
			return;
		}
		
		setTimeout(SliderBack, change_timeout);
	}
}

// Barra de progreso, para saber cuándo va a cambiar la promoción
function progress() {
	
    var width = 1;
    var id = setInterval(advance, progress_interval);
	
    function advance() {
		
		if(continue_sliders) {
			if (width >= 100)
				clearInterval(id);
			else {
				width += 0.5; 
				document.getElementsByClassName('progress_bar')[0].style.width = width + '%';
				document.getElementsByClassName('progress_bar')[1].style.width = width + '%';
				document.getElementsByClassName('progress_bar')[2].style.width = width + '%';
			}
		}
		else {
			clearInterval(id);
			document.getElementsByClassName('progress_bar')[0].style.width = 0;
			document.getElementsByClassName('progress_bar')[1].style.width = 0;
			document.getElementsByClassName('progress_bar')[2].style.width = 0;
		}
		
		return;
    }
	
	return;
}

// Cambiar de promoción pinchando en alguno de los iconos del switch
function change_prom(num) {
	
	continue_sliders = false;
	document.getElementById('cont_principals').className = "chng";
	document.getElementById('on').className = "chng";
	
	switch(num) {
		case 1:
			document.getElementById('cont_principals').style.left = 0;
			document.getElementById('on').style.left = 0;
			
			break;
		case 2:
			document.getElementById('cont_principals').style.left = "-100%";
			document.getElementById('on').style.left = "25px";

			break;
		case 3:
			document.getElementById('cont_principals').style.left = "-200%";
			document.getElementById('on').style.left = "50px";

			break;
	}
	
	return;
}

// Lanzar las funciones al comienzo
progress();
setTimeout(Slider, timeout);