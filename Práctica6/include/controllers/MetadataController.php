<?php
	
	include 'include/data/Metadata.php';
	include 'include/views/MetadataView.php';
	
	class MetadataController {
	
		private $metadata;
		private $metadataView;
		
		public function MetadataController() {

			// Comprobar el user agent para cargar estilos para dispositivos móviles si es necesario
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$mobile = FALSE;

			if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $useragent))
				$mobile = TRUE;

			//echo '<script>alert("'.$useragent.'\n'.$mobile.'")</script>';
			
			$this->metadata = new Metadata($mobile);
			$this->metadataView = new MetadataView($this->metadata);
		}
		
		public function start() {
			
			$this->metadataView->generateHTML();
		}
	}
	
?>