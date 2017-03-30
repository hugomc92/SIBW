<?php

	class ContentContact {

		private $phone;
		private $fax;
		private $email;
		private $icons;
		
		public function ContentContact() {
			
			$this->phone = '+34 958 215 273';
			$this->fax = '+34 958 225 765';
			$this->email = 'info@hotel-plazanueva.com';
			
			$this->icons = array('images/icons/contact/name_contact.png',
								 'images/icons/contact/phone_contact.png',
								 'images/icons/contact/email_contact.png',
								 'images/icons/contact/message_contact.png');
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
		
		public function getIcons() {
			
			return $this->icons;
		}
	}
	
?>