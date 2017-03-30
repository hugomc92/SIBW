<?php

	class ContentMain {
		
		private $images;
		private $serviceIcons;
		
		public function ContentMain() {
			
			$this->images = array('images/granada/plaza_nueva.jpg',
								  'images/hotel/rooms/habitacion1.jpg',
								  'images/granada/alh2.jpg',
								  'images/granada/entorno.jpg');
			
			$this->serviceIcons = array('images/icons/services/recepcion_24h.png',
										'images/icons/services/wifi.png',
										'images/icons/services/bar_cafeteria.png',
										'images/icons/services/consigna_equipajes.png',
										'images/icons/services/aire_acondicionado.png',
										'images/icons/services/parking_cubierto.png',
										'images/icons/services/accesos_adaptados.png',
										'images/icons/services/servicio_de_habitaciones.png');
		}
		
		public function getImages() {
			
			return $this->images;
		}
		
		public function getServiceIcons() {
			
			return $this->serviceIcons;
		}
	}
	
?>