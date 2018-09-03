
	$(document).ready(function () {
		$("input[id='reg_password']").keyup(function count(){
		number = $("input[id='reg_password']").val().length;
		$("#count").html(+number);
		});
	});

	$(document).ready(function () {
		$("input[id='reg_password_confirmation']").keyup(function count(){
		number = $("input[id='reg_password_confirmation']").val().length;
		$("#count_confirmation").html(+number);	
		});
	});

	$(document).ready(function () {
		$("input[id='inputUsername']").keyup(function count(){
		number = $("input[id='inputUsername']").val().length;
		$("#count_username").html(+number);	
		});
	});

	$(document).ready(function () {
		$("input[id='inputLogin']").keyup(function count(){
		number = $("input[id='inputLogin']").val().length;
		$("#count_login").html(+number);	
		});
	});
	$(document).ready(function () {
		$("input[id='inputLoginRecovery']").keyup(function count(){
		number = $("input[id='inputLoginRecovery']").val().length;
		$("#count_login").html(+number);	
		});
	});

//Скрипт генерации паролей
	function str_rand() {
		document.getElementById('reg_password').setAttribute('type', 'text');
		document.getElementById('reg_password_confirmation').setAttribute('type', 'text');
		var result       = '';
		var words          = '9&Oz#Xb!cHu*Dj1@C3B+5a$Ak?n+Jr(M!pR7@iZ^fS+mG*)q!Wo%NE#6Ul8$lVF!yv(dP*eQ%x@&g4w?I2Ks)h0*YTt#%';
		var max_position = words.length - 8;
			for( i = 0; i < 10; ++i ) {
				position = Math.floor ( Math.random() * max_position );
				result = words.substring(position, position + 8);
			}
        document.getElementById('reg_password').value = result;
        document.getElementById('reg_password_confirmation').value = result;
	}
		
	$('.showPassword').click(function(){
		var inputPsw = $('#reg_password');
		var inputPswConf = $('#reg_password_confirmation');
		if (inputPsw.attr('type') == 'password' && inputPswConf.attr('type') == 'password') {
			document.getElementById('reg_password').setAttribute('type', 'text');
			document.getElementById('reg_password_confirmation').setAttribute('type', 'text');
		} else {
			document.getElementById('reg_password').setAttribute('type', 'password');
			document.getElementById('reg_password_confirmation').setAttribute('type', 'password');
		}
	});

function copyText()
{
		var password = ("#reg_password");
		var password_confirmation = ("#reg_password_confirmation");
		$(password_confirmation).val($(password).val());
}