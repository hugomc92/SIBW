<?php 

	include 'include/containers/Bookings.php';
	function sendBooking($name1, $lastName1, $country1, $address1, $city1, $postalCode1, $email1, $phone1, $observations1, $cardHolder1, $parkingSpaces1, $numPeople1, $totalPrice1, $promotion1, $singleRooms, $doubleRooms, $suiteRooms, $bookingDate, $numBreakfast) {		
		$bookings = new Bookings();	
		$bookingId = $bookings->sendBooking($name1, $lastName1, $country1, $address1, $city1, $postalCode1, $email1, $phone1, $observations1, $cardHolder1, $parkingSpaces1, $numPeople1, $totalPrice1, $promotion1, $singleRooms, $doubleRooms, $suiteRooms, $bookingDate, $numBreakfast);
		return $bookingId;		
	}	

?>