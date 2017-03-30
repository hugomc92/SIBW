<?php

	class ContentBookingSelection {
		
		private $images;
		private $roomPrices;	
		private $singleRoomAvailables;
		private $doubleRoomAvailables;
		private $suiteRoomAvailables;
		private $days;
		private $bookingStartDate;
		private $bookingEndDate;
		private $childrenNum;
		private $adultNum;
		private $peopleNum;
		
		public function ContentBookingSelection() {		
		
			include 'include/model/Booking.php';	
			include 'include/model/Price.php';
			
			global $startDate;
			global $endDate;
			global $adulNumber;
			global $childrenNumber;			
			
			$this->singleRoomAvailables = Booking::getSingleRoomAvailables($startDate, $endDate);
			$this->doubleRoomAvailables = Booking::getDoubleRoomAvailables($startDate, $endDate);
			$this->suiteRoomAvailables = Booking::getSuiteRoomAvailables($startDate, $endDate);
			
			$this->images = array();
			$this->roomPrices = array();
			
			$this->images[0] = 'images/hotel/rooms/habitacion7.jpg';
			$this->images[1] = 'images/hotel/rooms/oferta2noches.jpg';
			$this->images[2] = 'images/hotel/rooms/habitacion5.jpg';
					
			$this->roomPrices[0] = Price::getSingleRoomPrice();
			$this->roomPrices[1] = Price::getDoubleRoomPrice();
			$this->roomPrices[2] = Price::getSuiteRoomPrice();
			$this->days	= (strtotime($startDate)-strtotime($endDate))/86400;
			$this->days = abs($this->days); 
			$this->days = floor($this->days);
			
			$this->bookingStartDate = $startDate;
			$this->bookingEndDate = $endDate;		
			$this->adultNum = $adultNumber;
			$this->childrenNum = $childrenNumber;	
			$this->peopleNum = $adultNumber + $childrenNumber;
		}
			
		public function getImages() {
			
			return $this->images;
		}
		
		public function getRoomPrices() {
			
			return $this->roomPrices;
		}			
		
		public function getSingleRoomAvailables() {
			return $this->singleRoomAvailables;
		}
		
		public function getDoubleRoomAvailables() {
			return $this->doubleRoomAvailables;
		}
		
		public function getSuiteRoomAvailables() {
			return $this->suiteRoomAvailables;
		}
		
		public function getDays() {
			return $this->days;
		}
		
		public function getBookingStartDate() {
			return $this->bookingStartDate;
		}
		
		public function getBookingEndDate() {
			return $this->bookingEndDate;
		}
		
		public function getAdultNum() {
			return $this->adultNum;
		}
		
		public function getChildrenNum() {
			return $this->childrenNum;
		}
		
		public function getPeopleNum() {
			return $this->peopleNum;
		}
	}
	
?>