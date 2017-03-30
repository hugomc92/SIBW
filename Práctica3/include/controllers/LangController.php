<?php

	// Variable global para el idioma
	$lang = htmlspecialchars($_GET["lang"]);
	// Variable global para el idioma del navegador
	$browserLang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
	
	$langInputBegin;
	$langInputEnd;
		
	$langCode;
	global $sec;
	
	$general;
	
	switch($sec) {
		case 'promotions':
			$promotions;
			break;
		case 'rooms':
			$rooms;
			break;
		case 'gallery':
			$gallery;
            $altImages;
			break;
		case 'contact':
			$contact;
			break;
		case 'opinions':
			$opinions;
			break;		
		default:
			$main;
			break;
	}
	
	function getLangCode() {
		
		global $lang;
		global $langCode;
		global $langInputBegin;
		global $langInputEnd;
        global $browserLang;
		
		// Decisión de la carga de variables globales del texto
		if(empty($lang)) {
			switch($browserLang) {
				case 'es':
					$langCode = 'es';
					break;
				case 'en':
					$langCode = 'en';
					break;
				case 'fr':
					$langCode = 'fr';
					break;
				case 'it':
					$langCode = 'it';
					break;
				case 'de':
					$langCode = 'de';
					break;
				default:
					$langCode = 'en';
					break;
			}
			
			if($browserLang != 'es') {
				$langInputBegin = '?lang='.$browserLang;
				$langInputEnd= '&lang='.$browserLang;
			}
		}
		else {
			switch($lang) {
				case 'en':
					$langCode = 'en';
					break;
				case 'fr':
					$langCode = 'fr';
					break;
				case 'it':
					$langCode = 'it';
					break;
				case 'de':
					$langCode = 'de';
					break;
				default:
					$langCode = 'es';
					break;
			}
			
			$langInputBegin = '?lang='.$lang;
			$langInputEnd= '&lang='.$lang;
		}
		
		echo '<html lang="'.$langCode.'">			<!-- Hacer que el navegador reconozca que la página está en '.$langCode.' -->';
	}	
	
	function generateGeneral() {
		global $langCode;
		global $general;		
		
		$data = file_get_contents("include/text/".$langCode."/general.json");	
		$general = json_decode($data, true);
	}	
	
	function generateSection() {
			
		global $langCode;
		global $sec;
		
		switch($sec) {
			case 'promotions':
				global $promotions;
				
				$data = file_get_contents("include/text/".$langCode."/promotions.json");	
				$promotions = json_decode($data, true);
				break;
			case 'rooms':
				global $rooms;
				
				$data = file_get_contents("include/text/".$langCode."/rooms.json");	
				$rooms = json_decode($data, true);
				break;
			case 'gallery':
				global $gallery;
                global $altImages;
				
				$data = file_get_contents("include/text/".$langCode."/gallery.json");	
				$gallery = json_decode($data, true);
                $altImages = array($gallery['alt1'],
								   $gallery['alt2'],
								   $gallery['alt3'],
								   $gallery['alt4'],
								   $gallery['alt5'],
								   $gallery['alt6'],
								   $gallery['alt7'],
								   $gallery['alt8'],
								   $gallery['alt9'],
								   $gallery['alt10'],
								   $gallery['alt11'],
								   $gallery['alt12'],
								   $gallery['alt13'],
								   $gallery['alt14'],
								   $gallery['alt15']);
				break;
			case 'contact':
				global $contact;
				
				$data = file_get_contents("include/text/".$langCode."/contact.json");	
				$contact = json_decode($data, true);
				break;
			case 'opinions':
				global $opinions;
				
				$data = file_get_contents("include/text/".$langCode."/opinions.json");	
				$opinions = json_decode($data, true);
				break;		
			default:
				global $main;
				
				$data = file_get_contents("include/text/".$langCode."/main.json");	
				$main = json_decode($data, true);
				break;
		}
	}
	
?>
