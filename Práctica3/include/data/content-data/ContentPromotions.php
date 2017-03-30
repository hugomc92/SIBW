<?php

	class ContentPromotions {
		
		private $prom;
		private $indexProm;
		private $idProm;
		private $images;
		
		public function ContentPromotions() {
			
			$this->prom = htmlspecialchars($_GET["prom"]);
			
			$this->indexProm = array(FALSE, FALSE, FALSE, FALSE, FALSE);
			$this->idProm = array();
			$this->images = array();
			
			switch($this->prom) {
				case 'prom1':
					$this->indexProm[0] = TRUE;
					
					$this->idProm[0] = 'first';
					
					$this->images[0] = 'images/hotel/rooms/oferta2noches.jpg';
					break;
				case 'prom2':
					$this->indexProm[1] = TRUE;
					
					$this->idProm[1] = 'first';
					
					$this->images[1] = 'images/hotel/hotel-fachada.jpg';
					break;
				case 'prom3':
					$this->indexProm[2] = TRUE;
					
					$this->idProm[2] = 'first';
					
					$this->images[2] = 'images/hotel/hotel-patio.jpg';
					break;
				case 'prom4':
					$this->indexProm[3] = TRUE;
					
					$this->idProm[3] = 'first';
					
					$this->images[3] = 'images/granada/alhambra2.jpg';
					break;
				case 'prom5':
					$this->indexProm[4] = TRUE;
					
					$this->idProm[4] = 'first';
					
					$this->images[4] = 'images/granada/SierraNevada.jpg';
					break;
				default:
					$this->indexProm[0] = TRUE;
					$this->indexProm[1] = TRUE;
					$this->indexProm[2] = TRUE;
					$this->indexProm[3] = TRUE;
					$this->indexProm[4] = TRUE;
					
					$this->idProm[0] = 'first';
					
					$this->images[0] = 'images/hotel/rooms/oferta2noches.jpg';
					$this->images[1] = 'images/hotel/hotel-fachada.jpg';
					$this->images[2] = 'images/hotel/hotel-patio.jpg';
					$this->images[3] = 'images/granada/alhambra2.jpg';
					$this->images[4] = 'images/granada/SierraNevada.jpg';
					break;
			}
		}
		
		public function getIndexProm() {
			
			return $this->indexProm;
		}
		
		public function getIdProm() {
			
			return $this->idProm;
		}
		
		public function getImages() {
			
			return $this->images;
		}
	}
	
?>