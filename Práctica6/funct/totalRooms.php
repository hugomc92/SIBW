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
	$singleRoomOption = htmlspecialchars($_GET["single_room"]);
	$doubleRoomOption = htmlspecialchars($_GET["double_room"]);
	$suiteRoomOption = htmlspecialchars($_GET["suite_room"]);
	$peopleNumber = htmlspecialchars($_GET["people_number"]);
	$roomPeopleNumber;
	$minRooms = 0;
	
	if(!empty($startDate) && !empty($endDate)) {
		include '../include/model/Booking.php';		
		include '../include/containers/Bookings.php';	
		
		if(!empty($singleRoomOption)) {
			$singleRoomAvailables = Booking::getSingleRoomAvailables($startDate, $endDate);
			$roomPeopleNumber = Booking::getSingleRoomCapacity();
			
			$minRooms = $peopleNumber;
			
			echo ''.$singleRoomAvailables.'-'.$minRooms.'';
		}
		
		else if(!empty($doubleRoomOption)) {
			$doubleRoomAvailables = Booking::getDoubleRoomAvailables($startDate, $endDate);
			$roomPeopleNumber = Booking::getDoubleRoomCapacity();
			
			$minRooms = ceil($peopleNumber/$roomPeopleNumber);
			
			echo ''.$doubleRoomAvailables.'-'.$minRooms.'';
		}
		
		else if(!empty($suiteRoomOption)) {
			$suiteRoomAvailables = Booking::getSuiteRoomAvailables($startDate, $endDate);
			$roomPeopleNumber = Booking::getSuiteRoomCapacity();
			
			
			$minRooms = ceil($peopleNumber/$roomPeopleNumber);
			
			echo ''.$suiteRoomAvailables.'-'.$minRooms.'';
		}		
	}	
	
	mysqli_close($connection);
?>