<?php

	class ContentViewBookingPayment {
		
		private $content;
		
		public function ContentViewBookingPayment($content) {
			
			$this->content = $content;
		}
		
		public function generateHTML() {   
			
			global $formName;
			global $formEmail;
			global $formPhone;
			global $formCountry;
			global $formCity;
			global $formAddress;
			global $formPostalCode;
			global $formObservations;			
			global $formLastName;
			$i = 0;
				
			echo '
			
			<div class="content">
	
				<div id="container">
					<div class="payment_container">
						<div class="form_container">
							<form id="room_form" class="form_reservation" action="index.php" method="post">
								<input type="hidden" name="sec" value="'.$this->content->getNextSec().'" >
								<input type="hidden" name="promotion" value="'.$this->content->getBookingProm().'" >
								<input type="hidden" name="start_date" value="'.$this->content->getBookingStartDate().'" >
								<input type="hidden" name="end_date" value="'.$this->content->getBookingEndDate().'" >
								<input type="hidden" name="booking_days" value="'.$this->content->getBookingDays().'" >
								<input type="hidden" name="breakfast_number" value="'.$this->content->getBookingBreakfastNumber().'" >
								<input type="hidden" name="parking" value="'.$this->content->getParkingSpaces().'" >
								<input type="hidden" name="people_num" value="'.$this->content->getNumPeople().'" >
								<input type="hidden" name="total_price" value="'.$this->content->getTotalPrice().'" >
								<input type="hidden" name="individual_room_number" value="'.$this->content->getSingleRoomNumber().'" >
								<input type="hidden" name="double_room_number" value="'.$this->content->getDoubleRoomNumber().'" >
								<input type="hidden" name="suite_room_number" value="'.$this->content->getSuiteRoomNumber().'" >								
								<input type="hidden" name="formname" value="'.$formName.'" >
								<input type="hidden" name="formlastname" value="'.$formLastName.'" >
								<input type="hidden" name="formemail" value="'.$formEmail.'" >
								<input type="hidden" name="formphone" value="'.$formPhone.'" >
								<input type="hidden" name="formcountry" value="'.$formCountry.'" >
								<input type="hidden" name="formcity" value="'.$formCity.'" >
								<input type="hidden" name="formaddress" value="'.$formAddress.'" >
								<input type="hidden" name="formpostalcode" value="'.$formPostalCode.'" >
								<input type="hidden" name="formobservations" value="'.$formObservations.'" > ';
								
								for($i=1; $i <= $this->content->getBookingDays(); $i++) {
									echo '
									<input type="hidden"  name="breakfast'.$i.'" value="'.$this->content->getNumBreakfastDay($i).'" > ';								
								}
								
								echo '
								<fieldset>
									<legend>Pago</legend>								
									<input type="text" name="card_holder" class="name" placeholder="Titular de la tarjeta"/>
									<select class="type_card">
										<option value="" selected>--</option>
										<option value="type_card1">VISA</option>
										<option value="type_card2">MASTERCARD</option>
										<option value="type_card2">AMERICAN EXPRESS</option>
									</select>
									<input type="text" name="card_number" class="name" placeholder="Número de tarjeta"/>
									<h4>Caducidad</h4>
									<select name="expiration_month" class="expiration_month">
										<option value="" selected>--</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									</select>
									<select name="expiration_year" class="expiration_year">
										<option value="" selected>--</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
									</select>
									<input type="text" name="cvc_number" class="cvc" placeholder="CVC"/>
								</fieldset>
								<input type="button" class="go_back" onclick="history.back(-1)" value="ANTERIOR">
								<input type="submit" class="processing_booking" value="TRAMITAR RESERVA">
							</form>
						</div>			
					</div>
				</div>
			</div>		
			
			';
		
		}	
	}
	
?>