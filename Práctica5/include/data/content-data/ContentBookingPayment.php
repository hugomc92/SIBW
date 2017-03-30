<?php

	class ContentBookingPayment {		
		
		private $bookingStartDate;
		private $bookingEndDate;
		private $bookingDays;
		private $bookingBreaskfastNumber;		
		private $singleRoomNumber;
		private $doubleRoomNumber;
		private $suiteRoomNumber;
		private $totalPrice;
		private $totalBreakfastPrice;
		private $bookingProm;
		private $promotionPrice;
		private $parkingPrice;
		private $parkingNum;
		private $singleRoomsPrice;
		private $doubleRoomsPrice;
		private $suiteRoomsPrice;
		private $roomsPrice;
		private $peopleNum;	
		private $nextSec;
		private $numberBreakfastDay;
		
		public function ContentBookingPayment() {			
			include 'include/model/Price.php';				
			
			$this->bookingDays = htmlspecialchars($_POST["booking_days"]);	
			global $startDate;
			global $endDate;
			global $adultNumber;
			global $childrenNumber;
			global $single_number;
			global $double_number;
			global $suite_number;
			$this->peopleNum = $adultNumber + $childrenNumber;			
			$i = 1;
			
			$this->singleRoomNumber = $single_number;
			$this->doubleRoomNumber = $double_number;
			$this->suiteRoomNumber = $suite_number;
			$this->bookingProm = htmlspecialchars($_POST["promotion"]);
			$this->parkingNum = htmlspecialchars($_POST["parking"]);			
			$this->bookingStartDate = $startDate; 	
			$this->bookingEndDate = $endDate; 	
						
			//Comprobacion para enviar la reserva
			$cardHolder = htmlspecialchars($_POST["card_holder"]);	
			$expMonth = htmlspecialchars($_POST["expiration_month"]);
			$expYear = htmlspecialchars($_POST["expiration_year"]);
			$cvc = htmlspecialchars($_POST["cvc_number"]);
			$cardNumber = htmlspecialchars($_POST["card_number"]);
			if(!empty($cardHolder) && !empty($expMonth) && !empty($expYear) && !empty($cvc) &&!empty($cardNumber)) {
				include "include/mod/PHPMailer/PHPMailerAutoload.php";
				include 'config/configEmail.php';
				include 'funct/sendBooking.php';
				include 'funct/sendBookingMail.php';							
				global $formName;
				global $formCountry;
				global $formAddress;
				global $formCity;
				global $formPostalCode;
				global $formEmail;
				global $formPhone;
				global $formObservations;
				global $totalPrice;	
				global $formLastName;
								
				$numPeople = htmlspecialchars($_POST["people_num"]);							
				$j = 0;					
				$bookingDate = array();			
				$currentDate = $this->bookingStartDate; 							
				$j = 0;
				for($j = 0; $j <= $this->bookingDays; $j++) {
					$bookingDate[$j] = $currentDate;
					$currentDate = date("Y-m-d", strtotime("".$currentDate." +1 day")); 	
				}
				
				$numBreakfast = array();
				for($i = 1; $i <= $this->bookingDays; $i++) {
					$numBreakfast[$i] = htmlspecialchars($_POST['breakfast'.$i]);					
				}
				
				$bookingId = sendBooking($formName, $formLastName, $formCountry, $formAddress, $formCity, $formPostalCode, $formEmail, $formPhone, $formObservations, $cardHolder, $this->parkingNum, $numPeople, $totalPrice, $this->bookingProm, $this->singleRoomNumber, $this->doubleRoomNumber, $this->suiteRoomNumber, $bookingDate, $numBreakfast);
				
				if($bookingId > 0) {
						echo "<script>alert('Reserva realizada');</script>";	
						$this->nextSec = "";
				}
				
				else { 
					echo "<script>alert('Error al realizar la reserva');</script>";
					$this->nextSec = "bookingpayment";
				}
				
				sendBookingMail($bookingId, $formName, $formLastName, $formEmail, $totalPrice, $formPhone);
				echo "<script>location.href='index.php'</script>";				
			}			
			
			$this->bookingBreaskfastNumber = 0;
			$this->singleRoomsPrice = 0;
			$this->doubleRoomsPrice = 0;
			$this->suiteRoomsPrice = 0;
			$this->numberBreakfastDay = array();
			
			for($i = 1; $i <= $this->bookingDays; $i++) {
				$this->numberBreakfastDay[$i] = htmlspecialchars($_POST['breakfast'.$i]);
				$this->bookingBreaskfastNumber = $this->numberBreakfastDay[$i] + $this->bookingBreaskfastNumber;
			}
			
			$this->totalBreakfastPrice = $this->bookingBreaskfastNumber * Price::getBreakfastPrice();	
			$this->promotionPrice = Price::getPromotionPrice($this->bookingProm);
			$this->parkingPrice = $this->parkingNum * Price::getParkingPrice();
			$this->parkingPrice = $this->parkingPrice * $this->bookingDays;										
			
			$this->singleRoomsPrice = $this->singleRoomNumber * Price::getSingleRoomPrice();		
			$this->doubleRoomsPrice = $this->doubleRoomNumber * Price::getDoubleRoomPrice();	
			$this->suiteRoomsPrice = $this->suiteRoomNumber * Price::getSuiteRoomPrice();	
								
			$this->roomsPrice = $this->singleRoomsPrice + $this->doubleRoomsPrice + $this->suiteRoomsPrice;	
			$this->roomsPrice = $this->roomsPrice * $this->bookingDays;			
				
			$date1 = $this->bookingStartDate; 
			$date2 = $this->bookingEndDate; 
			for($date1;$date1<=$date2;$date1=strtotime('+1 day ' . date('Y-m-d',$date1))){ 
				if(date('w', strtotime($date1)) == 6 || date('w', strtotime($date1)) == 0) {
					$this->roomsPrice = (Price::getSingleRoomWeekendPrice() * $this->singleRoomNumber) + $this->roomsPrice;
					$this->roomsPrice = (Price::getDoubleRoomWeekendPrice() * $this->doubleRoomNumber) + $this->roomsPrice;
					$this->roomsPrice = (Price::getSuiteRoomWeekendPrice() * $this->suiteRoomNumber) + $this->roomsPrice;
				}
			}	
					
			
			if($this->bookingProm == 'two_nights' || $this->bookingProm == 'discount' || $this->bookingProm == 'early') {
				$this->roomsPrice = $this->roomsPrice - (($this->roomsPrice * $this->promotionPrice)/100);
			}
			
			else {
				$this->roomsPrice = $this->roomsPrice + $this->promotionPrice;
			}		

			$this->totalPrice = $this->roomsPrice + $this->parkingPrice + $this->totalBreakfastPrice;
		}		
		
		public function getBookingDays() {
			return $this->bookingDays;
		}	
		
		public function getSingleRoomNumber() {
			return $this->singleRoomNumber;
		}
		
		public function getDoubleRoomNumber() {
			return $this->doubleRoomNumber;
		}
		
		public function getSuiteRoomNumber() {
			return $this->suiteRoomNumber;
		}
		
		public function getBookingPromName() {
			$promName = 'Ninguna';
			switch($this->bookingProm) {
				case 'prom1':
					$promName = 'Oferta 2 noches';
					break;
				case 'prom2':
					$promName = '10% de descuento';
					break;
				case 'prom3':
					$promName = 'Reserva anticipada';
					break;
				case 'prom4':
					$promName = 'Visita a la Alhambra';
					break;
				case 'prom5':
					$promName = 'Viaje a Sierra Nevada';
					break;
				default:
					$promName = 'Ninguna';
					break;
			}
			
			return $promName;
		}
		
		public function getBookingBreakfastNumber() {
			return $this->bookingBreaskfastNumber;
		}
		
		public function getTotalBreakfastPrice() {
			return $this->totalBreakfastPrice;
		}
		
		public function getBookingProm() {
			return $this->bookingProm;
		}
		
		public function getPromotionPrice() {
			return $this->promotionPrice;
		}
		
		public function getRoomsPrice() {
			return $this->roomsPrice;
		}	

		public function getTotalPrice() {
			return $this->totalPrice;
		}
		
		public function getParkingSpaces() {
			return $this->parkingNum;
		}
		
		public function getNumPeople() {
			return $this->peopleNum;
		}
		
		public function getBookingStartDate() {
			return $this->bookingStartDate;
		}
		
		public function getBookingEndDate() {
			return $this->bookingEndDate;
		}
		
		public function getNextSec() {
			return $this->nextSec;
		}
		
		public function getNumBreakfastDay($n) {
			return $this->numberBreakfastDay[$n];
		}
	}
	
?>