<?php

	class ContentGallery {
		
		private $images;		
		
		public function ContentGallery() {
			
			$this->images = array('images/hotel/hotel-fachada.jpg',
								  'images/hotel/oferta10.jpg',
								  'images/hotel/rooms/habitacion1.jpg',
								  'images/hotel/anticipada.jpg',
								  'images/hotel/hotel-patio2.jpg',
								  'images/hotel/rooms/habitacion3.jpg',
								  'images/hotel/rooms/habitacion4.jpg',
								  'images/hotel/rooms/oferta2noches.jpg',
								  'images/hotel/rooms/bano.jpg',
								  'images/hotel/rooms/habitacion5.jpg',
								  'images/hotel/rooms/habitacion6.jpg',
								  'images/hotel/comedor.jpg',
								  'images/hotel/desyuno1.jpg',
								  'images/hotel/rooms/habitacion7.jpg',
								  'images/hotel/rooms/habitacion2.jpg');			
		}
		
		public function getImages() {
			
			return $this->images;
		}
		
		public function getNumImages() {
			
			return sizeof($this->images);
		}			
	}
	
?>