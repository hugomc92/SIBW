<?php

	include 'include/data/content-data/ContentGallery.php';
	include 'include/views/content-views/ContentViewGallery.php';

	class ContentControllerGallery {
		
		private $content;
		private $contentView;
		
		public function ContentControllerGallery() {
			
			$this->content = new ContentGallery();
			$this->contentView = new ContentViewGallery($this->content);
		}
		
		public function start() {
			
			$this->contentView->generateHTML();
		}
	}
	
?>