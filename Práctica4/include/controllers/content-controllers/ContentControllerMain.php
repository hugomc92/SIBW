<?php

	include 'include/data/content-data/ContentMain.php';
	include 'include/views/content-views/ContentViewMain.php';

	class ContentControllerMain {
		
		private $content;
		private $contentView;
		
		public function ContentControllerMain() {
			
			$this->content = new ContentMain();
			$this->contentView = new ContentViewMain($this->content);
		}
		
		public function start() {
			
			$this->contentView->generateHTML();
		}
	}
	
?>