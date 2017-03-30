<?php

	include 'include/containers/Bookings.php';
	include 'include/containers/Promotions.php';
	include 'include/containers/Rooms.php';

	class AdminBooking {
		
		private $bookingsContainer;
		private $bookings;
		private $promotionsContainer;
		private $promotions;
		private $roomsContainer;
		
		public function AdminBooking() {
			
			$this->bookingsContainer = new Bookings();
			
			$this->saveChanges();
			
			$this->deleteBookings();
			
			$this->bookings = $this->bookingsContainer->getAllBookings();
			
			$this->promotionsContainer = new Promotions();
			
			$this->promotions = $this->promotionsContainer->getAllPromotions();
			
			$this->roomsContainer = new Rooms();
			
		}
		
		private function saveChanges() {
			
			if(isset($_POST['booking_form_save'])) {
				$totalBookings = $_POST['total_bookings'];
				
				for($i=0; $i<$totalBookings; $i++) {
					$bookingCode = $_POST['booking_code'.$i];
					$bookingObservations = $_POST['booking_observations'.$i];
					
					$totalBreakfast = $_POST['total_breakfast'.$i];
					
					$breakfast = array();
					for($j=0; $j<$totalBreakfast; $j++) {
						$breakfast[$j] = $_POST['booking_breakfast'.$i.'-'.$j];
					}
					
					$bookingPromotion = $_POST['booking_promotion'.$i];
					$bookingState = $_POST['booking_state'.$i];
					$bookingParking = $_POST['booking_parking'.$i];
					
					$bookingsInfo = $this->bookingsContainer->getBookingsInfo($bookingCode);
					
					//echo '<script>alert("booking info '.count($bookingsInfo).'")</script>';
					if($bookingsInfo != "404_NOT_FOUND") {
						$totalRooms = $_POST['total_room'.$i];
						
						$roomNums = array();
						for($j=0; $j<$totalRooms; $j++) {
							$roomNums[$j] = $_POST['booking_room'.$i.'-'.$j];
						}
									
						$roomNumIds = array();
						for($j=0; $j<count($bookingsInfo); $j++) {
							$roomNumIds[$j] = $bookingsInfo[$j]["id"];
						}
						
					}
					
					$this->bookingsContainer->saveChanges($bookingCode, $bookingObservations, $breakfast, $bookingPromotion, $bookingState, $bookingParking, $roomNums, $roomNumIds);
				}
				
				echo '<script>alert("Todos los cambios han sido guardados")</script>';
			}
		}
		
		private function deleteBookings() {
			
			if(isset($_POST['booking_form_delete'])) {
				$totalBookings = $_POST['total_bookings'];
				
				for($i=0; $i<$totalBookings; $i++) {
					$bookingCheckBox = $_POST['chk_room_row'.$i];
					$bookingCode = $_POST['booking_code'.$i];
									
					if($bookingCheckBox == 'on') {
						$this->bookingsContainer->deleteBooking($bookingCode);
					}
				}
			}
		}
		
		public function getBookingsCount() {
			
			if($this->bookings == "404_NOT_FOUND")
				return 0;
			
			return count($this->bookings);
		}
		
		public function getBookingCode($index) {
			
			return $this->bookings[$index]["booking_code"];
		}
		
		public function getBookingObservation($index) {
			
			return $this->bookings[$index]["observations"];
		}
		
		public function getBookingDate($index, $indexBooking) {
			
			$bookingsDateInfo = $this->bookingsContainer->getBookingsDateInfo($this->getBookingCode($indexBooking));
			
			return $bookingsDateInfo[$index]["booking_date"];
		}
		
		public function getBookingBreakfastCount($index) {
			
			$bookingsDateInfo = $this->bookingsContainer->getBookingsDateInfo($this->getBookingCode($index));
			
			if($bookingsDateInfo == "404_NOT_FOUND")
				return 0;
				
			return count($bookingsDateInfo);
		}
		
		public function getBookingBreakfast($index, $indexBooking) {
			
			$bookingsDateInfo = $this->bookingsContainer->getBookingsDateInfo($this->getBookingCode($indexBooking));
			
			return $bookingsDateInfo[$index]["booking_breakfast"];
		}
		
		public function getBookingPromotion($index) {
			
			return $this->bookings[$index]["promotion"];
		}
		
		public function getBookingNumPeople($index) {
			
			return $this->bookings[$index]["num_people"];
		}
		
		public function getBookingState($index) {
			
			return $this->bookings[$index]["state"];
		}
		
		public function getBookingEntryDate($index) {
			
			return $this->bookingsContainer->getBookingEntryDate($this->bookings[$index]["booking_code"]);
		}
		
		public function getBookingExitDate($index) {
		
			return $this->bookingsContainer->getBookingExitDate($this->bookings[$index]["booking_code"]);
		}
		
		public function getBookingParkingSpaces($index) {
			
			return $this->bookings[$index]["parking_spaces"];
		}
		
		public function getBookingRoomsCount($index) {
			
			$bookingsInfo = $this->bookingsContainer->getBookingsInfo($this->getBookingCode($index));
			
			if($bookingsInfo == "404_NOT_FOUND")
				return 0;
				
			return count($bookingsInfo);
		}
		
		public function getBookingRoomType($index, $indexBooking) {
			
			$bookingsInfo = $this->bookingsContainer->getBookingsInfo($this->getBookingCode($indexBooking));
			
			return $bookingsInfo[$index]["room_type"];
		}
		
		public function getBookingRoomNum($index, $indexBooking) {
			
			$bookingsInfo = $this->bookingsContainer->getBookingsInfo($this->getBookingCode($indexBooking));
			
			return $bookingsInfo[$index]["room_num"];
		}
		
		public function getAvailableRooms($index, $roomType) {
			
			$entryDate = $this->getBookingEntryDate($index);
			$exitDate = $this->getBookingExitDate($index);
			
			$rooms = $this->roomsContainer->getNumRoomsByType($roomType);
			
			$bookingCodeNotAvailables = $this->bookingsContainer->getBookingCodeNotAvailables($entryDate, $exitDate);
			
			$notAvailableRooms = $this->bookingsContainer->getNotAvailableRooms($roomType, $bookingCodeNotAvailables[$index]);
			
			
			$availableRooms = array();
			$cont = 0;
			for($i=0; $i<count($rooms); $i++) {
				$roomNum = $rooms[$i];
				
				//echo '<script>alert("Room num rooms '.$roomNum.'");</script>';
				
				if(!in_array($roomNum, $notAvailableRooms)) {
					$availableRooms[$cont] = $roomNum;
					
					//echo '<script>alert("availabeRooms ('.$cont.') '.$availableRooms[$cont].'");</script>';
					
					$cont++;
				}
			}
			
			return $availableRooms;
		}
		
		public function getBookingTotalPrice($index) {
			
			return $this->bookings[$index]["total_price"];
		}
		
		public function getPromotionsCount() {
			
			$promotions = $this->promotionsContainer->getAllPromotions();
			
			if($promotions == "404_NOT_FOUND")
				return 0;
			
			return count($promotions);
		}
		
		public function getPromotionId($index) {
						
			return $this->promotions[$index]["id_prom"];
		}
		
		public function getPromotionName($index) {
			
			return $this->promotions[$index]["prom_name"];
		}
	}

?>