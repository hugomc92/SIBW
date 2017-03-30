<?php

include '../config/configDB.php';

// Variable global para la conexión
	$connection = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
	
	$openDB = mysqli_select_db($connection, DB_NAME);
	
	if(!$openDB) {
		die('No se pudo abrir la base de datos. Error: '.mysqli_error($connection));
	}
	
	// Establecer la representación de caracteres a UTF-8
	if(!mysqli_set_charset($connection, "utf8")) {
		die('Error cargando el conjunto de caracteres utf8: '.$mysqli_error($connection));
	}
	
	$startDate = htmlspecialchars($_GET["start_date"]);
	$endDate = htmlspecialchars($_GET["end_date"]);
	$bookingProm = htmlspecialchars($_GET["promotion"]);
	$parkingNum = htmlspecialchars($_GET["parking"]);
	$singleRoomNumber = htmlspecialchars($_GET["single_room_number"]);
	$doubleRoomNumber = htmlspecialchars($_GET["double_room_number"]);
	$suiteRoomNumber = htmlspecialchars($_GET["suite_room_number"]);
	$bookingBreaskfastNumber = htmlspecialchars($_GET["num_breakfast"]);
	
	$days = (strtotime($startDate)-strtotime($endDate))/86400;
	$days = abs($days);
	$days = floor($days);	
	
	include '../include/model/Price.php';	
	include '../include/containers/Prices.php';
	
	$totalBreakfastPrice = $bookingBreaskfastNumber * Price::getBreakfastPrice();		
	
	$singleRoomsPrice = $singleRoomNumber * Price::getSingleRoomPrice();		
	$doubleRoomsPrice = $doubleRoomNumber * Price::getDoubleRoomPrice();	
	$suiteRoomsPrice = $suiteRoomNumber * Price::getSuiteRoomPrice();	
							
	$roomsPrice = $singleRoomsPrice + $doubleRoomsPrice + $suiteRoomsPrice;	
	$roomsPrice = $roomsPrice * $days;			
				
	$date1 = $startDate; 
	$date2 = $endDate; 
	for($date1;$date1<=$date2;$date1=strtotime('+1 day ' . date('Y-m-d',$date1))){ 
		if(date('w', strtotime($date1)) == 6 || date('w', strtotime($date1)) == 0) {
			$roomsPrice = (Price::getSingleRoomWeekendPrice() * $singleRoomNumber) + $roomsPrice;
			$roomsPrice = (Price::getDoubleRoomWeekendPrice() * $doubleRoomNumber) + $roomsPrice;
			$roomsPrice = (Price::getSuiteRoomWeekendPrice() * $suiteRoomNumber) + $roomsPrice;
		}
	}
	
	$promotionPrice = Price::getPromotionPrice($bookingProm);
	$parkingPrice = $parkingNum * Price::getParkingPrice();
	$parkingPrice = $parkingPrice * $days;		
	
	if($bookingProm == 'prom1' || $bookingProm == 'prom2' || $bookingProm == 'prom3') {
		$totalPrice = $roomsPrice - (($roomsPrice * $promotionPrice)/100);	
	}
	
	else {
		$totalPrice = $roomsPrice + $promotionPrice;	
	}
	
	$totalPrice = $totalPrice + $parkingPrice + $totalBreakfastPrice;
	
	echo ''.$totalPrice.'';
	
	mysqli_close($connection);
?>