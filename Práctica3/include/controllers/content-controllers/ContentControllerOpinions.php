<?php

	include 'include/data/content-data/ContentOpinions.php';
	include 'include/views/content-views/ContentViewOpinions.php';

	class ContentControllerOpinions {
		
		private $content;
		private $contentView;
		
		public function ContentControllerOpinions() {
			
			$this->content = new ContentOpinions();
			$this->contentView = new ContentViewOpinions($this->content);
		}
		
		public function start() {
			
			$this->contentView->generateHTML();
		}
	}
	
?>