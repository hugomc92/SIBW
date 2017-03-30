<?php

	include 'include/data/content-data/ContentBookingSelection.php';
	include 'include/views/content-views/ContentViewBookingSelection.php';

	class ContentControllerBookingSelection {
		
		private $content;
		private $contentView;
		
		public function ContentControllerBookingSelection() {
			
			$this->content = new ContentBookingSelection();
			$this->contentView = new ContentViewBookingSelection($this->content);			
		}
		
		public function start() {
			
			$this->contentView->generateHTML();
		}
	}
	
?>