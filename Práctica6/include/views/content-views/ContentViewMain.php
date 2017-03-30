<?php

	class ContentViewMain {
		
		private $content;
		
		public function ContentViewMain($content) {
			
			$this->content = $content;
		}
		
		public function generateHTML() {
			
			global $langInputEnd;
            global $main;
			
			echo '
				<!-- Contenido del index -->
				<div class="content">
					<div id="img_principal">
						<h2>'.$main['phrase'].'</h2>
					</div>
					<div id=main_content>
						<!-- Accesos a las partes más importantes de la página -->
						<div id="images">
							<div id="img1"><a href="index.php?sec=promotions'.$langInputEnd.'">
								<img src="'.$this->content->getImages()[0].'" alt="'.$main['alt1'].'" width="100%"/>
								<p>'.$main['img1'].'</p>
							</a></div>
							<div id="img2"><a href="index.php?sec=rooms'.$langInputEnd.'">
								<img src="'.$this->content->getImages()[1].'" alt="'.$main['alt2'].'" width="100%"/>
								<p>'.$main['img2'].'</p>
							</a></div>
							<div id="img3"><a href="index.php?sec=gallery'.$langInputEnd.'">
								<img src="'.$this->content->getImages()[2].'" alt="'.$main['alt3'].'" width="100%"/>
								<p>'.$main['img3'].'</p>
							</a></div>
							<div id="img4"><a href="index.php?sec=opinions'.$langInputEnd.'">
								<img src="'.$this->content->getImages()[3].'" alt="'.$main['alt4'].'" width="100%"/>
								<p>'.$main['img4'].'</p>
							</a></div>
						</div>
						<!-- Servicios del hotel -->
						<div id="services">
							<h2>'.$main['servicestitle'].'</h2>
							<ul>
								<li><div class="icon_service">
									<img src="'.$this->content->getServiceIcons()[0].'" alt="'.$main['alt5'].'" width="60px" height="60px"/>
									<p>'.$main['service1'].'</p>
								</div></li>
								<li><div class="icon_service">
									<img src="'.$this->content->getServiceIcons()[1].'" alt="'.$main['alt6'].'" width="60px" height="60px"/>
									<p>'.$main['service2'].'</p>
								</div></li>
								<li><div class="icon_service">
									<img src="'.$this->content->getServiceIcons()[2].'" alt="'.$main['alt7'].'" width="60px" height="60px"/>
									<p>'.$main['service3'].'</p>
								</div></li>
								<li><div class="icon_service">
									<img src="'.$this->content->getServiceIcons()[3].'" alt="'.$main['alt8'].'" width="60px" height="60px"/>
									<p>'.$main['service4'].'</p>
								</div></li>
								<li><div class="icon_service">
									<img src="'.$this->content->getServiceIcons()[4].'" alt="'.$main['alt9'].'" width="60px" height="60px"/>
									<p>'.$main['service5'].'</p>
								</div></li>
								<li><div class="icon_service">
									<img src="'.$this->content->getServiceIcons()[5].'" alt="'.$main['alt10'].'" width="60px" height="60px"/>
									<p>'.$main['service6'].'</p>
								</div></li>
								<li><div class="icon_service">
									<img src="'.$this->content->getServiceIcons()[6].'" alt="'.$main['alt11'].'" width="60px" height="60px"/>
									<p>'.$main['service7'].'</p>
								</div></li>
								<li><div class="icon_service">
									<img src="'.$this->content->getServiceIcons()[7].'" alt="'.$main['alt12'].'" width="60px" height="60px"/>
									<p>'.$main['service8'].'</p>
								</div></li>
							</ul>
						</div>
					</div>
				</div>
			';
		}
	}
?>