<?php


	include 'include/containers/Prices.php';
	
	class Price {
		
		private $price;
		private $type;
		private $seasonName;
		private $weekendPriceAddition;
		private $breakfastPriceAddition;
		private $parkingPriceAddition;
		
		public function Price() {
			
		}			
		
		public static function getBreakfastPrice() {
			
			$prices = new Prices();		
			$breakfastPrice = $prices->getBreakfastPrice();
			return $breakfastPrice;
			
		}
		
		public static function getParkingPrice() {
			
			$prices = new Prices();		
			$parkingPrice = $prices->getParkingPrice();
			return $parkingPrice;
			
		}
		
		public static function getPromotionPrice($bookingProm) {
			$prices = new Prices();		
			$promotionPrice = $prices->getPromotionPrice($bookingProm);
			return $promotionPrice;
		}
		
		public static function getSingleRoomPrice() {
			$prices = new Prices();		
			$singleRoomPrice = $prices->getSingleRoomPrice();
			return $singleRoomPrice;
		}
		
		public static function getDoubleRoomPrice() {
			$prices = new Prices();		
			$doubleRoomPrice = $prices->getDoubleRoomPrice();
			return $doubleRoomPrice;
		}
		
		public static function getSuiteRoomPrice() {
			$prices = new Prices();		
			$suiteRoomPrice = $prices->getSuiteRoomPrice();
			return $suiteRoomPrice;
		}
		
		public static function getSingleRoomWeekendPrice() {
			$prices = new Prices();		
			$singleRoomWeekendPrice = $prices->getSingleRoomWeekendPrice();
			return $singleRoomWeekendPrice;
		}
		
		public static function getDoubleRoomWeekendPrice() {
			$prices = new Prices();		
			$doubleRoomWeekendPrice = $prices->getDoubleRoomWeekendPrice();
			return $doubleRoomWeekendPrice;
		}
		
		public static function getSuiteRoomWeekendPrice() {
			$prices = new Prices();		
			$suiteRoomWeekendPrice = $prices->getSuiteRoomWeekendPrice();
			return $suiteRoomWeekendPrice;
		}
	}

?>