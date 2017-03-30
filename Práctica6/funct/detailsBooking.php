<?php

	include '../config/configDB.php';
	include '../include/containers/Bookings.php';

	$bookingCode = htmlspecialchars($_GET["code"]);

	echo '<ul>
			<li><strong>Código de reserva: </strong>'.$bookingCode.'</li>';

	$bookings = new Bookings();

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);

	$openDB = mysqli_select_db($conn, DB_NAME);
	
	if(!$openDB) {
		die('No se pudo abrir la base de datos. Error: '.mysqli_error($connection));
	}

	// Establecer la representación de caracteres a UTF-8
	if(!mysqli_set_charset($conn, "utf8")) {
		die('Error cargando el conjunto de caracteres utf8: '.$mysqli_error($conn));
	}

	$bookingInfo = $bookings->getBookingInfo($conn, $bookingCode);

	echo '	<li><strong>Número de personas: </strong>'.$bookingInfo[0]["num_people"].'</li>
			<li><strong>Nombre: </strong>'.$bookingInfo[0]["name"].' '.$bookingInfo[0]["lastname"].'</li>
			<li><strong>Dirección: </strong>'.$bookingInfo[0]["address"].', '.$bookingInfo[0]["city"].', '.$bookingInfo[0]["country"].'</li>
			<li><strong>E-mail: </strong>'.$bookingInfo[0]["email"].'</li>
			<li><strong>Teléfono: </strong>'.$bookingInfo[0]["phone"].'</li>
			<li><strong>Plazas de parking: </strong>'.$bookingInfo[0]["parking_spaces"].'</li>
			<li><strong>Promoción: </strong>'.$bookingInfo[0]["promotion"].'</li>
			<li><strong>Observaciones: </strong>'.$bookingInfo[0]["observations"].'</li>
			<li><strong>Precio Total: </strong>'.$bookingInfo[0]["total_price"].' €</li>';
?>