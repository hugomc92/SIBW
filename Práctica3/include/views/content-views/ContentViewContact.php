<?php

	class ContentViewContact {
		
		private $content;
		
		public function ContentViewContact($content) {
			
			$this->content = $content;
		}
		
		public function generateHTML() {
            
            global $contact;
			
			echo '
				<!-- Contenido del contacto y mapa -->
				<div class="content">
					<!-- iframe con el contenido del GoogleMap para que se muestre el Hotel Plaza Nueva -->
					<iframe id="googleMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1589.489245434874!2d-3.5972643418174695!3d37.17698213208027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fcb8cb9390e1%3A0x9253186efccf153a!2sHotel+Plaza+Nueva!5e0!3m2!1ses!2sus!4v1456708515677" width="100%" height="600px" frameborder="0" allowfullscreen></iframe>
					<!-- Información de contacto -->
					<address id="contact_info">
						<h2>'.$contact['contacttitle1'].'</h2>
						<ul>
							<li>'.$contact['contactdata1'].'</li>
							<li>'.$contact['contactdata2'].'</li>
							<li>'.$contact['contactdata3'].'</li>
							<li>'.$contact['contactdata4'].'</li>
							<li>'.$contact['contactdata5'].' <strong>'.$this->content->getPhone().'</strong></li>
							<li>'.$contact['contactdata6'].' <strong>'.$this->content->getFax().'</strong></li>
							<li>'.$contact['contactdata7'].' <a href="mailto:'.$this->content->getEmail().'"><strong>'.$this->content->getEmail().'</strong></a></li>
						</ul>
					</address>
					<!-- Descripción informativa de cómo llegar al Hotel -->
					<div id="arrive">
						<h2>'.$contact['contacttitle2'].'</h2>
						<p>'.$contact['contacttext1'].'</p>
						<p>'.$contact['contacttext2'].'</p>
						<p>'.$contact['contacttext3'].'</p>
						<p>'.$contact['contacttext4'].'</p>
					</div>
					<!-- Contacto del cliente -->
					<div id="contact_client">
						<h2>'.$contact['formtitle'].'</h2>
						<!-- Formulario de contacto -->
						<form id="contact_form" action="index.php?sec=contact" onsubmit="return send_form();" method="post">
							<!-- Imagen, etiqueta y entrada para el nombre y apellidos -->
							<div id="dname">
								<img src="'.$this->content->getIcons()[0].'" width="40px" height="40px"/>
								<input id="name" class="field" type="text" name="name" onkeyup="test_text(\'name\')" onchange="test_text(\'name\')" onfocus="field_focu(\'name\')" onblur="test_text(\'name\')"/>
								<label for="name" id="lname">'.$contact['form1'].'</label>
							</div>
							<!-- Imagen, etiqueta y entrada para el teléfono -->
							<div id="dphone">
								<img src="'.$this->content->getIcons()[1].'" width="40px" height="40px"/>
								<input id="phone" class="field" type="tel" name="phone" onkeyup="validatePhone()" onchange="validatePhone(); test_text(\'phone\');" onfocus="field_focu(\'phone\')" onblur="test_text(\'phone\')"/>
								<label for="phone" id="lphone">'.$contact['form2'].'</label>
							</div>
							<!-- Imagen, etiqueta y entrada para el email -->
							<div id="demail">
								<img src="'.$this->content->getIcons()[2].'" width="40px" height="40px"/>
								<input id="email" class="field" type="email" name="email" onkeyup="validateEmail()" onchange="validateEmail(); test_text(\'email\');" onfocus="field_focu(\'email\')" onblur="test_text(\'email\')"/>
								<label for="email" id="lemail">'.$contact['form3'].'</label>
							</div>
							<!-- Imagen, etiqueta y entrada para el mensaje a enviar -->
							<div id="dmessage">
								<img src="'.$this->content->getIcons()[3].'" width="40px" height="40px"/>
								<label for="message" id="lmessage">'.$contact['form4'].'</label>
								<textarea id="message" name="message" rows="3" onkeyup="resize(); test_text(\'message\');" onchange="test_text(\'message\')" onfocus="field_focu(\'message\')" onblur="test_text(\'message\')"></textarea>
								
							</div>
							<!-- Botón de limpiar el formulario -->
							<input class="form_button" id="clear" type="reset" value="'.$contact['formbutton1'].'" name="clear" onclick="clear_form()"/>
							<!-- Botón de enviar el formulario -->
							<input class="form_button" id="send" type="submit" value="'.$contact['formbutton2'].'" name="contact_submit"/>
						</form>
					</div>
					<div id="overlay">
						<div id="popup">
							<h2 id="title">HOTEL PLAZA NUEVA</h2>
							<div id="alert_message"></div>
							<button id="accept" class="form_button" onclick="Alert.ok()">'.$contact['formbutton3'].'</button>
						</div>
					</div>
				</div>
			';
		}
	}
?>