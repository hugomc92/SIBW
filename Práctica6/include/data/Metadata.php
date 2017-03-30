<?php

	class Metadata {
		
		private $description;
		private	$keywords;
		private $title;
		private $style;
		private $mobile;
		private $mobileStyle;
		
		public function Metadata($mobile) {

			$this->mobile = $mobile;
			
			global $sec;
			
			switch($sec) {
				case 'promotions':
					$this->description = 'Promociones del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Promociones, Promociones Hotel, Promociones Hotel Granada, Promociones Hotel Plaza Nueva, Ofertas, Ofertas Hotel, Ofertas Hotel Granada, Ofertas Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Promociones Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-promotions.css';
					$this->mobileStyle = 'style/mobile/mobile-content-promotions.css';
					break;
				case 'rooms':
					$this->description = 'Habitaciones del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Habitaciones, Habitaciones Hotel, Habitaciones Hotel Granada, Habitaciones Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Habitaciones Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-rooms.css';
					$this->mobileStyle = 'style/mobile/mobile-content-rooms.css';
					break;
				case 'gallery':
					$this->description = 'Galería de fotos del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Galería de fotos Hotel, Galería de fotos Hotel Granada, Galería de fotos Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Galería de fotos Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-gallery.css';
					$this->mobileStyle = 'style/mobile/mobile-content-gallery.css';
					break;
				case 'contact':
					$this->description = 'Contacto del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Contacto Hotel, Contacto Hotel Granada, Contacto Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Contacto Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-contact.css';
					$this->mobileStyle = 'style/mobile/mobile-content-contact.css';
					break;
				case 'opinions':
					$this->description = 'Opiniones del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Opiniones Hotel, Opiniones Hotel Granada, Opiniones Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Opiniones Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-opinions.css';
					$this->mobileStyle = 'style/mobile/mobile-content-opinions.css';
					break;
				case 'sitemap':
					$this->description = 'Sitemap del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Sitemap Hotel, Sitemap Hotel Granada, Sitemap Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Sitemap Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-sitemap.css';
					$this->mobileStyle = 'style/mobile/mobile-content-sitemap.css';
					break;
				case 'bookingselection':
					$this->description = 'Reservas del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Reservas Hotel, Reservas Hotel Granada, Reservas Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Reservas Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-bookingselection.css';
					$this->mobileStyle = 'style/mobile/mobile-content-bookingselection.css';
					break;
				case 'bookingpayment':
					$this->description = 'Proceso de pago del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Pago Hotel, Pago Hotel Granada, Pago Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Proceso de pago del Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-bookingpayment.css';
					$this->mobileStyle = 'style/mobile/mobile-content-bookingpayment.css';
					break;
				default:
					$this->description = 'Página principal del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-index.css';
					$this->mobileStyle = 'style/mobile/mobile-content-index.css';
					break;
			}
		}
		
		public function getDescription() {
			
			return $this->description;
		}
		
		public function getKeywords() {
			
			return $this->keywords;
		}
		
		public function getTitle() {
			
			return $this->title;
		}
		
		public function getStyle() {
			
			return $this->style;
		}

		public function isMobile() {

			return $this->mobile;
		}

		public function getMobileStyle() {

			return $this->mobileStyle;
		}
	}
	
?>