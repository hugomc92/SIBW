<?php

	include 'include/data/Footer.php';
	include 'include/views/FooterView.php';

	class FooterController {
		
		private $footer;
		private $footerView;
		
		public function FooterController() {
			
			$this->footer = new Footer();
			$this->footerView = new FooterView($this->footer);
		}
		
		public function start() {
			
			$this->footerView->generateHTML();
		}
	}
	
?>