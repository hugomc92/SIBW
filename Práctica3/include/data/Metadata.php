<?php

	class Metadata {
		
		private $description;
		private	$keywords;
		private $title;
		private $style;
		
		public function Metadata() {
			
			global $sec;
			
			switch($sec) {
				case 'promotions':
					$this->description = 'Promociones del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Promociones, Promociones Hotel, Promociones Hotel Granada, Promociones Hotel Plaza Nueva, Ofertas, Ofertas Hotel, Ofertas Hotel Granada, Ofertas Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Promociones Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-promotions.css';
					break;
				case 'rooms':
					$this->description = 'Habitaciones del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Habitaciones, Habitaciones Hotel, Habitaciones Hotel Granada, Habitaciones Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Habitaciones Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-rooms.css';
					break;
				case 'gallery':
					$this->description = 'Galería de fotos del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Galería de fotos Hotel, Galería de fotos Hotel Granada, Galería de fotos Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Galería de fotos Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-gallery.css';
					break;
				case 'contact':
					$this->description = 'Contacto del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Contacto Hotel, Contacto Hotel Granada, Contacto Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Contacto Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-contact.css';
					break;
				case 'opinions':
					$this->description = 'Opiniones del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Opiniones Hotel, Opiniones Hotel Granada, Opiniones Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Opiniones Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-opinions.css';
					break;
				case 'sitemap':
					$this->description = 'Sitemap del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Sitemap Hotel, Sitemap Hotel Granada, Sitemap Hotel Plaza Nueva, Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Sitemap Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-sitemap.css';
					break;
				default:
					$this->description = 'Página principal del Hotel Plaza Nueva en Granada';
					$this->keywords = 'Hotel Granada, Hotel Plaza Nueva, Hotel';
					$this->title = 'Hotel Plaza Nueva en Granada';
					$this->style = 'style/content-index.css';
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
	}
	
?>