<?php

	include 'include/containers/Bookings.php';

	class Booking {		
			
		private $name;
		private $lastName;
		private $parkingSpaces;
		private $address;
		private $postalCode;
		private $city;
		private $country;
		private $email;
		private $phone;
		private $observations;
		private $cardHolder;	
		private $numPeople;
		private $totalPrice;
		private $promotion;
		
		public function Booking() {		
		
		}	
		
		public static function getSingleRoomAvailables($startBooking, $endBooking) {
			
			$bookings = new Bookings();		
			$roomAvailables = $bookings->getSingleRoomAvailables($startBooking, $endBooking);
			return $roomAvailables;
			
		}
		
		public static function getDoubleRoomAvailables($startBooking, $endBooking) {
			
			$bookings = new Bookings();
			$roomAvailables = $bookings->getDoubleRoomAvailables($startBooking, $endBooking);
			return $roomAvailables;
			
		}
		
		public static function getSuiteRoomAvailables($startBooking, $endBooking) {
			
			$bookings = new Bookings();
			$roomAvailables = $bookings->getSuiteRoomAvailables($startBooking, $endBooking);
			return $roomAvailables;
			
		}		
				
		public static function getSingleRoomCapacity() {
			
			$bookings = new Bookings();
			$roomCapacity = $bookings->getSingleRoomCapacity();
			return $roomCapacity;
			
		}
		
		public static function getDoubleRoomCapacity() {
			
			$bookings = new Bookings();
			$roomCapacity = $bookings->getDoubleRoomCapacity();
			return $roomCapacity;
			
		}
		
		public static function getSuiteRoomCapacity() {
			
			$bookings = new Bookings();
			$roomCapacity = $bookings->getSuiteRoomCapacity();
			return $roomCapacity;
			
		}
	}

?>