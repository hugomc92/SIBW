<?php

	include 'include/controllers/LoginController.php';
	include 'include/data/admin-data/Admin.php';
	include 'include/views/AdminView.php';

	class AdminController {
		
		private $success;
		private $admin;
		private $adminView;
		private $adminSubController;
		
		public function AdminController() {
			
			$loginController = new LoginController();
			
			$logout = htmlspecialchars($_GET["logout"]);
			
			if($logout == true) {
				$loginController->logout();
				
				echo '<script>alert("EXITO LOGOUT")</script>';
			}
			else {
				$this->success = $loginController->login();
				
				if($this->success) {
					$this->admin = new Admin();
					$this->adminView = new AdminView($this->admin);
					
					global $admin_sec;
					
					if(!empty($admin_sec)) {
						switch($admin_sec) {
							case 'booking':
								include 'include/controllers/admin-controllers/AdminBookingController.php';
								
								$this->adminSubController = new AdminBookingController();
								break;
							case 'prices':
								include 'include/controllers/admin-controllers/AdminPricesController.php';
								
								$this->adminSubController = new AdminPricesController();
								break;
						}
					}
				}
			}
		}
		
		public function start() {
			
			if($this->success) {
				$this->adminView->generateHTML();
				
				global $admin_sec;
				
				if(!empty($admin_sec)) {
					$this->adminSubController->start();
				}
			}
		}
	}
?>