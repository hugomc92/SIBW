<?php

	include 'include/data/content-data/ContentBookingPayment.php';
	include 'include/views/content-views/ContentViewBookingPayment.php';

	class ContentControllerBookingPayment {
		
		private $content;
		private $contentView;
		
		public function ContentControllerBookingPayment() {
			
			$this->content = new ContentBookingPayment();
			$this->contentView = new ContentViewBookingPayment($this->content);			
		}
		
		public function start() {
			
			$this->contentView->generateHTML();
		}
	}
	
?>