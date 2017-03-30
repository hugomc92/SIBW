<?php

	include 'include/views/content-views/ContentViewSitemap.php';

	class ContentControllerSitemap {
		
		private $contentView;
		
		public function ContentControllerSitemap() {
			
			// Es una vista estática, por lo que no necesita una clase con datos
			$this->contentView = new ContentViewSitemap();
		}
		
		public function start() {
			
			$this->contentView->generateHTML();
		}
	}
	
?>