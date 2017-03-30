<?php

	class ContentViewPromotions {
		
		private $content;
		
		public function ContentViewPromotions($content) {
			
			$this->content = $content;
		}
		
		public function generateHTML() {
			
            global $promotions;
            
			echo '
				<!-- Contenido de las promociones -->
				<div class="content">
					<h1>'.$promotions['promotionstitle'].'</h1>
					<div id="promotions">
						<div id="tabs">
							<!-- Contennido de las pestañas -->';
							
			if($this->content->getIndexProm()[0]) {
				echo '
							<div id="'.$this->content->getIdProm()[0].'" class="prom_content">
								<h3>'.$promotions['prom1'].'</h3>
								<img src="'.$this->content->getImages()[0].'" alt="'.$promotions['alt1'].'" width="70%"/>
								<p>'.$promotions['promtext1'].'</p>
								<!-- Ahora mismo este botón es puramente estético, cuando hagamos la funcionalidad de reservar
								Se le añadirá estilos para que siempre esté visible en todas las páginas un submenú con la funcionalidad -->
								<a href="#" class="book">'.$promotions['booking'].'</a>
							</div>';
			}
			
			if($this->content->getIndexProm()[1]) {
				echo '
							<div id="'.$this->content->getIdProm()[1].'" class="prom_content">
								<h3>'.$promotions['prom2'].'</h3>
								<img src="'.$this->content->getImages()[1].'" alt="'.$promotions['alt2'].'" width="70%"/>
								<p>'.$promotions['promtext2'].'</p>
								<p>'.$promotions['promtext3'].'</p>
								<!-- Ahora mismo este botón es puramente estético, cuando hagamos la funcionalidad de reservar
								Se le añadirá estilos para que siempre esté visible en todas las páginas un submenú con la funcionalidad -->
								<a href="#" class="book">'.$promotions['booking'].'</a>
							</div>';
			}
			
			if($this->content->getIndexProm()[2]) {
				echo '
							<div id="'.$this->content->getIdProm()[2].'" class="prom_content">
								<h3>'.$promotions['prom3'].'</h3>
								<img src="'.$this->content->getImages()[2].'" alt="'.$promotions['alt3'].'" width="70%"/>
								<p>'.$promotions['promtext4'].'</p>
								<!-- Ahora mismo este botón es puramente estético, cuando hagamos la funcionalidad de reservar
								Se le añadirá estilos para que siempre esté visible en todas las páginas un submenú con la funcionalidad -->
								<a href="#" class="book">'.$promotions['booking'].'</a>
							</div>';
			}
			
			if($this->content->getIndexProm()[3]) {
				echo '
							<div id="'.$this->content->getIdProm()[3].'" class="prom_content">
								<h3>'.$promotions['prom4'].'</h3>
								<img src="'.$this->content->getImages()[3].'" alt="'.$promotions['alt4'].'" width="70%"/>
								<div class="prom">
									<div class="include">
										<p>'.$promotions['includetitle'].'</p>
										<ul>
											<li>'.$promotions['include1'].'</li>
											<li>'.$promotions['include2'].'</li>
											<li>'.$promotions['include3'].'
												<ul>
													<li>'.$promotions['include4'].'</li>
													<li>'.$promotions['include5'].'</li>
													<li>'.$promotions['include6'].'</li>
													<li>'.$promotions['include7'].'</li>
												</ul>
											</li>
										</ul>
									</div>
									<div class="more_info">
										<p><ins>'.$promotions['duration'].'</ins> '.$promotions['promtext5'].'</p>
										<p><ins>'.$promotions['schedule'].'</ins> '.$promotions['promtext6'].'</p>
										<ul>
											<li'.$promotions['promtext7'].'</li>
											<li>'.$promotions['promtext8'].'</strong></li>
										</ul>
										<ul>
											<li>'.$promotions['release'].'</li>
											<li>'.$promotions['cancellationpollicy'].'</li>
										</ul>
										<p>'.$promotions['promtext9'].'</p>
									</div>
									<div class="prom_info">
										<h3>Alhambra</h3>
										<p>'.$promotions['promtext10'].'</p>
									</div>
								</div>
								<!-- Ahora mismo este botón es puramente estético, cuando hagamos la funcionalidad de reservar
								Se le añadirá estilos para que siempre esté visible en todas las páginas un submenú con la funcionalidad -->
								<a href="#" class="book">'.$promotions['booking'].'</a>
							</div>';
			}
			
			if($this->content->getIndexProm()[4]) {
				echo '
							<div id="'.$this->content->getIdProm()[4].'" class="prom_content">
								<h3>'.$promotions['prom5'].'</h3>
								<img src="'.$this->content->getImages()[4].'" alt="'.$promotions['alt5'].'" width="70%"/>
								<div class="prom">
									<div class="include">
										<p>'.$promotions['includetitle'].'</p>
										<ul>
											<li>'.$promotions['include1'].'</li>
											<li>'.$promotions['include2'].'</li>
											<li>'.$promotions['include3'].'
												<ul>
													<li>'.$promotions['include4'].'</li>
													<li>'.$promotions['include5'].'</li>
													<li>'.$promotions['include6'].'</li>
													<li>'.$promotions['include7'].'</li>
												</ul>
											</li>
										</ul>
									</div>
									<div class="more_info">
										<p><ins>'.$promotions['duration'].'</ins> '.$promotions['promtext11'].'</p>
										<p><ins>'.$promotions['schedule'].'</ins> '.$promotions['promtext12'].'</p>
										<ul>
											<li>'.$promotions['promtext13'].'</strong></li>
											<li>'.$promotions['promtext14'].'</strong></li>
										</ul>
										<ul>
											<li>'.$promotions['release'].'</li>
											<li>'.$promotions['cancellationpollicy'].'</li>
										</ul>
										<p>'.$promotions['promtext15'].'</p>
									</div>
									<div class="prom_info">
										<h3>Sierra Nevada</h3>
										<p>'.$promotions['promtext16'].'</p>
									</div>
								</div>
								<!-- Ahora mismo este botón es puramente estético, cuando hagamos la funcionalidad de reservar
								Se le añadirá estilos para que siempre esté visible en todas las páginas un submenú con la funcionalidad -->
								<a href="#" class="book">'.$promotions['booking'].'</a>
							</div>';
			}	
			echo '		</div>
					</div>
				</div>';
		}
	}
?>
