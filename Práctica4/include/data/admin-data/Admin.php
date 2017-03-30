<?php

	class Admin {
		
		private $icons;
		private $options;
		private $class_options;
		
		public function Admin() {
			
			$this->icons = array('images/icons/admin/reservation-white.png',
								 'images/icons/admin/accounting-white.png');
								 
			$this->options = array('Reservas', 'Precios');
			
			global $admin_sec;
			
			switch($admin_sec) {
				case 'booking':
					$this->class_options[0] = 'active';
					break;
				case 'prices':
					$this->class_options[1] = 'active';
					break;
			}
		}
		
		public function getIcon($index) {
			
			return $this->icons[$index];
		}
		
		public function getOption($index) {
			
			return $this->options[$index];
		}
		
		public function getClassOption($index) {
			
			return $this->class_options[$index];
		}
	}

?>