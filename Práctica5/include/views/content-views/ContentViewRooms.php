<?php

	class ContentViewRooms {
		
		private $content;
		
		public function ContentViewRooms($content) {
			
			$this->content = $content;
		}
		
		public function generateHTML() {
			
            global $rooms;
            
			echo '
				<!-- Contenido de las habitaciones -->
				<div class="content">
					<div id="container">
						<!-- Nombre de la página y breve introducción de las habitaciones -->
						<div id="rooms_title">
							<h1>'.$rooms['roomstitle'].'</h1>';
							
			if($this->content->getIndexRoom()[0] && $this->content->getIndexRoom()[1] && $this->content->getIndexRoom()[2]) {
				echo '		<p>'.$rooms['roomdescription1'].'</p>
							<p>'.$rooms['roomsdescription2'].'</p>
							<p>'.$rooms['roomsdescription3'].'</p>';
			}
			echo'		</div>';
			
			if($this->content->getIndexRoom()[0]) {
				echo '	<!-- Información de la habitación doble o twin -->
						<div id="'.$this->content->getIdRoom()[0].'" class="room">
							<img src="'.$this->content->getImages()[0].'" alt="'.$rooms['alt1'].'" width="80%"/>
							<div class="content_room">
								<h3>'.$rooms['room1'].'</h3>
								<p>'.$rooms['roomtext1'].'</p>
								<p>'.$rooms['roomservicestext'].'</p>
								<p class="price">'.$rooms['price'].' '.$this->content->getRoomPrices()[0].' €</p>
							</div>
						</div>';
			}
			
			if($this->content->getIndexRoom()[1]) {
				echo '	<!-- Información de la habitación doble superior -->
						<div id="'.$this->content->getIdRoom()[1].'" class="room">
							<img src="'.$this->content->getImages()[1].'" alt="'.$rooms['alt2'].'" width="80%"/>
							<div class="content_room">
								<h3>'.$rooms['room2'].'</h3>
								<p>'.$rooms['roomtext2'].'</p>
								<p>'.$rooms['roomservicestext'].'</p>

								<p class="price">'.$rooms['price'].' '.$this->content->getRoomPrices()[1].' €</p>
							</div>
						</div>';
			}
			
			if($this->content->getIndexRoom()[2]) {
				echo '	<!-- Información de la habitación triple; -->
						<div id="'.$this->content->getIdRoom()[2].'" class="room">
							<img src="'.$this->content->getImages()[2].'" alt="'.$rooms['alt3'].'" width="80%"/>
							<div class="content_room">
								<h3>'.$rooms['room3'].'</h3>
								<p>'.$rooms['roomtext3'].'</p>
								<p>'.$rooms['roomservicestext'].'</p>
								<p class="price">'.$rooms['price'].' '.$this->content->getRoomPrices()[2].' €</p>	
							</div>			
						</div>';
			}
			
			echo'		<!-- Iconos con los servicios ofrecidos por las habitaciones -->
						<div id="services_rooms">
							<h2>'.$rooms['servicestitle'].'</h2>
							<ul>
								<li>
									<img src="'.$this->content->getServiceIcons()[0].'" alt="'.$rooms['alt4'].'" width="60px" height="60px"/>
									<p>'.$rooms['service1'].'</p>
								</li>					
								<li>
									<img src="'.$this->content->getServiceIcons()[1].'" alt="'.$rooms['alt5'].'" width="60px" height="60px"/>
									<p>'.$rooms['service2'].'</p>
								</li>
								<li>
									<img src="'.$this->content->getServiceIcons()[2].'" alt="'.$rooms['alt6'].'" width="60px" height="60px"/>
									<p>'.$rooms['service3'].'</p>
								</li>
								<li>
									<img src="'.$this->content->getServiceIcons()[3].'" alt="'.$rooms['alt7'].'" width="60px" height="60px"/>
									<p>'.$rooms['service4'].'</p>
								</li>
								<li>
									<img src="'.$this->content->getServiceIcons()[4].'" alt="'.$rooms['alt8'].'" width="60px" height="60px"/>
									<p>'.$rooms['service5'].'</p>
								</li>
								<li>
									<img src="'.$this->content->getServiceIcons()[5].'" alt="'.$rooms['alt9'].'" width="60px" height="60px"/>
									<p>'.$rooms['service6'].'</p>
								</li>
								<li>
									<img src="'.$this->content->getServiceIcons()[6].'" alt="'.$rooms['alt10'].'" width="60px" height="60px"/>
									<p>'.$rooms['service7'].'</p>
								</li>
								<li>
									<img src="'.$this->content->getServiceIcons()[7].'" alt="'.$rooms['alt11'].'" width="60px" height="60px"/>
									<p>'.$rooms['service8'].'</p>
								</li>
							</ul>
						</div>
					</div>	
				</div>
			';
		}
	}
?>