<?php
	
	class BookingInfo {
		
		private $roomType;
		
		public function BookingInfo($roomType1) {
			$this->roomType = $roomType1;
		}
		
		public function getRoomType() {
			return $this->roomType;
		}
	}


?>