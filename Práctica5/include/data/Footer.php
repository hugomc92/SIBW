<?php

	class Footer {
		
		private $phone;
		private $fax;
		private $email;
		private $socialNetworkLinks;
		private $socialNetworkIcons;
		private $authors;
		
		public function Footer() {
			
			$this->phone = '+34 958 215 273';
			$this->fax = '+34 958 225 765';
			$this->email = 'info@hotel-plazanueva.com';
			$this->socialNetworkIcons = array('images/icons/facebook.png',
											  'images/icons/twitter.png',
											  'images/icons/instagram.png',
											  'images/icons/google+.png');
			$this->socialNetworkLinks = array('https://www.facebook.com/Hotel-Plaza-Nueva-176542882374100/?fref=ts',
											  'https://twitter.com/HOTELPLAZANUEVA',
											  'https://www.instagram.com/explore/locations/44043216/',
											  'https://plus.google.com/117874938358313917312/posts');
			$this->authors = 'Hugo y Blas';
		}
		
		public function getPhone() {
			
			return $this->phone;
		}
		
		public function getFax() {
			
			return $this->fax;
		}
		
		public function getEmail() {
			
			return $this->email;
		}
		
		public function getSocialNetworkIcons() {
			
			return $this->socialNetworkIcons;
		}
		
		public function getSocialNetworkLinks() {
			
			return $this->socialNetworkLinks;
		}
		
		public function getAuthors() {
			
			return $this->authors;
		}
	}
	
?>