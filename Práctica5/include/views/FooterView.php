<?php

	class FooterView {
		
		private $footer;
		
		public function FooterView($footer) {
			
			$this->footer = $footer;
		}
		
		public function generateHTML() {
			
			global $sec;
			global $langInputEnd;
            global $general;
			
			echo '
				<!-- Footer de la página -->
				<footer>
					<!-- Información de contacto -->
					<address class="contact">
						<ul>
							<li>Hotel Plaza Nueva</li>
							<li>Imprenta, nº 2. 18010 '.$general['location'].'</li>
							<li>'.$general['phone'].': '.$this->footer->getPhone().'</li>
							<li>Fax: '.$this->footer->getFax().'</li>
							<li><a href="mailto:'.$this->footer->getEmail().'">'.$this->footer->getEmail().'</a></li>
						</ul>
					</address>
					<!-- Enlaces a redes sociales -->
					<div class="social">
						<ul>
							<li><a href="'.$this->footer->getSocialNetworkLinks()[0].'" target="_blank">
								<img src="'.$this->footer->getSocialNetworkIcons()[0].'" alt="'.$general['altfooter1'].'" width="40px"/>
							</a></li>
							<li><a href="'.$this->footer->getSocialNetworkLinks()[1].'" target="_blank">
								<img src="'.$this->footer->getSocialNetworkIcons()[1].'" alt="'.$general['altfooter2'].'" width="40px"/>
							</a></li>
							<li><a href="'.$this->footer->getSocialNetworkLinks()[2].'" target="_blank">
								<img src="'.$this->footer->getSocialNetworkIcons()[2].'" alt="'.$general['altfooter3'].'" width="40px"/>
							</a></li>
							<li><a href="'.$this->footer->getSocialNetworkLinks()[3].'" target="_blank">
								<img src="'.$this->footer->getSocialNetworkIcons()[3].'" alt="'.$general['altfooter4'].'" width="40px"/>
							</a></li>
						</ul>
					</div>
					<!-- Login, Sitemap y autores -->
					<div class="info">
						<ul>';
						
			if(isset($_SESSION['admin'])) {
				echo '		<li><a href="index.php?logout=true'.$langInputEnd.'">Logout</a></li>';
			}
			else {
				echo '		<li><a href="#overlay-login">Login</a></li>';
			}
					
					echo '	<li><a href="index.php?sec=sitemap'.$langInputEnd.'">Sitemap</a></li>
							<li><pre>© Powered by '.$this->footer->getAuthors().'</pre></li>
						</ul>
					</div>
					<div id="overlay-login">
					<div id="popup-login">
						<h2 id="title-login">HOTEL PLAZA NUEVA</h2>
						<a id="close-login" href="#">×</a>
						<form id="login" action="index.php" onsubmit="return login();" method="post">
							<div id="dname">
								<img src="images/icons/contact/name_contact.png" width="40px" height="40px">
								<input id="name" class="field" type="text" name="name" onkeyup="test_text_login(\'name\')" onchange="test_text_login(\'name\')" onfocus="field_focu_login(\'name\')" onblur="test_text_login(\'name\')">
								<label for="name" id="lname">Usuario</label>
							</div>
							<div id="dpass">
								<img src="images/icons/password.png" width="40px" height="40px">
								<input id="pass" class="field" type="password" name="pass" onkeyup="test_text_login(\'pass\')" onchange="test_text_login(\'pass\')" onfocus="field_focu_login(\'pass\')" onblur="test_text_login(\'pass\')">
								<label for="pass" id="lpass">Contraseña</label>
							</div>
							<input id="submit-login" type="submit" value="ACCEDER" name="submit_login">
						</form>
					</div>
				</div>
				</footer>
			';
		}
	}
?>