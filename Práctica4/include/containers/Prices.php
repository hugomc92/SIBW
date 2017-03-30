<?php

	class Prices {
		
		
		public function Prices() {
			
		}
		
		public function getBreakfastPrice() {			
			global $connection;				
							
			$selection = "SELECT * FROM PRICE";
			$result = mysqli_query($connection, $selection);			
			
			$row = mysqli_fetch_array($result);
			$breakfastPrice = $row['breakfast_price_addition'];
			
			mysqli_free_result($result);
			
			return $breakfastPrice;
		}
		
		public function getParkingPrice() {			
			global $connection;				
							
			$selection = "SELECT * FROM PRICE";
			$result = mysqli_query($connection, $selection);			
			
			$row = mysqli_fetch_array($result);
			$parkingPrice = $row['parking_price_addition'];
			
			mysqli_free_result($result);
			
			return $parkingPrice;
		}
		
		public function getSingleRoomPrice() {			
			global $connection;			
			global $startDate;
			
			$selection = "SELECT * FROM PRICE WHERE room_type = 'single_room' AND  '".$startDate."' BETWEEN season_start_date AND season_end_date";			
			$result = mysqli_query($connection, $selection);			
			
			$row = mysqli_fetch_array($result);
			$singleRoomPrice = $row['price'];
			
			mysqli_free_result($result);
			
			return $singleRoomPrice;
		}
		
		public function getDoubleRoomPrice() {			
			global $connection;				
			global $startDate;
			
			$selection = "SELECT * FROM PRICE WHERE room_type = 'double_room' AND  '".$startDate."' BETWEEN season_start_date AND season_end_date";
			$result = mysqli_query($connection, $selection);			
			
			$row = mysqli_fetch_array($result);
			$doubleRoomPrice = $row['price'];
			
			mysqli_free_result($result);
			
			return $doubleRoomPrice;
		}
		
		public function getSuiteRoomPrice() {			
			global $connection;	
			global $startDate;
							
			$selection = "SELECT * FROM PRICE WHERE room_type = 'suite_room' AND  '".$startDate."' BETWEEN season_start_date AND season_end_date";
			$result = mysqli_query($connection, $selection);			
			
			$row = mysqli_fetch_array($result);
			$suiteRoomPrice = $row['price'];
			
			mysqli_free_result($result);
			
			return $suiteRoomPrice;
		}
		
		public function getSingleRoomWeekendPrice() {			
			global $connection;				
			
			$selection = "SELECT * FROM PRICE WHERE room_type = 'single_room'";			
			$result = mysqli_query($connection, $selection);			
			
			$row = mysqli_fetch_array($result);
			$singleRoomPrice = $row['weekend_price_addition'];
			
			mysqli_free_result($result);
			
			return $singleRoomPrice;
		}
		
		public function getDoubleRoomWeekendPrice() {			
			global $connection;				
			
			$selection = "SELECT * FROM PRICE WHERE room_type = 'double_room'";			
			$result = mysqli_query($connection, $selection);			
			
			$row = mysqli_fetch_array($result);
			$singleRoomPrice = $row['weekend_price_addition'];
			
			mysqli_free_result($result);
			
			return $singleRoomPrice;
		}
		
		public function getSuiteRoomWeekendPrice() {			
			global $connection;				
			
			$selection = "SELECT * FROM PRICE WHERE room_type = 'suite_room'";			
			$result = mysqli_query($connection, $selection);			
			
			$row = mysqli_fetch_array($result);
			$singleRoomPrice = $row['weekend_price_addition'];
			
			mysqli_free_result($result);
			
			return $singleRoomPrice;
		}
		
		public function getPromotionPrice($bookingProm) {			
			global $connection;	
			
			switch($bookingProm) {
				case 'prom1':
					$selection = "SELECT * FROM PROMOTION WHERE id_prom = 'prom1'";
					break;
				case 'prom2':
					$selection = "SELECT * FROM PROMOTION WHERE id_prom = 'prom2'";
					break;
				case 'prom3':
					$selection = "SELECT * FROM PROMOTION WHERE id_prom = 'prom3'";
					break;
				case 'prom4':
					$selection = "SELECT * FROM PROMOTION WHERE id_prom = 'prom4'";
					break;
				case 'prom5':
					$selection = "SELECT * FROM PROMOTION WHERE id_prom = 'prom5'";
					break;
				default:
					$bookingProm = 'prom0';
					break;
			}
			
			$promotionPrice = 0;
			
			if($bookingProm != 'prom0') {
			
				$result = mysqli_query($connection, $selection);			
				
				$row = mysqli_fetch_array($result);
				$promotionPrice = $row['price'];
				
				mysqli_free_result($result);
				
			}
			
			return $promotionPrice;
		}			
	}

?>