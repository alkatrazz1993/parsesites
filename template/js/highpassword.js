$(document).ready(function () {
	
	$("#reg_password").keyup(function() {
	
		var pass = $("#reg_password").val();
		$("#resultpass").text(check(pass));
	
	});
	
	function check(pass) {
		var protect = 0;
		
		if(pass.length < 1) {
			$("#resultpass").removeClass();
			$("#resultpass").addClass('');
			return "";
		}
		
		if(pass.length < 8) {
			$("#resultpass").removeClass();
			$("#resultpass").addClass('red');
			return "Очень слабый - Пожалуйста, введите более сложный пароль.";
		}
		
		//a,s,d,f
		var small = "([a-z]+)";
		if(pass.match(small)) {
			protect++;
		}
		
		//A,B,C,D
		var big = "([A-Z]+)";
		if(pass.match(big)) {
			protect++;
		}
		//1,2,3,4,5 ... 0
		var numb = "([0-9]+)";
		if(pass.match(numb)) {
			protect++;
		}
		//!@#$
		var vv = /\W/;
		if(pass.match(vv)) {
			protect++;
		}
		
		if(protect == 2) {
			$("#resultpass").removeClass();	
			$("#resultpass").addClass('yellow');
			return "Слабый - Пожалуйста, введите более сложный пароль.";
		}
		if(protect == 3) {
			$("#resultpass").removeClass();			
			$("#resultpass").addClass('green');
			return "Средний";
		}
		if(protect == 4) {
			$("#resultpass").removeClass();			
			$("#resultpass").addClass('green_v');
			return "Надёжный";
		}
	}

});	


$(document).ready(function () {
	
	$("#reg_password").keyup(function() {
	
		var pass = $("#reg_password").val();
		$("#bg_res").text(check(pass));
	
	});
	function check(pass) {
		var protect = 0;
		
		if(pass.length < 1) {
			$("#bg_res").removeClass();
			return "";
		}		
		
		if(pass.length < 8) {
			$("#bg_res").removeClass();
			return "Пароль должен иметь длину не менее 8 символов. Чтобы сделать его надёжнее, используйте буквы в верхнем и нижнем регистре, цифры и спецсимволы, как ! ? $ % ^ & ), либо сгенерируйте надёжный пароль сами, путём нажатия на ссылку 'Сгенерировать пароль'.";
		}
		
		//a,s,d,f
		var small = "([a-z]+)";
		if(pass.match(small)) {
			protect++;
		}
		
		//A,B,C,D
		var big = "([A-Z]+)";
		if(pass.match(big)) {
			protect++;
		}
		//1,2,3,4,5 ... 0
		var numb = "([0-9]+)";
		if(pass.match(numb)) {
			protect++;
		}
		//!@#$
		var vv = /\W/;
		if(pass.match(vv)) {
			protect++;
		}
		
		if(protect == 2) {
			$("#bg_res").removeClass();
			return "Пароль должен иметь длину не менее 8 символов. Чтобы сделать его надёжнее, используйте буквы в верхнем и нижнем регистре, цифры и спецсимволы, как ! ? $ % ^ & ), либо сгенерируйте надёжный пароль сами, путём нажатия на ссылку 'Сгенерировать пароль'.";
		}
		if(protect == 3) {
			$("#bg_res").removeClass();
			return "Пароль должен иметь длину не менее 8 символов. Чтобы сделать его надёжнее, используйте буквы в верхнем и нижнем регистре, цифры и спецсимволы, как ! ? $ % ^ & ), либо сгенерируйте надёжный пароль сами, путём нажатия на ссылку 'Сгенерировать пароль'.";
		}
		if(protect == 4) {
			$("#bg_res").removeClass();
			return "Можете спать спокойно:)";
		}
	}
	$(function($){
    //2. Получить элемент, к которому необходимо добавить маску
	$('#date').mask('99.99.9999');
    $("#phone").mask("+7(999) - 999-99-99");
	$('#inn').mask('999999999999');
	$('#snils').mask('999-999-999 99');
	$('#pasport').mask('99-99 999999');
	$('#pasport-division').mask('999-999');
	$('#card_number').mask('9999 9999 9999 9999');
	$('#card_date').mask('99/99');
 	$('#card_code').mask('999');

	//ИНН организации
	$('#inn_organization').mask('9999999999');
	//ОГРН
	$('#ogrn').mask('9999999999999');
	//ОГРНИП
	$('#ogrnip').mask('999999999999999');
	//КПП
	$('#kpp').mask('999999999');
	//БИК
	//9 значное число начинающееся с цифр "04" (код Российской Федерации).
	$('#bik').mask('049999999');
	//Расчетный счет
	//20 цифр.
	$('#account').mask('99999 999 9 9999 9999999');

	//Транспортные средства
	//Водительское удостоверение
	$('#driver').mask('99 ** 999999');
	//СТС (свидетельство о регистрации транспортного средства)
	$('#sts').mask('99 99 999999');
	//Номер полиса ОСАГО
	$('#osago').mask('aaa 9999999999');
	//Интернет и сети
	//Mac-адрес
 	$.mask.definitions['h'] = '[A-Fa-f0-9]';
	$('#mac').mask('hh:hh:hh:hh:hh:hh');

});
setTimeout(function(){$('#successRegistration').fadeOut('fast')},5000);  //5000 = 5 секунд
setTimeout(function(){$('#errorRegistration').fadeOut('fast')},5000);  //5000 = 5 секунд
setTimeout(function(){$('#successUpdate').fadeOut('fast')},5000);  //5000 = 5 секунд
setTimeout(function(){$('#errorUpdate').fadeOut('fast')},5000);  //5000 = 5 секунд
setTimeout(function(){$('#errorSizePicture').fadeOut('fast')},5000);  //5000 = 5 секунд
setTimeout(function(){$('#errorTypeFile').fadeOut('fast')},5000);  //5000 = 5 секунд

});

