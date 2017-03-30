<?php

	include 'config/configDB.php';
	include 'include/controllers/LangController.php';
	include 'include/controllers/MetadataController.php';
	include 'include/controllers/HeaderController.php';
	include 'include/controllers/ContentController.php';
	include 'include/controllers/SidebarController.php';
	include 'include/controllers/FooterController.php';
	include 'include/controllers/AdminController.php';
	
	session_start();
	
	echo '<!DOCTYPE html>';
	
	// Variable global para la sección
	$sec = htmlspecialchars($_GET["sec"]);
	
	// Variable global para la sección de administrador
	$admin_sec = htmlspecialchars($_GET["admin"]);
	
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
	
	// Variables para la reserva, globales para el almacenamiento de HTML5
	$startDate = htmlspecialchars($_POST["start_date"]);
	$endDate = htmlspecialchars($_POST["end_date"]);
	$adultNumber = htmlspecialchars($_POST["adult_number"]);
	$childrenNumber = htmlspecialchars($_POST["children_number"]);
	$breakfast = htmlspecialchars($_POST["breakfast"]);	
	$promotionBooking = htmlspecialchars($_POST["promotion"]);	
	$formName = htmlspecialchars($_POST["formname"]);
	$formLastName = htmlspecialchars($_POST["formlastname"]);
	$formEmail = htmlspecialchars($_POST["formemail"]);
	$formPhone = htmlspecialchars($_POST["formphone"]);
	$formAddress = htmlspecialchars($_POST["formaddress"]);
	$formCity = htmlspecialchars($_POST["formcity"]);
	$formPostalCode = htmlspecialchars($_POST["formpostalcode"]);
	$formCountry = htmlspecialchars($_POST["formcountry"]);
	$formObservations = htmlspecialchars($_POST["formobservations"]);		
	$totalPrice = htmlspecialchars($_POST["total_price"]);	
	$single_number = htmlspecialchars($_POST["individual_room_number"]);
	$double_number = htmlspecialchars($_POST["double_room_number"]);
	$suite_number = htmlspecialchars($_POST["suite_room_number"]);
				
	// Comprobaciones para cambiar entre las paginas de reservas	
	if(!empty($startDate) && !empty($endDate)) {
		if(strtotime($endDate) > strtotime($startDate)) {
			$sec = "bookingselection";
		}
	}
	
	if(!empty($formName) && !empty($formEmail) && !empty($formLastName) && !empty($formPhone) && !empty($formAddress) && !empty($formCity) && !empty($formPostalCode) && !empty($formCountry)) {		
		if($single_number > 0 || $double_number > 0 || $suite_number > 0) {
			$sec = "bookingpayment";
		}
	}
	
	// Inicializar las variables globales con el texto en el idioma determinado
	getLangCode();
	generateGeneral();
	generateSection();
	
	// Incluir los meta datos
	$metadataController = new MetadataController();
	$metadataController->start();
	
	echo '<body>';
	
	// Incluir el panel de administración
	$adminController = new AdminController();
	$adminController->start();

	// Incluir el header de la web
	$headerController = new HeaderController();
	$headerController->start();
	
	// Incluir el contenido de la web
	if(empty($admin_sec)) {
		$contentController = new ContentController();
		$contentController->start();
	}
	
	// Incluir el sidebar de la web
	if(empty($admin_sec) && $sec != 'bookingselection' && $sec != 'bookingpayment') {
		$sidebarController = new SidebarController();
		$sidebarController->start();
	}
	
	// Incluir el footer de la web
	$footerController = new FooterController();
	$footerController->start();
	
	// Cerrar la conexión de la BD
	mysqli_close($connection);
	
	echo '	</body>
		</html>
	';
		
?>