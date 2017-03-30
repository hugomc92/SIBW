<?php

	class MetadataView {
		
		private $metadata;
		
		public function MetadataView($metadata) {
			
			$this->metadata = $metadata;
		}
		
		public function generateHTML() {
			
			global $sec;
			
			echo '
				<head>
					<meta charset="utf-8">	<!-- Hacer que se use la codificación utf-8 para las tildes sobre todo -->
					<!-- Establecer el viewport por defecto, en este caso, el alto y el zoom predeterminados -->
					<!-- El ancho está puesto para que sea según las dimensiones del dispositivo en que se abra -->
					<!-- El zoom está inicialmente a 1 -->
					<meta name="viewport" content="width=device-width, initial-scale=1"/>
					
					<!-- Autores de la página -->
					<meta content="Nombre de los autores" name="Hugo Maldonado y Blas Varela"/>
					
					<!-- Descripcción de la página -->
					<meta content="Descripción de la página" name="'.$this->metadata->getDescription().'"/>
					
					<!-- Comportamiento de los robots con la página, en este caso, que se pueda indexar
					y que pueda seguir los enlaces de la web -->
					<meta name="robots" content="index, follow"/>
					
					<!-- Palabras clave de la web para los buscadores -->
					<!-- Algunos sitios dicen que no es realmente útil a día de hoy, pero por si acaso mejor pornerlo -->
					<meta name="keywords" content="'.$this->metadata->getKeywords().'"/>
					
					<!-- Demostrarle a Google la verificación del sitio mediante información de una cuenta de Google Webmasters Tools -->
					<meta name="google-site-verification"" content="Aquí irían los datos proporcionados por webmasters tools"/>
					
					<!-- Título de la página -->
					<title>'.$this->metadata->getTitle().'</title>
					
					<!-- Hoja de estilos principal para la plantilla -->
					<link rel="stylesheet" href="style/style.css"/>
					<!-- Hoja de estilos para el contenido en sí -->
					<link rel="stylesheet" href="'.$this->metadata->getStyle().'"/>';
			
			$mobile = $this->metadata->isMobile();

			if($mobile == TRUE) {
				echo '	
					<!-- Hoja de estilos principal para la plantilla en dispositivos móviles -->
					<link rel="stylesheet" href="style/mobile/mobile-style.css"/>
					<!-- Hoja de estilos para el contenido en sí en dispositivos móviles-->
					<link rel="stylesheet" href="'.$this->metadata->getMobileStyle().'"/>';
			}
					
			if(empty($sec)) {
				echo '
					<!-- Hoja de estilos para la letra Dancing Script del texto de la imagen principal -->
					<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet" type="text/css"/>';
			}
			
			echo '	<!-- Icono que aparece en la pestaña o ventana de los navegadores -->
					<link rel="shortcut icon" href="images/icons/favicon.ico"/>	
					
					<script src="js/jquery-2.2.4.min.js"></script>
					
					<!-- Script para ocultar el menu en scroll en dispositivos con pantalla pequeña -->
					<script src="js/main.js"></script>';
					
			global $admin_sec;
					
			if($sec != 'promotions' && empty($admin_sec)) {	
				echo '	
					<!-- Script para el slide de promociones -->
					<script src="js/promotions.js"></script>';
			}
			
			if($sec == 'contact') {	
				echo '	
					<!-- Script para la funcionalidad del formulario -->
					<script src="js/contactform.js"></script>';
			}
			
			if($sec == 'contact') {	
				echo '	
					<!-- Script para la funcionalidad del formulario -->
					<script src="js/contactform.js"></script>';
			}
			
			if($sec == 'bookingselection') {	
				echo '	
					<!-- Script para la funcionalidad de las reservas -->
					<script src="js/jquery-2.2.4.min.js"></script>					
					<script src="js/bookingform.js"></script>';			
			}	
			
			echo '
					<!-- Hoja de estilos principal para la administración -->
					<link rel="stylesheet" href="style/admin/style-admin.css"/>
					
					<script src="js/admin/main-admin.js"></script>';

			if($mobile == TRUE) {
				echo '
					<!-- Hoja de estilos principal para la administración en dispositivos móviles -->
					<link rel="stylesheet" href="style/mobile/admin/mobile-style-admin.css"/>';
			}
			
			switch($admin_sec) {
				case 'booking':
					echo '
					<!-- Hoja de estilos principal para las reservas de la administración -->
					<link rel="stylesheet" href="style/admin/booking.css"/>';

					if($mobile == TRUE) {
						echo '
						<!-- Hoja de estilos principal para las reservas de la administración en dispositivos móviles -->
						<link rel="stylesheet" href="style/mobile/admin/mobile-booking.css"/>';
					}
					break;
				case 'prices':
					echo '
					<!-- Hoja de estilos principal para las precios de la administración -->
					<link rel="stylesheet" href="style/admin/prices.css"/>';

					if($mobile == TRUE) {
						echo '
						<!-- Hoja de estilos principal para las precios de la administración en dispositivos móviles -->
						<link rel="stylesheet" href="style/mobile/admin/mobile-prices.css"/>';
					}
					break;
			}
			echo '
				</head>';
		}
	}

?>