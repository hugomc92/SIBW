<?php

	include 'include/containers/Admins.php';

	class LoginController {
		
		public function LoginController() {
			
		}
		
		public function login() {
			
			// Si se ha llegado recién introducido nombre y contraseña de usuario, loguear.
			if(isset($_POST['submit_login'])) {
				$name = $_POST['name'];
				$pass = $_POST['pass'];
				
				$admins = new Admins();
				$admin = $admins->getAdmin($name, $pass);
				
				//echo '<script>alert("ADMIN: '.$admin.'")</script>';
				
				if($admin == "404_NOT_FOUND") {
					echo '<script>alert("Usuario o contraseña erróneos, inténtelo de nuevo.")</script>';
					
					return FALSE;
				}
				else {
					// Creamos la sesión
					echo '<script>alert("EXITO LOGIN")</script>';
					$_SESSION['admin'] = $admin;
				}
			}
			
			// Comprobar la validez de la sesión
			if(isset($_SESSION['admin'])) {
				return TRUE;
			}
					
			return FALSE;
		}
		
		public function logout() {
			session_destroy();
			
			unset($_SESSION);
		}
	}
?>