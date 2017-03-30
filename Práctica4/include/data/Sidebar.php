<?php

	class Sidebar {

		private $phone;
		private $promotionIndexes;
		private $promotionIds;
		
		public function Sidebar() {
			
			$this->phone = '+34 958 215 273';
			$this->promotionIndexes = array(4, 5, 3);
			$this->promotionIds = array('alh_back', 'sierra_back', 'antic_back');
		}
		
		public function getPhone() {
			
			return $this->phone;
		}
		
		public function getPromotionIndexes() {
			
			return $this->promotionIndexes;
		}
		
		public function getPromotionIds() {
			
			return $this->promotionIds;
		}
	}
	
?>