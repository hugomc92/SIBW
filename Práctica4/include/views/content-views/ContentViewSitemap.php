<?php

	class ContentViewSitemap {
		
		public function generateHTML() {
			
			global $langInputBegin;
			global $langInputEnd;
			
			global $general;
			
			echo '
				<!-- Contenido del sitemap -->
				<div class="content">
					<!-- Título de la página -->
					<div id="sitemap_title">
						<h1>SITEMAP</h1>
						<h2>HOTEL PLAZA NUEVA</h2>
					</div>
					<!-- Niveles del sitemap -->
					<ul id="sitemap_levels">
						<li><a href="index.php'.$langInputBegin.'">'.$general['menu1'].'</a></li>
						<li><a href="index.php?sec=promotions'.$langInputEnd.'">'.$general['menu2'].'</a></li>
						<li><a href="index.php?sec=rooms'.$langInputEnd.'">'.$general['menu3'].'</a></li>
						<li><a href="index.php?sec=gallery'.$langInputEnd.'">'.$general['menu4'].'</a></li>
						<li><a href="index.php?sec=contact'.$langInputEnd.'">'.$general['menu5'].'</a></li>
						<li><a href="index.php?sec=opinions'.$langInputEnd.'">'.$general['menu6'].'</a></li>
						<!-- Ahora mismo este enlace es puramente estético, cuando hagamos la funcionalidad de reservar
							Se le añadirá estilos para que siempre esté visible en todas las páginas un submenú con la funcionalidad -->
						<li id="last"><a href="#">'.$general['menu7'].'</a></li>
					</ul>
				</div>
			';
		}
	}
?>