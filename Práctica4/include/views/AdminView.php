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
						<li id="booking_option" class="admin_option '.$this->admin->getClassOption(0).'" onclick="">
							<a href="index.php?admin=booking'.$langInputEnd.'">
								<img src="'.$this->admin->getIcon(0).'" width="30px"/>
								<span>'.$this->admin->getOption(0).'</span>
							</a>
						</li>
						';/*
						<li id="prices_option" class="admin_option '.$this->admin->getClassOption(1).'" onclick="">
							<a href="index.php?admin=prices'.$langInputEnd.'">
								<img src="'.$this->admin->getIcon(1).'" width="30px"/>
								<span>'.$this->admin->getOption(1).'</span>
							</a>
						</li> */;
						echo '
					</ul>
				</div>
			';			
		}	
	}

?>