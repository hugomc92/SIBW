<?php

	class SidebarView {
		
		private $sidebar;
		
		public function SidebarView($sidebar) {
			
			$this->sidebar = $sidebar;
		}
		
		public function generateHTML() {
			
			global $sec;
            global $general;
			global $langInputEnd;
			
			echo '
				<div id="sidebar">
					<div id="content_sidebar">';
					
			if($sec != 'contact') {
				echo '
					<h2>'.$this->sidebar->getPhone().'</h2>
				';
			}
			
			switch($sec) {
				case 'promotions':
					echo '
						<ul id="prom_menu">
							<li><a class="sidebar_button" href="index.php?sec=promotions&prom=prom1'.$langInputEnd.'">'.$general['sidebarprom1'].'</a></li>
							<li><a class="sidebar_button" href="index.php?sec=promotions&prom=prom2'.$langInputEnd.'">'.$general['sidebarprom2'].'</a></li>
							<li><a class="sidebar_button" href="index.php?sec=promotions&prom=prom3'.$langInputEnd.'">'.$general['sidebarprom3'].'</a></li>
							<li><a class="sidebar_button" href="index.php?sec=promotions&prom=prom4'.$langInputEnd.'">'.$general['sidebarprom4'].'</a></li>
							<li><a class="sidebar_button" href="index.php?sec=promotions&prom=prom5'.$langInputEnd.'">'.$general['sidebarprom5'].'</a></li>
						</ul>
					';
					break;
				case 'rooms':
					echo '
						<ul id="prom_menu">
							<li><a class="sidebar_button" href="index.php?sec=rooms&room_type=double'.$langInputEnd.'">'.$general['sidebarroom1'].'</a></li>
							<li><a class="sidebar_button" href="index.php?sec=rooms&room_type=sup'.$langInputEnd.'">'.$general['sidebarroom2'].'</a></li>
							<li><a class="sidebar_button" href="index.php?sec=rooms&room_type=triple'.$langInputEnd.'">'.$general['sidebarroom3'].'</a></li>
						</ul>
					';
					break;
				case 'opinions':
					echo '
						<!-- Ahora mismo este botón es puramente estético, hasta que hagamos la funcionalidad de opinar -->
						<div id="dopine"><a href="#" class="sidebar_button">'.$general['sidebaropinion'].'</a></div>
					';
					break;
			}
			
			if($sec != 'promotions') {		
				echo '<div id="cont_principals">
						<!-- Contenido del slider de promociones -->';

				for($i=0; $i<3; $i++) {
					echo '
						<div class="principal"><a href="index.php?sec=promotions&prom=prom'.$this->sidebar->getPromotionIndexes()[$i].''.$langInputEnd.'">
							<div id="'.$this->sidebar->getPromotionIds()[$i].'" class="backImage"></div>
							<div class="textPromotion">
								<h1>'.$general['sidebarpromtext'.$i.'-1'].'</h1>
								<h2>'.$general['sidebarpromtext'.$i.'-2'].'</h2>
								<p>'.$general['sidebarpromtext'.$i.'-3'].'</p>
							</div>
							<div class="progress_bar"></div>
						</a></div>';
				}
				
				echo '	</div>
						<div id="switch">
						<div id="on"></div>
						<ul>
							<li onclick="change_prom(1)"></li>
							<li onclick="change_prom(2)"></li>
							<li onclick="change_prom(3)"></li>
						</ul>
					</div>';
			}
			
			echo '</div>
				</div>
			';
		}
	}
?>