<?php

	class ContentOpinions {
		
		private $finalScore;
		private $cleanScore;
		private $attentionScore;
		private $confortScore;
		private $locationScore;
		private $facilitiesScore;
		private $breakfastScore;
		
		private $icons;
		private $principalImage;
		
		private $opinionDates;
		private $opinionAuthors;
		private $opinionCountries;
		private $opinionCleaningScores;
		private $opinionAttentionScores;
		private $opinionConforScores;
		private $opinionLocationScores;
		private $opinionFacilitiesScores;
		private $opinionBreakfastScores;
		private $opinionFinalScores;
		private $opinionClientMessage1;
		private $opinionClientMessage2;
		private $opinionClientRecommendation;
		
		public function ContentOpinions() {
			
			$this->opinionDates = array('24/02/2016', '21/02/2016', '29/01/2016', '02/01/2016', '30/12/2015');		
			$this->opinionAuthors = array('ALBERTO', 'Eva Maria', 'Patricia Celina', 'MARÍA JULIA', 'barrere');
			$this->opinionCountries = array('España', 'España', 'Argentina', 'España', 'Francia');
			$this->opinionCleaningScores = array(8, 10, 9, 10, 10);
			$this->opinionAttentionScores = array(9, 10, 9, 10, 10);
			$this->opinionConforScores = array(7, 10, 9, 10, 10);
			$this->opinionLocationScores = array(10, 10, 10, 10, 10);
			$this->opinionFacilitiesScores = array(7, 10, 9, 10, 10);
			$this->opinionBreakfastScores = array(7, 10, 7, 10, 10);
			$this->opinionFinalScores = array();
			
			$totalNum = sizeof($this->opinionCleaningScores);
			
			$this->cleanScore = 0;
			$this->attentionScore = 0;
			$this->confortScore = 0;
			$this->locationScore = 0;
			$this->facilitiesScore = 0;
			$this->breakfastScore = 0;
			
			for($i=0; $i<$totalNum; $i++) {
				$final = ($this->opinionCleaningScores[$i] + $this->opinionAttentionScores[$i] + $this->opinionConforScores[$i] + 
						  $this->opinionLocationScores[$i] + $this->opinionFacilitiesScores[$i] + $this->opinionBreakfastScores[$i]) / 6;
				
				if(floor($final) != $final)
					$final = number_format($final, 1);
				
				$this->opinionFinalScores[$i] = $final;
				
				$this->cleanScore += $this->opinionCleaningScores[$i];
				$this->attentionScore += $this->opinionAttentionScores[$i];
				$this->confortScore += $this->opinionConforScores[$i];
				$this->locationScore += $this->opinionLocationScores[$i];
				$this->facilitiesScore += $this->opinionFacilitiesScores[$i];
				$this->breakfastScore += $this->opinionBreakfastScores[$i];
			}
			
			$this->cleanScore = number_format($this->cleanScore / $totalNum, 1);
			$this->attentionScore = number_format($this->attentionScore / $totalNum, 1);
			$this->confortScore = number_format($this->confortScore / $totalNum, 1);
			$this->locationScore = number_format($this->locationScore / $totalNum, 1);
			$this->facilitiesScore = number_format($this->facilitiesScore / $totalNum, 1);
			$this->breakfastScore = number_format($this->breakfastScore / $totalNum, 1);
			
			$this->opinionClientMessage1 = array('Una sugerencia en relación con el desayuno.',
												 'ESTUPENDO',
												 'HERMOSO HOTEL',
												 'TODO FENOMENAL',
												 'FORMIDABLE!');
			$this->opinionClientMessage2 = array('Tortilla y huevos revueltos. Repetiré, para ir al juzgado es cómodo.',
												 'Todo estupendo y muy acogedor..y el desayuno super completo..lo recomiendo 100%',
												 'Ubicado en un lugar excepcional. cómodo, lindo. pasé dos días lindísimos',
												 'Del desayuno no puedo opinar porque no usé esa opción, pero el resto de servicios muy bien, la ubicación perfecta.',
												 'Personnel très gentil un accueil formidable ! je le recommenderai auprès de tripadvisor et easyvoyages! merci');
			$this->opinionClientRecommendation = array('Sí', 'Sí', 'Sí', 'Sí', 'Sí');
			
			
			
			$this->finalScore = ($this->cleanScore + $this->attentionScore +
								 $this->confortScore +$this->locationScore +
								 $this->facilitiesScore + $this->breakfastScore) / 6;
			
			$this->finalScore = number_format($this->finalScore, 1);
			
			$this->icons = array('images/icons/opinions/cleaning.png',
								 'images/icons/opinions/staff_attention.png',
								 'images/icons/opinions/comfort.png',
								 'images/icons/opinions/location.png',
								 'images/icons/opinions/facilities.png',
								 'images/icons/opinions/breakfast.png');
								 
			$this->principalImage = 'images/hotel/opinion.jpg';
		}
		
		public function getFinalScore() {
			
			return $this->finalScore;
		}
		
		public function getCleanScore() {
			
			return $this->cleanScore;
		}
		
		public function getAttentionScore() {
			
			return $this->attentionScore;
		}
		
		public function getConfortScore() {
			
			return $this->confortScore;
		}
		
		public function getLocationScore() {
			
			return $this->locationScore;
		}
		
		public function getFacilitiesScore() {
			
			return $this->facilitiesScore;
		}
		
		public function getBreakfastScore() {
			
			return $this->breakfastScore;
		}
		
		public function getIcons() {
			
			return $this->icons;
		}
		
		public function getPrincipalImage() {
			
			return $this->principalImage;
		}
		
		public function getNumOpinions() {
			
			return sizeof($this->opinionAuthors);
		}
		
		public function getOpinionDates() {
			
			return $this->opinionDates;
		}
		
		public function getOpinionAuthors() {
			
			return $this->opinionAuthors;
		}
		
		public function getOpinionCountries() {
			
			return $this->opinionCountries;
		}
		
		public function getOpinionCleaningScores() {
			
			return $this->opinionCleaningScores;
		}
		
		public function getOpinionAttentionScores() {
			
			return $this->opinionAttentionScores;
		}
		
		public function getOpinionConforScores() {
			
			return $this->opinionConforScores;
		}
		
		public function getOpinionLocationScores() {
			
			return $this->opinionLocationScores;
		}
		
		public function getOpinionFacilitiesScores() {
			
			return $this->opinionFacilitiesScores;
		}
		
		public function getOpinionBreakfastScores() {
			
			return $this->opinionBreakfastScores;
		}
		
		public function getOpinionFinalScores() {
			
			return $this->opinionFinalScores;
		}
		
		public function getOpinionClientMessage1() {
			
			return $this->opinionClientMessage1;
		}
		
		public function getOpinionClientMessage2() {
			
			return $this->opinionClientMessage2;
		}
		
		public function getOpinionClientRecommendation() {
			
			return $this->opinionClientRecommendation;
		}
	}
	
?>