<?php

	class ContentRooms {
		
		private $room;
		private $indexRoom;
		private $idRoom;
		private $images;
		private $roomPrices;
		private $serviceIcons;
		
		public function ContentRooms() {
			
			$this->room = htmlspecialchars($_GET["room_type"]);
			
			$this->indexRoom = array(FALSE, FALSE, FALSE);
			$this->idRoom = array();
			$this->images = array();
			$this->roomPrices = array();
			
			switch($this->room) {
				case 'double':
					$this->indexRoom[0] = TRUE;
					
					$this->idRoom[0] = 'first';
					
					$this->images[0] = 'images/hotel/rooms/habitacion7.jpg';
					
					$this->roomPrices[0] = 44.10;
					break;
				case 'sup':
					$this->indexRoom[1] = TRUE;
					
					$this->idRoom[1] = 'first';
					
					$this->images[1] = 'images/hotel/rooms/oferta2noches.jpg';
					
					$this->roomPrices[1] = 63.90;
					break;
				case 'triple':
					$this->indexRoom[2] = TRUE;
					
					$this->idRoom[2] = 'first';
					
					$this->images[2] = 'images/hotel/rooms/habitacion5.jpg';
					
					$this->roomPrices[2] = 62.10;
					break;
				default:
					$this->indexRoom[0] = TRUE;
					$this->indexRoom[1] = TRUE;
					$this->indexRoom[2] = TRUE;
					
					$this->idRoom[0] = 'first';
					
					$this->images[0] = 'images/hotel/rooms/habitacion7.jpg';
					$this->images[1] = 'images/hotel/rooms/oferta2noches.jpg';
					$this->images[2] = 'images/hotel/rooms/habitacion5.jpg';
					
					$this->roomPrices[0] = 44.10;
					$this->roomPrices[1] = 63.90;
					$this->roomPrices[2] = 62.10;
					break;
			}
			
			$this->serviceIcons = array('images/icons/rooms_services/caja_de_seguridad.png',
										'images/icons/rooms_services/amenities.png',
										'images/icons/services/wifi.png',
										'images/icons/services/aire_acondicionado.png',
										'images/icons/rooms_services/tv_satelite.png',
										'images/icons/rooms_services/cunas.png',
										'images/icons/rooms_services/secador.png',
										'images/icons/rooms_services/telefono.png');
		}
		
		public function getIndexRoom() {
			
			return $this->indexRoom;
		}
		
		public function getIdRoom() {
			
			return $this->idRoom;
		}
		
		public function getImages() {
			
			return $this->images;
		}
		
		public function getServiceIcons() {
			
			return $this->serviceIcons;
		}
		
		public function getRoomPrices() {
			
			return $this->roomPrices;
		}
	}
	
?>