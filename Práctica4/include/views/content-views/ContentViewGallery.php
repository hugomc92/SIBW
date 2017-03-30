<?php

	class ContentViewGallery {
		
		private $content;
		
		public function ContentViewGallery($content) {
			
			$this->content = $content;
		}
		
		public function generateHTML() {
			
            global $gallery;
            global $altImages;
            
			echo '
				<!-- Contenido de la galería de fotos -->
				<div class="content">
					<!-- Nombre de la página y breve introducción -->
					<h1> '.$gallery['gallerytitle'].' </h1>
					<p> '.$gallery['gallerytext'].'</p>
					<!-- Galería de fotos, miniaturas que se abrerán en los popups correspondientes para verlas bien -->
					<div id="gallery">';
			for($i=0; $i<$this->content->getNumImages(); $i++) {
				echo '	<a href="#popup'.$i.'" class="pic" id="pic'.$i.'"></a>';
			}		
						
			for($i=0; $i<$this->content->getNumImages(); $i++) {
				echo '	<!-- Un popup por cada imagen de la galería que se abrirá al pulsar en la miniatura -->
						<div id="popup'.$i.'" class="overlay">
							<div class="popup">
								<!-- Botón para cerrar el popup -->
								<a class="close" href="#">&times;</a>
								<img src="'.$this->content->getImages($i).'" alt="'.$altImages[$i].'" width="100%"/>';
				if($i != 0) {
					echo '
								<!-- Botón para retroceder a la foto anterior -->
								<a href="#popup'.($i-1).'" class="back">
									<img src="'.$this->content->getGalleryArrows(0).'" alt="'.$gallery['altarrow2'].'" width="40px" height="50%"/>
								</a>';
				}
				if($i != $this->content->getNumImages()-1) {
					echo '
								<!-- Botón para avanzar a la siguiente foto -->
								<a href="#popup'.($i+1).'" class="next">
									<img src="'.$this->content->getGalleryArrows(1).'" alt="'.$gallery['altarrow1'].'" width="40px" height="50%"/>
								</a>';
				}
				echo '		</div>
						</div>';
			}
						
			echo '		<!-- Miniaturas de todas las imágenes, que se mostrará como una tira de imágenes al abrir el popup de cualquiera
						para poder cambiar con facilidad entre una y otra, sin tener que seguir un orden -->
						<div id="all_pics">';
			for($i=0; $i<$this->content->getNumImages(); $i++) {
				echo '		<a href="#popup'.$i.'" class="pic" id="pic'.$i.'"></a>';
			}
			
			echo '		</div>
					</div>
				</div>
			';
		}
	}
?>
