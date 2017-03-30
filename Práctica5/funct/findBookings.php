<?php

	include '../config/configDB.php';
	include '../include/containers/Bookings.php';

	$str = htmlspecialchars($_GET["search"]);

	$bookings = new Bookings();

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);

	$openDB = mysqli_select_db($conn, DB_NAME);
	
	if(!$openDB) {
		die('No se pudo abrir la base de datos. Error: '.mysqli_error($conn));
	}

	// Establecer la representación de caracteres a UTF-8
	if(!mysqli_set_charset($conn, "utf8")) {
		die('Error cargando el conjunto de caracteres utf8: '.$mysqli_error($conn));
	}

	$bookingsName = $bookings->getAllBookingsBy($conn, $str, 'name');
	$bookingsSurname = $bookings->getAllBookingsBy($conn, $str, 'lastname');
	$bookingsCode = $bookings->getAllBookingsBy($conn, $str, 'booking_code');
	
	echo '	<ul>';

	// Búsqueda por nombre
	if($bookingsName != "404_NOT_FOUND") {
		for($i=0; $i<count($bookingsName); $i++) {
			echo '<li onclick="detailBooking('.$bookingsName[$i]["booking_code"].')"><a href="#overlay-booking"><strong>'.$bookingsName[$i]["booking_code"].': </strong>'.$bookingsName[$i]["name"].' '.$bookingsName[$i]["lastname"].'</a></li>';
		}
	}

	// Búsqueda por apellido
	if($bookingsSurname != "404_NOT_FOUND") {
		for($i=0; $i<count($bookingsSurname); $i++) {
			echo '<li onclick="detailBooking('.$bookingsSurname[$i]["booking_code"].')"><a href="#overlay-booking"><strong>'.$bookingsSurname[$i]["booking_code"].': </strong>'.$bookingsSurname[$i]["name"].' '.$bookingsSurname[$i]["lastname"].'</a></li>';
		}
	}

	// Búsquda por código de reserva
	if($bookingsCode != "404_NOT_FOUND") {
		for($i=0; $i<count($bookingsCode); $i++) {
			echo '<li onclick="detailBooking('.$bookingsCode[$i]["booking_code"].')"><a href="#overlay-booking"><strong>'.$bookingsCode[$i]["booking_code"].': </strong>'.$bookingsCode[$i]["name"].' '.$bookingsCode[$i]["lastname"].'</a></li>';
		}
	}

	if($bookingsName == "404_NOT_FOUND" && $bookingsSurname == "404_NOT_FOUND" && $bookingsCode == "404_NOT_FOUND") {
		echo '	<li><a href="#">No encontrado</a></li>';
	}

	echo '	</ul>';

	mysqli_close($conn);
?>