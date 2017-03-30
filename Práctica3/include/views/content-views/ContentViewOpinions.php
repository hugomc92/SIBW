<?php

	class ContentViewOpinions {
		
		private $content;
		
		public function ContentViewOpinions($content) {
			
			$this->content = $content;
		}
		
		public function generateHTML() {
			
            global $opinions;
            
			echo '
				<!-- Contenido de las opiniones -->
				<div class="content">
						<div id="container">
						<!-- Nota media de las opiniones -->
						<!-- De momento se incluyen a mano, mas adelante se realizara automaticamente -->
						<div id="scores">
							<h1> '.$opinions['totalscore'].' </h1>
							<!-- Lista que incluye las notas y los iconos -->
							<ul>
								<li>				
									<div id="finalscore">'.$this->content->getFinalScore().'</div>
								</li>
								<li>
									<img src="'.$this->content->getIcons()[0].'" alt="'.$opinions['alt1'].'" />
									<span>'.$opinions['singlescore1'].'</span>
									<span class="score">'.$this->content->getCleanScore().'</span>
								</li>
								<li>
									<img src="'.$this->content->getIcons()[1].'" alt="'.$opinions['alt2'].'"  />
									<span>'.$opinions['singlescore2'].'</span>
									<span class="score">'.$this->content->getAttentionScore().'</span>
								</li>
								<li>
									<img src="'.$this->content->getIcons()[2].'" alt="'.$opinions['alt3'].'" />
									<span>'.$opinions['singlescore3'].'</span>
									<span class="score">'.$this->content->getConfortScore().'</span>
								</li>
								<li>
									<img src="'.$this->content->getIcons()[3].'" alt="'.$opinions['alt4'].'" />
									<span>'.$opinions['singlescore4'].'</span>
									<span class="score">'.$this->content->getLocationScore().'</span>
								</li>
								<li>
									<img src="'.$this->content->getIcons()[4].'" alt="'.$opinions['alt5'].'" />
									<span>'.$opinions['singlescore5'].'</span>
									<span class="score">'.$this->content->getFacilitiesScore().'</span>
								</li>
								<li>
									<img src="'.$this->content->getIcons()[5].'" alt="'.$opinions['alt6'].'" />
									<span>'.$opinions['singlescore6'].'</span>
									<span class="score">'.$this->content->getBreakfastScore().'</span>
								</li>
							</ul>
						</div>
						<!-- Imagen a la derecha de las notas -->
						<img id="pic_principal" src="'.$this->content->getPrincipalImage().'" alt="'.$opinions['alt7'].'" width="50%"/>

						<!-- Opiniones individuales -->
						<!-- Todas tienen el mismo esqueleto  -->
						<!-- De momento se rellenan a mano, mas adelante se realizarán automaticamente -->';
						
			for($i=0; $i<$this->content->getNumOpinions(); $i++) {
				echo '	<div class="client_opinion">
							<div class="data_opinion">
								'.$this->content->getOpinionDates()[$i].' - '.$this->content->getOpinionAuthors()[$i].', '.$this->content->getOpinionCountries()[$i].'
							</div>
							<!-- Lista con las notas del cliente -->
							<ul>
								<li>'.$opinions['singlescore1'].' <span class="single_score">'.$this->content->getOpinionCleaningScores()[$i].'</span>/10</li>
								<li>'.$opinions['singlescore2'].' <span class="single_score">'.$this->content->getOpinionAttentionScores()[$i].'</span>/10</li>
								<li>'.$opinions['singlescore3'].' <span class="single_score">'.$this->content->getOpinionConforScores()[$i].'</span>/10</li>
								<li>'.$opinions['singlescore4'].' <span class="single_score">'.$this->content->getOpinionLocationScores()[$i].'</span>/10</li>
								<li>'.$opinions['5'].' <span class="single_score">'.$this->content->getOpinionFacilitiesScores()[$i].'</span>/10</li>
								<li>'.$opinions['singlescore6'].' <span class="single_score">'.$this->content->getOpinionBreakfastScores()[$i].'</span>/10</li>
							</ul>
							<div class="opinion_text">
								<div class="client_score">'.$this->content->getOpinionFinalScores()[$i].'</div>
								<!-- Comentario del cliente -->
								<p class="client_recom">'.$this->content->getOpinionClientMessage1()[$i].'</p>
								<p>'.$this->content->getOpinionClientMessage2()[$i].'</p>
								<p class="recommendation">'.$this->content->getOpinionClientRecommendation()[$i].'</p>
							</div>			
						</div>';
			}
						
			echo '			
					</div>
				</div>
			';
		}
	}
?>