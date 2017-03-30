<?php

	include 'include/data/content-data/ContentRooms.php';
	include 'include/views/content-views/ContentViewRooms.php';

	class ContentControllerRooms {
		
		private $content;
		private $contentView;
		
		public function ContentControllerRooms() {
			
			$this->content = new ContentRooms();
			$this->contentView = new ContentViewRooms($this->content);
		}
		
		public function start() {
			
			$this->contentView->generateHTML();
		}
	}
	
?>