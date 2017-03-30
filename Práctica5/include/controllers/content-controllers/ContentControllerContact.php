<?php

	include 'include/data/content-data/ContentContact.php';
	include 'include/views/content-views/ContentViewContact.php';

	class ContentControllerContact {
		
		private $content;
		private $contentView;
		
		public function ContentControllerContact() {
			
			$this->content = new ContentContact();
			$this->contentView = new ContentViewContact($this->content);
			
			if(isset($_POST['contact_submit'])) {
				include 'include/mod/PHPMailer/PHPMailerAutoload.php';
				include 'config/configEmail.php';
				include 'funct/sendContactMail.php';
				
				$name = $_POST['name'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$message = $_POST['message'];
				
				sendContactMail($name, $phone, $email, $message);
			}
		}
		
		public function start() {
			
			$this->contentView->generateHTML();
		}
	}
	
?>