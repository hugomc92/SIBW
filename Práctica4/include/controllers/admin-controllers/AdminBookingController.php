<?php

	include 'include/data/admin-data/AdminBooking.php';
	include 'include/views/admin-views/AdminBookingView.php';

	class AdminBookingController {
		
		private $adminBooking;
		private $adminBookingView;
		
		public function AdminBookingController() {
			
			$this->adminBooking = new AdminBooking();
			$this->adminBookingView = new AdminBookingView($this->adminBooking);
		}
		
		public function start() {
			
			$this->adminBookingView->generateHTML();
		}
	}
	
?>