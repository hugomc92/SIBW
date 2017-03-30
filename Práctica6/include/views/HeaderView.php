<?php

	class HeaderView {
		
		private $header;
		
		public function HeaderView($header) {
			
			$this->header = $header;
		}
		
		public function generateHTML() {
			
			global $langInputBegin;
			global $langInputEnd;
			global $sec;
			
			global $general;

			echo '
				<!-- Header de la página -->
				<header>';
				
			if(!($sec == "bookingselection") && !($sec == "bookingpayment")) { 
				echo '
						<div id="booking_popup" class="overlay">
							<div class="popup">
								<a class="close" href="#">&times;</a>								
								<div class="content_booking">
									<h3>DATOS RESERVA</h3>								
									<form action="index.php" method="post" >
										<label>Fecha entrada: </label>
										<input type="date" name="start_date" >
										<label>Fecha salida: </label>
										<input type="date" name="end_date" >
										<label>Numero de adultos</label>
										<select name="adult_number">								
											<option value="1" selected>1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
										<label>Numero de niños</label>
										<select name="children_number">	
											<option value="0" selected>0</option>							
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
										<input type="submit" class="booking_send" value="Reservar" >
									</form>
								</div>
							</div>
						</div>						
						';				
			}
			
			if(isset($_SESSION['admin'])) {
				echo '
					<div id="admin_hamburguer" onclick="openCloseMenu()"></div>
					<div class="hotel">
						<p>ADMINISTRACIÓN</p>
					</div>
				';
			}			
			
			else {
				echo '
					<!-- Logo y nombre del hotel -->
					<a href="index.php'.$langInputBegin.'">
						<div class="hotel">
							<img src="'.$this->header->getLogoHotel().'" alt="'.$general['altheader1'].'" class="logo" width="44px"/>
							<div class="nombre">HOTEL PLAZA NUEVA<sup>&#9733; &#9733; &#9733;</sup></div>
							<div class="ciudad">Granada</div>
						</div>
					</a>';
			}
			
			echo '	<!-- Lista desplegable para distintos idiomas -->
					<div id="lang">
						<input type="checkbox" id="lang-button">
						<label for="lang-button" onclick></label>
						<ul>
							<a href="index.php?lang=es'.$this->header->getSecInputMain().'">	
								<li id="'.$this->header->getIdSpanish().'" class="first-lang">
									<img src="images/icons/countries/Spain.gif" alt="'.$general['altheader2'].'" width="15px"/>
									<p>Español</p>
								</li>
							</a>
							<a href="index.php?lang=en'.$this->header->getSecInput().'">
								<li id="'.$this->header->getIdEnglish().'">
									<img src="images/icons/countries/England.gif" alt="'.$general['altheader3'].'" width="15px"/>
									<p>English</p>
								</li>
							</a>
							<a href="index.php?lang=fr'.$this->header->getSecInput().'">
								<li id="'.$this->header->getIdFrench().'">
									<img src="images/icons/countries/France.gif" alt="'.$general['altheader4'].'" width="15px"/>
									<p>Français</p>
								</li>
							</a>
							<a href="index.php?lang=it'.$this->header->getSecInput().'">
								<li id="'.$this->header->getIdItalian().'">
									<img src="images/icons/countries/Italia.png" alt="'.$general['altheader5'].'" width="15px"/>
									<p>Italiano</p>
								</li>
							</a>
							<a href="index.php?lang=de'.$this->header->getSecInput().'">
								<li id="'.$this->header->getIdGerman().'" class="last-lang">
									<img src="images/icons/countries/Deutschland.jpg" alt="'.$general['altheader6'].'" width="15px"/>
									<p>Deutsch</p>
								</li>
							</a>
						</ul>
					</div>
					<!-- Menú -->
					<nav>
						<!-- Menú de hamburguesa para pantallas pequeñas -->
						<input type="checkbox" id="button">
						<label for="button" onclick></label>
						<!-- Menú en sí -->
						<ul>
							<li><a href="'.$this->header->getMenuOptionLink(0, TRUE).'">'.$this->header->getMenuOption(0).'</a></li>
							<li id="'.$this->header->getIdProm().'"><a href="'.$this->header->getMenuOptionLink(1, FALSE).'">'.$this->header->getMenuOption(1).'</a>
								<!-- Submenú para las promociones -->
								<ul>
									<li><a href="index.php?sec=promotions&prom=prom1'.$langInputEnd.'">'.$general['prom1'].'</a>
										<!-- div para más información sobre la promoción en la que el ratón está encima -->
										<div><a href="index.php?sec=promotions&prom=prom1'.$langInputEnd.'">
											<img src="images/hotel/rooms/oferta2noches.jpg" alt="'.$general['altheader7'].'" width="100%"/>
											<p>'.$general['contprom1'].'</p>
										</a></div>
									</li>
									<li><a href="index.php?sec=promotions&prom=prom2'.$langInputEnd.'">'.$general['prom2'].'</a>
										<!-- div para más información sobre la promoción en la que el ratón está encima -->
										<div><a href="index.php?sec=promotions&prom=prom2'.$langInputEnd.'">
											<img src="images/hotel/oferta10.jpg" alt="'.$general['altheader8'].'" width="100%"/>
											<p>'.$general['contprom2'].'</p>
										</a></div>
									</li>
									<li><a href="index.php?sec=promotions&prom=prom3'.$langInputEnd.'">'.$general['prom3'].'</a>
										<!-- div para más información sobre la promoción en la que el ratón está encima -->
										<div><a href="index.php?sec=promotions&prom=prom3'.$langInputEnd.'">
											<img src="images/hotel/anticipada.jpg" alt="'.$general['altheader9'].'" width="100%"/>
											<p>'.$general['contprom3'].'</p>
										</a></div>
									</li>
									<li><a href="index.php?sec=promotions&prom=prom4'.$langInputEnd.'">'.$general['prom4'].'</a>
										<!-- div para más información sobre la promoción en la que el ratón está encima -->
										<div><a href="index.php?sec=promotions&prom=prom4'.$langInputEnd.'">
											<img src="images/granada/alhambra.jpg" alt="'.$general['altheader10'].'" width="100%"/>
											<p>'.$general['contprom4'].'</p>
										</a></div>
									</li>
									<li class="no_border"><a href="index.php?sec=promotions&prom=prom5'.$langInputEnd.'">'.$general['prom5'].'</a>
										<!-- div para más información sobre la promoción en la que el ratón está encima -->
										<div><a href="index.php?sec=promotions&prom=prom5'.$langInputEnd.'">
											<img src="images/granada/SierraNevada-thumb.jpg" alt="'.$general['altheader11'].'" width="100%"/>
											<p>'.$general['contprom5'].'</p>
										</a></div>
									</li>
								</ul>
							</li>
							<li id="'.$this->header->getIdRooms().'"><a href="'.$this->header->getMenuOptionLink(2, FALSE).'">'.$this->header->getMenuOption(2).'</a>
								<!-- Submenú para las habitaciones -->
								<ul>
									<li><a href="index.php?sec=rooms&room_type=double'.$langInputEnd.'">'.$general['room1'].'</a>
										<!-- div para más información sobre la habitación en la que el ratón está encima,
										redirige directamente al popup de la habitación correspondiente -->
										<div><a href="index.php?sec=rooms&room_type=double'.$langInputEnd.'">
											<img src="images/hotel/rooms/habitacion1.jpg" alt="'.$general['altheader12'].'" width="100%"/>
											<p>'.$general['controom1'].'</p>
										</a></div>
									</li>
									<li><a href="index.php?sec=rooms&room_type=sup'.$langInputEnd.'">'.$general['room2'].'</a>
										<!-- div para más información sobre la habitación en la que el ratón está encima,
										redirige directamente al popup de la habitación correspondiente -->
										<div><a href="index.php?sec=rooms&room_type=sup'.$langInputEnd.'">
											<img src="images/hotel/rooms/habitacion2.jpg" alt="'.$general['altheader13'].'" width="100%"/>
											<p>'.$general['controom2'].'</p>
										</a></div>
									</li>
									<li class="no_border"><a href="index.php?sec=rooms&room_type=triple'.$langInputEnd.'">'.$general['room3'].'</a>
										<!-- div para más información sobre la habitación en la que el ratón está encima,
										redirige directamente al popup de la habitación correspondiente -->
										<div><a href="index.php?sec=rooms&room_type=triple'.$langInputEnd.'">
											<img src="images/hotel/rooms/habitacion3.jpg" alt="'.$general['altheader14'].'" width="100%"/>
											<p>'.$general['controom3'].'</p>
										</a></div>
									</li>
								</ul>
							</li>
							<li id="'.$this->header->getIdGallery().'"><a href="'.$this->header->getMenuOptionLink(3, FALSE).'">'.$this->header->getMenuOption(3).'</a></li>
							<li id="'.$this->header->getIdContact().'"><a href="'.$this->header->getMenuOptionLink(4, FALSE).'">'.$this->header->getMenuOption(4).'</a></li>
							<li id="'.$this->header->getIdOpinions().'"><a href="'.$this->header->getMenuOptionLink(5, FALSE).'">'.$this->header->getMenuOption(5).'</a></li>							
							<li><a href="#booking_popup">'.$this->header->getMenuOption(6).'</a></li>
						</ul>
					</nav>
				</header>
			';
		}
	}
?>