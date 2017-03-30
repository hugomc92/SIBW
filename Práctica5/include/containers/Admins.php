<?php

	class Admins {
		
		public function getAdmin($name, $pass) {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT * FROM ADMIN WHERE user = \''.$name.'\' AND password = \''.$pass.'\';';
				
				$result = mysqli_query($connection, $selectQuery);
				
				$numRows = mysqli_num_rows($result);
				
				if($numRows > 0) {
					$resultArray = mysqli_fetch_array($result);
					
					//echo '<script>alert("RESULT ARRAY USER: '.$resultArray["user"].'")</script>';
					
					return $resultArray["user"];
				}
				else {		
					return "404_NOT_FOUND";
				}
			}
			else {				
				$connection = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->getAdmin($name, $pass);
			}
		}
	}
	
?>