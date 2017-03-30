<?php

	// Credenciales del Servidor de Correo
	define("EMAIL_USE_SMTP", true);
	define("EMAIL_SMTP_HOST", "smtp.gmail.com");
	define("EMAIL_SMTP_AUTH", true);
	define("EMAIL_SMTP_USERNAME", "hugoblassibw@gmail.com");
	define("EMAIL_SMTP_PASSWORD", "hotelsibw");
	define("EMAIL_SMTP_PORT", 587);
	define("EMAIL_SMTP_ENCRYPTION", "tls");

	// Configuracion del mail de envio
	define("EMAIL_USE_HTML", true);

	// Configuracion del email de contacto
	define("EMAIL_CONTACT_FROM", "no-reply@hotelplazanueva.com");
	define("EMAIL_CONTACT_FROM_NAME", "Hotel Plaza Nueva");
	define("EMAIL_CONTACT_REPLY_TO", "hugoblassibw@gmail.com");
	define("EMAIL_CONTACT_REPLY_TO_NAME", "Hotel Plaza Nueva");
	define("EMAIL_CONTACT_SUBJECT", "Hotel Plaza Nueva Granada - Contacto");
	
?>