<?php

	class Galleries {
				
		public function getAllImages() {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT image_path FROM GALLERY;';
				
				$result = mysqli_query($connection, $selectQuery);
				
				$numRows = mysqli_num_rows($result);
				
				if($numRows > 0) {
					$finalResult = array();
					$numRow = 0;
					
					while($resultArray = mysqli_fetch_array($result)) {
						$finalResult[$numRow] = $resultArray["image_path"];
						$numRow++;
					}
					
					return $finalResult;
				}
				else {		
					return "404_NOT_FOUND";
				}
			}
			else {				
				$connection = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->ggetAllImages();
			}
		}
	}
	
?>