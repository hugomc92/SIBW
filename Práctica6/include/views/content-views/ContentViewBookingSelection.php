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
					<input type="hidden" id="booking_days" name="booking_days" value="'.$this->content->getDays().'" >					
					<div id="data_booking">
						<div class="single_data">
							<label>Fecha entrada: </label>							
							<input type="date" id="start_date" name="start_date" value="'.$this->content->getBookingStartDate().'" onchange="changeSingleRooms(); changeDoubleRooms(); changeSuiteRooms()">							
						</div>
						
						<div class="single_data">
							<label>Fecha salida: </label>
							<input type="date" id="end_date" name="end_date" value="'.$this->content->getBookingEndDate().'" onchange="changeSingleRooms(); changeDoubleRooms(); changeSuiteRooms()">								
						</div>
						
						<div class="single_data">
							<label>Numero de adultos: </label>
							<select id="adult_number" name="adult_number" onchange="changeSingleRooms(); changeDoubleRooms(); changeSuiteRooms()">	';								
								
									if($adultNumber == 1) {
										echo '									
										<option value="1" selected>1</option>';
									}
									else  {
										echo'
										<option value="1">1</option>';
									}
									
									if($adultNumber == 2) {
										echo '									
										<option value="2" selected>2</option>';
									}
									else  {
										echo'
										<option value="2">2</option>';
									}
									
									if($adultNumber == 3) {
										echo '									
										<option value="3" selected>3</option>';
									}
									else  {
										echo'
										<option value="3">3</option>';
									}
									
									if($adultNumber == 4) {
										echo '									
										<option value="4" selected>4</option>';
									}
									else  {
										echo'
										<option value="4">4</option>';
									}
									
									if($adultNumber == 5) {
										echo '									
										<option value="5" selected>5</option>';
									}
									else  {
										echo'
										<option value="5">5</option>';
									}	
									if($adultNumber == 6) {
										echo '									
										<option value="6" selected>6</option>';
									}
									else  {
										echo'
										<option value="6">6</option>';
									}	
							 echo '						
							</select>						
						</div>
						
						<div class="single_data">
							<label>Numero de niños: </label>
							<select id="children_number" name="children_number" onchange="changeSingleRooms(); changeDoubleRooms(); changeSuiteRooms()">';							
									
									if($childrenNumber == 0) {
										echo'
										<option value="0" selected>0</option> ';
									}									
									else {
										echo'
										<option value="0"d>0</option> ';									}
								
									if($childrenNumber == 1) {
										echo '									
										<option value="1" selected>1</option>';
									}
									else  {
										echo'
										<option value="1">1</option>';
									}
									
									if($childrenNumber == 2) {
										echo '									
										<option value="2" selected>2</option>';
									}
									else  {
										echo'
										<option value="2">2</option>';
									}
									
									if($childrenNumber == 3) {
										echo '									
										<option value="3" selected>3</option>';
									}
									else  {
										echo'
										<option value="3">3</option>';
									}
									
									if($childrenNumber == 4) {
										echo '									
										<option value="4" selected>4</option>';
									}
									else  {
										echo'
										<option value="4">4</option>';
									}
									
									if($childrenNumber == 5) {
										echo '									
										<option value="5" selected>5</option>';
									}
									else  {
										echo'
										<option value="5">5</option>';
									}	

									if($childrenNumber == 6) {
										echo '									
										<option value="6" selected>6</option>';
									}
									else  {
										echo'
										<option value="6">6</option>';
									}	
							 echo '						
							</select>						
							
						</div>
						
						<div class="single_data">
							<label>Desayuno: </label>
							';
							for($j = 1; $j <= $this->content->getDays(); $j++) {
								echo '
								<label>Dia '.$j.'</label>
								<select id="breakfast'.$j.'" name="breakfast'.$j.'" onchange="showBreakfast(); calculatePrice()">										
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
							<select id="parking" name="parking" onchange="showParking(); calculatePrice()">	
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
							<select id="promotion" name="promotion" onchange="showPromotion(); calculatePrice()">	
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
										<th class="input_chk"><img src="images/icons/right_arrow.png" width="20px"></th>										
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
													<select id="single_room_number" name="individual_room_number"  onchange="showSingleRoom(); calculatePrice()">
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
													<select id="double_room_number" name="double_room_number" onchange="showDoubleRoom(); calculatePrice()">
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
													<select id="suite_room_number" name="suite_room_number" onchange="showSuiteRoom(); calculatePrice()">
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
				</div>
				<div class="basket_container">
						<div class="basket">
							<h2>SU RESERVA</h2>													
							<div class="content_reservation">
								<div class="cont">
									<h4 class="cont_name">Habitaciones Individuales: <span id="single_room_selected"></span></h4>									
								</div>
								<div class="cont">
									<h4 class="cont_name">Habitaciones Dobles: <span id="double_room_selected"></span></h4>									
								</div>
								<div class="cont">
									<h4 class="cont_name">Suites: <span id="suite_room_selected"></span></h4>									
								</div>
								<div class="cont">
									<h4 class="cont_name">Promoción: <span id="promotion_selected"></span></h4>									
								</div>
								<div class="cont">
									<h4 class="cont_name">Desayunos: <span id="breakfast_selected"></span></h4>									
								</div>
								<div class="cont">
									<h4 class="cont_name">Plazas de Parking: <span id="parking_selected"></span></h4>									
								</div>
							</div>
							<div class="price">
								<h3>Precio Total: <span id="total_price_selected">0</span> €</h3>
							</div>
						</div>
				</div>
				<input type="submit" class="booking_send" value="SIGUIENTE">	
			
			</form>			
				<div>
			</div>		
		</div>	
	</div>
			';
		}
	}
?>