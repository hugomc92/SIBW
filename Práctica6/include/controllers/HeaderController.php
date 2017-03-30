<?php

	include 'include/data/Header.php';
	include 'include/views/HeaderView.php';

	class HeaderController {
		
		private $header;
		private $headerView;
		
		public function HeaderController() {
			
			$this->header = new Header();
			$this->headerView = new HeaderView($this->header);
		}
		
		public function start() {
			
			$this->headerView->generateHTML();
		}
	}
	
?>