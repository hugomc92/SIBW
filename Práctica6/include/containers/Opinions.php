<?php

	class Opinions {
		
		public function getAllOpinions() {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT * FROM OPINION;';
				
				$result = mysqli_query($connection, $selectQuery);
				
				$numRows = mysqli_num_rows($result);
				
				if($numRows > 0) {
					$resultMatrix = array();
					$numRow = 0;
					
					while($resultArray = mysqli_fetch_array($result)) {
						$resultMatrix[$numRow] = $resultArray;
						$numRow++;
					}
					
					return $resultMatrix;
				}
				else {		
					return "404_NOT_FOUND";
				}
			}
			else {				
				$connection = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->getAllOpinions();
			}
		}
	}
	
?>