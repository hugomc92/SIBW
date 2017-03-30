<?php

	class FooterView {
		
		private $footer;
		
		public function FooterView($footer) {
			
			$this->footer = $footer;
		}
		
		public function generateHTML() {
			
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
					<!-- Sitemap y autores -->
					<div class="info">
						<p><a href="index.php?sec=sitemap'.$langInputEnd.'">Sitemap</a></p>
						<pre>© Powered by '.$this->footer->getAuthors().'</pre>
					</div>
				</footer>
			';
		}
	}
?>