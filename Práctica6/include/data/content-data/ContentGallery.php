<?php

	include 'include/containers/Galleries.php';

	class ContentGallery {
		
		private $galleries;
		private $images;
		private $galleryArrows;
		
		public function ContentGallery() {
			
			$this->galleries = new Galleries();
			
			$this->images = $this->galleries->getAllImages();
				  
			$this->galleryArrow = array('images/icons/left_arrow.png',
										'images/icons/right_arrow.png');			
		}
		
		public function getImages($index) {
			
			return $this->images[$index];
		}
		
		public function getNumImages() {
			
			return sizeof($this->images);
		}
		
		public function getGalleryArrows($index) {
			
			return $this->galleryArrow[$index];
		}	
	}
	
?>