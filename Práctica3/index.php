<?php

	include 'include/controllers/LangController.php';
	include 'include/controllers/MetadataController.php';
	include 'include/controllers/HeaderController.php';
	include 'include/controllers/ContentController.php';
	include 'include/controllers/SidebarController.php';
	include 'include/controllers/FooterController.php';
	
	echo '<!doctype html>';
	
	// Variable global para la sección
	$sec = htmlspecialchars($_GET["sec"]);
	
	// Inicializar las variables globales con el texto en el idioma determinado
	getLangCode();
	generateGeneral();
	generateSection();
	
	// Incluir los meta datos
	$metadataController = new MetadataController();
	$metadataController->start();
	
	echo '<body>';

	// Incluir el header de la web
	$headerController = new HeaderController();
	$headerController->start();
	
	// Incluir el contenido de la web
	$contentController = new ContentController();
	$contentController->start();
	
	// Incluir el sidebar de la web
	$sidebarController = new SidebarController();
	$sidebarController->start();
	
	// Incluir el footer de la web
	$footerController = new FooterController();
	$footerController->start();
	
	echo '	</body>
		</html>
	';
		
?>