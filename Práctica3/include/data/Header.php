<?php

	class Header {
		
		private $logoHotel;
		
		private $idProm;
		private $idRooms;
		private $idGallery;
		private $idContact;
		private $idOpinions;
		
		private $idSpanish;
		private $idEnglish;
		private $idFrench;
		private $idItalian;
		private $idGerman;
		
		private $secInputMain;
		private $secInput;
		
		public function Header() {
			
			$this->logoHotel = 'images/icons/logo.png';
			
			global $sec;
			global $lang;
			
			$extraInput;
			
			if(!empty($sec)) {
				switch($sec) {
					case 'promotions':
						$this->idProm = 'active';
						$extra = htmlspecialchars($_GET["prom"]);
						
						if(!empty($extra))
							$extraInput = '&prom='.$extra;
						break;
					case 'rooms':
						$this->idRooms = 'active';
						$extra = htmlspecialchars($_GET["room_type"]);
						
						if(!empty($extra))
							$extraInput = '&room_type='.$extra;
						break;
					case 'gallery':
						$this->idGallery = 'active';
						break;
					case 'contact':
						$this->idContact = 'active';
						break;
					case 'opinions':
						$this->idOpinions = 'active';
						break;
				}
				
				$this->secInputMain = '?sec='.$sec.$extraInput;
				$this->secInput = '&sec='.$sec.$extraInput;
			}
			
			switch($lang) {
				case 'es':
					$this->idSpanish = 'active-lang';
					break;
				case 'en':
					$this->idEnglish = 'active-lang';
					break;
				case 'fr':
					$this->idFrench = 'active-lang';
					break;
				case 'it':
					$this->idItalian = 'active-lang';
					break;
				case 'de':
					$this->idGerman = 'active-lang';
					break;
				default:
					global $browserLang;
		
					switch($browserLang) {
						case 'es':
							$this->idSpanish = 'active-lang';
							break;
						case 'en':
							$this->idEnglish = 'active-lang';
							break;
						case 'fr':
							$this->idFrench = 'active-lang';
							break;
						case 'it':
							$this->idItalian = 'active-lang';
							break;
						case 'de':
							$this->idGerman = 'active-lang';
							break;
						default:
							$this->idEnglish = 'active-lang';
							break;
					}
					break;
			}
		}
		
		public function getLogoHotel() {
			
			return $this->logoHotel;
		}
		
		public function getIdProm() {
			
			return $this->idProm;
		}
		
		public function getIdRooms() {
			
			return $this->idRooms;
		}
		
		public function getIdGallery() {
			
			return $this->idGallery;
		}
		
		public function getIdContact() {
			
			return $this->idContact;
		}
		
		public function getIdOpinions() {
			
			return $this->idOpinions;
		}
		
		public function getIdSpanish() {
			
			return $this->idSpanish;
		}
		
		public function getIdEnglish() {
			
			return $this->idEnglish;
		}
		
		public function getIdFrench() {
			
			return $this->idFrench;
		}
		
		public function getIdItalian() {
			
			return $this->idItalian;
		}
		
		public function getIdGerman() {
			
			return $this->idGerman;
		}
		
		public function getSecInputMain() {
			
			global $lang;
			
			if(empty($lang))
				return $this->secInputMain;
				
			return $this->secInput;
		}
		
		public function getSecInput() {
			
			return $this->secInput;
		}
	}
	
?>