<?php

	class ContentController {
		
		private $contentSubcontroller;
		
		public function ContentController() {
			
			global $sec;
			
			switch($sec) {
				case 'promotions':
					include 'include/controllers/content-controllers/ContentControllerPromotions.php';
					
					$this->contentSubcontroller = new ContentControllerPromotions();
					break;
				case 'rooms':
					include 'include/controllers/content-controllers/ContentControllerRooms.php';
					
					$this->contentSubcontroller = new ContentControllerRooms();
					break;
				case 'gallery':
					include 'include/controllers/content-controllers/ContentControllerGallery.php';
					
					$this->contentSubcontroller = new ContentControllerGallery();
					break;
				case 'contact':
					include 'include/controllers/content-controllers/ContentControllerContact.php';
					
					$this->contentSubcontroller = new ContentControllerContact();
					break;
				case 'opinions':
					include 'include/controllers/content-controllers/ContentControllerOpinions.php';
					
					$this->contentSubcontroller = new ContentControllerOpinions();
					break;
				case 'sitemap':
					include 'include/controllers/content-controllers/ContentControllerSitemap.php';
					
					$this->contentSubcontroller = new ContentControllerSitemap();
					break;
				case 'bookingselection':
					include 'include/controllers/content-controllers/ContentControllerBookingSelection.php';
					
					$this->contentSubcontroller = new ContentControllerBookingSelection();
					break;	
				case 'bookingpayment':
					include 'include/controllers/content-controllers/ContentControllerBookingPayment.php';
					
					$this->contentSubcontroller = new ContentControllerBookingPayment();
					break;	
				default:
					include 'include/controllers/content-controllers/ContentControllerMain.php';
					
					$this->contentSubcontroller = new ContentControllerMain();
					break;
			}
		}
		
		public function start() {
			
			$this->contentSubcontroller->start();
		}
	}
	
?>