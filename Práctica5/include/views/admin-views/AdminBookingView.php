<?php

	class AdminBookingView {
		
		private $adminBooking;
		
		public function AdminBookingView($adminBooking) {
			
			$this->adminBooking = $adminBooking;
		}
		
		public function generateHTML() {
			
			echo '
				<!-- Contenido de las reservas de administrador -->
				<div class="content">
					<div class="admin_content">
						<h3 class="title_section">Reservas en proceso</h3>
						<form id="booking_admin" action="index.php?admin=booking" method="post">
							<input class="hidden_input" type="number" name="total_bookings" value="'.$this->adminBooking->getBookingsCount().'"/>
							<div class="table_active_container">
								<table>
									<thead>
										<tr>
											<th class="input_chk"></th>
											<th id="id_room_reservation" class="id_row">#</th>
											<th id="room_information">Información y observaciones</th>
											<th id="room_breakfast">Desayunos</th>
											<th id="room_promotion">Promoción</th>
											<th id="room_state">Estado</th>
											<th id="room_entry">Fecha entrada</th>
											<th id="room_exit">Fecha salida</th>
											<th id="room_parking">Plazas Parking</th>
											<th id="room_selection">Habitaciones</th>
											<th id="room_total">Total</th>
										</tr>
									</thead>
									<tbody>';
							
			for($i=0; $i<$this->adminBooking->getBookingsCount(); $i++) {
				echo '					<tr class="row_type'.($i%2).'">
											<td><input type="checkbox" id="chk_room_row'.$i.'" name="chk_room_row'.$i.'" onclick="hightlight(\'chk_room_row'.$i.'\', \'room_row'.$i.'\')"></td>
											<td class="id_row room_row'.$i.'">
												<input name="booking_code'.$i.'" class="form_input not_editable" value="'.$this->adminBooking->getBookingCode($i).'" readonly/>
											</td>
											<td class="room_row'.$i.'">
												<input name="booking_observations'.$i.'" class="form_input" value="'.$this->adminBooking->getBookingObservation($i).'"/>
											</td>
											<td class="room_row'.$i.'">
												<!-- Desayunos -->';
				$breakfastCount = $this->adminBooking->getBookingBreakfastCount($i);
				
				echo '							<input class="hidden_input" type="number" name="total_breakfast'.$i.'" value="'.$breakfastCount.'"/>
												<ul class="selection">';
				
				for($j=0; $j<$breakfastCount; $j++) {
					echo '							<li>
														<span>'.$this->adminBooking->getBookingDate($j, $i).'<span>
														<select name="booking_breakfast'.$i.'-'.$j.'">';
					
					$breakfast = $this->adminBooking->getBookingBreakfast($j, $i);
					
					for($k=0; $k<=$this->adminBooking->getBookingNumPeople($i); $k++) {
						if($k == $breakfast) {
							echo '							<option value="'.$k.'" selected>'.$k.'</option>';
						}
						else {
							echo '							<option value="'.$k.'">'.$k.'</option>';
						}
					}
				
					echo '								</select>
													</li>';
				}
												
				echo '							</ul>							
											</td>
											<td class="room_row'.$i.'">
												<!-- Promociones -->
												<select name="booking_promotion'.$i.'" class="selection">
													<option value="NULL">ninguna</option>';
			
				$promotion = $this->adminBooking->getBookingPromotion($i);
			
				for($j=0; $j<$this->adminBooking->getPromotionsCount(); $j++) {
					if($this->adminBooking->getPromotionId($j) == $promotion) {
						echo '						<option value="'.$this->adminBooking->getPromotionId($j).'" selected>'.$this->adminBooking->getPromotionName($j).'</option>';
					}
					else {
						echo '						<option value="'.$this->adminBooking->getPromotionId($j).'">'.$this->adminBooking->getPromotionName($j).'</option>';
					}
				}
			
				echo '							</select>
											</td>
											<td class="room_row'.$i.'">
												<!-- Estado -->
												<select name="booking_state'.$i.'" class="selection">
													<option value=0>Pendiente</option>
													<option value=1>Pagado</option>
												</select>
											</td>
											<td class="room_row'.$i.'">'.$this->adminBooking->getBookingEntryDate($i).'</td>
											<td class="room_row'.$i.'">'.$this->adminBooking->getBookingExitDate($i).'</td>
											<td class="room_row'.$i.'">
												<input name="booking_parking'.$i.'" id="parking_spaces" class="form_input" value="'.$this->adminBooking->getBookingParkingSpaces($i).'"/>
											</td>
											<td class="room_row'.$i.'">
												<!-- Habitaciones -->';
												
				$roomCount = $this->adminBooking->getBookingRoomsCount($i);
				
				echo '							<input class="hidden_input" type="number" name="total_room'.$i.'" value="'.$roomCount.'"/>
												<ul class="selection">';
				
				for($j=0; $j<$roomCount; $j++) {
					$room_type = $this->adminBooking->getBookingRoomType($j, $i);
					echo '							<li>
														<span>'.$room_type.'<span>
														<select name="booking_room'.$i.'-'.$j.'">';
														
					$room_num = $this->adminBooking->getBookingRoomNum($j, $i);
					
					if($room_num == "") {
						echo '									<option value="NULL" selected>--</option>';
					}
					else {
						echo '									<option value="'.$room_num.'" selected>'.$room_num.'</option>';
					}
					
					$availableRooms = $this->adminBooking->getAvailableRooms($i, $room_type);
					
					for($k=0; $k<count($availableRooms); $k++) {		
						echo '								<option value="'.$availableRooms[$k].'">'.$availableRooms[$k].'</option>';
					}
				
					echo '								</select>
													</li>';
				}
												
				echo '							</ul>
											</td>
											<td class="room_row'.$i.'">'.$this->adminBooking->getBookingTotalPrice($i).' €</td>
										</tr>';
			}
			
			echo '					</tbody>
								</table>
							</div>
							<div class="table_buttons">
								<input class="form_button" type="submit" name="booking_form_delete" value="Eliminar" />
								<input class="form_button" type="submit" name="booking_form_save" value="Guardar" />
								<a href="index.php" class="form_button">Nueva</a>
							</div>
						</form>
					</div>
				</div>
			';
		}
	}
	
?>