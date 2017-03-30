/* Diseño físico de la Base de datos */

CREATE DATABASE HOTEL_SIBW;

USE HOTEL_SIBW;

CREATE TABLE HOTEL_INFO (

	phone	VARCHAR(12) NOT NULL,
	fax		VARCHAR(12) NOT NULL,
	email	VARCHAR(100) NOT NULL
);

CREATE TABLE HOTEL_INFO_SOCIAL (
	
	link	VARCHAR(100) NOT NULL UNIQUE,
	icon	VARCHAR(100) NOT NULL
);

CREATE TABLE ADMIN (
	
	user		VARCHAR(50) PRIMARY KEY,
	password	VARCHAR(50) NOT NULL,
	name		VARCHAR(50),
	surname		VARCHAR(50)
);

CREATE TABLE MENU ( 
	
	menu_text	VARCHAR(20) NOT NULL,
	menu_link	VARCHAR(50) NOT NULL
	
);

CREATE TABLE OPINION (
	
	opinion_date					DATE NOT NULL,
	opinion_author					VARCHAR(100) NOT NULL,
	opinion_country					VARCHAR(50) NOT NULL,
	opinion_cleaning_score			INTEGER NOT NULL,
	opinion_attention_score			INTEGER NOT NULL,
	opinion_confor_score			INTEGER NOT NULL,
	opinion_locate_score			INTEGER NOT NULL,
	opinion_facilities_score		INTEGER NOT NULL,
	opinion_breakfast_score			INTEGER NOT NULL,
	opinion_final_score				FLOAT NOT NULL,
	opinion_client_message1			TEXT NOT NULL,
	opinion_client_message2			TEXT NOT NULL,
	opinion_client_recommendation	INTEGER(1) NOT NULL
);

CREATE TABLE GALLERY (
	
	image_url	VARCHAR(100)
	
);

CREATE TABLE MAIN (
	
	image_main	VARCHAR(100) NOT NULL
);

CREATE TABLE ROOM ( 
	
	room_num 				INTEGER PRIMARY KEY,
	room_type 				VARCHAR(20) NOT NULL,
	room_description_es 	TEXT NOT NULL,
	room_description_en 	TEXT NOT NULL,
	room_description_fr 	TEXT NOT NULL,
	room_description_it 	TEXT NOT NULL,
	room_description_de		TEXT NOT NULL
		
);

CREATE TABLE ROOM_IMAGE (
	
	room_type	VARCHAR(20) PRIMARY KEY REFERENCES ROOM(room_type),
	room_img	VARCHAR(200) NOT NULL,
			
);

CREATE TABLE PROMOTION (
	
	id_prom 				VARCHAR(20) PRIMARY KEY REFERENCES PROMOTION(id_prom),
	prom_image 				VARCHAR(200) NOT NULL,
	prom_description_es 	TEXT NOT NULL,
	prom_description_en 	TEXT NOT NULL,
	prom_description_fr 	TEXT NOT NULL,
	prom_description_it 	TEXT NOT NULL,
	prom_description_de		TEXT NOT NULL
	
);

CREATE TABLE PROMOTION_PRICE (
	
	id_prom 	VARCHAR(20) PRIMARY KEY REFERENCES PROMOTION(id_prom),
	prom_price	FLOAT NOT NULL,
		
);

CREATE TABLE PRICE (
	
	room_type 					VARCHAR(20) REFERENCES ROOM(room_type),
	price 						FLOAT NOT NULL,
	season_name 				VARCHAR(20) NOT NULL,
	weekend_price_addition		FLOAT NOT NULL,
	breakfast_price_addition	FLOAT NOT NULL,
	parking_price_addition 		FLOAT NOT NULL
			
);

CREATE TABLE BOOKING (
	
	booking_code 	INT PRIMARY KEY AUTOINCREMENT,
	num_people 		INTEGER NOT NULL,
	name 			VARCHAR(20) NOT NULL,
	lastname 		VARCHAR(50) NOT NULL,
	address 		VARCHAR(100) NOT NULL,
	city 			VARCHAR(20) NOT NULL,
	country 		VARCHAR(20) NOT NULL,
	email 			VARCHAR(50) NOT NULL,
	phone 			VARCHAR(15) NOT NULL,
	observations 	TEXT,
	card_holder 	VARCHAR(50) NOT NULL,	
	
);

CREATE TABLE BOOKING_INFO (
	
	booking_code	INT REFERENCES BOOKING(booking_code) NOT NULL,
	room_type 		VARCHAR(20) REFERENCES ROOM(room_type) NOT NULL
		
);

CREATE TABLE BOOKING_DATE (
	
	booking_code	VARCHAR(20) PRIMARY KEY REFERENCES BOOKING(booking_code),
	booking_date	DATE NOT NULL
);

CREATE TABLE BREASKFAST (
	
	booking_code 	VARCHAR(20) REFERENCES BOOKING(booking_code),
	num_breakfast 	INTEGER NOT NULL,
	breakfast_date	DATE NOT NULL	
	
);
