$(document).ready(function() {    
	
	var startDate = window.sessionStorage.getItem('start_date');
	var endDate = window.sessionStorage.getItem('end_date');
	var adultNum = window.sessionStorage.getItem('adult_number');
	var childrenNum = window.sessionStorage.getItem('children_number');	
	var bookingDays = window.sessionStorage.getItem('booking_days');		
	var parking = window.sessionStorage.getItem('parking');	
	var promotion = window.sessionStorage.getItem('promotion');	
    var item1 = window.sessionStorage.getItem('individual_room_number');
	var item2 = window.sessionStorage.getItem('double_room_number');
	var item3 = window.sessionStorage.getItem('suite_room_number');
	var name = window.sessionStorage.getItem('formname');
	var lastName = window.sessionStorage.getItem('formlastname');
	var email = window.sessionStorage.getItem('formemail');
	var phone = window.sessionStorage.getItem('formphone');
	var country = window.sessionStorage.getItem('formcountry');
	var address = window.sessionStorage.getItem('formaddress');
	var city = window.sessionStorage.getItem('formcity');
	var postalCode = window.sessionStorage.getItem('formpostalcode');
	var observations = window.sessionStorage.getItem('formobservations');
	
	if(adultNum != null)
		$('select[name=adult_number]').val(adultNum);
	
	if(childrenNum != null)
		$('select[name=children_number]').val(childrenNum);	
	
	if(parking != null)
		$('select[name=parking]').val(parking);
	
	if(promotion != null)
		$('select[name=promotion]').val(promotion);
	
	if(item1 != null)
		$('select[name=individual_room_number]').val(item1);
	
	if(item2 != null)
		$('select[name=double_room_number]').val(item2);

	if(item3 != null)
		$('select[name=suite_room_number]').val(item3);		
		
	$('input[name=booking_start_date]').val(startDate);
	$('input[name=booking_end_date]').val(endDate);		
	$('input[name=formname]').val(name);
	$('input[name=formlastname]').val(lastName);
	$('input[name=formemail]').val(email);
	$('input[name=formphone]').val(phone);
	$('input[name=formcountry]').val(country);
	$('input[name=formaddress]').val(address);
	$('input[name=formcity]').val(city);
	$('input[name=formpostalcode]').val(postalCode);
	$('textarea[name=formobservations]').val(observations);

	$('input[name=start_date]').change(function() {
       window.sessionStorage.setItem('start_date', $(this).val());	   
    });
	
	$('input[name=end_date]').change(function() {
       window.sessionStorage.setItem('end_date', $(this).val());	   
    });
	
	$('select[name=adult_number]').change(function() {
       window.sessionStorage.setItem('adult_number', $(this).val());	   
    });
	
	$('select[name=children_number]').change(function() {
       window.sessionStorage.setItem('children_number', $(this).val());	   
    });	
	
	$('select[name=breakfast]').change(function() {
       window.sessionStorage.setItem('breakfast', $(this).val());	   
    });
	
	$('select[name=parking]').change(function() {
       window.sessionStorage.setItem('parking', $(this).val());	   
    });
	
	$('select[name=promotion]').change(function() {
       window.sessionStorage.setItem('promotion', $(this).val());	   
    });
	
    $('select[name=individual_room_number]').change(function() {
       window.sessionStorage.setItem('individual_room_number', $(this).val());	   
    });
	
	$('select[name=double_room_number]').change(function() {
       window.sessionStorage.setItem('double_room_number', $(this).val());
    });
	
	$('select[name=suite_room_number]').change(function() {
       window.sessionStorage.setItem('suite_room_number', $(this).val());
    });	
	
	$('input[name=formname]').change(function() {
       window.sessionStorage.setItem('formname', $(this).val());
    });	
	
	$('input[name=formlastname]').change(function() {
       window.sessionStorage.setItem('formlastname', $(this).val());
    });
	
	$('input[name=formemail]').change(function() {
       window.sessionStorage.setItem('formemail', $(this).val());
    });	
	
	$('input[name=formphone]').change(function() {
       window.sessionStorage.setItem('formphone', $(this).val());
    });	
	
	$('input[name=formcountry]').change(function() {
       window.sessionStorage.setItem('formcountry', $(this).val());
    });
	
	$('input[name=formaddress]').change(function() {
       window.sessionStorage.setItem('formaddress', $(this).val());
    });	
	
	$('input[name=formcity]').change(function() {
       window.sessionStorage.setItem('formcity', $(this).val());
    });	
	
	$('input[name=formpostalcode]').change(function() {
       window.sessionStorage.setItem('formpostalcode', $(this).val());
    });	
	
	$('textarea[name=formobservations]').change(function() {
       window.sessionStorage.setItem('formobservations', $(this).val());
    });		
});

function changeSingleRooms() {
	
	var startDate;
	var endDate;
	var childrenNumber;
	var peopleNumber;
    
	startDate = document.getElementById("start_date").value;
	endDate = document.getElementById("end_date").value;
	adultNumber = document.getElementById("adult_number").value;
	childrenNumber = document.getElementById("children_number").value;
	
	var item = document.getElementById("single_room_number");
	item.options.length = 0;	
	var new_option = document.createElement("option");
	new_option.text = 0;
	new_option.value = 0;
	item.options[0] = new_option;
	
	peopleNumber = parseInt(adultNumber) + parseInt(childrenNumber);
	
	if(Date.parse(startDate) < Date.parse(endDate)) {
	
		var xmlhttp = new XMLHttpRequest();
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
				var response = xmlhttp.responseText;
					
				var i = 0;			
				
				while(response[i] != '-') {
					i++;
				}
				
				var aux = response;
				var responseNumber = aux.slice(0, i);
				var response = response.slice(i+1, response.length);				
				
				var item = document.getElementById("single_room_number");			
				
				item.options.length = 0;
				
				var new_option = document.createElement("option");
				new_option.text = 0;
				new_option.value = 0;
				item.options[0] = new_option;				
								
				for(i = 1; i <= parseInt(responseNumber); i++) {	
					if(((parseInt(response)-1) + i) <= parseInt(responseNumber)) {
						var new_option = document.createElement("option");
						new_option.text = i + (parseInt(response) - 1);
						new_option.value = i + (parseInt(response) - 1);
						item.options[i] = new_option;			
					}							
				}				
					
			}
		};
		
		xmlhttp.open("GET", "funct/totalRooms.php?start_date=" + startDate + "&end_date=" + endDate + "&single_room=true" + "&people_number=" + peopleNumber, true);
		xmlhttp.send();
	}
}

function changeDoubleRooms() {
	
	var startDate;
	var endDate;
	var adultNumber;
	var childrenNumber;
	var peopleNumber;	
    
	startDate = document.getElementById("start_date").value;
	endDate = document.getElementById("end_date").value;
	adultNumber = document.getElementById("adult_number").value;
	childrenNumber = document.getElementById("children_number").value;
	
	var item = document.getElementById("double_room_number");
	item.options.length = 0;	
	var new_option = document.createElement("option");
	new_option.text = 0;
	new_option.value = 0;
	item.options[0] = new_option;
	
	peopleNumber = parseInt(adultNumber) + parseInt(childrenNumber);	
	
	if(Date.parse(startDate) < Date.parse(endDate)) {
	
		var xmlhttp = new XMLHttpRequest();
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {  
			
				var response = xmlhttp.responseText;
					
				var i = 0;			
				
				while(response[i] != '-') {
					i++;
				}
				
				var aux = response;
				var responseNumber = aux.slice(0, i);
				var response = response.slice(i+1, response.length);	
				
				
				var item = document.getElementById("double_room_number");				
							
				
				item.options.length = 0;
				
				var new_option = document.createElement("option");
				new_option.text = 0;
				new_option.value = 0;
				item.options[0] = new_option;
				
				for(i = 1; i <= parseInt(responseNumber); i++) {	
					if(((parseInt(response)-1) + i) <= parseInt(responseNumber)) {
						var new_option = document.createElement("option");
						new_option.text = i + (parseInt(response) - 1);
						new_option.value = i + (parseInt(response) - 1);
						item.options[i] = new_option;			
					}							
				}								
			}
		};
		
		xmlhttp.open("GET", "funct/totalRooms.php?start_date=" + startDate + "&end_date=" + endDate + "&double_room=true" + "&people_number=" + peopleNumber, true);
		xmlhttp.send();
	
	}
}

function changeSuiteRooms() {
	
	var startDate;
	var endDate;
	var childrenNumber;
	var peopleNumber;	
   
	startDate = document.getElementById("start_date").value;
	endDate = document.getElementById("end_date").value;
	adultNumber = document.getElementById("adult_number").value;
	childrenNumber = document.getElementById("children_number").value;
	
	peopleNumber = parseInt(adultNumber) + parseInt(childrenNumber);	
	
	var item = document.getElementById("suite_room_number");
	item.options.length = 0;	
	var new_option = document.createElement("option");
	new_option.text = 0;
	new_option.value = 0;
	item.options[0] = new_option;
	
	if(Date.parse(startDate) < Date.parse(endDate)) {
	
		var xmlhttp = new XMLHttpRequest();
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {        
				
				var response = xmlhttp.responseText;
					
				var i = 0;			
				
				while(response[i] != '-') {
					i++;
				}
				
				var aux = response;
				var responseNumber = aux.slice(0, i);
				var response = response.slice(i+1, response.length);	
							
				var item = document.getElementById("suite_room_number");
				
				
												
				item.options.length = 0;
				
				var new_option = document.createElement("option");
				new_option.text = 0;
				new_option.value = 0;
				item.options[0] = new_option;
				
				for(i = 1; i <= parseInt(responseNumber); i++) {	
					if(((parseInt(response)-1) + i) <= parseInt(responseNumber)) {
						var new_option = document.createElement("option");
						new_option.text = i + (parseInt(response) - 1);
						new_option.value = i + (parseInt(response) - 1);
						item.options[i] = new_option;			
					}							
				}						
			}
		};
		
		xmlhttp.open("GET", "funct/totalRooms.php?start_date=" + startDate + "&end_date=" + endDate + "&suite_room=true" + "&people_number=" + peopleNumber, true);
		xmlhttp.send();
	
	}
}


function showSingleRoom() {
	
	var item = document.getElementById("single_room_number");
    var index = item.selectedIndex;
	
	document.getElementById("single_room_selected").innerHTML = item[index].value;
}

function showDoubleRoom() {

	var item = document.getElementById("double_room_number");
    var index = item.selectedIndex;
	
	document.getElementById("double_room_selected").innerHTML = item[index].value;	
}

function showSuiteRoom() {
	
	var item = document.getElementById("suite_room_number");
    var index = item.selectedIndex;
	
	document.getElementById("suite_room_selected").innerHTML = item[index].value;	
}

function showPromotion() {
	var item = document.getElementById("promotion");
    var index = item.selectedIndex;
	
	if(item[index].value == 'prom0')
		document.getElementById("promotion_selected").innerHTML = 'Ninguna';
	else if(item[index].value == 'prom1')
		document.getElementById("promotion_selected").innerHTML = 'Oferta 2 noches';
	else if(item[index].value == 'prom2')
		document.getElementById("promotion_selected").innerHTML = '10% de descuento';
	else if(item[index].value == 'prom3')
		document.getElementById("promotion_selected").innerHTML = 'Reserva anticipada';
	else if(item[index].value == 'prom4')
		document.getElementById("promotion_selected").innerHTML = 'Visita a la Alhambra';
	else if(item[index].value == 'prom5')
		document.getElementById("promotion_selected").innerHTML = 'Visita a Sierra Nevada';
}

function showParking() {
	var item = document.getElementById("parking");
    var index = item.selectedIndex;
	
	document.getElementById("parking_selected").innerHTML = item[index].value;
}

function showBreakfast() {	
	var startDate;
	var endDate; 
	var days;
	startDate = document.getElementById("start_date").value;
	endDate = document.getElementById("end_date").value;	
	days = document.getElementById("booking_days").value;
	
	var items = [];
	var i = 0; 
	
	for(i = 1; i <= days; i++) {
		items[i] = document.getElementById('breakfast' + i);		
	}
	
	var numBreakfast = 0;
	
	for(i = 1; i <= days; i++) {
		numBreakfast = numBreakfast + parseInt(items[i][items[i].selectedIndex].value);
	}	
	
	document.getElementById("breakfast_selected").innerHTML = numBreakfast;
}

function calculatePrice() {
	
	var startDate;
	var endDate;  
	var days;
	startDate = document.getElementById("start_date").value;
	endDate = document.getElementById("end_date").value;
	days = document.getElementById("booking_days").value;
	var items = [];
	var singleRoom = document.getElementById("single_room_number");
    var doubleRoom = document.getElementById("double_room_number");
	var suiteRoom = document.getElementById("suite_room_number");
	var promotion = document.getElementById("promotion"); 
	var parking = document.getElementById("parking");
	
	var indexSingle = singleRoom.selectedIndex;
	var indexDouble = doubleRoom.selectedIndex;
	var indexSuite = suiteRoom.selectedIndex;
	var indexProm = promotion.selectedIndex;
	var indexParking = parking.selectedIndex;
	var numBreakfast = 0;
	
	for(i = 1; i <= days; i++) {
		items[i] = document.getElementById('breakfast' + i);		
	}
	
	var numBreakfast = 0;
	
	for(i = 1; i <= days; i++) {
		numBreakfast = numBreakfast + parseInt(items[i][items[i].selectedIndex].value);
	}		
	
	var xmlhttp = new XMLHttpRequest();
		
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				
			var responsePrice = xmlhttp.responseText;		
			
			document.getElementById("total_price_selected").innerHTML = parseInt(responsePrice);						
		}
	};
		
	xmlhttp.open("GET", "funct/totalPrice.php?start_date=" + startDate + "&end_date=" + endDate + "&single_room_number=" + singleRoom[indexSingle].value + "&double_room_number=" + doubleRoom[indexDouble].value + "&suite_room_number=" + suiteRoom[indexSuite].value + "&promotion=" + promotion[indexProm].value + "&parking=" + parking[indexParking].value + "&num_breakfast=" + numBreakfast, true);
	xmlhttp.send();		
}

window.onload = function() {
	showSingleRoom();
	showDoubleRoom();
	showSuiteRoom();
	showPromotion();
	showParking();
	showBreakfast();
	changeSingleRooms();
	changeDoubleRooms();
	changeSuiteRooms();
	calculatePrice();
}