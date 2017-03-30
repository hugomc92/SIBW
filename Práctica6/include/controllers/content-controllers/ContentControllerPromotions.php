<?php

	include 'include/data/content-data/ContentPromotions.php';
	include 'include/views/content-views/ContentViewPromotions.php';

	class ContentControllerPromotions {
		
		private $content;
		private $contentView;
		
		public function ContentControllerPromotions() {
			
			$this->content = new ContentPromotions();
			$this->contentView = new ContentViewPromotions($this->content);
		}
		
		public function start() {
			
			$this->contentView->generateHTML();
		}
	}
	
?>