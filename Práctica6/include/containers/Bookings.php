<?php

	class Bookings {
		
		public function Bookings() {
			
		}	
		
		public function getAllBookings() {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT * FROM BOOKING WHERE state = 0;';
				
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
				
				$this->getAllBookings();
			}
		}
		
		public function saveChanges($bookingCode, $bookingObservations, $breakfast, $bookingPromotion, $bookingState, $bookingParking, $roomNums, $roomNumIds) {
			
			global $connection;
			
			if($connection) {			
				$updateQuery = 'UPDATE BOOKING SET observations=\''.$bookingObservations.'\', promotion=\''.$bookingPromotion.'\', state=\''.$bookingState.'\', parking_spaces=\''.$bookingParking.'\' WHERE booking_code=\''.$bookingCode.'\';';
				
				if(!mysqli_query($connection, $updateQuery)) {
					echo "Error updating record: " . mysqli_error($connection);
				}
				
				for($i=0; $i<count($breakfast); $i++) {
					$updateQueryBreakfast = 'UPDATE BOOKING_DATE_INFO SET booking_breakfast=\''.$breakfast[$i].'\' WHERE booking_code=\''.$bookingCode.'\' AND booking_date=\''.$this->getBookingDate($bookingCode, $i).'\';';
					
					if(!mysqli_query($connection, $updateQueryBreakfast)) {
						echo "Error updating record: " . mysqli_error($connection);
					}
				}
				
				for($i=0; $i<count($roomNums); $i++) {
					$updateQueryBreakfast = 'UPDATE BOOKING_INFO SET room_num=\''.$roomNums[$i].'\' WHERE id=\''.$roomNumIds[$i].'\';';
					
					if(!mysqli_query($connection, $updateQueryBreakfast)) {
						echo "Error updating record: " . mysqli_error($connection);
					}
				}
				
				// Actualizar el precio final de la reserva tras los cambios
			}
			else {				
				$connection = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->saveChanges($bookingCode, $bookingObservations, $bookingPromotion, $bookingParking, $roomNums, $roomNumIds);
			}
		}
		
		public function getBookingEntryDate($bookingCode) {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT booking_date FROM BOOKING_DATE_INFO WHERE booking_code = \''.$bookingCode.'\' ORDER BY booking_date;';
				
				$result = mysqli_query($connection, $selectQuery);
				
				$numRows = mysqli_num_rows($result);
				
				if($numRows > 0) {
					$resultArray = mysqli_fetch_array($result);
					
					return $resultArray["booking_date"];
				}
				else {		
					return "404_NOT_FOUND";
				}
			}
			else {				
				$connection = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->getBookingEntryDate($bookingCode);
			}
		}
		
		public function getBookingExitDate($bookingCode) {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT booking_date FROM BOOKING_DATE_INFO WHERE booking_code = \''.$bookingCode.'\' ORDER BY booking_date DESC;';
				
				$result = mysqli_query($connection, $selectQuery);
				
				$numRows = mysqli_num_rows($result);
				
				if($numRows > 0) {
					$resultArray = mysqli_fetch_array($result);
					
					return $resultArray["booking_date"];
				}
				else {		
					return "404_NOT_FOUND";
				}
			}
			else {				
				$connection = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->getBookingExitDate($bookingCode);
			}
		}
		
		public function deleteBooking($bookingCode) {
			
			global $connection;
			
			if($connection) {			
				$updateQuery = 'DELETE FROM BOOKING WHERE booking_code=\''.$bookingCode.'\';';
				
				if(!mysqli_query($connection, $updateQuery)) {
					echo "Error deleting record: " . mysqli_error($connection);
				}
			}
			else {				
				$connection = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->deleteBooking($bookingCode);
			}
		}
		
		public function getBookingsDateInfo($bookingCode) {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT * FROM BOOKING_DATE_INFO WHERE booking_code=\''.$bookingCode.'\';';
				
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
				
				$this->getAllBookingsDateInfo();
			}
		}
		
		public function getBookingDate($bookingCode, $index) {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT booking_date FROM BOOKING_DATE_INFO WHERE booking_code=\''.$bookingCode.'\';';
				
				$result = mysqli_query($connection, $selectQuery);
				
				$numRows = mysqli_num_rows($result);
				
				if($numRows > 0) {
					$finalResult = array();
					$numRow = 0;
					
					while($resultArray = mysqli_fetch_array($result)) {
						$finalResult[$numRow] = $resultArray["booking_date"];
						$numRow++;
					}
					
					return $finalResult[$index];
				}
				else {		
					return "404_NOT_FOUND";
				}
			}
			else {				
				$connection = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->getAllBookingsDateInfo();
			}
		}
		
		public function getBookingsInfo($bookingCode) {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT * FROM BOOKING_INFO WHERE booking_code=\''.$bookingCode.'\';';
				
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
				
				$this->getAllBookingsDateInfo();
			}
		}
		
		public function getBookingCodeNotAvailables($entryDate, $exitDate) {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT DISTINCT booking_code FROM BOOKING_DATE_INFO WHERE booking_date BETWEEN \''.$entryDate.'\' AND \''.$exitDate.'\';';
				
				$result = mysqli_query($connection, $selectQuery);
				
				$numRows = mysqli_num_rows($result);
				
				if($numRows > 0) {
					$finalResult = array();
					$numRow = 0;
					
					while($resultArray = mysqli_fetch_array($result)) {
						$finalResult[$numRow] = $resultArray["booking_code"];
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
				
				$this->getBookingCodeNotAvailables($entryDate, $exitDate);
			}
		}
		
		public function getNotAvailableRooms($roomType, $bookingCode) {
			
			global $connection;
			
			if($connection) {			
				$selectQuery = 'SELECT DISTINCT room_num FROM BOOKING_INFO WHERE booking_code=\''.$bookingCode.'\' AND room_type=\''.$roomType.'\';';
				
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
				
				$this->getNotAvailableRooms($roomType, $bookingCode);
			}
		}
		
		public function sendBooking($name, $lastName, $country, $address, $city, $postalCode, $email, $phone, $observations, $cardHolder, $parkingSpaces, $numPeople, $totalPrice, $promotion, $singleRooms, $doubleRooms, $suiteRooms, $bookingDate, $numBreakfast) {
			global $connection;
			$state = 0;
			$bookingId = 0;
			$selection = "SELECT COUNT(*) AS count FROM BOOKING";
			$result = mysqli_query($connection, $selection);
			$row = mysqli_fetch_assoc($result);
			$bookingId = $row['count'] + 5001;				
			
			$insert = "INSERT INTO BOOKING VALUES('".$bookingId."','".$numPeople."', '".$name."', '".$lastName."', '".$address."', '".$city."', '".$country."', '".$email."', '".$phone."', '".$observations."', '".$cardHolder."', '".$state."', '".$totalPrice."', '".$parkingSpaces."', '".$promotion."')";
			
			mysqli_query($connection, $insert);						
						
			$selection = "SELECT COUNT(*) AS count FROM BOOKING_INFO";
			$result = mysqli_query($connection, $selection);
			$row = mysqli_fetch_assoc($result);
			$infoId = $row['count'] + 1;			
			$i = 0;
			
			for($i = 0; $i < $singleRooms; $i++) {
				$insert = "INSERT INTO BOOKING_INFO VALUES('".$infoId."', '".$bookingId."', 'single_room', NULL)";				
				mysqli_query($connection, $insert);	
				$infoId++;
			}		

			for($i = 0; $i < $doubleRooms; $i++) {
				$insert = "INSERT INTO BOOKING_INFO VALUES('".$infoId."', '".$bookingId."', 'double_room', NULL)";
				mysqli_query($connection, $insert);	
				$infoId++;
			}		
			
			for($i = 0; $i < $suiteRooms; $i++) {
				$insert = "INSERT INTO BOOKING_INFO VALUES('".$infoId."', '".$bookingId."', 'suite_room', NULL)";
				mysqli_query($connection, $insert);	
				$infoId++;
			}		

			$tamBookingDate = count($bookingDate);				
			
			for($i = 0; $i < $tamBookingDate; $i++) {
				$insert = "INSERT INTO BOOKING_DATE_INFO VALUES('".$bookingId."', '".$bookingDate[$i]."', '".$numBreakfast[$i+1]."')";
				mysqli_query($connection, $insert);						
			}
			
			return $bookingId;
		}
		
		public function getSingleRoomAvailables($startDate, $endDate) {
			global $connection;				
			$bookingId = array();			
			$cont = 0;
			$singleRoomTaken = 0;
			$selection = "SELECT * FROM BOOKING_DATE_INFO WHERE booking_date BETWEEN '".$startDate."' AND '".$endDate."'";
			$result = mysqli_query($connection, $selection);			
			
			while ($row = mysqli_fetch_array($result)){
				$bookingId[$cont] = $row['booking_code'];
				$cont++;
			}
			
			mysqli_free_result($result);
						
			$bookingArrayId = array_unique($bookingId);

			$tam = count($bookingArrayId);
			$cont = 0;
			
			for($cont = 0; $cont < $tam; $cont++) {	
				$selection = "SELECT * FROM BOOKING_INFO WHERE booking_code = '".$bookingArrayId[$cont]."'";
				$result = mysqli_query($connection, $selection);
				
				if (!$result) {
					die('No se pudo ejecutar la consulta.Error ' . mysqli_error());
				}	
				
				while ($row = mysqli_fetch_array($result)){
					if ($row['room_type'] == "single_room") {
						$singleRoomTaken++;
					}					
				}
				mysqli_free_result($result);
			}
			
			return (5 - $singleRoomTaken);			
		}	
		
		public function getDoubleRoomAvailables($startDate, $endDate) {
			global $connection;			
			$bookingId = array();
			$cont = 0;
			$doubleRoomTaken = 0;	
			$selection = "SELECT * FROM BOOKING_DATE_INFO WHERE booking_date BETWEEN '".$startDate."' AND '".$endDate."'";
			$result = mysqli_query($connection, $selection);					
			
			while ($row = mysqli_fetch_array($result)){
				$bookingId[$cont] = $row['booking_code'];
				$cont++;
			}
			
			mysqli_free_result($result);
			
			$bookingArrayId = array_unique($bookingId);

			$tam = count($bookingArrayId);
			$cont = 0;
			
			for($cont = 0; $cont < $tam; $cont++) {	
				$selection = "SELECT * FROM BOOKING_INFO WHERE booking_code = '".$bookingArrayId[$cont]."'";
				$result = mysqli_query($connection, $selection);
					
				if (!$result) {
					die('No se pudo ejecutar la consulta.Error ' . mysqli_error());
				}		
				
				while ($row = mysqli_fetch_array($result)){
					if ($row['room_type'] == "double_room") {
						$doubleRoomTaken++;
					}					
				}
				mysqli_free_result($result);
			}
			
			return (25 - $doubleRoomTaken);			
		}	
		
		public function getSuiteRoomAvailables($startDate, $endDate) {
			global $connection;			
			$bookingId = array();
			$cont = 0;
			$suiteRoomTaken = 0;
			$selection = "SELECT * FROM BOOKING_DATE_INFO WHERE booking_date BETWEEN '".$startDate."' AND '".$endDate."'";
			$result = mysqli_query($connection, $selection);			
			
			while ($row = mysqli_fetch_array($result)){
				$bookingId[$cont] = $row['booking_code'];
				$cont++;
			}
			
			mysqli_free_result($result);
			
			$bookingArrayId = array_unique($bookingId);

			$tam = count($bookingArrayId);
			$cont = 0;
			
			for($cont = 0; $cont < $tam; $cont++) {	
				$selection = "SELECT * FROM BOOKING_INFO WHERE booking_code = '".$bookingArrayId[$cont]."'";
				$result = mysqli_query($connection, $selection);
				
				if (!$result) {
					die('No se pudo ejecutar la consulta.Error ' . mysqli_error());
				}					
				
				while ($row = mysqli_fetch_array($result)){
					if ($row['room_type'] == "suite_room") {
						$suiteRoomTaken++;
					}					
				}
				
				mysqli_free_result($result);
			}
			
			return (2 - $suiteRoomTaken);			
		}	
		
		public function getSingleRoomCapacity() {
			global $connection;
			$capacity;
			
			$selection = "SELECT * FROM ROOM_TYPE WHERE room_type = 'single_room'";
			$result = mysqli_query($connection, $selection);
			
			while ($row = mysqli_fetch_array($result)){
				$capacity = $row['max_people'];				
			}
			
			return $capacity;
		}
		
		public function getDoubleRoomCapacity() {
			global $connection;
			$capacity;
			
			$selection = "SELECT * FROM ROOM_TYPE WHERE room_type = 'double_room'";
			$result = mysqli_query($connection, $selection);
			
			while ($row = mysqli_fetch_array($result)){
				$capacity = $row['max_people'];				
			}
			
			return $capacity;
		}
		
		public function getSuiteRoomCapacity() {
			global $connection;
			$capacity;
			
			$selection = "SELECT * FROM ROOM_TYPE WHERE room_type = 'suite_room'";
			$result = mysqli_query($connection, $selection);
			
			while ($row = mysqli_fetch_array($result)){
				$capacity = $row['max_people'];				
			}
			
			return $capacity;
		}
		
		public function getAllBookingsBy($conn, $name, $option) {
			
			if($conn) {			
				$selectQuery = 'SELECT * FROM BOOKING WHERE '.$option.' LIKE \''.$name.'%\' AND state=0;';

				$result = mysqli_query($conn, $selectQuery);
				
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
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->getAllBookingsByName($name);
			}
		}

		public function getBookingInfo($conn, $bookingCode) {
			
			if($conn) {			
				$selectQuery = 'SELECT * FROM BOOKING WHERE booking_code=\''.$bookingCode.'\';';
				
				$result = mysqli_query($conn, $selectQuery);
				
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
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_USER_PASS);
				
				$this->getBookingInfo($conn, $bookingCode);
			}
		}
	}
	
?>