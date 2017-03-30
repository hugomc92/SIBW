<?php
	
	include 'include/data/Metadata.php';
	include 'include/views/MetadataView.php';
	
	class MetadataController {
	
		private $metadata;
		private $metadataView;
		
		public function MetadataController() {
			
			$this->metadata = new Metadata();
			$this->metadataView = new MetadataView($this->metadata);
		}
		
		public function start() {
			
			$this->metadataView->generateHTML();
		}
	}
	
?>