<?php

	class AdminView {
		
		private $admin;
		
		public function AdminView($admin) {
			
			$this->admin = $admin;
		}
		
		public function generateHTML() {
			
			global $langInputEnd;
			
			echo '
				<!-- Barra lateral para la adminitración -->
				<div id="admin_sidebar">
					<ul>
						<li id="search_option" class="admin_option '.$this->admin->getClassOption(1).'">
							<a href="#overlay-find">
								<img src="'.$this->admin->getIcon(1).'" width="30px"/>
								<span>'.$this->admin->getOption(1).'</span>
							</a>
						</li>
						<li id="booking_option" class="admin_option '.$this->admin->getClassOption(0).'">
							<a href="index.php?admin=booking'.$langInputEnd.'">
								<img src="'.$this->admin->getIcon(0).'" width="30px"/>
								<span>'.$this->admin->getOption(0).'</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- Pop up del buscador de reservas -->
				<div id="overlay-find">
					<a href="#"></a>
					<div id="popup-find">
						<h2 id="title-find">BUSCAR RESERVAS</h2>
						<a id="close" href="#">×</a>
						<form id="find_form" onsubmit="return false;" method="post">
							<div id="dfind">
								<img src="images/icons/admin/admin_search_black.png" width="40px" height="40px">
								<input id="find" class="field" type="text" name="find" onkeyup="findBooking(this.value)" autocomplete="off">
							</div>
						</form>
						<div id="live_search"></div>
					</div>
				</div>
				<!-- Pop up de los detalles de la reserva -->
				<div id="overlay-booking">
					<a href="#"></a>
					<div id="popup-booking">
						<h2 id="title-booking">RESERVA</h2>
						<a id="close" href="#">×</a>
						<div id="booking_info"></div>
					</div>
				</div>';
		}
	}

?>