<?php

	class BookingDateInfo {
		
		private $bookingDate;
		private $numBreakfast;		
		
		public function BookingDateInfo($bookingDate1, $numBreakfast1) {
			$this->bookingDate = $date;
			$this->numBreakfast = $numBreakfast1;
		}
		
		public function getBookingDate() {
			return $this->bookingDate;
		}
		
		public function getNumBreakfast() {
			return $this->numBreakfast;
		}
	}


?>