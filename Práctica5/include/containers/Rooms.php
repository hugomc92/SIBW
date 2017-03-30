<?php

	class Rooms {
		
		public function getNumRoomsByType($roomType) {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT room_num FROM ROOM WHERE room_type=\''.$roomType.'\';';
				
				$result = mysqli_query($connection, $selectQuery);
				
				$numRows = mysqli_num_rows($result);
				
				if($numRows > 0) {
					$finalResult = array();
					$numRow = 0;
					
					while($resultArray = mysqli_fetch_array($result)) {
						$finalResult[$numRow] = $resultArray["room_num"];
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
				
				$this->getNumRoomsByType($roomType);
			}
		}
	}
	
?>