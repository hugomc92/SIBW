// Validar el campo del teléfono
function validatePhone() {
	
	var phoneNumber = document.getElementById('phone').value;
	
	if(!(/^(((00|\+)\d{2})\d{9}$)|(((00|\+)\d{2})?[9876]\d{8}$)/.test(phoneNumber))) {
		set_border_color('phone', 'red');
		
		return false;
	}
	
	set_border_color('phone', 'green');
	
	return true;
}

// Validar el campo del email
function validateEmail() {
	
	var email = document.getElementById('email').value;
	
	if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,10})+$/.test(email))) {
		set_border_color('email', 'red');
		
		return false;
	}
	
	set_border_color('email', 'green');
	
	return true;
}

var minRows = 3;
var maxRows = 24;

// Cambiar altura del campo del mensaje según su contenido
function resize() {

	var message = document.getElementById('message');
	
	if(message.scrollTop == 0)
		message.scrollTop=1;
    
	while(message.scrollTop == 0) {
		if (message.rows > minRows)
			message.rows--;
		else
			return;
			
		message.scrollTop = 1;
		
		if(message.scrollTop > 0) {
			message.rows++;
			return;
		}
	}
	
	while(message.scrollTop > 0) {
		if(message.rows < maxRows) {
			message.rows++;
			
			if(message.scrollTop == 0) 
				message.scrollTop=1;
		}
		else {
			message.style.overflowY = "auto";
			return;
		}
	}
}

// Crear una alerta propia, en vez del alert del navegador
function CustomAlert() {
	
    this.show = function (dialog, show_ok) {
		
        var overlay = document.getElementById('overlay');

		overlay.style.visibility = "visible";
		overlay.style.opacity = "1";

        document.getElementById('alert_message').innerHTML = dialog;
		document.getElementById('accept').style.display = show_ok;
    }
    this.ok = function () {
		
        this.hide();
    }
    this.hide = function () {
		
       	overlay.style.visibility = "hidden";
		overlay.style.opacity = "0";	
    }
}

// Llamar con mayor facilidad a la alerta propia
var Alert = new CustomAlert();

var thank_message = '<p>Gracias por contactar con nosotros.</p><p>Nos pondremos en contacto a la mayor brevedad posible.</p>';

// Verificar que está correcto y mostrar alertas con información
function send_form() {

	if(test_text('name') && validatePhone() && validateEmail() && test_text('message')) {
		Alert.show(thank_message, "none");
		
		return true;
	}
	else {		
		var msg = '<p>Faltan por rellenar o no están correctamente los siguientes campos:</p><ul>'
		
		if(!test_text('name'))
			msg += "<li>Nombre y Apellidos</li>";
		if(!validatePhone())
			msg += "<li>Teléfono</li>";
		if(!validateEmail())
			msg += "<li>E-mail</li>";
		if(!test_text('message'))
			msg += "<li>Mensaje de contacto</li>";
		
		msg += '</ul>';
		
		Alert.show(msg, "unset");
		
		return false;
	}
}

// Limpiar los campos del formulario y establecer la posición inicial de las etiquetas
function clear_form() {
	
	set_border_color('name', 'red');
	set_border_color('phone', 'red');
	set_border_color('email', 'red');
	set_border_color('message', 'red');
	
	document.getElementById('lname').className = "";
	document.getElementById('lphone').className = "";
	document.getElementById('lemail').className = "";
	document.getElementById('lmessage').className = "";
}

// Mover las etiquetas cuando tiene el foco
function field_focu(id) {

	document.getElementById('l'+id).className = "foc";
}

// Comprobar que hay texto en el campo pasado por id
function test_text(id) {
	if(document.getElementById(id).value == '') {
		set_border_color(id, 'red');
		
		if(document.getElementById(id) == document.activeElement)
			document.getElementById('l'+id).className = "foc";
		else
			document.getElementById('l'+id).className = "";
		
		return false;
	}
	else {
		if(id != 'phone' && id != 'email')
			set_border_color(id, 'green');
			
		document.getElementById('l'+id).className = "foc";
			
		return true;
	}
}