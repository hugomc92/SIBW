<?php

	class ContentViewBookingSelection {
		
		private $content;
		
		public function ContentViewBookingSelection($content) {
			
			$this->content = $content;
		}
		
		public function generateHTML() {              
		
			global $adultNumber;
			global $childrenNumber;	
			$i = 0;
			$j = 0;
						
			echo '
	<div class="content">
	
		<div id="container">
		
			<div id="content_reservation">
				<h1>Reservas</h1>			
				<form id="booking_selection_form" action="index.php" method="post">
					<input type="hidden" name="booking_days" value="'.$this->content->getDays().'" >					
					<div id="data_booking">
						<div class="single_data">
							<label>Fecha entrada: </label>
							<label id="start_date">'.$this->content->getBookingStartDate().'</label>	
							<input type="hidden" name="start_date" value="'.$this->content->getBookingStartDate().'" >
						</div>
						
						<div class="single_data">
							<label>Fecha salida: </label>
							<label id="end_date">'.$this->content->getBookingEndDate().'</label>		
							<input type="hidden" name="end_date" value="'.$this->content->getBookingEndDate().'" >
						</div>
						
						<div class="single_data">
							<label>Numero de adultos: </label>
							<label id="adultNum">'.$adultNumber.'</label>
							<input type="hidden" name="adult_number" value="'.$adultNumber.'" >
						</div>
						
						<div class="single_data">
							<label>Numero de niños: </label>
							<label id="childrenNum">'.$childrenNumber.'</label>			
							<input type="hidden" name="children_number" value="'.$childrenNumber.'" >
						</div>
						
						<div class="single_data">
							<label>Desayuno: </label>
							';
							for($j = 1; $j <= $this->content->getDays(); $j++) {
								echo '
								<label>Dia '.$j.'</label>
								<select name="breakfast'.$j.'">										
									<option value="0" selected>0</option> 
								';							
								for($i = 1; $i <= ($adultNumber + $childrenNumber); $i++) {
									echo '			
									<option value="'.$i.'">'.$i.'</option>
									';
								}
								echo '
								</select> ';
							}
							 echo '							
						</div>
						
						<div class="single_data">
							<label>Parking: </label>
							<select name="parking">	
								<option value="0" selected>0</option> ';							
								for($i = 1; $i <= ($adultNumber); $i++) {
									echo '			
									<option value="'.$i.'">'.$i.'</option>
									';
								}
							 echo '						
							</select> 
						</div>
						
						<div class="single_data">
							<label>Promocion: </label>
							<select name="promotion">	
								<option value="prom0" selected>Ninguna</option>							
								<option value="prom1">2 noches</option>
								<option value="prom2">10% descuento</option>	
								<option value="prom3">Anticipada</option>	
								<option value="prom4">Alhambra</option>	
								<option value="prom5">Sierra Nevada</option>	
							</select> 
						</div>
						
					</div>
					
					<div id="active_room_reservations">					
						<div class="table_active_container">
							<table>
								<thead>
									<tr>
										<th class="input_chk"></th>										
										<th id="room_type">Tipo de Habitacion</th>
										<th id="room_price">Precio</th>										
										<th id="room_number">Cantidad</th>								
									</tr>
								</thead>
								<tbody>
									<tr>			
										<td class="room_row1"><img src="'.$this->content->getImages()[1].'" width="250px"/></td>
										<td class="room_row1">Habitacion Individual</td>
										<td class="room_row1">'.$this->content->getRoomPrices()[0].' €</td>																				
										<td class="room_row1">									
											<ul class="selection">
												<li>
													<select name="individual_room_number">
														<option value="0" selected>0</option>';
													for($i = 1; $i <= $this->content->getSingleRoomAvailables(); $i++) {
														echo '			
														<option value="'.$i.'">'.$i.'</option>
														';
													}
													echo '
													</select>
												</li>
											</ul>								
										</td>								
									</tr>
									<tr>		
										<td class="room_row2"><img src="'.$this->content->getImages()[0].'" width="250px"/></td>
										<td class="room_row2">Habitacion Doble</td>
										<td class="room_row2">'.$this->content->getRoomPrices()[1].' €</td>																		
										<td class="room_row2">
											<ul class="selection">
												<li>
													<select name="double_room_number">
														<option value="0" selected>0</option>';
													for($i = 1; $i <= $this->content->getDoubleRoomAvailables(); $i++) {
														echo '			
														<option value="'.$i.'">'.$i.'</option>
														';
													}
													echo '
													</select>
												</li>
											</ul>
										</td>								
									</tr>
									<tr>
										<td class="room_row3"><img src="'.$this->content->getImages()[2].'" width="250px"/></td>
										<td class="room_row3">Suite</td>
										<td class="room_row3">'.$this->content->getRoomPrices()[2].' €</td>																		
										<td class="room_row3">
											<ul class="selection">
												<li>
													<select name="suite_room_number">
														<option value="0" selected>0</option>';
													for($i = 1; $i <= $this->content->getSuiteRoomAvailables(); $i++) {
														echo '			
														<option value="'.$i.'">'.$i.'</option>
														';
													}
													echo '
													</select>
												</li>
											</ul>
										</td>								
									</tr>
								</tbody>
							</table>
						</div>				
					</div>				
			</div>
			
				<div class="form_container" id="form_reservation">
					
						<fieldset class="personal_info">
							<legend>Información personal</legend>
							<input type="text" name="formname" class="name" placeholder="Nombre (Obligatorio)"/>
							<input type="text" name="formlastname" class="name" placeholder="Apellidos (Obligatorio)"/>
							<input type="email" name="formemail" class="email" placeholder="E-mail (Obligatorio)"/>
							<input type="tel" name="formphone" class="phone" placeholder="Teléfono (Obligatorio)"/>
							<input type="text" name="formcountry" class="dni" placeholder="Pais (Obligatorio)"/>
							<input type="text" name="formaddress" class="dni" placeholder="Direccion (Obligatorio)"/>
							<input type="text" name="formcity" class="dni" placeholder="Ciudad (Obligatorio)"/>
							<input type="text" name="formpostalcode" class="dni" placeholder="Codigo Postal (Obligatorio)"/>
						</fieldset>
						<textarea name="formobservations" class="observations" placeholder="Observaciones (Opcional)"></textarea>					
						<input type="submit" class="booking_send" value="SIGUIENTE">
					<h1>
				</div>
			
			</form>
		</div>	
	</div>
			';
		}
	}
?>