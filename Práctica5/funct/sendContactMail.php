<?php

	function sendContactMail($name, $phone, $email, $message) {
		
		$mail = new PHPMailer();

		// Definiciones en config/configEmail.php
		
		// Permitir el uso de SMTP o mail() normal
		if(EMAIL_USE_SMTP) {						// Configuración de SMTP Mailer
			// Establecer que se va a usar SMTP
			$mail->IsSMTP();
			
			$mail->CharSet = "UTF-8";

			// Habilitar la depuración SMPT - 0 es deshabilitada
			$mail->SMTPDebug = 0;

			// Habilitar encriptación, SSL/TLS
			if(defined('EMAIL_SMTP_ENCRYPTION')) {
				$mail->SMTPSecure = EMAIL_SMTP_ENCRYPTION;
			}

			// Especificar el servidor y puerto de correo
			$mail->Host = EMAIL_SMTP_HOST;
			$mail->Port = EMAIL_SMTP_PORT;
			
			// Autenticación SMTP
			$mail->SMTPAuth = EMAIL_SMTP_AUTH;
			$mail->Username = EMAIL_SMTP_USERNAME;
			$mail->Password = EMAIL_SMTP_PASSWORD;
			
			// Localización de los mensajes de errores
			global $langCode;
			$mail->setLanguage($langCode);
		}
		else {
			$mail->IsMail();
		}
		
		// Envío de correo al hotel
		// Remitente que envia el mensaje
		$mail->setFrom(EMAIL_CONTACT_FROM, EMAIL_CONTACT_FROM_NAME);
		
		// Email alternativo destinatario
		$mail->addReplyTo(EMAIL_CONTACT_REPLY_TO, EMAIL_CONTACT_REPLY_TO_NAME);
		
		// Email de destino, a nosotros mismos
		$mail->addAddress(EMAIL_CONTACT_REPLY_TO, EMAIL_CONTACT_REPLY_TO_NAME);
		
		// Asunto del mail
		$mail->Subject = EMAIL_CONTACT_SUBJECT;

		// Permitir que el body del mensaje interprete HTML
		$mail->isHTML(EMAIL_USE_HTML);

		//Body normal que admite HTML
		$string = "	<p>".$name."</p>
					<p>".$phone."</p>
					<p>".$email."</p>
					<p>".$message."</p>";
					
		$mail->Body = $string;
		
		// Mandar el email, comprobar si hay errores y notificar
		if(!$mail->send()) {
			echo "<script>alert('Error: ".$mail->ErrorInfo."');</script>";
			
			return false;
		}
		
		// Envío al cliente con mensaje de agradecimiento y reenvío de lo que ha mandado
		$mail->ClearAddresses();
		$mail->addAddress($email);
		
		$string = "	<p>Gracias por contactar con nosotros. Nos pondremos en contacto a la mayor brevedad posible.</p>
					<p>Esto es lo que usted nos ha mandado:</p>
					<p>".$name."</p>
					<p>".$phone."</p>
					<p>".$email."</p>
					<p>".$message."</p>";
					
		$mail->Body = $string;
		
		if(!$mail->send()) {
			echo "<script>alert('Error: ".$mail->ErrorInfo."');</script>";
			
			return false;
		}
		
		return true;
	}
?>