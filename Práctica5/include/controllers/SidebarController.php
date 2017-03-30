<?php

	include 'include/data/Sidebar.php';
	include 'include/views/SidebarView.php';

	class SidebarController {
		
		private $sidebar;
		private $sidebarView;
		
		public function SidebarController() {
			
			$this->sidebar = new Sidebar();
			$this->sidebarView = new SidebarView($this->sidebar);
		}
		
		public function start() {
			
			$this->sidebarView->generateHTML();
		}
	}
	
?>